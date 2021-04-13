
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>Event <b>Management</b></h2>
                    </div>
                    <div class="col-xs-7">
                        <a href="{{ route('CreateFormEvent') }}" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Add New Event</span></a>

                    </div>
                </div>
            </div>
            @isset($events)
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>CreatedAt</th>
                        <th>ModifiedAt</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Picture</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td> {{ $number++ }} </td>
                            <td> {{ $event->created }}</td>
                            <td> {{ $event->modified }}</td>
                            <td> {{ $event->title }}</td>
                            <td> {{ $event->description }}</td>
                            <td> {{ $event->price }} $</td>
                            <td>
                            <img src="{{asset('/'.$event->src)}}" alt="{{ $event->alt }}" style="width: 50px;height: 50px;" />
                            </td>
                            <td>
                                <a href="{{ route('ShowEvent', ['id' => $event->eventID]) }}" class="settings" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                                <a href="{{ route('DeleteEvent', ['id'=> $event->eventID]) }}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            @else
                <div class="alert alert-danger">NO ENTITY</div>
            @endisset
            <p> Showing <b> 10</b> out of <b> {{ $info[0]->countID }}</b> entries</p>
            <a href="#"> {{ $events->links() }}</a>
        </div>
    </div>
</div>

