<?php
	session_start();

include("../configuracion.php");
if(!isset($_SESSION['usuario'])) {
	echo '<script type="text/javascript">
			alert("Usted No tiene Permitido el Acceso a esta parte.");
			window.location.href="IniciarSesion.php";
		  </script>';
}
$sqlfolio = "SELECT * FROM usuarioslicencias where usuario='" . $_SESSION['usuario'] . "' limit 1";
$resultfolio = $link->query($sqlfolio);

if ($resultfolio->num_rows > 0) {
	while ($row = $resultfolio->fetch_assoc()) {
		$levely = $row['levely'];



		if ($levely == 3) {
			echo '<script type="text/javascript">
			alert("Usted No tiene Permitido el Acceso a esta parte.");
			window.location.href="../buscador.php";
		  </script>';
		} else {
		}
	}
}
?>

<!DOCTYPE HTML>
<html lang="es">

<head>
	<title>Registrar usuarios</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Account Register Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta tag Keywords -->
	<!-- css files -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS -->
	<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
	<link href="//fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,devanagari,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">

	<!-- //css files -->
</head>

<body>
	<!-- main -->
	<div class="w3ls-header">
		<h1>LICENCIAS GUANAJUATO USUARIOS</h1>
		<div class="header-main">
			<h2>Crear Cuenta</h2>
			<a href="IniciarSesion.php">Iniciar Sesion ||</a>
			<a href="../admin.php">Buscar Ususarios</a>

			<div class="header-bottom">
				<div class="header-right w3agile">
					<div class="header-left-bottom agileinfo">
						<form action="conexion.php" method="post" enctype="multipart/form-data">
							<div class="icon1">
								<i class="fa fa-user" aria-hidden="true"></i>
								<input type="text" placeholder="Nombre Completo" name="nombre" required="" />
							</div>
							<div class="icon1">
								<i class="fa fa-user" aria-hidden="true"></i>
								<input type="text" placeholder="Usuario" name="usuario" required="" />
							</div>



							<div class="icon1">
								<i class="fa fa-user" aria-hidden="true"></i>
								<input type="text" placeholder="Num_folios asignados" name="Num_folios" />
							</div>








							<div class="icon1">
								<i class="fa fa-lock" aria-hidden="true"></i>
								<input type="password" placeholder="Password" name="Password" required="" />
							</div>

							<div class="icon1">
								<i class="fa fa-lock" aria-hidden="true"></i>
								<input type="password" placeholder="Confirma Password" name="repassword" required="" />
							</div>

							<select name="levely">
								<option name="levely" value="" placeholder="">selecciona el cargo</option>
								<option value="3">Foliador</option>
								<option value="1">Administrador</option>
							</select>
							<div class="bottom">
								<input type="submit" name="enviar" value="Crear Cuenta" />
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--header end here-->
	<!-- copyright start here -->

	<!--copyright end here-->
</body>

</html>