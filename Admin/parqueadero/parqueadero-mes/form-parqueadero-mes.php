<?php
    require "../../../conexion.php";
    session_start();
    if (!isset($_SESSION['rol'])){
        echo "<script> location.href='../../index.php'; </script>";

    }else{
        if($_SESSION['rol']!=1){
            echo "<script> location.href='../../index.php'; </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../css/estilos.css">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../../../img/icono-pag.png">
    <!-- Sweet alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
                    <a href="../precios/precios.php"><button class="dropdown-item" type="button">Precios parqueadero</button></a>
                    <a href="../../servicios/form_servicios.php"><button class="dropdown-item"
                            type="button">Servicios</button></a>
                    <div class="dropdown-divider"></div>
                    <a href="<?php echo $URL; ?>/Cliente/login/cerrar_sesion.php"><button class="dropdown-item" type="button">Cerrar Sesión</button></a>
                </div>
            </div>
            </ul>
        </nav>
    </section>

    <div class="container formularios col-12 mt-5 p-sm-5">
        <div class="stinky text-center mb-3">
            <h2 class="">Ingresar vehículo Para mensualidad</h2>
        </div>
        <div>
            <form action="ingr-parqueadero-mes.php" name="add_form" method="POST">
                <div class="form-group">
                    <label>Nombre Del Cliente</label>
                    <input type="text" class="form-control" id="cliente" name="cliente">
                </div>
                <div class="form-group">
                    <label>Tipo de Vehículo</label>
                    <select class="form-control" id="tipo" name="tipo">
                        <option value="0" selected>- Seleccione -</option>
                        <option value="Moto">Moto</option>
                        <option value="Carro">Carro</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Correo</label>
                    <input class="form-control" type="email" id="correo" name="correo">
                </div>
                <div class="form-group">
                    <label>Número celular</label>
                    <input class="form-control" type="tel" id="celular" name="celular">
                </div>
                <div class="form-group">
                    <label>Placa del vehículo</label>
                    <input class="form-control" type="text" id="placa" name="placa">
                </div>
                <div class="form-group">
                    <label>Fecha de inicio mensualidad</label>
                    <input class="form-control" type="datetime-local" id="hora" name="hora">
                    <small class="form-text text-muted">La hora de ingreso se rellena automáticamente</small>
                </div>
                <div class="form-group text-center mb-5">
                    <button type="button" class="btn btn-color">Regístrar</button>
                </div>
            </form>
            <hr>
            <div class="contenedor">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-3 buscador busc">
                            <form action="form-parqueadero-mes.php" method="POST">
                                <input type="text" name="buscar" placeholder="Buscar" class="buscar">
                                    <button class="boton-buscar" type="submit" value="buscar">
                                    <img src="../../../img/buscar.svg"></button>
                                    <br>
                                    <span>para listar de todos los vehículos dejar el campo vacio y darle buscar</span>
                            </form>
                        </div>
                    </div>
                </div>
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">Cliente</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Placa</th>
                        <th scope="col">Tipo de vehículo</th>
                        <th scope="col">Fecha inicio mensualidad</th>
                        <th scope="col">Precio mensualidad</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $buscar = "";
                    if(!isset($_POST['buscar'])){
                        $_POST['buscar'] = "";
                        $buscar = $_POST['buscar'];
                    }
                    $buscar = $_POST['buscar'];

                    if($buscar == "" ){

                    $sel = $conn->query("SELECT p.num_factura,p.Cliente,p.Correo,p.Celular,p.placa,p.tipo_vehiculo,p.hora_ingreso,tp.precio FROM tblparqueadero as p INNER JOIN tbltipoparqueo as tp ON p.id_parqueo=tp.id_parqueo WHERE p.id_parqueo=2 OR p.id_parqueo=6");
                    }else{
                        $sel = $conn->query("SELECT p.num_factura,p.Cliente,p.Correo,p.Celular,p.placa,p.tipo_vehiculo,p.hora_ingreso,tp.precio FROM tblparqueadero as p INNER JOIN tbltipoparqueo as tp ON p.id_parqueo=tp.id_parqueo WHERE (p.id_parqueo=2 OR p.id_parqueo=6) and placa='$buscar'");
                    }

                    $contador=0;

                    while ($row=$sel->fetch_array()) {
                        $contador++;
                    ?>
                    <tr>
                        <td><?php echo $row[1] ?></td>
                        <td><?php echo $row[2] ?></td>
                        <td><?php echo $row[3] ?></td>
                        <td><?php echo $row[4] ?></td>
                        <td><?php echo $row[5] ?></td>
                        <td><?php echo $row[6] ?></td>
                        <td><?php echo $row[7] ?></td>
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
                        <td class="text-success">Al Día</button></td>
                        <?php
                        }
                        ?>
                        <!-- Modal -->
                        <div class="modal fade" id="Modal<?php echo $contador?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">¿Qué desea hacer?</h5>
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
                                                    class="btn btn-info">Renovar mensualidad</button></a>
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
                                        <h5 class="modal-title" id="exampleModalLabel">¿Estás Seguro?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        A continuación se muestran los datos de la mensualidad, si está seguro de
                                        cancelar presione "Cancelar", de lo contrario presione "VOLVER".
                                        <hr>
                                        Nombre del cliente: <div class="text-info"><?php echo $row['Cliente'] ?>
                                        </div>
                                        Tipo de Vehículo: <div class="text-info"><?php echo $row['tipo_vehiculo'] ?>
                                        </div>
                                        Placa del Vehículo: <div class="text-info"><?php echo $row['placa'] ?></div>
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

    <?php
        if(isset($_GET['msg'])){
            if($_GET['msg']==1){
        ?>

        <script>
            Swal.fire('Ingresado correctamente')
        </script>

        <?php
            }else{
                if($_GET['msg']==2){
        ?>

        <script>
            Swal.fire('No se ha podido ingresar')
        </script>

        <?php
                }else{
                    if($_GET['msg']==3){
        ?>

        <script>
            Swal.fire('Mensualidad Renovada Correctamente')
        </script>

        <?php
                    }else{
                        if($_GET['msg']==4){
        ?>

        <script>
            Swal.fire('No se ha podido renovar la mensualidad')
        </script>

        <?php
                        }else{
                            if($_GET['msg']==5){
        ?>

        <script>
            Swal.fire('Mensualidad cancelada correctamente')
        </script>


        <?php
                            }else{
                                if($_GET['msg']==6){
        ?>

        <script>
            Swal.fire('No se pudo cancelar la mensualidad')
        </script>

        <?php
                                }
                            }
                        }
                    }
                }
            }
        }
        ?>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>

    <!--validacion de capos vacios-->
    <script type="text/javascript" src="js/validacion.js"></script>
</body>

</html>