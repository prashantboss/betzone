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
                            <th>dateTime</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1
                        @endphp
                        @foreach($data as $row)
                        <tr>
                            <td>{{$i}}</td>
                            <td>Rs. {{$row->amount}}</td>
                            <td>{{$row->status}}</td>
                            <td>{{$row->created_at}}</td>
                        </tr>
                        @php
                            $i+=1
                        @endphp
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
            
        </div>
    </div>
</div>

@include('player.includes.footer')
@endsection
