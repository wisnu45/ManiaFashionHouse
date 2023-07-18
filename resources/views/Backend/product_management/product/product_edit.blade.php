


@extends('Backend.dashboard.master')
@section('extra_css')
<!-- Jquery filer css -->
<link href="{{ url('/backend') }}/plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
<link href="{{ url('/backend') }}/plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

<!-- Bootstrap fileupload css -->
<link href="{{ url('/backend') }}/plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" />

<!-- Summernote css -->
<link href="{{ url('/backend') }}/plugins/summernote/summernote.css" rel="stylesheet" />

@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Catagory</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.create') }}">Product Create</a></li>

            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-10">

        <div class="card-box">
            <h4 class="header-title m-t-0">Add Product</h4>
            <form id="default-wizard" action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <fieldset title="1">
                    <legend>Basic Information</legend>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="catagory_id">Catagory</label>
                                    <select name="catagory_id" class="form-control" id="catagory_id">
                                        <option >Select Catagory</option>
                                        @foreach ($catagories as $catagory)
                                        <option {{ $catagory->id==$product->catagory_id?'selected':'' }} value="{{ $catagory->id }}">{{ $catagory->catagory_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="subcatagory_id">Subcatagory</label>
                                    <select name="subcatagory_id" class="form-control" id="subcatagory_id">
                                        <option v>Select Subcatagory</option>
                                        @foreach ($subcatagories as $subcat)
                                        <option {{ $subcat->id==$product->subcatagory_id?'selected':'' }} value="{{ $subcat->id }}">{{ $subcat->subcatagory }}</option>
                                        @endforeach
                                    </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="brand_id">Brand</label>
                                            <select name="brand_id" class="form-control" id="brand_id">
                                                <option >Select Brand</option>
                                                @foreach ($brands as $brand)
                                                <option {{ $brand->id==$product->brand_id?'selected':'' }} value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="card-box">
                                            <h4 class="header-title m-t-0">Upload Image</h4>
                                            <div class="p-20 p-b-0">
                                                <div class="form-group clearfix">
                                                    <div class="col-sm-12 padding-left-0 padding-right-0">
                                                        <input type="file" name="product_img[]" id="filer_input2"
                                                               multiple="multiple">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                             @foreach ($product->product_img as $img)
                                    <img src="{{ url( $img ) }}" width="50" alt="">
                                    @endforeach
                                        </div>


                            <div class="form-group">
                                <label for="SKU">SKU NO <span class="text-danger">*</span></label>
                                <input type="text" value="{{$product->sku_id  }}" name="sku_id" parsley-trigger="change" required
                                       placeholder="SKU NO." class="form-control" id="SKU">
                            </div>

                            <div class="form-group">
                                <label for="product_name">Product Name NO <span class="text-danger">*</span></label>
                                <input type="text" value="{{$product->product_name  }}" name="product_name" parsley-trigger="change" required
                                       placeholder="Product Name" class="form-control" id="product_name">
                            </div>


                            <div class="card-box">
                                <h4 class="m-b-30 m-t-0 header-title"><b>Product Short Description</b></h4>
                                <textarea name="short_description" id="description" placeholder="Product Description" cols="30" rows="10" class="form-control summernote">
                                   {{ $product->short_description }}
                                </textarea>
                            </div>


                        </div>
                        <div class="col-md-6">


                            <div class="card-box">
                                <h4 class="m-b-30 m-t-0 header-title"><b>Product Long Description</b></h4>
                                <textarea name="long_description" id="Description" placeholder="Product Description" cols="30" rows="10" class="form-control summernote">
                                  {{  $product->long_description}}
                                </textarea>
                            </div>
                            <div class="checkbox checkbox-success checkbox-circle">
                                <input id="checkbox-10" name="is_features" {{ $product->is_features == 'on'? 'checked':'' }} type="checkbox" >
                                <label for="checkbox-10">
                                    Make it Features product
                                </label>
                            </div>
                            <div class="checkbox checkbox-success checkbox-circle">
                                <input id="bestselling-10" name="best_selling" {{ $product->best_selling == 'on'? 'checked':'' }} type="checkbox" >
                                <label for="bestselling-10">
                                    Make it Best Selling product
                                </label>
                            </div>

                            <div class="form-group">
                                <label for="price">Price  <span class="text-danger">*</span></label>
                                <input type="text" value="{{$product->price  }}" name="price" parsley-trigger="change" required
                                       placeholder="Product price" class="form-control" id="price">
                            </div>

                            <div class="form-group">
                              <label for="Material"> Material </label>
                              <input type="text" value="{{$product->material  }}" name="material" id="Material" placeholder="Material" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="product type">product type NO <span class="text-danger">*</span></label>
                                <input type="text" value="{{$product->product_type  }}" name="product_type" parsley-trigger="change" required
                                       placeholder="Product type" class="form-control" id="product type">
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                    <select name="status" class="form-control" id="status">
                                        <option >Select status</option>
                                        <option {{ $product->status==1?'selected':'' }} value="1">Active</option>
                                        <option {{ $product->status==0?'selected':'' }} value="0">Deactive</option>

                                    </select>
                                </div>
                        </div>
                    </div>
                </fieldset>

                <fieldset title="2">
                    <legend>SEO</legend>

                    <div class="row m-t-20">
                        <div class="col-sm-6">
                            {{--  <div class="form-group">
                                <label for="metaTitle">Meta Title</label>
                                <input type="text" value="{{$product->meta_title  }}"  id="metaTitle" class="form-control" name='meta_title' placeholder='Meta Title'>
                            </div>  --}}
                            <div class="m-t-20">
                                <p class="text-muted m-b-15 font-14">
                                    Meta Title
                                </p>
                                <input type="text" name="meta_title" class="form-control" maxlength="60" value="{{$product->meta_title  }}" placeholder="Meta Title has a limit of 60 chars." id="alloptions" />
                            </div>

                            <div class="form-group">
                                <label for="slug">Meta slug</label>
                                <input type="text" value="{{$product->slug  }}"  id="slug" class="form-control" name='slug' placeholder='Meta slug'>
                            </div>

                           {{--  <div class="form-group">
                                <label for="meta_desc">Meta Description</label>
                                <textarea id="meta_desc" class="form-control"  name='meta_description' placeholder='Meta Description' cols="30" rows="10">
                                 {{$product->meta_description  }}
                                </textarea>
                            </div>  --}}
                            <div class="m-t-20">
                                <p class="text-muted m-b-15 font-14">
                                    Meta Description
                                </p>
                                <textarea id="textarea"  name="meta_description" class="form-control" maxlength="160" rows="3" placeholder="Meta description has a limit of 160 chars.">
                                    {{$product->meta_description  }}
                                </textarea>
                            </div>
                            </div>
                        </div>

                    </div>
                </fieldset>
                <button class="btn btn-primary waves-effect waves-light stepy-finish" type="submit">
                    Update
                </button>
                <a class="btn btn-inverse waves-effect waves-light "  href="{{ route('product.index') }}">Back</a>

            </form>
        </div> <!-- end card-box -->
    </div>
    <!-- end col -->


</div>


@endsection

@section('extra_js')

<!-- Jquery filer js -->
<script src="{{ url('/backend') }}/plugins/jquery.filer/js/jquery.filer.min.js"></script>

<!-- Bootstrap fileupload js -->
<script src="{{ url('/backend') }}/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<!-- page specific js -->
<script src="{{ url('/backend') }}/assets/pages/jquery.fileuploads.init.js"></script>

<!-- App js -->
<script src="{{ url('/backend') }}/assets/js/jquery.core.js"></script>
<script src="{{ url('/backend') }}/assets/js/jquery.app.js"></script>

<!--Summernote js-->
<script src="{{ url('/backend') }}/plugins/summernote/summernote.min.js"></script>
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
    })
</script>
{{--  step by step js  --}}
<!--Form Wizard-->
<script src="{{ url('/backend') }}/plugins/jquery.stepy/jquery.stepy.min.js" type="text/javascript"></script>
<!--wizard initialization-->
<script src="{{ url('/backend') }}/assets/pages/jquery.wizard-init.js" type="text/javascript"></script>
<script src="{{ url('/backend') }}/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
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

{{--  dropdown dependency  --}}

$('#catagory_id').change(function(){
    var catagory = $(this).val();
    if(catagory){
        $.ajax({
           type:"GET",
           url:"{{url('/product/azax')}}/"+catagory,
           success:function(res){
            if(res){
                $("#subcatagory_id").empty();
                $("#subcatagory_id").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#subcatagory_id").append(`<option value='${value.id}'> ${value.subcatagory}</option>`);
                });

            }else{
               $("#subcatagory_id").empty();
            }
           }
        });
    }else{
        $("#catagory_id").empty();
        $("#subcatagory_id").empty();
    }
   });
   {{--  slug  --}}

   $('#MetaTitle').keyup(function() {
    $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
});

    });

</script>

@endsection


