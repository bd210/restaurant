<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>MenuType <b>Create</b></h2>
                    </div>

                </div>
            </div>
            <table class="table table-striped table-hover">

                <form action="{{ route('CreateMenuType') }}" method="POST">
                    @csrf
                    <div class="form-controlr">
                        <label>Type : </label>
                        <input type="text" name="type" class="form form-control"/> <br/>
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
