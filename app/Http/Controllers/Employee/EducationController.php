<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\Education\CreateRequest;
use App\Http\Requests\Employee\Education\UpdateRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Education;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::orderBy('name')->get();

        return view('employee.profile.education.create', [
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

            if(isset($data['is_pursuing_here']) && filled($data['is_pursuing_here']) && (filled($data['to_month']) || filled($data['to_year']))){
                $data['is_pursuing_here'] = null;
                $data['to_month'] = null;
                $data['to_year'] = null;
            }            
            
            Education::create($data);

            return Redirect::route('employee.home')->with('success', 'Your education data saved successful');

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
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function edit(string $uuid)
    {
        $countries = Country::orderBy('name')->get();
        $education = Education::where([
            ['uuid', '=', $uuid],
            ['user_id', '=', auth()->id()]
            ])->firstOrFail();

        $states = State::where('country_id', $education->country_id)->get();
        $cities = City::where('state_id', $education->state_id)->get();

        return view('employee.profile.education.edit', [
            'countries' => $countries,
            'education' => $education,
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
    public function update(UpdateRequest $request, $uuid)
    {
        $data = $request->validated();

        $education = Education::where([
            ['uuid', '=', $uuid],
            ['user_id', '=', auth()->id()]
            ])->firstOrFail();

        try {
                
            if(isset($data['is_pursuing_here']) && filled($data['is_pursuing_here'])){
                $data['to_month'] = null;
                $data['to_year'] = null;
            }else{
                $data['is_pursuing_here'] = null;
            }

            $education->update($data);

            return Redirect::route('employee.home')->with('success', 'Your education data saved successful');
            
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
        $education = Education::where([
            ['uuid', '=', $uuid],
            ['user_id', '=', auth()->id()]
            ])->firstOrFail();

        try {           
            
            $education->delete();

            return Redirect::route('employee.home')->with('success', 'Your education data delete successful');

        } catch (\Exception $e) {
            return back()->withInput()->with([
                'error' => $e->getMessage()
            ]);
        }
    }
}
