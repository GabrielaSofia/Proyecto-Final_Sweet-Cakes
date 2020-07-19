<?php
	session_start();
	
	//$conexion=Conexion con base de datos;

	if(isset($_SESSION['user_id'])){
		$records = $conexion->prepare('SELECT id, usuario, contraseña FROM usuarios WHERE id=? ;');
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<style>
			body{
				background: url(img-past/img3.jpg);
                background-size: 100%;
                margin: 0 auto;
			}
			header{
				width: 100%;
				opacity: 0.6;
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
				font-size: 15px;
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
			.tabla {
				border: 1px solid #cccccc;
				padding: 10px;
				background-color: #ffffff;
				border-radius: 50px;
				opacity: 0.7;
				margin: 0 auto;
				margin-bottom: 20px;
				margin-top: 20px;
			}
			.campos{
				font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
				font-size: 18px;
				letter-spacing: 2px;
				word-spacing: 2px;
				color: #344055;
				font-weight: 5;
				text-align:center;
				background-color:white;
				border-radius: 20px;
				width: 220px;
				margin-right: 10px;
			}
			.camposdis{
				font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
				font-size: 18px;
				letter-spacing: 2px;
				word-spacing: 2px;
				color: #344055;
				font-weight: 5;
				text-align:center;
				background-color:white;
				width: 700px;
				margin-right: 10px;
			}
			.boton{
				font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
				font-size: 18px;
				font-weight: 50;
				letter-spacing: 1px;
				padding: 1px;
				color: white;
				text-align: center;
				background-color: #344055;
				border-width: 2px;
				border-style: solid;
				border-color: rgba(255, 255, 255, 0.82);
				border-radius: 20px 20px 20px 20px;
				width: 190px;
				margin: 10px;
			}
			#formulario_div{
				padding: 0px;
				align-content: left;
				margin: 0 auto;
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
			a{
				text-decoration: none;
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
			.area{
				font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
				font-size: 18px;
				letter-spacing: 2px;
				word-spacing: 2px;
				color: #344055;
				font-weight: 5;
				text-align:center;
				background-color:white;
				border-radius: 20px;
				width: 700px;
				height: 100px;
				text-align: left;
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
		<div id="formulario_div">
			<form method="POST" id="formulario" enctype="multipart/form-data" action="">
				<table class="tabla">
					<tr>
						<td colspan="4">
							<h3>INFORMACIÓN CLIENTE</h3>
						</td>
					</tr>	
					<tr>
						<td>
							<h3>Nombre:</h3>
						</td>
						<td>
							<input type="text" name="nombre" class="campos" required>
						</td>
						<td>
							<h3>Cédula:</h3>
						</td>
						<td>
							<input type="number" name="cedula" class="campos" required>
						</td>
					</tr>
					<tr>
						<td>
							<h3>Teléfono:</h3>
						</td>
						<td>
							<input type="number" name="telefono" class="campos" required>
						</td>
						<td>
							<h3>Dirección:</h3>
						</td>
						<td>
							<input type="text" name="direccion" class="campos" required>
						</td>
					</tr>
				</table>
				<table class="tabla">	
					<tr>
						<td colspan="6">
							<h3>INFORMACIÓN CUPCAKES</h3>
						</td>
					</tr>	
					<tr>
						<td>
							<h3>Sabor:</h3>
						</td>
						<td>
							<input type="text" name="sabor" class="campos" required>
						</td>
						<td>
							<h3>Tamaño:</h3>
						</td>
						<td>
							<input type="text" name="tamaño" class="campos" required>
						</td>
						<td>
							<h3>Cantidad:</h3>
						</td>
						<td>
							<input type="number" name="cantidad" class="campos" required>
						</td>
					</tr>
					<tr>
						<td>
							<h3>Decoración:</h3>
						</td>
						<td>
							<input type="text" name="decoracion" class="campos" required>
						</td>
						<td>
							<h3>Fecha pedido:</h3>
						</td>
						<td>
							<input type="date" name="fecha_pedido" class="campos" required>
						</td>

						<td>
							<h3>Fecha entrega:</h3>
						</td>
						<td>
							<input type="date" name="fecha_entrega" class="campos" required>
						</td>
					</tr>
					<tr>
						<td>
							<h3>Diseño:</h3>
						</td>
						<td colspan="5" style="text-align: left;">
							<input type="file" name="diseño" class="camposdis" required>
						</td>
					</tr>
					<tr >
						<td rowspan="2" colspan="4" >
							<textarea name="descripcion" cols="30" rows="5" class="area" placeholder="Escribe una descripción..."></textarea>
						</td>
						<td>
							<h3>Abono:</h3>
						</td>
						<td >
							<input type="number" name="abono" class="campos" required>
						</td>
					</tr>
					<tr>	
						<td >
							<h3>Total:</h3>
						</td>
						<td >
							<input type="number" name="preciototal" class="campos" required>
						</td>
					</tr>
					<tr>
						<td colspan="6">
							<button type="button" id="botonenviar" class="boton">Registrar Pedido</button>
						</td>
					</tr>
				</table>
			</form>	
		</div>
		<div id="respuesta">
		</div>
		<script type="text/javascript">
			$('#botonenviar').click(function(){
				var form = new FormData($('#formulario')[0]);
				$.ajax({
					url: '2-cupcake.php',
					type: 'POST',
					data: form,
					processData: false,
					contentType: false,
					success: function(res){
						$('#respuesta').html(res);
					}
				});
			});
		</script>
	</body>
</html>