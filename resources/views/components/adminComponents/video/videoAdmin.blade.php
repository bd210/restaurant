
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>Video <b>Management</b></h2>
                    </div>

                </div>
            </div>
            @isset($getVideo)
                <table class="table table-striped table-hover"  >
                    <thead>
                    <tr>
                        <th>CreatedAt</th>
                        <th>ModifiedAt</th>
                        <th>Video</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td> {{$getVideo->created_at}}</td>
                        <td> {{$getVideo->modified_at}}</td>
                        <td>   {{ $getVideo->link }} </td>


                        <td>
                            <a href="{{route('ShowVideo')}}" class="settings" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
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

