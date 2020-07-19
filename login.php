<?php
	$usuario= $_POST["usuario"];
	$contraseña = $_POST["contraseña"]; 

	session_start();

	//$conexion=Conexion con base de datos;

	if(!empty($usuario) && !empty($contraseña)){
		$sql='SELECT id, usuario, contraseña FROM usuarios WHERE usuario=?';
		$records = $conexion->prepare($sql);
		$records->bind_param('s', $usuario);
		$records->execute();
		$results = $records->get_result()->fetch_assoc();
		$hash=$results['contraseña'];

		if(count($results)> 0 && password_verify($contraseña, $hash)){
			$_SESSION['user_id'] = $results['id'];
			header('Location: inicio.php');

		}else{
			echo "<script> alert('Usuario o contraseña incorrecta');
							window.location='index.html'; </script>";
		}
	}else{
		echo "<script> alert('Debes llenar todos los campos');
					window.location='index.html'; </script>";
	}

?>