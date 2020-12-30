@extends('player.layouts.app')
@section('content')
@include('player.includes.sidebar')
@include('player.includes.header')
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="col-md-6">
            <h3>{{$title}}</h3>
            @foreach($content as $row)
                <p>{!! $row->content !!}</p>
            @endforeach
        </div>
    </div>
</div>
@include('player.includes.footer')
@endsection