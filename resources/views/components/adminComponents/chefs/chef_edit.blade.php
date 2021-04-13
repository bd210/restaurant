<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>Chef <b>Edit</b></h2>
                    </div>

                </div>
            </div>
            @isset($oneChef)
                <table class="table table-striped table-hover">

                    <form action="{{route('EditChef', ['id'=> $oneChef->chefID])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-controlr">
                            <label>Name : </label>
                            <input type="text" name="name" class="form form-control" value="{{$oneChef->name}}"/> <br/>
                        </div>
                        <div class="form-controlr">
                            <label>Workplace : </label>
                            <input type="text" name="workplace" class="form form-control" value="{{$oneChef->workplace}}"/> <br/>
                        </div>
                        <div class="form-controlr">
                            <label>Picture : </label>
                          <img src="{{asset('/'.$oneChef->src)}}" alt="{{$oneChef->alt }}" style="width: 200px;height:200px;"/>
                          <input type="file" name="picture" class="form form-control">
                            <input type="hidden" name="old_picture" value="{{ $oneChef->id_picture }}">
                            <br/>
                        </div>

                        <input type="submit" value="Edit" class="btn btn-primary">
                    </form>

                </table>
            @else
                <div class="alert alert-danger">CHEF DOES NOT EXIST</div>
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
