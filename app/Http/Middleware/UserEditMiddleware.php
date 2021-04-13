<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserEditMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if($request->session()->has('user') && $request->session()->get('user')->roleName == 'user')

        return $next($request);

        else
            return  redirect('/')->with('neuspesno', 'YOU DO NOT HAVE ACCESS TO THIS PAGE!');
    }
}
