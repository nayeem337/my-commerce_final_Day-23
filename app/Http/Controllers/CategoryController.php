<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //private $categories;
    public function index()
    {
        return view('admin.category.index');
    }


    public function store(Request $request)
    {

        Category::newCategory($request);
        return back()->with('message','Data insert Successfuuly ');
    }

    public function manage()
    {
        //   $categories =Category::all();
        //  return view('admin.category.manage',compact('categories'));
        // return view('admin.category.manage')->with('categories', Category::all());
        return view('admin.category.manage',['categories' =>Category::all()]);

    }

    public function edit($id)
    {
        return view('admin.category.edit',['category'=>Category::find($id)]);
    }

    public function update(Request $request,$id)
    {
        Category::updateCategory($request,$id);
        return redirect('category/manage')->with('message','Category info update Successfully');
    }

    public function delete($id)
    {
        Category::deleteCategory($id);
        return redirect('category/manage')->with('message','Category info delete Successfully');
    }
}
