@extends('multiauth::layouts.app')
@section('content')
@include('multiauth::includes.sidebar')
@include('multiauth::includes.header')
@include('multiauth::includes.page_title')
<div class="main-content-inner">
    <!-- Dark table start -->
    <div class="row">
        <div class="col-6 mt-5">
            <h4 class="header-title">Reset Password</h4>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.player.reset') }}" method="get" class="form-horizontal">
                        <input class="form-control mb-4 input-rounded" name="id" type="hidden" value='{{$id}}'>
                        <input class="form-control mb-4 input-rounded" name="password" type="text" placeholder="Reset Password">
                        <button type="submit" class="btn btn-primary mt-4 pl-4 pr-4">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Dark table end -->


@include('multiauth::includes.footer')
@endsection
