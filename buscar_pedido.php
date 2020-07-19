<?php
	session_start();

	

	if(isset($_SESSION['user_id'])){
		$records = $conexion->prepare('SELECT id, correo, contraseña FROM usuarios WHERE id=? ;');
		$records->bind_param('i',$_SESSION['user_id']);
		$records->execute();
		$results = $records->get_result()->fetch_assoc();

		if(count($results)==0){
			echo "<script> alert('Debes Registrarte');
						window.location='signup.html'; </script>";
		}else{
			$tipo=$_POST["tipo_pedido"];
			$ced_cli=$_POST["ced"];

			$sql_cli = "SELECT * FROM clientes WHERE cedula=$ced_cli;";
			$resultado_cli= mysqli_query($conexion, $sql_cli);
			$datos_cli = mysqli_fetch_assoc($resultado_cli);
			$total_cli = mysqli_num_rows($resultado_cli);

			if($total_cli > 0){
				if($tipo == "past"){
					$sql = "SELECT * FROM registro_pastel;";
					$resultado= mysqli_query($conexion, $sql);
					$total = mysqli_num_rows($resultado);

					if($total==0){
						echo "<script> alert('El cliente no tiene pedidos');
								window.location='index.html'; </script>";
					}else{

						for($i = 1; $i<=$total; $i++){
							$sql2 = "SELECT * FROM registro_pastel WHERE id=$i;";
							$resultado2 = mysqli_query($conexion,$sql2);
							$datos = mysqli_fetch_assoc($resultado2);
							
							$cedula = $datos["ced_cliente"];
							$estado = $datos["estado"];
							$sabor = $datos["sabor"];
							$tamaño = $datos["tamano"];
							$cantidad = $datos["pisos"];
							$decoracion = $datos["decoracion"];
							$fecha_pedido = $datos["fecha_pedido"];
							$fecha_entrega = $datos["fecha_entrega"];
							$diseño = $datos["diseno"];
							$descripcion = $datos["descripcion"];
							$abono = $datos["abono"];
							$total = $datos["total"];
							$saldo = $datos["saldo"];

							$nom_cli =$datos_cli["nombre"];
							$tel_cli =$datos_cli["telefono"];
							$dir_cli =$datos_cli["direccion"];

							if ($cedula == $ced_cli){
								echo "<table class='tabla2'>";
								
								echo "<tr>";
								echo "<td colspan='4'> <img src='$diseño'/> </td>";
								echo "</tr>";

								echo "<tr><td colspan='4'><h3>INFORMACIÓN CLIENTE</h3></td></tr>";
								
								echo "<tr>";
								echo "<td> <h3>Nombre:</h3> </td>";
								echo "<td> $nom_cli</td>";
								echo "<td> <h3>Cedula:</h3> </td>";
								echo "<td> $cedula</td>";
								echo "</tr><tr>";
								echo "<td> <h3>Teléfono:</h3> </td>";
								echo "<td> $tel_cli </td>";
								echo "<td> <h3>Dirección:</h3> </td>";
								echo "<td> $dir_cli</td>";
								echo "</tr>";

								echo "<tr><td colspan='4'><h3>INFORMACIÓN PASTEL</h3></td></tr>";

								echo "<tr>";
								echo "<td> <h3>Fecha Pedido</h3> </td>";
								echo "<td> $fecha_pedido </td>";
								echo "<td> <h3>Fecha Entrega</h3> </td>";
								echo "<td> $fecha_entrega </td>";
								echo "</tr>";

								echo "<tr>";
								echo "<td> <h3>ID</h3> </td>";
								echo "<td> $i </td>";
								echo "<td> <h3>Estado</h3> </td>";
								echo "<td> $estado </td></tr>";

								echo "<tr>";
								echo "<td> <h3>Sabor</h3> </td>";
								echo "<td> $sabor </td>";
								echo "<td> <h3>Tamaño:</h3> </td>";
								echo "<td> $tamaño </td></tr>";
								
								echo "<tr>";
								echo "<td> <h3>Pisos:</h3> </td>";
								echo "<td> $cantidad </td>";
								echo "<td> <h3>Decoración:</h3> </td>";
								echo "<td> $decoracion </td> </tr>";

								echo "<tr>";
								echo "<td> <h3>Descripción:</h3> </td>";
								echo "<td> $descripcion </td>";
								echo "<td> <h3>Abono:</h3> </td>";
								echo "<td> $abono </td></tr>";

								echo "<tr>";
								echo "<td> <h3>Total:</h3> </td>";
								echo "<td> $total </td>";
								echo "<td> <h3>Saldo:</h3> </td>";
								echo "<td>$saldo</td></tr>";

								
								echo "</table>";
								break;
							}	
						}
					}
				}else{
					if($tipo == "cupc"){
						$sql = "SELECT * FROM registro_cupcake;";
						$resultado= mysqli_query($conexion, $sql);
						$total = mysqli_num_rows($resultado);

						if($total==0){
							echo "<script> alert('El cliente no tiene pedidos');
									window.location='index.html'; </script>";
						}else{

							for($i = 1; $i<=$total; $i++){
								$sql2 = "SELECT * FROM registro_cupcake WHERE id=$i;";
								$resultado2 = mysqli_query($conexion,$sql2);
								$datos = mysqli_fetch_assoc($resultado2);
								
								$cedula = $datos["ced_cliente"];
								$estado = $datos["estado"];
								$sabor = $datos["sabor"];
								$tamaño = $datos["tamano"];
								$cantidad = $datos["cantidad"];
								$decoracion = $datos["decoracion"];
								$fecha_pedido = $datos["fecha_pedido"];
								$fecha_entrega = $datos["fecha_entrega"];
								$diseño = $datos["diseno"];
								$descripcion = $datos["descripcion"];
								$abono = $datos["abono"];
								$total = $datos["total"];
								$saldo = $datos["saldo"];

								$nom_cli =$datos_cli["nombre"];
								$tel_cli =$datos_cli["telefono"];
								$dir_cli =$datos_cli["direccion"];

								if ($cedula == $ced_cli){
									echo "<table class='tabla2'>";
									
									echo "<tr>";
									echo "<td colspan='4'> <img src='$diseño'/> </td>";
									echo "</tr>";

									echo "<tr><td colspan='4'><h3>INFORMACIÓN CLIENTE</h3></td></tr>";
									
									echo "<tr>";
									echo "<td> <h3>Nombre:</h3> </td>";
									echo "<td> $nom_cli</td>";
									echo "<td> <h3>Cedula:</h3> </td>";
									echo "<td> $cedula</td>";
									echo "</tr><tr>";
									echo "<td> <h3>Teléfono:</h3> </td>";
									echo "<td> $tel_cli </td>";
									echo "<td> <h3>Dirección:</h3> </td>";
									echo "<td> $dir_cli</td>";
									echo "</tr>";

									echo "<tr><td colspan='4'><h3>INFORMACIÓN CUPCAKE</h3></td></tr>";

									echo "<tr>";
									echo "<td> <h3>Fecha Pedido</h3> </td>";
									echo "<td> $fecha_pedido </td>";
									echo "<td> <h3>Fecha Entrega</h3> </td>";
									echo "<td> $fecha_entrega </td>";
									echo "</tr>";

									echo "<tr>";
									echo "<td> <h3>ID</h3> </td>";
									echo "<td> $i </td>";
									echo "<td> <h3>Estado</h3> </td>";
									echo "<td> $estado </td></tr>";

									echo "<tr>";
									echo "<td> <h3>Sabor</h3> </td>";
									echo "<td> $sabor </td>";
									echo "<td> <h3>Tamaño:</h3> </td>";
									echo "<td> $tamaño </td></tr>";
									
									echo "<tr>";
									echo "<td> <h3>Cantidad:</h3> </td>";
									echo "<td> $cantidad </td>";
									echo "<td> <h3>Decoración:</h3> </td>";
									echo "<td> $decoracion </td> </tr>";

									echo "<tr>";
									echo "<td> <h3>Descripción:</h3> </td>";
									echo "<td> $descripcion </td>";
									echo "<td> <h3>Abono:</h3> </td>";
									echo "<td> $abono </td></tr>";

									echo "<tr>";
									echo "<td> <h3>Total:</h3> </td>";
									echo "<td> $total </td>";
									echo "<td> <h3>Saldo:</h3> </td>";
									echo "<td>$saldo</td></tr>";
									
									echo "</table>";
									break;
								}	
							}
						}
	
					}else{
						if($tipo == "gall"){
							$sql = "SELECT * FROM registro_galletas;";
							$resultado= mysqli_query($conexion, $sql);
							$total = mysqli_num_rows($resultado);

							if($total==0){
								echo "<script> alert('El cliente no tiene pedidos');
										window.location='index.html'; </script>";
							}else{

								for($i = 1; $i<=$total; $i++){
									$sql2 = "SELECT * FROM registro_galletas WHERE id=$i;";
									$resultado2 = mysqli_query($conexion,$sql2);
									$datos = mysqli_fetch_assoc($resultado2);
									
									$cedula = $datos["ced_cliente"];
									$estado = $datos["estado"];
									$sabor = $datos["sabor"];
									$tamaño = $datos["tamano"];
									$cantidad = $datos["cantidad"];
									$decoracion = $datos["decoracion"];
									$fecha_pedido = $datos["fecha_pedido"];
									$fecha_entrega = $datos["fecha_entrega"];
									$diseño = $datos["diseno"];
									$descripcion = $datos["descripcion"];
									$abono = $datos["abono"];
									$total = $datos["total"];
									$saldo = $datos["saldo"];

									$nom_cli =$datos_cli["nombre"];
									$tel_cli =$datos_cli["telefono"];
									$dir_cli =$datos_cli["direccion"];

									if ($cedula == $ced_cli){
										echo "<table class='tabla2'>";
										
										echo "<tr>";
										echo "<td colspan='4'> <img src='$diseño'/> </td>";
										echo "</tr>";

										echo "<tr><td colspan='4'><h3>INFORMACIÓN CLIENTE</h3></td></tr>";
										
										echo "<tr>";
										echo "<td> <h3>Nombre:</h3> </td>";
										echo "<td> $nom_cli</td>";
										echo "<td> <h3>Cedula:</h3> </td>";
										echo "<td> $cedula</td>";
										echo "</tr><tr>";
										echo "<td> <h3>Teléfono:</h3> </td>";
										echo "<td> $tel_cli </td>";
										echo "<td> <h3>Dirección:</h3> </td>";
										echo "<td> $dir_cli</td>";
										echo "</tr>";

										echo "<tr><td colspan='4'><h3>INFORMACIÓN GALLETAS</h3></td></tr>";

										echo "<tr>";
										echo "<td> <h3>Fecha Pedido</h3> </td>";
										echo "<td> $fecha_pedido </td>";
										echo "<td> <h3>Fecha Entrega</h3> </td>";
										echo "<td> $fecha_entrega </td>";
										echo "</tr>";

										echo "<tr>";
										echo "<td> <h3>ID</h3> </td>";
										echo "<td> $i </td>";
										echo "<td> <h3>Estado</h3> </td>";
										echo "<td> $estado </td></tr>";

										echo "<tr>";
										echo "<td> <h3>Sabor</h3> </td>";
										echo "<td> $sabor </td>";
										echo "<td> <h3>Tamaño:</h3> </td>";
										echo "<td> $tamaño </td></tr>";
										
										echo "<tr>";
										echo "<td> <h3>Cantidad:</h3> </td>";
										echo "<td> $cantidad </td>";
										echo "<td> <h3>Decoración:</h3> </td>";
										echo "<td> $decoracion </td> </tr>";

										echo "<tr>";
										echo "<td> <h3>Descripción:</h3> </td>";
										echo "<td> $descripcion </td>";
										echo "<td> <h3>Abono:</h3> </td>";
										echo "<td> $abono </td></tr>";

										echo "<tr>";
										echo "<td> <h3>Total:</h3> </td>";
										echo "<td> $total </td>";
										echo "<td> <h3>Saldo:</h3> </td>";
										echo "<td>$saldo</td></tr>";
										
										echo "</table>";
										break;
									}
								}
							}
	
						}else{
							if($tipo == "post"){
								$sql = "SELECT * FROM registro_postre;";
								$resultado= mysqli_query($conexion, $sql);
								$total = mysqli_num_rows($resultado);

								if($total==0){
									echo "<script> alert('El cliente no tiene pedidos');
											window.location='index.html'; </script>";
								}else{

									for($i = 1; $i<=$total; $i++){
										$sql2 = "SELECT * FROM registro_postre WHERE id=$i;";
										$resultado2 = mysqli_query($conexion,$sql2);
										$datos = mysqli_fetch_assoc($resultado2);
										
										$cedula = $datos["ced_cliente"];
										$estado = $datos["estado"];
										$sabor = $datos["sabor"];
										$tamaño = $datos["tamano"];
										$cantidad = $datos["cantidad"];
										$decoracion = $datos["decoracion"];
										$fecha_pedido = $datos["fecha_pedido"];
										$fecha_entrega = $datos["fecha_entrega"];
										$diseño = $datos["diseno"];
										$descripcion = $datos["descripcion"];
										$abono = $datos["abono"];
										$total = $datos["total"];
										$saldo = $datos["saldo"];

										$nom_cli =$datos_cli["nombre"];
										$tel_cli =$datos_cli["telefono"];
										$dir_cli =$datos_cli["direccion"];

										if ($cedula == $ced_cli){
											echo "<table class='tabla2'>";
											
											echo "<tr>";
											echo "<td colspan='4'> <img src='$diseño'/> </td>";
											echo "</tr>";

											echo "<tr><td colspan='4'><h3>INFORMACIÓN CLIENTE</h3></td></tr>";
											
											echo "<tr>";
											echo "<td> <h3>Nombre:</h3> </td>";
											echo "<td> $nom_cli</td>";
											echo "<td> <h3>Cedula:</h3> </td>";
											echo "<td> $cedula</td>";
											echo "</tr><tr>";
											echo "<td> <h3>Teléfono:</h3> </td>";
											echo "<td> $tel_cli </td>";
											echo "<td> <h3>Dirección:</h3> </td>";
											echo "<td> $dir_cli</td>";
											echo "</tr>";

											echo "<tr><td colspan='4'><h3>INFORMACIÓN POSTRE</h3></td></tr>";
		
											echo "<tr>";
											echo "<td> <h3>Fecha Pedido</h3> </td>";
											echo "<td> $fecha_pedido </td>";
											echo "<td> <h3>Fecha Entrega</h3> </td>";
											echo "<td> $fecha_entrega </td>";
											echo "</tr>";

											echo "<tr>";
											echo "<td> <h3>ID</h3> </td>";
											echo "<td> $i </td>";
											echo "<td> <h3>Estado</h3> </td>";
											echo "<td> $estado </td></tr>";

											echo "<tr>";
											echo "<td> <h3>Sabor</h3> </td>";
											echo "<td> $sabor </td>";
											echo "<td> <h3>Tamaño:</h3> </td>";
											echo "<td> $tamaño </td></tr>";
											
											echo "<tr>";
											echo "<td> <h3>Cantidad:</h3> </td>";
											echo "<td> $cantidad </td>";
											echo "<td> <h3>Decoración:</h3> </td>";
											echo "<td> $decoracion </td> </tr>";

											echo "<tr>";
											echo "<td> <h3>Descripción:</h3> </td>";
											echo "<td> $descripcion </td>";
											echo "<td> <h3>Abono:</h3> </td>";
											echo "<td> $abono </td></tr>";

											echo "<tr>";
											echo "<td> <h3>Total:</h3> </td>";
											echo "<td> $total </td>";
											echo "<td> <h3>Saldo:</h3> </td>";
											echo "<td>$saldo</td></tr>";
											
											echo "</table>";
											break;
										}	
									}
								}
	
							}					
						}
					}
				}
			}else{
				echo "<script> alert('No se han registrado pedidos con esa cedula');
								window.location='buscar.php'; </script>";
			}
		}
	}else{
		echo "<script> alert('Debes ingresar');
						window.location='index.html'; </script>";
	}
	mysqli_close($conexion);
?>