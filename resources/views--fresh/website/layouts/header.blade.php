<header id="headerCntr">
    @include('website.layouts.flash')
    <div class="container">
        <div class="logoArea">
            <a href="{{ url('/') }}"><img src="{{ url('assets/images/site-logo.png') }}" alt="log"/></a>
        </div>
        <div class="header-right">
            <div class="searchbar">
                <form class="example" action="{{ url('search') }}" method="get">
                    <input type="text" placeholder="Search.." name="keyword"
                           value="@if(app('request')->input('keyword')){{ app('request')->input('keyword') }}@endif">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            @auth
                <a href="{{ url('my-account') }}" class="site-btn">
                    <i class="fas fa-home"></i> My Account
                </a>
            @else
                <a href="{{ url('/login') }}" class="site-btn"><i class="fas fa-lock"></i> Login</a>
            @endauth
            <a href="{{ url('cart?'.csrf_token()) }}" class="dropdown-toggle" style="text-decoration: none">
                <i class="fas fa-shopping-cart"></i>
                <span class="badge"
                      style="background: linear-gradient(to right, #ff2670 0%, #ff6c36 100%)">Cart : {{ count($cart) }}</span>
            </a>
            <div class="dropmenu">
                <button class="dropdown-toggle" type="button" data-toggle="dropdown">
                    <img src="{{ url('assets/images/grid-icon.png') }}" alt="image">
                    Webinars
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    @foreach($menus as $menu)
                        <li>
                            <a href="{{ url('category/'.$menu->url_name) }}">{!! strip_tags($menu->name) !!}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</header>

