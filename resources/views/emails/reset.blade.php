<h1>HELLO {{ $user->first_name }}</h1>

<p> Please click on link for reset password <a href="{{ route('ResetPasswordFront'.'/'. $user->email .'/'. $user->code) }}"></a> </p>
