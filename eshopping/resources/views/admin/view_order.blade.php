@extends('admin.admin_layouts.main')
@section('admin-main-content')
<!-- start: Content -->


<div id="content" class="span20">


            <div class="row fluid sortable">
                <div class="row" style="margin-left: 30px;">
                    <div class="box span6">
                        <div class="box-header">
                        <h2>
                            <i class="halflings-icon align-justify"></i>
                            <span class="break"></span>
                            Customer Details
                            </h2>
                        </div>

                        <div class="box-content">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Customer Mobileno.</th>
                                        <th>Customer Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> {{$order_by_id->customer_name}}</td>
                                        <td> {{$order_by_id->customer_mobilenumber}}</td>
                                        <td> {{$order_by_id->customer_email}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="box  span6">
                        <div class="box-header">
                        <h2>
                            <i class="halflings-icon align-justify"></i>
                            <span class="break"></span>
                            Shipping Details
                            </h2>
                        </div>

                        <div class="box-content">
                            <table class="table">
                                <thead>
                                    <tr>

                                        <th>Shipping Name</th>
                                        <th>Shipping Mobileno.</th>
                                        <th>Shipping Email</th>
                                        <th>Shipping Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> {{$order_by_id->shipping_name}}</td>
                                        <td> {{$order_by_id->shipping_mobilephone}}</td>
                                        <td> {{$order_by_id->shipping_email}}</td>
                                        <td> {{$order_by_id->shipping_address}}, {{$order_by_id->shipping_city}} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row fluid sortable">
                <div class="row" style="margin-left: 30px">
                    <div class="box  span6">
                        <div class="box-header">
                        <h2>
                            <i class="halflings-icon align-justify"></i>
                            <span class="break"></span>
                            Order Details
                            </h2>
                        </div>

                        <div class="box-content">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product Id</th>
                                        <th>Product Name</th>
                                        <th>Product Sale Quantity</th>
                                        <th>Product Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> {{$order_by_id->product_id}}</td>
                                        <td> {{$order_by_id->product_name}}</td>
                                        <td> {{$order_by_id->product_sale_quantity}}</td>
                                        <td> {{$order_by_id->product_price}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="box  span6">
                        <div class="box-header">
                        <h2>
                            <i class="halflings-icon align-justify"></i>
                            <span class="break"></span>
                                Payment Details
                            </h2>
                        </div>

                        <div class="box-content">
                            <table class="table">
                                <thead>
                                    <tr>

                                        <th>Payment Method</th>
                                        <th>Payment Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> {{$order_by_id->payment_method}}</td>
                                        <td> {{$order_by_id->payment_status}}</td>
                                        <td class="center">
                                            @if($order_by_id->payment_status == 'on')
                                                <a class="btn btn-danger" href="{{url('/inactive_payment', $order_by_id->payment_id)}}">
                                                    <i class="halflings-icon white thumbs-down"></i>
                                                </a>
                                            @else
                                            <a class="btn btn-success" href="{{url('/active_payment', $order_by_id->payment_id)}}">
                                                <i class="halflings-icon white thumbs-up"></i>
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


</div>
@endsection
