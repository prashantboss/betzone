<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-4">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="index.html">Home</a></li>
                    <li><span>{{isset($title)?$title:"-"}}</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-4">
            <span style="background: black;" class="btn btn-outline-warning btn-sm" onclick="location.reload();">Refresh</span>&nbsp;&nbsp;&nbsp;&nbsp;<a style="background: black;" class="btn btn-outline-warning btn-sm" href="{{ route('admin.home') }}">Home Page</a>
        </div>
        <div class="col-sm-4 clearfix">
            <div class="user-profile pull-right">
                <img class="avatar user-thumb" src="{{asset('/')}}admin_assets/images/author/avatar.png" alt="avatar">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ auth('admin')->user()->name }} <i class="fa fa-angle-down"></i></h4>
                <div class="dropdown-menu">
                    <!-- @admin('super')
                    <a class="dropdown-item" href="{{ route('admin.show') }}">{{
                        ucfirst(config('multiauth.prefix')) }}</a>
                    @permitToParent('Role')
                    <a class="dropdown-item" href="{{ route('admin.roles') }}">Roles</a>
                    @endpermitToParent
                    @endadmin -->
                    <!-- <a class="dropdown-item" href="#">Message</a> -->
                    <a class="dropdown-item" href="{{ route('admin.edit.site.setting') }}">Settings</a>
                    <a class="dropdown-item" href="{{ route('admin.password.change') }}">Change Password</a>
                    <a class="dropdown-item" href="/admin/logout" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout
                    </a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
@if ( Session::has('flash_message') )
        <section class="alert-wrap p-t-70 p-b-0">
            <div class="container">
                <!-- ALERT-->
                <div class="alert {{ Session::get('flash_type') }} alert-dismissible fade show au-alert au-alert--70per" role="alert">
                    <i class="zmdi zmdi-check-circle"></i>
                    <span class="content">{{ Session::get('flash_message') }}</span>
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="zmdi zmdi-close-circle"></i>
                        </span>
                    </button>
                </div>
                <!-- END ALERT-->
            </div>
        </section>
        @endif
<!-- page title area end -->