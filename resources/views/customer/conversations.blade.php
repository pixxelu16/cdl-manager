@extends('layouts.master')
@section('content')
<div class="profile-row">
   <div class="container">
      <div class="profile-row-header">
         <h2>Conversations</h2>
      </div>
   </div>
</div>
<div class="conversations-list">
   <div class="container">
      <div class="search-row">
         <input type="search" placeholder="Jump to conversation..." />
         <button class="serch-buton"><img src="{{ asset('public/assets/images/magnifying-glass.png') }}"></button>
      </div>
      <div class="conversations-list-li">
         <ul>
            <li>
               <a href="#">
                  <div class="list-user-img"><img src="{{ asset('public/assets/images/user.png') }}"></div>
                  <div class="list-user-text"><span>CDLM</span> <em>this works thanks</em></div>
                  <div class="list-user-ago"><em>4 years ago</em></div>
               </a>
            </li>
            <li>
               <a href="#">
                  <div class="list-user-img"><img src="{{ asset('public/assets/images/user.png') }}"></div>
                  <div class="list-user-text"><span>CDLM</span> <em>this works thanks</em></div>
                  <div class="list-user-ago"><em>4 years ago</em></div>
               </a>
            </li>
         </ul>
      </div>
   </div>
</div>
@include('customer.footer')
@endsection