@extends('multiauth::layouts.app')
@section('content')
@include('multiauth::includes.sidebar')
@include('multiauth::includes.header')
@include('multiauth::includes.page_title')
<div class="main-content-inner">
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Thela Game</h4>
                <span> {{ $open_close ?? '' }} | {!! DB::table('markets')->where("id", $market_id)->first()->name ?? '' !!} | {!! DB::table('games')->where("id", $game_id)->first()->game_name ?? '' !!}</span>

                <div class="table-responsive">
                    @php $game_id_with_oc = array(1,2,3,4,5); @endphp
                    @if(in_array($game_id,$game_id_with_oc))
                        <table class="table table-hover progress-table text-center">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>S.No</th>
                                    <th>Number</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count= count($bet_data); 
                                    $i=1; 
                                @endphp
                                @if(!count($bet_data) == 0) 
                                    @foreach ($bet_data as $data)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$data->number}}</td>
                                            <td>Rs.{{$data->sum}}</td>
                                        </tr>
                                        @php $i++; @endphp
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan=3><p>No Record Found</p></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    @endif

                    @if($game_id == 6)
                        <table class="table table-hover progress-table text-center">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>S.No</th>
                                    <th>Ank Patti</th>
                                    <th>Ank</th>
                                    <th>Patti</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1; $total_amount = 0; @endphp
                                @if(count($bet_data) >0)
                                    @foreach ($bet_data as $row)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$row->ank_patti}}</td>
                                            <td>{{$row->ank}}</td>
                                            <td>{{$row->patti}}</td>
                                            <td>
                                                Rs.{{$row->amount}}
                                                @php $total_amount = $total_amount+$row->amount @endphp
                                            </td>
                                        </tr>
                                        @php $i++; @endphp
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan=3><p>No Record Found</p></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    @endif

                    @if($game_id == 7)
                        <table class="table table-hover progress-table text-center">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>S.No</th>
                                    <th>Close Patti</th>
                                    <th>Open Patti</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1; $total_amount = 0; @endphp
                                @if(count($bet_data) >0)
                                    @foreach ($bet_data as $row)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$row->close_patti}}</td>
                                            <td>{{$row->open_patti}}</td>
                                            <td>
                                                Rs.{{$row->amount}}
                                                @php $total_amount = $total_amount+$row->amount @endphp
                                            </td>
                                        </tr>
                                        @php $i++; @endphp
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan=3><p>No Record Found</p></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    @endif
                    <div style="text-align: center;font-size: 25px;color: green;">Total Amount = {{$total_amount}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('multiauth::includes.footer')
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
