@extends('layouts.mainadmin')
@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h5><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Curso</h5>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">		

					@if(count($errors)>0)
					<div class="alert alert-danger">
						<ul>
							@foreach($errors->all() as $error)
								<li>{{$error}}</li>
							@endforeach
						</ul>
					</div>
					@endif
				</div>
			</div>

		{!!Form::open(array('url'=>'administrador/administrador/curso','method'=>'POST','autocomplete'=>'off','role'=>'search'))!!}
			{{Form::token()}}

			<div class="row">

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="idcurso">C&oacute;digo:</label>
						<input type="text" name="idcurso" required value="{{old('idcurso')}}" class="form-control" placeholder="C&oacute;digo del curso">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="nombre">Nombre largo:</label>
						<input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre del curso">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="nombre_corto">Nombre corto:</label>
						<input type="text" name="nombre_corto" required value="{{old('nombre_corto')}}" class="form-control" placeholder="3 caracteres">
					</div>
				</div>

				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
					<div class="form-group">
						<label for="nombre">Nivel:</label>
						<select name="idnivel" class="form-control">
							@foreach($niveles as $niv)
								<option value="{{$niv->idnivel}}">{{$niv->nombre}}</option>
							@endforeach
						</select>
					</div>
				</div>
				
				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
					<div class="form-group">
						<label for="nombre">Grado:</label>
						<select name="grado" class="form-control">
							<option value="1">1°</option>
							<option value="2">2°</option>
							<option value="3">3°</option>
							<option value="4">4°</option>
							<option value="5">5°</option>
							<option value="6">6°</option>
						</select>
					</div>
				</div>
		
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Guardar</button>
						<button type="reset" class="btn btn-danger">Cancelar</button>
					</div>
				</div>
			</div>	
		</div>	
	</div>

	{!!Form::close()!!}
@endsection