{{--  <form action="{{ route('catagory.update',$catagory->id) }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Update Catagory address</label>
      <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $catagory->catagory_name }}"  name="catagory_name" aria-describedby="emailHelp" placeholder="Enter Catagory">

    <button type="submit" class="btn btn-primary">Update</button>
  </form>  --}}
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

  <div class="row justify-content-center pb-5" >
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


          <div class="card-box ">
              <h4 class="m-t-0 m-b-30 header-title">EDIT CATAGORY</h4>
              <form role="form"  action="{{ route('catagory.update',$catagory->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                      <label for="img_cat">Catagory Image</label>
                      <input type="file" id="img_cat" name="catagory_img"  class="form-control" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" >
                  </div>
                  <div class="img-preview my-3">
                      <img src="{{ url($catagory->catagory_img)  }}" id="image" width="100" alt="">
                  </div>

                  <div class="form-group">
                      <label for="Catagory">Catagory Name</label>
                      <input type="text" id="Catagory"  value="{{ $catagory->catagory_name }}" name="catagory_name" placeholder="Add Catagory" class="form-control" >
                  </div>
                  <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
              </form>

          </div>
          <a class="btn btn-inverse waves-effect waves-light btn-sm" href="{{ route('catagory.index') }}">BACK</a>


  </div>



  @endsection

