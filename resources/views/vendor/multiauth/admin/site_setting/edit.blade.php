@extends('multiauth::layouts.app')
@section('content')
@include('multiauth::includes.sidebar')
@include('multiauth::includes.header')
@include('multiauth::includes.page_title')

<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-6 col-ml-12">
            <div class="row">
                <!-- Textual inputs start -->
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Site Setting</h4>
                            <form>
                                <div class="form-group">
                                    <label for="site-name" class="col-form-label">Site Name</label>
                                    <input class="form-control" name="site_name" type="text" value="{{$siteSetting['site_name']}}" id="site_name">
                                </div>
                                <div class="form-group">
                                    <label for="site-slogan" class="col-form-label">Site Slogan</label>
                                    <input class="form-control" name="site_slogan" type="search" value="{{$siteSetting['site_slogan']}}" id="site_slogan">
                                </div>
                                <div class="form-group">
                                    <label for="site_email" class="col-form-label">Site Email</label>
                                    <input class="form-control" name="site_email" type="email" value="{{$siteSetting['site_email']}}" id="site_email">
                                </div>
                                <div class="form-group">
                                    <label for="site_phone_primary" class="col-form-label">Site Phone Primary</label>
                                    <input class="form-control" name="site_phone_primary" type="text" value="{{$siteSetting['site_phone_primary']}}" id="site_phone_primary">
                                </div>
                                <div class="form-group">
                                    <label for="site_phone_secondary" class="col-form-label">Site Phone Secondary</label>
                                    <input class="form-control" name="site_phone_secondary" type="text" value="{{$siteSetting['site_phone_secondary']}}" id="site_phone_secondary">
                                </div>
                                <div class="form-group">
                                    <label for="col-form-label" class="col-form-label">Site Street Address</label>
                                    <textarea class="form-control" name="site_street_address" aria-label="With textarea" id="col-form-label">{{$siteSetting['site_street_address']}}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Textual inputs end -->
            </div>
        </div>
    </div>

@include('multiauth::includes.footer')
@endsection