<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UserManagementController extends Controller
{
    //Function for show all customer users list
    public function all_user_list(){
    $get_user_lists = User::orderBy('id', 'DESC')->where('user_type', 'Customer')->get();    
        return view('admin.all-users', compact('get_user_lists'));
    }

    //Function for edit user
    public function edit_user($id) {
    $users = User::find($id);
        return view('admin.edit-user', compact('users'));
    }

    //Function for update user
    public function update_user(Request $request, $id){
    //update user     
    $update_user = User::where('id', $id)->update([
        'name' => $request->name,
        'dot_number' => $request->dot_number,
        'company' => $request->company,
    ]);
        //check if user record is update or not
        if($update_user){
            return back()->with('success', 'Customer user detail updated successfully.');
        } else {
            return back()->with('unsuccess', 'Opps something went wrong.');
        }
    }

    //Function for delete user
    public function delete_user($id){
    $delete_user = User::where('id', $id)->delete();
        //check if user record is delete or not
        if($delete_user){
            return back()->with('success', 'Customer user detail deleted successfully.');
        } else {
            return back()->with('unsuccess', 'Opps something went wrong.');
        }
    }
}
