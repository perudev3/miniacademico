<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Closure;

class IsAdmin
{
    protected  $auth;
    public function __construct(Guard $auth){
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
       if ($this->auth->check()) {
            switch($this->auth->user()->idrol)
                {
                    case '1':
                       return Redirect::to('admin');
                       break;
                    case '2':
                       return Redirect::to('pagosalumno');
                       break;
                   default:
                       return Redirect::to('/');
                       break;
               }
        }
      
        return $next($request);
    }
}
