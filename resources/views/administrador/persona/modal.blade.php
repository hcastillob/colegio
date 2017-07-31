<div class="modal fade modal-slide-in-righ" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$usu->username}}">
	{{Form::Open(array('action'=>array('AdminPersonaController@destroy',$usu->username),'method'=>'DELETE'))}}
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">x</span>
					</button>
					<h4 class="modal-title">Eliminar Curso</h4>
				</div>
				<div class="modal-body">
					<p>¿Estás seguro de eliminar el curso {{$usu->username}}?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-danger">Confirmar</button>
				</div>
			</div>
		</div>
	{{Form::Close()}}
</div>