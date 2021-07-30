<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(\Session::has('token')) {
            return redirect()->back();
        }
        return $next($request);
    }
}
