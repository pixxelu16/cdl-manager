<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //Functiin for show abouts page
    public function dashboard(){
        return view('customer.dashboard');
    }
}
