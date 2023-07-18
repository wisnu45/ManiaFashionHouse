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
            <h4 class="page-title float-left">FAQ</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Visit site</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item"><a href="{{ route('faq.index') }}">FAQ</a></li>

            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="row ">
    <div class="col-lg-8">
        <div class="card-box">
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
           <div class="my-3">

           </div>



           <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                    <tr>
                        <th>Question Title</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($faqs as $faq)
                    <tr>
                        <td>{{ $faq->question_about }}</td>
                        <td>{{ $faq->question }}</td>
                        <td>{{ substr($faq->answer,0,10) }}</td>
                        <td>
                           @if ($faq->status==1)
                           <a class="btn btn-primary waves-effect waves-light btn-sm" href="{{ route('faq.deactive',$faq->id) }}">Active</a>

                            @elseif ($faq->status==0)
                            <a class="btn btn-custom waves-effect waves-light btn-sm" href="{{ route('faq.active',$faq->id) }}">Deactive</a>
                           @endif

                        </td>

                        <td>
                            <!-- Button trigger modal -->
                            <a class="btn btn-info waves-effect waves-light btn-sm"   data-toggle="modal" data-target="#exampleModal{{ $faq->id }}" >Edit</a></td>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $faq->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('faq.update',$faq->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="questionAbout">Question Title</label>
                                        <input type="text" id="questionAbout" name="question_about" value="{{ $faq->question_about }}" placeholder="Question About" class="form-control" >
                                    </div>

                                    <div class="form-group">
                                        <label for="question">Question </label>
                                        <input type="text" id="question" value="{{ $faq->question }}" name="question" placeholder="Enter Question" class="form-control" >
                                    </div>

                                    <div class="form-group">
                                        <label for="answer">Answer </label>
                                        <textarea class="form-control"  name="answer" placeholder="Enter short notes" id="answer" cols="30" rows="10">
                                          {{ $faq->answer }}
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="answer">Status </label>
                                        <select class="form-control" name="status" id="answer">
                                            <option {{ $faq->status==1?'selected':'' }} value="1">Active</option>
                                          <option {{ $faq->status==0?'selected':'' }}  value="0">Deactive</option>
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
                        <td><a class="btn btn-warning waves-effect waves-light btn-sm" href="{{ route('faq.delete',$faq->id) }}">Delete</a></td>

                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
    <div class="col-md-4">
        <div class="card-box">
            <h4 class="m-t-0 m-b-30 header-title">CREATE FAQ</h4>
            <form action="{{ route('faq.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="questionAbout">Question Title</label>
                    <input type="text" id="questionAbout" name="question_about" placeholder="Question About" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="question">Question </label>
                    <input type="text" id="question" name="question" placeholder="Enter Question" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="answer">Answer </label>
                    <textarea class="form-control"  name="answer" placeholder="Enter short notes" id="answer" cols="30" rows="10">
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="answer">Status </label>
                    <select class="form-control" name="status" id="answer">
                        <option value="1">Active</option>
                      <option value="0">Deactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
            </form>
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








