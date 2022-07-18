@extends('admin.admin_layouts.main')
@section('admin-main-content')
<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{url('/dashboard')}}">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Tables</a></li>
    </ul>

    <div class="row fluid sortable" >
        <p class= "alert-success box span12">
            <?php
                $message = session()->get('message');
                    if($message)
                    {
                        echo "$message";
                        session()->put('message', null);
                    }
            ?>
        </p>
    </div>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
            </div>


            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                  <thead>
                      <tr>
                          <th>Product Id</th>
                          <th>Product Image</th>
                          <th>Product Name</th>
                          <th>Product Category</th>
                          <th>Product Brands</th>
                          <th>Product Short Description</th>
                          <th>Product Long Description</th>
                          <th>Product Size</th>
                          <th>Product Color</th>
                          <th>Product Price</th>
                          <th>Status</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  @foreach (  $all_product_info as $product )
                  <tbody>
                    <tr>
                        <td>{{$product->product_id}}</td>
                        <td> <img src="{{url($product->product_image)}}" style="height:80px; width:80px;"></td>
                        <td class="center">{{$product->product_name}}</td>
                        <td class="center">{{$product->category_name}}</td>
                        <td class="center">{{$product->brand_name}}</td>
                        <td class="center">{{$product->product_short_description}}</td>
                        <td class="center">{{$product->product_long_description}}</td>
                        <td class="center">{{$product->product_size}}</td>
                        <td class="center">{{$product->product_color}}</td>
                        <td class="center">{{$product->product_price}}</td>
                        <td class="center">{{$product->publication_status}}</td>

                        <td class="center">
                            @if($product->publication_status == 'on')
                                <span class="label label-success">Active</span>
                            @else
                                <span class="label label-danger">Inactive</span>
                            @endif
                        </td>
                        <td class="center">
                            @if($product->publication_status == 'on')
                                <a class="btn btn-danger" href="{{url('/inactive_product', $product->product_id)}}">
                                    <i class="halflings-icon white thumbs-down"></i>
                                </a>
                            @else
                            <a class="btn btn-success" href="{{url('/active_product', $product->product_id)}}">
                                <i class="halflings-icon white thumbs-up"></i>
                            </a>
                            @endif

                            <a class="btn btn-info" href="{{url('/edit_product',$product->product_id)}}">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" id = "delete" href="{{url('/delete_product', $product->product_id)}}">
                                <i class="halflings-icon white trash"></i>
                            </a>
                        </td>
                    </tr>

                  </tbody>

                  @endforeach


              </table>

            </div>



        </div><!--/span-->
        <div class="row">
            {{ $all_product_info->links() }}
        </div>
    </div><!--/row-->

</div><!--/.fluid-container-->

    <!-- end: Content -->

@endsection
