<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Backend\IndexController;
use Closure;
use Illuminate\Http\Request;
class CheckUserAdmin
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
        if (auth()->user()->role ==1){
            return $next($request);
        } else{
            return redirect()->route('pages.index');
        }
    }
}
