<?php
    include '../../conexion.php';

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

        <title>Formulario Insumos</title>
    </head>

    <body>

        <section class="fixed-top">
            <nav class="navbar navbar-expand-lg navbar-light bg-nav">
                <div class="col-12 btn-group btn-block text-center">
                    <button type="button" class="btn btn-invi dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                                Formularios
                            </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-right" size="3">
                        <a href="form_insumo.php"><button class="dropdown-item" type="button">Insumos</button></a>
                        <a href="../parqueadero/parqueadero-hra/form-parqueadero-hra.php"><button class="dropdown-item" type="button">Parqueadero hora</button></a>
                        <a href="../parqueadero/parqueadero-mes/form-parqueadero-mes.php"><button class="dropdown-item" type="button">Parqueadero mes</button></a>
                        <a href="../parqueadero/precios/precios.php"><button class="dropdown-item" type="button">Precios parqueadero</button></a>
                        <a href="../servicios/form_servicios.php"><button class="dropdown-item" type="button">Servicios</button></a>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo $URL; ?>/Cliente/login/cerrar_sesion.php"><button class="dropdown-item" type="button">Cerrar sesión</button></a>
                    </div>
                </div>
                </ul>
            </nav>
        </section>


        <div class="container formularios col-12 mt-5 p-sm-5">
            <div class="stinky text-center">
                <h2>Formulario Insumos</h2>
            </div>
            <form action="ingresar_insumo.php" name="add_form" method="post">

                <div class="form-group">
                    <label>Cantidad</label>
                    <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad unidades">
                </div>
                <div class="form-group">
                    <label>Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion Del Insumo">
                </div>
                <div class="form-group">
                    <label>Valor Unitario</label>
                    <input type="text" class="form-control" id="valorunitario" name="valorunitario" placeholder="Valor Unitario">
                </div>

                <div class="form-group text-center mb-5">
                    <button type="button" class="btn btn-color">Registrar</button>
                </div>

            </form>
            <div class="tabla-admin mt-4">
                <table class="table table-hover">
                    <thead class="thead">
                        <th>Id</th>
                        <th>Cantidad</th>
                        <th>Descripción</th>
                        <th>Valor Unitario</th>
                        <th>Valor Total</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </thead>
                    <?php 
                        $sel = $conn ->query("SELECT * FROM tblInsumo_Repuesto ");
                        $cont=0;
                        while ($fila = $sel -> fetch_assoc()) {
                            $cont++;
                        ?>
                    <tr>
                        <td>
                            <?php echo $fila['Id_Insumo'] ?>
                        </td>
                        <td>
                            <?php echo $fila['Cantidad'] ?>
                        </td>
                        <td>
                            <?php echo $fila['Descripcion'] ?>
                        </td>
                        <td>
                            <?php echo $fila['Vlr_Unitario'] ?>
                        </td>
                        <td>
                            <?php echo $fila['Vlr_Total'] ?>
                        </td>
                        <td><a href="#" onclick="preguntar(<?php echo $fila['Id_Insumo']?>)"><button type="button" class="btn btn-primary">ELIMINAR</button></a></td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo $cont; ?>" id="ingresar">Salida Insumo</button></td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal2<?php echo $cont; ?>" id="ingresar">Agregar Insumo</button></td>

                    </tr>
                    <div class="modal" tabindex="-1" role="dialog" id="modal<?php echo $cont; ?>">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Salida del Insumo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">


                                    <form action="restar_insumo.php?Id_Insumo=<?php echo $fila['Id_Insumo']?>" method="post">
                                        <label>Código:</label>
                                        <input type="text" class="form-control" name="codigo" value="<?php echo $fila['Id_Insumo'] ?>" disabled>
                                        <label>Nombre Producto:</label>
                                        <input type="text" class="form-control" name="nombre" value="<?php echo $fila['Descripcion'] ?>" disabled>
                                        <label>cantidad vendida:</label>
                                        <input type="text" class="form-control" name="cantidad">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="modal" tabindex="-1" role="dialog" id="modal2<?php echo $cont; ?>">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Agregar Insumo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">


                                    <form action="sumar_insumo.php?Id_Insumo=<?php echo $fila['Id_Insumo']?>" method="post">
                                        <label>Código:</label>
                                        <input type="text" class="form-control" name="codigo" value="<?php echo $fila['Id_Insumo'] ?>" disabled>
                                        <label>Nombre Producto:</label>
                                        <input type="text" class="form-control" name="nombre" value="<?php echo $fila['Descripcion'] ?>" disabled>
                                        <label>Cantidad a agregar:</label>
                                        <input type="text" class="form-control" name="cantidad">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
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

        </div>
        </div>


        <script type="text/javascript">
        function preguntar(id){
        Swal
            .fire({
                title: "¿Eliminar insumo?",
                text: "¿Estas seguro de eliminar el insumo?",
                icon: 'error',            
                showCancelButton: true,
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar",
            })
            .then(resultado => {
                if (resultado.value) {
                    // Hicieron click en "Sí"
                    //console.log("*se elimina la venta*");
                    window.location.href="eliminar_insumo.php?Id_Insumo="+id
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
            Swal.fire('Insumo ingresado correctamente')
        </script>

        <?php
            }else{
                if($_GET['msg']==2){
        ?>

        <script>
            Swal.fire('No se ha podido ingresar el insumo')
        </script>

        <?php
                }else{
                    if($_GET['msg']==3){
        ?>

        <script>
            Swal.fire('Salida del insumo hecha correctamente')
        </script>

        <?php
                    }else{
                        if($_GET['msg']==4){
        ?>

        <script>
            Swal.fire('Error en la salida del insumo')
        </script>

        <?php
                        }else{
                            if($_GET['msg']==5){
        ?>

        <script>
            Swal.fire('Insumo eliminado correctamente')
        </script>


        <?php
                            }else{
                                if($_GET['msg']==6){
        ?>

        <script>
            Swal.fire('Hubo un error al eliminar el insumo')
        </script>

        <?php
                            }else{
                                if($_GET['msg']==7){
        ?>

        <script>
            Swal.fire('Insumo agregado correctamente')
        </script>

        <?php
                            }else{
                                if($_GET['msg']==8){
        ?>

        <script>
            Swal.fire('Hubo un error al agregar el insumo')
        </script>


        <?php
                                        }   
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        ?>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

        <!--validacion de capos vacios-->
        <script type="text/javascript" src="js/validacion.js"></script>
    </body>

    </html>