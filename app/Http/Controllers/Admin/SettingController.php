<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cms\UpdateRequest;
use App\Models\Cms;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'adminaccount']);
    }

    public function edit()
    {
        $cms = Cms::where('slug', Cms::CMS_SLUG_SETTING)->firstOrFail();
        return view('admin.dashboard.setting', [
            'cms' => $cms
        ]);
    }

    public function update(UpdateRequest $request){

        $data = $request->validated();
        
        try {
            
            $cms = Cms::where('slug', Cms::CMS_SLUG_SETTING)->first();

            $cms->update($data);

            return redirect()->route('admin.cms.setting.edit')->with('success', 'Data save successful');

        } catch (\Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }
}
