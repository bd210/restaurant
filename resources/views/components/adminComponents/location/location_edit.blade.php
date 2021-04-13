
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>Location <b>Edit</b></h2>
                    </div>

                </div>
            </div>
            @isset($getLocation)
                <table class="table table-striped table-hover">
                    <form action="{{ route('EditLocation') }}" method="POST">
                        @csrf

                        <div class="form-controlr">
                            <label>Location : </label>

                            <textarea name="location" class="form form-control" style="height: 200px;width: 600px;"> {{ $getLocation->location }} </textarea>
                            <br/>
                        </div>
                         <br/>


                        <input type="submit" value="Edit" class="btn btn-primary">
                    </form>

                </table>
            @else
                <div class="alert alert-danger">LOCATION DOES NOT EXIST</div>
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
