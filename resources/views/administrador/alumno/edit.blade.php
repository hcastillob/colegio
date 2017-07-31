@extends('layouts.mainadmin')
@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h5><i class="fa fa-edit" aria-hidden="true"></i> Actualizar datos primarios</h5>
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

		{!!Form::model($persona,['method'=>'PATCH','route'=>['administrador.administrador.padre.update',$persona->dni]])!!}
		{{Form::token()}}

			<div class="row">

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="dni">DNI:</label>
						<input type="text" name="dni" required value="{{$persona->dni}}" class="form-control">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="nombres">Nombres:</label>
						<input type="text" name="nombres" required value="{{$persona->nombres}}" class="form-control">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="apellido_paterno">Apellido paterno:</label>
						<input type="text" name="apellido_paterno" required value="{{$persona->apellido_paterno}}" class="form-control">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="apellido_materno">Apellido materno:</label>
						<input type="text" name="apellido_materno" required value="{{$persona->apellido_materno}}" class="form-control">
					</div>
				</div>

				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<div class="form-group">
						<label for="direccion">Direcci&oacute;n:</label>
						<input type="text" name="direccion" required value="{{$persona->direccion}}" class="form-control">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="fecha_nac">Fecha de nacimiento:</label>
						<div class="input-group">
							<input type="text" value="{{$persona->fecha_nac}}" class="form-control datepicker" name="fecha_nac">
							<div class="input-group-addon">
	                            <i class="fa fa-calendar" aria-hidden="true"></i>
	                        </div>
						</div>
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" name="email" required value="{{$persona->email}}" class="form-control">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="telefono">Tel&eacute;fono:</label>
						<input type="text" name="telefono" required value="{{$persona->telefono}}" class="form-control">
					</div>
				</div>
				
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
					<div class="form-group">
						<label for="sexo">Sexo:</label>
						<select name="sexo" class="form-control">
							@if($persona->sexo == 'M')
								<option value="M" selected>Masculino</option>
								<option value="F">Femenino</option>
							@elseif($persona->sexo == 'F')
								<option value="F" selected>Femenino</option>
								<option value="M">Masculino</option>
							@endif
						</select>
					</div>
				</div>				
			</div>	
		</div>	
	</div>

	<div class="panel panel-primary">
        <div class="panel-heading"><i class="fa fa-edit" aria-hidden="true"></i> Actualizar datos secundarios
        </div>
        <div class="panel-body">
        	<div class="col-lg-6 col-sm-6-col-md-6 col-xs-6">
        		<div class="form-group">
        			<label for="idpadre_apoderado">C&oacute;digo de padre</label>
        			<input type="text" name="idpadre_apoderado" value="{{$padre_apod->idpadre_apoderado}}" class="form-control">
        		</div>
        	</div>
        	<div class="col-lg-6 col-sm-6-col-md-6 col-xs-6">
        		<div class="form-group">
        			<label for="cant_hijos">N° de hijos</label>
        			<input type="number" name="cant_hijos" value="{{$padre_apod->cant_hijos}}" class="form-control">
        		</div>
        	</div>
        </div>
    </div>

	<div class="row text-center">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
				<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
				<button type="reset" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</button>
			</div>
		</div>
    </div>

	{!!Form::close()!!}

	@push('scripts')
	<script>
	    $('.datepicker').datepicker({
	        format: "yyyy/mm/dd",
	        language: "en",
	        autoclose: true
	    });
	</script>
	@endpush
@endsection

