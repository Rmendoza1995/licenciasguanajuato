<?php
	session_start();

include("configuracion.php");
/*$sql_connection = new mysqli('localhost:4437','root','','convenios');*/

if (mysqli_connect_errno()) {
    echo "Error connecting to database. " . mysqli_connect_error();
}

$usuario = mysqli_real_escape_string($link, $_POST['usuario']);
$Password = mysqli_real_escape_string($link, $_POST['Password']);

if (!$usuario || !$Password) {
    echo "Both fields must be filled out.";
    return;
}

$query = "SELECT levely from usuarioslicencias WHERE usuario='$usuario' AND clave='$Password'";

$result = mysqli_query($link, $query);
$rows = mysqli_num_rows($result);
if ($rows == 1) {
    // Leer consulta
    $datos = mysqli_fetch_assoc($result);
    // Comparar dato
    if ($datos['levely'] == 1) {
//administrador
        $_SESSION['usuario'] = $usuario;
        header("Location: admin.php");
    } else {
        //foliador
        $_SESSION['usuario'] = $usuario;
        header("Location:buscador.php");
    }
    // Finalizar ejecución de script
    exit;
} else {


    echo '<script type="text/javascript">
    alert("intentelo de nuevo O solicita registro");
    window.location.href="registrousuarios/IniciarSesion.php";
    </script>';
}
