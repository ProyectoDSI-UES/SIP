<!-- Add -->
<div class="modal fade" id="profile">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Perfil</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="../usuario/usuario_actualizar_password.php" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Contraseña</label>

                    <div class="col-sm-9"> 
                           <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $user['id']; ?>">
                      <input type="password" class="form-control" id="password" name="password" placeholder="escriba el password" required>
                    </div>
                </div>

                <hr>
                <div class="form-group">
                    <label for="password2" class="col-sm-3 control-label">Repetir nueva contraseña:</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password2" name="password2" placeholder="repita el password" required>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            	<button type="submit" class="btn btn-success btn-flat" name="save"><i class="fa fa-check-square-o"></i> Guardar</button>
            	</form>
          	</div>
        </div>
    </div>
</div>