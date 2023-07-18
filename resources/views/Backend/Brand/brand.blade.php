
@extends('Backend.dashboard.master')
@section('extra_css')
<!-- Jquery filer css -->
<link href="{{ url('/backend') }}/plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
<link href="{{ url('/backend') }}/plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

<!-- Bootstrap fileupload css -->
<link href="{{ url('/backend') }}/plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" />

@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Brand</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Visit site</a></li>
                <li class="breadcrumb-item"><a href="{{ route('brand.index') }}">Brand</a></li>

            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="row ">
    <div class="col-lg-6">
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



            <table class="table">
                <thead class="thead-default">
                    <tr>

                        <th>Brand Image</th>
                        <th>Brand Name</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand)
                    <tr>
                        <td><img src="{{ url($brand->brand_img) }}" width="50" alt=""></td>
                        <td>{{ $brand->brand_name }}</td>

                        <td>
                            <!-- Button trigger modal -->
                            <a class="btn btn-info waves-effect waves-light btn-sm"   data-toggle="modal" data-target="#exampleModal{{ $brand->id }}" >Edit</a> </td>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $brand->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> {{ $brand->brand_name }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('brand.update',$brand->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="brand_name">Brand Name</label>
                                        <input type="text" value="{{ $brand->brand_name }}" id="brand_name" name="brand_name" placeholder="Brand Name" class="form-control" >
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">Image Upload</label>
                                        <div class="col-9">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail" style="width: 100px; height: 100px;">
                                                    <img src="{{ url($brand->brand_img) }}" alt="image" />
                                                </div>
                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                <div>
                                                    <button type="button" class="btn btn-secondary btn-file">
                                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                        <input type="file" name="brand_img" class="btn-secondary" />
                                                    </button>
                                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                                </div>
                                            </div>

                                        </div>
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





                        <td><a class="btn btn-danger waves-effect waves-light btn-sm" href="{{ route('brand.delete',$brand->id) }}">delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>


    <div class="col-md-6">
        <div class="card-box">
            <h4 class="m-t-0 m-b-30 header-title">CREATE Brand</h4>
            <form role="form" action="{{ route('brand.store') }}"  method='post' enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="brand_name">Brand Name</label>
                    <input type="text" id="brand_name" name="brand_name" placeholder="Brand Name" class="form-control" >
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label">Image Upload</label>
                    <div class="col-9">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="{{ url('/backend') }}/assets/images/small/img-1.jpg" alt="image" />
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                                <button type="button" class="btn btn-secondary btn-file">
                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                    <input type="file" name="brand_img" class="btn-secondary" />
                                </button>
                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                            </div>
                        </div>

                    </div>
                </div>

                <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
            </form>
        </div>
    </div>


</div>

@endsection



@section('extra_js')
<!-- Jquery filer js -->
<script src="{{ url('/backend') }}/plugins/jquery.filer/js/jquery.filer.min.js"></script>

<!-- Bootstrap fileupload js -->
<script src="{{ url('/backend') }}/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<!-- page specific js -->
<script src="{{ url('/backend') }}/assets/pages/jquery.fileuploads.init.js"></script>
@endsection










