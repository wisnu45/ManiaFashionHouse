@extends('Frontend.partials.master')
@section('content')
<main class="pt-60">
    <!-- page navigation sectioin here  -->
    <div class="page-path">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul>
                        <li><a href="index.html">Home / </a></li>
                        <li> Product Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- page navigation sectioin end here  -->
    <section>
        <div class="singel-details-wrapper mt-60 mb-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-xl-7 col-md-12">
                        <div class="product-main">
                            <div id="carousel" class="slider">
                                @foreach ($product->product_img as $img)
                                <div data-thumb="{{ url($img) }}"><img
                                    src="{{ url($img) }}" alt=""></div>
                                    @endforeach
                                      {{--  <div data-thumb="{{ url('/Backend') }}/./images/myuses/product/product-01.jpg"><img
                                            src="./images/myuses/product/product-01.jpg" alt=""></div>
                                    <div data-thumb="{{ url('/Backend') }}/./images/myuses/product/product-03-02.jpg"><img
                                            src="{{ url('/Backend') }}/./images/myuses/product/product-03-02.jpg" alt=""></div>
                                    <div data-thumb="./images/myuses/product/product-03.jpg"><img
                                            src="{{ url('/Backend') }}/./images/myuses/product/product-03.jpg" alt=""></div>
                                    <div data-thumb="{{ url('/Backend') }}/./images/myuses/product/product-03.jpg"><img
                                            src="{{ url('/Backend') }}/./images/myuses/product/product-03.jpg" alt=""></div>  --}}
                            </div>
                            <div class="slider-arrow">
                                <div class="previous arrow-c">
                                    <i class="fas fa-arrow-left"></i>
                                </div>
                                <div class="next arrow-c">
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-7 col-lg-6 col-xl-5">
                        <div class="product_details mt-60">
                            <span>SKU: {{ $product->sku_id }}</span>
                            <span>Availability: <a href="£">40 in Stock</a></span>
                            <h2>{{ $product->product_name }}</h2>
                            <div class="price"><a href="£">${{ $product->price }}</a></div>
                            <div class="review">
                                <a href="#"><img src="./images/myuses/review/Star_rating_4.5_of_5.png" alt=""></a>
                                <span><a href="#">(1 Customer Review)</a></span>
                            </div>
                            <p>{!! $product->short_description !!}
                            </p>
                            {{-- <div class="time-blog d-flex">
                                <div class="singel-timer">
                                    <h4>72</h4><span>Day</span>
                                </div>
                                <div class="singel-timer">
                                    <h4>72</h4><span>Day</span>
                                </div>
                                <div class="singel-timer">
                                    <h4>72</h4><span>Day</span>
                                </div>
                                <div class="singel-timer">
                                    <h4>72</h4><span>Day</span>
                                </div>
                            </div> --}}

                            <div class="d-flex">
                                <div class="count-wisth-list mb-10">
                                    <div class="input-group inline-group d-flex align-items-center">
                                        <div class="count-wisth-lists ">
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


                                       {{-- <div class="d-flex align-items-center">
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
                                        </div>  --}}
                                    </div>
                                </div>
                                <div class="product-details-button d-none d-md-block">
                                    <a href="shop.html" class="btn"> <i class="fas fa-weight-hanging"></i>ADD TO
                                        CARD</a>
                                </div>
                                {{-- <div class="product-details-button02 d-md-none ">
                                    <a href="shop.html" class="btn"> <i class="fas fa-weight-hanging"></i>ADD TO
                                        CARD</a>
                                </div> --}}
                            </div>

                            <div class="product-icon-wrapper">
                                <ul>
                                    <li><a href="login.html"><i class="far fa-heart"></i>ADD TO THE WISHLIST</a>
                                    </li>
                                    {{--  <li><a href="login.html"><i class="fas fa-balance-scale"></i>ADD TO THE
                                            COMPARE</a></li>  --}}
                                </ul>
                            </div>
                            <div class="product-details">
                                <ul>
                                    <li>Brand: {{ $product->brand->brand_name }}</li>
                                    <li> Product Type: {{ $product->product_type }}</li>
                                    {{-- <li> Tag: T-Shirt, Women, Top</li> --}}
                                </ul>
                            </div>
                            <div class="peoduct-accordian">
                                <div class="accordion">
                                    <div class="card">
                                        <div class="card-header heder-border-none" id="headingOne">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                                    data-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    ADDITIONAL INFORMATION
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p><Span>Color:
                                                    </Span>
                                                    @foreach ($product->varient as $clr)
                                                        <p>{{ $clr->color }}</p>
                                                    @endforeach
                                                </p>
                                                <p> <span> Size:
                                                    </span> 20, 24</p>
                                                <p><span>Material: </span> {{ $product->material }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button"
                                                    data-toggle="collapse" data-target="#collapseTwo"
                                                    aria-expanded="false" aria-controls="collapseTwo">
                                                    DESCRIPTION
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                {!! $product->long_description !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button"
                                                    data-toggle="collapse" data-target="#collapseThree"
                                                    aria-expanded="false" aria-controls="collapseThree">
                                                    REVIEWS ({{ count($reviews) }})
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="review-wrapper">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h6>1 REVIEW FOR VARIABLE PRODUCT</h6>
                                                        <a href="">Write a review</a>
                                                    </div>
                                                    @foreach ($reviews as $review)
                                                    <div class="singel-client-review-wrapper">
                                                        <div class="d-flex ">
                                                            <div class="img">
                                                                <img src="./images/myuses/product-review/review-comments-img-01.jpg"
                                                                    alt="">
                                                            </div>
                                                            <div class="product-client-text">
                                                                <img src="./images/myuses/5start/pngbarn.png"
                                                                    alt="">
                                                                <p>by {{'Ananimous' }} on {{ $review->created_at->format('M d y') }}</p>

                                                                <p>{{ $review->comments }}</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    <div class="new-review-wrapper">

                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h4>YOUR RATING * </h4>
                                                                <p>Your email address will not be published.
                                                                    Required fields are marked *</p>
                                                                <form action="{{ route('product_reviews') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                                    <input type="hidden" value="{{ $product->slug }}" name="slug">
                                                                    <div class="form-group">
                                                                        <div
                                                                            class="d-flex flex-row justify-content-between">
                                                                            <label for="name"> NAME *</label>
                                                                            <label for="name">* Required
                                                                                Fields</label>
                                                                        </div>
                                                                        <input type="text" class="form-control" name="fname"
                                                                            id="name" placeholder="Name">
                                                                    </div>



                                                                    <div class="form-group">
                                                                        <label for="email">Email *</label>
                                                                        <input type="email" class="form-control"
                                                                            id="email" name="email" placeholder="Email here">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label
                                                                            for="exampleFormControlTextarea1">YOUR
                                                                            REVIEW *</label>
                                                                        <textarea name="comments" class="form-control"
                                                                            id="exampleFormControlTextarea1"
                                                                            rows="3"
                                                                            placeholder="Enter your review"></textarea>
                                                                    </div>

                                                                    <div
                                                                        class="d-flex align-items-center justify-content-between">

                                                                        <button type="submit" class="btn btn-primary" >Comment</button>


                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- social-icon  -->
    <section>
        <div class="prduct-details-social mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-6 offset-3">
                        <div class="social-icon text-center">
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-behance"></i></a>
                            <a href=""><i class="fab fa-linkedin"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                            <a href=""><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- social-icon-end  -->
    <!-- product-carosel  -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="product-tittle">
                        <h6>RELATED PRODUCT</h6>
                    </div>
                </div>
                <div class="col-md-6">
                </div>
            </div>
            <!-- singel-prodect-here  -->
            <div class="row ">
                <!-- singel-prodect-items-here  -->
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

            </div>

        </div>
    </section>
    <!-- product-carosel-end  -->

</main>
@endsection
