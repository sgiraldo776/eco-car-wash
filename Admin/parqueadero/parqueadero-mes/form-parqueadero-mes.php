<?php
    require "../../../conexion.php";
    session_start();
    if($_SESSION['rol']!=1){
        echo "<script> location.href='../../index.php'; </script>";
    } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../css/estilos.css">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <title>Parqueadero Hora</title>
</head>

<body>

    <section class="fixed-top">
        <nav class="navbar navbar-expand-lg navbar-light bg-nav">
            <div class="col-12 btn-group btn-block text-center">
                <button type="button" class="btn btn-invi dropdown-toggle" data-toggle="dropdown" data-display="static"
                    aria-haspopup="true" aria-expanded="false">
                    Formularios
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-right" size="3">
                    <a href="../../insumos/form_insumo.php"><button class="dropdown-item"
                            type="button">Insumos</button></a>
                    <a href="../parqueadero-hra/form-parqueadero-hra.php"><button class="dropdown-item" type="button">Parqueadero
                            Hora</button></a>
                    <a href="form-parqueadero-mes.php"><button class="dropdown-item"
                            type="button">Parqueadero Mes</button></a>
                    <a href="../../servicios/form_servicios.php"><button class="dropdown-item"
                            type="button">Servicios</button></a>
                    <div class="dropdown-divider"></div>
                    <button class="dropdown-item" type="button">Cerrar Sección</button>
                </div>
            </div>
            </ul>
        </nav>
    </section>

    <div class="container formularios col-12 mt-5 p-sm-5">
        <div class="stinky text-center mb-3">
            <h2 class="">Ingresar Vehiculo Para Mensualidad</h2>
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
                <div class="form-group text-center mb-5">
                    <button type="submit" class="btn btn-color">Registrar</button>
                </div>
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

                    $contador=0;

                    while ($row=$sel->fetch_assoc()) {
                        $contador++;
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
                        <td><button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#Modal<?php echo $contador?>">Atrasado</button></td>
                        <?php
                        }else{
                        ?>
                        <td class="text-success">Al Dia</button></td>
                        <?php
                        }
                        ?>
                        <!-- Modal -->
                        <div class="modal fade" id="Modal<?php echo $contador?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <button class="btn btn-danger" data-toggle="modal"
                                                data-target="#Modal1<?php echo $contador?>">Cancelar
                                                Mensualidad</button>
                                            <a href="renovar-mensualidad.php?id=<?php echo $row['num_factura']; ?>"><button
                                                    class="btn btn-info">Renovar Mensualidad</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="Modal1<?php echo $contador?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Estas Seguro?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        A continuacion se muestran los datos de la mensualidad, si esta seguro de
                                        cancelarla presione "Cancelar", de lo contrario preiones "VOLVER"
                                        <hr>
                                        Nombre del cliente: <div class="text-info"><?php echo $row['Cliente'] ?>
                                        </div>
                                        Tipo de Vehiculo: <div class="text-info"><?php echo $row['tipo_vehiculo'] ?>
                                        </div>
                                        Placa del Vehiculo: <div class="text-info"><?php echo $row['placa'] ?></div>
                                        Fecha de inicio Mensualidad: <div class="text-primary">
                                            <?php echo $row['hora_ingreso'] ?></div>
                                        Valor de la Mensualidad: <div class="text-success">
                                            <?php echo $row['precio'] ?></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info" data-dismiss="modal">VOLVER</button>
                                        <a href="cancelar-mensualidad.php?id=<?php echo $row['num_factura']; ?>"><button
                                                type="button" class="btn btn-danger">Cancelar</button></a>
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


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
</body>

</html>