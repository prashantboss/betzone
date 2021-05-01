@extends('multiauth::layouts.app')
@section('content')
@include('multiauth::includes.sidebar')
@include('multiauth::includes.header')
@include('multiauth::includes.page_title')
<div class="main-content-inner">
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Half Sangam</h4>
                <div class="data-tables datatable-dark">
                    <table id="dataTable3" class="text-center">
                        <thead class="text-capitalize">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Ank Patti</th>
                                <th>Ank | Patti</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Market | Game Name</th>
                                <!-- <th>Actions</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @php  $i=1; @endphp
                            @foreach($data as $row)
                                <tr>
                                    <!-- <td>{{$row->id}}</td> -->
                                    <td>{{$i}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->ank_patti}}</td>
                                    <td>{{$row->ank}}  |  {{$row->patti}}</td>
                                    <td>Rs. {{$row->amount}}</td>
                                    <td>
                                    {{ date('d/m/Y,  h:i:s a', strtotime($row->created_at)) }}
                                    <!-- {{$row->created_at}} -->
                                    </td>
                                    <td>{{$row->market_name}} | {{$row->game_name}}</td>
                                    <!-- <td>
                                        <ul class="d-flex justify-content-center">
                                            <li class="mr-3"><a href="#" id="edit" class="text-secondary" data-toggle="modal" data-id="{{$row->id}}" data-wallet="{{$row->market_name}}" data-target="#edit-modal"><i class="fa fa-edit"></i></a></li>
                                        </ul>
                                    </td> -->
                                </tr>
                                @php  $i++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('multiauth::includes.footer')
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
