<?php
	include '../includes/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'home.php';
	}

	if(isset($_POST['save'])){
		$password_actual = $_POST['password_actual'];
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$photo = $_FILES['imagen']['name'];
		$passactual=md5($password_actual);
$salt="a1Bz20ydqelm8m1wql";
$password_actual1=$salt.$passactual;



		$pass=md5($password);
$salt="a1Bz20ydqelm8m1wql";
$password1=$salt.$pass;
		if($password_actual1== $user['password']){
			if(!empty($imagen)){
				move_uploaded_file($_FILES['imagen']['tmp_name'], '../includes//imagen/'.$imagen);
				$filename = $imagen;	
			}
			else{
				$filename = $user['imagen'];
			}

			if($password == $user['password']){
				$password = $user['password'];
			}
			else{
				$password = $password;
			}

			$sql = "UPDATE usuario SET usuario = '$usuario', password = '$password1', nombre = '$nombre', apellido = '$apellido', imagen = '$filename' WHERE id = '".$user['id']."'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Perfil de administrador actualizado correctamente';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
			
		}
		else{
			$_SESSION['error'] = 'password Incorrecto';
		}
	}
	else{
		$_SESSION['error'] = 'Complete los detalles requeridos primero';
	}

	header('location:'.$return);

?>