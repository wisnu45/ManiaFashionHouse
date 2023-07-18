<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
<head>
    <meta name="viewport" content="width=device-width"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Adminto - Responsive Admin Dashboard Template</title>

    <!-- C3 charts css -->
    <link href="{{ url('/backend') }}/plugins/c3/c3.min.css" rel="stylesheet" type="text/css"  />

    <!-- App css -->
    <link href="{{url('/backend')}}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    @yield('extra_css')
    <link href="{{url('/backend')}}/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/backend')}}/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/backend')}}/assets/css/style.css" rel="stylesheet" type="text/css" />

</head>
@php
use Carbon\Carbon;

 $orders = App\Model\Backend\Order::where('billing_id',1)->get();

 @endphp
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-box">
                <div class="clearfix">
                    <div class="pull-left">
                        <img src="{{url('/backend')}}/assets/images/logo_dark.png" alt="" height="30">
                    </div>
                    <div class="pull-right">
                        <h3 class="m-0 hidden-print">Invoice</h3>
                    </div>
                </div>


                <div class="row">
                    <div class="col-6">
                        <div class="pull-left m-t-30">
                            <p><b>Hello, {{ $orders[0]->user->name }}</b></p>
                            <p class="text-muted">Thanks a lot because you keep purchasing our products. Our company
                                promises to provide high quality products for you as well as outstanding
                                customer service for every transaction. </p>
                        </div>

                    </div><!-- end col -->
                    <div class="col-4 offset-2">
                        <div class="m-t-30 pull-right">
                            <p class="m-b-10"><small><strong>Order Date: </strong></small>
                             {{ $orders[0]->created_at->format('M d, Y') }}</p>
                            <p class="m-b-10"><small><strong>Order Status: </strong></small> <span class="label label-success">{{ $orders[0]->is_paid==1? 'Paid' : 'Due' }}</span></p>
                            <p class="m-b-10"><small><strong>Order ID: </strong></small> #{{ $orders[0]->id }}</p>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->

                <div class="row m-t-30">
                    <div class="col-6">
                        <h5>Shipping Address</h5>

                        <address class="line-h-24">
                           {{ $orders[0]->user->name }}<br>
                            {{ $orders[0]->billing->division_model->name??'' }}  {{ ($orders[0]->billing->division_model->bn_name ??' ') }}<br>
                            {{ $orders[0]->billing->district_model->name??'' }}  {{ ($orders[0]->billing->district_model->bn_name ??' ') }}<br>
                            {{ $orders[0]->billing->upazila_model->name??'' }}  {{ ($orders[0]->billing->upazila_model->bn_name ??' ') }}<br>
                            {{ $orders[0]->billing->union_model->name??'' }}  {{ ($orders[0]->billing->union_model->bn_name ??' ') }}<br>
                            Post Code: {{ $orders[0]->billing->post_code??'' }}<br>
                            Street: {{ $orders[0]->billing->street_address??'' }}<br>
                            apartment: {{ $orders[0]->billing->apartment??'' }}<br>

                            <abbr title="Phone">Phone:</abbr>   {{ $orders[0]->billing->phone??'' }}
                        </address>

                    </div>


                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table m-t-30">
                                <thead>
                                <tr><th>#</th>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Unit Cost</th>
                                    <th class="text-right">Total</th>
                                </tr></thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <b>{{ $order->product->catagory->catagory_name }}</b> <br/>
                                            {{ $order->product->product_name }}
                                        </td>
                                        <td><span class="quantity">{{ $order->qty }}</span></td>
                                        <td>$<span class="price">{{ $order->product->price }}</span></td>

                                        <td class="text-right">$<span class="totall">{{ $order->qty* $order->product->price }}</span></td>
                                    </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="clearfix p-t-50">
                            <h5 class="text-muted">Notes:</h5>

                            <small>
                                All accounts are to be paid within 7 days from receipt of
                                invoice. To be paid by cheque or credit card or direct payment
                                online. If account is not paid within 7 days the credits details
                                supplied as confirmation of work undertaken will be charged the
                                agreed quoted fee noted above.
                            </small>
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="float-right">
                            {{--  <p><b>Sub-total:</b> <span>4120.00</span></p>--}}
                            <p><b>Grand Totall</b> </p>
                            <h3> $ <span class="GrandTotal">4635.00 </span></h3>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="hidden-print m-t-30 m-b-30">
                    <div class="text-right">
                        <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print m-r-5"></i> Print</a>
                        <a href="{{ route('product.shipped',$billing_id) }}" class="btn btn-info waves-effect waves-light">Confirm</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>



<!-- jQuery  -->
<script src="{{url('/backend')}}/assets/js/jquery.min.js"></script>
<script src="{{url('/backend')}}/assets/js/tether.min.js"></script><!-- Tether for Bootstrap -->
<script src="{{url('/backend')}}/assets/js/bootstrap.min.js"></script>
<script src="{{url('/backend')}}/assets/js/metisMenu.min.js"></script>
<script src="{{url('/backend')}}/assets/js/waves.js"></script>
<script src="{{url('/backend')}}/assets/js/jquery.slimscroll.js"></script>
<script>
    let quantity = document.querySelectorAll('.quantity');
    let totall = document.querySelectorAll('.totall');
    let price = document.querySelectorAll('.price');
    let subTotal = document.querySelector('.subTotal');
    let GrandTotal = document.querySelector('.GrandTotal');
    let discount = document.querySelector('.discount');

    {{--  all total   --}}
   quantity.forEach(function(qun,index){

         let tot = price[index].innerHTML*qun.innerHTML;
         totall[index].innerHTML = tot


         let grand = 0
         totall.forEach(function(total,index){
           grand += parseInt(total.innerHTML)

         })
         GrandTotal.innerHTML=grand;


     })





 </script>
</body>
</html>
