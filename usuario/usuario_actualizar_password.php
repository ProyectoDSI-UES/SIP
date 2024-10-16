<?php session_start();
if (empty($_SESSION['id'])):
endif;
include('../includes/conn.php');

$cid = $_POST['id_usuario'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

if ($password == $password2) {
	# code...

	//encriptando contraseña
	$pass = md5($password);
	$salt = "a1Bz20ydqelm8m1wql";
	$pass = $salt . $pass;
	///finzalizo encriptacion

	mysqli_query($conn, "update usuario set password='$pass' where id='$cid'") or die(mysqli_error($conn));

	echo "<script type='text/javascript'>alert('Actualizado correctamente!');</script>";
	echo "<script>document.location='../usuario/usuario.php'</script>";
} else {


	echo "<script type='text/javascript'>alert('Error contraseñas no coinciden!');</script>";
	echo "<script>document.location='../usuario/usuario.php'</script>";
}



?>
