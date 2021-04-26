<!-- preloader area start -->
<!-- <div id="preloader">
    <div class="loader"></div>
</div> -->
<!-- preloader area end -->

<!-- page container area start (This div end in footer)-->
<div class="page-container">

    <!-- sidebar menu area start -->
    <div class="sidebar-menu">
        <div class="sidebar-header">
            <div class="logo">
                <a href="{{ route('admin.home') }}"><img src="{{asset('/')}}logo/{{$siteSetting['site_admin_logo']}}" alt="logo"></a>
            </div>
        </div>
        <div class="main-menu">
            <div class="menu-inner">
                <nav>
                    @php
                        $markets = DB::table('markets')->get();
                        $games = DB::table('games')->get();
                    @endphp
                    <ul class="metismenu" id="menu">
                        <li class="active">
                            <a href="{{ route('admin.home') }}" aria-expanded="true"><i class="ti-dashboard"></i><span>Home Page</span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Static Content</span></a>
                            <ul class="collapse">
                                <li><a href="{{ route('admin.game_rate') }}">Game Rate</a></li>
                                <li><a href="{{ route('admin.notice') }}">Notice</a></li>
                                <li><a href="{{ route('admin.game_timing') }}">Game Timing</a></li>
                                <li><a href="{{ route('admin.how_to_play') }}">How To Play</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>Transactions</span></a>
                            <ul class="collapse">
                                <li><a href="{{ route('admin.half_sangam_traxn') }}">Half Sangam</a></li>
                                <li><a href="{{ route('admin.full_sangam_traxn') }}">Full Sangam</a></li>
                                <li><a href="{{ route('admin.rest_trnxn') }}">All Rest</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-palette"></i><span>Live Result</span></a>
                            <ul class="collapse">
                                @foreach($markets as $row)
                                    <li><a href="{{ route('admin.live_result', ['id'=>$row->id]) }}">{{$row->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>Game Holiday</span></a>
                            <ul class="collapse">
                                @foreach($games as $row)
                                    <li><a href="{{ route('admin.holiday', ['id'=>$row->id, 'game_name' => $row->game_name]) }}">{{$row->game_name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{ route('admin.player.index') }}"><i class="ti-map-alt"></i> <span>Players</span></a></li>
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-receipt"></i><span>Game Timings</span></a>
                            <ul class="collapse">
                                @foreach($markets as $row)
                                    <li><a href="{{ route('admin.game_time_show', ['id'=>$row->id]) }}">{{$row->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        
                        <!-- <li><a href="#"><i class="ti-receipt"></i> <span>Game Timings</span></a></li> -->
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-table"></i>
                                <span>Today Game</span></a>
                            <ul class="collapse">
                                @foreach($games as $row)
                                    <li><a href="{{ route('admin.today_game_index', ['id'=>$row->id, 'game_name' => $row->game_name]) }}">{{$row->game_name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layers-alt"></i> <span>Thela</span></a>
                            <ul class="collapse">
                                @foreach($games as $row)
                                    <li><a href="{{ route('admin.thela_index', ['id'=>$row->id, 'game_name' => $row->game_name]) }}">{{$row->game_name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <!-- <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-exclamation-triangle"></i>
                                <span>Error</span></a>
                            <ul class="collapse">
                                <li><a href="404.html">Error 404</a></li>
                                <li><a href="403.html">Error 403</a></li>
                                <li><a href="500.html">Error 500</a></li>
                            </ul>
                        </li> -->
                        <!-- <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-align-left"></i> <span>Multi
                                    level menu</span></a>
                            <ul class="collapse">
                                <li><a href="#">Item level (1)</a></li>
                                <li><a href="#">Item level (1)</a></li>
                                <li><a href="#" aria-expanded="true">Item level (1)</a>
                                    <ul class="collapse">
                                        <li><a href="#">Item level (2)</a></li>
                                        <li><a href="#">Item level (2)</a></li>
                                        <li><a href="#">Item level (2)</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Item level (1)</a></li>
                            </ul>
                        </li> -->
                        <li><a href="{{ route('admin.edit.site.setting') }}"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- sidebar menu area end -->