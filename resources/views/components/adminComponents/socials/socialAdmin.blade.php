
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>Social <b>Management</b></h2>
                    </div>
                    <div class="col-xs-7">
                        <a href="{{route('CreateFormSocial')}}" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Add New Social</span></a>

                    </div>
                </div>
            </div>
            @isset($socials)
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>CreatedAt</th>
                    <th>ModifiedAt</th>
                    <th>Name</th>
                    <th>Url</th>

                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($socials as $social)
                    <tr>
                        <td>{{  $number++  }} </td>
                        <td> {{ $social->created_at}} </td>
                        <td> {{ $social->modified_at }}</td>
                        <td> {{ $social->name }}</td>
                        <td>{{ $social->url }}</td>
                        <td>
                            <a href="{{ route('ShowSocial', ['id' => $social->id]) }}" class="settings" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                            <a href="{{route('DeleteSocial', ['id'=> $social->id ])}}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a></td>
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


