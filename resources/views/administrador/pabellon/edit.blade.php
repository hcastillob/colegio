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

	{!!Form::model($pabellon,['method'=>'PATCH','route'=>['administrador.administrador.pabellon.update',$pabellon->idpabellon]])!!}
	{{Form::token()}}

			<div class="row">

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="idpabellon">C&oacute;digo de Pabell&oacute;n:</label>
						<input type="text" name="idpabellon" required value="{{$pabellon->idpabellon}}" class="form-control">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="nombre">Nombre:</label>
						<input type="text" name="nombre" required value="{{$pabellon->nombre}}" class="form-control">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="cant_amb">Cantidad de ambientes:</label>
						<input type="number" name="cant_amb" required value="{{$pabellon->cant_amb}}" class="form-control">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="cant_amb_disp">Cantidad de ambientes disponibles:</label>
						<input type="number" name="cant_amb_disp" required value="{{$pabellon->cant_amb_disp}}" class="form-control">
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