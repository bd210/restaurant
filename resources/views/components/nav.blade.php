<nav class="nav-menu d-none d-lg-block">
    <ul>
        <li class="active"><a href=" {{asset('/')}}">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#menu">Menu</a></li>
        <li><a href="#specials">Specials</a></li>
        <li><a href="#events">Events</a></li>
        <li><a href="#gallery">Gallery</a></li>
        <li><a href="#chefs">Chefs</a></li>
        <li><a href="#contact">Contact</a></li>
        @if(session()->has('user'))

           @if(session()->get('user')->roleName == 'admin')
                <li><a href="{{route('admin')}}">Admin Panel</a></li>
                <li><a href="{{route('logout')}}">Logout</a></li>
            @else
                <li><a href="{{route('SelectData')}}">My profile</a></li>
                <li><a href="{{route('logout')}}">Logout</a></li>
            @endif

        @endif
        <li class="book-a-table text-center"><a href="#book-a-table">Book a table</a></li>

    </ul>
</nav><!-- .nav-menu -->
