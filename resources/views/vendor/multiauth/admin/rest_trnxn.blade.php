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
                <div class="data-tables datatable-dark">
                    <table id="dataTable3" class="text-center">
                        <thead class="text-capitalize">
                            <tr>
                                <th>Id</th>
                                <th>Email</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Market | Game Name</th>
                                <th>Actions</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>Rs. {{$row->amount}}</td>
                                    <td>{{$row->created_at}}</td>
                                    <td>{{$row->market_name}} | {{$row->game_name}}</td>
                                    <td>
                                        <ul class="d-flex justify-content-center">
                                            <li class="mr-3"><a href="#" id="edit" class="text-secondary" data-toggle="modal" data-id="{{$row->id}}" data-wallet="{{$row->market_name}}" data-target="#edit-modal"><i class="fa fa-edit"></i></a></li>
                                        </ul>
                                    </td>
                                    <td>{{$row->number}}</td>
                                </tr>
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
