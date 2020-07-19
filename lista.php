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
		}
	}else{
		echo "<script> alert('Debes ingresar');
						window.location='index.html'; </script>";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Sweet Cakes</title>
		<style>
			body{
				background: url(img-past/img3.jpg);
                background-size: 100%;
                margin: 0 auto;
			}
			header{
				width: 100%;
				opacity: 0.8;
				text-align: center;
				margin: 0 auto;
				padding-top: 10px;
				padding-bottom: 30px;
			}
			h1{
				text-align: center;
                font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
                font-size: 70px;
                letter-spacing: -2px;
				padding: 30px 0px 0px 0px;
                color: white;
                font-weight: 700;
                text-decoration: none solid rgb(68, 68, 68);
                font-style: normal;
                font-variant: normal;
                text-transform: uppercase;
                text-shadow: 2px 2px 0 #222121, 4px 4px 0 #1d1c1c;
				display: inline;
			}
			h3{
				text-align: center;
				font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
				font-size: 19px;
				letter-spacing: 3px;
				color: #344055;
				font-weight: 700;
				text-decoration: none solid rgb(68, 68, 68);
				font-style: normal;
				font-variant: normal;
			}
			h2{
				text-align: center;
				font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
				font-size: 16px;
				letter-spacing: 3px;
				color: #344055;
				font-weight: 700;
				text-decoration: none solid rgb(68, 68, 68);
				font-style: normal;
				font-variant: normal;
			}
			form,table,tr,td,img{
				margin: 0 auto;
				text-align: center;
			}
			.tabla{
				margin-top: 20px;
				margin-bottom: 10px;
				width: 90%;
				border: 1px solid #cccccc;
				padding: 5px;
				background-color: #ffffff;
				border-radius: 70px;
				font-size: 17px;
				font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
				opacity: 0.8;
			}
			.campos{
				font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
				font-size: 18px;
				letter-spacing: 2px;
				word-spacing: 2px;
				color: #344055;
				font-weight: 10;
				text-align:center;
				background-color:white;
				border-radius: 20px;
				width: 250px;
			}
			.boton{
				font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
				font-size: 18px;
				font-weight: 50;
				letter-spacing: 1px;
				padding-top: 20px;
				padding-left: 20px;
				padding-right: 20px;
				padding-bottom: 20px;
				color: white;
				text-align: center;
				background-color: #a1869e;
				border-width: 2px;
				border-style: solid;
				border-color: rgba(255, 255, 255, 0.82);
				border-radius: 20px 20px 20px 20px;
				width: 300px;
				height: 350px;
				margin: 10px;
				opacity: 0.75;
			}
			#formulario_div{
				margin-top: 0px;
				padding: 0px;
				align-content: left;
				margin-right: 130px;
			}
			a{
				text-decoration: none;
			}
			#logo1{
				width:150px;
				height:150px;
				background: url(img-past/logo3.png)no-repeat;
				float:left;
				margin-left: 20px;
				
			}
			#logo2{
				width:100px;
				height:100px;
				background: url(img-past/logo.png)no-repeat;
				float: right;
				margin-right: 20px;
			}
			.fa {
				display: none;
			}
			ul, ol{
				list-style:none;
			}
			.nav li a {
			font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
			background-color: #7daa92;
			font-size: 18px;
			font-weight: 30px;
			color: white;
			width: 160px;
			text-decoration: none;
			padding: 10px 0px 10px 0px;
			display: block;
			text-align: center;
			}
			.nav li a:hover{
				background-color: #a1869e;
			}
			.nav > li {
				float: left;
			}
			img{
				width: 100px;
				height: 100px;
				border-radius:20px 20px 20px 20px ;
			}
			
		</style>	
	</head>
	<body>
	<header>
		<div id=logo1></div>
		<h1>Sweet Cakes</h1>
		<div id=logo2></div>
		<br><br><br>
		<ul class="nav">
			<li>
				<a href="lista.php">Pedidos</a>
			</li>
			<li>
				<a href="lista_clientes.php"> Clientes</a>
			</li>
			<li>
				<a href="inicio.php">Registrar Pedido</a>
			</li>
			<li>
				<a href="buscar.php">Buscar Pedido</a>
			</li>
			<li>
				<a href="modificar.php">Modificar Estado</a>
			</li>
			<li>
				<a href="logout.php">Salir</a>
			</li>
		</ul>
	</header>
		<table class="tabla">
			<tr>
				<td colspan="9"> <H3>PEDIDOS PASTELES</H3></td>
			</tr>
			<tr>
				<th>
					CEDULA CLIENTE
				</th>
				<th>
					ESTADO
				</th>
				<th>
					FECHA PEDIDO
				</th>
				<th>
					FECHA ENTREGA
				</th>
				<th>
					ABONO
				</th>
				<th>
					TOTAL
				</th>
				<th>
					SALDO
				</th>
				<th>
					DISEÑO
				</th>
			</tr>
			<?php
				$sql_pastel ="SELECT * FROM registro_pastel;";
				$resul= mysqli_query($conexion,$sql_pastel);
				$pasteles = mysqli_num_rows($resul);	
				
				if($pasteles>=1){ 
					for($i = 1; $i<=$pasteles; $i++){
						$sql2 = "SELECT * FROM registro_pastel WHERE id=$i";
						$resul2 = mysqli_query($conexion,$sql2);
						$datos = mysqli_fetch_assoc($resul2);

						$ced_cli =  $datos['ced_cliente'];
						$estado =  $datos['estado'];
						$fecha_ped =  $datos['fecha_pedido'];
						$fecha_ent =  $datos['fecha_entrega'];
						$diseño =  $datos['diseno'];
						$abono =  $datos['abono'];
						$total =  $datos['total'];
						$saldo =  $datos['saldo'];

						echo "<tr>";
						echo "<td> $ced_cli </td>";
						echo "<td> $estado </td>";
						echo "<td> $fecha_ped </td>";
						echo "<td> $fecha_ent </td>";
						echo "<td> $abono </td>";
						echo "<td> $total </td>";
						echo "<td> $saldo </td>";
						echo "<td> <img src='$diseño'/> </td>";
						echo "</tr>";
					}
				}	
			?>
		</table>
		<table class="tabla">
			<tr>
				<td colspan="9"> <H3>PEDIDOS CUPCAKES</H3></td>
			</tr>
			<tr>
				<th>
					CEDULA CLIENTE
				</th>
				<th>
					ESTADO
				</th>
				<th>
					FECHA PEDIDO
				</th>
				<th>
					FECHA ENTREGA
				</th>
				<th>
					ABONO
				</th>
				<th>
					TOTAL
				</th>
				<th>
					SALDO
				</th>
				<th>
					DISEÑO
				</th>
			</tr>
			<?php
				$sql_cup ="SELECT * FROM registro_cupcake;";
				$resul3= mysqli_query($conexion,$sql_cup);
				$cupcakes = mysqli_num_rows($resul3);	
				
				if($cupcakes>=1){ 
					for($i = 1; $i<=$cupcakes; $i++){
						$sql3 = "SELECT * FROM registro_cupcake WHERE id=$i";
						$resul4 = mysqli_query($conexion,$sql3);
						$datos = mysqli_fetch_assoc($resul4);

						$ced_cli =  $datos['ced_cliente'];
						$estado =  $datos['estado'];
						$fecha_ped =  $datos['fecha_pedido'];
						$fecha_ent =  $datos['fecha_entrega'];
						$diseño =  $datos['diseno'];
						$abono =  $datos['abono'];
						$total =  $datos['total'];
						$saldo =  $datos['saldo'];

						echo "<tr>";
						echo "<td> $ced_cli </td>";
						echo "<td> $estado </td>";
						echo "<td> $fecha_ped </td>";
						echo "<td> $fecha_ent </td>";
						echo "<td> $abono </td>";
						echo "<td> $total </td>";
						echo "<td> $saldo </td>";
						echo "<td> <img src='$diseño'/> </td>";
						echo "</tr>";
					}
				}	
			?>
		</table>
		<table class="tabla">
			<tr>
				<td colspan="9"> <H3>PEDIDOS GALLETAS</H3></td>
			</tr>
			<tr>
				<th>
					CEDULA CLIENTE
				</th>
				<th>
					ESTADO
				</th>
				<th>
					FECHA PEDIDO
				</th>
				<th>
					FECHA ENTREGA
				</th>
				<th>
					ABONO
				</th>
				<th>
					TOTAL
				</th>
				<th>
					SALDO
				</th>
				<th>
					DISEÑO
				</th>
			</tr>
			<?php
				$sql_gal ="SELECT * FROM registro_galletas;";
				$resul5= mysqli_query($conexion,$sql_gal);
				$galletas = mysqli_num_rows($resul5);	
				
				if($cupcakes>=1){ 
					for($i = 1; $i<=$galletas; $i++){
						$sql5 = "SELECT * FROM registro_galletas WHERE id=$i";
						$resul6 = mysqli_query($conexion,$sql5);
						$datos = mysqli_fetch_assoc($resul6);

						$ced_cli =  $datos['ced_cliente'];
						$estado =  $datos['estado'];
						$fecha_ped =  $datos['fecha_pedido'];
						$fecha_ent =  $datos['fecha_entrega'];
						$diseño =  $datos['diseno'];
						$abono =  $datos['abono'];
						$total =  $datos['total'];
						$saldo =  $datos['saldo'];

						echo "<tr>";
						echo "<td> $ced_cli </td>";
						echo "<td> $estado </td>";
						echo "<td> $fecha_ped </td>";
						echo "<td> $fecha_ent </td>";
						echo "<td> $abono </td>";
						echo "<td> $total </td>";
						echo "<td> $saldo </td>";
						echo "<td> <img src='$diseño'/> </td>";
						echo "</tr>";
					}
				}	
			?>
		</table>
		<table class="tabla">
			<tr>
				<td colspan="9"> <H3>PEDIDOS POSTRES</H3></td>
			</tr>
			<tr>
				<th>
					CEDULA CLIENTE
				</th>
				<th>
					ESTADO
				</th>
				<th>
					FECHA PEDIDO
				</th>
				<th>
					FECHA ENTREGA
				</th>
				<th>
					ABONO
				</th>
				<th>
					TOTAL
				</th>
				<th>
					SALDO
				</th>
				<th>
					DISEÑO
				</th>
			</tr>
			<?php
				$sql_pos ="SELECT * FROM registro_postre;";
				$resul_pos= mysqli_query($conexion,$sql_pos);
				$postres = mysqli_num_rows($resul_pos);	
				
				if($postres>=1){ 
					for($i = 1; $i<=$postres; $i++){
						$sql_postre = "SELECT * FROM registro_postre WHERE id=$i";
						$resul_postre = mysqli_query($conexion,$sql_postre);
						$datos = mysqli_fetch_assoc($resul_postre);

						$ced_cli =  $datos['ced_cliente'];
						$estado =  $datos['estado'];
						$fecha_ped =  $datos['fecha_pedido'];
						$fecha_ent =  $datos['fecha_entrega'];
						$diseño =  $datos['diseno'];
						$abono =  $datos['abono'];
						$total =  $datos['total'];
						$saldo =  $datos['saldo'];

						echo "<tr>";
						echo "<td> $ced_cli </td>";
						echo "<td> $estado </td>";
						echo "<td> $fecha_ped </td>";
						echo "<td> $fecha_ent </td>";
						echo "<td> $abono </td>";
						echo "<td> $total </td>";
						echo "<td> $saldo </td>";
						echo "<td> <img src='$diseño'/> </td>";
						echo "</tr>";
					}
				}	
			?>
		</table>
	</body>
</html>