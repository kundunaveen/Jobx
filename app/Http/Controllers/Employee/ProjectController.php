<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\Project\CreateRequest;
use App\Http\Requests\Employee\Project\UpdateRequest;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
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
        return view('employee.profile.project.create');
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
            unset($data['images']);

            DB::transaction(function () use ($data, $request) {
                $project = Project::create($data);

                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $file) {
                        $file_name = $file->hashName();
                        $file->storeAs(
                            ProjectImage::IMAGE_PATH,
                            $file_name,
                            config('settings.file_system_service')
                        );
                        ProjectImage::create([
                            'project_id' => $project->id,
                            'image' => $file_name,
                        ]);
                    }
                }
            });
            return Redirect::route('employee.home')->with('success', 'Your project data saved successful');
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
        $project = Project::with('images')->where([
            ['uuid', '=', $uuid],
            ['user_id', '=', auth()->id()],
        ])->firstOrFail();

        return view('employee.profile.project.edit', [
            'project' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, string $uuid)
    {
        $data = $request->validated();

        $project = Project::where([
            ['uuid', '=', $uuid],
            ['user_id', '=', auth()->id()],
        ])->firstOrFail();

        try {

            unset($data['images']);
            unset($data['old_images']);

            DB::transaction(function () use ($data, $request, $project) {
                $project->update($data);

                if ($request->filled('old_images')) {
                    $old_selected_images = $request->old_images;
                    if ($project->images()->count() > 0) {
                        $delete_files = array_diff($project->images()->pluck('image')->toArray(), $old_selected_images);
                        foreach ($delete_files as $delete_file) {
                            Storage::disk(config('settings.file_system_service'))->delete(ProjectImage::IMAGE_PATH . '/' . $delete_file);
                            ProjectImage::where([
                                ['project_id', '=', $project->id],
                                ['image', '=', $delete_file],
                            ])->delete();
                        }
                    }
                }else{
                    foreach($project->images()->pluck('image')->toArray() as $image){
                        Storage::disk(config('settings.file_system_service'))->delete(ProjectImage::IMAGE_PATH . '/' . $image);
                        ProjectImage::where([
                            ['project_id', '=', $project->id],
                            ['image', '=', $image],
                        ])->delete();
                    }                    
                }

                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $file) {
                        $file_name = $file->hashName();
                        $file->storeAs(
                            ProjectImage::IMAGE_PATH,
                            $file_name,
                            config('settings.file_system_service')
                        );
                        ProjectImage::create([
                            'project_id' => $project->id,
                            'image' => $file_name,
                        ]);
                    }
                }
            });

            return Redirect::route('employee.home')->with('success', 'Your project data saved successful');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $uuid)
    {
        $project = Project::where([
            ['uuid', '=', $uuid],
            ['user_id', '=', auth()->id()],
        ])->firstOrFail();

        try {

            foreach ($project->images as $image) {
                if ($image instanceof ProjectImage && filled($image->image_path)) {
                    Storage::disk(config('settings.file_system_service'))->delete($image->image_path);
                }
            }

            DB::transaction(function () use ($project) {
                ProjectImage::where('project_id', $project->id)->delete();
                $project->delete();
            });

            return Redirect::route('employee.home')->with('success', 'Your project data delete successful');
        } catch (\Exception $e) {
            return back()->withInput()->with([
                'error' => $e->getMessage()
            ]);
        }
    }
}
