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
			$nom_cliente = $_POST["nombre"];
			$ced_cliente = $_POST["cedula"];
			$tel_cliente = $_POST["telefono"];
			$dir_cliente = $_POST["direccion"];

			$sabor = $_POST["sabor"];
			$tamaño = $_POST["tamaño"];
			$cantidad = $_POST["cantidad"];
			$decoracion = $_POST["decoracion"];
			$fecha_pedido = $_POST["fecha_pedido"];
			$fecha_entrega = $_POST["fecha_entrega"];
			$diseño = "img2/" . basename($_FILES['diseño']['name']);
			$descripcion = $_POST["descripcion"];
			$abono = $_POST["abono"];
			$preciototal = $_POST["preciototal"];
			
			if(!empty($nom_cliente) && !empty($ced_cliente) && !empty($tel_cliente) && !empty($dir_cliente)){

				$sql_bus = $conexion->prepare("SELECT * FROM clientes WHERE cedula=?");
				$sql_bus->bind_param('i',$ced_cliente);
				$sql_bus->execute();
				$results = $sql_bus->get_result()->fetch_assoc();

				if(count($results) == 0){
					$sql_cliente= $conexion->prepare("INSERT INTO clientes (cedula,nombre,telefono,direccion) VALUES (?,?,?,?)");
					$sql_cliente->bind_param('isss', $ced_cliente,$nom_cliente,$tel_cliente,$dir_cliente);
					$sql_cliente->execute();
				}

				if(!empty($sabor) && !empty($tamaño) && !empty($cantidad) && !empty($decoracion) && !empty($fecha_pedido) && !empty($fecha_entrega) && !empty($diseño) && !empty($abono) && !empty($preciototal)){
					$sql = $conexion->prepare("INSERT INTO registro_cupcake (ced_cliente,estado,sabor,tamano,cantidad,decoracion,fecha_pedido,fecha_entrega,diseno,descripcion,abono,total,saldo)
									VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
					$estado = "Pedido_recibido";
					$saldo = $preciototal-$abono;
					$sql->bind_param('isssisssssiii',$ced_cliente,$estado,$sabor,$tamaño,$cantidad,$decoracion,$fecha_pedido,$fecha_entrega,$diseño,$descripcion,$abono,$preciototal,$saldo);
					if($sql->execute()){
						if (move_uploaded_file($_FILES['diseño']['tmp_name'], $diseño)) {
							echo "<div class='alert alert-danger'> Correcto </div>";
						}else{
							echo "<div class='alert alert-danger'> Incorrecto </div>";
						}
						echo "<script> alert('Pedido registrado con exito');
						window.location='2-registrar_cupcakes.php'; </script>";
					}else{
						echo "<script> alert('Error');
						window.location='2-registrar_cupcakes.php'; </script>";
					}	
				}else{
					echo "<script> alert('Debes llenar toda la información del pastel');
						window.location='2-registrar_cupcakes.php'; </script>";
				}
			}else{
				echo "<script> alert('Debes llenar toda la información del cliente');
						window.location='2-registrar_cupcakes.php'; </script>";
			}
		}
	}else{
		echo "<script> alert('Debes ingresar');
						window.location='index.html'; </script>";
	}	
?>