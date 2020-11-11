<?php
    require "../../../conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../css/estilos.css">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <title>Parqueadero Hora</title>
</head>
<body>

<div class="d-flex" id="conten-prin">
        <!-- Sidebar -->
        <div id="sidebar-container" class="col-3">
            <div class="col-3 d-none d-lg-block logo2">
                <img src="../../../img/logo-bla.png" alt="">
            </div>
            <div class="menu">
                <a href="../../insumos/form_insumo.php" class="d-flex text-light p-3 border-0"><i class="icon ion-md-apps lead mr-2" title="Insumos"></i><h5 class="m-1 navbar-enlaces">Insumos</h5></a>
                <a href="../parqueadero-hra/form-parqueadero-hra.php" class="d-flex text-light p-3 border-0"><i class="icon ion-md-people lead mr-2" title="Parqueadero"></i><h5 class="m-1 navbar-enlaces">Parqueadero Hora</h5></a>
                <a href="form-parqueadero-mes.php" class="d-flex text-light p-3 border-0"><i class="icon ion-md-people lead mr-2" title="Parqueadero"></i><h5 class="m-1 navbar-enlaces">Parqueadero Mes</h5></a>
                <a href="../../servicios/form_servicios.php" class="d-flex text-light p-3 border-0"><i class="icon ion-md-stats lead mr-2" title="Servicios"></i><h5 class="m-1 navbar-enlaces">Servicios</h5></a>
                <a href="../../proveedor/form_proveedor.php" class="d-flex text-light p-3 border-0"><i class="icon ion-md-person lead mr-2" title="Proveedor"></i><h5 class="m-1 navbar-enlaces">Proveedor</h5></a>
                <a href="../../sitio/form_sitio.php" class="d-flex text-light p-3 border-0"> <i class="icon ion-md-settings lead mr-2" title="Sitio Turistico"></i><h5 class="m-1 navbar-enlaces">Sitio Turistico</h5></a>
                
            </div>
        </div>
        <div class="container formularios col-9">
        <div class="mt-4">
            <h1 class="">Ingresar Vehiculo Para Mensualidad</h1>
        </div>
        <div>
            <form action="ingr-parqueadero-mes.php" method="POST">
                <div class="form-group">
                    <label>Nombre Del Cliente</label>
                    <input type="text" class="form-control" name="cliente">
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
                    <label>Correo</label>
                    <input class="form-control" type="email" name="correo">
                </div>
                <div class="form-group">
                    <label>Numero Celular</label>
                    <input class="form-control" type="tel" name="celular">
                </div>
                <div class="form-group">
                    <label>Placa del vehiculo</label>
                    <input class="form-control" type="text" name="placa">
                </div>
                <div class="form-group">
                    <label>Fecha de inicio mensualidad</label>
                    <input class="form-control" type="datetime-local" name="hora">
                    <small class="form-text text-muted">La hora de ingreso se rellena automaticamente</small>
                </div>
                <input type="submit" class="btn btn-color" value="Registrar">
            </form>
            <hr>
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">Cliente</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Placa</th>
                        <th scope="col">Tipo de Vehiculo</th>
                        <th scope="col">Fecha inicio Mensualidad</th>
                        <th scope="col">Precio Mensualidad</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sel = $conn->query("SELECT p.num_factura,p.Cliente,p.Correo,p.Celular,p.placa,p.tipo_vehiculo,p.hora_ingreso,tp.precio FROM tblparqueadero as p INNER JOIN tbltipoparqueo as tp ON p.id_parqueo=tp.id_parqueo WHERE p.id_parqueo=2 OR p.id_parqueo=6");

                    while ($row=$sel->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row['Cliente'] ?></td>
                        <td><?php echo $row['Correo'] ?></td>
                        <td><?php echo $row['Celular'] ?></td>
                        <td><?php echo $row['placa'] ?></td>
                        <td><?php echo $row['tipo_vehiculo'] ?></td>
                        <td><?php echo $row['hora_ingreso'] ?></td>
                        <td><?php echo $row['precio'] ?></td>
                        <?php
                        $fecha1= new DateTime($row['hora_ingreso']);
                        $fecha2= new DateTime("now");
                        $diff = $fecha1->diff($fecha2);

                        if (($diff->days)>30) {
                        ?>
                        <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Atrasado</button></td>
                        <?php
                        }else{
                        ?>
                        <td class="text-success">Al Dia</button></td>
                        <?php
                        }
                        ?>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Que desea Hacer?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <a href=""><button class="btn btn-danger">Cancelar Mensualidad</button></a>
                                            <a href="renovar-mensualidad.php?id=<?php $row['hora_ingreso']; ?>"><button class="btn btn-info">Renovar Mensualidad</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>