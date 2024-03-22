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
        $user = Auth::user();

        //Check user type
        if($user->user_type == 'Admin'){
            return redirect('admin/dashboard'); 
        } elseif($user->user_type == 'Customer'){
            return redirect('customer/dashboard'); 
        } else {
            return view('home');
        }
    }
}
