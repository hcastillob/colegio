@extends('layouts.mainadmin')
@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h5><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar Curso</h5>
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

	{!!Form::model($curso,['method'=>'PATCH','route'=>['administrador.administrador.curso.update',$curso->idcurso]])!!}
	{{Form::token()}}

			<div class="row">

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="idcurso">C&oacute;digo:</label>
						<input type="text" name="idcurso" value="{{$curso->idcurso}}" class="form-control">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="nombre">Nombre largo:</label>
						<input type="text" name="nombre" value="{{$curso->nombre}}" class="form-control">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="nombre_corto">Nombre corto:</label>
						<input type="text" name="nombre_corto" value="{{$curso->nombre_corto}}" class="form-control">
					</div>
				</div>
		
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
					<div class="form-group">
						<label for="nombre">Grado - Nivel:</label>
						<select name="idgrado" class="form-control">
							@foreach($grados as $gra)
								@if($gra->idgrado == $curso->idgrado) <!--Si el idgrado es = al idgrado del curso: selected -->
								<option value="{{$curso->idgrado}}" selected>{{$gra->grado.' - '.$gra->nivel}}</option>
								@else
								<option value="{{$gra->idgrado}}">{{$gra->grado.' - '.$gra->nivel}}</option>
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