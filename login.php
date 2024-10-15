<?php
session_start();
include 'includes/conn.php';

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$pass = md5($password);
	$salt = "a1Bz20ydqelm8m1wql";
	$pass = $salt . $pass;

	// Verificación de la existencia del usuario en BD
	$sql = "SELECT * FROM usuario WHERE usuario = '$username'";
	$query = $conn->query($sql);

	if ($query->num_rows < 1) {
		$_SESSION['error'] = 'No se puede encontrar la cuenta con el nombre de usuario.';
	} else {
		$row = $query->fetch_assoc();

		// Verificando contraseña
		if (($pass == $row['password'])) {

			// Verificando si el usuario está activo en el sistema
			if($row['estado'] == 1){
				$_SESSION['admin'] = $row['id'];
			} else {
				$_SESSION['error'] = 'Cuenta inactiva. Contactese con RRHH.';
			}
			
		} else {
			$_SESSION['error'] = 'Contraseña incorrecta.';
		}
	}
} else {
	$_SESSION['error'] = 'Ingrese las credenciales de administrador ';
}

header('location: index.php');
