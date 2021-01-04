<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="index.html">Home</a></li>
                    <li><span>{{isset($title)?$title:"-"}}</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <img class="avatar user-thumb" src="{{asset('/')}}admin_assets/images/author/avatar.png" alt="avatar">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ auth('admin')->user()->name }} <i class="fa fa-angle-down"></i></h4>
                <div class="dropdown-menu">
                    @admin('super')
                    <a class="dropdown-item" href="{{ route('admin.show') }}">{{
                        ucfirst(config('multiauth.prefix')) }}</a>
                    @permitToParent('Role')
                    <a class="dropdown-item" href="{{ route('admin.roles') }}">Roles</a>
                    @endpermitToParent
                    @endadmin
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
<!-- page title area end -->