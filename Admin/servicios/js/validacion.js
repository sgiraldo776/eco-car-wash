$(function(){
    $(".btn-color").on('click', function(){
        var formulario=document.add_form;

        if($('#Tipo_Servicio').val() != ""){
            if($('#Descripcion').val() != ""){
                if($('#Valor').val() != ""){
                    formulario.submit();
                }else{
                Swal.fire({
                icon: 'warning',
                title: 'Error',
                text: 'No ha ingresado el valor del servicio',
                });
                $('#Valor').focus().addClass("is-invalid");
            }

            }else{
                Swal.fire({
                icon: 'warning',
                title: 'Error',
                text: 'No ha ingresado la descripción del servicio',
                });
                $('#Descripcion').focus().addClass("is-invalid");
            }

        }else {
            Swal.fire({
            icon: 'warning',
            title: 'Error',
            text: 'No ha ingresado el tipo de servicio',
            });
            $('#Tipo_Servicio').focus().addClass("is-invalid");
        }

    });
});