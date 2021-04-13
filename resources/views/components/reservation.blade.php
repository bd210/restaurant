<!-- ======= Book A Table Section ======= -->
<section id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up" >

        <div class="section-title">
            <h2>Reservation</h2>
            <p>Book a Table</p>
        </div>
        <!-- class="php-email-form"  -->

        <form action="{{route('insertReservations')}}" method="post" role="form"  data-aos="fade-up" data-aos-delay="100">
            @csrf
            <div class="form-row">
                <div class="col-lg-4 col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" >

                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" >

                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" >

                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <input type="datetime-local" name="date" class="form-control" id="date" placeholder="Date" >

                </div>

                <div class="col-lg-4 col-md-6 form-group">
                    <input type="number" class="form-control" name="people" id="people" placeholder="# of people">

                </div>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>

            </div>

            <div class="text-center"><button type="submit" class="btn-primary">Book a Table</button></div>
        </form>

    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</section><!-- End Book A Table Section -->
