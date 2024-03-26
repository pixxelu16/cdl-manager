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
        Route::get('customer/edit-profile/{id}','App\Http\Controllers\Customer\DashboardController@edit_profile');
        Route::post('customer/update-profile/{id}','App\Http\Controllers\Customer\DashboardController@update_profile')->name('profile.update');
        Route::get('customer/change-password','App\Http\Controllers\Customer\DashboardController@change_password');
        Route::post('customer/update-password','App\Http\Controllers\Customer\DashboardController@submit_change_password')->name('update.password');
        Route::get('customer/conversation','App\Http\Controllers\Customer\DashboardController@conversations'); 
        Route::get('customer/contact','App\Http\Controllers\Customer\DashboardController@contacts');        
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');