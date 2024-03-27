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
        Route::get('admin/all-users','App\Http\Controllers\Admin\UserManagementController@all_user_list');
        Route::get('admin-edit-user/{id}','App\Http\Controllers\Admin\UserManagementController@edit_user'); 
        Route::post('admin/update-user/{id}','App\Http\Controllers\Admin\UserManagementController@update_user')->name('admin.update.user');
        Route::get('admin-delete-user/{id}','App\Http\Controllers\Admin\UserManagementController@delete_user'); 
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
        Route::get('customer/cdlm','App\Http\Controllers\Customer\DashboardController@cdlm');        
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');