<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">

                    @if (session('success'))

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong> {{ session('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <h2>product page</h2>
                    @foreach ($products as $item)
                    <div class="product-1">
                    <h2>product-{{$item->id}}</h2>
                        <div> <a href="{{route('cart.store',$item->id)}}">Quick add to cart</a></div>
                    <div> <a href="{{route('wishlist.store',$item->id)}}">wished to buy</a></div>
                    </div>
                    @endforeach
                </div>

                <div style="margin-top:20px"><a href="{{route('cart.index')}}">view Cart</a></div>
                <div><a href="{{route('wishlist.index')}}">view wishlist</a></div>

            </div>
        </div>

    </body>
</html>
