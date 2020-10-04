<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            <?php
             $admin = Auth::guard(\App\Utils\AppConstant::ADMIN_GUARD)->user();
              
            ?>

            <ul>
                <li class="text-muted menu-title">Navigation</li>
                @if($admin->admin_type==1)
                <li class="has_sub">
                    <a href="{{ url(\App\Utils\AppConstant::ADMIN_URL.'dashboard') }}" class="waves-effect">
                        <i class="ti-home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="has_sub">
                    <a href="{{ route('users.index') }}">
                        <i class="ti-settings"></i> Users
                    </a>
                </li>
                <li class="has_sub">
                    <a href="{{ url('/admin/sub-admin') }}">
                        <i class="ti-user"></i> Sub Admin
                    </a>
                </li>
                <li class="has_sub">
                    <a href="{{ route('blogs.index') }}">
                        <i class="ti-settings"></i> Blogs
                    </a>
                </li>
                @endif
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-settings"></i>
                        <span> Product</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        @if($admin->admin_type==1)
                        <li>
                            <a href="{{ route('category.index') }}">
                                <i class="ti-settings"></i> Category
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('products.index') }}">
                                <i class="ti-settings"></i> Products
                            </a>
                        </li>
                        @endif
                        <li>
                            <a href="{{ route('orders.index') }}">
                                <i class="ti-settings"></i> Orders
                            </a>
                        </li>
                        @if($admin->admin_type==1)
                        <li>
                            <a href="{{ url('/') }}/admin/coupons">
                                <i class="ti-gift"></i> Coupons
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/') }}/admin/package">
                                <i class="ti-gift"></i> Package
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @if($admin->admin_type==1)
                <li class="has_sub">
                    <a href="{{ route('our-speaker.index') }}">
                        <i class="ti-settings"></i> Our Speakers
                    </a>
                </li>
                <li class="has_sub">
                    <a href="{{ url(\App\Utils\AppConstant::ADMIN_URL.'homepage-content') }}">
                        <i class="ti-settings"></i> Homepage
                    </a>
                </li>
                <li class="has_sub">
                    <a href="{{ url(\App\Utils\AppConstant::ADMIN_URL.'about-us') }}">
                        <i class="ti-settings"></i> About Us Home
                    </a>
                </li>
                <!-- new route -->
                <li class="has_sub">
                    <a href="{{ url(\App\Utils\AppConstant::ADMIN_URL.'about-us-page') }}">
                        <i class="ti-settings"></i> About Us Page
                    </a>
                </li>
                <li class="has_sub">
                    <a href="{{ url(\App\Utils\AppConstant::ADMIN_URL.'contact-us-content') }}">
                        <i class="ti-settings"></i> Contact Us
                    </a>
                </li>
                <li class="has_sub">
                    <a href="{{ url(\App\Utils\AppConstant::ADMIN_URL.'faqs-content') }}">
                        <i class="ti-settings"></i> FAQ's
                    </a>
                </li>
                <li class="has_sub">
                    <a href="{{ url(\App\Utils\AppConstant::ADMIN_URL.'terms-of-use-content') }}">
                        <i class="ti-settings"></i> Term's Of Use
                    </a>
                </li>
                <li class="has_sub">
                    <a href="{{ url(\App\Utils\AppConstant::ADMIN_URL.'privacy-policy-content') }}">
                        <i class="ti-settings"></i> Privacy Policy
                    </a>
                </li>
                <li class="has_sub">
                    <a href="{{ url(\App\Utils\AppConstant::ADMIN_URL.'refund-policy-content') }}">
                        <i class="ti-settings"></i> Refund Policy
                    </a>
                </li>
                <li class="has_sub">
                    <a href="{{ url(\App\Utils\AppConstant::ADMIN_URL.'site-map-content') }}">
                        <i class="ti-settings"></i> Site Map
                    </a>
                </li>
                <li class="has_sub">
                    <a href="{{ url(\App\Utils\AppConstant::ADMIN_URL.'newsletter-subscribe') }}">
                        <i class="ti-settings"></i> Newsletter Subscriber
                    </a>
                </li>
                @endif
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
