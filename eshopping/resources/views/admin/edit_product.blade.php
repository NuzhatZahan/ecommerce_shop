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
        <li>
            <i class="icon-edit"></i>
            <a href="#">Update Product</a>
        </li>
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
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>

            </div>
            <div class="box-content">
                <form class="form-horizontal" action ="{{url('update_product', $product_info->product_id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                  <fieldset>

                    <div class="control-group">
                      <label class="control-label">Product Name</label>
                      <div class="controls">
                        <input type="text" class="input-xlarge" name="product_name" value="{{$product_info->product_name}}" >
                      </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="selectError3">Product Category</label>
                        <div class="controls">
                          <select id="selectError3" name="category_id">
                            <option>Select category...</option>
                                <?php
                                    $all_publish_category =DB::table('category')->where('status','on')->get();
                                    foreach ($all_publish_category as $category) {
                                    # code.  ?>

                                        <option value="{{$category->category_id}}">{{$category->category_name}}</option>

                                <?php }  ?>
                          </select>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="selectError3">Product Brands</label>
                        <div class="controls">
                            <select id="selectError3" name="brand_id">
                                <option>Select brands...</option>
                                <?php
                                    $all_publish_brands =DB::table('brands')->where('status','on')->get();
                                    foreach ($all_publish_brands as $brands) {
                                    # code.  ?>

                                        <option value="{{$brands->brand_id}}">{{$brands->brand_name}}</option>

                                <?php }  ?>

                            </select>
                         </div>
                      </div>

                    <div class="control-group hidden-phone">
                      <label class="control-label">Product Short Description</label>
                      <div class="controls">
                        <input type="text" class="input-xlarge" name="product_short_description" value="{{$product_info->product_short_description}} ">
                      </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label">Product long Description</label>
                        <div class="controls">
                          <textarea class="cleditor" name="product_long_description" rows="1" >
                            {{$product_info->product_short_description}}
                        </textarea>
                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label">Product Size</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="product_size" value="{{$product_info->product_size}}" >
                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label">Product Price</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="product_price" value="{{$product_info->product_price}}" >
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Product Color</label>
                        <div class="controls">
                          <input type="text" class="input-xlarge" name="product_color" value="{{$product_info->product_color}}">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Image</label>
                        <div class="controls">
                          <input type="file" class="input-file uniform-on" id="fileInput" name="product_image">
                        </div>
                    </div>


                    <div class="form-actions">
                      <button type="submit" class="btn btn-primary">Update product</button>
                    </div>

                  </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div><!--/row-->

</div><!--/.fluid-container-->

    <!-- end: Content -->

@endsection

