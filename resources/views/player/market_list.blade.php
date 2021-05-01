@extends('player.layouts.app')
@section('content')
@include('player.includes.sidebar')
@include('player.includes.header')

<div class="section__content section__content--p30">
    <div class="container-fluid">
        @php
            date_default_timezone_set('Asia/Kolkata');
            $currentTime_h = date( 'h:i:s A', time () );
        @endphp
        <div class="row m-t-25">
            
            @if($game_name == "Jodi" || $game_name == "Half Sangam" || $game_name == "Full Sangam")
                @foreach($market_list as $row)
                    @php
                        $mh = DB::table('market_holiday')->where('game_id', $game_id)->where('market_id', $row->id)->first();
                    @endphp


                    @if(empty($mh) || $mh->is_closed == 'n')
                        <div class="col-sm-4 col-lg-4">
                            <div class="overview-item overview-item--c1"  style="background:black">
                                <div class="overview__inner">
                                    <div class="overview-box clearfix">
                                        <a>
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2 style="font-size: 22px;">{{ $row->name }}</h2>
                                                <span style="color:red">-</span>
                                                @php 
                                                    $time_open = strtotime($row->open_time); 
                                                    $date_open = new DateTime(date("Y-m-d")." ".date("H:i", strtotime('-20 minutes', $time_open)));
                                                
                                                    $currentTime = DateTime::createFromFormat('h:i a', $currentTime_h);
                                                    $from = DateTime::createFromFormat('h:i a', "10:00 AM");
                                                    $to_open = DateTime::createFromFormat('h:i a', $date_open->format('h:i A'));

                                                @endphp

                                                @if ($currentTime > $from && $currentTime < $to_open)
                                                    <span style="position: absolute;bottom: 100px;left: 20px;;color:yellow">{{$date_open->format('h:ia')}}</span>
                                                    <a style="position: absolute;bottom: 50px;left: 20px;z-index: 999;" href="{{ route('player.market.number', ['game' => $game_name, 'market' => $row->name])}}" class="btn btn-outline-warning btn-lg">
                                                        <i class="fa fa-lightbulb-o"></i>&nbsp; Play 
                                                    </a>
                                                @else
                                                    <span style="position: absolute;bottom: 100px;left: 20px;;color:yellow">{{$date_open->format('h:ia')}}</span>
                                                    <a style="position: absolute;bottom: 50px;left: 20px;z-index: 999;" href="#" onclick="javascript:alert('Time Up');" class="btn btn-outline-warning btn-lg">
                                                        <i class="fa fa-lightbulb-o"></i>&nbsp; Play 
                                                    </a>
                                                @endif
                                            </div>
                                        </a>
                                        <!-- <a href="{{ route('player.market.number', ['game' => $game_name, 'market' => $row->name])}}">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2 style="font-size: 22px;">{{ $row->name }}</h2>
                                                
                                                <span style="color:red">-</span>
                                            </div>
                                        </a> -->
                                    </div>
                                    <div class="overview-chart">
                                        <canvas id="widgetChart1"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-sm-4 col-lg-4">
                            <div class="overview-item overview-item--c1"  style="background:#21252975">
                                <div class="overview__inner">
                                    <div class="overview-box clearfix">
                                        <a>
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2 style="font-size: 22px;">{{ $row->name }}</h2>
                                                <span style="color:red">Market Holiday</span>
                                                @php 
                                                    $time_open = strtotime($row->open_time); 
                                                    $date_open = new DateTime(date("Y-m-d")." ".date("H:i", strtotime('-20 minutes', $time_open)));
                                                  
                                                
                                                    $currentTime = DateTime::createFromFormat('h:i a', $currentTime_h);
                                                    $from = DateTime::createFromFormat('h:i a', "10:00 AM");
                                                    $to_open = DateTime::createFromFormat('h:i a', $date_open->format('h:i A'));
                   

                                                @endphp

                                                @if ($currentTime > $from && $currentTime < $to_open)
                                                    <span style="position: absolute;bottom: 100px;left: 20px;;color:yellow">{{$date_open->format('h:ia')}}</span>
                                                    <a style="position: absolute;bottom: 50px;left: 20px;z-index: 999;" href="#" class="btn btn-outline-warning btn-lg">
                                                        <i class="fa fa-lightbulb-o"></i>&nbsp; Play 
                                                    </a>
                                                @else
                                                    <span style="position: absolute;bottom: 100px;left: 20px;;color:yellow">{{$date_open->format('h:ia')}}</span>
                                                    <a style="position: absolute;bottom: 50px;left: 20px;z-index: 999;" href="#" onclick="javascript:alert('Time Up');" class="btn btn-outline-warning btn-lg">
                                                        <i class="fa fa-lightbulb-o"></i>&nbsp; Play 
                                                    </a>
                                                @endif
                                            </div>
                                        </a>
                                        <!-- <a href="#">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2 style="font-size: 22px;">{{ $row->name }}</h2>
                                                
                                                <span style="color:red">Market Holiday</span>
                                            </div>
                                        </a> -->
                                    </div>
                                    <div class="overview-chart">
                                        <canvas id="widgetChart1"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                @endforeach
            @else
                @foreach($market_list as $row)

                    @php
                        $mh = DB::table('market_holiday')->where('game_id', $game_id)->where('market_id', $row->id)->first();
                    @endphp


                    @if(empty($mh) || $mh->is_closed == 'n')
                        <div class="col-sm-4 col-lg-4">
                            <div class="overview-item overview-item--c1" style="background:black">
                                <div class="overview__inner">
                                    <div class="overview-box clearfix">
                                        <a>
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2 style="font-size: 22px;">{{ $row->name }}</h2>
                                                <span style="color:red">-</span>
                                                @php 
                                                    $time_open = strtotime($row->open_time); 
                                                    $date_open = new DateTime(date("Y-m-d")." ".date("H:i", strtotime('-20 minutes', $time_open)));
                                                
                                                    $time_close = strtotime($row->close_time); 
                                                    $date_close = new DateTime(date("Y-m-d")." ".date("H:i", strtotime('-20 minutes', $time_close)));
                                                
                                                    $currentTime = DateTime::createFromFormat('h:i a', $currentTime_h);
                                                    $from = DateTime::createFromFormat('h:i a', "10:00 AM");
                                                    $to_open = DateTime::createFromFormat('h:i a', $date_open->format('h:i A'));
                                                    $to_close = DateTime::createFromFormat('h:i a', $date_close->format('h:i A'));

                                                @endphp

                                                @if ($currentTime > $from && $currentTime < $to_open)
                                                    <span style="position: absolute;bottom: 100px;left: 20px;;color:yellow">{{$date_open->format('h:ia')}}</span>
                                                    <a style="position: absolute;bottom: 50px;left: 20px;z-index: 999;" href="{{ route('player.market.number', ['game' => $game_name, 'market' => $row->name, 'open_close'=>'open'])}}" class="btn btn-outline-warning btn-lg">
                                                        <i class="fa fa-lightbulb-o"></i>&nbsp; Open 
                                                    </a>
                                                @else
                                                    <span style="position: absolute;bottom: 100px;left: 20px;;color:yellow">{{$date_open->format('h:ia')}}</span>
                                                    <a style="position: absolute;bottom: 50px;left: 20px;z-index: 999;" href="#" onclick="javascript:alert('Time Up');" class="btn btn-outline-warning btn-lg">
                                                        <i class="fa fa-lightbulb-o"></i>&nbsp; Open 
                                                    </a>
                                                @endif



                                                @if ($currentTime > $from && $currentTime < $to_close)
                                                    <span style="position: absolute;bottom: 100px;right: 20px;color:yellow">{{$date_close->format('h:ia')}}</span>
                                                    <a style="position: absolute;bottom: 50px;right: 20px;z-index: 999;" href="{{ route('player.market.number', ['game' => $game_name, 'market' => $row->name, 'open_close'=>'close'])}}" class="btn btn-outline-warning btn-lg">
                                                        <i class="fa fa-lightbulb-o"></i>&nbsp; Close 
                                                    </a>
                                                @else
                                                    <span style="position: absolute;bottom: 100px;right: 20px;color:yellow">{{$date_close->format('h:ia')}}</span>
                                                    <a style="position: absolute;bottom: 50px;right: 20px;z-index: 999;" href="#" onclick="javascript:alert('Time Up');" class="btn btn-outline-warning btn-lg">
                                                        <i class="fa fa-lightbulb-o"></i>&nbsp; Close 
                                                    </a>
                                                @endif
                                            </div>
                                        </a>
                                    </div>
                                    <div class="overview-chart">
                                        <canvas id="widgetChart1"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-sm-4 col-lg-4">
                            <div class="overview-item overview-item--c1" style="background:#21252975">
                                <div class="overview__inner">
                                    <div class="overview-box clearfix">
                                        <a>
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2 style="font-size: 22px;">{{ $row->name }}</h2>
                                                <span style="color:red">Market Holiday</span>
                                                @php 
                                                    $time_open = strtotime($row->open_time); 
                                                    $date_open = new DateTime(date("Y-m-d")." ".date("H:i", strtotime('-20 minutes', $time_open)));
                                                
                                                    $time_close = strtotime($row->close_time); 
                                                    $date_close = new DateTime(date("Y-m-d")." ".date("H:i", strtotime('-20 minutes', $time_close)));
                                                
                                                    $currentTime = DateTime::createFromFormat('h:i a', $currentTime_h);
                                                    $from = DateTime::createFromFormat('h:i a', "10:00 AM");
                                                    $to_open = DateTime::createFromFormat('h:i a', $date_open->format('h:i A'));
                                                    $to_close = DateTime::createFromFormat('h:i a', $date_close->format('h:i A'));

                                                @endphp

                                                @if ($currentTime > $from && $currentTime < $to_open)
                                                    <span style="position: absolute;bottom: 100px;left: 20px;;color:yellow">{{$date_open->format('h:ia')}}</span>
                                                    <a style="position: absolute;bottom: 50px;left: 20px;z-index: 999;" href="#" class="btn btn-outline-warning btn-lg">
                                                        <i class="fa fa-lightbulb-o"></i>&nbsp; Open 
                                                    </a>
                                                @else
                                                    <span style="position: absolute;bottom: 100px;left: 20px;;color:yellow">{{$date_open->format('h:ia')}}</span>
                                                    <a style="position: absolute;bottom: 50px;left: 20px;z-index: 999;" href="#" onclick="javascript:alert('Time Up');" class="btn btn-outline-warning btn-lg">
                                                        <i class="fa fa-lightbulb-o"></i>&nbsp; Open 
                                                    </a>
                                                @endif



                                                @if ($currentTime > $from && $currentTime < $to_close)
                                                    <span style="position: absolute;bottom: 100px;right: 20px;color:yellow">{{$date_close->format('h:ia')}}</span>
                                                    <a style="position: absolute;bottom: 50px;right: 20px;z-index: 999;" href="#" class="btn btn-outline-warning btn-lg">
                                                        <i class="fa fa-lightbulb-o"></i>&nbsp; Close 
                                                    </a>
                                                @else
                                                    <span style="position: absolute;bottom: 100px;right: 20px;color:yellow">{{$date_close->format('h:ia')}}</span>
                                                    <a style="position: absolute;bottom: 50px;right: 20px;z-index: 999;" href="#" onclick="javascript:alert('Time Up');" class="btn btn-outline-warning btn-lg">
                                                        <i class="fa fa-lightbulb-o"></i>&nbsp; Close 
                                                    </a>
                                                @endif
                                            </div>
                                        </a>
                                    </div>
                                    <div class="overview-chart">
                                        <canvas id="widgetChart1"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif

        </div>
    </div>
</div>

@include('player.includes.footer')
@endsection
