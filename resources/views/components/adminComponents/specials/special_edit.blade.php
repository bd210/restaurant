<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>Special <b>Edit</b></h2>
                    </div>

                </div>
            </div>
            @isset($oneSpecial)
                <table class="table table-striped table-hover">

                    <form action="{{route('EditSpecial', ['id'=> $oneSpecial->specialID])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-controlr">
                            <label>Name : </label>
                            <input type="text" name="name" class="form form-control" value="{{$oneSpecial->name}}"/> <br/>
                        </div>
                        <div class="form-controlr">
                            <label>Title : </label>
                            <input type="text" name="title" class="form form-control" value="{{$oneSpecial->title}}"/> <br/>
                        </div>
                        <div class="form-controlr">
                            <label>Description : </label>
                            <textarea name="description" class="form form-control" style="width: 600px; height: 200px;"> {{$oneSpecial->description}} </textarea><br/>
                        </div>
                        <div class="form-controlr">
                            <label>Picture : </label>
                            <img src="{{ asset('/'.$oneSpecial->src) }}" alt="{{ $oneSpecial->alt }}" style="width: 200px;height: 200px;" />
                            <input type="file" name="picture" class="form form-control" /> <br/>
                            <input type="hidden" name="old_picture" value="{{ $oneSpecial->id_picture }}">
                        </div>

                        <input type="submit" value="Edit" class="btn btn-primary">
                    </form>

                </table>
            @else
                <div class="alert alert-danger">SPECIAL DOES NOT EXIST</div>
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
