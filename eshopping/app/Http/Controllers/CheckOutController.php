<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use session;
class CheckOutController extends Controller
{
    public function index()
    {
        return view('checkout');
    }
    public function login_check()
    {
        return view('login');
    }

    public function payment()
    {
        $cart_items = DB::table('products')->where('publication_status', 'on')->get();
        $manage_cart_itmes= view('payment')->with('cart_itmes', $cart_items);
        return view('layouts.master')->with('payment', $manage_cart_itmes);
    }

    public function order_place(Request $request)
    {
        $payment_gateway = $request['payment_gateway'];
        //echo $payment_gateway;
        //$shipping_id = session()->get('shipping_id');
        $pdata = array();
        $pdata['payment_method'] = $request->payment_gateway;
        if($payment_gateway != 'Cash On Delivery')
            $pdata['payment_status'] = 'on';

         $payment_id= DB::table('payment')->insertGetId($pdata);
         //session()->put('payment_id' , $payment_id);
         //echo $payment_id;

         /* order database added */

         $odata = array();
         $odata['customer_id'] = session()->get('customer_id');
         $odata['shipping_id'] = session()->get('shipping_id');
         $odata['payment_id'] = $payment_id;
         $odata['order_total'] = Cart::getTotal();
         $odata['order_status'] = 'on';

         $order_id= DB::table('order')->insertGetId($odata);

         /* order details */
         $content = Cart::getContent();
         $oddata=array();
         foreach($content as $c)
         {
            $oddata['order_id'] = $order_id;
            $oddata['product_id'] = $c->id;
            $oddata['product_name']=$c->name;
            $oddata['product_price']=$c->price;
            $oddata['product_sale_quantity']=$c->quantity;

            DB::table('order_details')->insert($oddata);
         }


         if($payment_gateway == 'Cash On Delivery')
         {
            Cart::clear();
            return view('cash');

         }
         else if($payment_gateway == 'Paypal')
         {
            //echo "payment successful.Thank you for your purchase.";
         }
         else{
            echo "payment successful.Thank you for your purchase.";
         }


    }
}
