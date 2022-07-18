<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Slider;

use DB;
use App\Engagement;
use session;
session_start();
class SliderController extends Controller
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
        return view('admin.add_slider');
    }

    public function save_slider(Request $request)
    {
        $data = new Slider;
        $data->slider_id=$request['slider_id'];
        $data->slider_status = $request['slider_status'];

        $image = $request->file('slider_image');
        //print_r($image);
        if($image){
            $image_name =time();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path ='slider/';
            $image_url=$upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if($success){
                $data->slider_image= $image_url;
                $data->save();
                session()->put('message', "slider is added successfully");
                return redirect('/add_slider');

            }

        }
        $data->slider_image= '';
        session()->put('message', "Product is added successfully without image");
        return redirect('/add_slider');

    }

    public function all_slider()
    {
        $this->AdminAuthCheck();
        $all_slider_info=DB::table('slider') ->get();
        //echo"<pre>";
       //print_r($all_product_info);
       //$all_product_info = Product::get();
        $manage_slider = view('admin.all_slider')->with('all_slider_info', $all_slider_info);
        $all_slider_info = Slider::paginate(10);
       return view('admin.admin_layouts.main')->with('admin.all_slider', $manage_slider);
    }

    public function active_slider($slider_id)
    {
        //echo "$category_id";
        DB::table('slider')->where('slider_id', $slider_id)->update(['slider_status'=>'on']);
        session()->put('message', "Product active successfully");
        return redirect('/all_slider');


    }

    public function inactive_slider($slider_id)
    {
        //echo "$category_id";
        DB::table('slider')->where('slider_id', $slider_id)->update(['slider_status'=>'off']);
        session()->put('message', "Product inactive successfully");
        return redirect('/all_slider');


    }

    public function delete_slider($slider_id)
    {
        DB::table('slider')->where('slider_id', $slider_id)->delete();
        session()->put('message', "Product is deleted successfully");
        return redirect('/all_slider');
    }

}
