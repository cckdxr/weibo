<?php

namespace App\Http\Middleware;

use Closure;

class islogin
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
         if(!session('user')){
            return redirect('admin/login')->with('errors','请登录小伙子');
        }
        return $next($request);
    }
}
