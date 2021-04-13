
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>Detail <b>Management</b></h2>
                    </div>

                </div>
            </div>
            @isset($detail)
            <table class="table table-striped table-hover">
                <thead>
                <tr>

                    <th>CreatedAd</th>
                    <th>ModifiedAt</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Open hours</th>

                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                    <tr>

                        <td> {{ $detail->created_at }}</td>
                        <td> {{ $detail->modified_at }}</td>
                        <td>{{ $detail->name }}</td>
                        <td> {{ $detail->location }}</td>
                        <td>{{ $detail->email }}</td>
                        <td>{{ $detail->phone }}</td>
                        <td>{{ $detail->open_hours }}</td>

                        <td>
                            <a href="{{route('ShowDetail')}}" class="settings" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                        </td>
                    </tr>
                 </tbody>
            </table>


            @else
        <div class="alert alert-danger">NO ENTITY</div>
            @endisset

        </div>





    </div>
</div>

