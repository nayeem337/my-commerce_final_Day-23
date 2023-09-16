<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{    //private $categories;
    public function index()
    {
        return view('admin.brand.index');
    }


    public function store(Request $request)
    {

        Brand::newBrand($request);
        return back()->with('message','Brand Data insert Successfuuly ');
    }

    public function manage()
    {
        //   $categories =Category::all();
        //  return view('admin.category.manage',compact('categories'));
        // return view('admin.category.manage')->with('categories', Category::all());
        return view('admin.brand.manage',['brands' =>Brand::all()]);

    }

    public function edit($id)
    {
        return view('admin.brand.edit',['brand'=>Brand::find($id)]);
    }

    public function update(Request $request,$id)
    {
        Brand::updateBrand($request,$id);
        return redirect('brand/manage')->with('message','Brand info update Successfully');
    }

    public function delete($id)
    {
        Brand::deleteBrand($id);
        return redirect('brand/manage')->with('message','Brand info delete Successfully');
    }
}
