@extends('layouts.master')
@include('layouts.slider')
@include('layouts.sidemenu')
@section('main-section')
<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Features Items</h2>
        <?php foreach($all_publish_product as $product){?>
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{url($product->product_image)}}" style="width: 100%; height: 250px;" alt="" />
                                <h2>BDT {{$product->product_price}}</h2>
                                <a href="{{url('view-product', $product->product_id)}}">
                                    <p>{{$product->product_name}}</p>
                                </a>
                                <a href="{{url('view-product', $product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>BDT {{$product->product_price}}</h2>
                                    <a href="{{url('view-product', $product->product_id)}}">
                                        <p>{{$product->product_name}}</p>
                                    </a>
                                    <a href="{{url('view-product', $product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                            </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>{{$product->brand_name}}</a></li>
                            <li><a href="{{url('view-product', $product->product_id)}}"><i class="fa fa-plus-square"></i>View Product</a></li>
                        </ul>
                    </div>
                </div>
            </div>

       <?php } ?>



    </div><!--features_items-->



</div>


@endsection

