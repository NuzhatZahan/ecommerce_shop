<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\SuperAdminController;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Category;

use DB;
use session;
session_start();
class CategoryController extends Controller
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
        return view('admin.add_category');
    }

    public function all_category()
    {
        $this->AdminAuthCheck();
       $all_category_info = Category::get();
       //echo "<pre>";
       //print_r( $all_category_info);
       $manage_category = view('admin.all_category')->with('all_category_info', $all_category_info);
       $all_category_info = Product::paginate(10);
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
        session()->put('message', "Category inactive successfully");
        return redirect('/all_category');


    }
    public function active_category($category_id)
    {
        //echo "$category_id";
        DB::table('category')->where('category_id', $category_id)->update(['status'=>'on']);
        session()->put('message', "Category active successfully");
        return redirect('/all_category');
    }

    public function edit_category($category_id)
    {
        $this->AdminAuthCheck();
        $category_info=DB::table('category')->where('category_id', $category_id)->first();
        $category_edit = view('admin.edit_category')->with('category_info', $category_info);
        session()->put('message', "Category updated successfully");

         return view('admin.admin_layouts.main')->with('admin.edit_category', $category_edit);
    }

    public function update_category(Request $request, $category_id)
    {
        $data = array();
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;

        DB::table('category')->where('category_id', $category_id)->update($data);


        session()->put('message', "Category is updated successfully");
        return redirect('/all_category');

    }

    public function delete_category($category_id)
    {
        //$data = Category::find($category_id);
       // if(!is_null($data))
       //   $data->delete();

        DB::table('category')->where('category_id', $category_id)->delete();
        session()->put('message', "Category is deleted successfully");
        return redirect('/all_category');
    }

}
