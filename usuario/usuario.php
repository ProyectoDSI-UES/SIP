<?php include '../includes/session.php'; ?>
<?php include '../includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include '../includes/navbar.php'; ?>
    <?php include '../includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Lista de empleados
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
          <li>Empleados</li>
          <li class="active">Lista de empleados</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <?php
        if (isset($_SESSION['error'])) {
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
          unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Hecho!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
          unset($_SESSION['success']);
        }
        ?>

        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header with-border">
                <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nuevo</a>
              </div>
              <div class="box-body">
                <table id="example1" class="table table-bordered">

                  <thead>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>DUI</th> <!-- Nueva columna para DUI -->
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Usuario</th> <!-- Cambiado de "Usuario" a "Rol" -->
                    <th>Fecha Nacimiento</th>
                    <th>Dirección</th>
                    <th>Nacionalidad</th>
                    <th>Salario</th>
                    <th>Opciones</th>
                  </thead>

                  <tbody>
                    <?php
                    // Consulta para obtener los datos de usuario y el nombre del rol
                    $sql = "SELECT usuario.*, roles.nombre_rol, usuario.id AS id_user 
                            FROM usuario 
                            JOIN roles ON usuario.id_rol = roles.id_rol";

                    // Ejecutar la consulta
                    $query = $conn->query($sql);

                    // Verificar si la consulta fue exitosa
                    if (!$query) {
                      die("Error en la consulta SQL: " . $conn->error);
                    }

                    // Iterar sobre los resultados
                    while ($row = $query->fetch_assoc()) {
                      $id_user = $row['id_user'];
                    ?>
                      <tr>
                        <!-- Mostrar imagen del usuario -->
                        <td><img src="subir_us/<?php echo $row['imagen']; ?>" style="height:50px" /></td>

                        <!-- Mostrar nombre completo del usuario -->
                        <td><?php echo $row['nombre'] . ' ' . $row['apellido']; ?></td>

                        <!-- Mostrar DUI del usuario -->
                        <td><?php echo $row['dui']; ?></td>

                        <!-- Mostrar otros campos -->
                        <td><?php echo $row['correo']; ?></td>
                        <td><?php echo $row['telefono']; ?></td>

                        <!-- Mostrar el nombre del rol -->
                        <td><?php echo $row['nombre_rol']; ?></td>

                        <td><?php echo $row['fecha_nacimiento']; ?></td>
                        <td><?php echo $row['direccion']; ?></td>
                        <td><?php echo $row['nacionalidad']; ?></td>
                        <td><?php echo $row['salario']; ?></td>

                        <!-- Opciones para editar/eliminar -->
                        <td>
                          <a class="btn btn-danger btn-print" href="<?php echo "editar_usuario.php?id_user=$id_user"; ?>" role="button">Editar</a>

                          <a class="small-box-footer btn-print" href="<?php echo "eliminar_usuario.php?id_user=$id_user"; ?>"><i class="glyphicon glyphicon-remove" onClick="return confirm('¿Está seguro de que quieres eliminar este usuario?');"></i></a>

                          <a class="small-box-footer btn-print" href="<?php echo "editar_password.php?id_user=$id_user"; ?>"><i class="glyphicon glyphicon-lock"></i></a>
                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <?php include '../includes/footer.php'; ?>
    <?php include 'modal/usuario_modal.php'; ?>
  </div>
  <?php include '../includes/scripts.php'; ?>

</body>

</html>
