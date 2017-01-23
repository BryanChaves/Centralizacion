<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Session;
class Administrator
{
    protected $auth;
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    
    public function handle($request, Closure $next)
    {   
    	$rol= $this->auth->user()->getRol();
        if ($rol=="Administrador") {	 
        
        }
        elseif($rol=="Institución") {
        	
            return view('institution');
        }else{
        	
            return view('agent');   
        }
        return $next($request);
    }
}
