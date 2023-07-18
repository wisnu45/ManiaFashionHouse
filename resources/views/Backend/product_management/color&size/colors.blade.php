
@extends('Backend.dashboard.master')
@section('extra_css')



<!-- DataTables -->
<link href="{{ url('/backend') }}/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('/backend') }}/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ url('/backend') }}/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

{{--  color picker js  --}}
<link href="{{ url('/backend') }}/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
<link href="{{ url('/backend') }}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<link href="{{ url('/backend') }}/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="{{ url('/backend') }}/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
<link href="{{ url('/backend') }}/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Color & Size</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('color.index') }}">Color</a></li>

            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> {{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            @if (session('delete'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> {{ session('delete') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="py-3 pl-3">
                <a class="btn btn-success waves-effect waves-light " href="{{ route('color.create') }}">Add </a>
            </div>



            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
                </thead>


                <tbody>
                    @foreach ($colors as $color)
                    <tr>
                        <td>{{ $color->id }}</td>
                        <td><img width="50" src="{{ url($color->product->product_img[0]) }}" alt=""></td>
                        <td>{{ $color->product->product_name }}</td>
                        <td>
                            <div class="form-group">

                                <div data-color-format="rgb" data-color="rgb({{ $color->color }})" class="colorpicker-default input-group">
                                    <input type="text" readonly="readonly" value="" class="form-control">
                                    <span class="input-group-btn add-on">
                                        <button class="btn btn-white" type="button">
                                            <i style="background-color: rgb({{ $color->color }});margin-top: 2px;"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>{{ $color->size }}</td>
                        <td>{{ $color->quantity }}</td>



                         {{-- Modal area start --}}
                         <td>
                            <!-- Button trigger modal -->
                            <a class="btn btn-info waves-effect waves-light btn-sm"   data-toggle="modal" data-target="#exampleModal{{ $color->id }}" >Edit</a>
                        </td>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $color->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('color.update',$color->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="product_id">Select Product</label>

                                            <select name="product_id" class="form-control"  id="product_id">
                                                @foreach ($products as $product)
                                                <option  data-img_src="{{url($product->product_img[0])}}" value="{{ $product->id }}" {{ ( $product->id == $color->product_id) ? 'selected' : '' }}>    {{ $product->product_name }}</option>
                                                @endforeach

                                            </select>
                                        </div>



                                    <legend>Color & Size</legend>
                                    <div class="form-group">
                                        <label>RGBA</label>
                                        {{-- color Show--}}
                                        <div data-color-format="rgb" value="rgb({{ $color->color }})" class="colorpicker-rgba input-group">
                                            <input type="text" name="color" class="colorpicker-rgba form-control" value="rgb({{ $color->color }})" data-color-format="rgba">
                                            <span class="input-group-btn add-on">
                                                <button class="btn btn-white" type="button">
                                                    <i style="background-color:rgb({{ $color->color }});margin-top: 2px;"></i>
                                                </button>
                                            </span>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="size">Size  <span class="text-danger">*</span></label>
                                        <select id="size" name="size" class="form-control ">

                                              @for ($i =0; $i <= 100; $i++)
                                                 <option {{ ( $i == $color->size) ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                              @endfor
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Quantity  <span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $color->quantity }}" name="quantity" parsley-trigger="change" required
                                               placeholder="Quantity" class="form-control" id="quantity">
                                    </div>




                                      {{-- <div class="form-group mt-3">
                                          <select name="catagory_id" id="" class="form-control">
                                              <option value="#">Select Catagory</option>
                                              @foreach ($catagories as $catagory)
                                              <option  value="{{ $catagory->id }}" {{ ( $catagory->id == $color->catagory_id) ? 'selected' : '' }}>{{ $catagory->catagory_name }}</option>
                                              @endforeach

                                          </select>
                                      </div> --}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                                  </form>
                            </div>
                            </div>
                        </div>
                        </div>
                         {{-- Modal area ends --}}
                        <td><a class="btn btn-danger" href="{{ route('color.delete',$color->id) }}">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('extra_js')
<script src="{{ url('/backend') }}/assets/js/metisMenu.min.js"></script>
<script src="{{ url('/backend') }}/assets/js/waves.js"></script>
<script src="{{ url('/backend') }}/assets/js/jquery.slimscroll.js"></script>



<!-- Required datatable js -->
<script src="{{ url('/backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('/backend') }}/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="{{ url('/backend') }}/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="{{ url('/backend') }}/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="{{ url('/backend') }}/plugins/datatables/jszip.min.js"></script>
<script src="{{ url('/backend') }}/plugins/datatables/pdfmake.min.js"></script>
<script src="{{ url('/backend') }}/plugins/datatables/vfs_fonts.js"></script>
<script src="{{ url('/backend') }}/plugins/datatables/buttons.html5.min.js"></script>
<script src="{{ url('/backend') }}/plugins/datatables/buttons.print.min.js"></script>
<script src="{{ url('/backend') }}/plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="{{ url('/backend') }}/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="{{ url('/backend') }}/plugins/datatables/responsive.bootstrap4.min.js"></script>

 {{--  Color picker js  --}}
 <script src="{{ url('/backend') }}/plugins/moment/moment.js"></script>
 <script src="{{ url('/backend') }}/plugins/timepicker/bootstrap-timepicker.js"></script>
 <script src="{{ url('/backend') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
 <script src="{{ url('/backend') }}/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
 <script src="{{ url('/backend') }}/plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
 <script src="{{ url('/backend') }}/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

 <!-- Init js -->
 <script src="{{ url('/backend') }}/assets/pages/jquery.form-pickers.init.js"></script>
@endsection


 @section('main_js')

<script type="text/javascript">
    $(document).ready(function() {

        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis']
        });

        table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    } );

</script>

@endsection





















