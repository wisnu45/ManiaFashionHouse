@extends('Frontend.partials.master')
@section('content')
<section>
    <main class="home-margin pt-70">
        {{--  <section>
            <div class="page-path ">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <ul>
                                <li><a href="index.html">Home / </a></li>
                                <li> Blog</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>  --}}
        <section>
            <div class="compair-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-6 offset-3">
                            <div class="section-tittle text-center mt-60 mb-60">
                                <h2>SHOPPING CART</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <form  action="{{route('cart.update')}}" method="POST">
                @csrf
            @foreach ($carts as $cart)
            <!-- singel-product-wishlist  -->
                @if (!empty($cart))
                <div class="singel-wishlist-wrapper pb-30 mt-20">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 col-md-4">
                                <div class="singel-wishlist-items d-flex">
                                    <div class="wish-list-img">
                                        <img src="{{url($cart->productItem->product_img[0] ?? '')}}" alt="">
                                    </div>
                                    <div class="wishlist-content">
                                        <h6>{{ $cart->productItem->product_name ?? '' }}</h6>
                                        <div class="details">
                                            <p> <span>Size:</span>{{ $cart->size ?? '' }}</p>
                                            <p> <span>Color: </span>{{ $cart->color ?? '' }}</p>
                                            <p> <span>Quantity: </span>{{ $cart->quantity ?? '' }}</p>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <input class="id" type="hidden" placeholder="cart id" name="cart_id[]" value="{{$cart->id}}">

                            <div class=" col-2 col-md-1 col-lg-2 d-flex align-items-center">
                                <div class="wishlist-content">
                                    <div class="price">{{ $cart->productItem->price ?? '' }} </div>
                                </div>
                            </div>

                            <div class="col-4 col-md-2  col-lg-2 d-flex align-items-center">
                                <div class="count-wisth-list ">
                                    <div class="input-group inline-group d-flex align-items-center">
                                        <div class="input-group-prepend">
                                            <div class="btn-minus">

                                            </div>
                                        </div>
                                        <input class="form-control quantity" min="0" name="quantity[]" value="{{ $cart->quantity }}"
                                            type="number">
                                        <div class="input-group-append">
                                            <div class="btn-plus">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-lg-4 d-flex align-items-center justify-content-center">
                                <div class="singel-wishlist-btn">

                                    <!-- <a href="shop.html" class="btn"> <i class="fas fa-weight-hanging"></i>Buy Now</a> -->
                                    <span class="t-price totall">{{ $cart->totall ?? '' }}</span>

                                    <ul>

                                        <li>
                                            <a href="{{route('cart.delete',$cart->id)}}"> <i class="far fa-trash-alt"></i>REMOVE</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div>No Cart Available</div>
                @endif


            <!-- singel-product-wishlist-end  -->
            @endforeach

        </section>
        <section>
            <div class="shiping-area-wrapper mt-30 mb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-7 col-md-5 col-sm-5">
                            <div class="continu-shoping mb-30">
                                <a href="#"><i class="fas fa-long-arrow-alt-left"></i>CONTINUE SHOPPING</a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-7 col-sm-7">
                            <div class=" continu-shoping delet-shoping mb-30">
                                <ul>

                                    <li>
                                        <a href="{{ route('cart.clear') }}"> <i class="far fa-trash-alt"></i>CLEAR SHOPPING CART </a>
                                    </li>
                                    {{--  <li> <a href="#"> <i class="fas fa-sync-alt"></i>UPDATE CART</a></li>  --}}
                                    <li> <button type="submit"> <i class="fas fa-sync-alt"></i>UPDATE CART</button></li>

                                </ul>
                               </form>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-lg-6">
                            <div class="card mt-60 ">
                                <div class="card-body">
                                    <div class="new-review-wrapper mb-60">

                                        <form action="{{ route('cart.index') }}" method="get">
                                            @csrf
                                            <div class="form-group">

                                                <input type="text"  name ='coupon_code' class="form-control" id="coupon"
                                                    placeholder="Coupon">
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6">
                            <div class="card mt-60">
                                <div class="card-body">
                                        <div class="form-group">
                                            <button class="btn" type="submit">Apply Coupon</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <div class="suscription-wrapper mt-60">
                                <div class="card">
                                    <div class="card-body ">
                                        <h3 class="subTotal"> {{ $total }} </h3>
                                        <h5 class="discount" >{{ $discount  }}</h5>
                                        <h4 class="GrandTotal" >{{ $grandTotal }}</h4>
                                        <a href="#" class="btn">PROCEED TO CHECKOUT</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section>

    </main>


@endsection





@section('custom_js')
<script>

    let quantity = document.querySelectorAll('.quantity');
    let totall = document.querySelectorAll('.totall');
    let price = document.querySelectorAll('.price');
    let subTotal = document.querySelector('.subTotal');
    let GrandTotal = document.querySelector('.GrandTotal');
    let discount = document.querySelector('.discount');

    {{--  all total   --}}
   quantity.forEach(function(qun,index){
     qun.addEventListener('change',function(){

         let tot = price[index].innerHTML*qun.value;
         totall[index].innerHTML = tot
         let sub = 0
         totall.forEach(function(total,index){
           sub += parseInt(total.innerHTML)
         })
         subTotal.innerHTML=sub;
         GrandTotal.innerHTML = sub - sub*discount.innerHTML/100;
     })
     })


 </script>


@endsection














