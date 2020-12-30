@extends('multiauth::layouts.app')
@section('content')
@include('multiauth::includes.sidebar')
@include('multiauth::includes.header')
@include('multiauth::includes.page_title')
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
    
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">{{$data->name}}</h4>
                <form action="{{route('admin.update_live_result')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}" class="form-control col-md-6" id="role">
                    <input type="hidden" name="name" value="{{$data->name}}" class="form-control col-md-6" id="role">
                    <div class="form-row align-items-center">
                        <div class="col-sm-3 my-1">
                            <label class="sr-only" for="inlineFormInputGroupUsername">Open</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Open Patti</div>
                                </div>
                                <input type="number" name="open" value="{{$data->open}}" class="@error('open') is-invalid @enderror num_disable form-control" id="inlineFormInputGroupUsername" placeholder="Open Patti">
                                @error('open')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-3 my-1">
                            <label class="sr-only" for="inlineFormInputGroupUsername">jodi</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Jodi</div>
                                </div>
                                <input type="number" name="jodi" value="{{$data->jodi}}" class="@error('jodi') is-invalid @enderror num_disable form-control" id="inlineFormInputGroupUsername" placeholder="jodi">
                                @error('jodi')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-3 my-1">
                            <label class="sr-only" for="inlineFormInputGroupUsername">Close</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Close Patti</div>
                                </div>
                                <input type="number" name="close" value="{{$data->close}}" class="@error('close') is-invalid @enderror num_disable form-control" id="inlineFormInputGroupUsername" placeholder="Close Patti">
                                @error('close')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-auto my-1">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
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
