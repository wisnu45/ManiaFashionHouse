@extends('Frontend.partials.master')
@section('content')
<main class="pt-60">

    <div class="checkout-area pt-5 pb-5">
        <div class="container">
            <div class="row">
               <div class="col-md-12">
                   <div class="checkout-wrapper">
                       <form action="#">
                         <div class="row">
                           <div class="col-md-6">
                               <div class="checkout-form">
                                   <h2>Billing Details</h2>

                                      <div class="form-group">
                                          <label for="name">Your Full Name *</label>
                                          <input type="text" id="name" class="form-control" placeholder="Your Name">
                                        </div>
                                      <div class="form-group">
                                          <label for="Company">Company name (Optional)*</label>
                                          <input type="text" id="Company" class="form-control" placeholder="Company name ">
                                        </div>

                                      <div class="form-group">
                                          <label for="division">Division *</label>
                                          <select name="dsf" class="form-control "   id="division">
                                              <option>Select Division</option>
                                              @foreach ($division as $div)
                                              <option value="{{ $div->id }}">{{ $div->name }}-{{ $div->bn_name }}</option>
                                              @endforeach

                                          </select>


                                        </div>
                                      <div class="form-group">
                                          <label for="district">District *</label>
                                          <select name="sdfs" class="form-control " style="width: 100%" id="district">
                                              <option>Select District</option>
                                              @foreach ($district as $dis)
                                              <option value="{{ $dis->id }}">{{ $dis->name }}-{{ $dis->bn_name }}</option>
                                              @endforeach
                                          </select>

                                        </div>
                                      <div class="form-group">
                                          <label for="upazila">upazila *</label>
                                          <select name="sdf" class="form-control "  id="upazila">
                                              <option >Select upazila</option>
                                              @foreach ($upazila as $up)
                                              <option value="{{ $up->id }}">{{ $up->name }}-{{ $up->bn_name }}</option>
                                              @endforeach
                                          </select>
                                        </div>
                                      <div class="form-group">
                                          <label for="Union">Union *</label>
                                          <select name="" class="form-control "  id="Union">
                                              <option>Select Union</option>
                                              @foreach ($union as $un)
                                              <option value="{{ $un->id }}">{{ $un->name }}-{{ $un->bn_name }}</option>
                                              @endforeach
                                          </select>
                                        </div>

                                      <div class="form-group">
                                          <label for="address">Address **</label>
                                          <input type="text" id="address" class="form-control" placeholder="Street Address ">
                                        </div>

                                      <div class="form-group">
                                          <label for="apartment">apartment</label>
                                          <input type="text" id="apartment" class="form-control" placeholder="apartment ">
                                        </div>

                                      <div class="form-group">
                                          <label for="ZIP">Postcode / ZIP *</label>
                                          <input type="text" id="ZIP" class="form-control" placeholder="ZIP Code ">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="phone">phone*</label>
                                                  <input type="text" id="phone" class="form-control" placeholder="phone ">
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="email">email*</label>
                                                  <input type="email" id="email" class="form-control" placeholder="email  ">
                                                </div>
                                            </div>
                                        </div>




                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="order-details pt-3">
                                  <div class="jumbotron jumbotron-fluid">
                                     <h2>YOUR ORDER</h2>
                                     <ul class="order_list">
                                         <li class="order-head">
                                             <span>Product</span>
                                             <span>Total</span>
                                          </li>
                                         <li >
                                             <span>Cart Subtotal </span>
                                             <span>120 BDT</span>
                                          </li>
                                         <li >
                                             <span>Shipping Rate </span>
                                             <span>120 BDT</span>
                                          </li>
                                         <li class="order-total" >
                                             <span>ORDER TOTAL </span>
                                             <span>120 BDT</span>
                                          </li>
                                     </ul>

                                    </div>
                                    <h3 class="payment">Select Your Payment Type</h3>
                                    <div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input pm_method" type="radio" name="payment_method" id="cash" value="cash">
                                          <label class="form-check-label" for="cash">Cash</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input pm_method" type="radio" name="payment_method" id="Bkash" value="Bkash">
                                          <label class="form-check-label" for="Bkash">Bkash</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input pm_method" type="radio" name="payment_method" id="cod" value="cod">
                                          <label class="form-check-label" for="cod">Cash on delivary</label>
                                        </div>
                                       </div>

                                      <div class="form-group mt-2 bkash_id">

                                        <input type="text" class="form-control" >
                                        <small id="emailHelp" class="form-text text-muted">Give Bkash payment transaction Id</small>
                                      </div>
                                        <button class="btn btn-primary mt-4" type="submit">Place an Order</button>

                               </div>
                           </div>
                         </div>

                       </form>
                   </div>
               </div>
            </div>
        </div>
    </div>
</main>
@endsection
