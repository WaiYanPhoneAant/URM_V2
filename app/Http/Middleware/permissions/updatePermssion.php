<?php

namespace App\Http\Middleware\permissions;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class updatePermssion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $feature,$authCheck="")
    {
        if ($authCheck == true) {
            $id = $request['id'];
            if ($id == Auth::user()->id || updatePer($feature)) {
                return $next($request);
            } else {
               return back();
            }
        } elseif (updatePer($feature)) {
            return $next($request);
        } else {
           return back();
        }
    }
}
