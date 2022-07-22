<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use DB;
use App\Engagement;
use session;

class OrderController extends Controller
{
    public function AdminAuthCheck()
    {
        $admin_id = session()->get('admin_id');
        if ($admin_id) {
            return;
        }
        else{
          return redirect('/admin')->send();
        }
    }

    public function index()
    {
        $this->AdminAuthCheck();
        $all_order_info=DB::table('order')
                            ->join('customer', 'customer.customer_id','=','order.customer_id')
                            ->select('order.*','customer.customer_name')
                            ->get();
        //echo"<pre>";
       //print_r($all_product_info);
       //$all_product_info = Product::get();


        $manage_order = view('admin.manage_order')->with('all_order_info', $all_order_info);

       return view('admin.admin_layouts.main')->with('admin.manage_order', $manage_order);
    }

    public function view_order($order_id)
    {
        $this->AdminAuthCheck();
        $order_by_id=DB::table('order')
                            ->join('order_details', 'order_details.order_id','=','order.order_id')
                            ->join('customer', 'customer.customer_id','=','order.customer_id')
                            ->join('shipping', 'shipping.shipping_id','=','order.shipping_id')
                            ->join('payment','payment.payment_id','=','order.payment_id')
                            ->select('order_details.*', 'customer.*', 'shipping.*','payment.*')
                            ->where('order.order_id', $order_id)
                            ->first();
        //echo"<pre>";
       //print_r($all_product_info);
       //$all_product_info = Product::get();


        $view_order = view('admin.view_order')->with('order_by_id', $order_by_id);

       return view('admin.admin_layouts.main')->with('admin.view_order', $view_order);
    }


    public function inactive_order($order_id)
    {
        //echo "$category_id";
        DB::table('order')->where('order_id', $order_id)->update(['order_status'== 'off']);
        session()->put('message', "Order inactive successfully");
        return redirect('/customer_order');


    }
    public function active_order($order_id)
    {
        //echo "$category_id";
        DB::table('order')->where('order_id', $order_id)->update(['order_status'=='on']);
        session()->put('message', "Order active successfully");
        return redirect('/customer_order');

    }

    public function delete_order($order_id)
    {
        DB::table('order')->where('order_id', $order_id)->delete();
        session()->put('message', "Order is deleted successfully");
        return redirect('/customer_order');
    }


    public function inactive_payment($payment_id)
    {
        //echo "$category_id";
        DB::table('payment')->where('payment_id', $payment_id)->update(['payment_status'== 'off']);
        session()->put('message', "Order inactive successfully");
        return redirect('/customer_order');

    }
    public function active_payment($order_id)
    {
        //echo "$category_id";
        DB::table('payment')->where('payment_id', $payment_id)->update(['payment_status'=='on']);
        session()->put('message', "Order active successfully");
        return redirect('/customer_order');

    }
}
