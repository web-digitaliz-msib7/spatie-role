<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('admin.dashboard');
    // }
    public function userDashboard()
    {
        return view('user.dashboard');  // Tampilan dashboard untuk user
    }

    public function adminDashboard()
    {
        return view('admin.dashboard');  // Tampilan dashboard untuk admin dan super-admin
    }
}