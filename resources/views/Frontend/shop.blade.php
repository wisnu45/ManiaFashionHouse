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
                        <li> Collection</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- page navigation sectioin end here  -->
    <section>
        <div class="shap-items-wrapper">
            <div class="container-fluid">
                <div class="row ">
                    @foreach ($catagories as $cat)
                    <div class="col-6 p-10 ">
                        <div class="singel-collecton">
                            <img src="{{ url($cat->catagory_img ?? '') }}" alt="">
                            <a href="shop.html" class="btn extra-margin">{{ $cat->catagory_name ?? '' }}S</a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
</main>
@endsection
