<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>Role <b> Edit</b></h2>
                    </div>

                </div>
            </div>
            @isset($showRole)
            <table class="table table-striped table-hover">

                <form action="{{route('EditRole', ['id'=> $showRole->id])}}" method="POST">
                    @csrf
                    <label>Role name : </label>
                    <input type="text" name="name" class="form form-control" value="{{$showRole->name}}" /> <br/>

                    <input type="submit" value="Edit" class="btn btn-primary">
                </form>

            </table>
            @else
                <div class="alert alert-danger">ROLE DOES NOT EXIST</div>
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
