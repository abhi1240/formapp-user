<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use session;

class ApiAuth
{

     public function handle(Request $request, Closure $next)
     {
       if (session()->get('api_token') != '' ) {
         if ((session()->get('rights')) == '0'  ) {
           return $next($request);
         } else {
           $request->session()->flush();
           return redirect('/login')->with('warning','Unauthorised Error');
         }
      }else {
        $request->session()->flush();
        return redirect('/login')->with('warning','Unauthorised Error');
      }
     }
}
