<?php
    include '../../conexion.php';

    session_start();
    if (!isset($_SESSION['rol'])){
        echo "<script> location.href='../login/frm_login.php'; </script>";

    }else{
        if($_SESSION['rol']!=2){
            echo "<script> location.href='../../index.php'; </script>";
        }
    }
?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- bootrap inportacion -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <!-- Styles -->
        <link rel="stylesheet" href="../../css/estilos.css">
        <!-- Ionic icons -->
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
        <!-- Sweet alerts -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        
        <link rel="icon" type="image/png" href="../../img/icono-pag.png">

        <title>Mi vehículo</title>
    </head>

    <body>
        <div class="container formularios col-12 p-sm-5">
            <div class="text-center logo col-12">
                <a href="../../index.php">
                    <img src="../../img/logo.png" alt="" style="width: 60%">
                </a>
            </div>
            <div class="align-items-center text-center">
                <a href="../vehiculo/form_vehic.php"><button type="submit" class="btn-color">Agregar vehiculo</button></a>
            </div>
            <div class="tabla-admin mt-4">
                <table class="table table-hover">
                    <thead class="thead">
                        <th>Placa</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Color</th>
                        <th>Vehiculo</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <?php 
                        $cliente=$_SESSION['id_cliente'];
                        $sel = $conn -> query("SELECT * FROM tblvehiculo WHERE id_Cliente='$cliente'");
                        $cont=0;
                        while ($fila = $sel -> fetch_array()) {
                            $cont++;
                        ?>
                    <tr>
                        <td>
                            <?php echo $fila[0] ?>
                        </td>
                        <td>
                            <?php echo $fila[1] ?>
                        </td>
                        <td>
                            <?php echo $fila[2] ?>
                        </td>
                        <td>
                            <?php echo $fila[3] ?>
                        </td>
                        <td>
                            <?php echo $fila[4] ?>
                        </td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo $cont; ?>" id="ingresar">Modificar vehiculo</button></td>
                        <td><a href="#" onclick="preguntar('<?php echo $fila[0]?>')">ELIMINAR</a></td>
                    </tr>
                    <div class="modal" tabindex="-1" role="dialog" id="modal<?php echo $cont; ?>">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Salida del Insumo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">
                                    <form action="editar_vehiculo.php?placa=<?php echo $fila[0]?>" method="post">
                                        <div class="logo col-12 text-center">
                                            <a href="">
                                                <img src="../../img/logo.png" alt="">
                                            </a>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label for="#">Placa</label>
                                                <input type="text" class="form-control" id="placa" name="placa" value="<?php echo $fila[0] ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-12 col-md-6 col-lg-6">
                                                <label for="#">Marca</label>
                                                <input type="text" class="form-control" id="marca" name ="marca" value="<?php echo $fila[1] ?>" required>
                                            </div>
                                            <div class="form-group col-12 col-md-6 col-lg-6">
                                                <label for="">Modelo</label>
                                                <input type="number" class="form-control" id="modelo" name="modelo" min="1960" max="2050" value="<?php echo $fila[2] ?>"  required>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-12 col-md-6 col-lg-6">
                                                <label for="#">Color</label>
                                                <input type="text" class="form-control" id="color" name="color" value="<?php echo $fila[3] ?>" required>
                                            </div>
                                            <div class="form-group col-12 col-md-6 col-lg-6">
                                                <label for="">Tipo de vehículo</label>
                                                <select class="custom-select" name="tipo" id="tipo">
                                                <?php
                                                    if ($fila[4]=="Motocicleta") {
                                                ?>
                                                <option disabled>--Seleccione una opción--</option>
                                                <option value="Motocicleta" selected>Motocicleta</option>
                                                <option value="Motocarro">Motocarro</option>
                                                <option value="Mototriciclo">Mototriciclo</option>
                                                <option value="Cuatrimoto">Cuatrimoto</option>
                                                <option value="Automóvil">Automóvil</option>
                                                <option value="Campero">Campero</option>
                                                <option value="Camioneta">Camioneta</option>
                                                <option value="Microbús">Microbús</option>
                                                <option value="Bus">Bus</option>
                                                <option value="Buseta">Buseta</option>
                                                <option value="Camión">Camión</option>
                                                <option value="Tractocamión">Tractocamión</option>
                                                <option value="Volqueta">Volqueta</option>
                                                <?php
                                                    }elseif ($fila[4]=="Motocarro") {
                                                ?>
                                                <option disabled>--Seleccione una opción--</option>
                                                <option value="Motocicleta">Motocicleta</option>
                                                <option value="Motocarro" selected>Motocarro</option>
                                                <option value="Mototriciclo">Mototriciclo</option>
                                                <option value="Cuatrimoto">Cuatrimoto</option>
                                                <option value="Automóvil">Automóvil</option>
                                                <option value="Campero">Campero</option>
                                                <option value="Camioneta">Camioneta</option>
                                                <option value="Microbús">Microbús</option>
                                                <option value="Bus">Bus</option>
                                                <option value="Buseta">Buseta</option>
                                                <option value="Camión">Camión</option>
                                                <option value="Tractocamión">Tractocamión</option>
                                                <option value="Volqueta">Volqueta</option>
                                                <?php
                                                    }elseif ($fila[4]=="Mototriciclo") {
                                                ?>
                                                <option disabled>--Seleccione una opción--</option>
                                                <option value="Motocicleta">Motocicleta</option>
                                                <option value="Motocarro">Motocarro</option>
                                                <option value="Mototriciclo" selected>Mototriciclo</option>
                                                <option value="Cuatrimoto">Cuatrimoto</option>
                                                <option value="Automóvil">Automóvil</option>
                                                <option value="Campero">Campero</option>
                                                <option value="Camioneta">Camioneta</option>
                                                <option value="Microbús">Microbús</option>
                                                <option value="Bus">Bus</option>
                                                <option value="Buseta">Buseta</option>
                                                <option value="Camión">Camión</option>
                                                <option value="Tractocamión">Tractocamión</option>
                                                <option value="Volqueta">Volqueta</option>
                                                <?php
                                                    }elseif ($fila[4]=="Cuatrimoto") {
                                                ?>
                                                <option disabled>--Seleccione una opción--</option>
                                                <option value="Motocicleta">Motocicleta</option>
                                                <option value="Motocarro">Motocarro</option>
                                                <option value="Mototriciclo">Mototriciclo</option>
                                                <option value="Cuatrimoto" selected>Cuatrimoto</option>
                                                <option value="Automóvil">Automóvil</option>
                                                <option value="Campero">Campero</option>
                                                <option value="Camioneta">Camioneta</option>
                                                <option value="Microbús">Microbús</option>
                                                <option value="Bus">Bus</option>
                                                <option value="Buseta">Buseta</option>
                                                <option value="Camión">Camión</option>
                                                <option value="Tractocamión">Tractocamión</option>
                                                <option value="Volqueta">Volqueta</option>
                                                <?php
                                                    }elseif ($fila[4]=="Automóvil") {
                                                ?>
                                                <option disabled>--Seleccione una opción--</option>
                                                <option value="Motocicleta">Motocicleta</option>
                                                <option value="Motocarro">Motocarro</option>
                                                <option value="Mototriciclo">Mototriciclo</option>
                                                <option value="Cuatrimoto">Cuatrimoto</option>
                                                <option value="Automóvil" selected>Automóvil</option>
                                                <option value="Campero">Campero</option>
                                                <option value="Camioneta">Camioneta</option>
                                                <option value="Microbús">Microbús</option>
                                                <option value="Bus">Bus</option>
                                                <option value="Buseta">Buseta</option>
                                                <option value="Camión">Camión</option>
                                                <option value="Tractocamión">Tractocamión</option>
                                                <option value="Volqueta">Volqueta</option>
                                                <?php
                                                    }elseif ($fila[4]=="Campero") {
                                                ?>
                                                <option disabled>--Seleccione una opción--</option>
                                                <option value="Motocicleta">Motocicleta</option>
                                                <option value="Motocarro">Motocarro</option>
                                                <option value="Mototriciclo">Mototriciclo</option>
                                                <option value="Cuatrimoto">Cuatrimoto</option>
                                                <option value="Automóvil">Automóvil</option>
                                                <option value="Campero" selected>Campero</option>
                                                <option value="Camioneta">Camioneta</option>
                                                <option value="Microbús">Microbús</option>
                                                <option value="Bus">Bus</option>
                                                <option value="Buseta">Buseta</option>
                                                <option value="Camión">Camión</option>
                                                <option value="Tractocamión">Tractocamión</option>
                                                <option value="Volqueta">Volqueta</option>
                                                <?php
                                                    }elseif ($fila[4]=="Camioneta") {
                                                ?>
                                                <option disabled>--Seleccione una opción--</option>
                                                <option value="Motocicleta">Motocicleta</option>
                                                <option value="Motocarro">Motocarro</option>
                                                <option value="Mototriciclo">Mototriciclo</option>
                                                <option value="Cuatrimoto">Cuatrimoto</option>
                                                <option value="Automóvil">Automóvil</option>
                                                <option value="Campero">Campero</option>
                                                <option value="Camioneta" selected>Camioneta</option>
                                                <option value="Microbús">Microbús</option>
                                                <option value="Bus">Bus</option>
                                                <option value="Buseta">Buseta</option>
                                                <option value="Camión">Camión</option>
                                                <option value="Tractocamión">Tractocamión</option>
                                                <option value="Volqueta">Volqueta</option>
                                                <?php
                                                    }elseif ($fila[4]=="Microbús") {
                                                ?>
                                                <option disabled>--Seleccione una opción--</option>
                                                <option value="Motocicleta">Motocicleta</option>
                                                <option value="Motocarro">Motocarro</option>
                                                <option value="Mototriciclo">Mototriciclo</option>
                                                <option value="Cuatrimoto">Cuatrimoto</option>
                                                <option value="Automóvil">Automóvil</option>
                                                <option value="Campero">Campero</option>
                                                <option value="Camioneta">Camioneta</option>
                                                <option value="Microbús" selected>Microbús</option>
                                                <option value="Bus">Bus</option>
                                                <option value="Buseta">Buseta</option>
                                                <option value="Camión">Camión</option>
                                                <option value="Tractocamión">Tractocamión</option>
                                                <option value="Volqueta">Volqueta</option>
                                                <?php
                                                    }elseif ($fila[4]=="Bus") {
                                                ?>
                                                <option disabled>--Seleccione una opción--</option>
                                                <option value="Motocicleta">Motocicleta</option>
                                                <option value="Motocarro">Motocarro</option>
                                                <option value="Mototriciclo">Mototriciclo</option>
                                                <option value="Cuatrimoto">Cuatrimoto</option>
                                                <option value="Automóvil">Automóvil</option>
                                                <option value="Campero">Campero</option>
                                                <option value="Camioneta">Camioneta</option>
                                                <option value="Microbús">Microbús</option>
                                                <option value="Bus" selected>Bus</option>
                                                <option value="Buseta">Buseta</option>
                                                <option value="Camión">Camión</option>
                                                <option value="Tractocamión">Tractocamión</option>
                                                <option value="Volqueta">Volqueta</option>
                                                <?php
                                                    }elseif ($fila[4]=="Buseta") {
                                                ?>
                                                <option disabled>--Seleccione una opción--</option>
                                                <option value="Motocicleta">Motocicleta</option>
                                                <option value="Motocarro">Motocarro</option>
                                                <option value="Mototriciclo">Mototriciclo</option>
                                                <option value="Cuatrimoto">Cuatrimoto</option>
                                                <option value="Automóvil">Automóvil</option>
                                                <option value="Campero">Campero</option>
                                                <option value="Camioneta">Camioneta</option>
                                                <option value="Microbús">Microbús</option>
                                                <option value="Bus">Bus</option>
                                                <option value="Buseta" selected>Buseta</option>
                                                <option value="Camión">Camión</option>
                                                <option value="Tractocamión">Tractocamión</option>
                                                <option value="Volqueta">Volqueta</option>
                                                <?php
                                                    }elseif ($fila[4]=="Camión") {
                                                ?>
                                                <option disabled>--Seleccione una opción--</option>
                                                <option value="Motocicleta">Motocicleta</option>
                                                <option value="Motocarro">Motocarro</option>
                                                <option value="Mototriciclo">Mototriciclo</option>
                                                <option value="Cuatrimoto">Cuatrimoto</option>
                                                <option value="Automóvil">Automóvil</option>
                                                <option value="Campero">Campero</option>
                                                <option value="Camioneta">Camioneta</option>
                                                <option value="Microbús">Microbús</option>
                                                <option value="Bus">Bus</option>
                                                <option value="Buseta">Buseta</option>
                                                <option value="Camión" selected>Camión</option>
                                                <option value="Tractocamión">Tractocamión</option>
                                                <option value="Volqueta">Volqueta</option>
                                                <?php
                                                    }elseif ($fila[4]=="Tractocamión") {
                                                ?>
                                                <option disabled>--Seleccione una opción--</option>
                                                <option value="Motocicleta">Motocicleta</option>
                                                <option value="Motocarro">Motocarro</option>
                                                <option value="Mototriciclo">Mototriciclo</option>
                                                <option value="Cuatrimoto">Cuatrimoto</option>
                                                <option value="Automóvil">Automóvil</option>
                                                <option value="Campero">Campero</option>
                                                <option value="Camioneta">Camioneta</option>
                                                <option value="Microbús">Microbús</option>
                                                <option value="Bus">Bus</option>
                                                <option value="Buseta">Buseta</option>
                                                <option value="Camión">Camión</option>
                                                <option value="Tractocamión" selected>Tractocamión</option>
                                                <option value="Volqueta">Volqueta</option>
                                                <?php
                                                    }elseif ($fila[4]=="Volqueta") {
                                                ?>
                                                <option disabled>--Seleccione una opción--</option>
                                                <option value="Motocicleta">Motocicleta</option>
                                                <option value="Motocarro">Motocarro</option>
                                                <option value="Mototriciclo">Mototriciclo</option>
                                                <option value="Cuatrimoto">Cuatrimoto</option>
                                                <option value="Automóvil">Automóvil</option>
                                                <option value="Campero">Campero</option>
                                                <option value="Camioneta">Camioneta</option>
                                                <option value="Microbús">Microbús</option>
                                                <option value="Bus">Bus</option>
                                                <option value="Buseta">Buseta</option>
                                                <option value="Camión">Camión</option>
                                                <option value="Tractocamión">Tractocamión</option>
                                                <option value="Volqueta" selected>Volqueta</option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label for="#">Vencimiento del SOAT</label>
                                                <input type="date" class="form-control" id="soat" name="soat" value="<?php echo $fila[5] ?>" required>
                                            </div>
                                            <div class="form-group col-12">
                                                <label for="">Vencimiento de la Técnico Mecànica</label>
                                                <input type="date" class="form-control" id="tecmeca" name="tecmeca" value="<?php echo $fila[6] ?>" required>
                                            </div>
                                        </div>

                                        <div class="align-items-center text-center">
                                            <button type="submit" class="btn-color">Actualizar</button>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </table>
            </div>
        </div>

        <script type="text/javascript">
        function preguntar(id){
            Swal.fire({
                title: "¿Eliminar vehículo?",
                text: "¿Estas seguro de eliminar el vehículo?",
                icon: 'error',            
                showCancelButton: true,
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar",
            })
            .then(resultado => {
                if (resultado.value) {
                    window.location.href="eliminar_vehiculo.php?id_Vehiculo="+id
                } else {
                    // Dijeron que no
                    console.log("*NO se elimina*");
                }
            });

        }
        </script>

        <?php
        if(isset($_GET['msg'])){
            if($_GET['msg']==1){
        ?>

        <script>
            Swal.fire('Actualizado correctamente')
        </script>

        <?php
            }else{
                if($_GET['msg']==2){
        ?>

        <script>
            Swal.fire('No se ha podido actualizar')
        </script>

        <?php
                    }else{
                        if($_GET['msg']==3){
        ?>

        <script>
            Swal.fire('Vehículo eliminado correctamente')
        </script>


        <?php
                        }else{
                            if($_GET['msg']==4){
        ?>

        <script>
            Swal.fire('Hubo un error al eliminar el vehículo')
        </script>

        <?php
                        }
                    }
                }
            }
        }
        ?>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    </body>

    </html>