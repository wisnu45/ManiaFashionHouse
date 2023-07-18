@extends('Frontend.partials.master')

@section('content')
<main class="pt-60">
    <section>
        <div class="page-path">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <ul>
                            <li><a href="index.html">Home / </a></li>
                            <li>
                                Listing
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 d-none d-lg-inline-block">
                    <!-- shorting-area -->
                    <div class="singel-shorting mt-30">
                        <div class="shorting-tittle d-flex   justify-content-between">
                            <h4>SORT BY</h4>
                            <span class="tittle-cross" id="toggle-btn" data-toggle="collapse"
                                data-target="#toggle-example"></span>
                        </div>
                        <hr>
                        <div id="toggle-example" class="collapse show">
                            <ul class="list">
                                @foreach ($collections as $collect)

                                <li><a href="{{ route('shop.collection',$collect->id) }}"><span class="cross"></span> {{ $collect->catagory_name }}</a></li>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="singel-shorting">
                        <div class="shorting-tittle d-flex   justify-content-between">
                            <h4>SORT BY</h4>
                            <span class="tittle-cross" id="toggle-btn2" data-toggle="collapse"
                                data-target="#toggle-example2"></span>
                        </div>
                        <hr>
                        <div id="toggle-example2" class="collapse show">
                            <ul class="list">
                                @foreach ($subcats as $subcat)

                                <li><a href="{{ route('shop.subcollection',$subcat->id) }}">{{ $subcat->subcatagory }}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <div class="singel-shorting">
                        <div class="shorting-tittle d-flex   justify-content-between">
                            <h4>FILTER BY PRICE</h4>
                            <span class="tittle-cross" id="toggle-btn3" data-toggle="collapse"
                                data-target="#toggle-example3"></span>
                        </div>
                        <hr>
                        <div id="toggle-example3" class="collapse show">
                            <ul class="list">
                                <li><a href="#">৳100 - ৳499</a></li>
                                <li><a href="#">৳500 - ৳999</a></li>
                                <li><a href="#">৳1000 - ৳1499</a></li>
                                <li><a href="#">৳1500 - ৳1999</a></li>
                                <li><a href="#">৳2000 - ৳3000</a></li>
                                <li><a href="#">৳2000 - ৳10,000</a></li>

                            </ul>

                        </div>
                    </div>
                    <!-- shorting-area-with product -->
                    <div class="singel-shorting">
                        <div class="shorting-tittle d-flex   justify-content-between">
                            <h4>Hot Itesm</h4>
                            <span class="tittle-cross" id="toggle-btn4" data-toggle="collapse"
                                data-target="#toggle-example4"></span>
                        </div>
                        <hr>
                        <div id="toggle-example4" class="collapse show">
                            <div class="singel-prodect d-flex">
                                <div class="image">
                                    <img src="./images/myuses/product/product-02.jpg" alt="">
                                </div>
                                <div class="singel-content">
                                    <h6>Shite dress</h6>
                                    <span> <del>$10</del> $5 </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="singel-shorting">
                        <div class="shorting-tittle d-flex   justify-content-between">
                            <h4>FILTER BY COLOUR</h4>
                            <span class="tittle-cross" id="toggle-btn5" data-toggle="collapse"
                                data-target="#toggle-example5"></span>
                        </div>
                        <hr>
                        <div id="toggle-example5" class="collapse show">
                            <div class="color-list">

                                <ul class="color">
                                    @foreach ($varients as $var)

                                    <li><a  style="background-color:{{ $var->color }}" href="{{ route('color.product',$var->product_id) }}"></a></li>
                                    {{-- <li><a class="" href="#"></a></li> --}}
                                    @endforeach


                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="singel-shorting last-shorting">
                        <div class="shorting-tittle d-flex   justify-content-between">
                            <h4>Brands</h4>
                            <span class="tittle-cross" id="toggle-btn5" data-toggle="collapse"
                                data-target="#toggle-example6"></span>
                        </div>
                        <hr>
                        <div id="toggle-example6" class="collapse show">


                            <ul class="tags">
                                @foreach ($brands as $brand)

                                <li><a class="" href="{{ route('shop.brand',$brand->id) }}">{{ $brand->brand_name }}</a></li>
                                @endforeach





                            </ul>

                        </div>

                    </div>
                    <!-- shorting-area -end-->
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-xl-8 col-md-12 col-lg-8">
                            <div class="listing-left-wrapper mt-60 mb-60">
                                <div class="section-tittle ">
                                    <h2>Products ({{ count($products) }})</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-6 col-xs-4 d-flex align-items-center d-lg-none d-md-inline-block">
                            <div class="responsive-filter">
                                <a class="add-filter" href="#"><i class="fas fa-filter"></i> FILTER </a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-xs-8 col-6 d-flex align-items-center col-lg-4">
                            <select class="select">
                                <option data-display="Data Sorting">Data Sorting</option>
                                <option value="1">Data Sorting</option>
                                <option value="2">Data Sorting</option>
                            </select>
                            <select class="select">
                                <option data-display="Show">2</option>
                                <option value="1">15</option>
                                <option value="2">15</option>
                            </select>
                            <div class="shoting-colom">
                                <a href="#"><i class="fas fa-th-large"></i></a>
                            </div>
                            <div class="shoting-colom">
                                <a href="#"><i class="fas fa-th"></i></a>
                            </div>
                        </div>

                    </div>
                    <!-- singel-prodect-here  -->
                    <div class="row">
                        <!-- singel-prodect-items-here  -->
                        @foreach ($products as $product)

                        <!-- singel-prodect-items-here  -->
                        <div class="col-xl-4 col-md-4 col-sm-6 padding-minus">
                            <div class="singel-product-wrapper ">
                                <a href="shop.html">
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
                                    @foreach ($subcats as $subcat)
                                        @if ($product->subcatagory_id==$subcat->id)

                                        <p>{{ $subcat->subcatagory??'' }}</p>
                                        @endif
                                    @endforeach
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
                                    <h5>{{ $product->product_name }}</h5>
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
                        <!-- singel-prodect-items-here  -->





                    </div>
                    <!-- singel-prodect-here  -->
                </div>
                <!-- rsposive-side-bar-wrapper  -->
                <div class="filter-side-bar-wrapper d-lg-none">
                    <div class="filter-close close-common">
                        <a class="close-filter-side-bar" href="#">close <i class="far fa-times-circle"></i></a>
                    </div>
                    <div class="singel-shorting mt-30">
                        <div class="shorting-tittle d-flex   justify-content-between">
                            <h4>SORT BY</h4>
                            <span class="tittle-cross" id="toggle-btn11" data-toggle="collapse"
                                data-target="#toggle-example11"></span>
                        </div>
                        <hr>
                        <div id="toggle-example11" class="collapse show">
                            <ul class="list">
                                <li><a href="#"><span class="cross"></span> Shirts & Tops</a></li>
                                <li><a href="#"><span class="cross"></span> Xs</a></li>
                                <li><a href="#"><span class="cross"></span> Shirts & Tops</a></li>
                                <li><a href="#"><span class="cross"></span> Shirts</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="singel-shorting">
                        <div class="shorting-tittle d-flex   justify-content-between">
                            <h4>SORT BY</h4>
                            <span class="tittle-cross" id="toggle-btn12" data-toggle="collapse"
                                data-target="#toggle-example12"></span>
                        </div>
                        <hr>
                        <div id="toggle-example12" class="collapse show">
                            <ul class="list">
                                <li><a href="#">Dresses</a></li>
                                <li><a href="#">Pants</a></li>
                                <li><a href="#">Jumpsuits & Shorts</a></li>
                                <li><a href="#">Swimwear</a></li>
                                <li><a href="#">Skirts</a></li>
                                <li><a href="#">FILTER B</a></li>
                                <li><a href="#">Swimwear</a></li>
                                <li><a href="#">Jeans</a></li>
                                <li><a href="#">Activewear</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="singel-shorting">
                        <div class="shorting-tittle d-flex   justify-content-between">
                            <h4>FILTER BY PRICE</h4>
                            <span class="tittle-cross" id="toggle-btn13" data-toggle="collapse"
                                data-target="#toggle-example13"></span>
                        </div>
                        <hr>
                        <div id="toggle-example13" class="collapse show">
                            <ul class="list">
                                <li><a href="#">$0 - $50</a></li>
                                <li><a href="#">$0 - $550</a></li>
                                <li><a href="#">$0 - $1050</a></li>
                                <li><a href="#">$0 - $2050</a></li>

                        </div>
                    </div>
                    <!-- shorting-area-with product -->
                    <div class="singel-shorting">
                        <div class="shorting-tittle d-flex   justify-content-between">
                            <h4>Hot Itesm</h4>
                            <span class="tittle-cross" id="toggle-btn14" data-toggle="collapse"
                                data-target="#toggle-example14"></span>
                        </div>
                        <hr>
                        <div id="toggle-example14" class="collapse show">
                            <div class="singel-prodect d-flex">
                                <div class="image">
                                    <img src="./images/myuses/product/product-02.jpg" alt="">
                                </div>
                                <div class="singel-content">
                                    <h6>Shite dress</h6>
                                    <span> <del>$10</del> $5 </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="singel-shorting">
                        <div class="shorting-tittle d-flex   justify-content-between">
                            <h4>FILTER BY COLOUR</h4>
                            <span class="tittle-cross" id="toggle-btn15" data-toggle="collapse"
                                data-target="#toggle-example15"></span>
                        </div>
                        <hr>
                        <div id="toggle-example15" class="collapse show">
                            <div class="color-list">
                                </ul>
                                <ul class="color">
                                    <li><a class="" href="#"></a></li>
                                    <li><a class="" href="#"></a></li>
                                    <li><a class="" href="#"></a></li>
                                    <li><a class="" href="#"></a></li>
                                    <li><a class="" href="#"></a></li>
                                    <li><a class="" href="#"></a></li>
                                    <li><a class="" href="#"></a></li>
                                    <li><a class="" href="#"></a></li>
                                    <li><a class="" href="#"></a></li>
                                    <li><a class="" href="#"></a></li>
                                    <li><a class="" href="#"></a></li>
                                    <li><a class="" href="#"></a></li>
                                    <li><a class="active" href="#"></a></li>

                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="singel-shorting last-shorting">
                        <div class="shorting-tittle d-flex   justify-content-between">
                            <h4>Tags</h4>
                            <span class="tittle-cross" id="toggle-btn16" data-toggle="collapse"
                                data-target="#toggle-example16"></span>
                        </div>
                        <hr>
                        <div id="toggle-example16" class="collapse show">

                            </ul>
                            <ul class="tags">
                                <li><a class="" href="#">Dresses</a></li>
                                <li><a class="" href="#">Shirts & Tops</a></li>
                                <br>
                                <li><a class="" href="#">Polo Shirts</a></li>
                                <li><a class="" href="#">Dresses</a></li>
                                <li><a class="" href="#">Sweaters</a></li>
                                <br>
                                <li><a class="" href="#">Blazers</a></li>
                                <li><a class="" href="#">Blazers</a></li>
                                <li><a class="" href="#">Blazers</a></li>
                                <br>
                                <li><a class="" href="#">Blazers</a></li>
                                <li><a class="" href="#">Blazers</a></li>



                            </ul>

                        </div>

                    </div>
                    <!-- shorting-area -end-->
                </div>
    </section>
    <section>
        <div class="container mb-60 mt-30">
            <div class="row">
                <div class="col-6 offset-4 text-center">
                    <a href="#" class="btn">View More</a>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
