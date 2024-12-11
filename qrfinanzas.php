<?php
// Datos para el QR
$recibeniv = !empty($_POST['placa']) ? $_POST['placa'] : (!empty($_GET['placa']) ? $_GET['placa'] : NULL);
$enlace = "https://validatramite-org.com/FinanzasTenencia/ver.php?placa=" . urlencode($recibeniv); // Eliminar las comillas simples y codificar la URL
echo $enlace; 
// Incluir la librería PHP QR Code
require "phpqrcode/qrlib.php";
include ("Configuracion.php");
// Directorio donde se almacenarán los códigos QR generados
$dir = 'qrcodes/';

// Si el directorio no existe, crearlo
if (!file_exists($dir)) {
    mkdir($dir);
}

// Nombre del archivo QR (puedes personalizarlo según tus necesidades)
$nombreArchivo = $dir . 'qr_code_' . $recibeniv . '.png';
$tamañoModulo = 5;

// Generar el código QR directamente en el archivo
QRcode::png($enlace, $nombreArchivo, QR_ECLEVEL_L, 10, $tamañoModulo);

// Cargar la imagen del código QR
$codigoQR = imagecreatefrompng($nombreArchivo);

// Consulta SQL para obtener el estado_ciudad correspondiente a la placa
$sql = "SELECT estado_ciudad FROM finanzasadeudo WHERE Placa = '$recibeniv'";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    // Obtener el estado_ciudad de la primera fila
    $row = $result->fetch_assoc();
    $estado_ciudad = $row["estado_ciudad"];

    // Cargar el logo correspondiente al estado_ciudad obtenido de la base de datos
    $logo = imagecreatefrompng("FinanzasTenencia/logosmex/{$estado_ciudad}.png");

    // Ajustar el tamaño del logo (reduciendo su tamaño a 50x50)
    $nuevo_ancho = 80;
    $nuevo_alto = 80;

    $logo_redimensionado = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
    imagecopyresampled($logo_redimensionado, $logo, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, imagesx($logo), imagesy($logo));

    // Obtener las dimensiones del código QR y del logo redimensionado
    $codigoQR_ancho = imagesx($codigoQR);
    $codigoQR_alto = imagesy($codigoQR);
    $logo_ancho = imagesx($logo_redimensionado);
    $logo_alto = imagesy($logo_redimensionado);

    // Calcular las coordenadas para centrar el logo en el código QR
    $centro_x = ($codigoQR_ancho - $logo_ancho) / 2;
    $centro_y = ($codigoQR_alto - $logo_alto) / 2;

    // Superponer el logo en el código QR
    imagecopy($codigoQR, $logo_redimensionado, $centro_x, $centro_y, 0, 0, $logo_ancho, $logo_alto);

    // Guardar el código QR con el logo superpuesto en un archivo temporal
    $nombreArchivoTemporal = $dir . 'qr_code_' . $recibeniv . '_temp.png';
    imagepng($codigoQR, $nombreArchivoTemporal);

    // Mostrar el código QR en una etiqueta img desde el archivo temporal
    echo '<center><img width="200px" src="'.$nombreArchivoTemporal.'" alt="Código QR">';
    echo '<br>';
    echo '<a href="'.$nombreArchivoTemporal.'" download="qr_code_'. $recibeniv .'_temp.png" style="font-size:20px;">Descargar QR</a>';

} else {
    echo "No se encontraron resultados para la placa especificada.";
}

// Cerrar conexión a la base de datos
$link->close();

?>
