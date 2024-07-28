<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkAdminMemberLogin
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
        if(!session()->has('role1') && !session()->has('role2')){   
            return  redirect()->route('signin')->with('error',"Your session has expired!");
        }
        else if(session('role1')=='normal user' && session()->has('role1')){
            abort(403);
        }
        return $next($request);
    }
}
