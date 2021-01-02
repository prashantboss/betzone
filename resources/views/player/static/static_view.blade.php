@extends('player.layouts.app')
@section('content')
@include('player.includes.sidebar')
@include('player.includes.header')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"><b>{{$title}}</b></div>
                        <div class="card-body card-block">
                            <h3></h3>
                            @foreach($content as $row)
                                <p>{!! $row->content !!}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('player.includes.footer')
@endsection