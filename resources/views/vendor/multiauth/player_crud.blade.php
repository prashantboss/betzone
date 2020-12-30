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

    <!-- Dark table start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Data Table Dark</h4>
                <div class="data-tables datatable-dark">
                    <table id="dataTable3" class="text-center">
                        <thead class="text-capitalize">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Actions</th>
                                <th>Wallet</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cruds as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->created_at}}</td>
                                    <td>
                                        <ul class="d-flex justify-content-center">
                                            <li class="mr-3">
                                                <a href="{{route('admin.player.edit', ['id' => $row->id])}}" id="edit" class="text-secondary"><i class="fa fa-money"></i></a>
                                            </li>
                                            <li class="mr-3">
                                                <a href="{{route('admin.player.forgot_pass', ['id' => $row->id])}}" id="forgot_pass" class="text-secondary"><span class="fa-passwd-reset fa-stack"><i class="fa fa-undo fa-stack-2x"></i>  <i class="fa fa-lock fa-stack-1x"></i></span></a>
                                            </li>
                                            <li><a href="" onclick="delete_player({{$row->id}})" class="text-danger"><i class="ti-trash"></i></a></li>
                                        </ul>
                                    </td>
                                    <td>{{$row->wallet}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Dark table end -->


@include('multiauth::includes.footer')
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        function delete_player(id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('admin.player.delete') }}",
                type: "GET",
                success: function(response) {
                    // $('#msg').html(response["count"]);
                    alert("sss");
                    location.reload(true); 
                }
            });
        }
    });
</script>
