<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>Testimonial <b>Edit</b></h2>
                    </div>

                </div>
            </div>
            @isset($oneTestimonial)
                <table class="table table-striped table-hover">

                    <form action="{{route('EditTestimonial', ['id'=> $oneTestimonial->id])}}" method="POST">
                        @csrf
                        <div class="form-controlr">
                            <label>Content : </label>
                            <input type="text" name="content" class="form form-control" value="{{$oneTestimonial->content}}"/> <br/>
                        </div>

                        <input type="submit" value="Edit" class="btn btn-primary">
                    </form>

                </table>
            @else
                <div class="alert alert-danger">TESTIMONIAL DOES NOT EXIST</div>
            @endisset


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
