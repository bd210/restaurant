
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>MenuType <b>Management</b></h2>
                    </div>
                    <div class="col-xs-7">
                        <a href="{{ route('CreateFormMenuType') }}" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Add New MenuType</span></a>

                    </div>
                </div>
            </div>
            @isset($menutypes)
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>CreatedAt</th>
                    <th>ModifiedAt</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($menutypes as $menutype)
                    <tr>
                        <td> {{ $number++ }} </td>
                        <td> {{ $menutype->created_at }} </td>
                        <td> {{ $menutype->modified_at }}</td>
                        <td> {{ $menutype->type }}</td>

                        <td>
                            <a href="{{ route('ShowMenuType', ['id' => $menutype->id]) }}" class="settings" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                            <a href="{{ route('DeleteMenuType', ['id' => $menutype->id ]) }}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a></td>
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

