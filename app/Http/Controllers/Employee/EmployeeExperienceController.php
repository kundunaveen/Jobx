<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\Experience\CreateRequest;
use App\Http\Requests\Employee\Experience\UpdateRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Experience;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class EmployeeExperienceController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::orderBy('name')->get();

        return view('employee.profile.experience.create', [
            'countries' => $countries
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data = $request->validated();

        try {

            $data['uuid'] = Str::uuid();
            $data['user_id'] = auth()->id();

            if(isset($data['is_work_here']) && filled($data['is_work_here']) && (filled($data['to_month']) || filled($data['to_year']))){
                $data['to_month'] = null;
                $data['to_year'] = null;
            }
            Experience::create($data);

            return Redirect::route('employee.experience.create')->with('success', 'Your experience data saved successful');

        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $uuid)
    {
        $countries = Country::orderBy('name')->get();
        $experience = Experience::where([
            ['uuid', '=', $uuid],
            ['user_id', '=', auth()->id()]
            ])->firstOrFail();

        $states = State::where('country_id', $experience->country_id)->get();
        $cities = City::where('state_id', $experience->state_id)->get();

        return view('employee.profile.experience.edit', [
            'countries' => $countries,
            'experience' => $experience,
            'states' => $states,
            'cities' => $cities
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, string $uuid)
    {
        $data = $request->validated();

        $experience = Experience::where([
            ['uuid', '=', $uuid],
            ['user_id', '=', auth()->id()]
            ])->firstOrFail();

        try {
                
            if(isset($data['is_work_here']) && filled($data['is_work_here'])){
                $data['to_month'] = null;
                $data['to_year'] = null;
            }else{
                $data['is_work_here'] = null;
            }

            $experience->update($data);

            return Redirect::route('employee.profile.edit')->with('success', 'Your experience data saved successful');
            
        } catch (\Exception $e) {
            return back()->withInput()->with([
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $uuid)
    {
        $experience = Experience::where([
            ['uuid', '=', $uuid],
            ['user_id', '=', auth()->id()]
            ])->firstOrFail();

        try {           
            
            $experience->delete();

            return Redirect::route('employee.profile.edit')->with('success', 'Your experience data delete successful');

        } catch (\Exception $e) {
            return back()->withInput()->with([
                'error' => $e->getMessage()
            ]);
        }
    }
}
