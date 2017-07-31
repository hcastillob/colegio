<?php

namespace Colegio\Http\Controllers;
use Illuminate\Http\Request;
use Colegio\Http\Requests;

//added
use Colegio\Models\Curso;
use Illuminate\Support\Facades\Redirect;
use Colegio\Http\Requests\CursoFormRequest;
use DB;

class CursoController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {
    	if ($request) {
    		$query = trim($request->get('searchText'));

    		$cursos = DB::table('curso as c')->join('grado as g','c.idgrado','=','g.idgrado')
    									->join('nivel as n','g.idnivel','=','n.idnivel')
    									->select('c.idcurso',
    										'c.nombre',
    										'g.nombre as grado',
    										'n.nombre as nivel',
    										'c.estado as estado')
    									->where('c.nombre','LIKE','%'.$query.'%')
    									->where('c.estado','=','1')
    									->orderBy('c.idcurso','ASC')
    									->paginate(10);

    		return view('administrador.curso.index',["cursos"=>$cursos, "searchText"=>$query]);
    	}
    }

    public function create()
    {
        $niveles = DB::table('nivel')->select('idnivel','nombre')->where('estado','=','1')->get();

        return view('administrador.curso.create',["niveles"=>$niveles]);
    }

    public function store(CursoFormRequest $request)
    {
        $curso = new Curso; //Se obtiene del modelo
        $curso->idcurso = $request->get('idcurso'); //Se obtiene de los campos validados en CursoFormRequest
        $curso->nombre = $request->get('nombre');
        $curso->nombre_corto = $request->get('nombre_corto');
        $curso->estado = '1';
        $ni = $request->get('idnivel');
        $gr = $request->get('grado');
        $curso->idgrado = $ni.$gr;

        $curso->save();

        return Redirect::to('administrador/administrador/curso');
    }

    public function show($id)
    {
       //return view('almacen.articulo.show',["articulo"=>Articulo::findOrFail($id)]);
        /*Llama a la vista show y le manda una categoria obtenida del modelo*/
    }

    public function edit($id)
    {
        //$curso = Curso::findOrFail($id);
        $curso = DB::table('curso')->where('idcurso','=',$id)->first();
        $grados = DB::table('grado as g')->join('nivel as n','g.idnivel','=','n.idnivel')
                                        ->select('g.idgrado',
                                            'g.nombre as grado',
                                            'n.nombre as nivel')
                                        ->where('g.estado','=','1')->get();

        return view('administrador.curso.edit',["curso"=>$curso,"grados"=>$grados]);
    }

    public function update(CursoFormRequest $request, $id)
    {
        $curso = Curso::findOrFail($id);

        $curso->idcurso = $request->get('idcurso'); //Se obtiene de los campos validados con ArticuloFormRequest
        $curso->nombre = $request->get('nombre');
        $curso->nombre_corto = $request->get('nombre_corto');
        $curso->estado = '1';
        $curso->idgrado = $request->get('idgrado');

        $curso->update();

        return Redirect::to('administrador/administrador/curso');
    }

    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);

        $curso->estado = '0';
        $curso->update();

        return Redirect::to('administrador/administrador/curso');
    }
}
