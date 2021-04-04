<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminloginForm(){
        return view('admin.login');
    }
    public function AdminRegistrationForm(){
        return view('admin.register');
    }
    public function AdminDashboard(){
        return view('admin.index');
    }
}
