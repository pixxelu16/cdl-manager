@extends('layouts.master')

@section('content')


<div class="profile-row">
<div class="container">
<div class="profile-row-header">
<a href="#" class="back-buton"><img src="{{ asset('public/assets/images/back.png') }}"></a>
<h2>SIGN UP</h2>
</div>
<div class="profile-icon">
<div class="profile-bx-inner">
<img src="{{ asset('public/assets/images/user.png') }}">
</div>
</div>
</div>
</div>


<div class="welcome-saction-all sign-up">
<div class="container">
<div class="from-all">
 <form method="POST" action="{{ route('register') }}">
  @csrf
<div class="input-row">
<label>Email Address</label>
 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

@error('email')
	<span class="invalid-feedback" role="alert">
		<strong>{{ $message }}</strong>
	</span>
@enderror
</div>
<div class="input-row">
<label>Full Name</label>
 <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
@error('name')
	<span class="invalid-feedback" role="alert">
		<strong>{{ $message }}</strong>
	</span>
@enderror
</div>
<div class="input-row">
<label>Company</label>
<input type="text" placeholder="" />
</div>
<div class="input-row">
<label>Role</label>
<input type="text" placeholder="" />
</div>
<div class="input-row">
<label>Dot Number</label>
<input type="text" placeholder="" />
</div>
<div class="input-row">
<label>Password</label>
 <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

@error('password')
	<span class="invalid-feedback" role="alert">
		<strong>{{ $message }}</strong>
	</span>
@enderror
</div>
<div class="bay-click-row">
<p>By clicking SIGN UP, you agree to our <a href="#">Terms and Conditions</a> and that you have read our <a href="#">Privacy Policy</a></p>
</div>
<div class="button">
<button>SIGN UP</button>
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