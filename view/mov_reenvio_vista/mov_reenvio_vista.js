
function init(){

}

$(document).ready(function(){
    pgdoc_cmbstipo_documento_codigo__init();

    /* reenvio_vista_01(); */
    $('#paneldatos').hide();
    $('#panelproveedor').hide();
 
    tblreenvio_vista_data = $('#grdreenvio_vista_data').dataTable({
        "searching": true,
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
        "language": { "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json" }
    });
    
    $('#grdregistro_vista_data tbody').on( 'click', 'tr', function () {

        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            tblreenvio_vista_data.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );


});

/*  OBJETO: pgdoc_cmbstipo_documento_codigo --------- METODO: INIT */
function pgdoc_cmbstipo_documento_codigo__init(){
    $("#pgdoc_cmbstipo_documento_codigo").html('');
    
    $.post("../../controller/servicio.php?op=ctrl_apr_web_tipo_documento_select", function(data, status){
        $("#pgdoc_cmbstipo_documento_codigo").html(data);
        $("#pgdoc_cmbstipo_documento_codigo").selectpicker('refresh');
    });
}

/*  OBJETO: pgdoc_cmbstipo_documento_codigo ---------- METODO: CHANGE */
$("#pgdoc_cmbstipo_documento_codigo").change(function(){
    $("#pgdoc_txtsguia_serie").val("");
    $("#pgdoc_txtsguia_serie").focus();
});

/*  OBJETO: pgreg_btnnuevo ----------- METODO: CLICK */
$(document).on("click","#pgreg_btnnuevo", function(){
    location.href = "../../view/mov_reenvio_mnto/";
});

/*  OBJETO: pgdoc_btnlimpiar ---------- METODO: CLICK */
$(document).on("click","#pgdoc_btnlimpiar", function(){
    pgdoc_cmbstipo_documento_codigo__init();
    $('#pgdoc_txtsguia_serie').val("");
    $('#pgdoc_txtsguia_correlativo').val("");
    $('#pgdoc_cmbstipo_documento_codigo').focus();
});

/*  OBJETO: pgdoc_txtsguia_serie --------- METODO: onblur*/
function pgdoc_txtsguia_serie__onblur(pobjeto){
    while (pobjeto.value.length<3) 
        pobjeto.value = '0'+pobjeto.value;
}  
/* OBJETO: pgdoc_txtscorrelativo_serie ---------- METODO: onblur  */
function pgdoc_txtsguia_correlativo__onblur(pobjeto){
    while (pobjeto.value.length<6) 
        pobjeto.value = '0'+pobjeto.value;
}

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

function reenvio_vista_01(){
    tabla_registro_vista=$('#grdreenvio_vista_data').dataTable({
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
            url: '../../controller/servicio.php?op=reenvio_vista',
            type : "post",
            dataType : "json",						
            error: function(e){
                console.log(e.responseText);	
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10,
        "language": { "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json" }
    }).DataTable(); 
}

$(document).on("click","#pgdoc_btnbuscar", function(){
    var pstipo_documento_codigo = $('#pgdoc_cmbstipo_documento_codigo').val();
    var psguia_serie = $('#pgdoc_txtsguia_serie').val();
    var psguia_correlativo = $('#pgdoc_txtsguia_correlativo').val();
    
    console.log("pstipo_documento_codigo: " + pstipo_documento_codigo);
    console.log("psguia_serie: " + psguia_serie);
    console.log("psguia_correlativo: " + psguia_correlativo);

    tabla_reenvio_vista=$('#grdreenvio_vista_data').dataTable({
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
            url: '../../controller/log_guia_reenvio.php?op=ctrl_reenvio_vista_01',
            type : "post",
            dataType : "json",
            data:{  pstipo_documento_codigo:pstipo_documento_codigo,
                    psguia_serie:psguia_serie,
                    psguia_correlativo:psguia_correlativo},
            error: function(e){
                console.log(e.responseText);	
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10,
        "language": { "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json" }     
    }).DataTable(); 
});

function ver(pscodigo_aleatorio){

    var pscodigo_aleatorio = pscodigo_aleatorio.toString().replace('/','').slice(0, -1);

    console.log("pscodigo_aleatorio: " + pscodigo_aleatorio) ;

    llenarpaneles(pscodigo_aleatorio);
    
    $('#paneldatos').show();
    $('#panelproveedor').show();
}

function llenarpaneles(pscodigo_aleatorio){
    
    $.post("../../controller/log_guia_reenvio.php?op=ctrl_obtener_datos_xml",
        {pscodigo_aleatorio:pscodigo_aleatorio},
        function(data, status){
            data = JSON.parse(data);
            $('#sremite_cliente_razon_social').html(data.sremite_cliente_razon_social);
            $('#sremite_cliente_direccion').html(data.sremite_cliente_direccion);
            $('#sremite_departamento_descripcion').html(data.sremite_departamento_descripcion);
            $('#sremite_cliente_codigo').html(data.sremite_cliente_codigo);

            $('#sconsigna_empresa_descripcion').html(data.sconsigna_empresa_descripcion);
            $('#sdestino_empresa_direccion').html(data.sdestino_empresa_direccion);
            $('#sdestino_departamento_descripcion').html(data.sdestino_departamento_descripcion);

            $('#sdestino_empresa_razon_social_nuevo').html(data.sdestino_empresa_razon_social_nuevo);
            $('#sdestino_empresa_direccion_nuevo').html(data.sdestino_empresa_direccion_nuevo);
            $('#sdestino_departamento_descripcion_nuevo').html(data.sdestino_departamento_descripcion_nuevo);

            $('#sruta_servicio_descripcion').html(data.sruta_servicio_descripcion);
            $('#sguia_fecha_emision_texto').html(data.sguia_fecha_emision_texto);

            $('#sruta_servicio_descripcion_nuevo').html(data.sruta_servicio_descripcion_nuevo);
            $('#sguia_fecha_reenvio_texto_nuevo').html(data.sguia_fecha_reenvio_texto_nuevo);

            $('#sagente_nombre').html(data.sagente_nombre);
            $('#sproveedor_razon_social').html(data.sproveedor_razon_social);
            $('#stipo_transporte_descripcion').html(data.stipo_transporte_descripcion);
            $('#smanifiesto_fecha_salida_texto').html(data.smanifiesto_fecha_salida_texto);

            $('#sagente_nombre_nuevo').html(data.sagente_nombre_nuevo);
            $('#sproveedor_razon_social_nuevo').html(data.sproveedor_razon_social_nuevo);
            $('#stipo_transporte_descripcion_nuevo').html(data.stipo_transporte_descripcion_nuevo);
            $('#smanifiesto_fecha_salida_texto_nuevo').html(data.smanifiesto_fecha_salida_texto_nuevo);

        }
    );

}

function eliminar(scodigo_aleatorio, ssuperior_aleatorio){
    var pscodigo_aleatorio = scodigo_aleatorio.toString().replace('/','').slice(0, -1);
    var pssuperior_aleatorio = ssuperior_aleatorio.toString().replace('/','').slice(0, -1);

    var psauditoria_usuario =  $('#usercontactocodigox').val();
    console.log("pscodigo_aleatorio : " + pscodigo_aleatorio);
    console.log("pssuperior_aleatorio : " + pssuperior_aleatorio);
    console.log("psauditoria_usuario : " + psauditoria_usuario);

    swal({
        title: 'Eliminar?',
        text: "Esta seguro de eliminar el reenvío realizado",
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

            /** SI ES CONFIRMADO, RETORNADO, CON PRECIO O FINALIZADO ENTONCES NO DEBE ELIMINARSE */
            $.post("../../controller/log_guia.php?op=ctrl_obtener_registro",{pscodigo_aleatorio:pssuperior_aleatorio},function(data, status){
                data = JSON.parse(data);
                var lsguia_estado = data.sguia_estado;
                console.log("lsguia_estado: " + lsguia_estado);
                if (lsguia_estado == '01') {
                    console.log("pscodigo_aleatorio: " + pscodigo_aleatorio);
                    $.post("../../controller/log_guia_reenvio.php?op=ctrl_registro_delete",{
                            pscodigo_aleatorio:pscodigo_aleatorio, 
                            psauditoria_usuario:psauditoria_usuario
                        },function(data, status){
                        
                        $('#grdreenvio_vista_data').DataTable().ajax.reload();

                        swal(
                            'Eliminar!',
                            'El registro se eliminó correctamente.',
                            'success'
                        );
            
                        $('#paneldatos').hide();
                        $('#panelproveedor').hide();
    
                    });
                }
                else
                {
                    swal(
                        'Aviso!',
                        'No puede eliminar el reenvio del documento porque encuentra confirmado.',
                        'success'
                    );
                };
            });
        }
    });
}



init();