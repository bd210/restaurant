<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>Gallery <b>Edit</b></h2>
                    </div>

                </div>
            </div>
            @isset($oneGallery)
                <table class="table table-striped table-hover">

                    <form action="{{ route('EditGallery', ['id' => $oneGallery->galleryID]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-controlr">
                            <label>Picture : </label>
                            <img src="{{ asset('/'.$oneGallery->src) }}" alt="{{ $oneGallery->alt }}" style="width: 200px;height: 200px;"/>
                            <input type="file" name="picture" class="form form-control" /> <br/>

                        </div>

                        <input type="submit" value="Edit" class="btn btn-primary">
                    </form>

                </table>
            @else
                <div class="alert alert-danger">GALLERY DOES NOT EXIST</div>
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
