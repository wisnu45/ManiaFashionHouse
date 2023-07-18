@extends('Backend.dashboard.master')
@section('extra_css')
<!-- Jquery filer css -->

<link href="{{ url('/backend') }}/plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" />


    {{--  color picker js  --}}
    <link href="{{ url('/backend') }}/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
<link href="{{ url('/backend') }}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<link href="{{ url('/backend') }}/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="{{ url('/backend') }}/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">

{{--  SElect 2  --}}

<link href="{{ url('/backend') }}/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
<link href="{{ url('/backend') }}/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('/backend') }}/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />





@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Color & Size</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dis_collect.index') }}">Discount Collection</a></li>


            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-8">

        <div class="card-box">
            <h4 class="header-title m-t-0">Add Discount Collection</h4>


            <form id="default-wizard" action="{{ route('dis_collect.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <fieldset title="1">
                    <legend>Discount Details</legend>


                        <div class="form-group">
                            <label for="collection_name">Collection Name  <span class="text-danger">*</span></label>
                            <input type="text" name="collection_name" parsley-trigger="change" required
                                   placeholder="collection name" class="form-control" id="collection_name">
                        </div>

                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="{{ url('/backend') }}/assets/images/small/img-1.jpg" alt="image" />
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                                <button type="button" class="btn btn-secondary btn-file">
                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                    <input type="file" name="collection_img" class="btn-secondary" />
                                </button>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="discount_title">Collection Name  <span class="text-danger">*</span></label>
                            <input type="text" name="discount_title" parsley-trigger="change" required
                                   placeholder="Discount Title" class="form-control" id="discount_title">
                        </div>

                     <div class="form-group">
                        <label for="discount">Discount Rate  <span class="text-danger">*</span></label>
                        <select id="discount" name="discount" class="form-control ">
                              @for ($i =0; $i <= 100; $i++)
                                 <option value="{{ $i }}">{{ $i }}</option>
                              @endfor
                        </select>
                    </div>




                </fieldset>
                <fieldset title="2">
                    <legend>Select Product</legend>
                    <div class="form-group">
                        <select class="select2 form-control select2-multiple" name="product_id[]" multiple="multiple" multiple data-placeholder="Choose ...">
                            <optgroup label="Select Products">
                                @foreach ($products as $product)
                                <option  value="{{ $product->id }}"> {{ $product->product_name }}</option>
                                @endforeach
                            </optgroup>

                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="catagory_id"> Catagory</label>

                            <select name="catagory_id" class="form-control"  id="catagory_id">
                                @foreach ($catagories as $cat)
                                <option value="{{ $cat->id }}">    {{ $cat->catagory_name }}</option>
                                @endforeach

                            </select>
                        </div>
                </fieldset>

                <button class="btn btn-primary waves-effect waves-light stepy-finish" type="submit">
                    Submit
                </button>
            </form>
        </div> <!-- end card-box -->
    </div>
    <!-- end col -->


</div>


@endsection

@section('extra_js')


{{--  Select 2  --}}


<script src="{{ url('/backend') }}/plugins/select2/js/select2.min.js" type="text/javascript"></script>
<script src="{{ url('/backend') }}/plugins/bootstrap-select/js/bootstrap-select.js" type="text/javascript"></script>
<script src="{{ url('/backend') }}/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>

{{--  Init Js file   --}}
<script type="text/javascript" src="{{ url('/backend') }}/assets/pages/jquery.form-advanced.init.js"></script>



<!-- App js -->
<script src="{{ url('/backend') }}/assets/js/jquery.core.js"></script>
<script src="{{ url('/backend') }}/assets/js/jquery.app.js"></script>




<!--Form Wizard-->
<script src="{{ url('/backend') }}/plugins/jquery.stepy/jquery.stepy.min.js" type="text/javascript"></script>
<!--wizard initialization-->
<script src="{{ url('/backend') }}/assets/pages/jquery.wizard-init.js" type="text/javascript"></script>

{{--  Color picker js  --}}
<script src="{{ url('/backend') }}/plugins/moment/moment.js"></script>
<script src="{{ url('/backend') }}/plugins/timepicker/bootstrap-timepicker.js"></script>
<script src="{{ url('/backend') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="{{ url('/backend') }}/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="{{ url('/backend') }}/plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
<script src="{{ url('/backend') }}/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Init js -->
<script src="{{ url('/backend') }}/assets/pages/jquery.form-pickers.init.js"></script>

{{--  File uploadjs  --}}
 <script src="{{ url('/backend') }}/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
{{--  page specific js   --}}
 <script src="{{ url('/backend') }}/assets/pages/jquery.fileuploads.init.js"></script>



@endsection



