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

    //Function to get all user customer details
    public function get_user_profile() {
    $get_all_users = User::where('user_type', 'Customer')->get()->toArray();
        //check if any user with type 'Customer' exists or noy
        if (count($get_all_users) >= 1) {
            $all_user_list = [];
            foreach ($get_all_users as $user_detail) {
                //get users record
                $all_user_list[] = [
                    'id' => $user_detail['id'],
                    'name' => $user_detail['name'],
                    'email' => $user_detail['email'],
                    'dot_number' => $user_detail['dot_number'],
                    'company' => $user_detail['company'],
                    'created_at' => $user_detail['created_at'],
                    'updated_at' => $user_detail['updated_at'],
                ];
            }
            //get response
            $success['status'] = 200;
            $success['message'] = "Customer users details get successfully.";
            $success['data'] = $all_user_list; 
            return response()->json($success, 200);
        } else {
            $success['status'] = 400;
            $success['message'] = "No customer users found.";
            $success['data'] = []; 
            return response()->json($success, 400);
        }
    }

    //Function for user update profile
    public function update_user_profile(Request $request, $id){
    //update user profile
    $update_user = User::where('id', $id)->update([
        'name' => $request->name,
        'dot_number' => $request->dot_number,
        'company' => $request->company,
    ]);
        //check if user record is upate or not
        if($update_user){
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

    //Function for update password with email
    public function updated_password(Request $request) {
        //validation
        $request->validate([
            'email' => 'required|email',
            'old_password' => 'required|min:6',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);
        //Check if email is exit or not
        $user = User::where('email', $request->email)->first();
        //Check if the user exist or not
        if ($user) {
            //verify current password
            if (Hash::check($request->old_password, $user->password)) {
                //update the password
                $user->password = Hash::make($request->new_password);
                $user->update();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Password updated successfully.',
                ], 200);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Old password is incorrect.',
                ], 401);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found.',
            ], 404);
        }
    }
}
    
    
