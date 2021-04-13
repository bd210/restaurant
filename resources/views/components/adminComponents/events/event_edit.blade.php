<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>Event <b>Edit</b></h2>
                    </div>

                </div>
            </div>
            @isset($oneEvent)
                <table class="table table-striped table-hover">

                    <form action="{{route('EditEvent', ['id'=> $oneEvent->eventID])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-controlr">
                            <label>Title : </label>
                            <input type="text" name="title" class="form form-control" value="{{$oneEvent->title}}"/> <br/>
                        </div>
                        <div class="form-controlr">
                            <label>Description : </label>
                            <input type="text" name="description" class="form form-control" value="{{$oneEvent->description}}"/> <br/>
                        </div>
                        <div class="form-controlr">
                            <label>Price : </label>
                            <input type="text" name="price" class="form form-control" value="{{$oneEvent->price}}"/> <br/>
                        </div>

                        <div class="form-controlr">
                            <label>Picture : </label>
                            <img src="{{ asset('/'.$oneEvent->src) }}" alt="{{$oneEvent->alt}}" style="width: 200px;height: 200px;"/> <br/>

                            <input type="file" name="picture" class="form form-control">
                            <input type="hidden" name="old_picture" value="{{ $oneEvent->id_picture  }}">
                        </div>
                        <input type="submit" value="Edit" class="btn btn-primary">
                    </form>

                </table>
            @else
                <div class="alert alert-danger">EVENT DOES NOT EXIST</div>
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
