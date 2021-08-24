<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>


  <title>Register with Background Color - Stack Responsive Bootstrap 4 Admin Template</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
  rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/forms/icheck/icheck.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/forms/icheck/custom.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/core/menu/menu-types/vertical-overlay-menu.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/login-register.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>

<body class="vertical-layout vertical-overlay-menu 1-column  bg-cyan bg-lighten-2 menu-expanded blank-page blank-page"
data-open="click" data-menu="vertical-overlay-menu" data-col="1-column">
  <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-md-4 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                <div class="card-header border-0 pb-0">
                                    <div class="card-title text-center">
                                        <img src="{{ asset('img/logo.png') }}" alt="victu logo">
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body pt-0">
                                        <form class="form-horizontal" method="post" action="{{ route('account-create') }}">
                                            @csrf

                                            <div class="results">
                                                @if(Session::get('success'))
                                                    <div class="alert alert-success mt-3">
                                                        {{ Session::get('success') }}
                                                    </div>
                                                @endif

                                                @if(Session::get('fail'))
                                                    <div class="alert alert-danger mt-3">
                                                        {{ Session::get('fail') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <fieldset class="form-group floating-label-form-group">
                                                <label for="name">Nome</label>
                                                <input type="text" class="form-control" id="name" placeholder="Inserisci nome" name="name" value="{{ old('name') }}">
                                                <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                                            </fieldset>
                                            <fieldset class="form-group floating-label-form-group">
                                                <label for="surname">Cognome</label>
                                                <input type="text" class="form-control" id="surname" placeholder="Inserisci cognome" name="surname" value="{{ old('surname') }}">
                                                <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                                            </fieldset>
                                            <fieldset class="form-group floating-label-form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" placeholder="Inserisci email" name="email" value="{{ old('email') }}">
                                                <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                                            </fieldset>
                                            <fieldset class="form-group floating-label-form-group mb-1">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password" placeholder="Inserisci password" name="password" value="{{ old('password') }}">
                                                <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                                            </fieldset>
                                            <fieldset class="form-group floating-label-form-group mb-1">
                                                <label for="conferma-password">Conferma password</label>
                                                <input type="password" class="form-control" id="conferma-password" placeholder="Inserisci password" name="password2" value="{{ old('password2') }}">
                                                <span class="text-danger">@error('password2'){{ $message }} @enderror</span>
                                            </fieldset>
                                            <div class="form-group row">
                                                <div class="col-md-6 col-12 text-center text-sm-left">
                                                    <fieldset>
                                                        <input type="checkbox" id="remember-me" class="chk-remember">
                                                        <label for="remember-me"> Remember Me</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-outline-primary btn-block"><i class="ft-user"></i> Register</button>
                                        </form>
                                    </div>
                                    <div class="card-body pt-0">
                                        <a href="login-with-bg.html" class="btn btn-outline-danger btn-block"><i class="ft-unlock"></i> Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <script src="{{ asset('js/vendors.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/core/app-menu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/core/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/scripts/customizer.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/scripts/forms/form-login-register.js') }}" type="text/javascript"></script>
</body>
</html>