<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use DB;
use session;

class IndexController extends Controller
{
    public function index()
    {
        //return view('index');
        $all_publish_product=DB::table('products')
                            ->join('category', 'products.category_id','=','category.category_id')
                            ->join('brands', 'products.brand_id','=','brands.brand_id')
                            ->select('products.*', 'category.category_name', 'brands.brand_name')
                            ->limit(6)
                            ->where('publication_status','on')
                            ->get();

        $manage_publish_product = view('index')->with('all_publish_product',  $all_publish_product);
        return view('layouts.master')->with('index', $manage_publish_product);
    }

    public function product_by_category($category_id)
    {
       //echo "hello";
       //echo "$category_id";

       $all_category_product=DB::table('products')
                            ->join('category', 'products.category_id','=','category.category_id')
                            ->join('brands', 'products.brand_id','=','brands.brand_id')
                            ->select('products.*', 'category.*', 'brands.*')
                            ->where('publication_status','on')
                            ->where('category.category_id', $category_id)
                            ->get();

        $manage_category_product = view('product_by_category')->with('all_category_product',  $all_category_product);
        return view('layouts.master')->with('product_by_category', $manage_category_product);
    }


    public function product_by_brand($brand_id)
    {
       //echo "hello";
       //echo "$brand_id";

       $all_brand_product=DB::table('products')
                            ->join('category', 'products.category_id','=','category.category_id')
                            ->join('brands', 'products.brand_id','=','brands.brand_id')
                            ->select('products.*', 'category.*', 'brands.*')
                            ->where('publication_status','on')
                            ->where('brands.brand_id', $brand_id)
                            ->get();

        $manage_brand_product = view('product_by_brand')->with('all_brand_product',  $all_brand_product);
        return view('layouts.master')->with('product_by_brand', $manage_brand_product);
    }


    public function view_product($product_id)
    {
        //echo "$product_id";
        $product_details=DB::table('products')
                            ->join('category', 'products.category_id','=','category.category_id')
                            ->join('brands', 'products.brand_id','=','brands.brand_id')
                            ->select('products.*', 'category.*', 'brands.*')
                            ->where('publication_status','on')
                            ->where('products.product_id', $product_id)
                            ->first();

        $manage_product_details = view('view_product')->with('product_details',  $product_details);
        return view('layouts.master')->with('view_product', $manage_product_details);
    }
}
