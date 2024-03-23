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
         <a href="#" class="back-buton"><img src="{{ asset('public/assets/images/back.png') }}"></a>
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
         <h2>Edit Profile</h2>
      </div>
      <div class="profile-icon">
         <div class="profile-bx-inner">
            <img src="{{ asset('public/assets/images/user.png') }}">
            <button class="edite-buton"><img src="{{ asset('public/assets/images/edit-text.png') }}"></button>
         </div>
      </div>
   </div>
</div>
<div class="edit-profile-form">
   <div class="container">
      <form action="{{ route('profile.update', $profiles->id) }}" Method="POST">
         @csrf
         <div class="edit-row-input">
            <input type="text" name="email" value="{{$profiles->email}}"placeholder="Email Address" disabled />
         </div>
         <div class="edit-row-input">
            <input type="text" name="name" value="{{$profiles->name}}" placeholder="Full Name" />
         </div>
         <div class="edit-row-input">
            <input type="text" name="company" value="{{$profiles->company}}" placeholder="Company" />
         </div>
         <div class="edit-row-input">
            <input type="text" name="dot_number" value="{{$profiles->dot_number}}" placeholder="Dot Number" />
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
               <li><a href="#"><img src="{{ asset('public/assets/images/icon-4.png') }}" class="green-icon"><img src="{{ asset('public/assets/images/icon-4-blue.png') }}" class="blue-icon"><span>Conversations</span></a></li>
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