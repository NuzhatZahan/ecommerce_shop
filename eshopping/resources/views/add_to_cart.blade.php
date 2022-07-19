@extends('layouts.master')
@section('main-section')
<section id="cart_items">
    <div class = "col-sm-6">
        <div class="container">
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
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class = "col-sm-8">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
            </div>
            <div class="row">
            <!-- <div class="col-sm-6">
                    <div class="chose_area">
                        <ul class="user_option">
                            <li>
                                <input type="checkbox">
                                <label>Use Coupon Code</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Use Gift Voucher</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Estimate Shipping & Taxes</label>
                            </li>
                        </ul>
                        <ul class="user_info">
                            <li class="single_field">
                                <label>Country:</label>
                                <select>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field">
                                <label>Region / State:</label>
                                <select>
                                    <option>Select</option>
                                    <option>Dhaka</option>
                                    <option>London</option>
                                    <option>Dillih</option>
                                    <option>Lahore</option>
                                    <option>Alaska</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field zip-field">
                                <label>Zip Code:</label>
                                <input type="text">
                            </li>
                        </ul>
                        <a class="btn btn-default update" href="">Get Quotes</a>
                        <a class="btn btn-default check_out" href="">Continue</a>
                    </div>
                </div>-->
                <div class="col-sm-8">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>{{Cart::getSubTotal()}}</span></li>
                            <li>Eco Tax <span>$2</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>{{Cart::getTotal()}}</span></li>
                        </ul>
                            <a class="btn btn-default update" href="">Update</a>
                            <a class="btn btn-default check_out" href="{{url('check-out')}}">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
@endsection
