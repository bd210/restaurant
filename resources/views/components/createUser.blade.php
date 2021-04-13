
<div class="col-lg-8 mt-5 mt-lg-0">
    <h1>CREATE USER</h1>
    <form action="{{route('createUser')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>First Name : </label>
            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name"  />

        </div>
        <div class="form-group">
            <label>Last Name : </label>
            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name"  />

        </div>
        <div class="form-group">
            <label>Email : </label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" data-rule="minlen:4"  />

        </div>
        <div class="form-group">
            <label>Password : </label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" data-rule="minlen:4"  />

        </div>
        <div class="form-group">
            <label>Confirm Password : </label>
            <input type="password" class="form-control" name="confirm_password" id="cpassword" placeholder="Confirm Password" data-rule="minlen:4"  />

        </div>

        <div class="form-group">
            <label>Slika : </label>
            <input type="file" name="picture"/>

        </div>
        <input type="submit" value="Create" class="btn-primary" />
    </form>
    @empty(!session('uspesnaRegistracija'))
        <div class="alert alert-success">    {{ session('uspesnaRegistracija') }}</div>
    @endempty
    @empty(!session('neuspesnaRegistracija'))
        <div class="alert alert-danger">   {{ session('neuspesnaRegistracija') }}</div>
    @endempty

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
