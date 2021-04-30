
function init(){

}

$(document).ready(function(){
    pgdoc_cmbstipo_documento_codigo__init();
    pgvar_cmbstipo_servicio_codigo__init();
    pgvar_cmbsruta_servicio_destino_codigo__init();
    pgvar_cmbsgrupo_cliente_codigo__init();
    pgvar_dtpdfecha_inicial__init();
    pgvar_dtpdfecha_final__init();
    pgvar_cmbsguia_estado__init();
    pgcli_cmbstipo_documento_codigo__init();

    pgdetalle_cbosproducto_codigo_edit__init();

    dashboard_resumen__init();
    grdretorno_resumen_05__init();

    retorno_vista();
    panel_modal__hide();
    
    tblretorno_vista_data = $('#grdretorno_vista_data').dataTable();
    $('#grdretorno_vista_data tbody').on( 'click', 'tr', function () {

        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            tblretorno_vista_data.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );

    pgdetalle_cbosproducto_codigo__init();
    pgdocumento_txtstipo_documento_codigo__init();
    fxpgmanifiesto_cmbsagente_codigo__init();
    fxpgmanifiesto_cmbstipo_servicio_codigo__init();
    fxpgmanifiesto_cmbsruta_servicio_codigo__init();
    fxpgmanifiesto_cmbsproveedor_codigo__init();
    fxpgmanifiesto_cmbstipo_transporte_codigo__init();

});

/*  OBJETO: pgdoc_cmbstipo_documento_codigo
    METODO: INIT
*/
function pgdoc_cmbstipo_documento_codigo__init(){
    $("#pgdoc_cmbstipo_documento_codigo").html('');
    
    $.post("../../controller/servicio.php?op=ctrl_apr_web_tipo_documento_select", function(data, status){
        $("#pgdoc_cmbstipo_documento_codigo").html(data);
        $("#pgdoc_cmbstipo_documento_codigo").selectpicker('refresh');
    });
}
 
/*  OBJETO: pgvar_cmbstipo_servicio_codigo
    METODO: INIT
*/
function pgvar_cmbstipo_servicio_codigo__init(){
    $("#pgvar_cmbstipo_servicio_codigo").html('');
    
    $.post("../../controller/servicio.php?op=ctrl_apr_web_tipo_servicio_select", function(data, status){
        $("#pgvar_cmbstipo_servicio_codigo").html(data);
        $("#pgvar_cmbstipo_servicio_codigo").selectpicker('refresh');
    });
}

/*  OBJETO: pgvar_cmbsguia_estado
    METODO: INIT
*/
function pgvar_cmbsguia_estado__init(){
    $("#pgvar_cmbsguia_estado").html('');
    $("#pgvar_cmbsguia_estado").append('<option value="15">CONFIRMADOS</option>');
    $("#pgvar_cmbsguia_estado").append('<option value="20">RETORNOS</option>');
    $("#pgvar_cmbsguia_estado").append('<option value="99">TODOS</option>');
    $("#pgvar_cmbsguia_estado").val('99');
    $("#pgvar_cmbsguia_estado").selectpicker('refresh');
}


/*  OBJETO: pgvar_cmbsgrupo_cliente_codigo
    METODO: INIT */
function pgvar_cmbsgrupo_cliente_codigo__init(){
    $("#pgvar_cmbsgrupo_cliente_codigo").html('');
    
    $.post("../../controller/servicio.php?op=ctrl_apr_web_grupo_cliente_select", function(data, status){
        $("#pgvar_cmbsgrupo_cliente_codigo").html(data);
        $("#pgvar_cmbsgrupo_cliente_codigo").selectpicker('refresh');
    });
}

function pgdetalle_cbosproducto_codigo_edit__init(){
    $("#pgdetalle_cbosproducto_codigo_edit").html("");

    $.post("../../controller/servicio.php?op=ctrl_apr_web_producto_select", function(data, status){
        $("#pgdetalle_cbosproducto_codigo_edit").html(data);
        $("#pgdetalle_cbosproducto_codigo_edit").selectpicker("refresh");
    });
}

/*  OBJETO: pgcli_cmbstipo_documento_codigo
    METODO: INIT
*/
function pgcli_cmbstipo_documento_codigo__init(){
    $("#pgcli_cmbstipo_documento_codigo").html('');
    
    $.post("../../controller/servicio.php?op=ctrl_apr_web_tipo_documento_select", function(data, status){
        $("#pgcli_cmbstipo_documento_codigo").html(data);
        $("#pgcli_cmbstipo_documento_codigo").selectpicker('refresh');
    });
}

/*  OBJETO: pgcli_cmbstipo_documento_codigo
     METODO: CHANGE */    
$("#pgcli_cmbstipo_documento_codigo").change(function(){
    $("#pgcli_txtsdocumento_numero").focus();
});

    
/*  OBJETO: pgreg_btnreporte_diario
|   METODO: CLICK */
$(document).on("click","#pgreg_btnreporte_diario", function(){
    location.href = "../../view/reporte_diario/";
});

/*  OBJETO: pgreg_btnreporte_confirmacion
|   METODO: CLICK */
$(document).on("click","#pgreg_btnreporte_confirmacion", function(){
    location.href = "../../view/reporte_confirmacion/";
});

/*  OBJETO: pgreg_btnreporte_retorno
|   METODO: CLICK */
$(document).on("click","#pgreg_btnreporte_retorno", function(){
    location.href = "../../view/reporte_retorno/";
});

/*  OBJETO: pgdoc_btnlimpiar
|   METODO: CLICK */
$(document).on("click","#pgdoc_btnlimpiar", function(){
    pgdoc_cmbstipo_documento_codigo__init();
    $('#pgdoc_txtsguia_serie').val("");
    $('#pgdoc_txtsguia_correlativo').val("");
    $('#pgdoc_cmbstipo_documento_codigo').focus();
});

/*  OBJETO: pgvar_btnlimpiar
|   METODO: CLICK */
$(document).on("click","#pgvar_btnlimpiar", function(){
    pgvar_cmbstipo_servicio_codigo__init();
    pgvar_cmbsruta_servicio_destino_codigo__init();
    pgvar_cmbsgrupo_cliente_codigo__init();
    pgvar_dtpdfecha_inicial__init();
    pgvar_dtpdfecha_final__init();
    $('#pgvar_txtsguia_hoja_ruta').val("");
    $('#pgvar_cmbstipo_servicio_codigo').focus();
});

/*  OBJETO: pgcli_btnlimpiar
|   METODO: CLICK */
$(document).on("click","#pgcli_btnlimpiar", function(){
    pgcli_cmbstipo_documento_codigo__init();
    $('#pgcli_txtsdocumento_numero').val("");
    $('#pgdoc_cmbstipo_documento_codigo').focus();
});


/*  OBJETO: pgdoc_txtsguia_serie
    METODO: onblur*/
function pgdoc_txtsguia_serie__onblur(pobjeto){
    while (pobjeto.value.length<3) 
        pobjeto.value = '0'+pobjeto.value;
}  
/* OBJETO: pgdoc_txtscorrelativo_serie
    METODO: onblur  */
function pgdoc_txtsguia_correlativo__onblur(pobjeto){
    while (pobjeto.value.length<6) 
        pobjeto.value = '0'+pobjeto.value;
}

/*  OBJETO: cmbstipo_servicio_codigo
     METODO: CHANGE */    
$("#pgvar_cmbstipo_servicio_codigo").change(function(){
    pgvar_cmbsruta_servicio_destino_codigo__init();

    $("#pgvar_cmbstipo_servicio_codigo option:selected").each(function(){
        $.post("../../controller/sun_departamento.php?caso=ctrl_select", 
            {}, 
            function(data, status){
                $("#pgvar_cmbsruta_servicio_destino_codigo").html(data);
                $('#pgvar_cmbsruta_servicio_destino_codigo').selectpicker('refresh');
        });
    });
});

/*  OBJETO: pgvar_cmbsruta_servicio_destino_codigo
    METODO: INIT */
function pgvar_cmbsruta_servicio_destino_codigo__init(){
    $("#pgvar_cmbsruta_servicio_destino_codigo").html('');
    $("#pgvar_cmbsruta_servicio_destino_codigo").selectpicker('refresh');
}  

/*  OBJETO: pgvar_dtpdfecha_inicial
    METODO: INIT */
function pgvar_dtpdfecha_inicial__init(){
    $('#pgvar_dtpdfecha_inicial').datepicker({
        language: "es",
        todayBtn: "linked",
        format: "dd/mm/yyyy",
        multidate: false,
        todayHighlight: true,
        autoclose: true,

    }).datepicker("setDate", new Date());
}

/*  OBJETO: pgvar_dtpdfecha_final
    METODO: INIT */
function pgvar_dtpdfecha_final__init(){
    $('#pgvar_dtpdfecha_final').datepicker({
        language: "es",
        todayBtn: "linked",
        format: "dd/mm/yyyy",
        multidate: false,
        todayHighlight: true,
        autoclose: true,

    }).datepicker("setDate", new Date()); 
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

function dashboard_resumen__init(){
    $.post("../../controller/servicio.php?op=ctrl_apr_web_mov_retorno_resumen",function(data, status){
        
        data = JSON.parse(data);
        console.log(data);
        $('#ntotal_confirmados').html(data.ntotal_confirmados);
        $('#nurgente_confirmados').html(data.nurgente_confirmados);
        $('#nlicitacion_confirmados').html(data.nlicitacion_confirmados);
        $('#ntotal_vencidos').html(data.ntotal_vencidos);
    });
}

$(document).on("click","#btnntotal_confirmados", function(){
    tblretorno_vista_data = $('#grdretorno_vista_data').dataTable({
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
            url: '../../controller/servicio.php?op=ctrl_apr_web_mov_retorno_resumen_01',
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
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
          }
    }).DataTable();

    panel_modal__hide();

});

$(document).on("click","#btnnurgente_confirmados", function(){
    tblretorno_vista_data = $('#grdretorno_vista_data').dataTable({
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
            url: '../../controller/servicio.php?op=ctrl_apr_web_mov_retorno_resumen_02',
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
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
          }
    }).DataTable(); 

    panel_modal__hide();

});

$(document).on("click","#btnnlicitacion_confirmados", function(){
    tblretorno_vista_data = $('#grdretorno_vista_data').dataTable({
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
            url: '../../controller/servicio.php?op=ctrl_apr_web_mov_retorno_resumen_03',
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
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
          }
    }).DataTable(); 

    panel_modal__hide();

});

$(document).on("click","#btnntotal_vencidos", function(){
    tblretorno_vista_data = $('#grdretorno_vista_data').dataTable({
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
            url: '../../controller/servicio.php?op=ctrl_apr_web_mov_retorno_resumen_04',
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
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
          }

    }).DataTable(); 

    panel_modal__hide();

});

function grdretorno_resumen_05__init(){
    tblretorno_resumen_05 = $('#grdretorno_resumen_05').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "paging": false,
        searching: false,
        lengthChange: false,
        colReorder: true,
        buttons: [],
        "ajax":{
            url: '../../controller/servicio.php?op=ctrl_apr_web_mov_retorno_resumen_05',
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
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
          }
    }).DataTable(); 

    $('#grdretorno_resumen_05 tbody').on( 'click', 'tr', function () {

        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            tblretorno_resumen_05.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
    
    panel_modal__hide();

}


function retorno_vista(){
    tblretorno_vista_data = $('#grdretorno_vista_data').dataTable({
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
            url: '../../controller/servicio.php?op=retorno_vista',
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
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
          }
    }).DataTable(); 

}

$(document).on("click","#pgdoc_btnbuscar", function(){
    var pstipo_documento_codigo = $('#pgdoc_cmbstipo_documento_codigo').val();
    var psguia_serie = $('#pgdoc_txtsguia_serie').val();
    var psguia_correlativo = $('#pgdoc_txtsguia_correlativo').val();
    
    tblretorno_vista_data = $('#grdretorno_vista_data').dataTable({
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
            url: '../../controller/servicio.php?op=retorno_vista_01',
            type : "post",
            dataType : "json",
            data:{pstipo_documento_codigo:pstipo_documento_codigo,psguia_serie:psguia_serie,psguia_correlativo:psguia_correlativo},
            error: function(e){
                console.log(e.responseText);	
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        }

    }).DataTable(); 

    panel_modal__hide();

});

$(document).on("click","#pgvar_btnbuscar", function(){

    var pstipo_servicio_codigo = $('#pgvar_cmbstipo_servicio_codigo').val();
    var psruta_servicio_destino_codigo = $('#pgvar_cmbsruta_servicio_destino_codigo').val();
    var psgrupo_cliente_codigo = $('#pgvar_cmbsgrupo_cliente_codigo').val();
    var pdfecha_recepcion_inicial = $('#pgvar_dtpdfecha_inicial').val();
    var pdfecha_recepcion_final = $('#pgvar_dtpdfecha_final').val();
    var psguia_estado = $('#pgvar_cmbsguia_estado').val();
    
    var psfecha_recepcion_inicial = '';
    var psfecha_recepcion_final = '';

    psfecha_recepcion_inicial   = psfecha_recepcion_inicial.concat(pdfecha_recepcion_inicial.substr(6,4), pdfecha_recepcion_inicial.substr(3,2), pdfecha_recepcion_inicial.substr(0,2));
    psfecha_recepcion_final     = psfecha_recepcion_final.concat(pdfecha_recepcion_final.substr(6,4), pdfecha_recepcion_final.substr(3,2), pdfecha_recepcion_final.substr(0,2));

    //VALIDAR RANGO DE FECHAS
            
    tblretorno_vista_data = $('#grdretorno_vista_data').dataTable({
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
            url: '../../controller/servicio.php?op=retorno_vista_02',
            type : "post",
            dataType : "json",
            data:{
                    pstipo_servicio_codigo:pstipo_servicio_codigo,
                    psruta_servicio_destino_codigo:psruta_servicio_destino_codigo,
                    psgrupo_cliente_codigo:psgrupo_cliente_codigo,
                    psfecha_recepcion_inicial:psfecha_recepcion_inicial,
                    psfecha_recepcion_final:psfecha_recepcion_final,
                    psguia_estado:psguia_estado
                },					
            error: function(e){
                console.log(e.responseText);	
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        }

    }).DataTable(); 

    panel_modal__hide();

});

$(document).on("click","#pgcli_btnbuscar", function(){
    var pstipo_documento_codigo = $('#pgcli_cmbstipo_documento_codigo').val();
    var psdocumento_numero = $('#pgcli_txtsdocumento_numero').val();
    
    tblretorno_vista_data = $('#grdretorno_vista_data').dataTable({
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
            url: '../../controller/servicio.php?op=retorno_vista_03',
            type : "post",
            dataType : "json",
            data:{  pstipo_documento_codigo:pstipo_documento_codigo,
                    psdocumento_numero:psdocumento_numero,
                },
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

    panel_modal__hide();

});


function lstretorno_resumen_05_vista(pstipo_servicio_codigo, psruta_origen_codigo, psruta_destino_codigo){

    pstipo_servicio_codigo = pstipo_servicio_codigo.toString().replace('/','').slice(0, -1);
    psruta_origen_codigo = psruta_origen_codigo.toString().replace('/','').slice(0, -1);
    psruta_destino_codigo = psruta_destino_codigo.toString().replace('/','').slice(0, -1);

    console.log("pstipo_servicio_codigo: " + pstipo_servicio_codigo);
    console.log("psruta_origen_codigo: " + psruta_origen_codigo);
    console.log("psruta_destino_codigo: " + psruta_destino_codigo);

    tblretorno_vista_data = $('#grdretorno_vista_data').dataTable({
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
            url: '../../controller/servicio.php?op=ctrl_apr_web_mov_retorno_resumen_05_vista',
            type : "post",
            dataType : "json",
            data:{  pstipo_servicio_codigo:pstipo_servicio_codigo,
                    psruta_origen_codigo:psruta_origen_codigo,
                    psruta_destino_codigo:psruta_destino_codigo
                },
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

    panel_modal__hide();

};


function ver(stipo_documento_codigo,sguia_serie,sguia_correlativo){

    var pstipo_documento_codigo = stipo_documento_codigo.toString().replace('/','').slice(0, -1);
    var psguia_serie = sguia_serie.toString().replace('/','').slice(0, -1);
    var psguia_correlativo = sguia_correlativo.toString().replace('/','').slice(0, -1);

    $('#pstipo_documento_codigo').val(pstipo_documento_codigo);
    $('#psguia_serie').val(psguia_serie);
    $('#psguia_correlativo').val(psguia_correlativo);

    llenarpaneles(pstipo_documento_codigo,psguia_serie,psguia_correlativo);
    
    panel_modal__show();

}

function llenarpaneles(pstipo_documento_codigo,psguia_serie,psguia_correlativo){
    $.post("../../controller/servicio.php?op=consulta_A01_guia_cabecera",{pstipo_documento_codigo:pstipo_documento_codigo,psguia_serie:psguia_serie,psguia_correlativo:psguia_correlativo},function(data, status){
        data = JSON.parse(data);
        $('#sremite_cliente_razon_social').html(data.sremite_cliente_razon_social);
        $('#sremite_cliente_codigo').html(data.sremite_cliente_codigo);
        $('#sremite_cliente_direccion').html(data.sremite_cliente_direccion);
        $('#sruta_origen_descripcion').html(data.sruta_origen_descripcion);
        $('#sconsigna_empresa_descripcion').html(data.sconsigna_empresa_descripcion);
        $('#sdestino_empresa_direccion').html(data.sdestino_empresa_direccion);
        $('#sruta_destino_descripcion').html(data.sruta_destino_descripcion);
        $('#sguia_numero_completo').html(data.sguia_numero_completo);

        $('#stipo_documento_descripcion').html(data.stipo_documento_descripcion);

        $('#scodigo_aleatorio').html(data.scodigo_aleatorio);
        $('#hdd_pgdetalle_scodigo_aleatorio').html(data.scodigo_aleatorio);

        $('#pssuperior_aleatorio').val(data.scodigo_aleatorio);
        $('#pscliente_codigo').val(data.sremite_cliente_codigo);

        $('#sruta_servicio_descripcion').html(data.sruta_servicio_descripcion);
        $('#sguia_fecha_emision_texto').html(data.sguia_fecha_emision_texto);
        $('#sguia_fecha_vencimiento_texto').html(data.sguia_fecha_vencimiento_texto);
        $('#sguia_fecha_retorno_texto').html(data.sguia_fecha_retorno_limite_texto);
        $('#sprioridad_descripcion').html(data.sprioridad_descripcion);

        $('#sguia_licitacion').html(data.sguia_licitacion);
        $('#sguia_exclusivo').html(data.sguia_exclusivo);
        $('#sguia_numero_reporte').html(data.sguia_numero_reporte);
        $('#sguia_estado_descripcion').html(data.sguia_estado_descripcion);

    });

    console.log("pstipo_documento_codigo: " + pstipo_documento_codigo) ;
    console.log("psguia_serie: " + psguia_serie) ;
    console.log("psguia_correlativo: " + psguia_correlativo) ;

    $.post("../../controller/servicio.php?op=consulta_A01_guia_retorno",{pstipo_documento_codigo:pstipo_documento_codigo,psguia_serie:psguia_serie,psguia_correlativo:psguia_correlativo},function(data, status){
        $("#grdretorno_data").html(data);
    });

    $.post("../../controller/servicio.php?op=consulta_A01_guia_confirmacion",{pstipo_documento_codigo:pstipo_documento_codigo,psguia_serie:psguia_serie,psguia_correlativo:psguia_correlativo},function(data, status){
        $("#grdconfirmacion_data").html(data);
    });

    $.post("../../controller/servicio.php?op=consulta_A01_guia_detalle",{pstipo_documento_codigo:pstipo_documento_codigo,psguia_serie:psguia_serie,psguia_correlativo:psguia_correlativo},function(data, status){
        $("#grdproducto_detalle_data").html(data);
    });

    $.post("../../controller/servicio.php?op=consulta_A01_guia_documento",{pstipo_documento_codigo:pstipo_documento_codigo,psguia_serie:psguia_serie,psguia_correlativo:psguia_correlativo},function(data, status){
        $("#grd_documentos_cliente_data").html(data);
    });

    $.post("../../controller/servicio.php?op=consulta_A01_guia_incidencia",{pstipo_documento_codigo:pstipo_documento_codigo,psguia_serie:psguia_serie,psguia_correlativo:psguia_correlativo},function(data, status){
        $("#grdincidencia_data").html(data);
    });

    $.post("../../controller/servicio.php?op=consulta_A01_guia_manifiesto",{pstipo_documento_codigo:pstipo_documento_codigo,psguia_serie:psguia_serie,psguia_correlativo:psguia_correlativo},function(data, status){
        data = JSON.parse(data);
        $('#sagente_nombre').html(data.sagente_nombre);
        $('#stipo_servicio_descripcion').html(data.stipo_servicio_descripcion);
        $('#sruta_servicio_descripcionx').html(data.sruta_servicio_descripcion);
        $('#smanifiesto_observacion').html(data.smanifiesto_observacion);

        //Representante
        $('#pgmanifiesto_cmbsagente_codigo2').val(data.sagente_codigo).change();
        $('#pgmanifiesto_cmbstipo_servicio_codigo2').val(data.stipo_servicio_codigo).change();
        
        $("#pgmanifiesto_cmbsruta_servicio_codigo2").html('');
        $.post("../../controller/servicio.php?op=ctrl_apr_web_ruta_servicio_select_2",{pstipo_servicio_codigo:data.stipo_servicio_codigo,sruta_servicio_codigo:data.sruta_servicio_codigo},function(data, status){
            $("#pgmanifiesto_cmbsruta_servicio_codigo2").html(data);
            $('#pgmanifiesto_cmbsruta_servicio_codigo2').selectpicker('refresh');
        });

        //Proveedor
        $('#pgmanifiesto_cmbsproveedor_codigo2').val(data.sproveedor_codigo).change();
        $('#pgmanifiesto_cmbstipo_transporte_codigo2').val(data.stipo_transporte_codigo).change();
        $('#pgmanifiesto_dtpdmanifiesto_fecha_salida2').val(data.Fecha);
        $('#pgmanifiesto_spnnmanifiesto_dias_transito2').val(data.nmanifiesto_dias_transito);
        $('#pgmanifiesto_txtsmanifiesto_despachador2').val(data.smanifiesto_despachador);
        $('#pgmanifiesto_txtsmanifiesto_proveedor_documento2').val(data.smanifiesto_proveedor_documento);

        $('#sproveedor_razon_social').html(data.sproveedor_razon_social);
        $('#stipo_transporte_descripcion').html(data.stipo_transporte_descripcion);
        $('#smanifiesto_fecha_salida_texto').html(data.smanifiesto_fecha_salida_texto);
        $('#nmanifiesto_dias_transito').html(data.nmanifiesto_dias_transito);
        $('#smanifiesto_despachador').html(data.smanifiesto_despachador);
        $('#smanifiesto_proveedor_documento').html(data.smanifiesto_proveedor_documento);
    });

}

function mretorno_eliminar (scodigo_aleatorio){
    var pscodigo_aleatorio = scodigo_aleatorio.toString().replace('/','').slice(0, -1);
    var psauditoria_usuario =  $('#usercontactocodigox').val();

    swal({
        title: 'Eliminar',
        text: "¿Está seguro de eliminar el retorno del documento?",
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
                $.post("../../controller/servicio.php?op=ctrl_apr_web_log_guia_retorno_delete",{pscodigo_aleatorio:pscodigo_aleatorio,psauditoria_usuario:psauditoria_usuario},function(data, status){
                    $('#grdretorno_vista_data').DataTable().ajax.reload();	
                });

                swal(
                    'Eliminar!',
                    'El registro se elimino correctamente.',
                    'success'
                );
            }
    });
}

/*
    PANEL: PRODUCTOS
/******************************************************************************************/

$(document).on("click","#nuevodetalle", function(){
    modal_detalle_objetos__init();
    $('#modaldetalle').modal('show');
});

function modal_detalle_objetos__init(){
    pgdetalle_cbosproducto_codigo__init();

    $('#pgdetalle_txtsproducto_descripcion').val("");
    $('#pgdetalle_spnnproducto_cantidad').val(0);
    $('#pgdetalle_spnnproducto_peso').val(0);
    $('#pgdetalle_spnnproducto_costo').val(0);
    $('#pgdetalle_txtsproducto_unidad').val("");
    
}

$(document).on("click","#btnguardardetalle", function(){
    var pstipo_documento_codigo = $('#pstipo_documento_codigo').val();
    var psguia_serie = $('#psguia_serie').val();
    var psguia_correlativo = $('#psguia_correlativo').val();
    var psguia_detalle_numero_item = '';
    var psproducto_codigo = $('#pgdetalle_cbosproducto_codigo').val();
    var psproducto_descripcion =  $('#pgdetalle_txtsproducto_descripcion').val();
    var pnproducto_cantidad = $('#pgdetalle_spnnproducto_cantidad').val();
    var pnproducto_peso = $('#pgdetalle_spnnproducto_peso').val();
    var pnproducto_costo = $('#pgdetalle_spnnproducto_costo').val();
    var scodigo_aleatorio = '';
    var pssuperior_aleatorio = $('#pssuperior_aleatorio').val();
    var psauditoria_usuario =  $('#usercontactocodigox').val();

    $.post("../../controller/servicio.php?op=guia_detalle_insert",{
        pstipo_documento_codigo:pstipo_documento_codigo,
        psguia_serie:psguia_serie,
        psguia_correlativo:psguia_correlativo,
        psguia_detalle_numero_item : psguia_detalle_numero_item,
        psproducto_codigo : psproducto_codigo,
        psproducto_descripcion : psproducto_descripcion,
        pnproducto_cantidad : pnproducto_cantidad,
        pnproducto_peso : pnproducto_peso,
        pnproducto_costo : pnproducto_costo,
        scodigo_aleatorio : scodigo_aleatorio,
        pssuperior_aleatorio : pssuperior_aleatorio,
        psauditoria_usuario : psauditoria_usuario
    },function(data, status){
       
    });

    llenarpaneles(pstipo_documento_codigo,psguia_serie,psguia_correlativo);
    $('#modaldetalle').modal('hide');
    swal(
        'Producto',
        'El producto se registró correctamente.',
        'success'
    );
});


/*
    PANEL: DOCUMENTOS DEL CLIENTE
/******************************************************************************************/

$(document).on("click","#nuevodocumento", function(){
    modal_documento_cliente_objetos__init();
    $('#modaldocumento').modal('show');
});

function modal_documento_cliente_objetos__init(){
    pgdocumento_txtstipo_documento_codigo__init();
    $('#pgdocumento_txtscliente_guia_numero').val("");
}

$(document).on("click","#btnguardardocumento", function(){
    var pscliente_codigo = $('#sremite_cliente_codigo').val();
    var psguia_tipo_documento_codigo = $('#pstipo_documento_codigo').val();
    var psguia_serie = $('#psguia_serie').val();
    var psguia_correlativo = $('#psguia_correlativo').val();
    var pscliente_tipo_documento_codigo = $('#pgdocumento_txtstipo_documento_codigo').val();
    var pscliente_guia_numero = $('#pgdocumento_txtscliente_guia_numero').val();
    var psguia_documento_ruta_local = '';
    var psguia_documento_ruta_web = '';
    var pscodigo_aleatorio = '';
    var pssuperior_aleatorio = $('#pssuperior_aleatorio').val();
    var psauditoria_usuario =  $('#usercontactocodigox').val();

    $.post("../../controller/servicio.php?op=guia_documento_insert",{
        pscliente_codigo : pscliente_codigo,
        psguia_tipo_documento_codigo : psguia_tipo_documento_codigo,
        psguia_serie : psguia_serie,
        psguia_correlativo : psguia_correlativo,
        pscliente_tipo_documento_codigo : pscliente_tipo_documento_codigo,
        pscliente_guia_numero : pscliente_guia_numero,
        psguia_documento_ruta_local : psguia_documento_ruta_local,
        psguia_documento_ruta_web : psguia_documento_ruta_web,
        pscodigo_aleatorio : pscodigo_aleatorio,
        pssuperior_aleatorio : pssuperior_aleatorio,
        psauditoria_usuario : psauditoria_usuario
    },function(data, status){
       
    });

    llenarpaneles(psguia_tipo_documento_codigo,psguia_serie,psguia_correlativo);
    $('#modaldocumento').modal('hide');
    swal(
        'Documento',
        'El documento del cliente se registró correctamente.',
        'success'
    );

});

/*
    PANEL: INCIDENCIA
/******************************************************************************************/

/* ACCION: NUEVA INCIDENCIA*/
/******************************************************************************************/
$(document).on("click","#nuevaincidencia", function(){

    modal_incidencia_objetos__init();
    $('#modalincidencia').modal('show');

});

/* ACCION: GUARDAR INCIDENCIA*/
/******************************************************************************************/
$(document).on("click","#btnguardarincidencia", function(){

    var pstipo_documento_codigo = $('#pstipo_documento_codigo').val();
    var psguia_serie = $('#psguia_serie').val();
    var psguia_correlativo = $('#psguia_correlativo').val();
    
    var psguia_incidencia_tipo = $('#cmbsguia_incidencia_tipo').val();
    var pdguia_incidencia_fecha = $('#dtpdguia_incidencia_fecha').val();
    var psguia_incidencia_hora = $('#txtsguia_incidencia_hora').val();
    var psguia_incidencia_observacion = $('#txtsguia_incidencia_observacion').val();

    var pscodigo_aleatorio = "";
    var pssuperior_aleatorio = $('#pssuperior_aleatorio').val();
    var psauditoria_usuario =  $('#usercontactocodigox').val();

    pdguia_incidencia_fecha = pdguia_incidencia_fecha.split(" ")[0].split("/").reverse().join("-");
    psguia_incidencia_hora = psguia_incidencia_hora + ":00";
    var psguia_incidencia_fecha = pdguia_incidencia_fecha + " " + psguia_incidencia_hora;
    psguia_incidencia_observacion = psguia_incidencia_observacion.toUpperCase();    

    console.log("pstipo_documento_codigo: " + pstipo_documento_codigo);
    console.log("psguia_serie: " + psguia_serie);
    console.log("psguia_correlativo: " + psguia_correlativo);

    console.log("psguia_incidencia_tipo: " + psguia_incidencia_tipo);
    console.log("psguia_incidencia_fecha: " + psguia_incidencia_fecha);
    console.log("psguia_incidencia_observacion: " + psguia_incidencia_observacion);

    console.log("pssuperior_aleatorio: " + pssuperior_aleatorio);
    console.log("psauditoria_usuario: " + psauditoria_usuario);

    $.post("../../controller/servicio.php?op=ctrl_apr_web_log_guia_incidencia_insert",{
        pstipo_documento_codigo:pstipo_documento_codigo,
        psguia_serie : psguia_serie,
        psguia_correlativo : psguia_correlativo,
        psguia_incidencia_fecha : psguia_incidencia_fecha,
        psguia_incidencia_tipo : psguia_incidencia_tipo,
        psguia_incidencia_observacion : psguia_incidencia_observacion,
        pscodigo_aleatorio : pscodigo_aleatorio,
        pssuperior_aleatorio : pssuperior_aleatorio,
        psauditoria_usuario : psauditoria_usuario
    },function(data, status){
        llenarpaneles(pstipo_documento_codigo,psguia_serie,psguia_correlativo);
        $('#modalincidencia').modal('hide');
        swal(
            'Incidencia',
            'La incidencia se registró correctamente.',
            'success'
        );
        
    });
   
});

/* ACCION: BORRAR INCIDENCIA*/
/******************************************************************************************/
function mincidencia_eliminar(scodigo_aleatorio){
    var pscodigo_aleatorio = scodigo_aleatorio.toString().replace('/','').slice(0, -1);
    var psauditoria_usuario =  $('#usercontactocodigox').val();

    swal({
        title: 'Eliminar',
        text: "¿Esta seguro de eliminar la incidencia registrada?",
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
                $.post("../../controller/servicio.php?op=ctrl_apr_web_log_guia_incidencia_delete",{pscodigo_aleatorio:pscodigo_aleatorio,psauditoria_usuario:psauditoria_usuario},function(data, status){
                    $('#grdconfirma_vista_data').DataTable().ajax.reload();	                    
                });

                var pstipo_documento_codigo = $('#pstipo_documento_codigo').val();
                var psguia_serie = $('#psguia_serie').val();
                var psguia_correlativo = $('#psguia_correlativo').val();
                
                llenarpaneles(pstipo_documento_codigo,psguia_serie,psguia_correlativo);

                swal(
                    'Eliminar!',
                    'La incidencia se eliminó correctamente.',
                    'success'
                );
            }
    });
}

/* ACCION: INICIALIZAR OBJETOS DE MODAL INCIDENCIA*/
/******************************************************************************************/
function modal_incidencia_objetos__init(){

    var dfecha = new Date();
    var lshora = dfecha.getHours();
    var lsminutos = dfecha.getMinutes();

    lshora = lshora = (lshora < 10 ? '0' : '') + lshora;
    lsminutos = lsminutos = (lsminutos < 10 ? '0' : '') + lsminutos;

    console.log("minutos: " + lsminutos);
    cmbsguia_incidencia_tipo__init();
    dtpdguia_incidencia_fecha__init();
    $("#txtsguia_incidencia_hora").val(lshora + ":" + lsminutos);
    $("#txtsguia_incidencia_observacion").val("");
    
    $("#cmbsguia_incidencia_tipo").focus();

}


function modal_detalle_productos__inicializar(){

    $("#pgdetalle_cbosproducto_codigo_edit").html('');
    $.post("../../controller/servicio.php?op=ctrl_apr_web_producto_select", function(data, status){
        $("#pgdetalle_cbosproducto_codigo_edit").html(data);
        $('#pgdetalle_cbosproducto_codigo_edit').selectpicker('refresh');
    });
    $('#pgdetalle_txtsproducto_descripcion_edit').val("");
    $('#pgdetalle_spnnproducto_cantidad_edit').val(0.00);
    $('#pgdetalle_spnnproducto_peso_edit').val(0.00);
    $('#pgdetalle_spnnproducto_costo_edit').val(0.00);
    $('#pgdetalle_txtsproducto_unidad_edit').val("");
    
}

function editardetalle(pscodigo_aleatorio){
    var lscodigo_aleatorio = pscodigo_aleatorio.toString().replace('/','').slice(0, -1);
    
    $.post("../../controller/log_guia_detalle.php?caso=ctrl_buscar",
        {pscodigo_aleatorio:lscodigo_aleatorio},
        function(data, status){
            data = JSON.parse(data);

            $('#hdd_pgdetalle_scodigo_aleatorio').val(lscodigo_aleatorio);

            $("#pgdetalle_cbosproducto_codigo_edit").val(data.sproducto_codigo);
            $("#pgdetalle_cbosproducto_codigo_edit").selectpicker("refresh");
            $('#pgdetalle_txtsproducto_descripcion_edit').val(data.sproducto_descripcion);
            
            $('#pgdetalle_spnnproducto_cantidad_edit').val(data.nproducto_cantidad);
            $('#pgdetalle_spnnproducto_peso_edit').val(data.nproducto_peso);
            $('#pgdetalle_spnnproducto_costo_edit').val(data.nproducto_costo);
            $('#pgdetalle_txtsproducto_unidad_edit').val(data.sproducto_unidad);
           
        }
        
    );
    $("#modaldetalleeditar").modal("show");
    $('#pgdetalle_txtsproducto_descripcion_edit').focus();

}

$(document).on("click","#btnguardardetalleeditar", function(){

    var lstipo_documento_codigo = $('#pstipo_documento_codigo').val();
    var lsguia_serie = $('#psguia_serie').val();
    var lsguia_correlativo = $('#psguia_correlativo').val();

    var psproducto_codigo = $('#pgdetalle_cbosproducto_codigo_edit').val();
    var psproducto_descripcion =  $('#pgdetalle_txtsproducto_descripcion_edit').val();
    var pnproducto_cantidad = $('#pgdetalle_spnnproducto_cantidad_edit').val();
    var pnproducto_peso = $('#pgdetalle_spnnproducto_peso_edit').val();
    var pnproducto_costo = $('#pgdetalle_spnnproducto_costo_edit').val();
    var pscodigo_aleatorio = $('#hdd_pgdetalle_scodigo_aleatorio').val();

    var psauditoria_usuario =  $('#usercontactocodigox').val();

    psproducto_descripcion = psproducto_descripcion.toUpperCase();

    console.log("lstipo_documento_codigo: " + lstipo_documento_codigo);
    console.log("lsguia_serie: " + lsguia_serie);
    console.log("lsguia_correlativo: " + lsguia_correlativo);

    console.log("psproducto_codigo: " + psproducto_codigo);
    console.log("psproducto_descripcion: " + psproducto_descripcion);
    console.log("pnproducto_cantidad: " + pnproducto_cantidad);
    console.log("pnproducto_peso: " + pnproducto_peso);
    console.log("pnproducto_costo: " + pnproducto_costo);

    console.log("pscodigo_aleatorio: " + pscodigo_aleatorio);
    console.log("psauditoria_usuario: " + psauditoria_usuario);

    $.post("../../controller/log_guia_detalle.php?caso=ctrl_editar",{
        psproducto_codigo : psproducto_codigo,
        psproducto_descripcion : psproducto_descripcion,
        pnproducto_cantidad : pnproducto_cantidad,
        pnproducto_peso : pnproducto_peso,
        pnproducto_costo : pnproducto_costo,
        pscodigo_aleatorio : pscodigo_aleatorio,
        psauditoria_usuario : psauditoria_usuario
    },function(data, status){
        swal(
            'Editar!',
            'El registro se editó correctamente.',
            'success'
        );
    });

    llenarpaneles(lstipo_documento_codigo,lsguia_serie,lsguia_correlativo);

    $('#modaldetalleeditar').modal('hide');
});

function eliminardetalle(scodigo_aleatorio){
    var pscodigo_aleatorio = scodigo_aleatorio.toString().replace('/','').slice(0, -1);
    var psauditoria_usuario =  $('#usercontactocodigox').val();
    swal({
        title: 'Eliminar?',
        text: "Esta Seguro de eliminar el Registro",
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
                $.post("../../controller/servicio.php?op=guia_detalle_delete",{pscodigo_aleatorio:pscodigo_aleatorio,psauditoria_usuario:psauditoria_usuario},function(data, status){
                    
                });

                var pstipo_documento_codigo = $('#pstipo_documento_codigo').val();
                var psguia_serie = $('#psguia_serie').val();
                var psguia_correlativo = $('#psguia_correlativo').val();
                
                llenarpaneles(pstipo_documento_codigo,psguia_serie,psguia_correlativo);

                swal(
                    'Eliminar!',
                    'El registro se elimino correctamente.',
                    'success'
                );
            }
    });
}

function eliminardocumento(scodigo_aleatorio){
    var pscodigo_aleatorio = scodigo_aleatorio.toString().replace('/','').slice(0, -1);
    var psauditoria_usuario =  $('#usercontactocodigox').val();

    swal({
        title: 'Eliminar?',
        text: "Esta Seguro de eliminar el Registro",
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
                $.post("../../controller/servicio.php?op=guia_documentos_cliente_delete",{pscodigo_aleatorio:pscodigo_aleatorio,psauditoria_usuario:psauditoria_usuario},function(data, status){
                  
                });

                var pstipo_documento_codigo = $('#pstipo_documento_codigo').val();
                var psguia_serie = $('#psguia_serie').val();
                var psguia_correlativo = $('#psguia_correlativo').val();
                
                llenarpaneles(pstipo_documento_codigo,psguia_serie,psguia_correlativo);

                swal(
                    'Eliminar!',
                    'El registro se elimino correctamente.',
                    'success'
                );
            }
    });
}

function pgdetalle_cbosproducto_codigo__init(){
    $("#pgdetalle_cbosproducto_codigo").html('');
    $.post("../../controller/servicio.php?op=ctrl_apr_web_producto_select", function(data, status){
        $("#pgdetalle_cbosproducto_codigo").html(data);
        $('#pgdetalle_cbosproducto_codigo').selectpicker('refresh');
    });
}

function pgdocumento_txtstipo_documento_codigo__init(){
    $("#pgdocumento_txtstipo_documento_codigo").html('');
    $.post("../../controller/servicio.php?op=ctrl_apr_web_tipo_documento_select", function(data, status){
        $("#pgdocumento_txtstipo_documento_codigo").html(data);
        $('#pgdocumento_txtstipo_documento_codigo').selectpicker('refresh');
    });
}

function fxpgmanifiesto_cmbsagente_codigo__init(){
    $("#pgmanifiesto_cmbsagente_codigo2").html('');
    $.post("../../controller/servicio.php?op=ctrl_apr_web_agente_select", function(data, status){
        $("#pgmanifiesto_cmbsagente_codigo2").html(data);
        $('#pgmanifiesto_cmbsagente_codigo2').selectpicker('refresh');
    });
}

function fxpgmanifiesto_cmbstipo_servicio_codigo__init(){
    $("#pgmanifiesto_cmbstipo_servicio_codigo2").html('');
    $.post("../../controller/servicio.php?op=ctrl_apr_web_tipo_servicio_select", function(data, status){
        $("#pgmanifiesto_cmbstipo_servicio_codigo2").html(data);
        $('#pgmanifiesto_cmbstipo_servicio_codigo2').selectpicker('refresh');
    });
}

function fxpgmanifiesto_cmbsruta_servicio_codigo__init(){
    $("#pgmanifiesto_cmbsruta_servicio_codigo2").html('');
    $('#pgmanifiesto_cmbsruta_servicio_codigo2').selectpicker('refresh');
}

function fxpgmanifiesto_cmbsproveedor_codigo__init(){
    $("#pgmanifiesto_cmbsproveedor_codigo2").html('');
    $.post("../../controller/servicio.php?op=ctrl_apr_web_proveedor_select", function(data, status){
        $("#pgmanifiesto_cmbsproveedor_codigo2").html(data);
        $('#pgmanifiesto_cmbsproveedor_codigo2').selectpicker('refresh');
    });
}

function fxpgmanifiesto_cmbstipo_transporte_codigo__init(){
    $("#pgmanifiesto_cmbstipo_transporte_codigo2").html('');
    $.post("../../controller/servicio.php?op=ctrl_apr_web_tipo_transporte_select", function(data, status){
        $("#pgmanifiesto_cmbstipo_transporte_codigo2").html(data);
        $('#pgmanifiesto_cmbstipo_transporte_codigo2').selectpicker('refresh');
    });
}

function cmbsguia_incidencia_tipo__init(){
    $("#cmbsguia_incidencia_tipo").html("");
    $("#cmbsguia_incidencia_tipo").append('<option value="1">INTERNA</option>');
    $("#cmbsguia_incidencia_tipo").append('<option value="2">CLIENTE</option>');
    $("#cmbsguia_incidencia_tipo").append('<option value="3">LLAMADA</option>');
    $("#cmbsguia_incidencia_tipo").val('1');
    $("#cmbsguia_incidencia_tipo").selectpicker("refresh");
}

/*  OBJETO: dtpdguia_incidencia_fecha
    METODO: INIT
*/    
function dtpdguia_incidencia_fecha__init(){
    $('#dtpdguia_incidencia_fecha').datepicker({
        language: "es",
        todayBtn: "linked",
        format: "dd/mm/yyyy",
        multidate: false,
        todayHighlight: true,
        autoclose: true

    }).datepicker("setDate", new Date());
}    

function modal_retorno_objetos__init(){

    var dfecha = new Date();
    var lshora = dfecha.getHours();
    var lsminutos = dfecha.getMinutes();

    lshora = lshora = (lshora < 10 ? '0' : '') + lshora;
    lsminutos = lsminutos = (lsminutos < 10 ? '0' : '') + lsminutos;

    dtpdguia_retorno_fecha__init();
    $("#txtsguia_retorno_hora").val(lshora + ":" + lsminutos);
    $("#txtsguia_numero_reporte").val("");
    $("#txtsguia_retorno_observacion").val("");
    
    $("#txtsguia_numero_reporte").focus();

}


function modal_retorno(stipo_documento_codigo,sguia_serie,sguia_correlativo, pssuperior_aleatorio){
    var pstipo_documento_codigo = stipo_documento_codigo.toString().replace('/','').slice(0, -1);
    var psguia_serie = sguia_serie.toString().replace('/','').slice(0, -1);
    var psguia_correlativo = sguia_correlativo.toString().replace('/','').slice(0, -1);
    var pssuperior_aleatorio = pssuperior_aleatorio.toString().replace('/','').slice(0, -1);

    $('#pstipo_documento_codigo').val(pstipo_documento_codigo);
    $('#psguia_serie').val(psguia_serie);
    $('#psguia_correlativo').val(psguia_correlativo);
    $('#pssuperior_aleatorio').val(pssuperior_aleatorio);

    $.post("../../controller/log_guia.php?op=ctrl_obtener_registro",{pscodigo_aleatorio:pssuperior_aleatorio},function(data, status){
        data = JSON.parse(data);
        var lsguia_estado = data.sguia_estado;

        switch (lsguia_estado) {
            case '01':
                swal(
                    'Aviso!',
                    'Debe confirmar el documento para ser retornado.',
                    'success'
                );
                break;
            case '15':
                $("#lbltitle").html("RETORNO DEL DOCUMENTO: "+ psguia_serie +"-"+ psguia_correlativo);
                modal_retorno_objetos__init();
                $("#modalretorno").modal("show");
                break;
            default:
                swal(
                    'Aviso!',
                    'No puede volver a retornar el documento.',
                    'success'
                );
                break;                    
        }

    });


    
    

}


function panel_modal__hide(){
    $('#paneldatos').hide();
    $('#panelretorno').hide();
    $('#panelconfirmacion').hide();
    $('#paneldetalle').hide();
    $('#paneldocumento').hide();
    $('#panelincidencia').hide();
    $('#panelproveedor').hide();
}

function panel_modal__show(){
    $('#paneldatos').show();
    $('#panelretorno').show();
    $('#panelconfirmacion').show();
    $('#paneldetalle').show();
    $('#paneldocumento').show();
    $('#panelincidencia').show();
    $('#panelproveedor').show();
}


/*  OBJETO: dtpdguia_retorno_fecha
    METODO: INIT
*/    
function dtpdguia_retorno_fecha__init(){
    $('#dtpdguia_retorno_fecha').datepicker({
        language: "es",
        todayBtn: "linked",
        format: "dd/mm/yyyy",
        multidate: false,
        todayHighlight: true,
        autoclose: true

    }).datepicker("setDate", new Date());
}    



function mretorno_eliminar(scodigo_aleatorio){
    var pscodigo_aleatorio = scodigo_aleatorio.toString().replace('/','').slice(0, -1);
    var psauditoria_usuario =  $('#usercontactocodigox').val();

    swal({
        title: 'Eliminar',
        text: "¿Esta seguro de eliminar el retorno realizado?",
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
                $.post("../../controller/servicio.php?op=ctrl_apr_web_log_guia_retorno_delete",{pscodigo_aleatorio:pscodigo_aleatorio,psauditoria_usuario:psauditoria_usuario},function(data, status){
                    $('#grdconfirma_vista_data').DataTable().ajax.reload();	                    
                });

                var pstipo_documento_codigo = $('#pstipo_documento_codigo').val();
                var psguia_serie = $('#psguia_serie').val();
                var psguia_correlativo = $('#psguia_correlativo').val();
                
                llenarpaneles(pstipo_documento_codigo,psguia_serie,psguia_correlativo);

                swal(
                    'Eliminar!',
                    'El retorno del documento se eliminó correctamente.',
                    'success'
                );
            }
    });
}

function mconfirmacion_eliminar(scodigo_aleatorio){
    var pscodigo_aleatorio = scodigo_aleatorio.toString().replace('/','').slice(0, -1);
    var psauditoria_usuario =  $('#usercontactocodigox').val();

    swal({
        title: 'Eliminar',
        text: "¿Esta seguro de eliminar la confirmacion realizada?",
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
                $.post("../../controller/servicio.php?op=ctrl_apr_web_log_guia_confirma_delete",{pscodigo_aleatorio:pscodigo_aleatorio,psauditoria_usuario:psauditoria_usuario},function(data, status){
                    $('#grdconfirma_vista_data').DataTable().ajax.reload();	                    
                });

                var pstipo_documento_codigo = $('#pstipo_documento_codigo').val();
                var psguia_serie = $('#psguia_serie').val();
                var psguia_correlativo = $('#psguia_correlativo').val();
                
                llenarpaneles(pstipo_documento_codigo,psguia_serie,psguia_correlativo);

                swal(
                    'Eliminar!',
                    'La confirmación se eliminó correctamente.',
                    'success'
                );
            }
    });
}

$(document).on("click","#btnguardarretorno", function(){
    var pstipo_documento_codigo = $('#pstipo_documento_codigo').val();
    var psguia_serie = $('#psguia_serie').val();
    var psguia_correlativo = $('#psguia_correlativo').val();
    
    var pdguia_retorno_fecha = $('#dtpdguia_retorno_fecha').val();
    var psguia_retorno_hora = $('#txtsguia_retorno_hora').val();
    var psguia_numero_reporte = $('#txtsguia_numero_reporte').val();
    var psguia_retorno_observacion = $('#txtsguia_retorno_observacion').val();

    var pscodigo_aleatorio = "";
    var pssuperior_aleatorio = $('#pssuperior_aleatorio').val();
    var psauditoria_usuario =  $('#usercontactocodigox').val();

    pdguia_retorno_fecha = pdguia_retorno_fecha.split(" ")[0].split("/").reverse().join("-");
    psguia_retorno_hora = psguia_retorno_hora + ":00";
    var psguia_retorno_fecha = pdguia_retorno_fecha + " " + psguia_retorno_hora;
    psguia_numero_reporte = psguia_numero_reporte.toUpperCase();
    psguia_retorno_observacion = psguia_retorno_observacion.toUpperCase();

    console.log("pstipo_documento_codigo: " + pstipo_documento_codigo);
    console.log("psguia_serie: " + psguia_serie);
    console.log("psguia_correlativo: " + psguia_correlativo);

    console.log("psguia_retorno_fecha: " + psguia_retorno_fecha);
    console.log("psguia_numero_reporte: " + psguia_numero_reporte);
    console.log("psguia_retorno_observacion: " + psguia_retorno_observacion);

    console.log("pssuperior_aleatorio: " + pssuperior_aleatorio);
    console.log("psauditoria_usuario: " + psauditoria_usuario);


    $.post("../../controller/servicio.php?op=ctrl_apr_web_log_guia_retorno_insert",{
        pstipo_documento_codigo:pstipo_documento_codigo,
        psguia_serie:psguia_serie,
        psguia_correlativo:psguia_correlativo,
        psguia_retorno_fecha : psguia_retorno_fecha,
        psguia_numero_reporte: psguia_numero_reporte,
        psguia_retorno_observacion : psguia_retorno_observacion,
        pscodigo_aleatorio : pscodigo_aleatorio,
        pssuperior_aleatorio : pssuperior_aleatorio,
        psauditoria_usuario : psauditoria_usuario
    },function(data, status)
    {
        console.log("status: " + status) ;
        $('#grdretorno_vista_data').DataTable().ajax.reload();	

        llenarpaneles(pstipo_documento_codigo,psguia_serie,psguia_correlativo);

        $('#modalretorno').modal('hide');
    
        swal(
            'Retorno',
            'El documento se retornó correctamente.',
            'success'
        );
    
    });    
});

init();