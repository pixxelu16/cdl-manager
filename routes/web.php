<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Commin Route End
Route::group(['middleware' => 'auth'], function(){ 
    //Admin Only 
    Route::group(['middleware' => 'admin'], function(){ 
        Route::get('admin/dashboard','App\Http\Controllers\Admin\DashboardController@dashboard');
    });
    
    //Customer Only 
    Route::group(['middleware' => 'customer'], function(){
        Route::get('customer/dashboard','App\Http\Controllers\Customer\DashboardController@dashboard'); 
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');