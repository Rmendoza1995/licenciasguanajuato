<?php
	session_start();

include("../configuracion.php");

date_default_timezone_set('America/Mexico_City');




/* comprobar la conexión */
$nom = $_SESSION['usuario'];

/* cerrar la conexión */
$hoy = date("Y-m-d");

//Conecto a mi base de datos

//Cadena de consulta que me devuelve todos los registros de la tabla 'users'
if (isset($_GET['id'])) {
	$id = $_GET['id']; //le asigno una variable 
	$query1 = "SELECT * FROM usuarioslicencias WHERE usuario ='" . $_SESSION['usuario'] . "'"; //cadena de consulta para el elemento $id
	if ($result = mysqli_query($link, $query1)) { //si obtengo resultados ejecutando la consulta anterior
		while ($usuario = mysqli_fetch_assoc($result)) { //asigno ese resultado a un array asociativo $user
			$clave = $usuario['clave']; //creo variables con los nombres de los campos de la tabla "users" 
			$levely = $usuario['levely'];
		}
	}
}



if (isset($_POST['sw']) == 1) { //si se ha presionado el boton "Actualizar" 

	//cadena con la orden de actualizacion a la tabla "users" con los valores de los inputs enviados por POST
	$query2 = "UPDATE usuarioslicencias SET clave='" . $_POST['clave'] . "' ,fecha_registro='$hoy',levely='" . $_POST['levely'] . "' WHERE usuario='" . $_SESSION['usuario'] . "'";

	if (mysqli_query($link, $query2)) { //si la consulta se ejecuta con exito
		echo "La informacion se actualizo con exito"; //mensaje de exito

		header('Location: ../index.php'); //redireccion a index.php
	} else { //si ocurrio un error
		echo "Ocurrio un error al intentar actualizar"; //mensaje de error
	}
}
/* liberar el conjunto de resultados */



//zona horaria por defecto


//cierro conexion a bbdd
mysqli_close($link);
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
	<title>Crea una contraseña No sera necesario cambiarla despues</title>

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
	<style>
		.tabita {
			border: black 0px solid;
			color: white;
			position: relative;
			top: 80px;
			right: 200px;

		}
	</style>
	<!-- //css files -->
</head>

<body>
	<!-- main -->
	<div class="w3ls-header">
		<h1 style="font-size:30px">Hola! Veo que es la primera vez que haz ingresado aqui...<br></h1>
		<center>
			<?php
			echo "<center><h4 class='tabita'>" . "Bienvenido \ a: " . $nom . "&nbsp; " . "</h4></center>" . "\n\n";

			?>
			<img src="../images/robot.png" width="300px">

		</center>
		<h1 style="font-size:20px">Crea una contraseña Nueva, esta siempre sera fija</h1>
		<div class="header-main">

			<div class="header-bottom">
				<div class="header-right w3agile">
					<div class="header-left-bottom agileinfo">
						<form action="contraseña.php" method="POST">


							<div class="icon1">
								<i class="fa fa-lock" aria-hidden="true"></i>
								<input type="password" placeholder="Password" name="clave" required />
							</div>



							<select name="levely" required>
								<option name="levely" value="" placeholder="">selecciona el cargo</option>
								<option value="3">Supervisor</option>
								<option value="1">Auxiliar Administrativo ( analista de bases "excel" )</option>
								<option value="2">Administrador (solo sistemas)</option>
							</select>
							<div class="bottom">
								<input class="btn btn-success" type="submit" name="actualizar" value="Actualizar" /><br /><br />
								<input type="hidden" name="id" value="<?php if (isset($id)) echo $id; ?>" />
								<input type="hidden" name="sw" value="1" />
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