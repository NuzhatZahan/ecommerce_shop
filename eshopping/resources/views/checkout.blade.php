@extends('layouts.master')
@section('main-section')


<section id="cart_items">
    <div class="container">



        <div class="register-req">
            <p>Please provide all the necessary information to avail your product successfully</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">

                <div class="col-sm-12 clearfix">
                    <div class="bill-to">
                        <p>Bill To</p>
                        <div class="form-one">
                            <form action="{{url('add-shipping')}}" method=post>
                                @csrf
                                <input type="text" name="shipping_name" placeholder="Full Name *">
                                <input type="text"  name="shipping_email" placeholder="Email*">
                                <input type="textarea" name="shipping_address" placeholder="Address*" rows="3">
                                <input type="text" name="shipping_mobilephone" placeholder="Mobile Phone">
                                <input type="text" name="shipping_city" placeholder="City*">
                                <input type="submit"  class="btn btn-warning" value="Done">

                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section> <!--/#cart_items-->
@endsection
