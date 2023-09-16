@extends('admin.master')
@section('body')

    <div class="row mt-3">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" align="center">Add Product  Form </h4>
                    <hr/>
                    <h2 class="text-center text-dark">{{session('message')}}</h2>

                    <form class="form-horizontal p-t-20" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Category Name<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_id" id="categoryId">
                                    <option value="" disabled selected>--Select  Category Option--</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" >{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Sub Category Name<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="sub_category_id" id="subCategoryId">
                                    <option value="" disabled selected>--Select sub Category Option--</option>
                                    @foreach($sub_categories as $sub_category)
                                        <option value="{{$sub_category->id}}" >{{$sub_category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Brand Name<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="brand_id">
                                    <option disabled selected>--Select Brand Option</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}" >{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Unit Name<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="unit_id">
                                    <option disabled selected>--Select Unit Option</option>
                                    @foreach($units as $unit)
                                        <option value="{{$unit->id}}" >{{$unit->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Product Name<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="" placeholder="Product name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Product Code<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="code" id="" placeholder="Product Code">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Product Model</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="model" id="" placeholder="Product Model ">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Product Stock Amount <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="stock_amount" id="" placeholder="Product Stock Amount ">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Product Price  <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="number" class="form-control" name="regular_price" id="" placeholder="Regular Price  ">
                                    <input type="number" class="form-control" name="selling_price" id="" placeholder="Selling  Price  ">

                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Product Short Description<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea  class="form-control summernote" name="short_description" id="exampleInputEmail3" placeholder="Product short Description"> </textarea>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">Product Long Description<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea  class="form-control summernote" name="long_description" id="exampleInputEmail3" placeholder="Product Long Description"> </textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Features  Image  <span class="text-danger">*</span> </label>
                            <div class="col-sm-9">
                                <input type="file" name="image" id="input-file-now" class="dropify" accept="image/*" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Other  Image  <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="file" name="other_image[]" multiple id="input-file-now" class="dropify" />
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
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Create New Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
