<?php
    require_once "../../conexion.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/estilos.css">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <title>Formulario Servicios</title>
</head>
<body>



<div class="d-flex" id="conten-prin">
        <!-- Sidebar -->
        <div id="sidebar-container" class="col-3">
            <div class="col-3 d-none d-lg-block logo2">
                <img src="../../img/logo-bla.png" alt="">
            </div>
            <div class="menu">
                <a href="../insumos/form_insumo.php" class="d-flex text-light p-3 border-0"><i class="icon ion-md-apps lead mr-2" title="Insumos"></i><h5 class="m-1 navbar-enlaces">Insumos</h5></a>
                <a href="../parqueadero/form-parqueadero-hra.php" class="d-flex text-light p-3 border-0"><i class="icon ion-md-people lead mr-2" title="Parqueadero"></i><h5 class="m-1 navbar-enlaces">Parqueadero Hora</h5></a>
                <a href="../parqueadero/form-parqueadero-mes.php" class="d-flex text-light p-3 border-0"><i class="icon ion-md-people lead mr-2" title="Parqueadero"></i><h5 class="m-1 navbar-enlaces">Parqueadero Mes</h5></a>
                <a href="form_servicios.php" class="d-flex text-light p-3 border-0"><i class="icon ion-md-stats lead mr-2" title="Servicios"></i><h5 class="m-1 navbar-enlaces">Servicios</h5></a>
                <a href="../proveedor/form_proveedor.php" class="d-flex text-light p-3 border-0"><i class="icon ion-md-person lead mr-2" title="Proveedor"></i><h5 class="m-1 navbar-enlaces">Proveedor</h5></a>
                <a href="../sitio/form_sitio.php" class="d-flex text-light p-3 border-0"> <i class="icon ion-md-settings lead mr-2" title="Sitio Turistico"></i><h5 class="m-1 navbar-enlaces">Sitio Turistico</h5></a>
                
            </div>
        </div>
        <div class="container formularios col-9">
        <div class="container">
        <h1>Agregar Servicios Ofertados</h1>
        <form action="insertar_servicios.php" method="post">
            <div class="form-group">
                <label> Tipo de servicio: </label>
                <input type="text" name="Tipo_Servicio" class="form-control" placeholder="Tipo de servicio">
            </div>
            <div class="form-group">
                <label> Descripción del servicio: </label>
                <textarea name="Descripcion" class="form-control" cols="30" rows="10" placeholder="Descripcion del servicio"></textarea>
            </div>
            <div class="form-group">
                <label> Valor del servicio: </label>
                <input type="text" class="form-control" name="Valor" placeholder="Valor del servicio">
            </div>
            
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>

        <div class="mt-4">
            <table class="table table-hover">
                <thead class="thead">
                    <th>id</th>
                    <th>Tipo de Servicio</th>
                    <th>Descripcion</th>
                    <th>Valor</th>
                    <th></th>
                    <th></th>
                </thead>
                <?php 
                $sel = $conn ->query("SELECT * FROM tblservicios_ofertados ");
                while ($fila = $sel -> fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $fila['Id_Servicio'] ?></td>
                    <td><?php echo $fila['Tipo_Servicio'] ?></td>
                    <td><?php echo $fila['Descripcion'] ?></td>
                    <td><?php echo $fila['Valor'] ?></td>
                    <td><a href="frm_actu_padecimiento.php?padecimientoid=<?php echo $fila['padecimientoid'] ?>">EDITAR</a></td>
                    <td><a href="eliminar_servicios.php?Id_Servicio=<?php echo $fila['Id_Servicio'] ?>">ELIMINAR</a></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>