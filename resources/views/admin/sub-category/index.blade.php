@extends('admin.master')
@section('body')

    <div class="row mt-3">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" align="center">Add Sub Category Form </h4>
                    <hr/>
                    <h2 class="text-center text-dark">{{session('message')}}</h2>

                    <form class="form-horizontal p-t-20" action="{{route('sub-category.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Category Name<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_id">
                                    <option disabled selected>--Select Option</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" >{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Sub Category Name<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="" placeholder="Sub category Name">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Sub Category Description<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea  class="form-control" name="description" id="exampleInputEmail3" placeholder="Category Description"> </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Sub Category Image </label>
                            <div class="col-sm-9">
                                <input type="file" name="image" id="input-file-now" class="dropify" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword4" class="col-sm-3 control-label">Publication Status</label>
                            <div class="col-sm-9">
                                <label for="" class="me-3"><input type="radio" name="status" value="1" checked> Published</label>
                                <label for=""><input type="radio" name="status" value="2"> unpblished</label>
                            </div>
                        </div>

                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Create New Sub Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
