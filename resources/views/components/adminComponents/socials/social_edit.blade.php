<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>Social <b>Edit</b></h2>
                    </div>

                </div>
            </div>
            @isset($oneSocial)
                <table class="table table-striped table-hover">

                    <form action="{{route('EditSocial', ['id'=> $oneSocial->id])}}" method="POST">
                        @csrf
                        <div class="form-controlr">
                            <label>Name : </label>
                            <input type="text" name="name" class="form form-control" value="{{$oneSocial->name}}"/> <br/>
                        </div>
                        <div class="form-controlr">
                            <label>Url : </label>
                            <input type="text" name="url" class="form form-control" value="{{$oneSocial->url}}"/> <br/>
                        </div>

                        <input type="submit" value="Edit" class="btn btn-primary">
                    </form>

                </table>
            @else
                <div class="alert alert-danger">SOCIAL DOES NOT EXIST</div>
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

