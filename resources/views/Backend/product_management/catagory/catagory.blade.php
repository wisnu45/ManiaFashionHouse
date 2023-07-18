@extends('Backend.dashboard.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Catagory</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Visit site</a></li>
                <li class="breadcrumb-item"><a href="{{ route('catagory.index') }}">Catagory</a></li>

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
                        <th>Id</th>
                        <th>Catagory Image</th>
                        <th>Catagory Name</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($catagories as $catagory)
                    <tr>
                        <td>{{ $catagory->id }}</td>
                        <td><img src="{{ url($catagory->catagory_img) }}" width="50" alt=""></td>
                        <td>{{ $catagory->catagory_name }}</td>
                        <td><a class="btn btn-info waves-effect waves-light btn-sm" href="{{ route('catagory.edit',$catagory->id) }}">Edit</a></td>
                        <td><a class="btn btn-danger waves-effect waves-light btn-sm" href="{{ route('catagory.delete',$catagory->id) }}">delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <div class="col-md-6">
        <div class="card-box">
            <h4 class="m-t-0 m-b-30 header-title">CREATE CATAGORY</h4>
            <form role="form" action="{{ route('catagory.post') }}"  method='post' enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="img_cat">Catagory Image</label>
                    <input type="file" id="img_cat" name="catagory_img"  class="form-control" >
                </div>

                <div class="form-group">
                    <label for="Catagory">Catagory Name</label>
                    <input type="text" id="Catagory" name="catagory_name" placeholder="Add Catagory" class="form-control" >
                </div>
                <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
            </form>
        </div>
    </div>


</div>






















@endsection

