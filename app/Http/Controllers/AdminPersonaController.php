<?php

namespace Colegio\Http\Controllers;
use Illuminate\Http\Request;
use Colegio\Http\Requests;

//added
use Colegio\Models\Persona;
use Colegio\User;
use Illuminate\Support\Facades\Redirect;
use Colegio\Http\Requests\AdminPersonaFormRequest;
use DB;
use Carbon\Carbon;

class AdminPersonaController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {
    	if ($request) {
    		$query = trim($request->get('searchText'));

    		$users = DB::table('users as c')->select('username','email','role','status')
    									->where('username','LIKE','%'.$query.'%')
    									->orderBy('username','ASC')
    									->paginate(15);

    		return view('administrador.persona.index',["users"=>$users, "searchText"=>$query]);
    	}
    }

    public function create()
    {
        return view('administrador.persona.create');
    }

    public function store(AdminPersonaFormRequest $request)
    {
        #guardar instancia persona
        $persona = new Persona;
        $persona->dni = $request->get('dni');
        $persona->nombres = $request->get('nombres');
        $persona->apellido_paterno = $request->get('apellido_paterno');
        $persona->apellido_materno = $request->get('apellido_materno');
        $persona->direccion = $request->get('direccion');
        $persona->fecha_nac = $request->get('fecha_nac');
        $persona->email = $request->get('email');
        $persona->telefono = $request->get('telefono');
        $persona->sexo = $request->get('sexo');

        $date = Carbon::now()->toDateString();
        $age = $date - $persona->fecha_nac;
        $persona->edad = $age;

        $persona->save();

        #guardar usuario por cada instancia persona
        $user = new User;
        $user->username = $request->get('dni');
        $user->email = $request->get('email');
        $user->password = bcript($request->get('password'));
        $user->role = $request->get('role');
        $user->status = '1';

        $user->save();

        return Redirect::to('administrador/administrador/persona');
    }

    public function show($id)
    {
       //return view('almacen.articulo.show',["articulo"=>Articulo::findOrFail($id)]);
        /*Llama a la vista show y le manda una categoria obtenida del modelo*/
    }

    public function edit($id)
    {
        //$curso = Curso::findOrFail($id);
        $persona = DB::table('persona')->select('dni',
        		'nombres',
        		'apellido_paterno',
        		'apellido_materno',
        		'direccion',
        		'fecha_nac',
        		'email',
        		'telefono',
        		'sexo')
        		->where('dni','=',$id)->first();
        $user = DB::table('users')->select('username','email','role')
        		->where('username','=',$id)->first();

        return view('administrador.persona.edit',["persona"=>$persona,"user"=>$user]);
    }

    public function update(AdminPersonaFormRequest $request)
    {
        #guardar instancia persona
        $persona = new Persona;
        $persona->dni = $request->get('dni');
        $persona->nombres = $request->get('nombres');
        $persona->apellido_paterno = $request->get('apellido_paterno');
        $persona->apellido_materno = $request->get('apellido_materno');
        $persona->direccion = $request->get('direccion');
        $persona->fecha_nac = $request->get('fecha_nac');
        $persona->email = $request->get('email');
        $persona->telefono = $request->get('telefono');
        $persona->sexo = $request->get('sexo');

        $date = Carbon::now()->toDateString();
        $age = $date - $persona->fecha_nac;
        $persona->edad = $age;

        $persona->save();

        #guardar usuario por cada instancia persona
        $user = new User;
        $user->username = $request->get('dni');
        $user->email = $request->get('email');
        $user->password = bcript($request->get('password'));
        $user->role = $request->get('role');
        $user->status = '1';

        $user->save();

        return Redirect::to('administrador/administrador/persona');
    }
}
