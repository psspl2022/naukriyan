<?php

namespace App\Http\Middleware;

use Auth;
use Illuminate\Http\Request;
use Session;
use DB;

use Closure;

class Jobseeker
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //$ip=$request->ip();
        if (session()->has('user')) {
            $usertype = Session::get('user')['user_type'];
            if ($usertype == 'Jobseeker') {
                return $next($request);
            }
        }

        return response()->json(['message' => 'Please login first']);
    }
}
