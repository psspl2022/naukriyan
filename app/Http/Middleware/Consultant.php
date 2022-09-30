<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;

use Closure;
use Illuminate\Support\Facades\Session;

class Consultant
{

    public function handle($request, Closure $next)
    {
        $usertype = Session::get('user')['id'];

        if ($usertype) {
            return $next($request);
        }
        return redirect('/');
    }
}