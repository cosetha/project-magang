<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function Dashboard(){
        return view('admin.dashboardAdmin');
    }

    public function SosialMedia(){
        return view('admin.MiniNavbar.socialmediaAdmin');
    }

    public function LoginForm(){
        return view('auth.login');
    }
}
