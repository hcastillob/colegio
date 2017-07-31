<?php

namespace Colegio\Http\Controllers;
use Illuminate\Http\Request;
use Colegio\Http\Requests;

//added
use Colegio\Models\Alumno;
use Colegio\Models\Persona;
use Colegio\User;
use Illuminate\Support\Facades\Redirect;
use Colegio\Http\Requests\AdminAlumnoFormRequest;
use Colegio\Http\Requests\AdminPersonaFormRequest;
use Colegio\Http\Requests\AdminUserFormRequest;
use DB;
use Carbon\Carbon;

class AdminAlumnoController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {
    	if ($request) {
    		$query = trim($request->get('searchText'));

    		$alumnos = DB::table('alumno as alu')->join('persona as pe','pe.dni','=','alu.dni')
    						->join('users as us','pe.dni','=','us.username')
    						->join('seccion as sec','sec.idseccion','=','alu.idseccion')
    						->join('grado as gr','alu.idgrado','=','gr.idgrado')
                            ->select('pe.dni',
                            	'alu.idalumno',
                                'pe.nombres',
                                'pe.apellido_paterno',
                                'pe.apellido_materno',
                                'pe.direccion',
                                'pe.sexo',
                                'gr.nombre as grado',
                                'sec.nombre as seccion')
                            ->where('pe.dni','LIKE','%'.$query.'%')
                            ->orWhere('pe.apellido_paterno','LIKE','%'.$query.'%')
                            ->where('us.role','=','alumno')
                            ->orderBy('alu.dni','ASC')->paginate(15);

    		return view('administrador.alumno.index',["alumnos"=>$alumnos, "searchText"=>$query]);
    	}
    }

    public function create()
    {
        $padres = DB::table('padre_apoderado as pad')
        			->join('persona as per','per.dni','=','pad.dni')
        			->join('users as usu','usu.username','=','per.dni')
        			->select('per.dni as dni_padre',
        				'per.nombres',
        				'per.apellido_paterno',
        				'per.apellido_materno')
        			->where('usu.status','=','1')->get();
        //$niveles = DB::table('nivel')->where('estado','=','1')->get();
        $grados = DB::table('grado')->where('estado','=','1')->get();
        $secciones = DB::table('seccion')->get();

        return view('administrador.alumno.create',["padres"=>$padres,"grados"=>$grados,"secciones"=>$secciones]);
    }

    public function store(AdminPersonaFormRequest $rqPersona, AdminAlumnoFormRequest $rqAlumno, AdminUserFormRequest $rqUser)
    {
        /*try{
        	DB::beginTransaction();*/

        	$persona = new Persona; //Se obtiene del modelo
	        $persona->dni = $rqPersona->get('dni');
	        $persona->nombres = $rqPersona->get('nombres');
	        $persona->apellido_paterno = $rqPersona->get('apellido_paterno');
	        $persona->apellido_materno = $rqPersona->get('apellido_materno');
	        $persona->direccion = $rqPersona->get('direccion');
	        $persona->fecha_nac = $rqPersona->get('fecha_nac');
	        $persona->email = $rqPersona->get('email');
	        $persona->telefono = $rqPersona->get('telefono');
	        $persona->sexo = $rqPersona->get('sexo');
	        $date = Carbon::now()->toDateString();
	        $age = $date - $persona->fecha_nac;
	        $persona->edad = $age;
	        $persona->save();

	        $alumno = new Alumno;
	        $alumno->idalumno = $rqAlumno->get('idalumno');
	        $alumno->dni = $rqAlumno->get('dni');	        
	        $alumno->idgrado = $rqAlumno->get('idgrado');
	        $alumno->idseccion = $rqAlumno->get('idseccion');
	        $alumno->estado = '1';
	        $alumno->idpadre = $rqAlumno->get('idpadre');
	        $alumno->save();

	        $user = new User;
	        $user->username = $rqUser->get('username');
	        $user->email = $rqUser->get('email');
	        $user->password = \Hash::make($rqUser->get('password'));
	        $user->role = 'alumno';
	        $user->status = '1';
	        $user->created_at = Carbon::now()->toDateString();
	        $user->updated_at = Carbon::now()->toDateString();
	        $user->save();

	        DB::commit();

	        return Redirect::to('administrador/administrador/alumno');

        /*} catch(\Exception $e){
    		DB::rollback();
        } */   
    }

    public function show($id)
    {
       	$persona = DB::table('persona as per')
       			    ->select('per.dni',
       				'per.nombres',
       				'per.apellido_paterno',
       				'per.apellido_materno',
       				'per.direccion',
       				'per.fecha_nac',
       				'per.email',
       				'per.telefono',
       				'per.sexo',
       				'per.edad')
       				->where('per.dni','=',$id)->first();
       	$alumno = DB::table('alumno as alu')
       				->join('seccion as sec','sec.idseccion','=','alu.idseccion')
       				->join('grado as gr','alu.idgrado','=','gr.idgrado')
       				->join('nivel as niv','niv.idnivel','=','gr.idnivel')
       				->select('alu.idalumno',
       					'gr.nombre as grado',
       					'sec.nombre as seccion',
       					'niv.nombre as nivel',
       					'alu.idpadre')
       				->where('alu.dni','=',$id)->first();
       	$user = DB::table('users as usu')
       				->select('usu.username',
       					'usu.email','usu.status','usu.created_at')
       				->where('usu.username','=',$id)->first();

       	return view('administrador.alumno.show',["persona"=>$persona,"alumno"=>$alumno,"user"=>$user]);
    }

    public function edit($id)
    {
       $persona = DB::table('persona')->where('dni','=',$id)->first();
       $alumno = DB::table('alumno')->where('dni','=',$id)->first();

       return view('administrador.alumno.edit',["persona"=>$persona,"alumno"=>$alumno]);
    }

    public function update($id, AdminPersonaFormRequest $rqPersona, AdminAlumnoFormRequest $rqAlumno)
    {
    	try{
        DB::beginTransaction();

        $persona = Persona::findOrFail($id);
      	$persona->dni = $rqPersona->get('dni');
        $persona->nombres = $rqPersona->get('nombres');
        $persona->apellido_paterno = $rqPersona->get('apellido_paterno');
        $persona->apellido_materno = $rqPersona->get('apellido_materno');
        $persona->direccion = $rqPersona->get('direccion');
        $persona->fecha_nac = $rqPersona->get('fecha_nac');
        $persona->email = $rqPersona->get('email');
        $persona->telefono = $rqPersona->get('telefono');
        $persona->sexo = $rqPersona->get('sexo');
        $date = Carbon::now()->toDateString();
        $age = $date - $persona->fecha_nac;
        $persona->edad = $age;
        $persona->save();

        $alumno = Alumno::findOrFail($id);
      	$alumno->dni = $rqAlumno->get('dni');
	    $alumno->idalumno = $rqAlumno->get('idalumno');
	    $alumno->idgrado = $rqAlumno->get('idgrado');
	    $alumno->idseccion = $rqAlumno->get('idseccion');
	    $alumno->estado = '1';
	    $alumno->idpadre = $rqAlumno->get('idpadre');
	    $alumno->save();

        return Redirect::to('administrador/administrador/alumno');

      }catch(\Exception $e){
        DB::rollback();
      } 
    }
}
