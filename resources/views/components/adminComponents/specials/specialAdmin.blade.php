
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>Special <b>Management</b></h2>
                    </div>
                    <div class="col-xs-7">
                        <a href="{{ route('CreateFormSpecial') }}" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Add New Special</span></a>

                    </div>
                </div>
            </div>
            @isset($specials)
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>CreatedAt</th>
                        <th>ModifiedAt</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Picture</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($specials as $special)
                        <tr>
                            <td> {{ $number++ }} </td>
                            <td> {{ $special->created }}</td>
                            <td> {{ $special->modified }}</td>
                            <td> {{ $special->name }}</td>
                            <td> {{ $special->title }}</td>
                            <td> {{ $special->description }}</td>
                            <td>
                                <img src="{{ asset('/'.$special->src) }}" alt="{{ $special->alt }}" style="width: 50px;height: 50px;" />
                            </td>

                            <td>
                                <a href="{{ route('ShowSpecial', ['id' => $special->specialID ]) }}" class="settings" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                                <a href="{{ route('DeleteSpecial', ['id'=>$special->specialID ]) }}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            @else
                <div class="alert alert-danger">NO ENTITY</div>
            @endisset
            <p> Showing <b> 10</b> out of <b> {{ $info[0]->countID }}</b> entries</p>
            <a href="#"> {{ $specials->links() }}</a>
        </div>
    </div>
</div>

