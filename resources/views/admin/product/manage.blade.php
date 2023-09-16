
@extends('admin.master')
@section('body')
    <div class="row mt-3">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Product information </h4>
                    <h2 class="text-center text-dark">{{session('message')}}</h2>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped border">
                            <thead>
                            <tr>
                                <th>SI.NO</th>
                                <th> Name </th>
                                <th>Code</th>
                                <th>Stock amount </th>
                                <th>Image </th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->code}}</td>
                                    <td>{{$product->stock_amount}}</td>
{{--                                    <td>{{$product->category->name}}</td>--}}
                                    <td><img src="{{asset($product->image)}}" alt="{{$product->name}}" height="50" width="50"></td>
                                    <td>{{$product->status==1 ? 'published' : 'unpublished'}}</td>
                                    <td>

                                        <a href="{{route('product.detail',['id'=>$product->id])}}" class="btn btn-info btn-sm">
                                            <i class="ti-agenda"></i>
                                        </a>
                                        <a href="{{route('product.edit',['id'=>$product->id])}}" class="btn btn-success btn-sm">
                                            <i class="ti-agenda"></i>
                                        </a>
                                        <a href="{{route('product.delete',['id'=>$product->id])}}"  onclick="return confirm('Are you sure delete this ')" class="btn btn-danger btn-sm">
                                            <i class="ti-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

