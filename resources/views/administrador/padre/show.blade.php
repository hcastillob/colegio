@extends('layouts.mainadmin')
@section('content')
	
	<div class="panel panel-info">
		<div class="panel-heading">
			<p><strong>DATOS GENERALES</strong></p>
		</div>
		<div class="panel-body">
			<form action="" class="form-horizontal">
				<div class="form-group has-success">
					<label for="dni" class="col-md-2">DNI:</label>
					<div class="col-md-10">
						<p>{{$persona->dni}}</p>
					</div>
					<label for="nombres" class="col-md-2">Nombre completo:</label>
					<div class="col-md-10">
						<p>{{$persona->apellido_paterno.' '.$persona->apellido_materno.' '.$persona->nombres}}</p>
					</div>
					<label for="direccion" class="col-md-2">Direcci&oacute;n:</label>
					<div class="col-md-10">
						<p>{{$persona->direccion}}</p>
					</div>
					<label for="fecha_nac" class="col-md-2">Fecha Nacimiento:</label>
					<div class="col-md-10">
						<p>{{$persona->fecha_nac}}</p>
					</div>
					<label for="email" class="col-md-2">E-mail:</label>
					<div class="col-md-10">
						<p>{{$persona->email}}</p>
					</div>
					<label for="telefono" class="col-md-2">Tel&eacute;fono:</label>
					<div class="col-md-10">
						<p>{{$persona->telefono}}</p>
					</div>
					<label for="sexo" class="col-md-2">Sexo:</label>
					<div class="col-md-10">
						<p>{{$persona->sexo}}</p>
					</div>
					<label for="edad" class="col-md-2">Edad:</label>
					<div class="col-md-10">
						<p>{{$persona->edad}}</p>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="panel panel-info">
		<div class="panel-heading">
			<p><strong>DATOS SECUNDARIOS</strong></p>
		</div>
		<div class="panel-body">
			<form action="form form-horizontal">
				<div class="form-group has-success">
					<label for="idpadre_apoderado" class="col-md-2">C&oacute;digo:</label>
					<div class="col-md-4">
						<p>{{$padre_apod->idpadre_apoderado}}</p>
					</div>
					<label for="cant_hijos" class="col-md-2">N° de hijos:</label>
					<div class="col-md-4">
						<p>{{$padre_apod->cant_hijos}}</p>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="panel panel-info">
		<div class="panel-heading">
			<p><strong>DATOS DEL USUARIO DEL SISTEMA</strong></p>
		</div>
		<div class="panel-body">
			<form action="form form-horizontal">
				<div class="form-group has-success">
					<label for="username" class="col-md-3">Usuario:</label>
					<div class="col-md-9">
						<p>{{$user->username}}</p>
					</div>
					<label for="email" class="col-md-3">E-mail:</label>
					<div class="col-md-9">
						<p>{{$user->email}}</p>
					</div>
					<label for="status" class="col-md-3">Estado:</label>
					<div class="col-md-9">
						<p>{{$user->status}}</p>
					</div>
					<label for="created_at" class="col-md-3">Fecha de creaci&oacute;n:</label>
					<div class="col-md-9">
						<p>{{$user->created_at}}</p>
					</div>
				</div>
			</form>
		</div>
	</div>

@endsection