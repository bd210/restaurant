
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>Menu <b>Management</b></h2>
                    </div>
                    <div class="col-xs-7">
                        <a href="{{ route('CreateFormMenu') }}" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Add New Menu</span></a>

                    </div>
                </div>
            </div>
            @isset($menus)
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>CreatedAt</th>
                    <th>ModifiedAt</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>MenuTypes</th>
                    <th>Picture</th>
                    <th>By User</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($menus as $menu)
                    <tr>
                        <td>{{ $number++ }} </td>
                        <td> {{ $menu->createdAt }} </td>
                        <td> {{ $menu->modifiedAt }} </td>
                        <td> {{ $menu->name }}</td>
                        <td>{{ $menu->description }}</td>
                        <td> {{ $menu->price }} $</td>
                        <td>{{ $menu->type }}</td>
                        <td>
                            <img src="{{ asset('/'.$menu->src) }}" alt="{{$menu->alt}}" style="width: 50px;height: 50px;"/>
                        </td>
                        <td>{{ $menu->first_name . " " . $menu->last_name }}</td>
                        <td>
                            <a href="{{ route('ShowMenu', ['id' => $menu->menuID]) }}" class="settings" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                            <a href="{{ route('DeleteMenu', ['id' => $menu->menuID]) }}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a></td>
                    </tr>

                @endforeach

                </tbody>
            </table>
            @else
            <div class="alert alert-danger">NO ENTITY</div>
            @endisset
            <p> Showing <b> 10</b> out of <b> {{ $info[0]->countID }}</b> entries</p>
            <a href="#"> {{ $menus->links() }}</a>
        </div>
    </div>
</div>

