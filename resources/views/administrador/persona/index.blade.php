@extends('layouts.mainadmin')
@section('content')
	<h3><i class="fa fa-book" aria-hidden="true"></i> Listado de usuarios del sistema <a href='persona/create'>
							<button class="btn btn-success">
								<i class="fa fa-plus" aria-hidden="true"></i> Nuevo Usuario
							</button>
						</a></h3>
			
	@include('administrador.persona.search')
		
	<div class="table-reponsive">
		<table class="table table-striped table-bordered">
			<thead style="background-color: #A9D0F5">
				<th>Usuario</th>
				<th>E-mail</th>
				<th>Perfil</th>
				<th>Estado</th>
				<th>Acci&oacute;n</th>
			</thead>
				@foreach($users as $usu)
				<tr>
					<td>{{$usu->username}}</td>
					<td>{{$usu->email}}</td>
					<td>{{$usu->role}}</td>
					<td>{{$usu->status}}</td>
					<td>
						<a href="{{URL::action('AdminPersonaController@edit',$usu->username)}}">
							<span class="label label-primary" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></span>
						</a>
						<a href="" data-target="#modal-delete-{{$usu->username}}" data-toggle="modal">
							<span class="label label-danger" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></span>
						</a>
					</td>
				</tr>
				
				@include('administrador.persona.modal')

				@endforeach
		</table>
	</div>
	
	{{ $users->render()}} <!--Para la paginacion -->

@endsection