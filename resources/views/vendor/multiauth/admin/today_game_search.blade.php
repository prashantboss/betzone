@extends('multiauth::layouts.app')
@section('content')
@include('multiauth::includes.sidebar')
@include('multiauth::includes.header')
@include('multiauth::includes.page_title')
<div class="main-content-inner">
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Data Table Dark</h4>
                <div class="table-responsive">
                    @php $game_id_with_oc = array(1,2,3,4,5); @endphp
                    @if(in_array($game_id,$game_id_with_oc))
                        <form id="form1" method="post" action="{{route('admin.today_game_submit')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <table class="table table-hover progress-table text-center">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Number</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Market | Game Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($bet_data != null)
                                        @php  $i=1; @endphp
                                        @foreach($bet_data as $row)
                                            @if($row->status == 1)
                                            <tr style="background: #0080008a;">
                                            @else
                                            <tr>
                                            @endif
                                            
                                                <td>{{$i}}</td>
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->email}}</td>
                                                <td>{{$row->mobile}}</td>
                                                <td>{{$row->number}}</td>
                                                <td>Rs. {{$row->amount}}</td>
                                                <td>
                                                {{ date('d/m/Y,  h:i:s a', strtotime($row->created_at)) }}
                                                <!-- {{$row->created_at}} -->
                                                </td>
                                                <td>{{$row->market_name}} | {{$row->game_name}}</td>
                                                <td>
                                                    @if($row->status == 1)
                                                        <img src="{{asset('/')}}admin_assets/images/icon/paid_stamp.jpg" alt="CoolAdmin" />
                                                    @else
                                                        <!-- bet_id, player_id, amount, game_id, market_id, wallet -->
                                                        <input type="checkbox" name="to_wallet[]" value="{{$row->id}}-{{$row->player_id}}-{{$row->amount}}-{{$row->game_id}}-{{$row->market_id}}-{{$row->wallet}}-{{$row->table_name}}">
                                                    @endif
                                                    
                                                </td>
                                            </tr>
                                            @php  $i++; @endphp
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan=9><p>No Record Found</p></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <button id="btn_sbmt1" onclick="submit_function1()" class="btn btn-primary">Submit</button>
                        </form>
                    @endif

                    @if($game_id == 6)
                        <form id="form2" method="post" action="{{route('admin.today_game_submit')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <table class="table table-hover progress-table text-center">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>ank_patti</th>
                                        <th>Ank</th>
                                        <th>Patti</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Market | Game Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($bet_data) > 0)
                                        @php  $i=1; @endphp
                                        @foreach($bet_data as $row)
                                            @if($row->status == 1)
                                            <tr style="background: #0080008a;">
                                            @else
                                            <tr>
                                            @endif
                                            
                                                <td>{{$i}}</td>
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->email}}</td>
                                                <td>{{$row->mobile}}</td>
                                                <td>{{$row->ank_patti}}</td>
                                                <td>{{$row->ank}}</td>
                                                <td>{{$row->patti}}</td>
                                                <td>Rs. {{$row->amount}}</td>
                                                <td>
                                                {{ date('d/m/Y,  h:i:s a', strtotime($row->created_at)) }}
                                                <!-- {{$row->created_at}} -->
                                                </td>
                                                <td>{{$row->market_name}} | {{$row->game_name}}</td>
                                                <td>
                                                    @if($row->status == 1)
                                                        <img src="{{asset('/')}}admin_assets/images/icon/paid_stamp.jpg" alt="CoolAdmin" />
                                                    @else
                                                        <!-- bet_id, player_id, amount, game_id, market_id, wallet -->
                                                        <input type="checkbox" name="to_wallet[]" value="{{$row->id}}-{{$row->player_id}}-{{$row->amount}}-{{$row->game_id}}-{{$row->market_id}}-{{$row->wallet}}-{{$row->table_name}}">
                                                    @endif
                                                    
                                                </td>
                                            </tr>
                                            @php  $i++; @endphp
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan=9><p>No Record Found</p></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <button  id="btn_sbmt2" onclick="submit_function2()" class="btn btn-primary">Submit</button>
                        </form>
                    @endif

                    @if($game_id == 7)
                    <form id="form3" method="post" action="{{route('admin.today_game_submit')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <table class="table table-hover progress-table text-center">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Close Patti</th>
                                        <th>Open Patti</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Market | Game Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($bet_data) > 0)
                                        @php  $i=1; @endphp
                                        @foreach($bet_data as $row)
                                            @if($row->status == 1)
                                            <tr style="background: #0080008a;">
                                            @else
                                            <tr>
                                            @endif
                                            
                                                <td>{{$i}}</td>
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->email}}</td>
                                                <td>{{$row->mobile}}</td>
                                                <td>{{$row->close_patti}}</td>
                                                <td>{{$row->open_patti}}</td>
                                                <td>Rs. {{$row->amount}}</td>
                                                <td>
                                                {{ date('d/m/Y,  h:i:s a', strtotime($row->created_at)) }}
                                                <!-- {{$row->created_at}} -->
                                                </td>
                                                <td>{{$row->market_name}} | {{$row->game_name}}</td>
                                                <td>
                                                    @if($row->status == 1)
                                                        <img src="{{asset('/')}}admin_assets/images/icon/paid_stamp.jpg" alt="CoolAdmin" />
                                                    @else
                                                        <!-- bet_id, player_id, amount, game_id, market_id, wallet -->
                                                        <input type="checkbox" name="to_wallet[]" value="{{$row->id}}-{{$row->player_id}}-{{$row->amount}}-{{$row->game_id}}-{{$row->market_id}}-{{$row->wallet}}-{{$row->table_name}}">
                                                    @endif
                                                    
                                                </td>
                                            </tr>
                                            @php  $i++; @endphp
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan=9><p>No Record Found</p></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <button  id="btn_sbmt3" onclick="submit_function3()" class="btn btn-primary">Submit</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@include('multiauth::includes.footer')
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    function submit_function1(){
        $('#btn_sbmt1').prop('disabled',true)
        $('#form1').submit()
    }
    function submit_function2(){
        $('#btn_sbmt2').prop('disabled',true)
        $('#form2').submit()
    }
    function submit_function3(){
        $('#btn_sbmt3').prop('disabled',true)
        $('#form3').submit()
    }
</script>
