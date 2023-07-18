



@extends('Backend.dashboard.master')
@section('extra_css')
<!-- DataTables -->
<link href="{{ url('/backend') }}/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('/backend') }}/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ url('/backend') }}/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Manage sales </h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Visit site</a></li>
                {{--  <li class="breadcrumb-item"><a href="{{ route('sale.index') }}">sales</a></li>  --}}

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
            <div class="py-4 pl-3">
                <a class="btn btn-primary waves-effect w-md waves-light " href="{{ route('order.create') }}">Add </a>
            </div>

            <table id="datatable-buttons" class="table table-striped table-bsaleed" cellspacing="0" width="100%">

                <thead>

                <tr>
                    <th>sale Id</th>
                    <th>Name</th>
                    <th>Company Name</th>
                    <th>Division</th>
                    <th>Distric</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Payment Method</th>
                    <th>Total</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
                </thead>


                <tbody>
                    @foreach ($cstmOrders as $cmOrder)
                        <tr>
                            <td>{{ $cmOrder->id }}</td>
                            <td>{{ $cmOrder->user_name }}</td>
                            <td>{{ $cmOrder->company_name ?? '' }}</td>
                            <td>{{ $cmOrder->divisionName->name }}</td>
                            <td>{{ $cmOrder->districtName->name }}</td>

                            <td>Street: {{ $cmOrder->street_address }},Apartment: {{ $cmOrder->apartment }},Post Code: {{ $cmOrder->post_code }}</td>
                            <td>{{ $cmOrder->phone }}</td>
                            <td>{{ $cmOrder->payment_method }}</td>
                            <td>{{ $cmOrder->grandTotal }}</td>
                            <td>
                                 {{--  Edit  --}}

                            <!-- Button trigger modal -->
                            <a class="btn btn-info waves-effect waves-light btn-sm"   data-toggle="modal" data-target="#exampleModal{{ $cmOrder->id }}" >View</a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $cmOrder->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> {{ $cmOrder->user_name }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="page-title-box ">
                                                <h4 class="page-title ">Invoice</h4>

                                                <ol class="breadcrumb ">
                                                    <li class="breadcrumb-item"><a href="#">Adminox</a></li>
                                                    <li class="breadcrumb-item"><a href="#">Extras</a></li>
                                                    <li class="breadcrumb-item active">Invoice</li>
                                                </ol>

                                                {{--  <div class="clearfix"></div>  --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                        </div>
                        {{--  Edit  --}}
                        </td>
                            <td><a class="btn btn-danger" href="{{route('order.delete',$cmOrder->id) }}">Delete</a></td>
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
@endsection

 @section('main_js')

<script type="text/javascript">
    $(document).ready(function() {

        //Buttons examples
        var table = $('#datatable-buttons').DataTable();

        table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    } );

</script>

@endsection





















