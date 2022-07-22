<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
//use App\Models\Product;
use DB;
use Cart;
use App\Engagement;
use session;
class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
        //echo " hello";
        $qty = $request->qty;
        $size = $request->size;
        $product_id = $request->product_id;
        $product_info=DB::table('products')->where('product_id', $product_id)->first();


        $data['id']=$product_info->product_id;
        $data['name']=$product_info->product_name;
        $data['quantity']= $qty;

        $data['price'] = $product_info->product_price;
        //$data['total'] = int($qty) * $product_info->product_price;
        $data['attributes']['image'] = $product_info->product_image;
        $data['attributes']['size'] = $size;

        Cart::add($data);
        return redirect('/show-cart');
    }

    public function show_cart()
    {
        $cart_items = DB::table('products')->where('publication_status', 'on')->get();
        $manage_cart_itmes= view('add_to_cart')->with('cart_itmes', $cart_items);
        return view('layouts.master')->with('add_to_cart', $manage_cart_itmes);
    }

    public function delete_cart($id)
    {
        //echo $id;
        Cart::remove($id);
        return redirect('/show-cart');
    }

    public function update_cart(Request $request, $id)
    {

        $id = $request->id;
        Cart::update($id, array('quantity' => 0,));
        $qty = $request->quantity;

        Cart::update($id, array('quantity' => $qty,));
        return back()->with('success', 'Item quantity updated in your cart');


    }
}
