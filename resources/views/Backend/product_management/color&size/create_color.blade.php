@extends('Backend.dashboard.master')
@section('extra_css')
<!-- Jquery filer css -->


    {{--  color picker js  --}}
<link href="{{ url('/backend') }}/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
<link href="{{ url('/backend') }}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<link href="{{ url('/backend') }}/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="{{ url('/backend') }}/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
<link href="{{ url('/backend') }}/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

{{-- select js --}}
<link href="{{ url('/backend') }}/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Color & Size</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('color.index') }}">Color</a></li>
                <li class="breadcrumb-item"><a href="{{ route('color.create') }}">Color Create</a></li>

            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-8">

        <div class="card-box">
            <h4 class="header-title m-t-0">Add Color & Size</h4>


            <form id="default-wizard" action="{{ route('color.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <fieldset title="1">
                    <legend>Product Name</legend>

                    <div class="form-group">
                        <label for="product_id">Select Product</label>

                            <select name="product_id" class="form-control"  id="product_id">
                                @foreach ($products as $product)
                                <option  data-img_src="{{url($product->product_img[0])}}" value="{{ $product->id }}">    {{ $product->product_name }}</option>
                                @endforeach

                            </select>
                        </div>


                </fieldset>
                <fieldset title="2">
                    <legend>Color & Size</legend>
                    <div class="form-group">
                        <label>RGBA</label>
                        {{-- color Show--}}
                        <div data-color-format="rgb" value="rgb(0,194,255,0.78)" class="colorpicker-rgba input-group">
                            <input type="text" name="color" class="colorpicker-rgba form-control" value="rgb(0,194,255,0.78)" data-color-format="rgba">
                            <span class="input-group-btn add-on">
                                <button class="btn btn-white" type="button">
                                    <i style="background-color: rgb(0,194,255,0.78);margin-top: 2px;"></i>
                                </button>
                            </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="size">Size  <span class="text-danger">*</span></label>
                        <select id="size" name="size" class="form-control ">

                              @for ($i =0; $i <= 100; $i++)
                                 <option value="{{ $i }}">{{ $i }}</option>
                              @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity  <span class="text-danger">*</span></label>
                        <input type="text" name="quantity" parsley-trigger="change" required
                               placeholder="Quantity" class="form-control" id="quantity">
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

{{-- Select Js --}}
<script src="{{ url('/backend') }}/plugins/select2/js/select2.min.js" type="text/javascript"></script>



@endsection

@section('main_js')

<script>
    function custom_template(obj){
        var data = $(obj.element).data();
        var text = $(obj.element).text();
        if(data && data['img_src']){
            img_src = data['img_src'];
            template = $("<div><img src=\"" + img_src + "\" style=\"width:100%;height:150px;margin-top:40px;\"/><p style=\"font-weight: 700;font-size:14pt;text-align:center;\">" + text + "</p></div>");
            return template;
        }
    }
var options = {
    'templateSelection': custom_template,
    'templateResult': custom_template,
}
$('#product_id').select2(options);
$('.select2-container--default .select2-selection--single').css({'height': '220px'});
</script>

@endsection


