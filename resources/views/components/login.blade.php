
@if(!session()->has('user'))
<div class="container" >

    <form  action="{{ route('login') }}" method="POST" >
        @csrf
        <div class="login-wrap" >
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_profile"></i></span>
                <input type="text" class="form-control-lg" placeholder="Email" name="email" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control-lg" name="password" placeholder="Password">
            </div>
           <br/>
            <button class="btn btn-primary btn-lg" type="submit">Login</button>

        </div>
    </form>

        @empty(!session('neuspesnoLogovanje'))
            <div class="alert alert-danger" style="width: 250px;"> {{ session('neuspesnoLogovanje') }}</div>
        @endempty


</div>

@endif
