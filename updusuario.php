
<?php
	session_start();

include("configuracion.php");
$sqlfolio = "SELECT * FROM usuarioslicencias where usuario='".$_SESSION['usuario']."' limit 1";
$resultfolio = $link->query($sqlfolio);

if ($resultfolio->num_rows > 0) {
    while ($row = $resultfolio->fetch_assoc()) {
        $levely = $row['levely'];



        if ($levely == 3) {
			echo '<script type="text/javascript">
			alert("Usted No tiene Permitido el Acceso a esta parte.");
			window.location.href="buscadorInterno.php";
		  </script>';
        } else {


        }

    }
}
?>

<?php
$usuario = !empty($_POST['usuario']) ? $_POST['usuario'] : (!empty($_GET['usuario']) ? $_GET['usuario'] : NULL);


?><!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<title>Actualizar datos</title>
<style>
    body {
        background-color: #0A2240; 
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }
    
    .container {
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        max-width: 700px;
        width: 100%;
    }
    
    .container img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .container img.first-image {
        width: 230px;
        max-height: 230px;
        object-fit: cover;
        object-position: center;
    }
    
    .labelest {
    font-size: 16px;
    font-weight: bold;
    color: #333;
    margin-bottom: 5px;
    display: block;
}

    
    .estiloinputs {
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        font-size: 16px;
        color: #333;
        width:80%;
        margin-bottom: 15px;
        text-align: center;
    }
</style>
</head>
<body>
    <div class="container">
        <?php
        date_default_timezone_set('America/Mexico_City');


        // Consulta para obtener los datos de todos los usuarios
        echo "<a href='admin.php'  class='btn btn-primary'  value='Regresar'> Regresar</a> <br><br>";

        $sql = "SELECT * FROM usuarioslicencias WHERE usuario = '$usuario'";
        $resultado = $link->query($sql);
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                echo "<form method='post' action='" . $_SERVER["PHP_SELF"] . "'>";
        echo "<input type='hidden' name='id_eliminar' value='" . $fila['id'] . "'>";
        echo "<input type='submit' class='btn btn-danger' name='eliminar' value='Eliminar'>";
        echo "</form>";

                echo "<center><div>";
                echo "<form method='post' action='".$_SERVER["PHP_SELF"]."' enctype='multipart/form-data'>"; // Envía el formulario a la misma página
                echo "<input type='hidden' name='id' value='" . $fila['id'] . "'>"; // Campo oculto para enviar el ID del registro
                
             
                echo "<input type='file' id='foto' name='foto'  accept='image/*'><br>"; // Campo para seleccionar la nueva foto
               

                echo "<span class='labelest'>Nombre:</span>";
                echo "<input type='text' name='nombre' class='estiloinputs' value='" . $fila['nombre'] . "' required><br>";
              
                echo "<span class='labelest'>Usuario:</span>";
                echo "<input type='text'  name='usuario' class='estiloinputs' value='" . $fila['usuario'] . "' required><br>";
                
                echo "<span class='labelest'>Claves:</span>";
                echo "<input type='text' name='clave' class='estiloinputs' value='" . $fila['clave'] . "' ><br>";
                

              
                echo "<span class='labelest'>Fecha registro:</span>";
                echo "<input type='text' name='fecha_registro' class='estiloinputs' value='" . $fila['fecha_registro'] . "' required><br>";
                
                echo "<span class='labelest'>Cuantos Folios tiene:</span>";
                echo "<input type='text' name='Num_folios' class='estiloinputs' value='" . $fila['Num_folios'] . "' required><br>";
                
                 

                echo "<input type='submit' class='btn btn-success' name='actualizar' value='Actualizar'>"; // Botón de actualizar
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo "No se encontraron usuarios Registrados.";
        }
        ?>
    </div>
    
    <?php

if (isset($_POST['eliminar'])) {
    $id_eliminar = $_POST['id_eliminar'];

    // Consulta para eliminar el registro
    $sql_eliminar = "DELETE FROM usuarioslicencias    WHERE id = $id_eliminar";

    if ($link->query($sql_eliminar) === TRUE) {
        echo "Registro eliminado correctamente.";
        // Redirigir o mostrar un mensaje, etc.
    } else {
        echo "Error al eliminar el registro: " . $link->error;
    }
}







 // Si se envió el formulario de actualización
if (isset($_POST['actualizar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $usuario=!empty($_POST['usuario']) ? $_POST['usuario'] : NULL;
    $clave = $_POST['clave'];
    $fecha_registro = $_POST['fecha_registro'];
    $Num_folios = $_POST['Num_folios'];
  

    // Consulta de actualización
    $sql = "UPDATE usuarioslicencias    SET 
            nombre='$nombre',
            usuario='$usuario', 
            clave='$clave', 
            fecha_registro='$fecha_registro', 
            Num_folios='$Num_folios'           
            WHERE id=$id";
var_dump($sql);
    // Ejecutar la consulta de actualización
    if ($link->query($sql) === TRUE) {
        echo "Registro actualizado.";
        echo "<script>alert('Registro Actualizado, si deseas consultarlo vuelve a buscarlo o crea uno nuevo.')</script>";
        echo "<script>window.location.href = 'admin.php';</script>";
    } else {
        echo "Error al actualizar el registro: " . $link->error;
    }
}

    ?>
</body>
</html>
