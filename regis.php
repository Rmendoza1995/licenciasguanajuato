display_errors = On
error_reporting = E_ALL
<?php
session_start();


include("configuracion.php");

// Obtener los datos del formulario
$Nlicencia = $_POST['Nlicencia'];
$tipo = $_POST['tipo'];
$fecha_emitida = $_POST['fecha_emitida'];
$tipolicencia = $_POST['tipolicencia'];
$nombrecompleto = $_POST['nombrecompleto'];
$fechavigencia = $_POST['fechavigencia'];
$vigencia = $_POST['vigencia'];

// Manejar la subida de archivos
$frente_path = 'uploads/' . basename($_FILES['frente']['name']);

// Mover los archivos subidos a la carpeta 'uploads'
if (move_uploaded_file($_FILES['frente']['tmp_name'], $frente_path) ) {
    // Consulta para obtener el valor actual de Num_folio para el usuario de la sesión
    $sqlconsulta = "SELECT Num_folios FROM usuarioslicencias WHERE usuario = '" . $_SESSION['usuario'] . "'";
    $resultado = mysqli_query($link, $sqlconsulta);

    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        $num_folio_actual = intval($fila['Num_folios']); // Convertir a entero
echo "Número de folio actual: " . $sqlconsulta;

        // Verificar si el número de folio actual es mayor que 0
        if ($num_folio_actual > 0) {
            // Calcular el nuevo número de folio
            $num_folio_nuevo = $num_folio_actual - 1;

            // Actualizar el número de folio en la base de datos
            $sqlactualizafolio = "UPDATE usuarioslicencias SET Num_folios = $num_folio_nuevo WHERE usuario = '" . $_SESSION['usuario'] . "'";

            // Ejecutar la consulta de actualización
            mysqli_query($link, $sqlactualizafolio);

            // Preparar la consulta SQL para insertar los datos en la tabla
            $sql = "INSERT INTO licenciasguanajuato2 (Nlicencia, tipo, frente, vigencia, fecha_emitida, usuarioregistro,tipolicencia,nombrecompleto,fechavigencia) 
                    VALUES ('$Nlicencia', '$tipo', '$frente_path', '$vigencia', '$fecha_emitida', '" . $_SESSION['usuario'] . "', '$tipolicencia', '$nombrecompleto', '$fechavigencia')";

            // Ejecutar la consulta SQL
            if ($link->query($sql) === TRUE) {
                // Mensaje de alerta y redireccionamiento
                echo '<script>alert("Los datos se han guardado correctamente."); window.location.href = "buscador.php";</script>';
            } else {
                echo "Error: " . $sql . "<br>" . $link->error;
            }
        } else {
            // Manejar el caso en que el número de folio es 0 o negativo
          // echo '<script>alert("Usted ya no tiene folios. Comuníquese a la brevedad."); window.location.href = "buscador.php";</script>';
        }
    }
} else {
    echo "Error al subir los archivos.";
}

// Cerrar la conexión a la base de datos
$link->close();
?>
