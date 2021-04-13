
@isset($userProfile)

    <div style="color: #8a6d3b;">
<label style="color: white;">Picture : </label> <br/>

        @if($userProfile->src != null)
            <img src="{{ asset('/'.$userProfile->src) }}" alt="{{ $userProfile->alt }}" style="width: 200px; height: 200px;"  />
        @else
            <img src="{{ asset('/assets/img/users/default.png') }}" alt="{{ $userProfile->alt }}" style="width: 200px; height: 200px;"    />
        @endif
<br/>
<label style="color: white;"> Name : </label> <p> {{ $userProfile->first_name . " " . $userProfile->last_name }}</p>
<label style="color: white;">Email : </label> <p> {{ $userProfile->email }}</p>
<label style="color: white;">Role : </label> <p> {{ $userProfile->name }}</p>

    </div>
@else
<div class="alert-danger alert"> USER DOES NOT EXIST</div>
@endisset
