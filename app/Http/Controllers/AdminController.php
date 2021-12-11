<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function getAdmins()
    {
        $admins = DB::select('select * from admin');
        dd($admins);
    }

    public function getAdminLogin(Request $request)
    {
        $username = $request->get('AdminName');
        $password = $request->get('AdminPassword');
        $admin = DB::select('select * from admin where AdminName="'.$username.'" AND AdminPassword="'.$password.'"');
        if (sizeof($admin) > 0) {
            return response($admin, 200)
                        ->header('Content-Type', 'application/json');
        } else {
            return response("Admin login failed.", 400)
                        ->header('Content-Type', 'text/plain');
        }
    }
}
