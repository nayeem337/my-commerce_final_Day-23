@extends('admin.master')
@section('body')



    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> Order Basic  Information</h4>
                    <div class="table-responsive m-t-40">
                        <table class="table table-striped border">
                            <tr>
                                <th>Order ID</th>
                                <th>{{$order->id}}</th>
                            </tr>
                            <tr>
                                <th>Order Date</th>
                                <th>{{$order->order_date}}</th>
                            </tr>
                            <tr>
                                <th>Order Total</th>
                                <th>{{$order->order_total}}</th>
                            </tr>
                            <tr>
                                <th>Tax Total</th>
                                <th>{{$order->tax_total}}</th>
                            </tr>
                            <tr>
                                <th>Shipping Total</th>
                                <th>{{$order->shipping_total}}</th>
                            </tr>
                            <tr>
                                <th>Order Status</th>
                                <th>{{$order->order_status}}</th>
                            </tr>
                            <tr>
                                <th>Delivery Address</th>
                                <th>{{$order->delivery_address}}</th>
                            </tr>
                            <tr>
                                <th>Delivery Status</th>
                                <th>{{$order->delivery_status}}</th>
                            </tr>
                            <tr>
                                <th>Payment Type</th>
                                <th>{{$order->payment_type == 1 ?'cash on delivery' : 'online Gateway'}}</th>
                            </tr>
                            <tr>
                                <th>Payment Status</th>
                                <th>{{$order->payment_status}}</th>
                            </tr>
                            <tr>
                                <th>Currency</th>
                                <th>{{$order->currency}}</th>
                            </tr>
                            <tr>
                                <th>Transaction ID</th>
                                <th>{{$order->transaction_id}}</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> Order Customer  Information</h4>
                    <div class="table-responsive m-t-40">
                        <table  class="table table-striped border">
                            <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Mobile Number </th>
                                <th>Email Address</th>
                                <th>Home Address</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$order->customer->name}}</td>
                                <td>{{$order->customer->mobile}}</td>
                                <td>{{$order->customer->email}}</td>
                                <td>{{$order->customer->delivery_address}}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> Order Product  Information</h4>
                    <div class="table-responsive m-t-40">
                        <table class="table table-striped border">
                            <thead>
                            <tr>
                                <th>SI.NO</th>
                                <th>Product Name</th>
                                <th>Product Date</th>
                                <th>Order Amount</th>
                                <th>Total Price</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->orderDetails as $orderDetail)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$orderDetail->product_name}}</td>
                                <td>{{$orderDetail->product_price}}</td>
                                <td>{{$orderDetail->product_qty}}</td>
                                <td>{{$orderDetail->product_price * $orderDetail->product_qty}}</td>
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
