<!DOCTYPE html>

<html class="light-style layout-menu-fixed" data-theme="theme-default" data-assets-path="{{ asset('/assets') . '/' }}" data-base-url="{{url('/')}}" data-framework="laravel" data-template="vertical-menu-laravel-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>@yield('title') | Sneat - HTML Laravel Free Admin Template </title>
  <meta name="description" content="{{ config('variables.templateDescription') ? config('variables.templateDescription') : '' }}" />
  <meta name="keywords" content="{{ config('variables.templateKeyword') ? config('variables.templateKeyword') : '' }}">
  <!-- laravel CRUD token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Canonical SEO -->
  <link rel="canonical" href="{{ config('variables.productPage') ? config('variables.productPage') : '' }}">

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/fairytale.ico') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <!-- Include Styles -->
  @include('layouts/sections/styles')

  <!-- Include Scripts for customizer, helper, analytics, config -->
  @include('layouts/sections/scriptsIncludes')
  <style>
    .loader{
      display: none;
      width: 100%;
      height: 100%;
      position: fixed;
      padding-top: 19%;
      background: #333;
      padding-left: 48%;
      margin: 0 auto;
      z-index: 99999;
    }
  </style>
</head>

<body>

  <div class="loader" >
    <img src="{{asset('assets/img/loading/oval.svg')}}">
  </div>
  <!-- Layout Content -->
  @yield('layoutContent')
  <!--/ Layout Content -->



  <!-- Include Scripts -->
  @include('layouts/sections/scripts')

{{--  <script>--}}
{{--    $(function(){--}}
{{--      setTimeout(()=>{--}}
{{--        $(".loader").fadeOut(1000);--}}
{{--      },3000)--}}
{{--    })--}}
{{--  </script>--}}

</body>

</html>
