<?php

namespace App\Http\Middleware\permissions;

use Closure;
use Illuminate\Http\Request;

class createPermssion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$feature)
    {
        if(createPer($feature)){
            return $next($request);
        }else{
            return back();
        }

    }
}
