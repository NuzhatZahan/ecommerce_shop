<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    //
    public function logout()
    {
        //session()->put('admin_name', null);
        //session()->put('admin_id', null);
        session()->flush();
        return redirect('/admin');
    }

}
