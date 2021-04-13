@if(session()->has('user'))
    <div id="userDataEdit" style="color: #8a6d3b; ">
            @isset($oneUser)
                <h1>EDIT YOUR DATA</h1>
                <table class="table table-striped table-hover">

                    <form action="{{ route('EditData', ['id' => $oneUser->userID]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label> <b>First Name :</b> </label>
                            <input type="text" class="form-text" name="first_name" value="{{$oneUser->first_name}}"   />

                        </div>
                        <div class="form-group">
                            <label><b>Last Name : </b></label>
                            <input type="text" class="form-text" name="last_name" value="{{$oneUser->last_name }}"    />

                        </div>
                        <div class="form-group">
                            <label><b>Email : </b></label>
                            <input type="text" class="form-text" name="email" value="{{$oneUser->email}}"     />

                        </div>
                          <div class="form-group">
                            <label><b> Slika : </b></label>
                            @if($oneUser->src != null)
                                <img src="{{ asset('/'.$oneUser->src) }}" alt="{{ $oneUser->alt }}" style="width: 200px;height: 200px;"  />
                            @else
                                <img src="{{ asset('/assets/img/users/default.png') }}" alt="{{ $oneUser->alt }}" style="width: 200px;height: 200px;"  />
                            @endif
                            <input type="file" name="picture"  />
                            <input type="hidden" name="old_picture" value="{{ $oneUser->src }}">

                        </div>

                        <a href="{{ route('ShowReesetPassword', ['id' => $oneUser->userID]) }}"><b style="font-size: 25px;" >UPDATE PASSWORD</b></a><br/><br/>
                        <input type="submit" value="Edit" class="btn btn-primary" >
                    </form>

                </table>

              @endisset

                @include('components.resetPassword')



                @empty(!session('uspesnaIzmenaPodataka'))
                    <div class="alert alert-success">    {{ session('uspesnaIzmenaPodataka') }}</div>
                @endempty
                @empty(!session('neuspesnaIzmenaPodataka'))
                    <div class="alert alert-danger">   {{ session('neuspesnaIzmenaPodataka') }}</div>
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
@else
    <div class="alert alert-danger">YOU ARE NOT LOGGED IN</div>
@endif
