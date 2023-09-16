@extends('admin.master')
@section('body')
    <div class="row mt-3">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Order Information</h4>
                    <h2 class="text-center text-dark">{{session('message')}}</h2>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped border">
                            <thead>
                            <tr>
                                <th>SI.NO</th>
                                <th>Order No</th>
                                <th>Order Date</th>
                                <th>Customer info</th>
                                <th>Order Total</th>
                                <th>Order Status</th>
                                <th>Payment Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->order_date}}</td>
                                    <td>{{$order->customer->name.'('.$order->customer->mobile.')'}}</td>
                                    <td>{{$order->order_total}}</td>
                                    <td>{{$order->order_status}}</td>
                                    <td>{{$order->payment_status}}</td>
                                    <td>
                                        <a href="{{route('admin.order-detail',['id'=>$order->id])}}" class="btn btn-info btn-sm" title="view order Detail">
                                            <i class="ti-book"></i>
                                        </a>
                                        <a href="{{route('admin.order-edit',['id'=>$order->id])}}" class="btn btn-success btn-sm" title="view order edit Detail">
                                            <i class="ti-reddit"></i>
                                        </a>
                                        <a href="{{route('admin.order-invoice',['id'=>$order->id])}}" class="btn btn-primary btn-sm" title="view order invoice">
                                            <i class="ti-infinite"></i>
                                        </a>
                                        <a href="{{route('admin.print-invoice',['id'=>$order->id])}}" class="btn btn-warning btn-sm" target="_blank" title="Print order invoice">
                                            <i class="ti-dropbox"></i>
                                        </a>
                                        <a href="{{route('admin.order-delete',['id'=>$order->id])}}"  onclick="return confirm('Are you sure delete this ')" class="btn btn-danger btn-sm" title="delete order invoice">
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
