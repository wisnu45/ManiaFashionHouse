@extends('Frontend.partials.master')
@section('content')
<main class="home-margin pt-70">
    <section>
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
    </section>
    <section>
        <div class="compair-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-6 offset-3">
                        <div class="section-tittle text-center mt-60 mb-60">
                            <h2>Wishlist</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        @foreach ($wishlists as $wish)


        <!-- singel-product-wishlist  -->
        <div class="singel-wishlist-wrapper pb-30 mt-20">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-md-4">
                        <div class="singel-wishlist-items d-flex">
                            <div class="wish-list-img">
                                <img src="{{ url($wish->product->product_img[0]) }}" alt="">
                            </div>
                            <div class="wishlist-content">
                                <h6>{{ $wish->product->product_name }}</h6>
                                @foreach ($varients as $varient)
                                    @if ($varient->product_id == $wish->product->id)
                                    <div class="details">
                                        <p> <span>Size:</span>{{ $varient->size }}</p>
                                        <p> <span>Color: </span>{{ $varient->color }}</p>
                                        <p> <span>Count: </span>{{ $varient->quantity }}</p>
                                    </div>
                                    @endif
                                @endforeach

                                <!-- <div class="count-wisth-list ">
                                      <div class="input-group inline-group d-flex align-items-center">
                                          <div class="input-group-prepend">
                                              <div class="btn-minus">
                                                  <i class="fa fa-minus"></i>
                                              </div>
                                          </div>
                                          <input class="form-control quantity" min="0" name="quantity" value="1" type="number">
                                          <div class="input-group-append">
                                              <div class="btn-plus">
                                                  <i class="fa fa-plus"></i>
                                              </div>
                                          </div>
                                      </div>
                                  </div> -->

                            </div>
                        </div>
                    </div>

                    <div class=" col-2 col-md-1 col-lg-2 d-flex align-items-center">
                        <div class="wishlist-content">
                            <div class="price">${{ $wish->product->price }} </div>
                        </div>
                    </div>

                    <div class="col-4 col-md-2  col-lg-2 d-flex align-items-center">
                        <div class="count-wisth-list ">
                            <div class="input-group inline-group d-flex align-items-center">

                                <a href="shop.html" class="btn"> <i class="fas fa-weight-hanging"></i>ADD TO CART</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-4 d-flex align-items-center justify-content-center">
                        <div class="singel-wishlist-btn">

                            <a href="shop.html" class="btn"  data-toggle="modal" data-target="#exampleModal{{ $wish->id }}" > <i class="far fa-eye"></i>SEE PRODUCT</a>
                             <!-- Modal -->
                             <div class="modal fade" id="exampleModal{{ $wish->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    @foreach ($wish->product->product_img as $img)
                                                    <div class="quick-img">
                                                        <img src="{{ $img }}" alt="">
                                                    </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="quick-right-area">
                                                    <div class="quick-stock">
                                                        <span>SKU: {{ $wish->product->sku_id }}</span>
                                                        <span>Availability: 40 in Stock</span>
                                                    </div>
                                                    <div class="quick-product-info">
                                                        <h2>Cotton Blend Fleece Hoodie</h2>
                                                        <span class="quick-price">
                                                            ${{ $wish->product->price }}
                                                        </span>
                                                        <p>{!!  $wish->product->short_description !!}</p>
                                                    </div>
                                                    <div class="quick-product-form mt-20">
                                                        <form action="#">
                                                            <div class="form-group">
                                                                <label for="size">Size</label>
                                                               <select class="form-control quick-select" name="" id="Size">
                                                                @foreach ($varients as $varient)
                                                                @if ($varient->product_id == $wish->product->id)
                                                                <option value="{{ $varient->size }}">{{ $varient->size }}</option>
                                                                @endif
                                                            @endforeach

                                                               </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="color">Color</label>
                                                               <select class="form-control quick-select" name="" id="color">
                                                                @foreach ($varients as $varient)
                                                                @if ($varient->product_id == $wish->product->id)
                                                                <option value="{{ $varient->color }}">{{ $varient->color }}</option>
                                                                @endif
                                                            @endforeach
                                                               </select>
                                                            </div>
                                                        </form>
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
                                    <button type="button" class="btn btn-primary"><i class="fas fa-weight-hanging"></i> ADD TO CHART</button>
                                    </div>
                                </div>
                                </div>
                            </div>

                            <ul>

                                <li>
                                    <a href="#"> <i class="far fa-trash-alt"></i>REMOVE</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- singel-product-wishlist-end  -->

    </section>
    @endforeach

</main>
@endsection



{{--  <h1>Wishlist</h1>


<table border="1">
    <tr>

        <th>
            product Image
        </th>
        <th>product price</th>
        <th>Delete</th>

    </tr>

    @csrf
    @foreach ($wishlists as $wishlist)
    <tr>

        <td><img src="{{url($wishlist->product->product_img[0])}}" width="50" alt=""></td>
        <td>{{$wishlist->product->price}}</td>
        <td><a href="{{route('wishlistToCart.update',$wishlist->product_id)}}">Add to cart(wish to cart)</a></td>
    <td><a href="{{route('wishlist.delete',$wishlist->id)}}">Delete</a></td>

    </tr>
    @endforeach




</table>
  --}}





