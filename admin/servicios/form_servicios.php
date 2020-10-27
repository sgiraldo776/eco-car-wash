<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Agregar Servicios Ofertados</h1>
    <form action="insertar_servicios.php" method="post">
        <fieldset>
            <legend>Datos del Servicio</legend>
            <label> Tipo de servicio: </label><br>
            <input type="text" name="Tipo_Servicio" placeholder="Tipo de servicio"><br><br>
            <label> Descripción del servicio: </label><br>
            <textarea name="Descripcion" cols="30" rows="10" placeholder="Descripcion del servicio"></textarea><br><br>
            <label> Valor del servicio: </label><br>
            <input type="text" name="Valor" placeholder="Valor del servicio"><br><br>
            <input type="submit" value="Agregar">
        </fieldset>
    </form>
</body>
</html>