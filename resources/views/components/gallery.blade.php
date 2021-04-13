<!-- ======= Gallery Section ======= -->
<section id="gallery" class="gallery">

    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Gallery</h2>
            <p>Some photos from Our Restaurant</p>
        </div>
    </div>

    <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row no-gutters">
        @isset($gallery)
            @foreach($gallery as $gall)
            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                    <a href="{{asset('/'.$gall->src)}}" class="venobox" data-gall="gallery-item">
                        <img src="{{ $gall->src }}" alt="{{ $gall->alt }}" class="img-fluid">
                    </a>
                </div>
            </div>

            @endforeach
            @else
            <div class="alert alert-danger">NO ENTITY</div>
            @endisset
        </div>

    </div>
</section><!-- End Gallery Section -->
