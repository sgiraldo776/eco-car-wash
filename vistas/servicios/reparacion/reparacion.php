<?php
    include('../../../conexion.php');
    session_start();
        if(!isset($_SESSION['rol'])){
            echo "<script> location.href='../../../Cliente/login/frm_login.php'; </script>";
        }else{
            if($_SESSION['rol'] !=1 ){
                if($_SESSION['rol'] =2 ){
                    include '../../includes/header-usuario.php';
                }else {
                    echo "<script> location.href='../../../Cliente/login/frm_login.php'; </script>";
                }
            }else {
                include '../../includes/header-admin.php';
            }            
        }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eco Car Wash</title>

    <!--importacion boostrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/f599362e7b.js" crossorigin="anonymous"></script>

    <link rel="icon" type="image/png" href="../../../img/icono-pag.png">

    <link rel="stylesheet" href="../../../css/estilos.css">

    <!-- Sweet alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <section>
        <div class="container">
            <div class="col-12 my-5 text-center">
                <h1>Reparación</h1>
            </div>
            <div class="row m-0 p-0">
                <div class="col-md-4">
                    <div class="col-12">
                        <form action="ingresar_reparacion.php" method="post" name="add_form" class="col-12">

                            <div class="form-group">
                                <label class="my-1 mr-2">Mi Vehículo</label>
                                <select class="custom-select my-1 mr-sm-2" name="vehiculo" id="vehiculo">
                                    <option value="0">--seleccione--</option>
                                    <?php 
                                    $cliente=$_SESSION['id_cliente'];
                                    $sel = $conn ->query("SELECT * FROM tblvehiculo WHERE Id_Cliente='$cliente'");
                                    
                                    while ($row=$sel->fetch_array()) {
                                    ?>
                                    <option value="<?php echo $row[0] ?>"><?php echo $row[0] ?> - <?php echo $row[4] ?>
                                    </option>
                                    <?php	
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="my-1 mr-2">Tipo de reparación</label>
                                <select class="custom-select my-1 mr-sm-2" name="servicio" id="servicio">
                                    <option value="0">--seleccione--</option>
                                    <?php 
                                    $sel = $conn ->query("SELECT * FROM tblservicios_ofertados WHERE Tipo_Servicio='Reparacion'");
                                    
                                    while ($row=$sel->fetch_array()) {
                                    ?>
                                    <option value="<?php echo $row[2] ?>"> <?php echo $row[2] ?></option>
                                    <?php	
                                    }
                                    ?>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Descripción</label>
                                <textarea class="form-control" name="descripcion" id="descropcion" maxlength="500"
                                    cols="30" rows="10"
                                    placeholder="Campo no obligatorio, salvo de seleccionar 'Otro'."></textarea>
                            </div>

                            <div class="mb-3 text-danger">
                                <small>Revise en el calendario que la hora elegida esté disponible utilizando los
                                    botones de navegación del mismo</small>
                            </div>

                            <div class="form-group">
                                <label>Fecha de la Reparación</label>
                                <input class="form-control" type="date" name="fecha" id="fecha">
                                <div class="mb-3 text-danger">
                                    <small>Utilice las horas especificadas</small>
                                    <input class="form-control" type="time" name="hora" id="hora" list="listahoras">
                                </div>
                            </div>

                            <div class="form-group text-center mt-3 mb-5">
                                <button type="button" class="btn btn-color enviar">Reservar</button>
                            </div>

                        </form>
                        <datalist id="listahoras">
                            <option value="08:00">
                            <option value="08:38">
                            <option value="09:16">
                            <option value="09:54">
                            <option value="10:32">
                            <option value="11:09">
                            <option value="11:46">
                            <option value="12:23">
                            <option value="13:00">
                            <option value="13:37">
                            <option value="14:14">
                            <option value="14:50">
                            <option value="15:28">
                            <option value="16:05">
                            <option value="16:42">
                        </datalist>
                    </div>
                </div>
                <div class="col-md-8">
                    <?php include "../../../calendar/calendar.php";?>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer py-4 fixed-md-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 text-lg-center text-center contac">
                    <h3 class="contac"><a href="<?php echo $URL; ?>vistas/contactenos/contacto.php">Contáctenos</a></h3>
                </div>
                <div class="col-lg-6 my-3 my-lg-0 text-lg-center text-center">
                    <a class="redes btn btn-social mx-3" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="redes btn btn-social mx-3" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="redes btn btn-social mx-3" href="#!"><i class="fab fa-instagram"></i></a>
                </div>
                <div class="col-lg-3 text-lg-left text-center copy">
                    <div class="copy__img">
                        <h5>Apoyado por:</h5>
                        <img src="../../../img/logo-tecno.png" alt="">
                    </div>
                    <div class="copy__texto">
                        ©Eco Car Wash
                        <?php echo date('Y'); ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="js/validacion.js"></script>
</body>

</html>