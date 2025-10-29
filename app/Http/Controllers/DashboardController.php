<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index_admin() {
        return view('admin.dashboard')->with('Berhasil Login!');
    }
    public function index() {
        return view('user.dashboard')->with('Berhasil Login!');
    }
}
