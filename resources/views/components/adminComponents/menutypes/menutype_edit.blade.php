<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>MenuType <b>Edit</b></h2>
                    </div>

                </div>
            </div>
            @isset($oneMenuType)
                <table class="table table-striped table-hover">

                    <form action="{{route('EditMenuType', ['id'=> $oneMenuType->id])}}" method="POST">
                        @csrf
                        <div class="form-controlr">
                            <label>Type : </label>
                            <input type="text" name="type" class="form form-control" value="{{$oneMenuType->type}}"/> <br/>
                        </div>

                        <input type="submit" value="Edit" class="btn btn-primary">
                    </form>

                </table>
            @else
                <div class="alert alert-danger">MENUTYPE DOES NOT EXIST</div>
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
