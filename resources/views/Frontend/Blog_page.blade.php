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
                            <li> Blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- page tittle -->
                    <div class="section-tittle mt-60 mb-60 text-center">
                        <h1>THE BLOG</h1>
                    </div>
                    <!-- page tittle-end -->
                </div>
            </div>
        </div>
    </section>
    <!-- product-blog  -->
    <section>
        <div class="blog-post-wrapper">
            <div class="container">
                @foreach ($blogs as $blog)
                    @if (!empty($blog->features_img))
                    <!-- singel-blog-post  -->
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6  col-12">
                            <div class="singel-blog-image mb-30">
                               <a href="#"> <img src="{{ url($blog->features_img) }}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6  col-12">
                            <div class="singel-blog-text mb-30">
                                <span><a href="fashion.html">Fashion</a></span>
                                <a href="#"><h3>{{ $blog->title }}</h3></a>
                                <p>{!! $blog->description !!}</p>
                                <div class="post-publiser-name">
                                    by <span class="author_name">{{ $blog->author_name }}</span><span>on {{ $blog->created_at->format('M d, Y') }}</span><img
                                        src="{{ url('/frontend/assets') }}/./images/icon/speech-bubble.png" alt="">
                                </div>
                                <a href="blog-details.html" class="btn">Read more</a>
                            </div>
                        </div>
                    </div>
                    <!-- singel-blog-post  -->




                        @else
                        <!-- singel-blog-post  -->
                        <div class="row">
                            <div class="col-12">
                                <div class="singel-blog-text m-0 singel-blog-text-padding">
                                    <span>FASHION</span>
                                    <h2>{{ $blog->title }}</h2>
                                    <p>{!! $blog->description !!}</p>
                                    <div class="post-publiser-name mb-30">
                                        by <span class="author_name">{{ $blog->author_name }}</span><span>on {{ $blog->created_at->format('M d, Y') }}</span><img
                                        src="{{ url(frontend/assets) }}/./images/icon/speech-bubble.png" alt="">

                                    </div>
                                    <a href="blog-details.html" class="btn">Read more</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach


            </div>
        </div>
    </section>

    <!-- pagination -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <div class="pagination  ">
                        <ul>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
