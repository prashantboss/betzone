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
    <title>Register</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('/')}}player_assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}player_assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}player_assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}player_assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('/')}}player_assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('/')}}player_assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}player_assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}player_assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}player_assets//css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}player_assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}player_assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}player_assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('/')}}player_assets/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="{{asset('/')}}player_assets/images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form method="POST" action="{{ route('player.register') }}" aria-label="{{ __('Register') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} au-input au-input--full" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <!-- <div class="form-group">
                                    <label>Username</label>
                                    <input id="username" type="text" class="au-input au-input--full form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>
                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div> -->
                                <!-- <div class="form-group">
                                    <label>Email Address</label>
                                    <input id="email" type="email" class="au-input au-input--full form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div> -->
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input id="mobile" type="tel" class="au-input au-input--full form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" pattern="[6-9]{1}[0-9]{9}" required>
                                    @if ($errors->has('mobile'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('mobile') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="password" type="password" class="au-input au-input--full form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input id="password-confirm" type="password" class="au-input au-input--full form-control" name="password_confirmation" required>
                                </div>
                                <!-- <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree">Agree the terms and policy
                                    </label>
                                </div> -->
                                <button type="submit" class="au-btn au-btn--block au-btn--green m-b-20">{{ __('Register') }}</button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="{{ route('player.login') }}">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

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