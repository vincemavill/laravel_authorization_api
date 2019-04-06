<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use DB;

class basic_auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {       
         


            $token = $request->header('Authorization');
        
            
            $result = DB::table('user_tble')
                ->select('*')
                ->where( DB::raw('BINARY `token`'), $token)
                ->get();

            if(count($result)){
                return $next($request);
            } else {
                return redirect('/not_login');
            }

        
            
        

       
    }
}
