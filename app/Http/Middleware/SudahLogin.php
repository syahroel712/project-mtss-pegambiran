<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SudahLogin
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
        if (session()->has('user_id')) {
            return $next($request);
        } else {
            return redirect("administrator")->with("message", "Anda Belum Login");;
        }
    }
}
