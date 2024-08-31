<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AlreadySignin
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
        // print_r([session('role1'),session('role2'),session('fname'),session('user_id')]);
        if(session('role')=='normal user' && session('role')!='member' && session()->has('role')){                   
            return redirect()->route('index');
        }
        return $next($request);
    }
}
