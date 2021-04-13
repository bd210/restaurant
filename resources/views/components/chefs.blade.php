<!-- ======= Chefs Section ======= -->
<section id="chefs" class="chefs">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Chefs</h2>
            <p>Our Proffesional Chefs</p>
        </div>

        <div class="row">
            @isset($chefs)
            @foreach($chefs as $chef)
            <div class="col-lg-4 col-md-6">
                <div class="member" data-aos="zoom-in" data-aos-delay="100">
                    <img src="{{ $chef->src }}" class="img-fluid" alt="">
                    <div class="member-info">
                        <div class="member-info-content">
                            <h4>{{ $chef->name }}</h4>
                            <span>{{ $chef->workplace }}</span>
                        </div>
                        <div class="social">

                            @foreach($socials as $social)

                            <a href="{{ $social->url }}"><i class="icofont-{{$social->name }}"></i></a>

                           @endforeach
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

            @else
                <div class="alert alert-danger"> NO ENTITY</div>
            @endisset

        </div>

    </div>
</section><!-- End Chefs Section -->
