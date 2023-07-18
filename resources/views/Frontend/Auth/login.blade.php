@extends('Frontend.partials.master')
@section('content')
 <!-- page navigation sectioin end here  -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 offset-xl-4">
                        <div class="section-tittle mt-20 mb-40 text-center">
                            <h2>ALREADY REGISTERED?</h2>
                        </div>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-md-6 mb-100">
                        <div class="card ">
                            <div class="card-body">
                                <h4>NEW CUSTOMER</h4>
                                <p>By creating an account with our store, you will be able to move through the checkout
                                    process faster, store multiple shipping addresses, view and track your orders in
                                    your account and more.</p>
                                <a href="register.html" class="btn">CREATE AN ACCOUNT</a>
                                <div class="mb-150"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-30">
                        <div class="card">
                            <div class="card-body">
                                <h4>LOG IN</h4>
                                <p>If you have an account with us, please log in.</p>
                                <form>
                                    <div class="form-group">
                                        <div class="d-flex flex-row justify-content-between"> <label for="name">FIRST
                                                NAME *</label>
                                            <label for="name">* Required Fields</label>
                                        </div>
                                        <input type="text" class="form-control" id="name" placeholder="Name or E-MAIL">
                                    </div>



                                    <div class="form-group">
                                        <label for="password">PASSWORD *</label>
                                        <input type="password" class="form-control" id="password"
                                            placeholder="Password">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="#" class="btn">Log IN</a>
                                        <a class="ml-20" href="#">or Lost your password?</a>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    
@endsection