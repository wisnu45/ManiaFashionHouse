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


            <form id="default-wizard" action="{{ route('coupon_ctlr.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <fieldset title="1">
                    <legend>Coupon</legend>


                        <div class="form-group">
                            <label for="coupon_title">Collection Name  <span class="text-danger">*</span></label>
                            <input type="text" name="coupon_title"
                                   placeholder="Coupon Title" class="form-control" id="coupon_title">
                        </div>


                        <div class="form-group">
                            <label for="coupon_code">Coupon Code  <span class="text-danger">*</span></label>
                            <input type="text" name="coupon_code"
                                   placeholder="Coupon Code" class="form-control" id="coupon_code">
                        </div>

                     <div class="form-group">
                        <label for="discount">Discount Rate  <span class="text-danger">*</span></label>
                        <select id="discount" name="discount" class="form-control ">
                              @for ($i =0; $i <= 100; $i++)
                                 <option value="{{ $i }}">{{ $i }}</option>
                              @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Start Date</label>
                        <div>
                            <div class="input-group">
                                <input type="text" name="start_date" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
                                <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>End Date</label>
                        <div>
                            <div >
                                <input name="end_date" type="date" class="form-control" placeholder="mm/dd/yyyy">

                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="status"> Status </label>
                        <select id="status" name="status" class="form-control">
                             <option value="0">Deactive</option>
                             <option value="1">Active</option>
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



