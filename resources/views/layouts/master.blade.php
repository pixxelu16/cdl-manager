<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>CDL Manager</title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
      <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.min.css') }}">
      <script> var base_url = '{{ url("/") }}'; </script>
   </head>
   <body>
      <!--Loader-->
      <div class="common-loader" style="display:none;">
         <img src="{{ asset('public/assets/images/loader-img.gif') }}" class="loading-image">
      </div>
      @yield('content') 
      <script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
      <script src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script>      
      <script src="{{ asset('public/assets/js/custom-ajax') }}"></script>
      <script src="{{ asset('public/assets/js/custom-script.js') }}"></script>          
      <script src="{{ asset('public/assets/js/jquery.validate.min') }}"></script>      
   </body>
</html>