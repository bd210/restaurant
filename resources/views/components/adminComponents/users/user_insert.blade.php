<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>User <b>Create</b></h2>
                    </div>

                </div>
            </div>
            <table class="table table-striped table-hover">

                <form action="{{route('CreateUser')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label>First Name : </label>
                            <input type="text" class="form-control" name="first_name" id="first_name"   />

                        </div>
                        <div class="form-group">
                            <label>Last Name : </label>
                            <input type="text" class="form-control" name="last_name" id="last_name"   />

                        </div>
                        <div class="form-group">
                            <label>Email : </label>
                            <input type="text" class="form-control" name="email" id="email"    />

                        </div>
                    <div class="form-group">
                        <label>Role : </label>
                        <select name="role">

                            @foreach($roles as $role)

                <option value="{{$role->id}}"> {{$role->name}}</option>
                            @endforeach
                        </select>

                    </div>
                        <div class="form-group">
                            <label>Password : </label>
                            <input type="password" class="form-control" name="password" id="password"   />

                        </div>
                        <div class="form-group">
                            <label>Confirm Password : </label>
                            <input type="password" class="form-control" name="confirm_password" id="cpassword"    />

                        </div>

                        <div class="form-group">
                            <label>Slika : </label>
                            <input type="file" name="picture"/>

                        </div>
                    <input type="submit" value="Create" class="btn btn-primary">
                </form>

            </table>
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
