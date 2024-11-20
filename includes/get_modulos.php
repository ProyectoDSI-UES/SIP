<?php
function getModulosPorRol($conn, $rol_usuario) {
  $sql_modulos = "SELECT modulos.id_modulo, modulos.nombre, modulos.icono, modulos.ruta
                  FROM modulos
                  JOIN rol_modulos ON modulos.id_modulo = rol_modulos.id_modulo
                  JOIN roles ON rol_modulos.id_rol = roles.id_rol
                  WHERE roles.nombre_rol = ?";
  $stmt_modulos = $conn->prepare($sql_modulos);
  $stmt_modulos->bind_param('s', $rol_usuario); // 's' para string
  $stmt_modulos->execute();
  return $stmt_modulos->get_result();
}
?>
