<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;
use App\Engagement;

class ProductController extends Controller
{
    public function index(){
        return view ('admin.add_product');
    }

    public function save_product(Request $request)
    {
        $data = new Product;
        $data->product_id=$request['product_id'];
        $data->category_id=$request['category_id'];
        $data->brand_id=$request['brand_id'];
        $data->product_name=$request['product_name'];
        $data->product_short_description=$request['product_short_description'];
        $data->product_long_description=$request['product_long_description'];
        $data->product_size=$request['product_size'];
        $data->product_price=$request['product_price'];
        $data->product_color=$request['product_color'];
        $data->publication_status=$request['publication_status'];

        //$filename= time()."ws". $request->file('product_image').getClientOriginalExtension();
       // echo $request->file('product_image')->storeAs('uploads',$filename);
        //$image->store('uploads');
       // echo '<pre>';
      //  print_r($image);
        $image = $request->file('product_image');
        if($image){
            $image_name = $image.time();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path ='image/';
            $image_url=$upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if($success){
                $data->product_image= $image_url;
                $data->save();
                session()->put('message', "Productis added successfully");
                return redirect('/add_product');
               //echo '<pre>';
               //print_r($data);
            }

        }
        $data->product_image= '';
        session()->put('message', "Product is added successfully without image");
        return redirect('/add_product');


    }
}
