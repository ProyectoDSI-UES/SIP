<!-- Add -->
<div class="modal fade" id="addnewplaza">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Agregar Plaza</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="plaza_add.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nombre_plaza" class="col-sm-3 control-label">Nombre</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nombre_plaza" name="nombre_plaza" required>
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

                    <div class="form-group">
                        <label for="id_departamento" class="col-sm-3 control-label">Departamento</label>

                        <div class="col-sm-9">
                            <select class="form-control select2" name="id_departamento" id="id_departamento" required>
                                <?php
                                $queryc = mysqli_query($conn, "SELECT * FROM  departamento;") or die(mysqli_error($conn));
                                while ($rowc = mysqli_fetch_array($queryc)) {
                                ?>
                                    <option value="<?php echo $rowc['id_departamento']; ?>"><?php echo $rowc['nombre_departamento']; ?>
                                    </option>
                                <?php } ?>
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