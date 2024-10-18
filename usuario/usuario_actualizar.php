<?php session_start();
if (empty($_SESSION['id'])):
endif;
include('../includes/conn.php');

$cid = $_POST['id_usuario'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$direccion = $_POST['direccion'];
$nacionalidad = $_POST['nacionalidad'];
$salario = $_POST['salario'];
$id_plaza = $_POST['id_plaza'];
$id_departamento = $_POST['id_departamento'];
$dui = $_POST['dui'];
$id_rol = $_POST['id_rol'];


if (!empty($_FILES['imagen']['name'])) {
	# code...


	$target_dir = "subir_us/";
	$target_file = $target_dir . basename($_FILES["imagen"]["name"]);
	$uploadok = 1;
	$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
	//check if image file is a actual image or fake image
	$check = getimagesize($_FILES["imagen"]["tmp_name"]);
	if ($check !== false) {
		echo "Archivo es una imagen - " . $check["mime"] . ".";
		$uploadok = 1;
	} else {
		echo "El archivo no es una imagen.";
		$uploadok = 0;
	}


	//check if file already exists
	if (file_exists($target_file)) {
		echo "Lo siento, el archivo ya existe.";
		$uploadok = 0;
	}

	//check file size
	if ($_FILES["imagen"]["size"] > 500000) {
		echo "Lo siento, tu archivo es demasiado grande.";
		$uploadok = 0;
	}

	if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
		$img = basename($_FILES["imagen"]["name"]);
		mysqli_query($conn, "UPDATE usuario SET usuario='$usuario', imagen='$img', nombre='$nombre', apellido='$apellido', telefono='$telefono', correo='$correo', fecha_nacimiento='$fecha_nacimiento', direccion='$direccion', nacionalidad='$nacionalidad', salario='$salario', id_departamento='$id_departamento', dui='$dui', id_rol='$id_rol', id_plaza='$id_plaza' WHERE id='$cid'") or die(mysqli_error($conn));

		echo "<script>document.location='usuario.php'</script>";
	} else {
		echo "No se pudo subir.";
	}
} else {
	mysqli_query($conn, "UPDATE usuario SET usuario='$usuario', nombre='$nombre', apellido='$apellido', telefono='$telefono', correo='$correo', fecha_nacimiento='$fecha_nacimiento', direccion='$direccion', nacionalidad='$nacionalidad', salario='$salario', id_departamento='$id_departamento', dui='$dui', id_rol='$id_rol' , id_plaza='$id_plaza' WHERE id='$cid'") or die(mysqli_error($conn));

	echo "<script>document.location='usuario.php'</script>";
}
