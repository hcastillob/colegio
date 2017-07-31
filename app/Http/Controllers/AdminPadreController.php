<?php

namespace Colegio\Http\Controllers;
use Illuminate\Http\Request;
use Colegio\Http\Requests;

//added
use Colegio\Models\Padre;
use Colegio\Models\Persona;
use Colegio\User;
use Illuminate\Support\Facades\Redirect;
use Colegio\Http\Requests\AdminPadreFormRequest;
use Colegio\Http\Requests\AdminPersonaFormRequest;
use Colegio\Http\Requests\AdminUserFormRequest;
use DB;
use Carbon\Carbon;

class AdminPadreController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {
    	if ($request) {
    		$query = trim($request->get('searchText'));

    		$padres = DB::table('padre_apoderado as pa')->join('persona as pe','pa.dni','=','pe.dni')
    						->join('users as us','pe.dni','=','us.username')
                            ->select('pe.dni',
                                'pe.nombres',
                                'pe.apellido_paterno',
                                'pe.apellido_materno',
                                'pe.direccion',
                                'pe.sexo',
                                'pe.edad')
                            ->where('pe.dni','LIKE','%'.$query.'%')
                            ->orWhere('pe.apellido_paterno','LIKE','%'.$query.'%')
                            ->where('us.role','=','padre')
                            ->orderBy('pa.dni','ASC')->paginate(15);

    		return view('administrador.padre.index',["padres"=>$padres, "searchText"=>$query]);
    	}
    }

    public function create()
    {
        return view('administrador.padre.create');
    }

    public function store(AdminPersonaFormRequest $rqPersona, AdminPadreFormRequest $rqPadre, AdminUserFormRequest $rqUser)
    {
        try{
        	DB::beginTransaction();

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

	        $padre = new Padre;
	        $padre->idpadre_apoderado = $rqPadre->get('idpadre_apoderado');
	        $padre->dni = $rqPadre->get('dni');
	        $padre->cant_hijos = $rqPadre->get('cant_hijos');
	        $padre->save();


	        $user = new User;
	        $user->username = $rqUser->get('username');
	        $user->email = $rqUser->get('email');
	        $user->password = \Hash::make($rqUser->get('password'));
	        $user->role = 'padre';
	        $user->status = '1';
	        $user->created_at = Carbon::now()->toDateString();
	        $user->updated_at = Carbon::now()->toDateString();
	        $user->save();

	        DB::commit();

	        return Redirect::to('administrador/administrador/padre');

        } catch(\Exception $e){
    		DB::rollback();
        }    
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
       	$padre_apod = DB::table('padre_apoderado as pad')->where('pad.dni','=',$id)->first();
       	$user = DB::table('users as usu')
       				->select('usu.username',
       					'usu.email','usu.status','usu.created_at')
       				->where('usu.username','=',$id)->first();

       	return view('administrador.padre.show',["persona"=>$persona,"padre_apod"=>$padre_apod,"user"=>$user]);
    }

    public function edit($id)
    {
       $persona = DB::table('persona')->where('dni','=',$id)->first();
       $padre_apod = DB::table('padre_apoderado')->where('dni','=',$id)->first();

       return view('administrador.padre.edit',["persona"=>$persona,"padre_apod"=>$padre_apod]);
    }

    public function update($id, AdminPersonaFormRequest $rqPersona, AdminPadreFormRequest $rqPadre)
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

        $padre = Padre::findOrFail($id);
        $padre->idpadre_apoderado = $rqPadre->get('idpadre_apoderado');
  	    $padre->dni = $rqPadre->get('dni');
  	    $padre->cant_hijos = $rqPadre->get('cant_hijos');
  	    $padre->save();

        return Redirect::to('administrador/administrador/padre');

      }catch(\Exception $e){
        DB::rollback();
      } 
    }
}
