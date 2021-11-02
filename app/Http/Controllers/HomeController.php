<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function index()
    {
        return view('home');
    }
    public function backToPage()
    {
        return view('admin.adminpage');
    }
    public function mainPage(){
        if(Auth::user()->is_admin=="1"){
            return view('admin.adminpage');
        }
        else{
            return view('user.userlogin');
        }
    }
    public function backFunction(){
        return previous();
    }
}
