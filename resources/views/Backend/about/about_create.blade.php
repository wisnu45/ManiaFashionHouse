

@extends('Backend.dashboard.master')
@section('extra_css')

<!-- Summernote css -->
<link href="{{ url('/backend') }}/plugins/summernote/summernote.css" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Catagory</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Visit site</a></li>
                <li class="breadcrumb-item"><a href="{{ route('about.index') }}">About </a></li>
                <li class="breadcrumb-item"><a href="{{ route('about.create') }}">About Create</a></li>

            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
      <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-box">
                <h4 class="m-t-0 m-b-30 header-title">CREATE About</h4>

                <form action="{{ route('about.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="about_title" placeholder="Enter about title"class="form-control" >
                    </div>

                    <div class="form-group">
                        <label for="Notes">Notes</label>
                        <textarea name="short_notes" id="Notes" placeholder="Enter short notes" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="quote">Quotes</label>
                        <input type="text" id="quote" name="quotes" placeholder="Enter quotes" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label for="author_name"> Author Name</label>
                            <input type="text" id="author_name" name="author_name" placeholder="Enter author name" class="form-control" >
                    </div>


                    <div class="form-group">
                        <label for="story">Our Story</label>
                        <textarea name="our_story" id="story" class="form-control summernote" placeholder="Enter our story" cols="30" rows="10"></textarea>
                    </div>



                    <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                    <a class="btn btn-inverse waves-effect waves-light" href="{{ route('contact.index') }}">Back</a>
                </form>
            </div>
        </div>
      </div>
@endsection

@section('extra_js')


<!--Summernote js-->
<script src="{{ url('/backend') }}/plugins/summernote/summernote.min.js"></script>
@endsection

@section('main_js')
<script>
    jQuery(document).ready(function(){

        $('.summernote').summernote({
            height: 200,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: false                 // set focus to editable area after initializing summernote
        });

        $('.inline-editor').summernote({
            airMode: true
        });



    });

</script>

@endsection
