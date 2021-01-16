@extends('multiauth::layouts.app')
@section('content')
@include('multiauth::includes.sidebar')
@include('multiauth::includes.header')
@include('multiauth::includes.page_title')
<div class="main-content-inner">
    <!-- Dark table start -->
    <div class="row">
        <div class="col-6 mt-5">
            <h4 class="header-title">+ Amount in wallet</h4>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.player.update') }}" method="get" class="form-horizontal">
                        <input class="form-control mb-4 input-rounded" name="type" type="hidden" value='add'>
                        <input class="form-control mb-4 input-rounded" name="id" type="hidden" value='{{$id}}'>
                        <input class="form-control mb-4 input-rounded" name="amount" type="text" placeholder="Add Amount">
                        <button type="submit" class="btn btn-primary mt-4 pl-4 pr-4">Add</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-6 mt-5">
            <h4 class="header-title">- amount from wallet</h4>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.player.update') }}" method="get" class="form-horizontal">
                        <input class="form-control mb-4 input-rounded" name="type" type="hidden" value='minus'>
                        <input class="form-control mb-4 input-rounded" name="id" type="hidden" value='{{$id}}'>
                        <input class="form-control mb-4 input-rounded" name="amount" type="text" placeholder="Minus Amount">
                        <button type="submit" class="btn btn-primary mt-4 pl-4 pr-4">Minus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Dark table end -->


@include('multiauth::includes.footer')
@endsection
