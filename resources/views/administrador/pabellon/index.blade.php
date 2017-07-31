@extends('layouts.mainadmin')
@section('content')
	<div class="row">
		<div class="panel-group" id="accordion" role="tablist">
			<div class="panel panel-primary">
				<div class="panel-heading" role="tab" id="heading1">
					<h4 class="panel-title">
						<a href="#collapse1" data-toggle="collapse" data-parent="#accordion">Pabellones</a>
					</h4>
				</div>
					<div class="panel-collapse collapse" id="collapse1">
						<div class="panel-body">
							<h3><i class="fa fa-university" aria-hidden="true"></i> Listado de Pabellones <a href='pabellon/create'>
								<button class="btn btn-success">
									<i class="fa fa-plus" aria-hidden="true"></i> Nuevo Pabell&oacute;n
								</button>
							</a>
							</h3>
			
							<div class="table-reponsive">
								<table class="table table-striped table-bordered">
									<thead style="background-color: #A9D0F5">
										<th>IDPabellon</th>
										<th>Nombre</th>
										<th>N° Ambientes</th>
										<th>N° Ambientes disp</th>
										<th>Estado</th>
										<th>Acci&oacute;n</th>
									</thead>
									@foreach($pabellones as $pab)
									<tr>
										<td>{{$pab->idpabellon}}</td>
										<td>{{$pab->nombre}}</td>
										<td>{{$pab->cant_amb}}</td>
										<td>{{$pab->cant_amb_disp}}</td>
										<td>{{$pab->estado}}</td>
										<td>
											<a href="{{URL::action('AdminPabellonController@edit',$pab->idpabellon)}}">
												<span class="label label-primary" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></span>
											</a>
											<a href="" data-target="#modal-delete-{{$pab->idpabellon}}" data-toggle="modal">
												<span class="label label-danger" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></span>
											</a>
										</td>
									</tr>
						
									@include('administrador.pabellon.modal')

									@endforeach
								</table>
							</div>
						</div>
					</div>
				</div>

				<div class="panel panel-primary">
					<div class="panel-heading" role="tab" id="heading2">
						<h4 class="panel-title">
							<a href="#collapse2" data-toggle="collapse" data-parent="#accordion">Ambientes</a>
						</h4>
					</div>
					<div class="panel-collapse collapse in" id="collapse2">
						<div class="panel-body">
						 <h3><i class="fa fa-university" aria-hidden="true"></i> Listado de Ambientes <a href='ambiente/create'>
								<button class="btn btn-success">
									<i class="fa fa-plus" aria-hidden="true"></i> Nuevo Ambiente
								</button>
							</a>
							</h3>
			
							@include('administrador.pabellon.search')
		
							<div class="table-reponsive">
								<table class="table table-striped table-bordered">
									<thead style="background-color: #A9D0F5">
										<th>IDAmbiente</th>
										<th>Nombre</th>
										<th>Capacidad</th>
										<th>Pabell&oacute;n</th>
										<th>Estado</th>
										<th>Acci&oacute;n</th>
									</thead>
									@foreach($ambientes as $amb)
										<tr>
											<td>{{$amb->idambiente}}</td>
											<td>{{$amb->nombre}}</td>
											<td>{{$amb->capacidad}}</td>
											<td>{{$amb->pabellon}}</td>
											<td>{{$amb->estado}}</td>
											<td>
												<a href="{{URL::action('AdminAmbienteController@edit',$amb->idambiente)}}">
													<span class="label label-primary" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></span>
												</a>
												<a href="" data-target="#modal-delete-{{$amb->idambiente}}" data-toggle="modal">
													<span class="label label-danger" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></span>
												</a>
											</td>
										</tr>
												
										@include('administrador.ambiente.modal')

									@endforeach
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection