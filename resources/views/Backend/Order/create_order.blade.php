@extends('Backend.dashboard.master')
@section('extra_css')
<!-- Jquery filer css -->
<link href="{{ url('/backend') }}/plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
<link href="{{ url('/backend') }}/plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

<!-- Bootstrap fileupload css -->
{{--  <link href="{{ url('/backend') }}/plugins/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" />  --}}

<!-- Summernote css -->
<link href="{{ url('/backend') }}/plugins/summernote/summernote.css" rel="stylesheet" />

{{--  Select 2   --}}
<link href="{{ url('/backend') }}/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
<link href="{{ url('/backend') }}/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
<link href="{{ url('/backend') }}/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />



@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Product</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.create') }}">Product Create</a></li>

            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-8">

        <div class="card-box">
            <h4 class="header-title m-t-0">Custom order Create</h4>


            <form id="default-wizard" action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <fieldset title="1">
                    <legend>Basic Information</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_id">Product  <span class="text-danger">*</span></label>
                                <select id="product_id" class="form-control select2">
                                    <option value="">Select</option>
                                @foreach ($catagories as $cat)
                                    <optgroup label="{{ $cat->catagory_name }}">
                                        @foreach ($products as $product)
                                            @if ($cat->id == $product->catagory_id)
                                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="color">Color  <span class="text-danger">*</span></label>
                                <select id="color_id"  class="form-control select2">

                                </select>

                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity  <span class="text-danger">*</span></label>
                                <input type="number" min="1"  parsley-trigger="change" required
                                       placeholder="Product quantity" class="form-control" id="quantity">
                            </div>
                            <div class="form-group">
                                <label for="price">Price  <span class="text-danger">*</span></label>
                                <input type="number" min="1"  parsley-trigger="change" required
                                       placeholder="Product price" class="form-control" id="price">
                            </div>

                            <input type="text"  name="product_id" id="prod_id">
                            <input type="text"  name="color_id" id="clr_id">
                            <input type="text"  name="quantity" id="qun">
                            <input type="text"  name="price" id="prc">
                            <p class="btn btn-primary ok_btn">OK</p>
                        </div>
                        <div class="col-md-6">
                            <table class="table">
                                <thead>
                                  <tr>

                                    <th scope="col">Product</th>
                                    <th scope="col">Color&Size</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                  </tr>
                                </thead>
                                <tbody class="mytbody">


                                </tbody>
                              </table>
                        </div>
                    </div>

                </fieldset>
                <fieldset title="2">
                    <legend>Shipping Address</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name  <span class="text-danger">*</span></label>
                                <input type="text"  name="user_name"  parsley-trigger="change" required
                                       placeholder="Client Name" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="company_name">Company Name  </label>
                                <input type="text" name="company_name"  parsley-trigger="change"
                                       placeholder="Company name" class="form-control" id="company_name">
                            </div>
                            <div class="form-group">
                                <label for="division">Division  </label>
                                <select id="division" name="division" class="form-control select2">
                                    @foreach ($division as $div)
                                        <option value="{{ $div->id }}">{{ $div->name }}-{{ $div->bn_name }}</option>
                                     @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="district">District </label>
                                <select id="district" name="district" class="form-control select2">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="upozela">Upozela  </label>
                                <select id="upozela" name="upozela" class="form-control select2">

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="union">Union </label>
                                <select id="union" name="union" class="form-control select2">

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="street_address">Street Address  </label>
                                <input type="text" name="street_address" parsley-trigger="change"
                                       placeholder="Street address" class="form-control" id="street_address">
                            </div>
                            <div class="form-group">
                                <label for="apartment">Apartment</label>
                                <input type="text" name="apartment" parsley-trigger="change"
                                       placeholder="Apartment" class="form-control" id="apartment">
                            </div>
                            <div class="form-group">
                                <label for="post_code">Post Code  </label>
                                <input type="text" name="post_code" parsley-trigger="change"
                                       placeholder="post_code" class="form-control" id="post_code">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone <span class="text-danger">*</span></label>
                                <input type="text" name="phone" parsley-trigger="change"
                                       placeholder="phone" class="form-control" id="phone">
                            </div>
                            <div class="form-group">
                                <label for="email">Email </label>
                                <input type="email" name="email" parsley-trigger="change"
                                       placeholder="email" class="form-control" id="email">
                            </div>

                            <div class="form-group">
                                <label for="payment_method">Payment Method </label>
                                <select id="payment_method" name="payment_method"  class="form-control select">
                                    <option value="cash">Cash</option>
                                    <option value="bkash">Bkash</option>
                                </select>
                            </div>
                        </div>
                    </div>





                </fieldset>
                <button class="btn btn-primary waves-effect waves-light stepy-finish" type="submit">
                    Submit
                </button>
            </form>
        </div> <!-- end card-box -->
    </div>
    <!-- end col -->


</div>


@endsection







@section('extra_js')
<!-- App js -->
<script src="{{ url('/backend') }}/assets/js/jquery.core.js"></script>
<script src="{{ url('/backend') }}/assets/js/jquery.app.js"></script>
<!-- Jquery filer js -->
<script src="{{ url('/backend') }}/plugins/jquery.filer/js/jquery.filer.min.js"></script>

<!-- Bootstrap fileupload js -->
{{--  <script src="{{ url('/backend') }}/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>  --}}
<!-- page specific js -->
{{--  <script src="{{ url('/backend') }}/assets/pages/jquery.fileuploads.init.js"></script>  --}}



<!--Summernote js-->
<script src="{{ url('/backend') }}/plugins/summernote/summernote.min.js"></script>
{{--  step by step js  --}}
<!--Form Wizard-->
<script src="{{ url('/backend') }}/plugins/jquery.stepy/jquery.stepy.min.js" type="text/javascript"></script>
<!--wizard initialization-->
<script src="{{ url('/backend') }}/assets/pages/jquery.wizard-init.js" type="text/javascript"></script>
<script src="{{ url('/backend') }}/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
<script src="{{ url('/backend') }}/plugins/select2/js/select2.min.js" type="text/javascript"></script>
<script src="{{ url('/backend') }}/plugins/bootstrap-select/js/bootstrap-select.js" type="text/javascript"></script>
<script src="{{ url('/backend') }}/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<!-- Init Js file -->



<!-- Init Js file -->
<script type="text/javascript" src="{{ url('/backend') }}/assets/pages/jquery.form-advanced.init.js"></script>

@endsection

@section('main_js')
<script>
    jQuery(document).ready(function(){

$('#product_id').change(function(){
    var product_id = $(this).val();
    if(product_id){
        $.ajax({
           type:"GET",
           url:"{{url('/admin/order/azax')}}/"+product_id,
           success:function(res){
            if(res){
                $("#color_id").empty();
                $("#color_id").append('<option>Select</option>');
                $.each(res,function(key,value){

                    $("#color_id").append(`<option value='${value.id}'> color- ${value.color}, size- ${value.size},</option>`);
                });
            }else{
               $("#color_id").empty();
            }
           }
        });
    }else{
        $("#product_id").empty();
        $("#color_id").empty();
    }
   });
   {{--  slug  --}}

   $('#MetaTitle').keyup(function() {
    $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
});

    });

{{--  Add more product function  --}}
let product = document.getElementById('product_id')
let color = document.getElementById('color_id');
let quantity = document.getElementById('quantity');
let price = document.getElementById('price');
let okButton = document.querySelector('.ok_btn')
let table = document.querySelector('.mytbody');
let x = table.getElementsByTagName('td')

let prod = document.getElementById('prod_id');
let clr = document.getElementById('clr_id');
let qun = document.getElementById('qun');
let prc = document.getElementById('prc');
let postTr={
    product:[],
    color: [],
    quantity: [],
    price: []
}
okButton.addEventListener('click',function(){
    if(!product.value == ''){
        let tr = document.createElement('tr');

        tr.innerHTML = `<tr>
            <td>${product.options[product.selectedIndex].text}</td>
            <td>${color.options[color.selectedIndex].text}</td>
            <td>${quantity.value}</td>
            <td>${price.value}</td>

        </tr>
          `
          table.appendChild(tr);
          let trobj= [
            product.value,
           color.value,
           price.value,
            quantity.value
          ]



            $.ajax({
                type:'GET',
                url:"{{ url('/admin/order/store/azax') }}/"+trobj,
                success:function(datas){

                    let data = datas.split(',');
                    postTr.product.push([data[0]])
                    postTr.color.push([data[1]])
                    postTr.quantity.push([data[2]])
                    postTr.price.push([data[3]])


                    prod.value = postTr.product;
                    clr.value= postTr.color
                    qun.value= postTr.quantity
                    prc.value= postTr.price




                }
              })









          {{--  Delete items  --}}

          for(let i =0;i<x.length;i++){
            x[i].addEventListener('click',function(){
             this.parentNode.remove()

             let p = prod.value.split(',');
             p.splice (p.indexOf(i), 1)
             prod.value = p

             let c = clr.value.split(',');
             c.splice (c.indexOf(i), 1)
             clr.value = c


            let q = qun.value.split(',');
                q.splice (q.indexOf(i), 1)
                qun.value = q


                let pr = prc.value.split(',');
                pr.splice (pr.indexOf(i), 1)
                prc.value = pr


            })
          }
        }

    })

    {{--  Zila upazila finding out  --}}
    {{--  district finding out  --}}
    $('#division').change(function(){
        var division = $(this).val();
        if(division){
            $.ajax({
               type:"GET",
               url:"{{url('/admin/order/division')}}/"+division,
               success:function(res){
                if(res){
                    $("#district").empty();
                    $("#district").append('<option>Select</option>');
                    $.each(res,function(key,value){
                        $("#district").append(`<option value='${value.id}'> ${value.name}</option>`);
                    });
                }else{
                   $("#district").empty();
                }
               }
            });
        }else{
            $("#division").empty();
            $("#district").empty();
        }
       });
       {{-- sub district (upzela) finding out  --}}
       $('#district').change(function(){
        var district = $(this).val();
        if(district){
            $.ajax({
               type:"GET",
               url:"{{url('/admin/order/upzila')}}/"+district,
               success:function(res){
                if(res){
                    $("#upozela").empty();
                    $("#upozela").append('<option>Select</option>');
                    $.each(res,function(key,value){
                        $("#upozela").append(`<option value='${value.id}'> ${value.name}</option>`);
                    });
                }else{
                   $("#upozela").empty();
                }
               }
            });
        }else{
            $("#district").empty();
            $("#upozela").empty();
        }
       });
       {{-- Union finding out  --}}
       $('#upozela').change(function(){
        var upozela = $(this).val();
        if(upozela){
            $.ajax({
               type:"GET",
               url:"{{url('/admin/order/union')}}/"+upozela,
               success:function(res){
                if(res){
                    $("#union").empty();
                    $("#union").append('<option>Select</option>');
                    $.each(res,function(key,value){
                        $("#union").append(`<option value='${value.id}'> ${value.name}</option>`);
                    });
                }else{
                   $("#union").empty();
                }
               }
            });
        }else{
            $("#upozela").empty();
            $("#union").empty();
        }
       });




</script>

@endsection
