<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Session;
class Agent
{
    protected $auth;
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    public function handle($request, Closure $next)
    {
        $rol= $this->auth->user()->getRol();
        if ($rol=="Gestor") {	 
        	
        }
        return $next($request);
    }
}
