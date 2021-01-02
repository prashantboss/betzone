@extends('player.layouts.app')
@section('content')
@include('player.includes.sidebar')
@include('player.includes.header')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Update Password</div>
                        <div class="card-body card-block">
                            <form action="{{ route('player.change_password_process') }}" class="">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Current Password</div>
                                        <input type="text" id="current_password" placeholder="Enter Current Password" name="current_password" class="@error('current_password') is-invalid @enderror form-control">                                                                          
                                    </div>
                                    @error('current_password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">New Password</div>
                                        <input type="password" id="new_password" placeholder="Enter New Password" name="new_password" class="@error('new_password') is-invalid @enderror form-control">                    
                                    </div>
                                    @error('current_password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('player.includes.footer')
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  
</script>