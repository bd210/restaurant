<!-- ======= Specials Section ======= -->

<section id="specials" class="specials">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Specials</h2>
            <p>Check Our Specials</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-3">

                <ul class="nav nav-tabs flex-column">
                    @isset($specials)
                    @foreach($specials as $special)
                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="tab" href="#tab-{{$special->tab}}">{{ $special->name }}</a>
                    </li>
                    @endforeach
                    @else
                        <div class="alert alert-danger">NO ENTITY</div>
                    @endisset
                </ul>
            </div>

            <div class="col-lg-9 mt-4 mt-lg-0">
                <div class="tab-content">
                    @isset($specials)
                    @foreach($specials as $special)
                    <div class="tab-pane" id="tab-{{ $special->tab }}">
                        <div class="row">
                            <div class="col-lg-8 details order-2 order-lg-1">
                                <h3>{{ $special->title }}</h3>
                                <p class="font-italic">{{ $special->description }}</p>

                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                <img src="{{ asset('/'.$special->src) }}" alt="{{ $special->alt }}" class="img-fluid">
                            </div>
                        </div>
                    </div>

                    @endforeach
                     @else
                        <div class="alert alert-danger">NO ENTITY</div>
                    @endisset

               </div>
            </div>

        </div>

    </div>
</section><!-- End Specials Section -->
