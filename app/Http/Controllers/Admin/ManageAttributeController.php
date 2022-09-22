<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterAttributeCategory;
use App\Models\MasterAttribute;
use Session;

class ManageAttributeController extends Controller
{
    public function index()
    {
        $attributes = MasterAttribute::all();
        $attrCategories = MasterAttributeCategory::all();
        return view('admin.dashboard.manage_attribute.index', compact('attributes', 'attrCategories'));
    }

    public function create(Request $request)
    {
        $attrCategories = MasterAttributeCategory::all();
        if($request->method() == "POST")
        {
            $request->validate([
                'value' => 'required'
            ]);
            $attr = MasterAttribute::where('master_attribute_category_id', $request->category)->where('value', $request->value)->first();
            if($attr != null)
            {
                return redirect()->back()->with('error','This master attribute is already exist');
            }
            MasterAttribute::create([
                'master_attribute_category_id' => $request->category,
                'value' => $request->value
            ]);
            Session::flash('success', 'Master Attribute Created Successfully');
            return redirect(route('admin.manageAttribute'));
        }
        return view('admin.dashboard.manage_attribute.create', compact('attrCategories'));
    }

    public function edit(Request $request, $id)
    {
        $attrCategories = MasterAttributeCategory::all();
        $attribute = MasterAttribute::find($id);
        if($request->method() == "POST")
        {
            $request->validate([
                'value' => 'required'
            ]);
            $attr = MasterAttribute::where('master_attribute_category_id', $request->category)->whereNot('id', $id)->where('value', $request->value)->first();
            if($attr != null)
            {
                return redirect()->back()->with('error','This master attribute is already exist');
            }
            $attribute->update([
                'master_attribute_category_id' => $request->category,
                'value' => $request->value
            ]);
            Session::flash('success', 'Master Attribute Updated Successfully');
            return redirect(route('admin.manageAttribute'));
        }
        return view('admin.dashboard.manage_attribute.edit', compact('attrCategories', 'attribute'));
    }

    public function delete(Request $request)
    {
        MasterAttribute::find($request->id)->delete();
        Session::flash('info', 'Master Attribute Deleted Successfully');
        return response()->json([
            'status' => 'success',
            'message' => 'Employee has been deleted successfully'
        ]);
    }

    public function manageCategory(Request $request)
    {
        $categories = MasterAttributeCategory::all();
        return view('admin.dashboard.manage_attribute.category',compact('categories'));
    }

    public function editCategory(Request $request, $id)
    {
        $category = MasterAttributeCategory::find($id);
        if($request->method() == "POST")
        {
            $request->validate([
                'name' => 'required|string|max:65|unique:master_attribute_categories,name,'.$id
            ]);
            $category->update([
                'name' => $request->name
            ]);
            return redirect(route('admin.categories'))->with('success', 'Attribute Category Updated Successfully.');
        }
        return view('admin.dashboard.manage_attribute.edit-Category', compact('category'));
    }

    public function createCategory(Request $request)
    {
        if($request->method()=="POST")
        {
            $request->validate([
                'name' => 'required|string|max:65|unique:master_attribute_categories'
            ]);
            MasterAttributeCategory::create($request->all());
        }
        return view('admin.dashboard.manage_attribute.create-category');
    }

    public function deleteCategory(Request $request)
    {
        MasterAttributeCategory::find($request->id)->delete();
        Session::flash('info', 'Master Attribute Category Deleted Successfully');
        return response()->json([
            'status' => 'success',
            'message' => 'Employee has been deleted successfully'
        ]);
    }

    public function getValues(Request $request)
    {
        $attributes = MasterAttribute::where('master_attribute_category_id', $request->category_id)->get();
        $category = MasterAttributeCategory::find($request->category_id);
        return response()->json([
            'status' => 'success',
            'category' => $category->name,
            'values' => $attributes
        ]);
    }
}
