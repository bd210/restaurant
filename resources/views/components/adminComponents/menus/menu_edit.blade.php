<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>Menu <b>Edit</b></h2>
                    </div>

                </div>
            </div>
            @isset($oneMenu)
                <table class="table table-striped table-hover">

                    <form action="{{route('EditMenu', ['id'=> $oneMenu->menuID])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-controlr">
                            <label>Name : </label>
                            <input type="text" name="name" class="form form-control" value="{{$oneMenu->name}}"/> <br/>
                        </div>
                        <div class="form-controlr">
                            <label>Description : </label>
                            <input type="text" name="description" class="form form-control" value="{{$oneMenu->description}}"/> <br/>
                        </div>
                        <div class="form-controlr">
                            <label>Price : </label>
                            <input type="text" name="price" class="form form-control" value="{{$oneMenu->price}}"/> <br/>
                        </div>
                        <div class="form-controlr">
                            <label>MenuType : </label>
                            <select name="menutype">
                            @foreach($menutypes as $menutype)
                    <option value="{{ $menutype->id }}" > {{ $menutype->type }}</option>
                             @endforeach
                            </select> <br/>
                        </div> <br/>
                        <div class="form-controlr">
                            <label>Picture : </label>
                            <img src="{{ asset('/'.$oneMenu->src) }}" alt="{{ $oneMenu->alt }}"  style="width: 200px;height: 200px;"/><br/>
                            <input type="file"  name="picture" class="form form-control">
                            <input type="hidden" name="old_picture" value="{{ $oneMenu->id_picture }}">
                        </div>




                        <input type="submit" value="Edit" class="btn btn-primary">
                    </form>

                </table>
            @else
                <div class="alert alert-danger">MENU DOES NOT EXIST</div>
            @endisset


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
