@extends('multiauth::layouts.app')
@section('content')
@include('multiauth::includes.sidebar')
@include('multiauth::includes.header')
@include('multiauth::includes.page_title')
<!-- <div class="page-container"> -->
    <div class="main-content">
        <div class="main-content-inner">
            <div class="row" style="margin-top:10px">
            <div class="col-xs-12 col-lg-4 col-md-4">
                    <div class="card" style="background: #3439426b;">
                        <div class="card-body">
                            <h4 class="header-title">Total Players</h4>
                            <div id="socialads" style="height: 30px;">{{ DB::table('players')->count() }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-4 col-md-4">
                    <div class="card" style="background: #3439426b;">
                        <div class="card-body">
                            <h4 class="header-title">Today Betting</h4>
                            @php
                            date_default_timezone_set("Asia/Calcutta");
                            $today = date('Y-m-d');
                            @endphp
                            <div id="socialads" style="height: 30px;">Rs. {{ DB::table('player_betting_data')->where('bet_date',$today)->sum('amount')+DB::table('player_betting_data_half_sangam')->where('bet_date',$today)->sum('amount')+DB::table('player_betting_data_full_sangam')->where('bet_date',$today)->sum('amount') }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-4 col-md-4">
                    <div class="card" style="background: #3439426b;">
                        <div class="card-body">
                            <h4 class="header-title">Player Played Today</h4>
                            <div id="socialads" style="height: 30px;">{{ DB::table('player_betting_data')->where('bet_date',$today)->distinct('player_id')->count('player_id')+DB::table('player_betting_data_half_sangam')->where('bet_date',$today)->distinct('player_id')->count('player_id')+DB::table('player_betting_data_full_sangam')->where('bet_date',$today)->distinct('player_id')->count('player_id')}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        
                            <h4 class="header-title mb-0">Live Result</h4>
                            <div>
                                @php $data = DB::table('markets')->get(); @endphp
                                @foreach($data as $row)
                                    
                                    @if($row->open ==null && $row->jodi ==null && $row->close ==null) 
                                        <button type="button" class="btn btn-flat btn-dark btn-lg btn-block">
                                            {{$row->name}}<br/>
                                            @if($row->open =="")  
                                                {{"XXX"}}       
                                            @else
                                                {{$row->open}}      
                                            @endif

                                            @if($row->jodi =="")  
                                                {{"-XX-"}}       
                                            @elseif(strlen((string)$row->jodi) == "1")
                                                {{"-".$row->jodi."X-"}}      
                                            @else
                                                {{"-".$row->jodi."-"}}
                                            @endif

                                            @if($row->close =="")  
                                                {{"XXX"}}       
                                            @else
                                                {{$row->close}}      
                                            @endif
                                            <br/>
                                            @php 
                                            $date_open = new DateTime(date("Y-m-d")." ".$row->open_time); 
                                            $date_close = new DateTime(date("Y-m-d")." ".$row->close_time); 
                                            @endphp
                                            {{$date_open->format('h:ia')}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$date_close->format('h:ia')}}
                                        </button>
                                    @else
                                        <button style="background: yellow;color: black;" type="button" class="btn btn-flat btn-dark btn-lg btn-block">
                                            {{$row->name}}<br/>
                                            @if($row->open =="")  
                                                {{"XXX"}}       
                                            @else
                                                {{$row->open}}      
                                            @endif

                                            @if($row->jodi =="")  
                                                {{"-XX-"}}       
                                            @elseif(strlen((string)$row->jodi) == "1")
                                                {{"-".$row->jodi."X-"}}      
                                            @else
                                                {{"-".$row->jodi."-"}}
                                            @endif

                                            @if($row->close =="")  
                                                {{"XXX"}}       
                                            @else
                                                {{$row->close}}      
                                            @endif
                                            <br/>
                                            @php 
                                            $date_open = new DateTime(date("Y-m-d")." ".$row->open_time); 
                                            $date_close = new DateTime(date("Y-m-d")." ".$row->close_time); 
                                            @endphp
                                            {{$date_open->format('h:ia')}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$date_close->format('h:ia')}}
                                        </button>    
                                    @endif 
                                    
                            
                            @endforeach
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->
@include('multiauth::includes.footer')
@endsection
