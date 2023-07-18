
@extends('Backend.dashboard.master')


@section('extra_css')
<!-- Jquery filer css -->
<link href="{{ url('/backend') }}/plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
<link href="{{ url('/backend') }}/plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

<!-- Bootstrap fileupload css -->
<link href="{{ url('/backend') }}/plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" />



<!-- Summernote css -->
<link href="{{ url('/backend') }}/plugins/summernote/summernote.css" rel="stylesheet" />

<!-- Plugins css-->
<link href="{{ url('/backend') }}/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
<link href="{{ url('/backend') }}/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
<link href="{{ url('/backend') }}/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('/backend') }}/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ url('/backend') }}/plugins/switchery/switchery.min.css">

@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Catagory</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Visit site</a></li>
                <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
                {{--  <li class="breadcrumb-item"><a href="{{ route('blog.edit,$blog->id') }}">Edit Blog</a></li>  --}}

            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>Edit Blog</b></h4>
                <form id="wizard-clickable" action="{{route('blog.update',$blog->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset title="1">
                        <legend>Blog Information</legend>
                        <div class="row m-t-20">
                            <div class="col-sm-6">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="{{ url($blog->features_img) }}" alt="image" />
                                    </div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                    <div>
                                        <button type="button" class="btn btn-secondary btn-file">
                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                            <input type="file" name="features_img" class="btn-secondary" />
                                        </button>
                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="author_name">Author Name</label>
                                    <input type="text" id="author_name" class="form-control" value="{{ $blog->author_name }}" name='author_name' placeholder='Author Name'>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="tag">Tag</label>
                                    <div class="tags-default">
                                        <input type="text" value="{{ $blog->tag }}"  name='tag' data-role="tagsinput" placeholder="add tags"/>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" value="{{ $blog->title }}"  id="title" class="form-control"  name='title' placeholder='blog Title'>
                                </div>
                             <div class="form-group">
                                    <label for="Description">Description</label>
                                    <textarea id="Description" name='description' class="form-control summernote"  placeholder='blog Description' cols="30" rows="10">
                                      {{  $blog->description }}
                                    </textarea>
                                </div>
                        </div>

                    </fieldset>

                    <fieldset title="2">
                        <legend>SEO</legend>
                        <div class="row m-t-20">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="metaTitle">Meta Title</label>
                                    <input type="text" value="{{ $blog->meta_title }}"  id="metaTitle" class="form-control" name='meta_title' placeholder='Meta Title'>
                                </div>
                                <div class="form-group">
                                    <label for="slug">Meta slug</label>
                                    <input type="text" id="slug" class="form-control" name='slug' placeholder='Meta slug'>
                                </div>
                               <div class="form-group">
                                    <label for="meta_desc">Meta Description</label>
                                    <textarea id="meta_desc" class="form-control"  name='meta_description' placeholder='Meta Description' cols="30" rows="10">
                                      {{  $blog->meta_description}}
                                    </textarea>
                                </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <button type="submit" class="btn btn-primary stepy-finish">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('extra_js')
<!-- Jquery filer js -->
<script src="{{ url('/backend') }}/plugins/jquery.filer/js/jquery.filer.min.js"></script>

<!-- Bootstrap fileupload js -->
<script src="{{ url('/backend') }}/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<!-- page specific js -->
<script src="{{ url('/backend') }}/assets/pages/jquery.fileuploads.init.js"></script>
<!--Summernote js-->
<script src="{{ url('/backend') }}/plugins/summernote/summernote.min.js"></script>


{{--  tadg  --}}
<script src="{{ url('/backend') }}/plugins/switchery/switchery.min.js"></script>
<script src="{{ url('/backend') }}/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
<script src="{{ url('/backend') }}/plugins/select2/js/select2.min.js" type="text/javascript"></script>

{{--  step by step js  --}}
<!--Form Wizard-->
<script src="{{ url('/backend') }}/plugins/jquery.stepy/jquery.stepy.min.js" type="text/javascript"></script>
<!--wizard initialization-->
<script src="{{ url('/backend') }}/assets/pages/jquery.wizard-init.js" type="text/javascript"></script>
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
@section('main_js')
    <script>
        $('#metaTitle').keyup(function() {
            $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
        });
    </script>
@endsection











