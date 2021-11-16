<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $path = $request->path();

        // && (Session::get('user')) 

        // if( ($path == 'admin/login') && (Session::get('user'))  ) {
        //     return redirect('admin/');
        // } 

        // else if ( $path != 'admin/login'  && !Session::get('user') ) {
        //     return redirect('admin/login');
        // }

        return $next($request);
    }
}
