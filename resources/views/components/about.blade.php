<!-- ======= About Section ======= -->

<section id="about" class="about">

    <div class="container" data-aos="fade-up">

        <div class="row">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
                <div class="about-img">
                    <img src="{{asset('/'.$about->src) }}" alt="{{$about->alt }}">
                </div>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                <h3>{{$about->title }}</h3> <br/> <br/>
                <p class="font-italic">
                    {{$about->description }}
                </p>


            </div>
        </div>

    </div>
</section><!-- End About Section -->
