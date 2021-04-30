
function init(){

}

$(document).ready(function(){
 
    registro_objetos__inicializar();
    registro_obtener_datos_01();

    mgrilla_selected_item_backcolor();

});

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};


$(document).on("click","#btnregistro_nuevo", function(){
    
    registro_objetos__inicializar();
    $("#modal_registro").modal("show");
});

$(document).on("click","#btnregistro_guardar", function(){
    
    var lsdestinatario_razon_social = $('#txtsdestinatario_razon_social').val();
    var lsdestinatario_direccion = $('#txtsdestinatario_direccion').val();
    var lsdepartamento_codigo = $('#cmbsdepartamento_codigo').val();
    var lsprovincia_codigo = $('#cmbsprovincia_codigo').val();
    var lsdistrito_codigo = $('#cmbsdistrito_codigo').val();

    var lsauditoria_usuario =  $('#usercontactocodigox').val();

    lsdestinatario_razon_social = lsdestinatario_razon_social.toUpperCase();
    lsdestinatario_direccion    = lsdestinatario_direccion.toUpperCase();

    console.log("lsdestinatario_razon_social: " + lsdestinatario_razon_social);
    console.log("lsdestinatario_direccion: " + lsdestinatario_direccion);
    console.log("lsdepartamento_codigo: " + lsdepartamento_codigo);
    console.log("lsprovincia_codigo: " + lsprovincia_codigo);
    console.log("lsdistrito_codigo: " + lsdistrito_codigo);
    console.log("lsauditoria_usuario: " + lsauditoria_usuario);

    $.post("../../controller/arc_destinatario.php?op=ctrl_registro_nuevo",{
        psdestinatario_razon_social : lsdestinatario_razon_social,
        psdestinatario_direccion : lsdestinatario_direccion,
        psdepartamento_codigo : lsdepartamento_codigo,
        psprovincia_codigo : lsprovincia_codigo,
        psdistrito_codigo : lsdistrito_codigo,
        psauditoria_usuario : lsauditoria_usuario,
    },function(data, status)
    {
        $('#grdregistro_vista_data').DataTable().ajax.reload();	
        $('#modal_registro').modal('hide');
    
        swal(
            'Confirmación!',
            'El registro se grabó correctamente.',
            'success'
        );
    
    });

    
});


function registro_obtener_datos_01(){
    tblregistro_vista_data = $('#grdregistro_vista_data').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [		          
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                download: 'open',
                pageSize: 'A4',
                text: 'PDF'
            },
            'colvis'
        ],
        "ajax":{
            url: '../../controller/arc_destinatario.php?op=ctrl_registro_obtener_datos_01',
            type : "post",
            dataType : "json",						
            error: function(e){
                console.log(e.responseText);	
            }
        },
        "bDestroy": true,
        "responsive": false,
        "bInfo":true,
        "iDisplayLength": 10,
        "language": { "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json" }
    }).DataTable(); 
}

function registro_eliminar(scodigo_aleatorio){
    var pscodigo_aleatorio = scodigo_aleatorio.toString().replace('/','').slice(0, -1);

    var psauditoria_usuario =  $('#usercontactocodigox').val();

    console.log("pscodigo_aleatorio : " + pscodigo_aleatorio);
    console.log("psauditoria_usuario : " + psauditoria_usuario);

    swal({
        title: 'Eliminar?',
        text: "Esta seguro de eliminar el registro seleccionado",
        icon: 'warning',
        buttons: {
            cancel: {
                text: 'Cancelar',
                value: null,
                visible: true,
                className: 'btn btn-default',
                closeModal: true,
            },
            confirm: {
                text: 'Eliminar',
                value: true,
                visible: true,
                className: 'btn btn-warning',
                closeModal: true
            }
        }
    }).then((result) => {
        if (result==true) {

            /** BUSCAR SI OTRAS TABLAS DEPENDEN DE ESTE REGISTRO */
            $.post("../../controller/arc_destinatario.php?op=ctrl_registro_buscar_dependencia",{
                    pscodigo_aleatorio:pscodigo_aleatorio},
            function(data, status){
                data = JSON.parse(data);
                console.log(data);
                var lnnumero_registros = data.nnumero_registros;
                console.log("lnnumero_registros: " + lnnumero_registros);
                if (lnnumero_registros == "0") {
                    
                    $.post("../../controller/arc_destinatario.php?op=ctrl_registro_eliminar",{
                            pscodigo_aleatorio:pscodigo_aleatorio,
                            psauditoria_usuario:psauditoria_usuario,
                        },function(data, status){
                        
                        $('#grdregistro_vista_data').DataTable().ajax.reload();

                        swal(
                            'Eliminar!',
                            'El registro se eliminó correctamente.',
                            'success'
                        );
            
                    });
                }
                else
                {
                    swal(
                        'Aviso!',
                        'No puede eliminar este registro porque está asociado con otra información.',
                        'success'
                    );
                };
            });
        }
    });
}

function mgrilla_selected_item_backcolor(){
    $('#grdregistro_vista_data tbody').on( 'click', 'tr', function () {

        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            tblregistro_vista_data.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
}

function registro_objetos__inicializar(){
    $("#txtsdestinatario_razon_social").val("");
    $("#txtsdestinatario_direccion").val("");
    cmbsdepartamento_codigo__inicializar();
    cmbsprovincia_codigo__inicializar();
    cmbsdistrito_codigo__inicializar();

    $("#txtsdestinatario_razon_social").focus();
    
}

/*  OBJETO: cmbsdepartamento_codigo ------------ METODO: INIT */
function cmbsdepartamento_codigo__inicializar(){
    $("#cmbsdepartamento_codigo").html("");
    
    console.log("1");
    $.post("../../controller/sun_departamento.php?caso=ctrl_registro_obtener_datos_select", {}, 
        function(data, status){
            console.log(data);
            $("#cmbsdepartamento_codigo").html(data);
            $("#cmbsdepartamento_codigo").selectpicker("refresh");
            console.log("2");
    });
}

/*  OBJETO: cmbsprovincia_codigo ----------- METODO: INIT */
function cmbsprovincia_codigo__inicializar(){
    $("#cmbsprovincia_codigo").html("");
    $("#cmbsprovincia_codigo").selectpicker("refresh");
}

/*  OBJETO: cmbsdistrito_codigo ------------ METODO: INIT */
function cmbsdistrito_codigo__inicializar(){
    $("#cmbsdistrito_codigo").html("");
    $("#cmbsdistrito_codigo").selectpicker("refresh");
}

/*  OBJETO: cmbsdepartamento_codigo ----------- METODO: CHANGE */
$("#cmbsdepartamento_codigo").change(function(){
    cmbsprovincia_codigo__inicializar();

    $("#cmbsdepartamento_codigo option:selected").each(function () {
        var lsdepartamento_codigo = $("#cmbsdepartamento_codigo option:selected").val();
        
        $.post("../../controller/sun_provincia.php?caso=ctrl_registro_obtener_datos_select", {
            psdepartamento_codigo : lsdepartamento_codigo}, 
            function(data, status){
                console.log(data);
                $("#cmbsprovincia_codigo").html(data);
                $("#cmbsprovincia_codigo").selectpicker("refresh");
         });
    });
});

/*  OBJETO: cmbsprovincia_codigo ----------- METODO: CHANGE */
$("#cmbsprovincia_codigo").change(function(){
    cmbsdistrito_codigo__inicializar();

    $("#cmbsprovincia_codigo option:selected").each(function () {
        var lsprovincia_codigo = $("#cmbsprovincia_codigo option:selected").val();
        console.log("lsprovincia_codigo : " + lsprovincia_codigo);
        $.post("../../controller/sun_distrito.php?caso=ctrl_registro_obtener_datos_select", {
            psprovincia_codigo : lsprovincia_codigo}, 
            function(data, status){
                $("#cmbsdistrito_codigo").html(data);
                $("#cmbsdistrito_codigo").selectpicker("refresh");
         });
    });
});


init();