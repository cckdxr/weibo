<?php

namespace App\Http\Middleware;

use Closure;

class homelog
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
        if(session('homeFlag')){
            return $next($request);
        }
        return redirect('/home/index');
    }
}
