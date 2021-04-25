<style>
    @media only screen and (max-width: 600px) {
        .header-button {
            margin-top: 0px;
        }
        .py-4 {
            padding-top: 0 !important;
        }
        .header-desktop {
            height: 100px;
        }
    }
</style>
<!-- PAGE CONTAINER-->
<div class="page-container"><!-- End in footer-->
    <!-- HEADER DESKTOP-->
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <form class="form-header" action="" method="POST">
                        <!-- <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." /> -->
                        <span style="color: black;" class="btn btn-outline-warning" onclick="location.reload();">Refresh</span>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span id="span" style="color: red;font-size: 18px;"></span>
                    </form>
                    <div class="header-button">
                        <div class="noti-wrap">
                            <div class="noti__item js-item-menu">
                                <strong>Points : </strong><span>{{Auth::guard('player')->user()->wallet}}</span>
                            </div>
                            <!-- <div class="noti__item js-item-menu">
                                <i class="zmdi zmdi-notifications"></i>
                                <span class="quantity">3</span>
                                <div class="notifi-dropdown js-dropdown">
                                    <div class="notifi__title">
                                        <p>You have 3 Notifications</p>
                                    </div>
                                    <div class="notifi__item">
                                        <div class="bg-c1 img-cir img-40">
                                            <i class="zmdi zmdi-email-open"></i>
                                        </div>
                                        <div class="content">
                                            <p>You got a email notification</p>
                                            <span class="date">April 12, 2018 06:50</span>
                                        </div>
                                    </div>
                                    <div class="notifi__item">
                                        <div class="bg-c2 img-cir img-40">
                                            <i class="zmdi zmdi-account-box"></i>
                                        </div>
                                        <div class="content">
                                            <p>Your account has been blocked</p>
                                            <span class="date">April 12, 2018 06:50</span>
                                        </div>
                                    </div>
                                    <div class="notifi__item">
                                        <div class="bg-c3 img-cir img-40">
                                            <i class="zmdi zmdi-file-text"></i>
                                        </div>
                                        <div class="content">
                                            <p>You got a new file</p>
                                            <span class="date">April 12, 2018 06:50</span>
                                        </div>
                                    </div>
                                    <div class="notifi__footer">
                                        <a href="#">All notifications</a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">
                                <div class="image">
                                    <img src="{{asset('/')}}player_assets/images/profile.png" alt="John Doe" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#">{{Auth::guard('player')->user()->name}}</a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="{{ route('player.dashboard')}}">
                                                <img src="{{asset('/')}}player_assets/images/profile.png" alt="John Doe" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#">{{Auth::guard('player')->user()->name}}</a>
                                            </h5>
                                            <span class="email">{{Auth::guard('player')->user()->email}}</span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="{{ route('player.profile') }}">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="{{ route('player.change_pass') }}">
                                                <i class="zmdi zmdi-settings"></i>Change Password</a>
                                        </div>
                                        <!-- <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-money-box"></i>Billing</a>
                                        </div> -->
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="{{ route('player.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="zmdi zmdi-power"></i>Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('player.logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @if ( Session::has('flash_message') )
        <section class="alert-wrap p-t-70 p-b-0">
            <div class="container">
                <!-- ALERT-->
                <div class="alert {{ Session::get('flash_type') }} alert-dismissible fade show au-alert au-alert--70per" role="alert">
                    <i class="zmdi zmdi-check-circle"></i>
                    <span class="content">{{ Session::get('flash_message') }}</span>
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="zmdi zmdi-close-circle"></i>
                        </span>
                    </button>
                </div>
                <!-- END ALERT-->
            </div>
        </section>
    @endif
    <div class="main-content m-content">
    <!-- HEADER DESKTOP-->

    <script>
        window.onload = displayClock();
        function displayClock(){
        var display = new Date().toLocaleTimeString();
        document.getElementById('span').innerHTML = display;
        setTimeout(displayClock, 1000); 
        }
    </script>