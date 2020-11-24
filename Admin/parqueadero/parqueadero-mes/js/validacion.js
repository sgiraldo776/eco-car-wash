$(function(){
    $(".btn-color").on('click', function(){
        var formulario=document.add_form;

        if($('#cliente').val() != ""){
            if($('#tipo').val() != 0){
                if($('#correo').val() != ""){
                    if($('#celular').val() != ""){
                        if($('#placa').val() != ""){
                            if($('#hora').val() != ""){
                                formulario.submit();
                            }else{
                            Swal.fire({
                            icon: 'warning',
                            title: 'Error',
                            text: 'No ha ingresado la fecha',
                            });
                            $('#hora').focus().addClass("is-invalid");
                        }

                        }else{
                            Swal.fire({
                            icon: 'warning',
                            title: 'Error',
                            text: 'No ha ingresado la placa del vehículo',
                            });
                            $('#placa').focus().addClass("is-invalid");
                        }

                    }else{
                        Swal.fire({
                        icon: 'warning',
                        title: 'Error',
                        text: 'No ha ingresado el celular',
                        });
                        $('#celular').focus().addClass("is-invalid");
                    }
                    
                }else{
                Swal.fire({
                icon: 'warning',
                title: 'Error',
                text: 'No ha ingresado el correo',
                });
                $('#correo').focus().addClass("is-invalid");
            }

            }else{
                Swal.fire({
                icon: 'warning',
                title: 'Error',
                text: 'No ha ingresado el tipo de vehículo',
                });
                $('#tipo').focus().addClass("is-invalid");
            }

        }else {
            Swal.fire({
            icon: 'warning',
            title: 'Error',
            text: 'No ha ingresado el nombre del cliente',
            });
            $('#cliente').focus().addClass("is-invalid");
        }

    });
});
