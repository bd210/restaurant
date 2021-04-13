
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>About <b>Edit</b></h2>
                    </div>

                </div>
            </div>
            @isset($aboutInfo)
                <table class="table table-striped table-hover">
            <form action="{{ route('EditAbout') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-controlr">
                            <label>Title : </label>
                            <input type="text" name="title" class="form form-control" value="{{ $aboutInfo->title }}"/> <br/>
                        </div>
                        <div class="form-controlr">
                            <label>Description : </label>

                            <textarea name="description" class="form form-control" style="height: 200px;width: 600px;"> {{ $aboutInfo->description }} </textarea>
                            <br/>
                        </div>
                        <div class="form-controlr">
                            <label>Picture : </label>

                            <img src="{{ asset('/'.$aboutInfo->src) }}"  alt="{{ $aboutInfo->alt }}" style="width: 400px;height: 400px;"/> <br/>
                            <input type="file" name="picture" class="form form-control">
                            <input type="hidden" name="old_picture" value="{{ $aboutInfo->id_picture }}">
                        </div> <br/>


                        <input type="submit" value="Edit" class="btn btn-primary">
                    </form>

                </table>
            @else
                <div class="alert alert-danger">ABOUT DOES NOT EXIST</div>
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
