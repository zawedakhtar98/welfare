<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsActive
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
        // if($request->is_active==18){
        //     echo "testesfsdfsdfsdfsfsdf ",$request->is_active, "==========";die;
        //     // return redirect()->route('check-middleware')->with('success',"You are active user");
        // }
        echo "global middleware calling [we dont have specify in the routing just we have to load middleware class in Kernel.php file in app/http]";
        // echo "test test test";
        return $next($request);
    }
}
