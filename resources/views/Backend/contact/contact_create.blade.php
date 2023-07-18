
@extends('Backend.dashboard.master')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Catagory</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Visit site</a></li>
                <li class="breadcrumb-item"><a href="{{ route('contact.index') }}">contact </a></li>
                <li class="breadcrumb-item"><a href="{{ route('contact.create') }}">contact Create</a></li>

            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
      <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-box">
                <h4 class="m-t-0 m-b-30 header-title">CREATE Contact</h4>
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="phone">Phone No</label>
                        <input type="text" id="phone" name="phone" placeholder="Enter phone" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="street">Street</label>
                        <input type="text" id="street" name="street" placeholder="Enter street" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="distric">Distric</label>
                        <input type="text" id="distric" name="distric" placeholder="Enter distric" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" placeholder="Enter address" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="days">Open Days</label>
                        <input type="text" id="days" name="days" placeholder="Enter days" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="Hours">Open Hours</label>
                        <input type="text" id="Hours" name="hours" placeholder="Enter hours" class="form-control" >
                    </div>



                    <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                    <a class="btn btn-inverse waves-effect waves-light" href="{{ route('contact.index') }}">Back</a>
                </form>
            </div>
        </div>
      </div>
@endsection




