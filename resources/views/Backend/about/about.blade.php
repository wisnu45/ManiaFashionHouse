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
            <h4 class="page-title float-left">About</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Visit site</a></li>
                <li class="breadcrumb-item"><a href="{{ route('about.index') }}">About</a></li>

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
                <a class="btn btn-primary waves-effect w-md waves-light " href="{{ route('about.create') }}">Add </a>
            </div>



            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>About Title</th>
                    <th>Short Notes</th>
                    <th>Quotes</th>
                    <th>Author Name</th>
                    <th>Our Story</th>
                    <th>Action</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                    @foreach ($abouts as $about)
                    <tr>
                        <td>{{ $about->about_title }}</td>
                        <td>{{ $about->short_notes }}</td>
                        <td>{{ $about->quotes }}</td>
                        <td>{{ $about->author_name }}</td>
                        <td>{{ substr($about->our_story ,0,30)}}</td>



                            <td>
                                <!-- Button trigger modal -->
                                <a class="btn btn-info waves-effect waves-light btn-sm"   data-toggle="modal" data-target="#exampleModal{{ $about->id }}" >Edit</a> </td>


                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $about->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('contact.update',$about->id) }}" method="POST">
                                        @csrf
                                        <form action="{{ route('about.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" value="{{ $about->about_title }}" id="title" name="about_title" placeholder="Enter about title"class="form-control" >
                                            </div>

                                            <div class="form-group">
                                                <label for="Notes">Notes</label>
                                                <textarea name="short_notes" id="Notes" placeholder="Enter short notes" cols="30" rows="10" class="form-control">
                                                    {{ $about->short_notes }}
                                                </textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="quote">Quotes</label>
                                                <input type="text"  value="{{ $about->quotes }}" id="quote" name="quotes" placeholder="Enter quotes" class="form-control" >
                                            </div>

                                            <div class="form-group">
                                                <label for="author_name"> Author Name</label>
                                                    <input type="text"  value="{{ $about->author_name }}" id="author_name" name="author_name" placeholder="Enter author name" class="form-control" >
                                            </div>


                                            <div class="form-group">
                                                <label for="story">Our Story</label>
                                                <textarea name="our_story" id="story" class="form-control summernote" placeholder="Enter our story" cols="30" rows="10">
                                                   {{$about->our_story }}
                                                </textarea>
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

                        <td><a href="{{ route('about.delete',$about->id) }}">Delete</a></td>

                    </tr>

                    @endforeach
                    {{-- @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->street }}</td>
                        <td>{{ $contact->distric }}</td>
                        <td>{{ $contact->address }}</td>
                        <td>{{ $contact->days }}</td>
                        <td>{{ $contact->hours }}</td>
                        <td>
                            <!-- Button trigger modal -->
                            <a class="btn btn-info waves-effect waves-light btn-sm"   data-toggle="modal" data-target="#exampleModal{{ $contact->id }}" >Edit</a> </td>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $contact->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('contact.update',$contact->id) }}" method="POST">
                                    @csrf
                                    <form action="{{ route('contact.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="phone">Phone No</label>
                                            <input type="text" id="phone" value="{{ $contact->phone }}" name="phone" placeholder="Enter phone" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="street">Street</label>
                                            <input type="text" id="street" value="{{ $contact->street }}" name="street" placeholder="Enter street" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="distric">Distric</label>
                                            <input type="text" id="distric" value="{{ $contact->distric }}" name="distric" placeholder="Enter distric" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" id="address" value="{{ $contact->address }}" name="address" placeholder="Enter address" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="days">Open Days</label>
                                            <input type="text" id="days" name="days" value="{{ $contact->days }}" placeholder="Enter days" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="Hours">Open Hours</label>
                                            <input type="text" id="Hours" value="{{ $contact->hours }}" name="hours" placeholder="Enter hours" class="form-control" >
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




                        <td><a  class="btn btn-danger waves-effect waves-light btn-sm" href="{{ route('contact.delete',$contact->id) }}">Delete</a></td>

                    </tr>

                    @endforeach --}}

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


