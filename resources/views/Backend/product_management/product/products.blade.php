
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
            <h4 class="page-title float-left">Product</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>

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
                <a class="btn btn-success waves-effect waves-light " href="{{ route('product.create') }}">Add </a>
            </div>



            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Catagory</th>
                    <th>Subcatagory</th>
                    <th>Brand </th>
                    <th>Product img</th>
                    <th>SKU</th>
                    <th>Product Name </th>
                    <th>Short Description</th>
                    <th>Long Description</th>
                    <th>
                      <table>
                        <tr>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Quantity</th>
                        </tr>
                    </table>
                    </th>
                    <th>Product Price</th>
                    <th>Product Type</th>
                    <th>Material</th>
                    <th>Is Features</th>
                    <th>Best Selling</th>
                    <th>Meta Title</th>
                    <th>Slug</th>
                    <th>Meta Description</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
                </thead>


                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->catagory->catagory_name }}</td>
                        <td>{{ $product->subcatagory->subcatagory }}</td>
                        <td>{{ $product->brand->brand_name }}</td>
                        <td >

                          <img src="{{ url( $product->product_img[0] ) }}" width="50" alt="">

                        </td>
                        <td>{{ $product->sku_id }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{!! substr($product->short_description,0,20) !!}</td>
                        <td>{!! substr($product->long_description,0,20 ) !!}</td>
                        <td>
                            <table>

                             @foreach ($colors as $clr)
                                 @if($clr->product_id == $product->id)
                                     <tr>
                                         <td>
                                             <div class="form-group">
                                                 <div data-color-format="rgb" data-color="rgb({{ $clr->color ? $clr->color : '-' }})" class="colorpicker-default input-group">

                                                     <span class="input-group-btn add-on">
                                                         <button class="btn btn-white" type="button">
                                                             <i style="background-color: rgb({{ $clr->color ? $clr->color : '-' }});margin-top: 2px;"></i>
                                                         </button>
                                                     </span>
                                                 </div>
                                             </div>

                                         </td>
                                         <td>{{ ($clr->size ? $clr->size : '-') }}</td>
                                         <td>{{ ($clr->quantity ? $clr->quantity : '-') }}</td>

                                     </tr>
                                 @endif
                             @endforeach
                            </table>
                         </td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->product_type  }}</td>
                        <td>{{ $product->material }}</td>
                        <td>{{ $product->is_features=='on'?'Features':'Regular product' }}</td>
                        <td>{{ $product->best_selling=='on'?'Best selling':'Regular product' }}</td>


                        <td>{{ $product->meta_title }}</td>
                        <td>{{ $product->slug }}</td>
                        <td>{{ $product->meta_description }}</td>
                        <td>
                           @if ($product->status==1)
                           <a href="{{ route('product.deactive',$product->id) }}" class="btn btn-info">Active</a>
                           @else
                           <a href="{{ route('product.active',$product->id) }}" class="btn btn-inverse">Deactive</a>
                           @endif
                        </td>
                        {{--  single product view here starts --}}
                        <td>
                            <!-- Button trigger modal -->
                            <a class="btn btn-info waves-effect waves-light btn-sm"   data-toggle="modal" data-target="#exampleModal{{ $product->id }}" >View</a>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              {{--  model body start  --}}





                             <table class="table table-border">
                                <thead>
                                  <tr>
                                    <th scope="col">Items Name  </th>
                                    <th scope="col">Description</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      <th >Catagory Name</th>
                                      <td>{{ $product->catagory->catagory_name }}</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">Catagory Name</th>
                                      <td>{{ $product->subcatagory->subcatagory }}</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">Brand Name</th>
                                      <td>{{ $product->brand->brand_name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Product Image</th>
                                        <td >

                                            <img src="{{ url( $product->product_img[0] ) }}" width="50" alt="">

                                          </td>
                                      </tr>
                                      <tr>
                                        <th scope="row">SKU ID</th>
                                        <td>{{ $product->sku_id }}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Product Name</th>
                                        <td>{{ $product->product_name }}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Product Short Description</th>
                                        <td>{!! substr($product->short_description,0,20) !!}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Product Long Description</th>
                                        <td>{!! substr($product->long_description,0,20 ) !!}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Varient</th>
                                        <td>
                                          <table>

                                           @foreach ($colors as $clr)
                                               @if($clr->product_id == $product->id)
                                                   <tr>
                                                       <td>
                                                           <div class="form-group">
                                                               <div data-color-format="rgb" data-color="rgb({{ $clr->color ? $clr->color : '-' }})" class="colorpicker-default input-group">

                                                                   <span class="input-group-btn add-on">
                                                                       <button class="btn btn-white" type="button">
                                                                           <i style="background-color: rgb({{ $clr->color ? $clr->color : '-' }});margin-top: 2px;"></i>
                                                                       </button>
                                                                   </span>
                                                               </div>
                                                           </div>

                                                       </td>
                                                       <td>{{ ($clr->size ? $clr->size : '-') }}</td>
                                                       <td>{{ ($clr->quantity ? $clr->quantity : '-') }}</td>

                                                   </tr>
                                               @endif
                                           @endforeach
                                          </table>
                                       </td>
                                      </tr>
                                      <tr>
                                          <th scope="row">Price</th>
                                          <td>{{ $product->price }}</td>
                                        </tr>
                                      <tr>
                                          <th scope="row">Product Type</th>
                                          <td>{{ $product->product_type  }}</td>
                                        </tr>
                                      <tr>
                                          <th scope="row">Product Meterial</th>
                                          <td>{{ $product->material }}</td>
                                        </tr>
                                      <tr>
                                          <th scope="row">Is Features</th>
                                          <td>{{ $product->is_features=='on'?'Features':'Regular product' }}</td>
                                        </tr>
                                      <tr>
                                          <th scope="row">Is Best Sellings</th>
                                          <td>{{ $product->best_selling=='on'?'Best selling':'Regular product' }}</td>
                                        </tr>
                                      <tr>
                                          <th scope="row">Status</th>
                                          <td>
                                              @if ($product->status==1)
                                              <a href="{{ route('product.deactive',$product->id) }}" class="btn btn-info">Active</a>
                                              @else
                                              <a href="{{ route('product.active',$product->id) }}" class="btn btn-inverse">Deactive</a>
                                              @endif
                                           </td>
                                        </tr>

                                  </tbody>

                              </table>















                              {{--  model body ends  --}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>
                            </div>
                        </div>
                        </div>
                    </td>
                        {{--  single product view here ends --}}

                        <td><a class="btn btn-success" href="{{ route('product.edit',$product->id) }}">Edit</a></td>
                        <td><a class="btn btn-danger" href="{{ route('product.delete',$product->id) }}">delete</a></td>
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

