<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckAuthentication
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
        if(Auth::guard('web')->check()==false){
            return redirect()->route('auth.login');
        }else{
            return $next($request);
        }

        if(Auth::guard('student')->check()==false){
            return redirect()->route('student.login');
        }else{
            return $next($request);
        }
    }
}
