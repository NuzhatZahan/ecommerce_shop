<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use DB;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.add_brands');
    }

    public function all_brands()
    {
       $all_brand_info = Brand::get();
       $manage_brand = view('admin.all_brands')->with('all_brand_info', $all_brand_info);

       return view('admin.admin_layouts.main')->with('admin.all_brands', $manage_brand);
    }

    public function save_brands(Request $request)
    {
        $data = new Brand;
        $data->brand_id = $request['brand_id'];
        $data->brand_name = $request['brand_name'];
        $data->brand_description = $request['brand_description'];
        $data->status = $request['publication_status'];

        $data->save();

        session()->put('message', "Brand is added successfully");
        return redirect('/add_brands');


    }


    public function inactive_brands($brand_id)
    {

        DB::table('brands')->where('brand_id', $brand_id)->update(['status'=>null]);
        session()->put('message', "Brand inactive successfully");
        return redirect('/all_brands');


    }
    public function active_brands($brand_id)
    {

        DB::table('brands')->where('brand_id', $brand_id)->update(['status'=>'on']);
        session()->put('message', "Brand actived successfully");
        return redirect('/all_brands');
    }


    public function edit_brands($brand_id)
    {
        $brand_info=DB::table('brands')->where('brand_id', $brand_id)->first();
        $brand_edit = view('admin.edit_brands')->with('brand_info', $brand_info);
        session()->put('message', "Category is updated successfully");

         return view('admin.admin_layouts.main')->with('admin.edit_brands', $brand_edit);
    }

    public function update_brands(Request $request, $brand_id)
    {

        $data = array();
        $data['brand_name']=$request->brand_name;
        $data['brand_description']=$request->brand_description;

        DB::table('brands')->where('brand_id', $brand_id)->update($data);

        session()->put('message', "Brand is updated successfully");
        return redirect('/all_brands');

    }


    public function delete_brands($brand_id)
    {
        //$data = Category::find($category_id);
       // if(!is_null($data))
       //   $data->delete();

        DB::table('brands')->where('brand_id', $brand_id)->delete();
        session()->put('message', "Brand is deleted successfully");
        return redirect('/all_brands');
    }

}
