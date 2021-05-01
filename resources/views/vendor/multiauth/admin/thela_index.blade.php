@extends('multiauth::layouts.app')
@section('content')
@include('multiauth::includes.sidebar')
@include('multiauth::includes.header')
@include('multiauth::includes.page_title')
<div class="main-content-inner">
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Watch Today Game</h4>
                @php $game_id_with_oc = array(1,2,3,4,5,6,7); @endphp
                @if(in_array($game_id,$game_id_with_oc))
                    <form action = "{{route('admin.thela_search')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="game_id" value="{{$game_id}}">
                        <div class="form-row align-items-center">
                            <div class="col-sm-3 my-1">
                                <label class="sr-only" for="inlineFormInputName">Name</label>
                                <input class="form-control" name ="date" type="date" value="{{date('Y-m-d')}}" id="example-date-input">
                            </div>
                            <div class="col-sm-3 my-1">
                                <label class="sr-only" for="inlineFormInputGroupUsername">Markets</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">M</div>
                                    </div>
                                    <select name="market_id" class="custom-select">
                                        <option value=''>select market</option>
                                        @foreach($markets as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @php $game_id_with_oc = array(1,3,4,5); @endphp
                            @if(in_array($game_id,$game_id_with_oc))
                            <div class="col-sm-3 my-1">
                                <label class="sr-only" for="inlineFormInputGroupUsername">Open Close</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">oc</div>
                                    </div>
                                    <select name="oc" class="custom-select">
                                        <option value=''>select open/close</option>
                                        <option value="open">Open</option>
                                        <option value="close">Close</option>
                                    </select>
                                </div>
                            </div>
                            @endif
                            <div class="col-auto my-1">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@include('multiauth::includes.footer')
@endsection