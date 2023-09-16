<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        return view('admin.unit.index');
    }


    public function store(Request $request)
    {

        Unit::newUnit($request);
        return back()->with('message', 'Unit Data insert Successfuuly ');
    }

    public function manage()
    {
        //   $categories =Category::all();
        //  return view('admin.category.manage',compact('categories'));
        // return view('admin.category.manage')->with('categories', Category::all());
        return view('admin.unit.manage', ['units' => Unit::all()]);

    }

    public function edit($id)
    {
        return view('admin.unit.edit', ['unit' => Unit::find($id)]);
    }

    public function update(Request $request, $id)
    {
        Unit::updateUnit($request, $id);
        return redirect('unit/manage')->with('message', 'Unit info update Successfully');
    }

    public function delete($id)
    {
        Unit::deleteUnit($id);
        return redirect('unit/manage')->with('message', 'Unit info delete Successfully');
    }
}
