<?php include '../includes/session.php'; ?>
<?php include '../includes/timezone.php'; ?>
<?php include '../includes/header.php'; ?>
<?php include 'get_modulos.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include '../includes/navbar.php'; ?>
    <?php include '../includes/menubar.php'; ?>

    <div class="content-wrapper">
      <section class="content-header">
        <h1>Dashboard</h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> Inicio</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <section class="content">
        <?php
        if (isset($_SESSION['error'])) {
          echo "<div class='alert alert-danger'>{$_SESSION['error']}</div>";
          unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
          echo "<div class='alert alert-success'>{$_SESSION['success']}</div>";
          unset($_SESSION['success']);
        }

        // Obtener rol del usuario
        $id_empleado = $user['id'];
        $sql_rol = "SELECT roles.nombre_rol FROM usuario JOIN roles ON usuario.id_rol = roles.id_rol WHERE usuario.id = ?";
        $stmt = $conn->prepare($sql_rol);
        $stmt->bind_param('i', $id_empleado);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $rol_usuario = $row['nombre_rol'];

        // Obtener módulos asignados al rol
        $modulos = getModulosPorRol($conn, $rol_usuario);

        echo "<div class='row'>";
        while ($modulo = $modulos->fetch_assoc()) {
          echo "
            <div class='col-lg-3 col-xs-6'>
              <div class='small-box bg-aqua'>
                <div class='inner'>
                  <h3>{$modulo['nombre']}</h3>
                </div>
                <div class='icon'>
                  <i class='fa fa-{$modulo['icono']}'></i>
                </div>
                <a href='{$modulo['ruta']}' class='small-box-footer'>Ir <i class='fa fa-arrow-circle-right'></i></a>
              </div>
            </div>
          ";
        }
        echo "</div>";
        ?>
      </section>
    </div>

    <?php include '../includes/footer.php'; ?>
    <?php include '../includes/scripts.php'; ?>

  </div>
</body>
</html>
