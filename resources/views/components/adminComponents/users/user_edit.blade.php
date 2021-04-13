
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>User <b>Edit</b></h2>
                    </div>

                </div>
            </div>
            @isset($oneUser)
                <table class="table table-striped table-hover">

                    <form action="{{ route('EditUser', ['id' => $oneUser->userID]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>First Name : </label>
                            <input type="text" class="form-control" name="first_name" value="{{$oneUser->first_name}}"   />

                        </div>
                        <div class="form-group">
                            <label>Last Name : </label>
                            <input type="text" class="form-control" name="last_name" value="{{$oneUser->last_name }}"    />

                        </div>
                        <div class="form-group">
                            <label>Email : </label>
                            <input type="text" class="form-control" name="email" value="{{$oneUser->email}}"     />

                        </div>
                        <div class="form-group">
                            <label>Role : </label>
                            <select name="role">
                                <option value="{{$oneUser->roleID}}"> {{$oneUser->name}}</option>
                            @foreach($roles as $role)

                                    <option value="{{$role->id}}"> {{$role->name}}</option>
                                @endforeach
                            </select>

                        </div>


                        <div class="form-group">
                            <label>Slika : </label>
                            @if($oneUser->src != null)
                            <img src="{{ asset('/'.$oneUser->src) }}" alt="{{ $oneUser->alt }}" style="width: 200px;height: 200px;"  />
                            @else
                                <img src="{{ asset('/assets/img/users/default.png') }}" alt="{{ $oneUser->alt }}" style="width: 200px;height: 200px;"  />
                            @endif
                            <input type="file" name="picture"  />
                            <input type="hidden" name="old_picture" value="{{ $oneUser->src }}">

                        </div>
                        <input type="submit" value="Edit" class="btn btn-primary">
                    </form>

                </table>
                    <h1>UPDATE PASSWORD</h1>
                <form action="{{ route('ResetPassword', ['id' => $oneUser->userID]) }}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label><b> New Password : </b> </label>
                        <input type="password" class="form-text" name="password"    />

                    </div>
                    <div class="form-group">
                        <label> <b> Confirm New Password : </b></label>
                        <input type="password" class="form-text" name="confirm_password"      />

                    </div>
                    <input type="submit" value="Edit" class="btn btn-primary">

                </form>
            @else
                <div class="alert alert-danger">USER DOES NOT EXIST</div>
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
