<div class="topbar">
    <div class="topbar-left">
        <div class="text-center">
            <a href="{{ url(\App\Utils\AppConstant::ADMIN_URL.'dashboard') }}" class="logo">
                <i class="icon-magnet icon-c-logo"></i>
                <span>UPSKILL EDUCATOR</span>
            </a>
        </div>
    </div>
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="">
                <div class="pull-left">
                    <button class="button-menu-mobile open-left waves-effect waves-light">
                        <i class="md md-menu"></i>
                    </button>
                    <span class="clearfix"></span>
                </div>
                <ul class="nav navbar-nav navbar-right pull-right">
                    <li class="dropdown top-menu-item-xs">
                        <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown"
                           aria-expanded="true">
                            <img src="{{ $admin->profile_picture }}" alt="user-img"
                                 class="img-circle" onerror="if (this.src != 'http://upskilleducator.com/storage/admin/4b2b195f97923737d101d52c2b4eec8c.png') this.src = 'http://upskilleducator.com/storage/admin/4b2b195f97923737d101d52c2b4eec8c.png';">
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ url(\App\Utils\AppConstant::ADMIN_URL.'profile') }}"><i
                                        class="ti-user m-r-10 text-custom"></i> Profile</a>
                            </li>
                            <li>
                                <a href="{{ url(\App\Utils\AppConstant::ADMIN_URL.'change-password') }}"><i
                                        class="ti-lock m-r-10 text-custom"></i> Change Password</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="javascript:void(0)"
                                   onclick="event.preventDefault(); document.getElementById('logout').submit();">
                                    <i class="ti-power-off m-r-10 text-danger"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
