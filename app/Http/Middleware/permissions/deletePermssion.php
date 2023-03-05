<?php

namespace App\Http\Middleware\permissions;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class deletePermssion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $feature,$authCheck='')
    {

        if ($authCheck == true) {
            $id = $request->route('id');
            if ($id == Auth::user()->id || deletePer($feature)) {
                return $next($request);
            } else {
                return back();
            }
        } elseif (deletePer($feature)) {
            return $next($request);
        } else {
            return back();
        }

    }
}
