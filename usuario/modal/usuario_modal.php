<!-- Add -->
<div class="modal fade" id="addnew">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Agregar empleado</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="usuario_add.php" enctype="multipart/form-data"
          onsubmit="return validarDatos()">

          <div class="form-group">
            <label for="nombre" class="col-sm-3 control-label">Nombres</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
          </div>

          <div class="form-group">
            <label for="apellido" class="col-sm-3 control-label">Apellidos</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="apellido" name="apellido" required>
            </div>
          </div>

          <div class="form-group">
            <label for="dui" class="col-sm-3 control-label">DUI</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="dui" name="dui" placeholder="00000000-0" maxlength="10">
            </div>
          </div>

          <div class="form-group">
            <label for="telefono" class="col-sm-3 control-label">Teléfono</label>
            <div class="col-sm-9">
              <input class="form-control" name="telefono" id="telefono" required pattern="\d{8}"
                title="Debe ser un número de 8 dígitos" placeholder="00000000" maxlength="8"></input>
            </div>
          </div>

          <div class="form-group">
            <label for="correo" class="col-sm-3 control-label">Correo</label>

            <div class="col-sm-9">
              <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
          </div>
          <div class="form-group">
            <label for="fecha_nacimiento" class="col-sm-3 control-label">Fecha nacimiento</label>

            <div class="col-sm-9">
              <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>
          </div>

          <div class="form-group">
            <label for="direccion" class="col-sm-3 control-label">Dirección</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>
          </div>

          <div class="form-group">
            <label for="nacionalidad" class="col-sm-3 control-label">Nacionalidad</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" required>
            </div>
          </div>

          <div class="form-group">
            <label for="roles" class="col-sm-3 control-label">Departamento</label>

            <div class="col-sm-9">
              <select class="form-control select2" name="id_departamento" id="id_departamento" required>


                <?php

                $queryc = mysqli_query($conn, "SELECT * FROM  departamento  ") or die(mysqli_error($conn));
                while ($rowc = mysqli_fetch_array($queryc)) {
                ?>
                  <option value="<?php echo $rowc['id_departamento']; ?>"><?php echo $rowc['nombre_departamento']; ?>
                  </option>
                <?php } ?>
              </select>


            </div>
          </div>


          <div class="form-group">
            <label for="plazas" class="col-sm-3 control-label">Plaza</label>

            <div class="col-sm-9">
              <select class="form-control select2" name="id_plaza" id="id_plaza" required>
              </select>


            </div>
          </div>

          <div class="form-group">
            <label for="salario" class="col-sm-3 control-label">Salario</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="salario" name="salario" required>
            </div>
          </div>

          <div class="form-group">
            <label for="usuario" class="col-sm-3 control-label">Usuario</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="usuario" name="usuario" required>
            </div>
          </div>

          <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Contraseña</label>

            <div class="col-sm-9">
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
          </div>


          <div class="form-group">
            <label for="password2" class="col-sm-3 control-label">Repitir contraseña</label>

            <div class="col-sm-9">
              <input type="password" class="form-control" id="password2" name="password2">
            </div>
          </div>

          <div class="form-group">
            <label for="id_rol" class="col-sm-3 control-label">Rol</label>
            <div class="col-sm-9">
              <select class="form-control select2" name="id_rol" required>
                <?php
                $query_roles = mysqli_query($conn, "SELECT * FROM roles") or die(mysqli_error($conn));
                while ($row_roles = mysqli_fetch_array($query_roles)) {
                ?>
                  <option value="<?php echo $row_roles['id_rol']; ?>"><?php echo $row_roles['nombre_rol']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="estado" class="col-sm-3 control-label">Estado</label>
            <div class="col-sm-9">
              <select class="form-control" name="estado" id="estado" required>
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
              </select>
            </div>
          </div>



          <div class="form-group">
            <label for="imagen" class="col-sm-3 control-label">Foto</label>

            <div class="col-sm-9">
              <input type="file" name="imagen" id="imagen">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
            class="fa fa-close"></i>
          Cerrar</button>
        <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> GUARDAR</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="./validaciones.js"></script>