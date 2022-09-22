<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobSkill;
use App\Models\MasterAttribute;
use Session;

class SkillController extends Controller
{
    public function index()
    {
        $skills = JobSkill::all();
        return view('admin.dashboard.job-skill.index', compact('skills'));
    }

    public function create(Request $request)
    {
        if($request->method() == "POST")
        {
            $request->validate([
                'skill' => 'required|string|max:65',
                'industry_id' => 'required',
            ]);
            JobSkill::create($request->all());
            return redirect(route('admin.jobSkills'))->with('success', 'Skill added successfully');
        }
        $industries = MasterAttribute::where('master_attribute_category_id',4)->get();
        return view('admin.dashboard.job-skill.create', compact('industries')); 
    }

    public function edit(Request $request, $id)
    {
        $skill = JobSkill::find($id);
        if($request->method() == "POST")
        {
            $request->validate([
                'skill' => 'required|string|max:65',
                'industry_id' => 'required',
            ]);
            $skill->update($request->all());
            return redirect(route('admin.jobSkills'))->with('success','Skill Updated Successfully');
        }
        $industries = MasterAttribute::where('master_attribute_category_id',4)->get();
        return view('admin.dashboard.job-skill.edit', compact('industries', 'skill')); 
    }

    public function delete(Request $request)
    {
        JobSkill::find($request->id)->delete();
        Session::flash('info', 'Skill Deleted Successfully');
        return response()->json([
            'status' => 'success',
            'message' => 'Employee has been deleted successfully'
        ]);
    }
}
