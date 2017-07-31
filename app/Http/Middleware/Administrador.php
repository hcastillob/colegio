<?php

namespace Colegio\Http\Middleware;

use Closure;

//added
use Illuminate\Contracts\Auth\Guard;
use Session;

class Administrador
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
                //return redirect()->to('homes/administrador');
                break;
            case 'alumno':
                return redirect()->to('homes/alumno');
                break;
            case 'padre':
                return redirect()->to('homes/padre');
                break;
            case 'profesor':
                return redirect()->to('homes/profesor');
                break;
            default:
                return redirect()->to('/');
                break;
        }

        return $next($request);
    }
}
