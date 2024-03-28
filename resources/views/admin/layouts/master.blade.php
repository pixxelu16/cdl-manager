<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark"  data-sidebar-size="lg" data-sidebar-image="none">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Admin">
      <meta name="keywords" content="admin">
      <meta name="author" content="Admin">
      <title>Amdin Dashboard</title>
      <!-- Datatable CSS -->
      <link rel="stylesheet" href="{{ asset('public/admin/css/dataTables.bootstrap4.min.css') }}">
      <!-- Favicon -->
      <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/admin/img/favicon.png') }}">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{ asset('public/admin/css/bootstrap.min.css') }}">
      <!-- Fontawesome CSS -->
      <link rel="stylesheet" href="{{ asset('public/admin/plugins/fontawesome/css/fontawesome.min.css') }}">
      <link rel="stylesheet" href="{{ asset('public/admin/plugins/fontawesome/css/all.min.css') }}">
      <!-- Lineawesome CSS -->
      <link rel="stylesheet" href="{{ asset('public/admin/css/line-awesome.min.css') }}">
      <link rel="stylesheet" href="{{ asset('public/admin/css/material.css') }}">
      <!-- Chart CSS -->
      <link rel="stylesheet" href="{{ asset('public/admin/plugins/morris/morris.css') }}">
      <!-- Main CSS -->
      <link rel="stylesheet" href="{{ asset('public/admin/css/style.css') }}">
   </head>
   <body>
      <!-- Main Wrapper -->
      <div class="main-wrapper">
      <!-- Header -->
      <div class="header">
         @include('admin.layouts.header')
      </div>
      <!-- /Header -->
      <!-- Sidebar -->
      <div class="sidebar" id="sidebar">
         @include('admin.layouts.sidebar')
      </div>
      <!-- /Sidebar -->
      @yield('content')
      <script>
         var base_url = '{{ url("/admin") }}'; 
      </script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <!-- jQuery -->
      <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
      <script src="{{ asset('public/admin/js/jquery-3.7.1.min.js') }}"></script>
      <!-- Bootstrap Core JS -->
      <script src="{{ asset('public/admin/js/bootstrap.bundle.min.js') }}"></script>
      <!-- Slimscroll JS -->
      <script src="{{ asset('public/admin/js/jquery.slimscroll.min.js') }}"></script>
      <!-- Chart JS -->
      <script src="{{ asset('public/admin/plugins/morris/morris.min.js') }}"></script>
      <script src="{{ asset('public/admin/plugins/raphael/raphael.min.js') }}"></script>
      <script src="{{ asset('public/admin/js/chart.js') }}"></script>
      <script src="{{ asset('public/admin/js/greedynav.js') }}"></script>
      <!-- Theme Settings JS -->
      <script src="{{ asset('public/admin/js/layout.js') }}"></script>
      <script src="{{ asset('public/admin/js/theme-settings.js') }}"></script>
      <!-- Custom JS -->
      <script src="{{ asset('public/admin/js/app.js') }}"></script>
      <!-- Custom JS Custom-->
      <script src="{{ asset('public/admin/js/custom-ajax') }}"></script>
      <script src="{{ asset('public/admin/js/custom-script.js') }}"></script>
      <!-- Datatable JS -->
      <script src="{{ asset('public/admin/js/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('public/admin/js/dataTables.bootstrap4.min.js') }}"></script>
   </body>
</html>