<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view ('admin.add_product');
    }

    public function save_product()
    {
        return view('admin.add_product');
    }
}
