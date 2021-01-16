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
                    <form method="post" action="{{route('admin.today_game_submit')}}">
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
                            @php  $i=1; @endphp
                            @foreach($bet_data as $row)
                                <tr>
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
                                        <!-- player_id, amount, game_id, market_id, wallet -->
                                        <input type="checkbox" name="to_wallet[]" value="{{$row->player_id}}-{{$row->amount}}-{{$row->game_id}}-{{$row->market_id}}-{{$row->wallet}}">
                                    </td>
                                </tr>
                                @php  $i++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('multiauth::includes.footer')
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
