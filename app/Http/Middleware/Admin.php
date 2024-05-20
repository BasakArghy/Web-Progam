<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Session;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $data= array();
        if(Session::has('loginId')){
            $data =User::Where('id','=',Session::get('loginId'))->first();
            if($data->type=="admin"){
                return $next($request);
            }
            else{ abort(403);}
        }
        else{ abort(403);}
     
        
    }
}
