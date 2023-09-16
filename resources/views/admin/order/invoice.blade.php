@extends('admin.master')
@section('body')

    <style>
        .invoice-box {
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }


        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>

    <div class="row mt-3" >
         <div class="col-md-12">
             <div class="invoice-box mb-3">
                 <table cellpadding="0" cellspacing="0">
                     <tr class="top">
                         <td colspan="4">
                             <table>
                                 <tr>
                                     <td class="title">
                                         <img src="{{asset('/')}}upload/dummy.jpg" style="width:100px; "/>
                                     </td>

                                     <td>
                                         Invoice #: 00{{$order->id}}<br />
                                         Order Date: {{$order->order_date}}<br />
                                         Invoice Date: {{date('Y-m-d')}}
                                     </td>
                                 </tr>
                             </table>
                         </td>
                     </tr>

                     <tr class="information">
                         <td colspan="4">
                             <table>
                                 <tr>
                                     <td>
                                         <h4><ul>Delivery Information</ul></h4>

                                         {{$order->customer->name}}<br />
                                         {{$order->customer->mobile}}<br />
                                         {{$order->customer->delivery_address}}
                                     </td>

                                     <td>
                                         <h4><ul>Company Information</ul></h4>
                                         Acme Corp.<br />
                                         John Doe<br />
                                         john@example.com
                                     </td>
                                 </tr>
                             </table>
                         </td>
                     </tr>

                     <tr class="heading">
                         <td>Payment Method</td>

                         <td colspan="3">Check #</td>
                     </tr>

                     <tr class="details">
                         <td>{{$order->payment_type == 1 ? 'Cash' : 'Online'}}</td>
                         <td colspan="3">{{$order->order_total}}</td>
                     </tr>

                     <tr class="heading">
                         <td>Item</td>
                         <td style="text-align: center">Price</td>
                         <td style="text-align: center">Qty</td>
                         <td style="text-align: right">Total</td>
                     </tr>
                        @php($sum=0)
                     @foreach($order->orderDetails as $orderDetail)
                     <tr class="item">
                         <td>{{$orderDetail->product_name}}</td>
                         <td style="text-align: center">{{$orderDetail->product_price}}</td>
                         <td style="text-align: center">{{$orderDetail->product_qty}}</td>
                         <td style="text-align: right">{{$orderDetail->product_price * $orderDetail->product_qty}}</td>
                     </tr>
                         @php($sum=$sum + ($orderDetail->product_price * $orderDetail->product_qty))
                     @endforeach
                     <tr>
                         <td colspan="4"><hr></td>
                     </tr>

                     <tr class="total">
                         <td colspan="3">Order Sub Total</td>
                         <td>{{$sum}}</td>
                     </tr>

                     <tr class="total">
                         <td colspan="3">Tax Amount</td>
                         <td>{{$order->tax_total}}</td>
                     </tr>

                     <tr class="total">
                         <td colspan="3">Shipping Cost</td>
                         <td>{{$order->shipping_total}}</td>
                     </tr>
                     <tr>
                         <td colspan="4"><hr></td>
                     </tr>

                     <tr class="total">
                         <td colspan="3">Total Payable</td>
                         <td>{{$order->order_total}}</td>
                     </tr>
                     <tr align="center">
                         <td  style="width: 200px">
                             <h5><u>Prepared By</u></h5>
                         </td>
                         <td colspan="2" ></td>
                         <td  style="width: 200px">
                             <h5><u>Received By</u></h5>
                         </td>
                     </tr>

                 </table>
             </div>
         </div>
     </div>

@endsection
