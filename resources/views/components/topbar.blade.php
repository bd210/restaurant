<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex">
        <div class="contact-info mr-auto">
            <i class="icofont-phone"></i>  {{ $detail->phone }}
            <span class="d-none d-lg-inline-block"><i class="icofont-clock-time icofont-rotate-180"></i>  {{ $detail->open_hours }}</span>
        </div>
        @if(!session()->has('user'))
        <div class="languages">
            <ul>
                <li><a href="{{route('createUserForm')}}">Register</a></li>
                <li><a href="{{ route('ShowLoginForm') }}">Login</a></li>
            </ul>
        </div>
         @endif
    </div>
</div>
