<?php
	session_start();

if(isset($_POST['enviar'])) {
    include ("../configuracion.php");
    if (!$link) {
        $msg="Conexión imposible. Revise las credenciales de conexión";  
    } else {
        $usuario = !empty($_POST['usuario']) ? $_POST['usuario'] : NULL;
        $Password = !empty($_POST['Password']) ? $_POST['Password'] : NULL;
        $repassword = !empty($_POST['repassword']) ? $_POST['repassword'] : NULL;
        $levely = !empty($_POST['levely']) ? $_POST['levely'] : NULL;
        $nombre = !empty($_POST['nombre']) ? $_POST['nombre'] : NULL;

        $Num_folios = !empty($_POST['Num_folios']) ? $_POST['Num_folios'] : NULL;
       
       
       
        $curp_rfc = !empty($_POST['curp_rfc']) ? $_POST['curp_rfc'] : NULL;
        $fecha_naci = !empty($_POST['fecha_naci']) ? $_POST['fecha_naci'] : NULL;
        $nacionalidad = !empty($_POST['nacionalidad']) ? $_POST['nacionalidad'] : NULL;
        $estado_emision = !empty($_POST['estado_emision']) ? $_POST['estado_emision'] : NULL;
        $tipo_licencia = !empty($_POST['tipo_licencia']) ? $_POST['tipo_licencia'] : NULL;
        $vigencia = !empty($_POST['vigencia']) ? $_POST['vigencia'] : NULL;

       

        if($usuario && $Password && $repassword && $nombre) { 
            $sql = 'SELECT * FROM usuarioslicencias';
            $rec = $link->query($sql); 

            $verificar_usuario = FALSE;

            while($result = $rec->fetch_object()) { 
                if($result->usuario == $usuario) { 
                    $verificar_usuario = TRUE; 
                    break; 
                }
            } 

            if(!$verificar_usuario) { 
                if($Password == $repassword) { 
                    $sql = "INSERT INTO usuarioslicencias 
                            (nombre,usuario, clave,fecha_registro,levely,Num_folios)
                            VALUES 
                            ('$nombre','$usuario', '$Password', NOW(), $levely,'$Num_folios');";

                    if ($link->query($sql) && $link->affected_rows > 0) {
                        echo '<script type="text/javascript">
                                alert("Usted se ha registrado correctamente.");
                                window.location.href="index.php";
                              </script>';
                    } else {
                        $msg = "Error en la inserción";
                    }
                } else { 
                    $msg = "Las claves no son iguales, intente nuevamente."; 
                } 
            } else {
                $msg = "Este usuario ya ha sido registrado anteriormente."; 
            } 
        } else {
            $msg = "Por favor llene todos los campos. Faltan datos en el POST";
        }
    }
} else {
    $msg = "";  
}

echo $msg;

?>
