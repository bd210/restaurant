<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Testimonials</h2>
            <p>What they're saying about us</p>
        </div>

        <div class="owl-carousel testimonials-carousel" data-aos="zoom-in" data-aos-delay="100">
        @isset($testimonials)
         @foreach($testimonials as $testimonial)
           <div class="testimonial-item">
                <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    {{$testimonial->content}}
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                @if($testimonial->src != null)
                   <img src="{{asset('/'.$testimonial->src)}}" class="testimonial-img" alt="{{$testimonial->alt}}">
               @else


                    <img src="{{ asset('/assets/img/users/default.png') }}" class="testimonial-img" alt="{{$testimonial->alt}}" />
                    @endif
                <h3>{{$testimonial->first_name . " " . $testimonial->last_name}}</h3>

            </div>

        @endforeach
            @else

                <div class="alert alert-danger">NO ENTITY</div>
            @endisset



        </div>

    </div>
</section><!-- End Testimonials Section -->
