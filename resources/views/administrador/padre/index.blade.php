@extends('layouts.mainadmin')
@section('content')
	<h3><i class="fa fa-book" aria-hidden="true"></i> Listado de padres o apoderados <a href='padre/create'>
							<button class="btn btn-success">
								<i class="fa fa-plus" aria-hidden="true"></i> Agregar Padre
							</button>
						</a></h3>
			
	@include('administrador.padre.search')
		
	<div class="table-reponsive">
		<table class="table table-striped table-bordered">
			<thead style="background-color: #A9D0F5">
				<th>DNI</th>
				<th>Nombres</th>
				<th>Direcci&oacute;n</th>
				<th>Sexo</th>
				<th>Edad</th>
				<th>Acci&oacute;n</th>
			</thead>
				@foreach($padres as $pad)
				<tr>
					<td>{{$pad->dni}}</td>
					<td>{{$pad->nombres.' '.$pad->apellido_paterno.' '.$pad->apellido_materno}}</td>
					<td>{{$pad->direccion}}</td>
					<td>{{$pad->sexo}}</td>
					<td>{{$pad->edad}}</td>
					<td>
						<a href="{{URL::action('AdminPadreController@edit',$pad->dni)}}">
							<span class="label label-primary" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></span>
						</a>
						<a href="{{URL::action('AdminPadreController@show',$pad->dni)}}">
							<span class="label label-success" title="Ver datos completos"><i class="fa fa-eye" aria-hidden="true"></i></span>
						</a>
					</td>
				</tr>
				
				@include('administrador.padre.modal')

				@endforeach
		</table>
	</div>
	
	{{ $padres->render()}} <!--Para la paginacion -->

@endsection