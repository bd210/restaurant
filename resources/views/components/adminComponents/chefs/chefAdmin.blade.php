
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>Chef <b>Management</b></h2>
                    </div>
                    <div class="col-xs-7">
                        <a href="{{ route('CreateFormChef') }}" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Add New Chef</span></a>

                    </div>
                </div>
            </div>
            @isset($chefs)
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>CreatedAt</th>
                        <th>ModifiedAt</th>
                        <th>Name</th>
                        <th>Workplace</th>
                        <th>Picture</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($chefs as $chef)
                        <tr>
                            <td> {{ $number++ }} </td>
                            <td> {{ $chef->created }}</td>
                            <td> {{ $chef->modified}}</td>
                            <td> {{ $chef->name }}</td>
                            <td> {{ $chef->workplace }}</td>
                            <td>
                                <img src="{{asset('/'.$chef->src)}}"  alt="{{$chef->alt}}" style="width: 50px;height: 50px;"/>
                            </td>

                            <td>
                                <a href="{{ route('ShowChef', ['id' => $chef->chefID]) }}" class="settings" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                                <a href="{{route('DeleteChef', ['id' => $chef->chefID])}}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a></td>
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

