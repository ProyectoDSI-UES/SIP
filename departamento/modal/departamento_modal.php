<!-- Add -->
<div class="modal fade" id="addnew">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><b>Agregar departamento</b></h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" method="POST" action="departamento_add.php" enctype="multipart/form-data">
					<div class="form-group">
						<label for="nombre_departamento" class="col-sm-3 control-label">Nombre departamento</label>

						<div class="col-sm-9">
							<input type="text" class="form-control" id="nombre_departamento" name="nombre_departamento" required>
						</div>
					</div>
					<div class="form-group">
						<label for="descripcion" class="col-sm-3 control-label">Descripción</label>
						<div class="col-sm-9">
							<textarea class="form-control" id="descripcion" name="descripcion"></textarea>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
				<button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Guardar</button>
				</form>
			</div>
		</div>
	</div>
</div>