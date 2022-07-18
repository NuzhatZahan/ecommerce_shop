<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Product;
use DB;
use App\Engagement;
use session;
session_start();
class ProductController extends Controller
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

    public function index(){

        $this->AdminAuthCheck();
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
            $image_name =time();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path ='image/';
            $image_url=$upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if($success){
                $data->product_image= $image_url;
                $data->save();
                session()->put('message', "Product is added successfully");
                return redirect('/add_product');

            }

        }
        $data->product_image= '';
        session()->put('message', "Product is added successfully without image");
        return redirect('/add_product');


    }

    public function all_product()
    {
        $this->AdminAuthCheck();
        $all_product_info=DB::table('products')
                            ->join('category', 'products.category_id','=','category.category_id')
                            ->join('brands', 'products.brand_id','=','brands.brand_id')
                            ->get();
        //echo"<pre>";
       //print_r($all_product_info);
       //$all_product_info = Product::get();
        $all_product_info = Product::paginate(10);
        $manage_product = view('admin.all_product')->with('all_product_info', $all_product_info);

       return view('admin.admin_layouts.main')->with('admin.all_product', $manage_product);
    }

    public function inactive_product($product_id)
    {
        //echo "$category_id";
        DB::table('products')->where('product_id', $product_id)->update(['publication_status'=>0]);
        session()->put('message', "Product inactive successfully");
        return redirect('/all_product');


    }
    public function active_product($product_id)
    {
        //echo "$category_id";
        DB::table('products')->where('product_id', $product_id)->update(['publication_status'=>'on']);
        session()->put('message', "Product active successfully");
        return redirect('/all_product');


    }

    public function delete_product($product_id)
    {
        DB::table('products')->where('product_id', $product_id)->delete();
        session()->put('message', "Product is deleted successfully");
        return redirect('/all_product');
    }

    public function edit_product($product_id)
    {
        $this->AdminAuthCheck();
        $product_info=DB::table('products')->where('product_id', $product_id)->first();
        $product_edit = view('admin.edit_product')->with('product_info', $product_info);
        session()->put('message', "Product updated successfully");

         return view('admin.admin_layouts.main')->with('admin.edit_product', $product_edit);
    }

    public function update_product(Request $request, $product_id)
    {
        $data = array();
        $data['product_name']=$request->product_name;
        $data['category_id']=$request->category_id;
        $data['brand_id']=$request->brand_id;
        $data['product_short_description']=$request->product_short_description;
        $data['product_long_description']=$request->product_long_description;
        $data['product_size']=$request->product_size;
        $data['product_color']=$request->product_color;
        $data['product_price']=$request->product_price;

        DB::table('products')->where('product_id', $product_id)->update($data);

        session()->put('message', "product is updated successfully");
        return redirect('/all_product');

    }
}
