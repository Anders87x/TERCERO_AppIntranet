
var tabla;

function init(){
   
}

$(document).on("click","#btncambiar", function(){
    var pass1 = $('#txtpass1').val();
    var pass2 = $('#txtpass2').val();

    if (pass1.length == 0 || pass2.length == 0 ){
        swal({
			title: 'Error',
			text: 'Campos vacios, por favor verificar.',
			icon: 'error',
			buttons: {
				confirm: {
					text: 'Cerrar',
					value: true,
					visible: true,
					className: 'btn btn-danger',
					closeModal: true
				}
			}
		});
    }else{
        if (pass1 == pass2){
            var clave = $('#txtpass1').val();
            var correo = $('#usercorreox').val();
            console.log(clave);
            console.log(correo);
            $.post("../../controller/servicio.php?op=ctl_apr_web_usuario_actualizar_clave",{correo : correo,clave : clave}, function(data, status){
                console.log(data);
                $('#txtpass1').val('');
                $('#txtpass2').val('');
                swal({
                    title: 'Correcto',
                    text: 'Clave actualizada correctamente.',
                    icon: 'success',
                    buttons: {
                        confirm: {
                            text: 'Aceptar',
                            value: true,
                            visible: true,
                            className: 'btn btn-success',
                            closeModal: true
                        }
                    }
                }).then(results => {
                    $(location).attr('href','../home/');   
                });
            });
        }else{
            swal({
                title: 'Error',
                text: 'Las claves no son iguales',
                icon: 'error',
                buttons: {
                    confirm: {
                        text: 'Cerrar',
                        value: true,
                        visible: true,
                        className: 'btn btn-danger',
                        closeModal: true
                    }
                }
            });
        }
    }
});

init();