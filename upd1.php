<?php
$Nlicencia = !empty($_POST['Nlicencia']) ? $_POST['Nlicencia'] : (!empty($_GET['Nlicencia']) ? $_GET['Nlicencia'] : NULL);

?><!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<title>Actualizar datos</title>
<style>
    body {
        background-color: white; 
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
        <a href="buscador.php" class="btn btn-primary">Atras</a>
        <br><br> <?php
        date_default_timezone_set('America/Mexico_City');

        include("configuracion.php");

        // Consulta para obtener los datos de todos los usuarios
        $sql = "SELECT * FROM licenciasguanajuato2 WHERE Nlicencia = '$Nlicencia'";
       
        
        $resultado = $link->query($sql);
        if ($resultado->num_rows > 0) {
       // Iterar sobre los resultados y mostrar cada campo como un elemento de la lista
       while ($fila = $resultado->fetch_assoc()) {
        echo "<form method='post' action='".$_SERVER["PHP_SELF"]."' enctype='multipart/form-data'>";
        echo "<input type='hidden' name='id' value='" . $fila['id'] . "'>"; // Campo oculto para enviar el ID del registro
        echo "<input type='submit' class='btn btn-danger' name='eliminar' value='Eliminar'>";
        echo "</form>";
    
        echo "<form method='post' action='".$_SERVER["PHP_SELF"]."' enctype='multipart/form-data'>";
        echo "<input type='hidden' name='id' value='" . $fila['id'] . "'>"; // Campo oculto para enviar el ID del registro
    
        echo "<span class='labelest'>No. Licencia:</span>";
        echo "<input type='text' name='Nlicencia' class='estiloinputs' value='" . $fila['Nlicencia'] . "' required><br>";
    
        // Mostrar imagen actual del frente
        echo "<span class='labelest'>Frente Actual:</span><br>";
        echo "<img src='" . $fila['frente'] . "' alt='Frente' style='width:200px;height:auto;'><br>";
        echo "<input type='file' name='frente'><br>";
    
        // Mostrar imagen actual del reverso
        echo "<span class='labelest'>vigencia:</span><br>";
        echo "<input type='text' name='vigencia' class='estiloinputs' value='" . $fila['vigencia'] . "' ><br>";

    
        echo "<span class='labelest'>Tipo Licencia (A,D):</span>";
        echo "<input type='text' name='tipolicencia' class='estiloinputs' value='" . $fila['tipolicencia'] . "' ><br>";
              
        echo "<span class='labelest'>Tipo:</span>";
        echo "<input type='text' name='tipo' class='estiloinputs' value='" . $fila['tipo'] . "' ><br>";

        echo "<span class='labelest'>Nombre Completo:</span>";
        echo "<input type='text' name='nombrecompleto' class='estiloinputs' value='" . $fila['nombrecompleto'] . "' ><br>";



        echo "<span class='labelest'>Fecha Emitida:</span>";
        echo "<input type='text' name='fecha_emitida' class='estiloinputs' value='" . $fila['fecha_emitida'] . "' required><br>";
                    


        echo "<span class='labelest'>Fecha Vigencia:</span>";
        echo "<input type='text' name='fechavigencia' class='estiloinputs' value='" . $fila['fechavigencia'] . "' required><br>";


        echo "<input type='submit' class='btn btn-success' name='actualizar' value='Actualizar'>"; // Botón de actualizar
        echo "</form>";
    }
    

        } else {
            echo "No se encontraron Visas Registradas.";
        }
        ?>
    </div>
    
    <?php

if (isset($_POST['eliminar'])) {
    $id = $_POST['id'];
    
    // Consulta para eliminar el registro
    $sql_eliminar = "DELETE FROM licenciasguanajuato2    WHERE id = $eliminar";

    if ($link->query($sql_eliminar) === TRUE) {
        echo "Registro eliminado correctamente.";
        echo "<script>alert('Registro eliminado correctamente.');
        window.location.href='buscador.php';
        </script>";
        // Redirigir o mostrar un mensaje, etc.
    } else {
        echo "Error al eliminar el registro: " . $link->error;
    }
}






    // Si se envió el formulario de actualización
   // Si se envió el formulario de actualización
if(isset($_POST['actualizar'])) {
    // Obtener los datos del formulario
    $id = $_POST['id'];
    $Nlicencia = $_POST['Nlicencia'];
    $tipo = $_POST['tipo'];
    $fecha_emitida = $_POST['fecha_emitida'];
    $nombrecompleto = $_POST['nombrecompleto'];
    $fechavigencia = $_POST['fechavigencia'];
    $tipolicencia = $_POST['tipolicencia'];

    // Inicializar variables de ruta para las imágenes
    $frente_path = null;

    // Manejar la subida de archivos para el frente
    if (!empty($_FILES['frente']['name'])) {
        $frente_path = 'uploads/' . basename($_FILES['frente']['name']);
        move_uploaded_file($_FILES['frente']['tmp_name'], $frente_path);
    }

    

    // Preparar la consulta de actualización
    $sql = "UPDATE licenciasguanajuato2 SET 
            Nlicencia='$Nlicencia', 
            tipo='$tipo', 
            tipolicencia='$tipolicencia', 
            nombrecompleto='$nombrecompleto', 
            fechavigencia='$fechavigencia', 

            fecha_emitida='$fecha_emitida'";

    // Agregar las rutas de las imágenes si se subieron nuevos archivos
    if ($frente_path) {
        $sql .= ", frente='$frente_path'";
    }
   

    $sql .= " WHERE id=$id";
    // Ejecutar la consulta de actualización
    if ($link->query($sql) === TRUE) {
        echo "<script>alert('Los datos se han actualizado correctamente.');
        window.location.href='buscador.php';
        </script>";
    } else {
        echo "Error al actualizar los datos: " . $link->error;
    }
}

    
    ?>
</body>
</html>
