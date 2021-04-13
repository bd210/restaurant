
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>Testimonials <b>Management</b></h2>
                    </div>
                    <div class="col-xs-7">
                        <a href="{{ route('CreateFormTestimonial') }}" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Add New Testimonial</span></a>

                    </div>
                </div>
            </div>
            @isset($testimonials)
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>CreatedAt</th>
                    <th>ModifiedAt</th>
                    <th>Content</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($testimonials as $testimonial)
                    <tr>
                        <td> {{  $number++  }}</td>
                        <td> {{  $testimonial->createdAt }} </td>
                        <td> {{ $testimonial->modifiedAt }}</td>
                        <td> {{ $testimonial->content }}</td>

                        <td> {{ $testimonial->first_name . " " . $testimonial->last_name }}</td>
                        <td>{{ $testimonial->email }} </td>
                        <td>
                            <a href="{{ route('ShowTestimonial', ['id'=> $testimonial->id]) }}" class="settings" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                            <a href="{{route('DeleteTestimonial', ['id' => $testimonial->id])}}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a></td>

                    </tr>
                @endforeach

                </tbody>
            </table>
            @else
                <div class="alert alert-danger">NO ENTITY</div>

            @endisset

            <p> Showing <b> 10</b> out of <b> {{ $info[0]->countID }}</b> entries</p>
            <a href="#"> {{ $testimonials->links() }}</a>
        </div>
    </div>
</div>

