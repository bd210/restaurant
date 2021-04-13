<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">


    <div class="container position-relative text-center text-lg-left" data-aos="zoom-in" data-aos-delay="100">
        <div class="row">
            <div class="col-lg-8">
                <h1>Welcome to <span>{{ $detail->name }}</span></h1>
                <h2>Delivering great food for more than 18 years!</h2>
                @empty(!session('uspesno'))
                    <div class="alert alert-success"> {{ session('uspesno') }}</div>
                @endempty
                @empty(!session('neuspesno'))
                    <div class="alert alert-danger">  {{ session('neuspesno') }}</div>
                @endempty

                <div class="btns">
                    <a href="{{ asset('/.#menu') }}" class="btn-menu animated fadeInUp scrollto">Our Menu</a>
                    <a href="{{ asset('/.#book-a-table') }}" class="btn-book animated fadeInUp scrollto">Book a Table</a>
                </div>
            </div>
            <div class="col-lg-4 d-flex align-items-center justify-content-center" data-aos="zoom-in" data-aos-delay="200">
                @isset($video)
                <a href="{{ $video->link }}" class="venobox play-btn" data-vbtype="video" data-autoplay="true"></a>
                @endisset
            </div>



        </div>

    </div>
</section><!-- End Hero -->

