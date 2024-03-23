@extends('layouts.master')
@section('content')
<style>
   .notifaction-green {
   color: green;
   }
   .notification-red {
   color: red;
   }
</style>
<div class="profile-row">
   <div class="container">
      <div class="profile-row-header">
         <a href="{{ url('customer/dashboard') }}" class="back-buton"><img src="{{ asset('public/assets/images/back.png') }}"></a>         
         <h2>Change Password</h2>
         @if (Session::has('success')) 
         <div class="notifaction-green">
            <p>{{ Session::get('success') }}</p>
         </div>
         @endif 
         @if (Session::has('unsuccess')) 
         <div class="notifaction-red">
            <p> {{ Session::get('unsuccess') }}</p>
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
<div class="button-bottom-saction">
   <div class="button-bottom-tow-saction">
      <div class="container">
         <div class="button-menu-two">
            <ul>
               <li><a href="#"><img src="{{ asset('public/assets/images/icon-4.png') }}" class="green-icon"><img src="images/icon-4-blue.png') }}" class="blue-icon"><span>Conversations</span></a></li>
               <li><a href="#"><img src="{{ asset('public/assets/images/icon-5.png') }}" class="green-icon"><img src="{{ asset('public/assets/images/icon-5-blue.png') }}" class="blue-icon"><span>Contacts</span></a></li>
               <li class="active"><a href="#"><img src="{{ asset('public/assets/images/user-1.png') }}" class="green-icon"><img src="{{ asset('public/assets/images/icon-6.png') }}" class="blue-icon"><span>Profile</span></a></li>
            </ul>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="button-menu">
         <ul>
            <li><a href="#"><img src="{{ asset('public/assets/images/icon-1.png') }}"></a></li>
            <li><a href="#"><img src="{{ asset('public/assets/images/icon-2.png') }}"></a></li>
            <li><a href="#"><img src="{{ asset('public/assets/images/icon-3.png') }}"></a></li>
         </ul>
      </div>
   </div>
</div>
@endsection