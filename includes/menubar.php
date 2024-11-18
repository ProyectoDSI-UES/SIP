<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($user['imagen'])) ? '../usuario/subir_us/' . $user['imagen'] : '../layout/imagen/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $user['nombre'] . ' ' . $user['apellido']; ?></p>
        <a><i class="fa fa-circle text-success"></i>En línea</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENÚ</li>
      <li class=""><a href="../includes/home.php"><i class="fa fa-dashboard"></i> <span>Inicio</span></a></li>

      <?php
      // Obtener el ID del usuario actual
      $id_empleado = $user['id'];

      // Consulta para obtener el rol del usuario
      $sql = "SELECT roles.nombre_rol FROM usuario 
              JOIN roles ON usuario.id_rol = roles.id_rol 
              WHERE usuario.id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param('i', $id_empleado); // 'i' indica que es un integer
      $stmt->execute();
      $result = $stmt->get_result();
      $row = $result->fetch_assoc();

      // Almacenar el nombre del rol
      $rol_usuario = $row['nombre_rol'];

      // Obtener los módulos asociados al rol
      $sql_modulos = "SELECT modulos.id_modulo, modulos.nombre, modulos.icono, modulos.ruta
                      FROM modulos
                      JOIN rol_modulos ON modulos.id_modulo = rol_modulos.id_modulo
                      JOIN roles ON rol_modulos.id_rol = roles.id_rol
                      WHERE roles.nombre_rol = ?";
      $stmt_modulos = $conn->prepare($sql_modulos);
      $stmt_modulos->bind_param('s', $rol_usuario); // 's' indica que es un string
      $stmt_modulos->execute();
      $result_modulos = $stmt_modulos->get_result();

      // Mostrar los módulos en el menú
      ?>

      <li class="header"><?php echo strtoupper($rol_usuario); ?> MENU</li>

      <?php
      // Si el rol tiene módulos, los mostramos
      while ($modulo = $result_modulos->fetch_assoc()) {
        // Mostrar el nombre del módulo con el icono y la ruta correspondiente
        echo '<li class="">
                  <a href="' . $modulo['ruta'] . '">
                    <i class="fa fa-' . $modulo['icono'] . '"></i>
                    <span>' . $modulo['nombre'] . '</span>
                  </a>
                </li>';
      }

      ?>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>