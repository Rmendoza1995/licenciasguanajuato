<?php
// Conexión a la base de datos y consulta SQL
session_start(); 
include("configuracion.php");

$sql = "SELECT * FROM licenciasguanajuato2 where usuarioregistro='".$_SESSION['usuario']."'  limit 600";
$resultado = $link->query($sql);
?>
<?php

if(!isset($_SESSION['usuario'])) {
	echo '<script type="text/javascript">
			alert("Usted No tiene Permitido el Acceso a esta parte.");
			window.location.href="registrousuarios/IniciarSesion.php";
		  </script>';
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<title>Formulario</title>
<style>
    body {
        background-attachment: fixed;
    background-position: center;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
	padding:0;
	margin:0; 
	font-size: 100%;
    background: url(registrousuarios/images/bg6.jpg) no-repeat 0px 0px;
    background-size: cover;
	font-family: 'Noto Sans', sans-serif;
    }
    .container {
    
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .form-group {
        margin-bottom: 20px;
    }
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    input[type="text"],
    input[type="number"],
    input[type="date"] {
        width: calc(100% - 12px);
        padding: 6px;
        border-radius: 5px;
        border: 1px solid #ccc;
       
    }
    input[type="file"] {
        width: calc(100% - 12px);
        padding: 6px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }
    select {
        width: 100%;
        padding: 6px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }
    button {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }
    button:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>
<a href="cerrar_sesion.php" class="btn btn-primary">Cerrar sesion</a>
<a href="registrolicencia.php" class="btn btn-primary">Crear Nuevo</a>

<form method="post" action="upd1.php">        
        <input  type="text" name="Nlicencia" id="Nlicencia" placeholder="No. Licencia"    required>
        <button class="btn btn-primary">Buscar para editar</button>
      </form><br>
      <form method="post" action="qr.php">        
        <input  type="text" name="Nlicencia" id="Nlicencia" placeholder="No. Licencia"    required>
        <button class="btn btn-primary">Buscar compartir QR</button>
      </form>


    <center> <br> <h1 style="color:white;">Lista de LICENCIAS</h1>
<table style="color:white; overflow-x: scroll;" border="2px">
    <thead>
        <tr >
            <th>No. documento</th>
            <th>Tipo</th> 
            <th>Fecha vigencia</th>
      

        </tr>
    </thead>
    <tbody>
        <?php
        // Iterar sobre los resultados y mostrar cada fila en la tabla
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila['Nlicencia'] . "</td>";
            echo "<td>" . $fila['tipo'] . "</td>";
            echo "<td>" . $fila['fecha_emitida'] . "</td>";
            // Continúa mostrando más columnas según tus necesidades
            echo "<td><a style='font-size:20px; color:red;' href='upd1.php?Nlicencia=" . $fila['Nlicencia'] . "'>Modificar</a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>


<?php
// Cerrar la conexión a la base de datos
$link->close();
?>


</body>
</html>
