<?php

namespace Colegio\Http\Middleware;
use Closure;

//added
use Illuminate\Contracts\Auth\Guard;
use Session;

class Profesor
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        
        switch ($this->auth->user()->role) {
            case 'administrador':
                return redirect()->to('administrador');
                break;
            case 'alumno':
                return redirect()->to('alumno');
                break;
            case 'padre':
                return redirect()->to('padre');
                break;
            case 'profesor':
                //return redirect()->to('homes/profesor');
                break;
            default:
                return redirect()->to('/');
                break;
        }

        return $next($request);
    }
}
