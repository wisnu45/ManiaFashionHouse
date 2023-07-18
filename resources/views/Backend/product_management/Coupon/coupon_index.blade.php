
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
            <h4 class="page-title float-left">Coupon</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>


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
                <a class="btn btn-success waves-effect waves-light " href="{{ route('coupon_ctlr.create') }}">Add </a>
            </div>



            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Coupon Title</th>
                    <th>Coupon Code </th>
                    <th>Discount Rate </th>
                    <th>Start Date </th>
                    <th>End Date </th>
                    <th>Status </th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
                </thead>


                <tbody>
                    @foreach ($coupons as $coupon)
                    <tr>
                        <td>{{ $coupon->id }}</td>
                        <td>{{ $coupon->coupon_title }}</td>
                        <td>{{ $coupon->coupon_code }}</td>
                        <td>{{ $coupon->discount }}</td>
                        <td>{{ $coupon->start_date }}</td>
                        <td>{{ $coupon->end_date }}</td>
                        <td>{{ $coupon->status ==0? 'Deactive': 'Active' }}</td>

                        {{--  Edit  --}}
                        <td>
                            <!-- Button trigger modal -->
                            <a class="btn btn-info waves-effect waves-light btn-sm"   data-toggle="modal" data-target="#exampleModal{{ $coupon->id }}" >Edit</a> </td>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $coupon->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> {{ $coupon->coupon_title }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('coupon_ctlr.update',$coupon->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="coupon_title">Coupon Code  <span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $coupon->coupon_title }}" name="coupon_title"
                                               placeholder="Coupon Title" class="form-control" id="coupon_title">
                                    </div>


                                    <div class="form-group">
                                        <label for="coupon_code">Coupon Code  <span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $coupon->coupon_code }}" name="coupon_code"
                                               placeholder="Coupon Code" class="form-control" id="coupon_code">
                                    </div>

                                 <div class="form-group">
                                    <label for="discount">Discount Rate  <span class="text-danger">*</span></label>
                                    <select id="discount" name="discount" class="form-control ">
                                          @for ($i =0; $i <= 100; $i++)
                                             <option {{ $coupon->discount == $i? 'selected':'' }} value="{{ $i }}">{{ $i }}</option>
                                          @endfor
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <div>
                                        <div class="input-group">
                                            <input type="text" value="{{ $coupon->start_date }}" name="start_date" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
                                            <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>End Date</label>
                                    <div>
                                        <div >
                                            <input name="end_date" value="{{ $coupon->end_date }}" type="date" class="form-control" placeholder="mm/dd/yyyy">

                                        </div>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="status"> Status </label>
                                    <select id="status" name="status" class="form-control">
                                         <option {{ $coupon->status==0 ? 'selected':'' }} value="0">Deactive</option>
                                         <option {{ $coupon->status==1 ? 'selected':''}} value="1">Active</option>
                                    </select>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                                  </form>
                            </div>
                            </div>
                        </div>
                        </div>
                        {{--  Edit  --}}
                        <td><a class="btn btn-danger" href="{{ route('coupon_ctlr.delete',$coupon->id) }}">Delete</a></td>
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

