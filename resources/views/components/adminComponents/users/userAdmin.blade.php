@isset($userSearch)
    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-xs-5">
                            <h2>User <b>Management</b></h2>
                        </div>
                        <div class="col-xs-7">
                            <a href="{{ route('CreateFormUser') }}" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>

                        </div>
                    </div>
                </div>


                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>CreatedAt</th>
                            <th>ModifiedAt</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Picture</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($userSearch as $user)
                            <tr>
                                <td>
                                    {{  $number++  }}
                                </td>
                                <td>  {{ date("F jS Y , H:i:s", strtotime($user->createdAt)) }} </td>
                                <td>
                                    @isset($user->modifiedAt)
                                        {{ date("F jS Y , H:i:s", strtotime($user->modifiedAt)) }}
                                    @endisset
                                </td>
                                <td> {{ $user->first_name . " " . $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ md5($user->password) }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    @if($user->src != null)
                                        <img src="{{ asset('/'.$user->src) }}" alt="{{ $user->alt }}" style="width: 50px;height: 50px;"  />
                                    @else
                                        <img src="{{ asset('/assets/img/users/default.png') }}" alt="{{ $user->alt }}" style="width: 50px;height: 50px;"  />
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('ShowUser', ['id'=> $user->userID]) }}" class="settings" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                                    <a href="{{ route('DeleteUser', ['id' => $user->userID]) }}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>


            </div>
        </div>
    </div>
@else
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>User <b>Management</b></h2>
                    </div>
                    <div class="col-xs-7">
                        <a href="{{ route('CreateFormUser') }}" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>

                    </div>
                </div>
            </div>

            @isset($users)
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>CreatedAt</th>
                    <th>ModifiedAt</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Picture</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($users as $user)
                    <tr>
                        <td>
                           {{  $number++  }}
                        </td>
                        <td>  {{ date("F jS Y , H:i:s", strtotime($user->createdAt)) }} </td>
                        <td>
                            @isset($user->modifiedAt)
                                {{ date("F jS Y , H:i:s", strtotime($user->modifiedAt)) }}
                            @endisset
                        </td>
                        <td> {{ $user->first_name . " " . $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ md5($user->password) }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                            @if($user->src != null)
                                <img src="{{ asset('/'.$user->src) }}" alt="{{ $user->alt }}" style="width: 50px;height: 50px;"  />
                            @else
                                <img src="{{ asset('/assets/img/users/default.png') }}" alt="{{ $user->alt }}" style="width: 50px;height: 50px;"  />
                        @endif
                        <td>
                            <a href="{{ route('ShowUser', ['id'=> $user->userID]) }}" class="settings" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                            <a href="{{ route('DeleteUser', ['id' => $user->userID]) }}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a></td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            @else
                <div class="alert alert-danger">NO ENTITY</div>
            @endisset
            <p> Showing <b> 10</b> out of <b> {{ $info[0]->countID }}</b> entries</p>
            <a href="#"> {{ $users->links() }}</a>

        </div>
    </div>
</div>

@endisset
