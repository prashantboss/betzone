<div class="page-wrapper"><!-- End in footer-->
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="{{ route('player.dashboard')}}">
                            <img src="{{asset('/')}}logo/{{$siteSetting['site_logo']}}" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="{{ route('player.dashboard')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <!-- <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{ route('player.dashboard')}}">Dashboard</a>
                                </li>
                            </ul> -->
                        </li>
                        <li>
                            <a href="{{ route('player.game_rate_static')}}">
                                <i class="fas fa-tag"></i>Game rate</a>
                        </li>
                        <li>
                            <a href="{{ route('player.game_ledger')}}">
                                <i class="fas fa-file"></i>Game Ledger</a>
                        </li>
                        <li>
                            <a href="{{ route('player.balance.enquiry')}}">
                                <i class="fas fa-history"></i>Played Game</a>
                        </li>
                        <li>
                            <a href="{{ route('player.notice_static')}}">
                                <i class="fas fa-bell"></i>Notice</a>
                        </li>
                        <li>
                            <a href="https://api.whatsapp.com/send?phone={{$siteSetting['site_phone_primary']}}&text=Sir I want to deposite money ">
                                <i class="fas fa-inr"></i>Deposite</a>
                        </li>
                        <li>
                            <a href="https://api.whatsapp.com/send?phone={{$siteSetting['site_phone_primary']}}&text=Sir I want to withdrawl money ">
                                <i class="fas fa-inr"></i>Withdrawl</a>
                        </li>
                        <li>
                            <a href="{{ route('player.game_timing_static')}}">
                                <i class="fas fa-clock-o"></i>Game Timing</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-play"></i>Games</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                @foreach($game as $row)
                                <li>
                                    <a href="{{ $row->id }}">{{ $row->game_name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('player.how_to_play_static')}}">
                                <i class="fas fa-info"></i>How To Play</a>
                        </li>
                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="{{ route('player.dashboard')}}">
                    <img src="{{asset('/')}}logo/{{$siteSetting['site_logo']}}" style="width:179px;height:52px" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="{{ route('player.dashboard')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <!-- <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                <a href="{{ route('player.dashboard')}}">Dashboard</a>
                                </li>
                            </ul> -->
                        </li>
                        <li>
                            <a href="{{ route('player.game_rate_static')}}">
                                <i class="fas fa-tag"></i>Game rate</a>
                        </li>
                        <li>
                            <a href="{{ route('player.game_ledger')}}">
                                <i class="fas fa-file"></i>Game Ledger</a>
                        </li>
                        <li>
                            <a href="{{ route('player.balance.enquiry')}}">
                                <i class="fas fa-history"></i>Played Game</a>
                        </li>
                        <li>
                            <a href="{{ route('player.notice_static')}}">
                                <i class="fas fa-bell"></i>Notice</a>
                        </li>
                        <li>
                            <a href="https://api.whatsapp.com/send?phone={{$siteSetting['site_phone_primary']}}&text=Sir I want to deposite money">
                                <i class="fas fa-inr"></i>Deposite</a>
                        </li>
                        <li>
                            <a href="https://api.whatsapp.com/send?phone={{$siteSetting['site_phone_primary']}}&text=Sir I want to withdrawl money">
                                <i class="fas fa-inr"></i>Withdrawl</a>
                        </li>
                        <li>
                            <a href="{{ route('player.game_timing_static')}}">
                                <i class="fas fa-clock-o"></i>Game Timing</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-play"></i>Games</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                @foreach($game as $row)
                                <li>
                                    <a href="{{ route('player.list.market', ['id' => $row->id, 'name' => $row->game_name])}}">{{ $row->game_name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('player.how_to_play_static')}}">
                                <i class="fas fa-info"></i>How To Play</a>
                        </li>
                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->