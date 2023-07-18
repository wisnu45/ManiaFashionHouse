@extends('Frontend.partials.master')

    
@section('breadcrumb')
     <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Login</li>
            </ol>
@endsection
@section('content')
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
                                <a href="{{route('register')}}" class="btn">CREATE AN ACCOUNT</a>
                                <div class="mb-150"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-30">
                        <div class="card">
                            <div class="card-body">
                                <h4>LOG IN</h4>
                                <p>If you have an account with us, please log in.</p>
                             <form method="POST" action="{{ route('login') }}">
                                @csrf
                                    <div class="form-group">
                                        <div class="d-flex flex-row justify-content-between"> <label for="email">E-mail
                                                 *</label>
                                            <label for="email">* Required Fields</label>
                                        </div>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="password">PASSWORD *</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between">
                                     <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                  </div>
                                       
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>

                                         @if (Route::has('password.request'))
                                            <a class="ml-20" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif

                                        

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
@endsection