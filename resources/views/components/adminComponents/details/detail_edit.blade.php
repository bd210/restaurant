<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>Detail <b>Edit</b></h2>
                    </div>

                </div>
            </div>
            @isset($detail)
                <table class="table table-striped table-hover">

                    <form action="{{ route('EditDetail') }}" method="POST">
                        @csrf
                        <div class="form-controlr">
                            <label>Name : </label>
                            <input type="text" name="name" class="form form-control" value="{{ $detail->name }}"/> <br/>
                        </div>
                        <div class="form-controlr">
                            <label>Location : </label>
                            <input type="text" name="location" class="form form-control" value="{{ $detail->location }}"/> <br/>
                        </div>
                        <div class="form-controlr">
                            <label>Email : </label>
                            <input type="text" name="email" class="form form-control" value="{{ $detail->email }}"/> <br/>
                        </div>
                        <div class="form-controlr">
                            <label>Phone : </label>
                            <input type="text" name="phone" class="form form-control" value="{{ $detail->phone }}"/> <br/>
                        </div>
                        <div class="form-controlr">
                            <label>Open hours : </label>
                            <input type="text" name="open_hours" class="form form-control" value="{{ $detail->open_hours }}"/> <br/>
                        </div>

                        <input type="submit" value="Edit" class="btn btn-primary">
                    </form>

                </table>
            @else
                <div class="alert alert-danger">DETAIL DOES NOT EXIST</div>
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
