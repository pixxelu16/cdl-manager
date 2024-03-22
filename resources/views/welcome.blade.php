@extends('layouts.master')

@section('content')
    <div class="app_desin-saction_1">
        <div class="container">
        <div class="logo"><a href="{{ url('/login') }}"><img src="{{ asset('public/assets/images/logo.png') }}" alt="logo.png" /></a></div>
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
