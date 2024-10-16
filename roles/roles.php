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
          Lista de roles
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
          <li>Roles</li>
          <li class="active">Lista de roles</li>
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
                <a href="#addnewrol" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nuevo</a>
              </div>
              <div class="box-body">
                <table id="example1" class="table table-bordered">
                  <thead>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>

                    <th>Herramientas</th>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM roles WHERE estado = 1"; // Mostrando los roles cuyo estado sea activo (1)
                    $query = $conn->query($sql);
                    while ($row = $query->fetch_assoc()) {
                      $id_rol = $row['id_rol'];

                      $estado = ($row['estado'] == 1) ? 'Activo' : 'Inactivo';
                    ?>
                      <tr>
                        <td><?php echo $row['nombre_rol']; ?></td>
                        <td><?php echo $row['descripcion']; ?></td>
                        <td><?php echo $estado; ?></td>
                        <td>
                          <a class="btn btn-danger btn-print" href="<?php echo "editar_roles.php?id_rol=$id_rol"; ?>" role="button">Editar</a>
                          <a class="small-box-footer btn-print" href="<?php echo "eliminar_roles.php?id_rol=$id_rol"; ?>"><i class="glyphicon glyphicon-remove" onClick="return confirm('¿Está seguro de que quieres eliminar este rol?');"></i></a>
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
    <?php include 'modal/roles_modal.php'; ?>
  </div>
  <?php include '../includes/scripts.php'; ?>

</body>

</html>