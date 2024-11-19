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
		if (!empty($_FILES['imagen']['name'])) {
			$target_dir = "subir_us/";
			$target_file = $target_dir . basename($_FILES["imagen"]["name"]);
			$uploadok = 1;
			$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
			$check = getimagesize($_FILES["imagen"]["tmp_name"]);

			if (file_exists($target_file)) {
				echo "Lo siento, el archivo ya existe.";
				$uploadok = 0;
			}

			if ($_FILES["imagen"]["size"] > 500000) {
				echo "Lo siento, tu archivo es demasiado grande.";
				$uploadok = 0;
			}

			if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
				$img = basename($_FILES["imagen"]["name"]);

				$pass = md5($password);
				$salt = "a1Bz20ydqelm8m1wql";
				$pass = $salt . $pass;

				mysqli_query($conn, "INSERT INTO usuario(usuario,password,imagen,nombre,apellido,telefono,correo,fecha_nacimiento,direccion,nacionalidad,id_departamento,dui, estado, id_rol, id_plaza)
				VALUES('$usuario','$pass','$img','$nombre','$apellido','$telefono','$correo','$fecha_nacimiento','$direccion','$nacionalidad','$id_departamento','$dui','$estado','$id_rol','$id_plaza')") or die(mysqli_error($conn));

				echo "<script>document.location='usuario.php'</script>";
			} else {
				echo "No se pudo subir.";
			}

			if (!isset($id_plaza) || empty($id_plaza)) {
				echo "<script type='text/javascript'>alert('Por favor, seleccione una plaza válida.');</script>";
				echo "<script>document.location='usuario.php'</script>";
				exit();
			}
		} else {
			$pass = md5($password);
			$salt = "a1Bz20ydqelm8m1wql";
			$pass = $salt . $pass;

			mysqli_query($conn, "INSERT INTO usuario(usuario,password,imagen,nombre,apellido,telefono,correo,fecha_nacimiento,direccion,nacionalidad,id_departamento, dui, estado, id_rol, id_plaza)
				VALUES('$usuario','$pass','','$nombre','$apellido','$telefono','$correo','$fecha_nacimiento','$direccion','$nacionalidad','$id_departamento','$dui','$estado','$id_rol','$id_plaza')") or die(mysqli_error($conn));

			echo "<script>document.location='usuario.php'</script>";
		}
	}
} else {
	echo "<script type='text/javascript'>alert('Error: Las contraseñas no coinciden. Registre de nuevo!');</script>";
}
?>