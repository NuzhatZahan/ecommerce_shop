<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipping;
use DB;
use session;

class ShippingController extends Controller
{
    public function add_shipping(Request $request)
    {
        //echo "<pre>";
       // print_r($request->all());
        /*$data = new Shipping;
        $data->shipping_name = $request['shipping_name'];
        $data->shipping_email = $request['shipping_email'];
        $data->shipping_address = $request['shipping_address'];
        $data->shipping_mobilephone = $request['shipping_mobilephone'];
        $data->shipping_city = $request['shipping_city'];
        $data->save();*/

        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_mobilephone'] = $request->shipping_mobilephone;
        $data['shipping_city'] = $request->shipping_city;

        $result = Shipping::insertGetId($data);
        session()->put('shipping_id',$result);
        //$shipping_id = session()->get('shipping_id');

       return redirect('/payment');
    }
}
