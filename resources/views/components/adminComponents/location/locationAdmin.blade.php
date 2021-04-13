
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>Location <b>Management</b></h2>
                    </div>

                </div>
            </div>
            @isset($getLocation)
                <table class="table table-striped table-hover" >
                    <thead>
                    <tr>
                        <th>CreatedAt</th>
                        <th>ModifiedAt</th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td> {{$getLocation->created_at}}</td>
                        <td> {{$getLocation->modified_at}}</td>
                        <td>  {{ $getLocation->location }}  </td>


                        <td>
                            <a href="{{route('ShowLocation')}}" class="settings" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
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

