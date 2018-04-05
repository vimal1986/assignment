<!-- Main Header -->
<header class="main-header fanlyfe">

    <!-- Logo -->
    <a href="{{ URL('/admin') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
            {{--<img src="{{ asset('img/plug.png') }}" alt="brand logo">--}}
        </span>
        <!-- logo for regular state and mobile devices -->
        <img src="{{ asset('image/eta_logo.png') }}" class="class-logo" alt="brand logo">
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">
            </span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                @if (Auth::guest())
                    <li><a href="{{ url('/register') }}"></a></li>
                    <li><a href="{{ url('/login') }}"></a></li>
                @else
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu" id="user_menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="{{ asset('img/avatar5.png') }}{{--{{ Gravatar::get($user->email) }}--}}" class="user-image" alt="User Image"/>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">admin{{--{{ Auth::user()->name }}--}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div>
                                    <div>
                                        <div class="logout">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                                            <a href="{{ url('/logout') }}" class="btn btn-default btn-flat btn-width" id="logout">
                                                Logout
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endif


            </ul>
        </div>
    </nav>
</header>
