@extends('layouts.master')
@section('content')
<div class="profile-row">
   <div class="container">
      <div class="profile-row-header">
         <h2>Profile</h2>
      </div>
      <div class="profile-icon">
         <div class="profile-bx-inner">
            <img src="{{ asset('public/assets/images/user.png') }}">
         </div>
         <span>{{ $user->name }}</span>
         <em>{{ $user->company }}</em>
      </div>
   </div>
</div>
<div class="profile-list-li">
   <div class="container">
      <ul>
         <li class="list-errow"><a href="{{ url('customer/edit-profile', $user->id) }}">Edit Profile</a></li>
         <li class="list-errow"><a href="{{ url('customer/change-password') }}">Change Password</a></li>
         <li class="list-errow"><a href="#">Terms & Conditions</a></li>
         <li class="list-errow"><a href="#">Privacy & Policy</a></li>
         <li class="notifiction-li">
            <a href="#">
               Push Notifications
               <div class="on-off"><input type="checkbox" value="1" class="switch"></div>
            </a>
         </li>
         <li class="logout-li">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
               @csrf
            </form>
         </li>
      </ul>
   </div>
</div>
@include('customer.footer')
@endsection