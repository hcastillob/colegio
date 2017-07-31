@extends('layouts.mainadmin')
@section('content')
	<h3><i class="fa fa-book" aria-hidden="true"></i> Listado de alumnos <a href='alumno/create'>
							<button class="btn btn-success">
								<i class="fa fa-plus" aria-hidden="true"></i> Agregar Alumno
							</button>
						</a></h3>
			
	@include('administrador.alumno.search')
		
	<div class="table-reponsive">
		<table class="table table-striped table-bordered">
			<thead style="background-color: #A9D0F5">
				<th>DNI</th>
				<th>Cod.Alumno</th>
				<th>Nombres</th>
				<th>Direcci&oacute;n</th>
				<th>Grado-Secci&oacute;n</th>
				<th>Sexo</th>
				<th>Acci&oacute;n</th>
			</thead>
				@foreach($alumnos as $alu)
				<tr>
					<td>{{$alu->dni}}</td>
					<td>{{$alu->idalumno}}</td>
					<td>{{$alu->nombres.' '.$alu->apellido_paterno.' '.$alu->apellido_materno}}</td>
					<td>{{$alu->direccion}}</td>
					<td>{{$alu->grado.'-'.$alu->seccion}}</td>
					<td>{{$alu->sexo}}</td>
					<td>
						<a href="{{URL::action('AdminAlumnoController@edit',$alu->dni)}}">
							<span class="label label-primary" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></span>
						</a>
						<a href="{{URL::action('AdminAlumnoController@show',$alu->dni)}}">
							<span class="label label-success" title="Ver datos completos"><i class="fa fa-eye" aria-hidden="true"></i></span>
						</a>
					</td>
				</tr>
				
				@include('administrador.alumno.modal')

				@endforeach
		</table>
	</div>
	
	{{ $alumnos->render()}} <!--Para la paginacion -->

@endsection