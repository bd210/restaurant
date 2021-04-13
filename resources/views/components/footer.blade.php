<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <h3><a href="{{ asset('/') }}"> {{ $detail->name }}</a></h3>
                        <p>
                            {{ $detail->location }}
                            <br><br>
                            <strong>Phone:</strong>  {{ $detail->phone }}<br>
                            <strong>Email:</strong>  {{ $detail->email }}<br>
                        </p>
                        <div class="social-links mt-3">
                            @isset($socials)
                            @foreach($socials as $social)
                            <a href="{{ $social->url }}" class="{{ $social->name }}"><i class="bx bxl-{{ $social->name }}"></i></a>

                            @endforeach
                            @else
                                <div class="alert alert-danger"> NO ENTITY</div>
                            @endisset
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ asset('/') }}">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ asset('/#about') }}">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ asset('/#menu') }}">Menu</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ asset('/#specials') }}">Specials</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ asset('/#events') }}">Events</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ asset('/#gallery') }}">Gallery</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ asset('/#chefs') }}">Chefs</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ asset('/#contact') }}">Contact</a></li>

                    </ul>
                </div>



              @if((session()->has('user')))
                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Our Newsletter</h4>
                        <h1><b>Say something about us</b></h1>
                        <form action="{{route('insertTestimonials')}}" method="post">
                            @csrf
                            <textarea name="content" style="width: 300px;height: 70px;"> </textarea>
                            <input type="submit" value="Subscribe">


                        </form>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h2><b> <a href="{{ route('ShowLoginForm') }}">Login</a> to say something about us...</b></h2><br/>


                    </div>
                @endif

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>Restaurantly</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/restaurantly-restaurant-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>

</footer><!-- End Footer -->
