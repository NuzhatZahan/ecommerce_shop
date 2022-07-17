<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DB;
use session;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.add_category');
    }

    public function all_category()
    {
       $all_category_info = Category::get();
       //echo "<pre>";
       //print_r( $all_category_info);
       $manage_category = view('admin.all_category')->with('all_category_info', $all_category_info);

       return view('admin.admin_layouts.main')->with('admin.all_category', $manage_category);
    }

    public function save_category(Request $request)
    {
        $data = new Category;
        $data->category_id = $request['category_id'];
        $data->category_name = $request['category_name'];
        $data->category_description = $request['category_description'];
        $data->status = $request['publication_status'];

        $data->save();

        //echo "<pre>";
        //print_r($data);
       // DB::table('category')->insert($data);
        session()->put('message', "Category is updated successfully");
        return redirect('/add_category');


    }

    public function inactive_category($category_id)
    {
        echo "$category_id";
        DB::table('category')->where('category_id', $category_id)->update(['status'=>null]);
        session()->put('message', "Category active successfully");
        return redirect('/all_category');


    }
    public function active_category($category_id)
    {
        echo "$category_id";
        DB::table('category')->where('category_id', $category_id)->update(['status'=>'on']);
        return redirect('/all_category');
    }

}
