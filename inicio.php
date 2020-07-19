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
				padding: 10px;
				border-radius: 50px;
				margin-left: 20px;

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
			.imagenes{
				background-color: #a1869e;
				padding-top: 10px;
				padding-left: 10px;
				padding-right: 10px;
				padding-bottom: 10px;
				opacity: 0.75;
				border-width: 2px;
				border-style: solid;
				border-color: rgba(255, 255, 255, 0.82);
				border-radius: 20px 20px 20px 20px;
				width: 280px;
				height: 350px;
				margin: 10px;
			}
			ul {
			padding-inline-start: 0px;
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
			<table class="tabla">
				<tr>
					<td>
						<a href="1-registrar_pastel.php">
						<img src="img-past/pastel.jpg" alt="pastel" width="250px" height="300" class="imagenes"><br>
						</a>
					</td>
					<td>
						<a href="2-registrar_cupcakes.php" >
						<img src="img-past/cupcakes.jpg" alt="cupcakes" width="250px" height="300" class="imagenes"><br>	
						</a>
					</td>
					<td>
						<a href="3-registrar_galletas.php" >
						<img src="img-past/galletas.jpg" alt="galletas" width="250px" height="300" class="imagenes"><br>	
						</a>
					</td>
					<td>
						<a href="4-registrar_postres.php" >
						<img src="img-past/postre.jpg" alt="postres" width="250px" height="300" class="imagenes"><br>	
						</a>
					</td>
				</tr>
			</table>
		</div>
		<div id="respuesta">
		</div>
	</body>
</html>