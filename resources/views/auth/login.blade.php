@extends('layouts.master')

@section('content')
<div class="app_desin-saction_1">
   <div class="container">
      <div class="logo"><a href="{{ url('/login') }}"><img src="{{ asset('public/assets/images/logo.png') }}" alt="logo.png" /></a></div>
   </div>
</div>
<div class="welcome-saction-all">
   <div class="container">
      <h2>Welcome to CDL ExpressWay</h2>
      <p>Team Communication</p>
      <div class="from-all">
        @if (Session::has('unsuccess'))
            <div class="notifaction-red">
            <p> {{ Session::get('unsuccess') }}</p>
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
        @csrf
            <div class="input-row">
               <label>Email Address</label>
               <input type="text" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
            </div>
            <div class="input-row">
               <label>Password</label>
               <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            </div>
            <div class="forget-row">
               <a href="{{ url('password/reset') }}">Forgot Password?</a>
            </div>
            <div class="button">
               <button type="submit">SIGN IN</button>
            </div>
         </form>
      </div>
   </div>
</div>
<div class="button-bottom-saction">
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
