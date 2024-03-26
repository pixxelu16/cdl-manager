@extends('layouts.master')
@section('content')
<style>
   .notifaction-green {
   color: green;
   text-align: center;
   font-size: 20px;
   }
   .notification-red {
   color: red;
   text-align: center;
   font-size: 20px;
   }
</style>
<div class="profile-row">
   <div class="container">
      <div class="profile-row-header">
         <a href="{{ url('customer/dashboard') }}" class="back-buton"><img src="{{ asset('public/assets/images/back.png') }}"></a>
         <h2>Edit Profile</h2>
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
            <input type="text" name="email" value="{{$profiles->email}}" placeholder="Email Address" disabled />
         </div>
         <div class="edit-row-input">
            <input type="text" name="name" value="{{$profiles->name}}" placeholder="Full Name" required/>
         </div>
         <div class="edit-row-input">
            <input type="text" name="company" value="{{$profiles->company}}" placeholder="Company" required/>
         </div>
         <div class="edit-row-input">
            <input type="text" name="dot_number" id="dot_number" value="{{$profiles->dot_number}}" placeholder="Dot Number" />
         </div>
         <div class="edit-row-input">
            <button type="submit" name="submit">Update</button>
         </div>
      </form>
   </div>
</div>
@include('customer.footer')
@endsection