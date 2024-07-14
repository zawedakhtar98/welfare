<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Islogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->has('email') && session()->has('role1') && session('role')=='normal user'){
            return redirect()->route('index');
        }
        abort(403);
    }
}
