<?php
$placa = $_POST['placa'] ?? $_GET['placa'] ?? NULL;
$serie=!empty($_POST['serie']) ? $_POST['serie'] : NULL;

?><!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<title>Adeudo Tenencia</title>
<style>
    body {
        background-color: beige; 
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


    .miimglog {
    float: left; /* Para que la imagen se alinee a la izquierda */
    margin-right: 10px; /* Ajusta el margen derecho según sea necesario */
    margin-bottom: 10px; /* Ajusta el margen inferior según sea necesario */
}

.clearfix::after {
    content: "";
    display: table;
    clear: both;
}


    .contenedor {
        position: relative; /* Para que la marca de agua sea relativa a este contenedor */
        overflow: hidden; /* Para que la imagen no se desborde del contenedor */
    }

    .marca-agua {
        position: absolute; /* Para que la marca de agua se posicione en relación con el contenedor */
        top: 50%; /* Alinea la parte superior de la marca de agua al 50% del contenedor */
        left: 50%; /* Alinea la parte izquierda de la marca de agua al 50% del contenedor */
        transform: translate(-50%, -50%); /* Desplaza la marca de agua hacia el centro */
        opacity: 0.2; /* Ajusta la opacidad de la marca de agua según sea necesario */
        pointer-events: none; /* Para que la marca de agua no sea clickeable */
    }


</style>
</head>
<body>

<?php
include("configuracion.php");

// Consulta para obtener los datos de todos los usuarios
if (!empty($placa))
    $sql = "SELECT * FROM finanzasadeudo WHERE placa = '$placa'";

else
$sql = "SELECT * FROM finanzasadeudo WHERE serie = '$serie'";
$resultado = $link->query($sql);

if ($resultado->num_rows > 0) {
    // Iterar sobre los resultados y mostrar cada fila en filas con colores alternados
    while ($fila = $resultado->fetch_assoc()) {
       
       echo    "<div class='container'><a href='index.php'><img class='miimglog' src='logosmex/" . $fila['estado_ciudad'] . ".png' width='100px'> </a><div class='clearfix'></div> ";
       
       
        echo "<div class='contenedor'>";

        // Imagen de fondo como marca de agua
        echo "<img class='marca-agua' src='logosmex/" . $fila['estado_ciudad'] . ".png' width='400px' height='400px'>";
        echo "";
        echo "<center><div >";
        echo "<span class='labelest'>Marca:</span>";
        echo "<div class='estiloinputs'>" . $fila['Marca'] . "</div>";
      
        echo "<span class='labelest'>Placa:</span>";
        echo "<div class='estiloinputs'>" . $fila['Placa'] . "</div>";
        echo "<span class='labelest'>Linea:</span>";
        echo "<div class='estiloinputs'>" . $fila['Linea'] . "</div>";
        echo "<span class='labelest'>Modelo:</span>";
        echo "<div class='estiloinputs'>" . $fila['Modelo'] . "</div>";
        echo "<span class='labelest'>Serie:</span>";
        echo "<div class='estiloinputs'>" . $fila['Serie'] . "</div>";
        echo "<span class='labelest'>Num_Motor:</span>";
        echo "<div class='estiloinputs'>" . $fila['Num_Motor'] . "</div>";
        echo "<span class='labelest'>Combustible:</span>";
        echo "<div class='estiloinputs'>" . $fila['Combustible'] . "</div>";
        echo "<span class='labelest'>Tipo:</span>";
        echo "<div class='estiloinputs'>" . $fila['Tipo'] . "</div>";
        echo "<span class='labelest'>Pasajeros:</span>";
        echo "<div class='estiloinputs'>" . $fila['Pasajeros'] . "</div>";
        echo "<span class='labelest'>Puertas:</span>";
        echo "<div class='estiloinputs'>" . $fila['Puertas'] . "</div>";
        echo "<span class='labelest'>Cilindros:</span>";
        echo "<div class='estiloinputs'>" . $fila['Cilindros'] . "</div>";
        echo "<span class='labelest'>Color_Exterior:</span>";
        echo "<div class='estiloinputs'>" . $fila['Color_Exterior'] . "</div>";
        echo "<span class='labelest'>Carga:</span>";
        echo "<div class='estiloinputs'>" . $fila['Carga'] . "</div>";
        echo "<span class='labelest'>Observaciones:</span>";
        echo "<div class='estiloinputs'>" . $fila['Observaciones'] . "</div>";
        echo "<span class='labelest'>Tenencia:</span>";
        echo "<div class='estiloinputs'>" . $fila['Tenencia'] . "</div>";
        echo "<span class='labelest'>Repuve:</span>";
        echo "<div class='estiloinputs'>" . $fila['Repuve'] . "</div>";
                echo "</div>";
    }
} else {
    echo "No se encontro Su Placa buscada , favor de revisar los datos.";

}

// Cerrar la conexión a la base de datos
$link->close();
?>

<script>
function compartir() {
    // Obtener los parámetros de código de envío y parte
    var codigoenvio = '<?php echo $codigoenvio; ?>';
    var parte = '<?php echo $parte; ?>';

    // Construir la URL actual con los parámetros
    var urlActual = "verget.php"; // URL sin parámetros
    var parametros = '?codigoenvio=' + codigoenvio + '&parte=' + parte;
    var urlCompartir = urlActual + parametros;

    // Verificar si el navegador admite la API de compartir
    if (navigator.share) {
        navigator.share({
            title: 'Compartir Datos',
            text: 'Compartir datos recibidos',
            url: urlCompartir
        })
        .then(() => console.log('Contenido compartido'))
        .catch((error) => console.error('Error al compartir:', error));
    } else {
        // En caso de que el navegador no admita la API de compartir, simplemente abre la URL en una nueva ventana
        window.open(urlCompartir, '_blank');
    }
}
</script>
</div>
</body>
</html>
