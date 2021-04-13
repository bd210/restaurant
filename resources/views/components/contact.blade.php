<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Contact</h2>
            <p>Contact Us</p>
        </div>
    </div>

    <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;" src="{{ $location->location }}" frameborder="0" allowfullscreen></iframe>
    </div>

    <div class="container" data-aos="fade-up">

        <div class="row mt-5">

            <div class="col-lg-4">
                <div class="info">
                    <div class="address">
                        <i class="icofont-google-map"></i>
                        <h4>Location:</h4>
                        <p> {{ $detail->location }}</p>
                    </div>

                    <div class="open-hours">
                        <i class="icofont-clock-time icofont-rotate-90"></i>
                        <h4>Open Hours:</h4>
                        <p>
                            {{ $detail->open_hours }}
                        </p>
                    </div>

                    <div class="email">
                        <i class="icofont-envelope"></i>
                        <h4>Email:</h4>
                        <p> {{ $detail->email }}</p>
                    </div>

                    <div class="phone">
                        <i class="icofont-phone"></i>
                        <h4>Call:</h4>
                        <p> {{ $detail->phone }}</p>
                    </div>

                </div>

            </div>

            <div class="col-lg-8 mt-5 mt-lg-0" >

                <form action="{{route('contact')}}" method="post" >
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="email"  placeholder="Email"  />

                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject"  placeholder="Subject"  />

                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="8"  placeholder="Message"></textarea>

                    </div>

                    <div class="text-center"><button type="submit" CLASS="btn-primary">Send Message</button></div>
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

        </div>

    </div>
</section><!-- End Contact Section -->
