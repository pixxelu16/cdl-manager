<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //Function for create register
    public function register(Request $request) {   
        //check is name field is required
        if($request->name){   
            //check if the email already exists
            $IsEmailExists = User::where('email', $request->email)->exists();
            if($IsEmailExists) {
                $success['status'] = 400;
                $success['message'] = 'Email is already taken. Please try with a new email.';
                return response()->json($success, 400);
            }
            //check if mobile number is exit only digits
            if (!preg_match('/^\d{10}$/', $request->mobile)) {
                $success['status'] = 400;
                $success['message'] = 'Mobile number must be 10 digits.';
                return response()->json($success, 400);
            }
                //create register
                $create_user_register = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request['password']),
                    'dot_number' => $request->mobile,
                    'company' => $request->company,
                    'api_token' => Str::random(60),
                ]);  

                //check if register is created or not
                if($create_user_register) {
                    $success['status'] = 200;
                    $success['message'] = 'User register detail created successfully.';
                    $success['data'] = [];
                    return response()->json($success, 200);
                } else {
                    $success['status'] = 400;
                    $success['message'] = 'Oops Something Went Wrong.';
                    $success['data'] = [];
                    return response()->json($success, 400);
                } 
        //check first field name is required otherwise not insert data         
        } else {
            $success['status'] = 400;
            $success['message'] = 'First field name is required';
            return response()->json($success, 400);
        }    
    }    

    //Function for user login
    public function login(Request $request) {
        $users = $request->only('email', 'password');        
        //check if users is exit or not
        if(Auth::attempt($users)) {
            $user = Auth::user();            
            //generate JWT token with user details
            $token = JWTAuth::fromUser($user);    
            //Return response with token and user details
            return response()->json([
                    'token' => $token,
            ], 200);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Invalid credentials.',
                'data' => [],
            ], 400);
        }
    }

    //Function to get a single customer's detail
    public function get_single_user_profile(Request $request) {
        //Get user id
        $id = $request->id;
        $user = User::where('user_type', 'Customer')->find($id);
        // Check if the user exists
        if ($user) {
            //get user data
            $user_detail = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'dot_number' => $user->dot_number,
                'company' => $user->company,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ];

            //get response
            $success['status'] = 200;
            $success['message'] = "Customer user detail get successfully.";
            $success['data'] = $user_detail; 
            return response()->json($success, 200);
        } else {
            $success['status'] = 400;
            $success['message'] = "Opps something went wrong.";
            $success['data'] = []; 
            return response()->json($success, 400);
        }
    }

    //Function for user update profile
    public function update_user_profile(Request $request) {
    //Get user id
    $id = $request->id;
    //update user profile
    $update_user = User::where('id', $id)->update([
        'name' => $request->name,
        'dot_number' => $request->dot_number,
        'company' => $request->company,
    ]);
        //check if user record is upate or not
        if($update_user) {
            $success['status'] = 200;
            $success['message'] = "Customer user detail updated successfully.";
            $success['data'] = []; 
            return response()->json($success, 200);
        } else {
            $success['status'] = 400;
            $success['message'] = "Opps something went wrong.";
            $success['data'] = []; 
            return response()->json($success, 400);
        }
    }

    //Function for updating password with user id
    public function updated_password(Request $request) {
        //validation
        $request->validate([
            'id' => 'required|integer',
            'current_password' => 'required|min:6',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|min:6',
        ]);
        //get user id
        $user = User::find($request->id);
        //check if the user exists or not
        if ($user) {      
                    
            //check if new password matches confirm password
            if ($request->new_password !== $request->confirm_password) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'New password and confirm password do not match.',
                ], 400);
            }
                //verify current password
                if (Hash::check($request->current_password, $user->password)) {
                    //update the password
                    $user->password = Hash::make($request->new_password);
                    $user->save();
                    //response
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Password updated successfully.',
                    ], 200);
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Old password is incorrect.',
                    ], 400);
                }    
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found.',
            ], 400);
        } 
    }
}
    
    
