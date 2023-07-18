



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
            <h4 class="page-title float-left">Blog </h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Visit site</a></li>
                <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>

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
                <a class="btn btn-primary waves-effect w-md waves-light " href="{{ route('blog.create') }}">Add </a>
            </div>



            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>blog Image</th>
                    <th>Blog Title</th>
                    <th>Blog Description</th>
                    <th>Author name</th>
                    <th>Tag</th>
                    <th>Blog meta title</th>
                    <th>Slug</th>
                    <th>Blog meta Description</th>
                    <th>Comment</th>
                    <th>Action</th>
                    <th>Action</th>

                </tr>
                </thead>


                <tbody>
                    @foreach ($blogs as $blog)
                    <tr>
                    <td><img src="{{url($blog->features_img)}}" width="50" alt=""></td>
                    <td>{{$blog->title}}</td>
                    <td>{{substr($blog->description,0,30)}}</td>
                    <td>{{$blog->author_name}}</td>
                    <td>{{$blog->tag}}</td>
                    <td>{{$blog->meta_title}}</td>
                    <td>{{$blog->slug}}</td>
                    <td>{{$blog->meta_description}}</td>
                    <td>
                      @foreach ($comments as $comment)
                          @if ($blog->id == $comment->blog_id)
                              {{ $comment->comment }}
                          @endif
                      @endforeach
                    </td>
                    <td><a class="btn btn-custom waves-effect waves-light btn-sm" href="{{route('blog.edit',$blog->id)}}">Edit</a></td>
                    <td><a class="btn btn-danger waves-effect waves-light btn-sm" href="{{route('blog.delete',$blog->id)}}">Delete</a></td>


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





















