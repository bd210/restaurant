
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>Role <b>Management</b></h2>
                    </div>
                    <div class="col-xs-7">
                        <a href="{{route('CreateForm')}}" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Add New Role</span></a>

                    </div>
                </div>
            </div>
            @isset($roles)
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>CreatedAt</th>
                    <th>ModifiedAt</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                <tr>
                <td>{{  $number++  }} </td>
                <td> {{ $role->created_at }}</td>
                <td> {{ $role->modified_at }}</td>
                <td> {{ $role->name }}</td>
                <td>
                    <a href="{{route('ShowRole', ['id'=> $role->id])}}" class="settings" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                    <a href="{{route('DeleteRole', ['id'=>$role->id])}}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a></td>
                </tr>
                @endforeach

              </tbody>
            </table>
            @else
                <div class="alert alert-danger">NO ENTITY</div>

            @endisset

        </div>
    </div>
</div>
