@extends('layouts.mainadmin')
@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h5><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Ambiente</h5>
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

		{!!Form::open(array('url'=>'administrador/administrador/ambiente','method'=>'POST','autocomplete'=>'off','role'=>'search'))!!}
			{{Form::token()}}

			<div class="row">

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="idambiente">C&oacute;digo de Ambiente:</label>
						<input type="text" name="idambiente" required value="{{old('idambiente')}}" class="form-control" placeholder="C&oacute;digo del ambiente (5 caracteres)">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="nombre">Nombre:</label>
						<input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre del ambiente">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="capacidad">Capacidad:</label>
						<input type="number" name="capacidad" required value="{{old('capacidad')}}" class="form-control" placeholder="Aforo m&aacute;ximo del ambiente">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="cant_amb_disp">Pabell&oacute;n:</label>
						<select name="idpabellon" class="form-control">
							@foreach($pabellones as $pab)
								<option value="{{$pab->idpabellon}}">{{$pab->nombre}}</option>
							@endforeach
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