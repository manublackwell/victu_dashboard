<!doctype html>
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="ltr">
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">


      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>Victu Dashboard</title>

      <!-- Styles -->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
    rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/weather-icons/climacons.min.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('css/core/menu/menu-types/vertical-overlay-menu.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  </head>
  <body class="vertical-layout vertical-overlay-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-overlay-menu" data-col="2-columns">
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-dark bg-primary navbar-shadow navbar-brand-center">
      <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item">
                    <a class="navbar-brand" href="index.html">
                        <h2 class="brand-text">Victu</h2>
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
                <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
            </ul>
            <!--<ul class="nav navbar-nav float-right">
                <li class="dropdown dropdown-user nav-item">
                <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                    <span class="avatar avatar-online">
                    <img src="/images/user.png" alt="avatar"><i></i></span>
                    <span class="user-name">Victu</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="user-profile.html"><i class="ft-user"></i> Edit Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="login-with-bg-image.html"><i class="ft-power"></i> Logout</a>
                </div>
                </li>
            </ul>-->
            </div>
        </div>
      </div>
    </nav>
    <!-- main menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow menu-border">
        <!-- main menu content-->
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" navigation-header">
                    <span>General</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="General"></i>
                </li>
                <li class="nav-item"><a href="/"><i class="ft-home"></i><span class="menu-title" data-i18n="">Home</span></a></li>
                <li class="nav-item"><a href="{{ route('products.index') }}"><i class="ft-tag"></i><span class="menu-title">Prodotti</span></a></li>
                <li class="nav-item"><a href="{{ route('coupons.index') }}"><i class="fa fa-barcode"></i><span class="menu-title">Coupon</span></a></li>
                <li class="nav-item"><a href="{{ route('orders.index') }}"><i class="ft-shopping-cart"></i><span class="menu-title">Ordini</span></a></li>
                <li class="nav-item"><a href="{{ route('warehouses.index') }}"><i class="ft-shopping-cart"></i><span class="menu-title">Magazzino</span></a></li>
                <li class="nav-item"><a href="{{ route('metrics.index') }}"><i class="ft-trending-up"></i><span class="menu-title">Statistiche</span></a></li>
                <!--<li class=" nav-item"><a href="/accounts/"><i class="ft-users"></i><span class="menu-title" data-i18n="">Account</span></a></li>
                <li class=" nav-item"><a href="/agency-codes/"><i class="ft-layout"></i><span class="menu-title" data-i18n="">Codici Aziendali</span></a></li>-->
            </ul>
        </div>
        <!-- /main menu content-->
    </div>
    <!-- /main menu-->
  @yield('content')

  @include('layouts.footer')
  @stack('scripts')
  </body>
</html>
