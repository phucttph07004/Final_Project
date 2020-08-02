<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRoleAdmin
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
        if(Auth::check()){
            if(Auth::User()->role !== config('common.role.admin') && Auth::User()->role !== config('common.role.teaching_assitant') && Auth::User()->role !== config('common.role.teacher') && Auth::User()->role !== config('common.role.branch_manager') && Auth::User()->role !== config('common.role.general_manager')){
              return redirect()->route('home.index');
            }else{
                return $next($request);
            }
        }else{
            return redirect('admin/login');
        }
    }
}
