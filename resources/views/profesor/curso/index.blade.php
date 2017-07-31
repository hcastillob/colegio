@extends('layouts.main')
@section('content')
	<h3><i class="fa fa-book" aria-hidden="true"></i> Listado de Cursos <a href="curso/create">
							<button class="btn btn-success">
								<i class="fa fa-plus" aria-hidden="true"></i> Nuevo Curso
							</button>
						</a></h3>
			
	@include('profesor.curso.search')
		
	<div class="table-reponsive">
		<table class="table table-striped table-bordered">
			<thead>
				<th>IDCurso</th>
				<th>Nombre</th>
				<th>Grado</th>
				<th>Nivel</th>
				<th>Estado</th>
				<th>Acci&oacute;n</th>
			</thead>
				@foreach($cursos as $cur)
				<tr>
					<td>{{$cur->idcurso}}</td>
					<td>{{$cur->nombre}}</td>
					<td>{{$cur->grado}}</td>
					<td>{{$cur->nivel}}</td>
					<td>{{$cur->estado}}</td>
					<td>
						<a href="{{URL::action('CursoController@edit',$cur->idcurso)}}">
							<span class="label label-primary"><i class="fa fa-pencil" aria-hidden="true"></i></span>
						</a>
						<a href="" data-target="#modal-delete-{{$cur->idcurso}}" data-toggle="modal">
							<span class="label label-danger"><i class="fa fa-trash" aria-hidden="true"></i></span>
						</a>
					</td>
				</tr>
				
				@include('profesor.curso.modal')

				@endforeach
		</table>
	</div>
	
	{{ $cursos->render()}} <!--Para la paginacion -->

@endsection