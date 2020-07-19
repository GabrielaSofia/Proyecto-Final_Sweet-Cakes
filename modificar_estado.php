<?php
	session_start();

	//$conexion=Conexion con base de datos;

	if(isset($_SESSION['user_id'])){
		$records = $conexion->prepare('SELECT id, correo, contraseña FROM usuarios WHERE id=? ;');
		$records->bind_param('i',$_SESSION['user_id']);
		$records->execute();
		$results = $records->get_result()->fetch_assoc();

		if(count($results)==0){
			echo "<script> alert('Debes Registrarte');
						window.location='signup.html'; </script>";
		}else{
			$id = $_POST["id"];
			$tipo=$_POST["tipo_pedido"];
			$estado =$_POST["estado"];

			if($tipo == "past"){
				$sql = "SELECT * FROM registro_pastel WHERE id=$id;";
				$resultado= mysqli_query($conexion, $sql);
				$total = mysqli_num_rows($resultado);

				if($total==0){
					echo "<script> alert('No existe un Pedido con esa ID');
							window.location='modificar.php'; </script>";
				}else{

					$sql_mod = "UPDATE registro_pastel SET estado=? WHERE id=?";
					$stmt = $conexion->prepare($sql_mod);
					$stmt->bind_param('si',$estado,$id);
					if ($stmt->execute()){
						echo "<script> alert('Se modifico el estado correctamente');
								window.location='modificar.php'; </script>";
					}else{
						echo "<script> alert('Error al modificar el estado');
								window.location='modificar.php'; </script>";
					}
				}
			}else{
				if($tipo == "cupc"){
					$sql = "SELECT * FROM registro_cupcake WHERE id=$id;";
					$resultado= mysqli_query($conexion, $sql);
					$total = mysqli_num_rows($resultado);

					if($total==0){
						echo "<script> alert('No existe un Pedido con esa ID');
								window.location='modificar.php'; </script>";
					}else{

						$sql_mod = "UPDATE registro_cupcake SET estado=? WHERE id=?";
						$stmt = $conexion->prepare($sql_mod);
						$stmt->bind_param('si',$estado,$id);
						if ($stmt->execute()){
							echo "<script> alert('Se modifico el estado correctamente');
									window.location='modificar.php'; </script>";
						}else{
							echo "<script> alert('Error al modificar el estado');
									window.location='modificar.php'; </script>";
						}
					}
				}else{
					if($tipo == "post"){
						$sql = "SELECT * FROM registro_postre WHERE id=$id;";
						$resultado= mysqli_query($conexion, $sql);
						$total = mysqli_num_rows($resultado);

						if($total==0){
							echo "<script> alert('No existe un Pedido con esa ID');
									window.location='modificar.php'; </script>";
						}else{

							$sql_mod = "UPDATE registro_postre SET estado=? WHERE id=?";
							$stmt = $conexion->prepare($sql_mod);
							$stmt->bind_param('si',$estado,$id);
							if ($stmt->execute()){
								echo "<script> alert('Se modifico el estado correctamente');
										window.location='modificar.php'; </script>";
							}else{
								echo "<script> alert('Error al modificar el estado');
										window.location='modificar.php'; </script>";
							}
						}
					}else{
						if($tipo == "gall"){
							$sql = "SELECT * FROM registro_galletas WHERE id=$id;";
							$resultado= mysqli_query($conexion, $sql);
							$total = mysqli_num_rows($resultado);
	
							if($total==0){
								echo "<script> alert('No existe un Pedido con esa ID');
										window.location='modificar.php'; </script>";
							}else{
	
								$sql_mod = "UPDATE registro_galletas SET estado=? WHERE id=?";
								$stmt = $conexion->prepare($sql_mod);
								$stmt->bind_param('si',$estado,$id);
								if ($stmt->execute()){
									echo "<script> alert('Se modifico el estado correctamente');
											window.location='modificar.php'; </script>";
								}else{
									echo "<script> alert('Error al modificar el estado');
											window.location='modificar.php'; </script>";
								}
							}
						}
					}
				}
			}
		}
	}else{
		echo "<script> alert('Debes ingresar');
						window.location='index.html'; </script>";
	}
	mysqli_close($conexion);
?>