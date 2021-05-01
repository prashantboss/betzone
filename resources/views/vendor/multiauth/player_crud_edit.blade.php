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
                    <form id="add_form" action="{{ route('admin.player.update') }}" method="get" class="form-horizontal">
                        <input class="form-control mb-4 input-rounded" name="type" type="hidden" value='add'>
                        <input class="form-control mb-4 input-rounded" name="id" type="hidden" value='{{$id}}'>
                        <input class="fdisable form-control mb-4 input-rounded" name="amount" type="number" placeholder="Add Amount">
                        <button id="btn_add" onclick="add_submit()" class="btn btn-primary mt-4 pl-4 pr-4">Add</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-6 mt-5">
            <h4 class="header-title">- amount from wallet</h4>
            <div class="card">
                <div class="card-body">
                    <form id="minus_form" action="{{ route('admin.player.update') }}" method="get" class="form-horizontal">
                        <input class="form-control mb-4 input-rounded" name="type" type="hidden" value='minus'>
                        <input class="form-control mb-4 input-rounded" name="id" type="hidden" value='{{$id}}'>
                        <input class="fdisable form-control mb-4 input-rounded" name="amount" type="number" placeholder="Minus Amount">
                        <button id="btn_minus" onclick="minus_submit()" class="btn btn-primary mt-4 pl-4 pr-4" >Minus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Dark table end -->


@include('multiauth::includes.footer')
@endsection
<script>
    $(document).ready(function () {
        $(".fdisable").keypress(function (e) {
            if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)){
                return false;
            }
                
        });
    });

    function minus_submit(){
            $('#btn_minus').prop('disabled',true)
            $('#minus_form').submit()

        }

    function add_submit(){
        $('#btn_add').prop('disabled',true)
        $('#add_form').submit()
    }
</script>