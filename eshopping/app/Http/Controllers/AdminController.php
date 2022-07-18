<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use session;
session_start();
class AdminController extends Controller
{
    public function index(){
        return view('admin.admin_login');
    }

    public function dashboard(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        $result = DB::table('admin')->where('admin_email', $admin_email)
                                    ->where('admin_password', $admin_password)->first();
        //echo "<pre>";
        //print_r($result);
        if ($result) {
          session()->put('admin_name', $result->admin_name);
           session()->put('admin_id', $result->admin_id);
            return redirect('/dashboard');
        }
        else{
            session()->put('message', 'Email or password is invalid');
            return redirect('/admin');
        }

    }
}
