
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
                <a class="btn btn-success waves-effect waves-light " href="{{ route('dis_collect.create') }}">Add </a>
            </div>



            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th> Image</th>
                    <th>Discount Name</th>
                    <th>Discount Title</th>
                    <th>Discount</th>
                    <th>Catagory Name</th>
                    <th>Products</th>
                    <th>Action</th>
                </tr>
                </thead>


                <tbody>
                    @foreach ($disCollections as $discollect)
                    <tr>
                        <td>{{ $discollect->id }}</td>
                        <td><img width="50" src="{{ url($discollect->collection_img) }}" alt=""></td>
                        <td>{{ $discollect->collection_name }}</td>
                        <td>{{ $discollect->discount_title }}</td>
                        <td>{{ $discollect->discount }}</td>
                        <td>{{ $discollect->Catagory->catagory_name }}</td>
                        <td>
                            <table>
                                <tr>
                                    @if (!empty($discollect->product_id) ==1)
                                     @foreach ($discollect->product_id as $disProduct)
                                        <td><img width="50" src="{{ url($discollect->product->product_img[$disProduct]) }}" alt=""></td>
                                    @endforeach
                                    @else
                                    Null
                                    @endif
                                 </tr>
                            </table>
                        </td>



                        <td><a class="btn btn-danger" href="{{ route('dis_collect.delete',$discollect->id) }}">Delete</a></td>
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

