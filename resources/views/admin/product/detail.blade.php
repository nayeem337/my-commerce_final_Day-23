

@extends('admin.master')
@section('body')
    <div class="row mt-3">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Product information </h4>
                    <h2 class="text-center text-dark">{{session('message')}}</h2>
                    <div class="table-responsive m-t-40">
                        <table  class="table table-striped border">
                            <tr>
                                <th>Product Id</th>
                                <td>{{$product->id}}</td>
                            </tr>
                            <tr>
                                <th>Product Name</th>
                                <td>{{$product->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Code</th>
                                <td>{{$product->code}}</td>
                            </tr>
                            <tr>
                                <th>Product Model</th>
                                <td>{{$product->model}}</td>
                            </tr>
                            <tr>
                                <th>Product Category</th>
                                <td>{{$product->category->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Sub-Category</th>
                                <td>{{$product->SubCategory->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Brand</th>
                                <td>{{$product->brand->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Unit</th>
                                <td>{{$product->unit->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Stock amount</th>
                                <td>{{$product->stock_amount}}</td>
                            </tr>
                            <tr>
                                <th>Product Regular price </th>
                                <td>{{$product->regular_price}}</td>
                            </tr>
                            <tr>
                                <th>Product selling price </th>
                                <td>{{$product->selling_price}}</td>
                            </tr>
                            <tr>
                                <th>Product Features Image </th>
                                <td><img src="{{asset($product->image)}}" alt="" height="100" width="100"></td>
                            </tr>
                            <tr>
                                <th>Product other Image </th>
                                <td>
                                    @foreach($product->otherImages as $otherImage)
                                        <img src="{{ asset($otherImage->image) }}" alt="" height="100" width="100">
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Product Hit Count </th>
                                <td>{{$product->hit_count}}</td>
                            </tr>
                            <tr>
                                <th>Product Sales Count </th>
                                <td>{{$product->sales_count}}</td>
                            </tr>
                            <tr>
                                <th>Product Features status </th>
                                <td>{{$product->featured_staus == 1? 'Feature' : 'Not Feature'}}</td>
                            </tr>
                            <tr>
                                <th>Product Publication status </th>
                                <td>{{$product->status == 1? 'published' : 'unpublished'}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

