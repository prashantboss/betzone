@extends('multiauth::layouts.app')
@section('content')
@include('multiauth::includes.sidebar')
@include('multiauth::includes.header')
@include('multiauth::includes.page_title')
<style>
    fieldset {
      overflow: hidden
    }
    
    .some-class {
      float: left;
      clear: none;
    }
    
    label {
      float: left;
      clear: none;
      display: block;
      padding: 0px 1em 0px 8px;
    }
    
    input[type=radio],
    input.radio {
      float: left;
      clear: none;
      margin: 2px 0 0 2px;
    }
</style>
<div class="main-content-inner">
    <!-- <h4 class="header-title">Holiday Updates</h4> -->
    <div class="col-lg-6 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title" style="text-align: center;">{{ $game_name }}</h4>
                <h4 class="header-title">Holiday Update of {{ $game_name }}</h4>
                <div class="single-table">
                    <div class="table-responsive">
                        <form action="{{route('admin.holiday_update')}}" method="POST">
                            @csrf
                            <table class="table text-center">
                                <thead class="text-uppercase bg-primary">
                                    <tr class="text-white">
                                        <th scope="col">Market</th>
                                        <th scope="col">Yes</th>
                                        <th scope="col">No</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <input type="hidden" name="game_id" value="{{$game_id}}" />
                                <input type="hidden" name="game_name" value="{{$game_name}}" />
                                <!-- @if(empty($data1)) -->
                                    @foreach($markets as $row)
                                        <tr>
                                            <th scope="row"><label for="y">{{$row->name}}</label></th>
                                            @php
                                                $mh = DB::table('market_holiday')->where('game_id', $game_id)->where('market_id', $row->id)->first();
                                            @endphp
                                            <td>
                                                <input type="hidden" name="market_id" value="{{$row->id}}" />
                                                @if(empty($mh))
                                                    <input type="radio" class="radio" name="is_closed_{{$row->id}}" value="y" required="required" />
                                                @else
                                                    @if($mh->is_closed == 'y')
                                                        <input type="radio" class="radio" name="is_closed_{{$row->id}}" value="y" checked="checked" required="required" />                                                         
                                                    @else
                                                        <input type="radio" class="radio" name="is_closed_{{$row->id}}" value="y" required="required" />
                                                    @endif
                                                @endif

                                                
                                            </td>
                                            <td>
                                                @if(empty($mh))
                                                    <input type="radio" class="radio" name="is_closed_{{$row->id}}" value="n" required="required" />
                                                @else
                                                    @if($mh->is_closed == 'n')
                                                        <input type="radio" class="radio" name="is_closed_{{$row->id}}" value="n" checked="checked" required="required" />                                                         
                                                    @else
                                                        <input type="radio" class="radio" name="is_closed_{{$row->id}}" value="n" required="required" />
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                <!-- @else
                                    @foreach($holiday_data as $row)
                                        <tr>
                                            <th scope="row"><label for="y">{{$row->market_name}}</label></th>
                                            <td>
                                                <input type="hidden" name="market_id" value="{{$row->market_id}}" />
                                                @if($row->is_closed == 'y')
                                                    <input type="radio" class="radio" name="is_closed_{{$row->market_id}}" value="y" required="required" checked="checked" />  
                                                @else
                                                    <input type="radio" class="radio" name="is_closed_{{$row->market_id}}" value="y" required="required" />                                                    
                                                @endif
                                            </td>
                                            @if($row->is_closed == 'y')
                                                <td><input type="radio" class="radio" name="is_closed_{{$row->market_id}}" value="n" required="required" checked="checked" /></td>
                                            @else
                                                <td><input type="radio" class="radio" name="is_closed_{{$row->market_id}}" value="n" required="required" /></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endif -->
                                </tbody>
                            </table>
                            <input type="submit" class="btn btn-primary mt-4 pr-4 pl-4" value="Submit" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
      
@include('multiauth::includes.footer')
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    // disable alphabets on input field
    $(document).ready(function () {
        $(".num_disable").keypress(function (e) {
            
            if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)){
                return false;
            }
                
        });
    });
    
</script>
