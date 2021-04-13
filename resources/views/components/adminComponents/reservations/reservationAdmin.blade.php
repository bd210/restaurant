<!-- $reservations -->

<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>Reservation <b>Management</b></h2>
                    </div>
                    <div class="col-xs-7">
                        <a href="{{ route('CreateFormReservation') }}" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Add New Reservation</span></a>

                    </div>
                </div>
            </div>
            @isset($reservations)
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>CreatedAt</th>
                    <th>ModifiedAt</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Number of people</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <td> {{  $number++  }}</td>
                        <td>{{ $reservation->created_at }}</td>
                        <td> {{ $reservation->modified_at }}</td>
                        <td> {{ $reservation->name }}</td>
                        <td>{{ $reservation->email }}</td>
                        <td>{{ $reservation->phone }}</td>
                        <td>{{ $reservation->date }}</td>
                        <td>{{ $reservation->number_of_people }}</td>
                        <td>{{ $reservation->message }}</td>
                        <td>
                            <a href="{{route('ShowReservation',['id'=>$reservation->id])}}" class="settings" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                            <a href="{{ route('DeleteReservation', ['id'=>$reservation->id]) }}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a></td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            @else
                <div class="alert alert-danger">NO ENTITY</div>
            @endisset
            <p> Showing <b> 10</b> out of <b> {{ $info[0]->countID }}</b> entries</p>
            <a href="#"> {{ $reservations->links() }}</a>
        </div>
    </div>
</div>

