<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Session;
use Closure;

class Institution
{
    protected $auth;
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    public function handle($request, Closure $next)
    {
        $rol= $this->auth->user()->getRol();
        if ($rol=="Institución") {
                 
        }else{
           
            return view('agent');   
        }
        return $next($request);
    }
}
