@extends('layouts.master')
@section('main-section')

<section id="cart_items">
    <div class="container col-sm-12">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info col-sm-9">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item Image</td>
                        <td class="description">Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">size</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $contents = Cart::getContent();
                        foreach($contents as $content) {
                    ?>
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{url($content->attributes->image)}}"  style="height:100px; width:80px; "alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$content->name}}</a></h4>
                            <p>Web ID: 1089772</p>
                        </td>
                        <td class="cart_price">
                            <p>{{$content->price}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form action="{{url('update-cart', $content->id)}}" method="post">
                                    @csrf
                                    <input class="cart_quantity_input" type="text" name="quantity" value="{{$content->quantity}}" autocomplete="off" size="2">
                                    <input type="hidden" name="id" value="{{$content->id}}">
                                    <input type="submit" name="submit" class ="btn btn-sm btn-default" value="update">
                                </form>
                            </div>
                        </td>
                        <td class="cart_size">
                            <p>{{$content->attributes->size}}</p>
                        </td>

                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{url('delete-to-cart', $content->id)}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->


<section id="do_action">
<div class="container">
    <div class="heading">
        <h3>What would you like to do next?</h3>
        <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
    </div>
    <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Payment method</li>
        </ol>
    </div>
    <div class="paymentCont col-sm-8">
        <div class="headingWrap">
                <h3 class="headingTop text-center">Select Your Payment Method</h3>
                <p class="text-center">Created with bootsrap button and using radio button</p>
        </div>
        <form action="{{url('/order-place')}}" method="post">
            @csrf
                <input type="radio" name="payment_gateway" value="Cash On Delivery"/> Cash On delivery<br>
                <input type="radio" name="payment_gateway" value="Paypal"/> Paypal <br>
                <input type="radio" name="payment_gateway" value="Debitcard"/> Debit Card<br>
                <input type="submit" value="Done"/>
        </form>

    </div>
</div>
</section><!--/#do_action-->

@endsection
