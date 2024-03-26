@extends('layouts.master')
@section('content')
<div class="profile-row">
   <div class="container">
      <div class="profile-row-header">
         <a href="{{ url('customer/conversation') }}" class="back-buton"><img src="{{ asset('public/assets/images/back.png') }}"></a>
         <h2><span class="span-dot"></span>CDLM</h2>
      </div>
   </div>
</div>
<div class="container">
   <div id="frame">
      <div class="content">
         <div class="messages">
            <ul>
               <li class="sent">
                  <p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!</p>
               </li>
               <li class="replies">
                  <p>When you're backed against the wall, break the god damn thing down.</p>
               </li>
               <li class="replies">
                  <p>Excuses don't win championships.</p>
               </li>
               <li class="sent">
                  <p>Oh yeah, did Michael Jordan tell you that?</p>
               </li>
               <li class="replies">
                  <p>No, I told him that.</p>
               </li>
               <li class="replies">
                  <p>What are your choices when someone puts a gun to your head?</p>
               </li>
               <li class="sent">
                  <p>What are you talking about? You do what they say or they shoot you.</p>
               </li>
               <li class="replies">
                  <p>Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do any one of a hundred and forty six other things.</p>
               </li>
            </ul>
         </div>
         <div class="message-input">
            <div class="wrap">
               <input type="text" placeholder="Write your message..." />
               <i class="fa fa-paperclip attachment" aria-hidden="true"></i>
               <button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="button-bottom-saction">
   <div class="container">
      <div class="button-menu">
         <ul>
            <li><a href="{{ url('customer/conversation') }}"><img src="{{ asset('public/assets/images/icon-1.png') }}"></a></li>
            <li><a href="{{ url('customer/contact') }}"><img src="{{ asset('public/assets/images/icon-2.png') }}"></a></li>
            <li><a href="{{ url('customer/dashboard') }}"><img src="{{ asset('public/assets/images/icon-3.png') }}"></a></li>
         </ul>
      </div>
   </div>
</div>
@endsection