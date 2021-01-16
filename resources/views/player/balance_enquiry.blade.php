@extends('player.layouts.app')
@section('content')
@include('player.includes.sidebar')
@include('player.includes.header')
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row m-t-25">
            <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Amount</th>
                            <th>Narretion</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- @php
                        $i = 1;
                        if(empty($data)){  
                    @endphp
                        <tr>
                            <td><h4>No Record Found</h4></td>
                        </tr>
                        
                    @php
                        }else{ 
                    @endphp -->
                        @foreach($data as $row)
                        <tr>
                            <td>{{$i}}</td>
                            <td>Rs. {{$row->amount}}</td>
                            <td>Game play on Bazar : {{$row->game_name}} : {{$row->market_name}} : &nbsp;&nbsp;&nbsp;&nbsp;<b>{{$row->open_close?$row->open_close." Ank :" : "Ank :"}}</b>
                            @php
                            
                                if($row->table_name == "player_betting_data"){
                                    echo App\Helpers\Helper::player_betting_extra($row->table_name, $row->id, $row->open_close);
                                }elseif($row->table_name == "player_betting_data_full_sangam"){
                                    echo App\Helpers\Helper::player_betting_extra($row->table_name, $row->id);
                                }elseif($row->table_name == "player_betting_data_half_sangam"){
                                    echo App\Helpers\Helper::player_betting_extra($row->table_name, $row->id);
                                }
                            @endphp
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <b>Date : </b> {{$row->created_at}}
                            
                            </td>
                            <!-- <td class="text-right"></td> -->
                        </tr>
                        @php
                            $i+=1
                        @endphp
                    @endforeach
                        <!-- @php
                        }
                        @endphp -->
                    </tbody>
                </table>
            </div>
        </div>
            
        </div>
    </div>
</div>

@include('player.includes.footer')
@endsection
