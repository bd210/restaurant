<!-- ======= Events Section ======= -->
<section id="events" class="events">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Events</h2>
            <p>Organize Your Events in our Restaurant</p>
        </div>

        <div class="owl-carousel events-carousel" data-aos="fade-up" data-aos-delay="100">
        @isset($events)
            @foreach($events as $event)

            <div class="row event-item">
                <div class="col-lg-6">
                    <img src="{{ asset('/'. $event->src) }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                    <h3>{{ $event->title }}</h3>
                    <div class="price">
                        <p><span>${{ $event->price }}</span></p>
                    </div>
                    <p class="font-italic">
                        {{ $event->description }}
                    </p>


                </div>
            </div>

            @endforeach
            @else
            <div class="alert alert-danger"> NO ENTITY</div>
            @endisset
        </div>

    </div>
</section><!-- End Events Section -->
