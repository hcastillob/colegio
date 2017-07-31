<?php

namespace Colegio\Http\Controllers;
use Illuminate\Http\Request;
use Colegio\Http\Requests;

//added
use Colegio\Models\Pabellon;
use Illuminate\Support\Facades\Redirect;
use Colegio\Http\Requests\AdminPabellonFormRequest;
use DB;

class AdminPabellonController extends Controller
{
	public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {
    	if ($request) {
    		$query = trim($request->get('searchText'));

    		$pabellones = DB::table('pabellon')->where('nombre','LIKE','%'.$query.'%')
    									->where('estado','=','1')
    									->orderBy('idpabellon','ASC')
    									->paginate(10);

            $ambientes = DB::table('ambiente as a')->join('pabellon as p','a.idpabellon','=','p.idpabellon')
                            ->select('a.idambiente',
                                'a.nombre',
                                'a.capacidad',
                                'p.nombre as pabellon',
                                'a.estado')
                            ->where('a.nombre','LIKE','%'.$query.'%')
                            ->where('a.estado','=','1')
                            ->orderBy('a.idambiente','ASC')->get();

    		return view('administrador.pabellon.index',["pabellones"=>$pabellones, "searchText"=>$query, "ambientes"=>$ambientes]);
    	}
    
    }

    public function create()
    {
        return view('administrador.pabellon.create');
    }

    public function store(AdminPabellonFormRequest $request)
    {
        $pabellon = new Pabellon; //Se obtiene del modelo
        $pabellon->idpabellon = $request->get('idpabellon');
        $pabellon->nombre = $request->get('nombre');
        $pabellon->cant_amb = $request->get('cant_amb');
        $pabellon->cant_amb_disp = $request->get('cant_amb_disp');
        $pabellon->estado = '1';

        $pabellon->save();

        return Redirect::to('administrador/administrador/pabellon');
    }

    public function show($id)
    {
       //return view('almacen.articulo.show',["articulo"=>Articulo::findOrFail($id)]);
        /*Llama a la vista show y le manda una categoria obtenida del modelo*/
    }

    public function edit($id)
    {
        $pabellon = DB::table('pabellon')->where('idpabellon','=',$id)->first();

        return view('administrador.pabellon.edit',["pabellon"=>$pabellon]);
    }

    public function update(AdminPabellonFormRequest $request, $id)
    {
        $pabellon = Pabellon::findOrFail($id);

        $pabellon->idpabellon = $request->get('idpabellon');
        $pabellon->nombre = $request->get('nombre');
        $pabellon->cant_amb = $request->get('cant_amb');
        $pabellon->cant_amb_disp = $request->get('cant_amb_disp');
        $pabellon->estado = '1';

        $pabellon->update();

        return Redirect::to('administrador/administrador/pabellon');
    }

    public function destroy($id)
    {
        $pabellon = Pabellon::findOrFail($id);

        $pabellon->estado = '0';
        $pabellon->update();

        return Redirect::to('administrador/administrador/pabellon');
    }    
}
