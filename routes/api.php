<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Register
Route::post('register', [App\Http\Controllers\Api\AuthController::class, 'register']);
//Login
Route::post('login', [App\Http\Controllers\Api\AuthController::class, 'login']);
//Get single user detail
Route::get('get-single-user-detail', [App\Http\Controllers\Api\AuthController::class, 'get_single_user_profile']);
//Update customer user
Route::post('update-user-profile', [App\Http\Controllers\Api\AuthController::class, 'update_user_profile']);
//Change customer user password
Route::post('update-password', [App\Http\Controllers\Api\AuthController::class, 'updated_password']);


