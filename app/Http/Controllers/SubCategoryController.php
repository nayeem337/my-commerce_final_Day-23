<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        return view('admin.sub-category.index',['categories'=>Category::all()]);
    }


    public function store(Request $request)
    {

        SubCategory::newSubCategory($request);
        return back()->with('message','Sub Category Data insert Successfuuly ');
    }

    public function manage()
    {
        //   $categories =Category::all();
        //  return view('admin.category.manage',compact('categories'));
        // return view('admin.category.manage')->with('categories', Category::all());
        return view('admin.sub-category.manage',['sub_categories' =>SubCategory::all()]);

    }

    public function edit($id)
    {
        return view('admin.sub-category.edit',
            [
                'categories'  =>Category::all(),
                'sub_category'=>SubCategory::find($id),

            ]);
    }

    public function update(Request $request,$id)
    {
        SubCategory::updateSubCategory($request,$id);
        return redirect('/sub-category/manage')->with('message','Sub Category info update Successfully');
    }

    public function delete($id)
    {
        SubCategory::deleteSubCategory($id);
        return redirect('/sub-category/manage')->with('message','Sub Category info delete Successfully');
    }
}
