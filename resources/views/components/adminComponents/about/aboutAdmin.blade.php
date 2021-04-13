
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>About <b>Management</b></h2>
                    </div>

                </div>
            </div>
            @isset($aboutInfo)
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>CreatedAt</th>
                        <th>ModifiedAt</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Picture</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td> {{$aboutInfo->createdAt}}</td>
                        <td> {{$aboutInfo->modifiedAt}}</td>
                        <td> {{ $aboutInfo->title }}</td>
                        <td>{{ $aboutInfo->description }}</td>
                        <td>
                          <img src="{{ asset('/'.$aboutInfo->src) }}" alt="{{ $aboutInfo->alt }}"  style="width: 200px;height: 200px;"/>

                        </td>
                          <td>
                            <a href="{{route('ShowAbout')}}" class="settings" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>


            @else
                <div class="alert alert-danger">
                    NO ENTITY  </div>
            @endisset

        </div>





    </div>
</div>

