@extends('Backend.dashboard.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Subcatagory</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Visit site</a></li>
                <li class="breadcrumb-item"><a href="{{ route('subcatagory.index') }}">Subcatagory</a></li>

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
                        <th>Catagory Name</th>
                        <th>Subcatagory Name</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subcatagories as $subCat)
                    <tr>
                        <td>{{ $subCat->id }}</td>
                        <td>{{ $subCat->catagory->catagory_name }}</td>
                        <td>{{ $subCat->subcatagory }}</td>
                        <td>
                            <!-- Button trigger modal -->
                            <a class="btn btn-info waves-effect waves-light btn-sm"   data-toggle="modal" data-target="#exampleModal{{ $subCat->id }}" >Edit</a>
                        </td>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $subCat->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('subcatagory.update',$subCat->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">SubCatagory</label>
                                      <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $subCat->subcatagory }}" name="subcatagory" aria-describedby="emailHelp" placeholder="Enter Subcatagory">

                                      <div class="form-group mt-3">
                                          <select name="catagory_id" id="" class="form-control">
                                              <option value="#">Select Catagory</option>
                                              @foreach ($catagories as $catagory)
                                              <option  value="{{ $catagory->id }}" {{ ( $catagory->id == $subCat->catagory_id) ? 'selected' : '' }}>{{ $catagory->catagory_name }}</option>
                                              @endforeach


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




                        <td><a class="btn btn-danger waves-effect waves-light btn-sm" href="{{ route('subcatagory.delete',$subCat->id) }}">delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <div class="col-md-6">
        <div class="card-box">
            <h4 class="m-t-0 m-b-30 header-title">CREATE SUBCATAGORY</h4>
            <form role="form" action="{{ route('subcatagory.store') }}"  method='post' >
                @csrf
                <div class="form-group">
                    <label for="subcatagory">Subcatagory Name</label>
                    <input type="text" id="subcatagory" name="subcatagory" placeholder="Add Subcatagory" class="form-control" >
                </div>
                <div class="form-group mt-3">
                    <select name="catagory_id" id="" class="form-control">
                        <option value="#">Select Catagory</option>
                        @foreach ($catagories as $catagory)
                        <option value="{{ $catagory->id }}">{{ $catagory->catagory_name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
            </form>
        </div>
    </div>


</div>

@endsection











