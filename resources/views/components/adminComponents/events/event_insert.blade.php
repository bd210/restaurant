<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>Event <b>Create</b></h2>
                    </div>

                </div>
            </div>
            <table class="table table-striped table-hover">

                <form action="{{ route('CreateEvent') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-controlr">
                        <label>Title : </label>
                        <input type="text" name="title" class="form form-control"/> <br/>
                    </div>
                    <div class="form-controlr">
                        <label>Description : </label>
                        <textarea name="description" class="form form-control" style="width: 800px;height: 100px;"> </textarea><br/>
                    </div>
                    <div class="form-controlr">
                        <label>Price : </label>
                        <input type="text" name="price" class="form form-control"/> <br/>
                    </div>
                    <div class="form-controlr">
                        <label>Picture : </label>
                        <input type="file" name="picture" class="form form-control"/> <br/>
                    </div>

                    <input type="submit" value="Create" class="btn btn-primary">
                </form>

            </table>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
