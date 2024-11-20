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
                    Lista de solicitudes
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    <li>Vacación</li>
                    <li class="active">Lista de solicitudes</li>
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
                                <a href="#addnewvacacion" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nuevo</a>
                            </div>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <th>Empleado</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Finalización</th>
                                        <th>Comentarios</th>
                                        <th>Estado</th>
                                        <th>Herramientas</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT 
          CONCAT(usuario.nombre, ' ', usuario.apellido) AS empleado, 
          solicitudes_vacaciones.fecha_inicio, 
          solicitudes_vacaciones.fecha_fin, 
          solicitudes_vacaciones.comentarios, 
          solicitudes_vacaciones.estado,
          solicitudes_vacaciones.id_solicitud 
        FROM 
          solicitudes_vacaciones 
        JOIN usuario ON solicitudes_vacaciones.id_empleado = usuario.id
        WHERE solicitudes_vacaciones.id_empleado = ?"; // Filtro por el empleado en sesión

                                        $stmt = $conn->prepare($sql);
                                        $stmt->bind_param('i', $_SESSION['admin']); // Vincula el ID del usuario en sesión
                                        $stmt->execute();
                                        $result = $stmt->get_result();

                                        while ($row = $result->fetch_assoc()) {
                                            $id_solicitud = $row['id_solicitud'];
                                            $estado = ($row['estado'] == 'Pendiente') ? 'Pendiente' : (($row['estado'] == 'Aprobado') ? 'Aprobado' : 'Rechazado');
                                        ?>
                                            <tr>
                                                <td><?php echo $row['empleado']; ?></td>
                                                <td><?php echo $row['fecha_inicio']; ?></td>
                                                <td><?php echo $row['fecha_fin']; ?></td>
                                                <td><?php echo $row['comentarios']; ?></td>
                                                <td><?php echo $estado; ?></td>
                                                <td>
                                                    <a class="btn btn-danger btn-print" href="<?php echo "editar_vacaciones.php?id_solicitud=$id_solicitud"; ?>" role="button">Editar</a>
                                                    <a class="small-box-footer btn-print" href="<?php echo "eliminar_vacaciones.php?id_solicitud=$id_solicitud"; ?>"><i class="glyphicon glyphicon-remove" onClick="return confirm('¿Está seguro de que quieres eliminar esta plaza?');"></i></a>
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
        <?php include 'modal/vacaciones_modal.php'; ?>
    </div>
    <?php include '../includes/scripts.php'; ?>

</body>

</html>