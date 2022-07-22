@extends('layouts.master')
@section('main-section')

<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    <form action="{{url('customer-login')}}" method="post">
                        @csrf

                        <input type="email" name="customer_email" placeholder="Email Address" required=""/>
                        <input type="password" name="customer_password" placeholder="Password" required="">
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2>
                    <form action="{{url('customer-register')}}" method="post">
                         @csrf
                        <input type="text" name="customer_name" placeholder="Name" />
                            @error('customer_name')
                                {{$message}}
                            @enderror


                        <input type="email" name="customer_email" placeholder="Email Address"/>
                            @error('customer_email')
                                {{$message}}
                            @enderror


                         <input type="password"  name="password" placeholder="Password"/>
                            @error('password')
                                {{$message}}
                                @enderror


                        <input type="password"  name="password_confirmation" placeholder=" Confirm Password"/>
                            @error('password_confirmation')
                                {{$message}}
                            @enderror


                         <input type="text"  name="customer_mobilenumber" placeholder="Mobile Number"/>
                            @error('customer_mobilenumber')
                                {{$message}}
                            @enderror
                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection
