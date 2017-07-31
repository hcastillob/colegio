<?php

namespace Colegio\Http\Controllers;

use Colegio\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('homes/administrador');        
    }

    public function indexAlumno()
    {
        return view('homes/alumno');
        //return 'pagina de alumno';      
    }

    public function indexPadre()
    {
        return view('homes/padre');
        //return 'pagina de padre';              
    }

    public function indexProfesor()
    {
        return view('homes/profesor');        
        //return 'pagina de profesor';
    }
}
