@extends('Frontend.partials.master');
@section('content')
<main class="pt-60">
    <!-- slider-area-here  -->
    <section>
        <div class="bannar-wrapper mb-100">

            <div class="slider-active">
                <div class="singel-slider bannar-height d-flex align-items-center "
                    style='background-image: url({{ url('/frontend/assets') }}/./images/myuses/bannar/slide-02.jpg);'>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 offset-xl-2">
                                <div class="bannar-content text-center">
                                    <span data-animation="fadeInDown" data-delay="0.3.s">Multipurpose</span>
                                    <h1 class="text-black" data-animation="fadeInDown" data-delay="0.4s">Unique shop
                                        store</h1>
                                    <p data-animation="fadeInDown" data-delay="0.5s">30 skins, powerful features,
                                        great support, exclusive offer</p>
                                    <a data-animation="bounceIn" data-delay="0.6s" href="shop.html" class="btn">SHOP
                                        NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singel-slider bannar-height d-flex align-items-center "
                    style='background-image: url({{ url('/frontend/assets') }}/./images/myuses/bannar/slide-03.jpg);'>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 offset-xl-2">
                                <div class="bannar-content text-center">
                                    <span data-animation="fadeInDown" data-delay="0.3.s">BD shop</span>
                                    <h1 class="text-white" data-animation="fadeInDown" data-delay="0.4s">Find
                                        Products for shop store</h1>
                                    <p data-animation="fadeInDown" data-delay="0.5s">Lorem ipsum dolor sit amet
                                        consectetur, adipisicing elit. Alias assumenda </p>
                                    <a data-animation="bounceIn" data-delay="0.6s" href="shop.html" class="btn">SHOP
                                        NOw</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singel-slider bannar-height d-flex align-items-center "
                    style='background-image: url({{ url('/frontend/assets') }}/./images/myuses/bannar/slide-02.jpg);'>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 offset-xl-2">
                                <div class="bannar-content text-center">
                                    <span data-animation="fadeInDown" data-delay="0.3.s">BD shop</span>
                                    <h1 data-animation="fadeInDown" data-delay="0.4s">Find Products for shop store
                                    </h1>
                                    <p data-animation="fadeInDown" data-delay="0.5s">Lorem ipsum dolor sit amet
                                        consectetur, adipisicing elit. Alias assumenda </p>
                                    <a data-animation="bounceIn" data-delay="0.6s" href="shop.html" class="btn">SHOP
                                        NOw</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </section>
    <!-- .slider-area-end-here  -->
    <!-- collection-area-here  -->
    <section class="d-none d-md-block">
        <div class="container">
            <div class="row grid">
                @foreach ($catagories as $catagory)
                <div class="col-xl-3 col-md-3 grid-item p-10">
                    <div class="singel-collecton">
                        <img src="{{ url($catagory->catagory_img ?? '') }}" alt="">
                        <a href="shop.html" class="btn">{{ $catagory->catagory_name ??'' }}</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- collection-area-end-here  -->
    <!-- tranding-product-area-here  -->
    <section>
        <div class="container mt-100 mb-100">
            <div class="row">
                <div class="col-xl-4 offset-xl-4">
                    <div class="section-tittle text-center mb-80">
                        <h2>TRENDING</h2>
                        <p> TOP VIEW IN THIS WEEK</p>
                    </div>

                </div>
            </div>



            <!-- singel-prodect-here  -->
            <div class="row">
                @foreach ($products as $product)

                <!-- singel-prodect-items-here  -->
                <div class="col-xl-4 col-md-4 col-sm-6 padding-minus">
                    <div class="singel-product-wrapper ">
                        <a href="{{ route('product_details',$product->slug) }}">
                            <div class="singel-product-img">
                                <div class="general-image">
                                    <img class="image" src="{{ url( $product->product_img[0]?? '' ) }}" alt="">
                                </div>
                                <div class="hover-image"><img src="{{ url( $product->product_img[1] ?? '' ) }}"
                                        alt=""></div>
                            </div>
                        </a>
                        <div class="singel-product-icon d-none d-lg-inline-block">
                            <ul>
                                <li>
                                    <!-- Button trigger modal -->
                                    <a href="add-cart.html" tooltip="MY Profile" flow="left" data-toggle="modal" data-target="#exampleModal{{ $product->id ??'' }}">
                                        <i class="far fa-eye"></i>
                                    </a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $product->id ?? '' }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- <div class="modal-header">

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div> -->
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="quick-view-left owl-carousel">
                                                            @foreach ($product->product_img as $img)
                                                            <div class="quick-img">
                                                                <img src="{{ $img ?? '' }}" alt="">
                                                            </div>
                                                            @endforeach

                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="quick-right-area">
                                                            <div class="quick-stock">
                                                                <span>SKU: {{ $product->sku_id }}</span>
                                                                @foreach ($varients as $varient)
                                                                @if ($product->id == $varient->product_id)

                                                                <span>Availability: {{ $varient->quantity>0 ? $varient->quantity:'0' }} in Stock</span>

                                                                @endif
                                                            @endforeach
                                                            </div>
                                                            <div class="quick-product-info">
                                                                <h2>{{ $product->product_name }}</h2>

                                                                <span class="quick-price">
                                                                    ${{ $product->price }}
                                                                </span>
                                                                <p>{!! $product->short_description !!}</p>
                                                            </div>
                                                            <div class="quick-product-form mt-20">
                                                                <form action="{{ route('cart.store',$product->id) }}" method="POST">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label for="size">Size</label>
                                                                       <select class="form-control quick-select" name="size" id="Size">
                                                                    @foreach ($varients as $varient)
                                                                        @if ($product->id == $varient->product_id)
                                                                        <option value="{{ $varient->size ?? '' }}">{{ $varient->size ?? '' }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                       </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="color">Color</label>
                                                                       <select class="form-control quick-select" name="color" id="color">
                                                                        @foreach ($varients as $varient)
                                                                        @if ($product->id == $varient->product_id)
                                                                        <option value="{{ $varient->color ?? '' }}">{{ $varient->color ?? '' }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                       </select>
                                                                    </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="count-wisth-list pr-30">
                                                    <div class="input-group inline-group d-flex align-items-center">
                                                        <div class="input-group-prepend">
                                                            <div class="btn-minus">

                                                            </div>
                                                        </div>
                                                        <input class="form-control quantity" min="0" name="quantity" value="1"
                                                            type="number">
                                                        <div class="input-group-append">
                                                            <div class="btn-plus">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-weight-hanging"></i> ADD TO CHART</button>
                                        </form>
                                        </div>

                                        </div>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="{{ route('wishlist.store',$product->id) }}" tooltip="Wishlist" flow="left"><i
                                            class="far fa-heart"></i></a></li>

                            </ul>
                        </div>

                        <div class="status">
                            @if (Carbon\Carbon::parse($product->created_at)->diffInDays(false) <3)
                            <span class="new">New</span>
                            @endif
                            @foreach ($varients as $varient)
                            @if ($product->id == $varient->product_id && $varient->quantity=0)
                            <span class="out-of-stok" >Out of Stock</span>
                            @endif
                        @endforeach
                        @if ($product->is_features == 'on')
                        <span class="fatured" >Fatured</span>
                        @endif


                           <!-- <span class="fatured" >Fatured</span>
                            <span class="off" >Fatured</span>
                            <span class="out-of-stok" >Fatured</span> -->
                        </div>
                        <div class="singel-product-content text-center">
                            <h4>{{ $product->product_name }}</h4>
                            <div class="review-icon">
                                <ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                </ul>

                            </div>
                            @foreach ($subcats as $subcat)
                                @if ($product->subcatagory_id==$subcat->id)

                                <p>{{ $subcat->subcatagory??'' }}</p>
                                @endif
                            @endforeach
                            <h6>${{ $product->price }}</h6>
                            <!-- small-image-on-product  -->
                            <div class="smail_thamb-img">
                                <ul class="thumbs">
                                    @foreach ($product->product_img as $productImg)

                                    <li><a class="active" href="{{ url( $productImg) }}"><img
                                        src="{{ url( $productImg ) }}" alt="">
                                    </a></li>
                                    @endforeach

                                </ul>
                            </div>
                            <!-- small-image-on-product  -->

                           <div class="color-list">

                                <ul class="color">
                                    @foreach ($varients as $varient)
                                        @if ($product->id == $varient->product_id)


                                        <li><a style="background-color: {{ $varient->color }};" ></a></li>

                                        @endif
                                    @endforeach
                                </ul>


{{--
                                <div class="form-group d-flex justify-content-center">
                                    <select class ="form-control" style="width: 170px" name="" id="">

                                    @foreach ($varients as $varient)
                                        @if ($product->id == $varient->product_id)


                                            <option value=" {{ $varient->size }}"> {{ $varient->size }}</option>


                                        @endif
                                    @endforeach

                                </select>
                                </div>  --}}

                                </div>
                                  <!-- responsive-eye-botton  -->

                        <!-- responsive-eye-end  -->
                            <a href="{{ route('cart.qstore',$product->id) }}"  class="btn"> <i class="fas fa-weight-hanging"></i> ADD TO CHART</a>

                            <div class="singel-product-icon-mobile">
                                <ul>
                                    <li><a href="product-details.html"><i class="far fa-eye"></i></a></li>
                                    <li><a href="add-cart.html"><i class="far fa-heart"></i></a></li>
                                    <li><a href="add-cart.html"><i class="fas fa-balance-scale"></i></a></li>
                                </ul>
                            </div>
                              <!-- responsive-eye-botton  -->
                        <div class="singel-product-responsive-icon text-center">
                            <ul>
                                <li><a href="product-details.html" data-toggle="modal" data-target="#exampleModal" tooltip="MY Profile" flow="left"
                                        data-placement="left"><i class="far fa-eye"></i></a></li>
                                <li><a href="add-cart.html" tooltip="MY Profile" flow="left"><i
                                            class="far fa-heart"></i></a></li>
                                <li><a href="add-cart.html" tooltip="MY Profile" flow="left"><i
                                            class="fas fa-balance-scale"></i></a></li>
                            </ul>
                        </div>
                        <!-- responsive-eye-end  -->

                        </div>

                    </div>
                </div>
                <!-- singel-prodect-items-here  -->
                @endforeach



        </div>
    </section>

    <!-- tranding-product-area-end-here  -->
    <!-- collection-detalis  -->
    <section>
        <div class="collection-details">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="singel-collection">
                            <img src="{{ url('/frontend/assets') }}/./images/myuses/collection/slide-01.jpg" alt="">
                            <div
                                class="singel-collect-info d-flex  align-items-center flex-column justify-content-center">
                                <p>FALL-WINTER CLEARANCE SALES</p>
                                <h5>GET UP TO <a href="#">50% OFF</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="singel-collection">
                            <img src="{{ url('/frontend/assets') }}/./images/myuses/collection/slide-02.jpg" alt="">
                            <div
                                class="singel-collect-info d-flex  align-items-center flex-column justify-content-center">
                                <p>FALL-WINTER CLEARANCE SALES</p>
                                <h5>GET UP TO <a href="#">50% OFF</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="singel-collection d-none d-lg-inline-block">
                            <img src="{{ url('/frontend/assets') }}/./images/myuses/collection/slide-03.jpg" alt="">
                            <div
                                class="singel-collect-info d-flex  align-items-center flex-column justify-content-center">
                                <p>FALL-WINTER CLEARANCE SALES</p>
                                <h5>GET UP TO <a href="#">50% OFF</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- collection-detalis  -->
     <!-- tranding-product-area-here  -->
     <section>
        <div class="container mt-100 mb-100">
            <div class="row">
                <div class="col-xl-4 offset-xl-4">
                    <div class="section-tittle text-center mb-80">
                        <h2>BEST SELLING</h2>
                        <p> TOP VIEW IN THIS WEEK</p>
                    </div>

                </div>
            </div>



            <!-- singel-prodect-here  -->
            <div class="row">
                <!-- singel-prodect-items-here  -->
                <div class="col-xl-4 col-md-4 col-sm-6 padding-minus">
                    <div class="singel-product-wrapper ">
                        <a href="shop.html">
                            <div class="singel-product-img">
                                <div class="general-image">
                                    <img class="image" src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01.jpg" alt="">
                                </div>
                                <div class="hover-image"><img src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-04.jpg"
                                        alt=""></div>
                            </div>
                        </a>
                        <div class="singel-product-icon d-none d-lg-inline-block">
                            <ul>
                                <li><a href="product-details.html" tooltip="MY Profile" flow="left"
                                        data-placement="left"><i class="far fa-eye"></i></a></li>
                                <li><a href="add-cart.html" tooltip="MY Profile" flow="left"><i
                                            class="far fa-heart"></i></a></li>
                                <li><a href="add-cart.html" tooltip="MY Profile" flow="left"><i
                                            class="fas fa-balance-scale"></i></a></li>
                            </ul>
                        </div>
                        <div class="status">
                            <span class="new">New</span>
                            <!-- <span class="fatured" >Fatured</span> -->
                            <!-- <span class="off" >Fatured</span>
            <span class="out-of-stok" >Fatured</span> -->
                        </div>
                        <div class="singel-product-content text-center">
                            <p>T-SHIRTS</p>
                            <div class="review-icon">
                                <Ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                </Ul>

                            </div>
                            <h5>Flared Shift Dress</h5>
                            <h6>$17</h6>
                            <!-- small-image-on-product  -->
                            <div class="smail_thamb-img">
                                <ul class="thumbs">
                                    <li><a class="active" href="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-04.jpg"><img
                                                src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-04.jpg" alt="">
                                        </a></li>
                                    <li><a href="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-03.jpg"><img
                                                src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-03.jpg" alt="">
                                        </a></li>
                                    <li><a href="{{ url('/frontend/assets') }}/./images/myuses/product/product-01.jpg"><img
                                                src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01.jpg" alt="">
                                        </a></li>
                                </ul>
                            </div>
                            <!-- small-image-on-product  -->

                            <!-- <div class="color-list">
                                </ul>
                                <ul class="color">
                                <li><a class="" href="#"></a></li>
                                <li><a class="" href="#"></a></li>
                                </ul>

                                </div> -->
                            <a href="shop.html" class="btn"> <i class="fas fa-weight-hanging"></i> ADD TO CHART</a>

                            <div class="singel-product-icon-mobile">
                                <ul>
                                    <li><a href="product-details.html"><i class="far fa-eye"></i></a></li>
                                    <li><a href="add-cart.html"><i class="far fa-heart"></i></a></li>
                                    <li><a href="add-cart.html"><i class="fas fa-balance-scale"></i></a></li>
                                </ul>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- singel-prodect-items-here  -->
                <!-- singel-prodect-items-here  -->
                <div class="col-xl-4 col-md-4 col-sm-6 padding-minus">
                    <div class="singel-product-wrapper ">
                        <a href="shop.html">
                            <div class="singel-product-img">
                                <div class="general-image">
                                    <img class="image" src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01.jpg" alt="">
                                </div>
                                <div class="hover-image"><img src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-04.jpg"
                                        alt=""></div>
                            </div>
                        </a>
                        <div class="singel-product-icon d-none d-lg-inline-block">
                            <ul>
                                <li><a href="product-details.html" tooltip="MY Profile" flow="left"
                                        data-placement="left"><i class="far fa-eye"></i></a></li>
                                <li><a href="add-cart.html" tooltip="MY Profile" flow="left"><i
                                            class="far fa-heart"></i></a></li>
                                <li><a href="add-cart.html" tooltip="MY Profile" flow="left"><i
                                            class="fas fa-balance-scale"></i></a></li>
                            </ul>
                        </div>
                        <div class="status">
                            <span class="new">New</span>
                            <!-- <span class="fatured" >Fatured</span> -->
                            <!-- <span class="off" >Fatured</span>
            <span class="out-of-stok" >Fatured</span> -->
                        </div>
                        <div class="singel-product-content text-center">
                            <p>T-SHIRTS</p>
                            <div class="review-icon">
                                <Ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                </Ul>

                            </div>
                            <h5>Flared Shift Dress</h5>
                            <h6>$17</h6>
                            <!-- small-image-on-product  -->
                            <div class="smail_thamb-img">
                                <ul class="thumbs">
                                    <li><a class="active" href="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-04.jpg"><img
                                                src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-04.jpg" alt="">
                                        </a></li>
                                    <li><a href="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-03.jpg"><img
                                                src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-03.jpg" alt="">
                                        </a></li>
                                    <li><a href="{{ url('/frontend/assets') }}/./images/myuses/product/product-01.jpg"><img
                                                src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01.jpg" alt="">
                                        </a></li>
                                </ul>
                            </div>
                            <!-- small-image-on-product  -->

                            <!-- <div class="color-list">
                                </ul>
                                <ul class="color">
                                <li><a class="" href="#"></a></li>
                                <li><a class="" href="#"></a></li>
                                </ul>

                                </div> -->
                            <a href="shop.html" class="btn"> <i class="fas fa-weight-hanging"></i> ADD TO CHART</a>

                            <div class="singel-product-icon-mobile">
                                <ul>
                                    <li><a href="product-details.html"><i class="far fa-eye"></i></a></li>
                                    <li><a href="add-cart.html"><i class="far fa-heart"></i></a></li>
                                    <li><a href="add-cart.html"><i class="fas fa-balance-scale"></i></a></li>
                                </ul>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- singel-prodect-items-here  -->
                  <!-- singel-prodect-items-here  -->
                  <div class="col-xl-4 col-md-4 col-sm-6 padding-minus">
                    <div class="singel-product-wrapper ">
                        <a href="shop.html">
                            <div class="singel-product-img">
                                <div class="general-image">
                                    <img class="image" src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01.jpg" alt="">
                                </div>
                                <div class="hover-image"><img src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-04.jpg"
                                        alt=""></div>
                            </div>
                        </a>
                        <div class="singel-product-icon d-none d-lg-inline-block">
                            <ul>
                                <li><a href="product-details.html" tooltip="MY Profile" flow="left"
                                        data-placement="left"><i class="far fa-eye"></i></a></li>
                                <li><a href="add-cart.html" tooltip="MY Profile" flow="left"><i
                                            class="far fa-heart"></i></a></li>
                                <li><a href="add-cart.html" tooltip="MY Profile" flow="left"><i
                                            class="fas fa-balance-scale"></i></a></li>
                            </ul>
                        </div>
                        <div class="status">
                            <span class="new">New</span>
                            <!-- <span class="fatured" >Fatured</span> -->
                            <!-- <span class="off" >Fatured</span>
            <span class="out-of-stok" >Fatured</span> -->
                        </div>
                        <div class="singel-product-content text-center">
                            <p>T-SHIRTS</p>
                            <div class="review-icon">
                                <Ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                </Ul>

                            </div>
                            <h5>Flared Shift Dress</h5>
                            <h6>$17</h6>
                            <!-- small-image-on-product  -->
                            <div class="smail_thamb-img">
                                <ul class="thumbs">
                                    <li><a class="active" href="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-04.jpg"><img
                                                src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-04.jpg" alt="">
                                        </a></li>
                                    <li><a href="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-03.jpg"><img
                                                src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-03.jpg" alt="">
                                        </a></li>
                                    <li><a href="{{ url('/frontend/assets') }}/./images/myuses/product/product-01.jpg"><img
                                                src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01.jpg" alt="">
                                        </a></li>
                                </ul>
                            </div>
                            <!-- small-image-on-product  -->

                            <!-- <div class="color-list">
                                </ul>
                                <ul class="color">
                                <li><a class="" href="#"></a></li>
                                <li><a class="" href="#"></a></li>
                                </ul>

                                </div> -->
                            <a href="shop.html" class="btn"> <i class="fas fa-weight-hanging"></i> ADD TO CHART</a>

                            <div class="singel-product-icon-mobile">
                                <ul>
                                    <li><a href="product-details.html"><i class="far fa-eye"></i></a></li>
                                    <li><a href="add-cart.html"><i class="far fa-heart"></i></a></li>
                                    <li><a href="add-cart.html"><i class="fas fa-balance-scale"></i></a></li>
                                </ul>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- singel-prodect-items-here  -->
                <!-- singel-prodect-items-here  -->
                <div class="col-xl-4 col-md-4 col-sm-6 padding-minus">
                    <div class="singel-product-wrapper ">
                        <a href="shop.html">
                            <div class="singel-product-img">
                                <div class="general-image">
                                    <img class="image" src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01.jpg" alt="">
                                </div>
                                <div class="hover-image"><img src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-04.jpg"
                                        alt=""></div>
                            </div>
                        </a>
                        <div class="singel-product-icon d-none d-lg-inline-block">
                            <ul>
                                <li><a href="product-details.html" tooltip="MY Profile" flow="left"
                                        data-placement="left"><i class="far fa-eye"></i></a></li>
                                <li><a href="add-cart.html" tooltip="MY Profile" flow="left"><i
                                            class="far fa-heart"></i></a></li>
                                <li><a href="add-cart.html" tooltip="MY Profile" flow="left"><i
                                            class="fas fa-balance-scale"></i></a></li>
                            </ul>
                        </div>
                        <div class="status">
                            <span class="new">New</span>
                            <!-- <span class="fatured" >Fatured</span> -->
                            <!-- <span class="off" >Fatured</span>
            <span class="out-of-stok" >Fatured</span> -->
                        </div>
                        <div class="singel-product-content text-center">
                            <p>T-SHIRTS</p>
                            <div class="review-icon">
                                <Ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                </Ul>

                            </div>
                            <h5>Flared Shift Dress</h5>
                            <h6>$17</h6>
                            <!-- small-image-on-product  -->
                            <div class="smail_thamb-img">
                                <ul class="thumbs">
                                    <li><a class="active" href="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-04.jpg"><img
                                                src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-04.jpg" alt="">
                                        </a></li>
                                    <li><a href="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-03.jpg"><img
                                                src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-03.jpg" alt="">
                                        </a></li>
                                    <li><a href="{{ url('/frontend/assets') }}/./images/myuses/product/product-01.jpg"><img
                                                src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01.jpg" alt="">
                                        </a></li>
                                </ul>
                            </div>
                            <!-- small-image-on-product  -->

                            <!-- <div class="color-list">
                                </ul>
                                <ul class="color">
                                <li><a class="" href="#"></a></li>
                                <li><a class="" href="#"></a></li>
                                </ul>

                                </div> -->
                            <a href="shop.html" class="btn"> <i class="fas fa-weight-hanging"></i> ADD TO CHART</a>

                            <div class="singel-product-icon-mobile">
                                <ul>
                                    <li><a href="product-details.html"><i class="far fa-eye"></i></a></li>
                                    <li><a href="add-cart.html"><i class="far fa-heart"></i></a></li>
                                    <li><a href="add-cart.html"><i class="fas fa-balance-scale"></i></a></li>
                                </ul>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- singel-prodect-items-here  -->
                  <!-- singel-prodect-items-here  -->
                  <div class="col-xl-4 col-md-4 col-sm-6 padding-minus">
                    <div class="singel-product-wrapper ">
                        <a href="shop.html">
                            <div class="singel-product-img">
                                <div class="general-image">
                                    <img class="image" src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01.jpg" alt="">
                                </div>
                                <div class="hover-image"><img src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-04.jpg"
                                        alt=""></div>
                            </div>
                        </a>
                        <div class="singel-product-icon d-none d-lg-inline-block">
                            <ul>
                                <li><a href="product-details.html" tooltip="MY Profile" flow="left"
                                        data-placement="left"><i class="far fa-eye"></i></a></li>
                                <li><a href="add-cart.html" tooltip="MY Profile" flow="left"><i
                                            class="far fa-heart"></i></a></li>
                                <li><a href="add-cart.html" tooltip="MY Profile" flow="left"><i
                                            class="fas fa-balance-scale"></i></a></li>
                            </ul>
                        </div>
                        <div class="status">
                            <span class="new">New</span>
                            <!-- <span class="fatured" >Fatured</span> -->
                            <!-- <span class="off" >Fatured</span>
            <span class="out-of-stok" >Fatured</span> -->
                        </div>
                        <div class="singel-product-content text-center">
                            <p>T-SHIRTS</p>
                            <div class="review-icon">
                                <Ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                </Ul>

                            </div>
                            <h5>Flared Shift Dress</h5>
                            <h6>$17</h6>
                            <!-- small-image-on-product  -->
                            <div class="smail_thamb-img">
                                <ul class="thumbs">
                                    <li><a class="active" href="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-04.jpg"><img
                                                src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-04.jpg" alt="">
                                        </a></li>
                                    <li><a href="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-03.jpg"><img
                                                src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-03.jpg" alt="">
                                        </a></li>
                                    <li><a href="{{ url('/frontend/assets') }}/./images/myuses/product/product-01.jpg"><img
                                                src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01.jpg" alt="">
                                        </a></li>
                                </ul>
                            </div>
                            <!-- small-image-on-product  -->

                            <!-- <div class="color-list">
                                </ul>
                                <ul class="color">
                                <li><a class="" href="#"></a></li>
                                <li><a class="" href="#"></a></li>
                                </ul>

                                </div> -->
                            <a href="shop.html" class="btn"> <i class="fas fa-weight-hanging"></i> ADD TO CHART</a>

                            <div class="singel-product-icon-mobile">
                                <ul>
                                    <li><a href="product-details.html"><i class="far fa-eye"></i></a></li>
                                    <li><a href="add-cart.html"><i class="far fa-heart"></i></a></li>
                                    <li><a href="add-cart.html"><i class="fas fa-balance-scale"></i></a></li>
                                </ul>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- singel-prodect-items-here  -->
                <!-- singel-prodect-items-here  -->
                <div class="col-xl-4 col-md-4 col-sm-6 padding-minus">
                    <div class="singel-product-wrapper ">
                        <a href="shop.html">
                            <div class="singel-product-img">
                                <div class="general-image">
                                    <img class="image" src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01.jpg" alt="">
                                </div>
                                <div class="hover-image"><img src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-04.jpg"
                                        alt=""></div>
                            </div>
                        </a>
                        <div class="singel-product-icon d-none d-lg-inline-block">
                            <ul>
                                <li><a href="product-details.html" tooltip="MY Profile" flow="left"
                                        data-placement="left"><i class="far fa-eye"></i></a></li>
                                <li><a href="add-cart.html" tooltip="MY Profile" flow="left"><i
                                            class="far fa-heart"></i></a></li>
                                <li><a href="add-cart.html" tooltip="MY Profile" flow="left"><i
                                            class="fas fa-balance-scale"></i></a></li>
                            </ul>
                        </div>
                        <div class="status">
                            <span class="new">New</span>
                            <!-- <span class="fatured" >Fatured</span> -->
                            <!-- <span class="off" >Fatured</span>
            <span class="out-of-stok" >Fatured</span> -->
                        </div>
                        <div class="singel-product-content text-center">
                            <p>T-SHIRTS</p>
                            <div class="review-icon">
                                <Ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                </Ul>

                            </div>
                            <h5>Flared Shift Dress</h5>
                            <h6>$17</h6>
                            <!-- small-image-on-product  -->
                            <div class="smail_thamb-img">
                                <ul class="thumbs">
                                    <li><a class="active" href="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-04.jpg"><img
                                                src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-04.jpg" alt="">
                                        </a></li>
                                    <li><a href="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-03.jpg"><img
                                                src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01-03.jpg" alt="">
                                        </a></li>
                                    <li><a href="{{ url('/frontend/assets') }}/./images/myuses/product/product-01.jpg"><img
                                                src="{{ url('/frontend/assets') }}/./images/myuses/product/product-01.jpg" alt="">
                                        </a></li>
                                </ul>
                            </div>
                            <!-- small-image-on-product  -->

                            <!-- <div class="color-list">
                                </ul>
                                <ul class="color">
                                <li><a class="" href="#"></a></li>
                                <li><a class="" href="#"></a></li>
                                </ul>

                                </div> -->
                            <a href="shop.html" class="btn"> <i class="fas fa-weight-hanging"></i> ADD TO CHART</a>

                            <div class="singel-product-icon-mobile">
                                <ul>
                                    <li><a href="product-details.html"><i class="far fa-eye"></i></a></li>
                                    <li><a href="add-cart.html"><i class="far fa-heart"></i></a></li>
                                    <li><a href="add-cart.html"><i class="fas fa-balance-scale"></i></a></li>
                                </ul>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- singel-prodect-items-here  -->




            </div>
            <!-- singel-prodect-here  -->

        </div>
    </section>

    <!-- tranding-product-area-end-here  -->
    <!-- BLOG-section-here  -->
    <section>
        <div class="blod-wrapper">
            <div class="container-fluid">
                <div class="row">
                    @foreach ($blogs as $blog)

                    <div class="col-xl-4 col-md-6 p-10">
                        <div class="blog-img ">
                            <img src="{{ url($blog->features_img) }}" alt="">
                            <div class="blog-bg"> </div>
                            <div
                                class="blog-content text-center d-flex  align-items-center flex-column justify-content-center">

                                <span>{{ $blog->author_name }}</span>
                              <a href="#">  <h5>
                                {{ $blog->title }}
                            </h5></a>
                                <p> {!! substr($blog->description,0,100) !!} </p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- BLOG-section-end-here  -->
    <!-- section-istagrap -->
    {{--  <section>
        <div class="container">
            <div class="row">
                <div class="col-xl-4 offset-xl-4">
                    <div class="section-tittle text-center mt-60 mb-80">
                        <h2><a href="#">@ FOLLOW</a> US ON</h2>

                        <span> INSTAGRAM</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-sm-4 p-0">
                    <div class="single-instagram-image">
                        <div class="instagram-overly"></div>
                        <div class="instagram-icon">
                            <i class="far fa-eye"></i>
                        </div>
                        <a href="#"> <img src="{{ url('/frontend/assets') }}/./images/myuses/instagram/insta01.jpg" alt=""> </a>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 p-0">
                    <div class="single-instagram-image">
                        <div class="instagram-overly"></div>
                        <div class="instagram-icon">
                            <i class="far fa-eye"></i>
                        </div>
                        <a href="#"> <img src="{{ url('/frontend/assets') }}/./images/myuses/instagram/insta02.jpg" alt=""> </a>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 p-0">
                    <div class="single-instagram-image">
                        <div class="instagram-overly"></div>
                        <div class="instagram-icon">
                            <i class="far fa-eye"></i>
                        </div>
                        <a href="#"> <img src="{{ url('/frontend/assets') }}/./images/myuses/instagram/insta03.jpg" alt=""> </a>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 p-0">
                    <div class="single-instagram-image">
                        <div class="instagram-overly"></div>
                        <div class="instagram-icon">
                            <i class="far fa-eye"></i>
                        </div>
                        <a href="#"> <img src="{{ url('/frontend/assets') }}/./images/myuses/instagram/insta04.jpg" alt=""> </a>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 p-0">
                    <div class="single-instagram-image">
                        <div class="instagram-overly"></div>
                        <div class="instagram-icon">
                            <i class="far fa-eye"></i>
                        </div>
                        <a href="#"> <img src="{{ url('/frontend/assets') }}/./images/myuses/instagram/insta05.jpg" alt=""> </a>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 p-0">
                    <div class="single-instagram-image">
                        <div class="instagram-overly"></div>
                        <div class="instagram-icon">
                            <i class="far fa-eye"></i>
                        </div>
                        <a href="#"> <img src="{{ url('/frontend/assets') }}/./images/myuses/instagram/insta06.jpg" alt=""> </a>
                    </div>
                </div>
            </div>
        </div>

    </section>  --}}
    <!-- section-istagrap-end -here -->
    <!-- feture-section-here  -->
    <section>
        <div class="feature-wrapper mt-100 mb-80">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="singel-feature d-flex justify-content-center align-items-center">
                            <div class="icon-part">
                                <a href="shop.html" class="icon"><i class="fas fa-car"></i></a>
                            </div>
                            <div class="text-part">
                                <h6>FREE SHIPPING</h6>
                                <p>Free shipping on all US order or order above $99</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="singel-feature d-flex justify-content-center align-items-center">
                            <div class="icon-part">
                                <a href="shop.html" class="icon"><i class="fas fa-headphones-alt"></i></a>
                            </div>
                            <div class="text-part">
                                <h6>FREE SHIPPING</h6>
                                <p>Free shipping on all US order or order above $99</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="singel-feature d-flex justify-content-center align-items-center">
                            <div class="icon-part">
                                <a href="shop.html" class="icon"><i class="fas fa-share"></i></a>
                            </div>
                            <div class="text-part">
                                <h6>FREE SHIPPING</h6>
                                <p>Free shipping on all US order or order above $99</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feture-section-end-here  -->
</main>
@endsection
