<aside class="main-sidebar">
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($user['imagen'])) ? '../usuario/subir_us/' . $user['imagen'] : '../layout/imagen/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $user['nombre'] . ' ' . $user['apellido']; ?></p>
        <a><i class="fa fa-circle text-success"></i> En línea</a>
      </div>
    </div>

    <!-- Sidebar menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENÚ</li>
      <li><a href="../includes/home.php"><i class="fa fa-dashboard"></i> <span>Inicio</span></a></li>

      <?php
      include_once 'get_modulos.php';

      $id_empleado = $user['id'];
      $sql_rol = "SELECT roles.nombre_rol FROM usuario 
                  JOIN roles ON usuario.id_rol = roles.id_rol 
                  WHERE usuario.id = ?";
      $stmt = $conn->prepare($sql_rol);
      $stmt->bind_param('i', $id_empleado);
      $stmt->execute();
      $result = $stmt->get_result();
      $row = $result->fetch_assoc();
      $rol_usuario = $row['nombre_rol'];

      // Obtener módulos asociados al rol
      $modulos = getModulosPorRol($conn, $rol_usuario);

      // Mostrar encabezado con el nombre del rol
      echo '<li class="header">' . strtoupper($rol_usuario) . ' MENU</li>';

      // Mostrar cada módulo en el menú
      while ($modulo = $modulos->fetch_assoc()) {
        echo '<li>
                <a href="' . $modulo['ruta'] . '">
                  <i class="fa fa-' . $modulo['icono'] . '"></i>
                  <span>' . $modulo['nombre'] . '</span>
                </a>
              </li>';
      }
      ?>
    </ul>
  </section>
</aside>
