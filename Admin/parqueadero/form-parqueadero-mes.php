<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/estilos.css">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <title>Parqueadero Hora</title>
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
                <a href="form-parqueadero-hra.php" class="d-flex text-light p-3 border-0"><i class="icon ion-md-people lead mr-2" title="Parqueadero"></i><h5 class="m-1 navbar-enlaces">Parqueadero Hora</h5></a>
                <a href="form-parqueadero-mes.php" class="d-flex text-light p-3 border-0"><i class="icon ion-md-people lead mr-2" title="Parqueadero"></i><h5 class="m-1 navbar-enlaces">Parqueadero Mes</h5></a>
                <a href="../servicios/form_servicios.php" class="d-flex text-light p-3 border-0"><i class="icon ion-md-stats lead mr-2" title="Servicios"></i><h5 class="m-1 navbar-enlaces">Servicios</h5></a>
                <a href="../proveedor/form_proveedor.php" class="d-flex text-light p-3 border-0"><i class="icon ion-md-person lead mr-2" title="Proveedor"></i><h5 class="m-1 navbar-enlaces">Proveedor</h5></a>
                <a href="../sitio/form_sitio.php" class="d-flex text-light p-3 border-0"> <i class="icon ion-md-settings lead mr-2" title="Sitio Turistico"></i><h5 class="m-1 navbar-enlaces">Sitio Turistico</h5></a>
                
            </div>
        </div>
        <div class="container formularios col-9">
        <div class="mt-4">
            <h1 class="">Ingresar Vehiculo Para Mensualidad</h1>
        </div>
        <div>
            <form action="">
                <div class="form-group">
                    <label>Cliente</label>
                    <select class="form-control" name="tipo">
                        <option value="Moto" selected disabled>- Seleccione -</option>
                        <option value="Moto">Paco - 3117657788</option>
                        <option value="Carro">Carlos - 4455876699</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tipo de Vehiculo</label>
                    <select class="form-control" name="tipo">
                        <option value="Moto" selected disabled>- Seleccione -</option>
                        <option value="Moto">Moto</option>
                        <option value="Carro">Carro</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Placa del vehiculo</label>
                    <input class="form-control" type="text" name="placa">
                </div>
                <div class="form-group">
                    <label>Fecha de inicio mensualidad</label>
                    <input class="form-control" type="text" name="hora" value="<?php echo date('Y-m-d', time()-21600);?>" disabled>
                    <small class="form-text text-muted">La hora de ingreso se rellena automaticamente</small>
                </div>
                <input type="submit" class="btn btn-color" value="Registrar">
            </form>
            <hr>
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">Cliente</th>
                        <th scope="col">Tipo vehiculo</th>
                        <th scope="col">Placa</th>
                        <th scope="col">Hora de Ingreso</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Paco</td>
                        <td>Carro</td>
                        <td>CNK-257</td>
                        <td>9/11/2020</td>
                        <td><button class="btn btn-danger">Atrasado</button></td>
                    </tr>
                    <tr>
                        <td>Paco</td>
                        <td>Carro</td>
                        <td>CNK-257</td>
                        <td>9/11/2020</td>
                        <td class="text-success">Al Dia</td>
                    </tr>
                    <tr>
                        <td>Paco</td>
                        <td>Carro</td>
                        <td>CNK-257</td>
                        <td>9/11/2020</td>
                        <td class="text-success">Al Dia</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>