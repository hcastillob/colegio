@extends('layouts.mainadmin')
@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h5><i class="fa fa-plus" aria-hidden="true"></i> Datos primarios</h5>
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

		{!!Form::open(array('url'=>'administrador/administrador/padre','method'=>'POST','autocomplete'=>'off','role'=>'search'))!!}
			{{Form::token()}}

			<div class="row">

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="dni">DNI:</label>
						<input type="text" name="dni" required value="{{old('dni')}}" class="form-control" placeholder="Ingrese DNI">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="nombres">Nombres:</label>
						<input type="text" name="nombres" required value="{{old('nombres')}}" class="form-control" placeholder="Nombres">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="apellido_paterno">Apellido paterno:</label>
						<input type="text" name="apellido_paterno" required value="{{old('apellido_paterno')}}" class="form-control" placeholder="Apellido parterno">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="apellido_materno">Apellido materno:</label>
						<input type="text" name="apellido_materno" required value="{{old('apellido_materno')}}" class="form-control" placeholder="Apellido parterno">
					</div>
				</div>

				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<div class="form-group">
						<label for="direccion">Direcci&oacute;n:</label>
						<input type="text" name="direccion" required value="{{old('direccion')}}" class="form-control" placeholder="Direcci&oacute;n del usuario">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="fecha_nac">Fecha de nacimiento:</label>
						<div class="input-group">
							<input type="text" class="form-control datepicker" name="fecha_nac" placeholder="año/mes/dia">
							<div class="input-group-addon">
	                            <i class="fa fa-calendar" aria-hidden="true"></i>
	                        </div>
						</div>
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" name="email" required value="{{old('email')}}" class="form-control" placeholder="Correo electr&oacute;nico">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="telefono">Tel&eacute;fono:</label>
						<input type="text" name="telefono" required value="{{old('telefono')}}" class="form-control" placeholder="N&uacute;mero telef&oacute;nico">
					</div>
				</div>
				
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
					<div class="form-group">
						<label for="sexo">Sexo:</label>
						<select name="sexo" class="form-control">
							<option>Seleccionar</option>
							<option value="M">Masculino</option>
							<option value="F">Femenino</option>
						</select>
					</div>
				</div>				
			</div>	
		</div>	
	</div>

	<div class="panel panel-primary">
        <div class="panel-heading">Datos secundarios
        </div>
        <div class="panel-body">
        	<div class="col-lg-6 col-sm-6-col-md-6 col-xs-6">
        		<div class="form-group">
        			<label for="idpadre_apoderado">C&oacute;digo de padre</label>
        			<input type="text" class="form-control" name="idpadre_apoderado">
        		</div>
        	</div>
        	<div class="col-lg-6 col-sm-6-col-md-6 col-xs-6">
        		<div class="form-group">
        			<label for="cant_hijos">N° de hijos</label>
        			<input type="number" class="form-control" name="cant_hijos">
        		</div>
        	</div>
        </div>
    </div>

	<div class="panel panel-primary">
        <div class="panel-heading">Asignar usuario de sistema</div>
            <div class="panel-body">
            {{ csrf_field() }}

                <div class="form-group{{$errors->has('username') ? ' has-error' : ''}} col-lg-6 col-sm-6 col-md-6 col-xs-6">
                    <label for="username" class="control-label">Usuario:</label>

                    <input id="username" type="text" class="form-control" name="username" value="{{old('username')}}" placeholder="Usuario del sistema">

                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                 </div>
                     
				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-lg-6 col-sm-6 col-md-6 col-xs-6">
                    <label for="email" class="control-label">E-Mail:</label>

                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Correo de acceso">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                           
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-lg-6 col-sm-6 col-md-6 col-xs-6">
                    <label for="password" class="control-label">Password:</label>
                          
                    <input id="password" type="password" class="form-control" name="password" placeholder="Clave de acceso">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                           
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} col-lg-6 col-sm-6 col-md-6 col-xs-6">
                    <label for="password-confirm" class="control-label">Confirmar Password:</label>

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Vuelva a escribir la clave">

                    @if ($errors->has('password_confirmation'))
                      	<span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif                            
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

