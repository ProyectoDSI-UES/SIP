<?php
include '../includes/session.php';


$id_emppleado = $user['id'];
$password_actual = $_POST['password_actual'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];

$passactual = md5($password_actual);
$salt = "a1Bz20ydqelm8m1wql";
$password_actual1 = $salt . $passactual;



$pass = md5($password);
$salt = "a1Bz20ydqelm8m1wql";
$password1 = $salt . $pass;



if (!empty($_FILES['imagen']['name'])) {
	# code...


	$target_dir = "../usuario/subir_us/";
	$target_file = $target_dir . basename($_FILES["imagen"]["name"]);
	$uploadok = 1;
	$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
	//check if image file is a actual image or fake image
	$check = getimagesize($_FILES["imagen"]["tmp_name"]);
	if ($check !== false) {
		echo "archivo es una imagen - " . $check["mime"] . ".";
		$uploadok = 1;
	} else {
		echo "el archivo no es una imagen.";
		$uploadok = 0;
	}


	//check if file already exists
	if (file_exists($target_file)) {
		echo "lo siento, el archivo ya existe.";
		$uploadok = 0;
	}

	//check file size
	if ($_FILES["imagen"]["size"] > 500000) {
		echo "lo siento, tu archivo es demasiado grande.";
		$uploadok = 0;
	}



	if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {

		$img = basename($_FILES["imagen"]["name"]);


		mysqli_query($conn, "update usuario set usuario='$usuario',imagen='$img',nombre='$nombre',apellido='$apellido',password='$password1' where id='$id_emppleado'") or die(mysqli_error($conn));

		echo "<script type='text/javascript'>alert(' actualizado correctamente!');</script>";
		echo "<script>document.location='../includes/home.php'</script>";
	} else {
		echo "No se pudo subir.";
	}
}
