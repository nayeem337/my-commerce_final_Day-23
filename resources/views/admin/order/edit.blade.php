@extends('admin.master')
@section('body')
    <div class="row mt-3" xmlns="http://www.w3.org/1999/html">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> Orders  Information</h4>
                    <hr>
                    @if(Session::get('noti'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{Session::get('noti')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif


                    @if(Session::get('msg'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{Session::get('msg')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{route('admin.update-order',['id'=>$order->id])}}" method="post">
                        @csrf

                        <div class="row mb-3">
                            <label class="col-md-3">Customer Information</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" readonly value="{{$order->customer->name.'('.$order->customer->mobile.')'}}"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">Order ID</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" readonly value="{{$order->id}}"/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3">Order Total</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" readonly value="{{$order->order_total}}"/>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-md-3">Order Status</label>
                            <div class="col-md-9">
                                <select name="order_status" class="form-control">
                                    <option value="Pending" {{$order->order_status == 'Pending' ? 'selescted' : ''}}>Pending</option>
                                    <option value="Processing" {{$order->order_status == 'Processing' ? 'selescted' : ''}}>Processing</option>
                                    <option value="Complete" {{$order->order_status == 'Complete' ? 'selescted' : ''}}>Complete</option>
                                    <option value="Cancel" {{$order->order_status == 'Cancel' ? 'selescted' : ''}}>Cancel</option>
                                </select>
                            </div>
                        </div>


                            <div class="row mb-3">
                                <label class="col-md-3">Delivery Address</label>
                                <div class="col-md-9">
                                    <textarea  class="form-control" name="delivery_address">{{$order->delivery_address}}</textarea>
                                </div>
                            </div>

                        <div class="row mb-3">
                            <label class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn  btn-primary w-100"  value="update Order"/>
                            </div>
                        </div>






                    </form>


            </div>
        </div>
    </div>

@endsection
