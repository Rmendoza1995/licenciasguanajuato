<?php

// Datos para el QR
$Nlicencia = !empty($_POST['Nlicencia']) ? $_POST['Nlicencia'] : (!empty($_GET['Nlicencia']) ? $_GET['Nlicencia'] : NULL);
$enlace = "https://conducirlicenciasguanajuato.com/FrontGuanajuato.php?token=" . urlencode($Nlicencia); // Eliminar las comillas simples y codificar la URL

// Incluir la librería PHP QR Code
require "phpqrcode/qrlib.php";

// Directorio donde se almacenarán los códigos QR generados
$dir = 'qrcodes/';

// Si el directorio no existe, crearlo
if (!file_exists($dir)) {
    mkdir($dir);
}

// Nombre del archivo QR (puedes personalizarlo según tus necesidades)
$nombreArchivo = $dir . 'qr_code_' . $Nlicencia . '.png';
$tamañoModulo = 5;

QRcode::png($enlace, $nombreArchivo, QR_ECLEVEL_L, 10, $tamañoModulo);
echo '        <a href="buscador.php" class="btn btn-primary" style="font-size:20px;">Atras</a><br>';
echo "Enlace creado:  ", $enlace,'<br>';

// Mostrar el código QR en una etiqueta img
echo '<center><img width="300px" src="'.$nombreArchivo.'" alt="Código QR">';
echo '<br>';
echo '<a href="'.$nombreArchivo.'" download="qr_code_'. $Nlicencia .'.png" style="font-size:20px;">Descargar QR</a>';

?>
