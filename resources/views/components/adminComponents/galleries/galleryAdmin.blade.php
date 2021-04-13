
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>Gallery <b>Management</b></h2>
                    </div>
                    <div class="col-xs-7">
                        <a href="{{ route('CreateFormGallery') }}" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Add New Gallery</span></a>

                    </div>
                </div>
            </div>
            @isset($galleries)
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>CreatedAt</th>
                        <th>ModifiedAt</th>
                        <th>Picture</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($galleries as $gallery)
                        <tr>
                            <td>{{ $number++ }}</td>
                            <td> {{ $gallery->createdAt }}</td>
                            <td> {{  $gallery->modifiedAt}}</td>
                            <td>
                                <img src="{{ asset('/'.$gallery->src) }}" alt="{{ $gallery->alt }}"  style="width: 300px;height: 300px;" />
                            </td>

                            <td>
                                <a href="{{ route('ShowGallery', ['id'=> $gallery->galleryID ]) }}" class="settings" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                                <a href="{{ route('DeleteGallery', ['id' => $gallery->galleryID]) }}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            @else
                <div class="alert alert-danger">NO ENTITY</div>
            @endisset




          <p>Showing <b> 5 </b> out of <b> {{ $info[0]->countID }}</b> entries</p>
            <a href="#" > {{ $galleries->links() }}</a>

  </div>
    </div>
</div>

