<!-- ======= Menu Section ======= -->
<section id="menu" class="menu section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Menu</h2>
            <p>Check Our Tasty Menu</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="menu-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    @isset($menuTypes)
                      @foreach($menuTypes as $menuType)
                    <li data-filter=".filter-{{$menuType->type}}">{{$menuType->type}}</li>
                    @endforeach
                    @else
                    <li class="danger">NO ENTITY</li>
                    @endisset
                </ul>
            </div>
        </div>

        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
            @isset($menus)
            @foreach($menus as $menu)
            <div class="col-lg-6 menu-item filter-{{ $menu->type  }}">
                <img src="{{ asset('/'.$menu->src ) }}" class="menu-img" alt="{{ $menu->alt  }}">
                <div class="menu-content">
                    <a href="{{asset('/single/'.$menu->id_menu)}}">{{ $menu->name  }}</a><span>${{ $menu->price  }}</span>
                </div>
                <div class="menu-ingredients">
                    {{ $menu->description  }}
                </div>
            </div>

            @endforeach

            @else
                <div class="alert alert-danger"> NO ENTITY</div>
            @endisset
        </div>



    </div>
</section><!-- End Menu Section -->
