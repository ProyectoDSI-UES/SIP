<!-- Add -->
<div class="modal fade" id="addnewrol">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Agregar rol</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="roles_add.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nombre_rol" class="col-sm-3 control-label">Nombre</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nombre_rol" name="nombre_rol" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="descripcion" class="col-sm-3 control-label">Descripción</label>

                        <div class="col-sm-9">
                            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="estado" class="col-sm-3 control-label">Estado</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="estado" name="estado" required>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
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