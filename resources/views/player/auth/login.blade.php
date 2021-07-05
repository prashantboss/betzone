<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}player_assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}player_assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}player_assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('/')}}player_assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('/')}}player_assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}player_assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}player_assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}player_assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}player_assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}player_assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}player_assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('/')}}player_assets/css/theme.css" rel="stylesheet" media="all">
    <style>
        .btn-outline-success {
            color: #ffc107;
            border-color: #ffc107;
            background: black
        }
        .btn-outline-success:hover {
            color: black;
            background-color: #ffc107;
            border-color: #ffc107;
        }
    </style>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <!-- <img src="{{asset('/')}}player_assets/images/icon/logo.png" alt="CoolAdmin"> -->
                                <img src="{{asset('/')}}logo/{{$siteSetting['site_logo']}}" alt="LOGO_betzone">
                            </a>
                        </div>
                        <div class="login-form">
                            <form method="POST" action="{{ route('player.login') }}" aria-label="{{ __('Login') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} au-input au-input--full" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} au-input au-input--full" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="login-checkbox">
                                    <!-- <label>
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </label> -->

                                    <label>
                                    <a class="btn btn-link" href='' onclick="forgot_msg()">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-outline-success btn-lg btn-block">
                                                {{ __('Login') }}
                                            </button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="{{ route('player.register') }}">Sign Up Here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        function forgot_msg(){
            alert('Password Reset Karne Ke Liye {{$siteSetting['site_phone_secondary']}} WhatsApp Kare.');
        }
    </script>
    <!-- Jquery JS-->
    <script src="{{asset('/')}}player_assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('/')}}player_assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="{{asset('/')}}player_assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('/')}}player_assets/vendor/slick/slick.min.js">
    </script>
    <script src="{{asset('/')}}player_assets/vendor/wow/wow.min.js"></script>
    <script src="{{asset('/')}}player_assets/vendor/animsition/animsition.min.js"></script>
    <script src="{{asset('/')}}player_assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="{{asset('/')}}player_assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="{{asset('/')}}player_assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="{{asset('/')}}player_assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="{{asset('/')}}player_assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{asset('/')}}player_assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="{{asset('/')}}player_assets/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="{{asset('/')}}player_assets/js/main.js"></script>

</body>

</html>
<!-- end document-->