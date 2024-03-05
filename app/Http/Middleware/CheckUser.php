<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role()=='0')
        {
            return $next($request);
        }
        else
        {
            return redirect('/login-register')->with('flash_message_error','Please Login to Access...');
        }
    }
}


