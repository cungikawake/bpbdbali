<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{$Gsetting->title}}  @yield('sub-title')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
<link rel="icon" href="{{asset('/images/'.$Gsetting->default_img)}}" type="image/x-icon" />
  <link rel="stylesheet" href="{{asset('/assets/admin/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

<link rel="stylesheet" href="{{asset('/assets/admin/css/bootstrap-table.css')}}">
<link rel="stylesheet" href="{{asset('/assets/admin/dist/css/bootstrap-tagsinput.css')}}">
<link rel="stylesheet" href="{{asset('/assets/admin/css/bootstrap-toggle.min.css')}}">
  <link rel="stylesheet" href="{{asset('/css/sweetalert.css')}}">
  <link rel="stylesheet" href="{{asset('/assets/admin/dist/css/style.css')}}">

  <link rel="stylesheet" href="{{asset('/assets/admin/dist/css/skins/skin-blue.min.css')}}">

@yield('style')

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a  class="logo">
      <span class="logo-mini">
        <img src="{{asset('/images/'.$Gsetting->default_img)}}" width="40px">
      </span>
      <span class="logo-lg">
        <img src="{{asset('/images/'.$Gsetting->logo)}}" width="200px">
      </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            @if(!Sentinel::getUser()->profile)
              <img src="{{asset('/assets/admin/dist/img/pro.png')}}" class="user-image" alt="User Image">
              @else
              <img src="{{asset('/images/'.Sentinel::getUser()->profile)}}" class="user-image" alt="User Image">
              @endif
              <span class="hidden-xs">{{Sentinel::getUser()->first_name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              @if(!Sentinel::getUser()->profile)
                <img src="{{asset('/assets/admin/dist/img/pro.png')}}" class="img-circle" alt="User Image">
                @else
                <img src="{{asset('/images/'.Sentinel::getUser()->profile)}}" class="img-circle" alt="User Image">
                @endif

                <p>
                  {{Sentinel::getUser()->first_name}} - {{Sentinel::getUser()->roles()->first()->name}}
                  <small>Member since <?php $dt = \Carbon\Carbon::now();?> {{$dt->toFormattedDateString()}} </small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route('editProfile')}}" class="btn btn-default btn-flat">Settings</a>
                </div>
                <div class="pull-right">
                  <a href="{{route('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>

