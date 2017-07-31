<?php

namespace Colegio\Http\Controllers;
use Illuminate\Http\Request;
use Colegio\Http\Requests;

//added
use Colegio\Models\Ambiente;
use Illuminate\Support\Facades\Redirect;
use Colegio\Http\Requests\AdminAmbienteFormRequest;
use DB;

class AdminAmbienteController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    /*public function index(Request $request)
    {
    	if ($request) {
    		$query = trim($request->get('searchText'));

    		$ambientes = DB::table('ambiente as a')->join('pabellon as p','a.idpabellon','=','p.idpabellon')
                            ->select('a.idambiente',
                                'a.nombre',
                                'a.capacidad',
                                'p.nombre as pabellon',
                                'a.estado')
                            ->where('a.nombre','LIKE','%'.$query.'%')
                            ->where('a.estado','=','1')
                            ->orderBy('a.idambiente','ASC')->get();

    		return view('administrador.pabellon.index',["ambientes"=>$ambientes, "searchText"=>$query]);
    	}
    }*/

    public function create()
    {
        $pabellones = DB::table('pabellon')->select('idpabellon','nombre')
        			->where('estado','=','1')->where('cant_amb_disp','>','0')
    				->orderBy('idpabellon','ASC')->get();
        return view('administrador.ambiente.create',["pabellones"=>$pabellones]);
    }

    public function store(AdminAmbienteFormRequest $request)
    {
        try{
            DB::beginTransaction();

            $ambiente = new Ambiente; //Se obtiene del modelo
            $ambiente->idambiente = $request->get('idambiente');
            $ambiente->nombre = $request->get('nombre');
            $ambiente->capacidad = $request->get('capacidad');
            $ambiente->idpabellon = $request->get('idpabellon');
            $ambiente->estado = '1';

            $ambiente->save();

            DB::commit();
            return Redirect::to('administrador/administrador/pabellon');

        } catch(\Exception $e){
            DB::rollback();
        }
    }

    public function show($id)
    {
       //return view('almacen.articulo.show',["articulo"=>Articulo::findOrFail($id)]);
        /*Llama a la vista show y le manda una categoria obtenida del modelo*/
    }

    public function edit($id)
    {
        $ambiente = DB::table('ambiente')->where('idambiente','=',$id)->first();

        $pabellones = DB::table('pabellon')->where('estado','=','1')
                        ->where('cant_amb_disp','>','0')->get();

        return view('administrador.ambiente.edit',["ambiente"=>$ambiente,"pabellones"=>$pabellones]);
    }

    public function update(AdminAmbienteFormRequest $request, $id)
    {
         try{
            DB::beginTransaction();
            
            $ambiente = Ambiente::findOrFail($id);
            $ambiente->idambiente = $request->get('idambiente');
            $ambiente->nombre = $request->get('nombre');
            $ambiente->capacidad = $request->get('capacidad');
            $ambiente->idpabellon = $request->get('idpabellon');
            $ambiente->estado = '1';

            $ambiente->update();

            DB::commit();

            return Redirect::to('administrador/administrador/pabellon');

        } catch(\Exception $e){
            DB::rollback();
        }
    }

    public function destroy($id)
    {
        $ambiente = Ambiente::findOrFail($id);

        $ambiente->estado = '0';
        $ambiente->update();

        return Redirect::to('administrador/administrador/pabellon');
    } 
}
