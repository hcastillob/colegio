@extends('layouts.mainadmin')
@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h5><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar Pabell&oacute;n</h5>
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

	{!!Form::model($ambiente,['method'=>'PATCH','route'=>['administrador.administrador.ambiente.update',$ambiente->idambiente]])!!}
	{{Form::token()}}

			<div class="row">

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="idambiente">C&oacute;digo de Ambiente:</label>
						<input type="text" name="idambiente" required value="{{$ambiente->idambiente}}" class="form-control">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="nombre">Nombre:</label>
						<input type="text" name="nombre" required value="{{$ambiente->nombre}}" class="form-control">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="capacidad">Capacidad:</label>
						<input type="number" name="capacidad" required value="{{$ambiente->capacidad}}" class="form-control">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="idpabellon">Pabell&oacute;n:</label>
						<select name="idpabellon" class="form-control">
							@foreach($pabellones as $pab)
								@if($pab->idpabellon == $ambiente->idpabellon)
									<option value="{{$pab->idpabellon}}" selected>{{$pab->nombre}}</option>
								@else
									<option value="{{$pab->idpabellon}}">{{$pab->nombre}}</option>
								@endif
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