<?php
	//$conexion=Conexion con base de datos;

	$nom = $_POST["nombres"];
	$ape = $_POST["apellidos"];
	$ced = $_POST["cedula"];
	$cor = $_POST["correo"];
	$tel = $_POST["telefono"];
	$cargo = $_POST["cargo"];
	$usu = $_POST["usuario"];
	$con = $_POST["contraseña"];
	$confcon = $_POST["confirmarcontraseña"];

	if(!empty($nom) && !empty($ape) && !empty($ced) && !empty($cor) && !empty($tel) && !empty($cargo) && !empty($usu) && !empty($con) && !empty($confcon)){
		if($con == $confcon){
			$pwd = password_hash($con,PASSWORD_BCRYPT);
			$sql = "INSERT INTO usuarios(nombres, apellidos, cedula, correo, telefono, cargo, usuario, contraseña) 
					VALUES (?,?,?,?,?,?,?,?)";
			$stmt = $conexion->prepare($sql);
			$stmt->bind_param('ssisisss',$nom,$ape,$ced,$cor,$tel,$cargo,$usu,$pwd);
			if ($stmt->execute()){
				echo "<script> alert('Se registro correctamente');
						window.location='signup.html'; </script>";
			}else{
				echo "<script> alert('Error al registrar');
						window.location='signup.html'; </script>";
			}
		}else{
			echo "<script> alert('Error en contraseña');
						window.location='signup.html'; </script>";
		}
	}else{
		echo "<script> alert('Debes llenar todos los campos');
						window.location='signup.html'; </script>";
	}
	$conexion->close();
?>