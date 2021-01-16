@extends('multiauth::layouts.app')
@section('content')
@include('multiauth::includes.sidebar')
@include('multiauth::includes.header')
@include('multiauth::includes.page_title')
<!-- <div class="page-container"> -->
    <!-- <div class="main-content"> -->
        <!-- <div class="main-content-inner"> -->
            <!-- <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
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

                        <ul class="navbar-nav mr-auto">

                        </ul>

                
                        <ul class="navbar-nav ml-auto">
                    
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
            </nav> -->

            <!-- main content area start -->
            <!-- <div class="main-content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">{{ ucfirst(config('multiauth.prefix')) }} Dashboard</div>
                                <div class="card-body">
                                    @include('multiauth::message')
                                    You are logged in to {{ config('multiauth.prefix') }} side!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- main content area end -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        
                            <h4 class="header-title mb-0">Live Result</h4>
                            <div>
                                @php $data = DB::table('markets')->get(); @endphp
                                @foreach($data as $row)
                                    <button type="button" class="btn btn-flat btn-dark btn-lg btn-block">
                                        {{$row->name}}<br/>
                                        @if($row->open =="")  
                                            {{"XXX"}}       
                                        @else
                                            {{$row->open}}      
                                        @endif

                                        @if($row->jodi =="")  
                                            {{"-XX-"}}       
                                        @elseif(strlen((string)$row->jodi) == "1")
                                            {{"-".$row->jodi."X-"}}      
                                        @else
                                            {{"-".$row->jodi."-"}}
                                        @endif

                                        @if($row->close =="")  
                                            {{"XXX"}}       
                                        @else
                                            {{$row->close}}      
                                        @endif
                                        <br/>
                                        @php 
                                        $date_open = new DateTime(date("Y-m-d")." ".$row->open_time); 
                                        $date_close = new DateTime(date("Y-m-d")." ".$row->close_time); 
                                        @endphp
                                        {{$date_open->format('h:ia')}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$date_close->format('h:ia')}}
                                    </button>
                            
                            @endforeach
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        <!-- </div> -->
    <!-- </div> -->
<!-- </div> -->
@include('multiauth::includes.footer')
@endsection
