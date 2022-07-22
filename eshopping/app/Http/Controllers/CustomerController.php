<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use session;
use DB;
use Cart;
session_start();
class CustomerController extends Controller
{
    public function customer_register(Request $request)
    {
        $request->validate(
            [

                'customer_name' => 'required',
                'customer_email'  => "required|email",
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
                'customer_mobilenumber' => 'required',
            ]
            );

            //echo "<pre>";
            // print_r($request->all());

       $data = new Customer;
        $data->customer_name = $request['customer_name'];
        $data->customer_email = $request['customer_email'];
        $data->customer_password = $request['password'];
        $data->customer_mobilenumber = $request['customer_mobilenumber'];
        $data->save();

        //session()->put('customer_id', $request['customer_id']);
        //session()->put('customer_name', $request['customer_name']);
        return redirect('/login-check');
    }

    public function login(Request $request)
    {
        $customer_email = $request->customer_email;
        $customer_password = $request->customer_password;
        $result = DB::table('customer')->where('customer_email', $customer_email)->first();


        if ($result) {
            session()->put('customer_name', $result->customer_name);
            session()->put('customer_id', $result->customer_id);
            $cart_quantity = Cart::session($result->customer_id)->getTotalQuantity();
             if ($cart_quantity !=NULL)
                return redirect('/check-out');
            else
            return redirect('/');
        }
        else{
            session()->put('message', 'Email or password is invalid');
            return redirect('/login');
        }
    }

    public function logout()
    {

        session()->flush();
        return redirect('/');
    }

}
