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
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.home') }}">
                {{ config('app.name', 'Laravel') }} {{ ucfirst(config('multiauth.prefix')) }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest('admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.login')}}">{{ ucfirst(config('multiauth.prefix'))
                            }} Login</a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ auth('admin')->user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @admin('super')
                            <a class="dropdown-item" href="{{ route('admin.show') }}">{{
                                ucfirst(config('multiauth.prefix')) }}</a>
                            @permitToParent('Role')
                            <a class="dropdown-item" href="{{ route('admin.roles') }}">Roles</a>
                            @endpermitToParent
                            @endadmin
                            <a class="dropdown-item" href="{{ route('admin.password.change') }}">Change Password</a>
                            <a class="dropdown-item" href="/admin/logout" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- <h4 class="header-title">Holiday Updates</h4> -->
    <div class="col-lg-6 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Holiday Updates</h4>
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
