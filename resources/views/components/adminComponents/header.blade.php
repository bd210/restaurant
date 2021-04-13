
<header class="header dark-bg">
    <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
    </div>

    <!--logo start-->
    <a href="{{ route('admin') }}" class="logo">ADMIN <span class="lite">PANEL</span></a>
    <!--logo end-->

    <div class="nav search-row" id="top_menu">
        <!--  search form start -->
        <ul class="nav top-menu">
            <li>
                <form action="{{ route('SearchUser') }}" method="get" class="navbar-form">
                    @csrf
                    <input class="form-control" placeholder="Search users...." type="text" name="search">
                    <input type="submit" value="Search" class="btn-primary">
                </form>
            </li>
        </ul>
        <!--  search form end -->
    </div>

    <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

            <li class="dropdown">

               <!-- <a data-toggle="dropdown" class="dropdown-toggle" href="#"> -->
                    <a href="{{ route('UserProfile', ['id'=> session()->get('user')->id]) }}" >    <span class="profile-ava">
                               @if(session()->get('user')->src != null)
                                    <img  src="{{ asset('/'.session()->get('user')->src) }}"  alt="{{ session()->get('user')->alt }}" style="width: 30px;height: 30px;">
                                @else
                                    <img src="{{ asset('/assets/img/users/default.png') }}" alt="{{ session()->get('user')->alt }}"  style="width: 30px;height: 30px;">

                                @endif
                            </span>
                    <span class="username">
                     {{ session()->get('user')->first_name . " " . session()->get('user')->last_name}}
                    </span>

                </a>
             </li>


            <a href="{{ asset('/') }}" style="text-decoration: none;font-size: 20px;"> <span class="glyphicon glyphicon-home"></span> Home </a>
            <a href="{{ route('logout') }}" style="text-decoration: none;font-size: 20px;"> <span class="glyphicon glyphicon-log-out"></span> Log out </a>
            <!-- user login dropdown end -->

        </ul>
        <!-- notificatoin dropdown end-->
    </div>
</header>
