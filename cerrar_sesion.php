<?php
// Iniciar la sesión
session_start();

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir a una página de inicio de sesión u otra página después de cerrar sesión
header("Location:registrousuarios/IniciarSesion.php");
exit; // Asegúrate de que el código se detenga después de la redirección
?>
