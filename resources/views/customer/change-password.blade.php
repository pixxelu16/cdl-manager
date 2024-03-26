@extends('layouts.master')
@section('content')
<style>
   .notifaction-green {
   color: green;
   text-align: center;
   font-size: 20px;
   }
   .notifaction-red {
   text-align: center;
   color: red;
   font-size: 20px;
   }
</style>
<div class="profile-row">
   <div class="container">
      <div class="profile-row-header">
         <a href="{{ url('customer/dashboard') }}" class="back-buton"><img src="{{ asset('public/assets/images/back.png') }}"></a>         
         <h2>Change Password</h2>
         @if (Session::has('success')) 
         <div class="notifaction-green">
            <p2>{{ Session::get('success') }}</p2>
         </div>
         @endif 
         @if (Session::has('unsuccess')) 
         <div class="notifaction-red">
            <p2> {{ Session::get('unsuccess') }}</p2>
         </div>
         @endif
      </div>
   </div>
</div>
<div class="edit-profile-form">
   <div class="container">
      <form action="{{ route('update.password') }}" Method="POST">
         @csrf
         <div class="edit-row-input">
            <input type="password" id="current_password" name="current_password" placeholder="Current Password" required/>
         </div>
         <div class="edit-row-input">
            <input type="password" id="password "name="password" placeholder="New Password" required/>
         </div>
         <div class="edit-row-input">
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required/>
         </div>
         <div class="edit-row-input">
            <button type="submit" name="submit">Update</button>
         </div>
      </form>
   </div>
</div>
@include('customer.footer')
@endsection