<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use DB;
use session;
session_start();

class SuperAdminController extends Controller
{
    //

    public function index()
    {
        $this->AdminAuthCheck();
        return view('admin.dashboard');
    }
    public function logout()
    {
        //session()->put('admin_name', null);
        //session()->put('admin_id', null);
        session()->flush();
        return redirect('/admin');
    }

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

}
