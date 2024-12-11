<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registro de Licencias de Vehículos</title>
</head>
<body>
<h2>Registro de Licencias de Vehículos</h2>
<form action="regis.php" method="POST" enctype="multipart/form-data">
    <label for="nombre">No. Licencia ID:</label>
    <input type="text" id="Nlicencia" name="Nlicencia" required><br><br>

    <label for="tipo">Tipo:</label>
    <input type="text" id="tipo" name="tipo" maxlength="20"><br><br>
    <label for="tipo">Nombre Completo:</label>
    <input type="text" id="nombrecompleto" name="nombrecompleto" maxlength="290"><br><br>

    <label for="tipo">Tipo Licencia:</label>
    <input type="text" id="tipolicencia" name="tipolicencia" maxlength="20"><br><br>
    <!-- Botones de archivo para subir fotos -->
    <label for="frente">Frente:</label>
    <input type="file" id="frente" name="frente" accept="image/*" required><br><br>

    <label for="reverso">Vigencia:</label>
    <input type="text" id="vigencia" name="vigencia"  ><br><br>

    <label for="fecha_emitida">Fecha Emitida:</label>
    <input type="date" id="fecha_emitida" name="fecha_emitida"><br><br>
    <label for="fechavigencia">Fecha Vigencia:</label>
    <input type="date" id="fechavigencia" name="fechavigencia"><br><br>
    <input type="submit" value="Guardar">
</form>

</body>
</html>
