<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view-dashboard')->only('index');
    }

    public function index()
    {
        return view('admin.dashboard');
    }
}
