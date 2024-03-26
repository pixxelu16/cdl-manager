<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;

class DashboardController extends Controller
{
    //Function for show abouts page
    public function dashboard(){
    //Get user login id   
    $login_user_id = auth()->id(); 
    $user = User::find($login_user_id); 
        return view('customer.dashboard', compact('user'));
    }

    //Function for conservations
    public function conversations(){
        return view('customer.conversations');
    }

    //Function for contact
    public function contacts(){
        return view('customer.contact');
    }

    //Function for CDLM
    public function cdlm(){
        return view('customer.cdlm');
    }
    
    //Function for edit profile
    public function edit_profile($id){
    $profiles = User::find($id);    
        return view('customer.edit-profile', compact('profiles'));
    }

    //Function for update profile
    public function update_profile(Request $request, $id){
    //update user profile
    $update_profile = User::where('id', $id)->update([
        'name' => $request->name,
        'company' => $request->company,
        'dot_number' => $request->dot_number,
    ]);  
        //check if user profile is update or not
        if ($update_profile) {  
            return back()->with('success', 'Profile detail updated successfully.');
        } else {
            return back()->with('unsuccess', 'Oops Something wrong. Please try Again.');
        }
    }

    //Function for change password
    public function change_password(){
        return view('customer.change-password');
    }

    //Function for show customer change password page
    public function submit_change_password(Request $request){
        //check auth login detail
        $user = Auth::user();
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('unsuccess', 'Your current password does not match with the password you provided.');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Your password has been changed successfully.');
    }
}

