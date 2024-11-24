<?php
session_start();
include('../includes/conn.php');

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$direccion = $_POST['direccion'];
$nacionalidad = $_POST['nacionalidad'];
$id_departamento = $_POST['id_departamento'];
$id_plaza = $_POST['id_plaza'];
$dui = $_POST['dui'];
$estado = $_POST['estado'];
$id_rol = $_POST['id_rol'];

$total = 0;

if ($password == $password2) {
    $query2 = mysqli_query($conn, "SELECT * FROM usuario WHERE usuario='$usuario'") or die(mysqli_error($conn));
    $count = mysqli_num_rows($query2);

    if ($count > 0) {
        echo "<script type='text/javascript'>alert('Usuario ya existe!');</script>";
        echo "<script>document.location='usuario.php'</script>";
    } else {
        // Encriptar password
        $pass = md5($password);
        $salt = "a1Bz20ydqelm8m1wql";
        $pass = $salt . $pass;

        // Primero insertar el usuario para obtener su ID
        $query = mysqli_query($conn, "INSERT INTO usuario(usuario,password,nombre,apellido,telefono,correo,fecha_nacimiento,direccion,nacionalidad,id_departamento,dui,estado,id_rol,id_plaza)
            VALUES('$usuario','$pass','$nombre','$apellido','$telefono','$correo','$fecha_nacimiento','$direccion','$nacionalidad','$id_departamento','$dui','$estado','$id_rol','$id_plaza')") or die(mysqli_error($conn));
        
        // Obtener el ID del usuario recién insertado
        $id_usuario = mysqli_insert_id($conn);
        
        // Manejo de la imagen
        $target_dir = "subir_us/";
        $imagen_final = "";
        
        if (!empty($_FILES['imagen']['name'])) {
            // Obtener la extensión del archivo
            $imagefiletype = pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION);
            
            // Obtener el último número correlativo de la base de datos
            $query_correlativo = mysqli_query($conn, "SELECT MAX(CAST(SUBSTRING_INDEX(imagen, '_', -1) AS UNSIGNED)) as ultimo_numero 
                                                    FROM usuario 
                                                    WHERE imagen != 'default_user.png' 
                                                    AND imagen REGEXP '^imagen_[0-9]+\.'");
            $row_correlativo = mysqli_fetch_assoc($query_correlativo);
            $ultimo_numero = $row_correlativo['ultimo_numero'];
            
            // Si es NULL o 0, empezar desde 1
            $nuevo_numero = ($ultimo_numero === NULL || $ultimo_numero === 0) ? 1 : $ultimo_numero + 1;
            
            // Crear el nuevo nombre de archivo
            $nuevo_nombre = "imagen_" . $nuevo_numero . "." . $imagefiletype;
            $target_file = $target_dir . $nuevo_nombre;
            $uploadok = 1;
            
            // Verificar el tamaño de la imagen
            if ($_FILES["imagen"]["size"] > 500000) {
                echo "<script type='text/javascript'>alert('La imagen es demasiado grande. Se usará la imagen predeterminada.');</script>";
                $uploadok = 0;
            }
            
            // Verificar tipos de archivo permitidos
            $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
            if (!in_array(strtolower($imagefiletype), $allowed_types)) {
                echo "<script type='text/javascript'>alert('Solo se permiten archivos JPG, JPEG, PNG y GIF.');</script>";
                $uploadok = 0;
            }
            
            // Subir la imagen con el nuevo nombre
            if ($uploadok && move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
                $imagen_final = $nuevo_nombre;
            } else {
                // Si hay error al subir, usar imagen predeterminada
                $imagen_final = "default_user.png";
            }
        } else {
            // Si no se subió imagen, usar la predeterminada
            $imagen_final = "default_user.png";
        }
        
        // Actualizar el registro del usuario con el nombre de la imagen
        mysqli_query($conn, "UPDATE usuario SET imagen='$imagen_final' WHERE id=$id_usuario") or die(mysqli_error($conn));

        if (!isset($id_plaza) || empty($id_plaza)) {
            echo "<script type='text/javascript'>alert('Por favor, seleccione una plaza válida.');</script>";
            echo "<script>document.location='usuario.php'</script>";
            exit();
        }

        echo "<script>document.location='usuario.php'</script>";
    }
} else {
    echo "<script type='text/javascript'>alert('Error: Las contraseñas no coinciden. Registre de nuevo!');</script>";
}
?>