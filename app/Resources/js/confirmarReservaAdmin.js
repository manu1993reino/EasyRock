$(document).ready(function () {
    $("#formularioReserva").bind("submit",function(){
        // Capturamnos el boton de envío
        var btnEnviar = $("#btnEnviarReserva");
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data:$(this).serialize(),
            beforeSend: function(){
                /*
                * Esta función se ejecuta durante el envió de la petición al
                * servidor.
                * */
                // btnEnviar.text("Enviando"); Para button 
                btnEnviar.val("Enviando"); // Para input de tipo button
                btnEnviar.attr("disabled","disabled");
            },
            complete:function(data){
                /*
                * Se ejecuta al termino de la petición
                * */
                btnEnviar.val("Enviar formulario");
                btnEnviar.removeAttr("disabled");
                //window.location.replace("../Views/app_reserva.php");
            },
            success: function(data){
                /*
                * Se ejecuta cuando termina la petición y esta ha sido
                * correcta
                * */
                $(".respuesta").html("Reserva realizada correctamente, revisa tu email");
                $(".respuesta2").html("<META HTTP-EQUIV='REFRESH' CONTENT='3;URL=../Views/app_reserva_admin.php'>");
                //window.location.replace("../Views/app_reserva.php");
                //document.location.href='../Views/app_reserva.php';
            },
            error: function(data2){
                /*
                * Se ejecuta si la peticón ha sido erronea
                * */
                alert("Problemas al tratar de enviar el formulario");
            }
        });
        // Nos permite cancelar el envio del formulario
        return false;
    });
});