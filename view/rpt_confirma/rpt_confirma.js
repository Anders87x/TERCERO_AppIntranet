//********************************************************************************************************
// COMENTARIO: 
//********************************************************************************************************

function init(){
}

$(document).ready(function(){

    mobjetos__inicializar();
    mpaneles__ocultar();

    mgrilla_item_obtener_datos_01();
    mgrilla_item_seleccion_fondocolor();

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



//********************************************************************************************************

/*  OBJETO: pgvar_btnbuscar --------- METODO: CLICK */
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

           
    tblconsulta_vista_data = $('#grdconsulta_vista_data').dataTable({
        aProcessin: true,
        aServerSid: true,
        dom: 'Bfrtip',
        searchin: true,
        lengthChange: true,
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
        ajax:{
            url: '../../controller/rpt_confirma.php?caso=rpt_confirma_01',
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
        scrollX:        true,
        scrollCollapse: true,
        fixedColumns:   {
            leftColumns:  0,
            rightColumns: 0
        },
        bDestroy:       true,
        responsive:     false,
        bInfo:          true,
        iDisplayLength: 10,
        language:       { "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json" }
    }).DataTable(); 

    mpaneles__ocultar();

});

/*  OBJETO: pgvar_btnexportar --------- METODO: CLICK */
$(document).on("click","#pgvar_btnexportar", function(){
    var pstipo_servicio_codigo = $('#pgvar_cmbstipo_servicio_codigo').val();
    var psruta_servicio_destino_codigo = $('#pgvar_cmbsruta_servicio_destino_codigo').val();
    var psgrupo_cliente_codigo = $('#pgvar_cmbsgrupo_cliente_codigo').val();
    var pdfecha_recepcion_inicial = $('#pgvar_dtpdfecha_inicial').val();
    var pdfecha_recepcion_final = $('#pgvar_dtpdfecha_final').val();
    var psguia_estado = $('#pgvar_cmbsguia_estado').val();
    
    var psfecha_recepcion_inicial = '';
    var psfecha_recepcion_final = '';

    psruta_servicio_destino_codigo = (psruta_servicio_destino_codigo == null || psruta_servicio_destino_codigo == undefined) ? "" : psruta_servicio_destino_codigo

    psfecha_recepcion_inicial   = psfecha_recepcion_inicial.concat(pdfecha_recepcion_inicial.substr(6,4), pdfecha_recepcion_inicial.substr(3,2), pdfecha_recepcion_inicial.substr(0,2));
    psfecha_recepcion_final     = psfecha_recepcion_final.concat(pdfecha_recepcion_final.substr(6,4), pdfecha_recepcion_final.substr(3,2), pdfecha_recepcion_final.substr(0,2));
    
    window.open("xml_excel01a.php?pstipo_servicio_codigo=" +pstipo_servicio_codigo +
                            "&psruta_servicio_destino_codigo="+ psruta_servicio_destino_codigo + 
                            "&psgrupo_cliente_codigo="+ psgrupo_cliente_codigo +
                            "&psfecha_recepcion_inicial="+ psfecha_recepcion_inicial +
                            "&psfecha_recepcion_final="+ psfecha_recepcion_final +
                            "&psguia_estado="+ psguia_estado );    
});

/*  OBJETO: pgvar_btnlimpiar --------- METODO: CLICK */
$(document).on("click","#pgvar_btnlimpiar", function(){
    pgvar_cmbstipo_servicio_codigo__inicializar();
    pgvar_cmbsruta_servicio_destino_codigo__inicializar();
    pgvar_cmbsgrupo_cliente_codigo__inicializar();
    pgvar_dtpdfecha_inicial__inicializar();
    pgvar_dtpdfecha_final__inicializar();
    pgvar_cmbsguia_estado__inicializar();
    
    $('#pgvar_cmbstipo_servicio_codigo').focus();
});

/*  OBJETO: pgrep_btnbuscar --------- METODO: CLICK */
$(document).on("click","#pgrep_btnbuscar", function(){
    var lsguia_numero_reporte = $('#pgrep_txtsguia_numero_reporte').val();
    
    console.log("lsguia_numero_reporte: " + lsguia_numero_reporte) ;

    tblconsulta_vista_data = $('#grdconsulta_vista_data').dataTable({
        aProcessin: true,
        aServerSid: true,
        dom: 'Bfrtip',
        searchin: true,
        lengthChange: true,
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
        ajax:{
            url: '../../controller/rpt_confirma.php?caso=rpt_confirma_02',
            type : "post",
            dataType : "json",
            data:{  
                psguia_numero_reporte:lsguia_numero_reporte
            },
            error: function(e){
                console.log(e.responseText);	
            }
        },
        scrollX:        true,
        scrollCollapse: true,
        fixedColumns:   {
            leftColumns:  0,
            rightColumns: 0
        },
        bDestroy:       true,
        responsive:     false,
        bInfo:          true,
        iDisplayLength: 10,
        language:       { "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json" }
    }).DataTable(); 

    mpaneles__ocultar();

});

/*  OBJETO: pgrep_btnexportar --------- METODO: CLICK */
$(document).on("click","#pgrep_btnexportar", function(){
    var lsguia_numero_reporte = $('#pgrep_txtsguia_numero_reporte').val();
    window.open("xml_excel02a.php?psguia_numero_reporte=" + lsguia_numero_reporte);
});

/*  OBJETO: pgrep_btnlimpiar ---------- METODO: CLICK */
$(document).on("click","#pgrep_btnlimpiar", function(){
    pgrep_txtsguia_numero_reporte__inicializar();
    $('#pgrep_txtsguia_numero_reporte').focus();
});

/*  OBJETO: pgped_btnbuscar ---------- METODO: CLICK */
$(document).on("click","#pgped_btnbuscar", function(){
    var lsguia_numero_pedido = $('#pgped_txtsguia_numero_pedido').val();
    
    console.log("lsguia_numero_pedido: " + lsguia_numero_pedido) ;

    tblconsulta_vista_data = $('#grdconsulta_vista_data').dataTable({
        aProcessin: true,
        aServerSid: true,
        dom: 'Bfrtip',
        searchin: true,
        lengthChange: true,
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
        ajax:{
            url: '../../controller/rpt_confirma.php?caso=rpt_confirma_03',
            type : "post",
            dataType : "json",
            data:{  
                psguia_numero_pedido:lsguia_numero_pedido
            },
            error: function(e){
                console.log(e.responseText);	
            }
        },
        scrollX:        true,
        scrollCollapse: true,
        fixedColumns:   {
            leftColumns:  0,
            rightColumns: 0
        },
        bDestroy:       true,
        responsive:     false,
        bInfo:          true,
        iDisplayLength: 10,
        language:       { "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json" }
    }).DataTable(); 

    mpaneles__ocultar();

});

/*  OBJETO: pgped_btnexportar --------- METODO: CLICK */
$(document).on("click","#pgped_btnexportar", function(){
    var lsguia_numero_pedido = $('#pgped_txtsguia_numero_pedido').val();
    window.open("xml_excel03a.php?psguia_numero_pedido=" + lsguia_numero_pedido);
});

/*  OBJETO: pgped_btnlimpiar ---------- METODO: CLICK */
$(document).on("click","#pgped_btnlimpiar", function(){
    pgped_txtsguia_numero_pedido__inicializar();
    $('#pgped_txtsguia_numero_pedido').focus();
});


//********************************************************************************************************

/*  OBJETO: cmbstipo_servicio_codigo --------- METODO: CHANGE */    
$("#pgvar_cmbstipo_servicio_codigo").change(function(){
    pgvar_cmbsruta_servicio_destino_codigo__inicializar();

    $("#pgvar_cmbstipo_servicio_codigo option:selected").each(function(){
        $.post("../../controller/sun_departamento.php?caso=ctrl_select", 
            {}, 
            function(data, status){
                console.log(data);
                $("#pgvar_cmbsruta_servicio_destino_codigo").html(data);
                $('#pgvar_cmbsruta_servicio_destino_codigo').selectpicker('refresh');
        });
    });
});

/*  OBJETO: pgcli_cmbstipo_documento_codigo ---------- METODO: CHANGE */    
$("#pgcli_cmbstipo_documento_codigo").change(function(){
    $("#pgcli_txtsdocumento_numero").focus();
});

/*  OBJETO: pgdoc_cmbstipo_documento_codigo ---------- METODO: CHANGE */    
$("#pgdoc_cmbstipo_documento_codigo").change(function(){
    $("#pgdoc_txtsguia_serie").focus();
});


//********************************************************************************************************

/*  INICIO: FUNCION PARA OBTENER DATOS DE LA TABLA */
function mgrilla_item_obtener_datos_01(){
    
    tblconsulta_vista_data = $('#grdconsulta_vista_data').dataTable({
        aProcessin: true,
        aServerSid: true,
        dom: 'Bfrtip',
        searchin: true,
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
        scrollX:        true,
        scrollCollapse: true,
        fixedColumns:   {
            leftColumns:  0,
            rightColumns: 0
        },
        bDestroy:   true,
        responsive: false,
        bInfo : true,
        iDisplayLength : 10,
        language: { "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json" }
    }).DataTable(); 

    mpaneles__ocultar();
}
/*  FIN: */

/* OBJETO: grilla ------------ METODO: - */
function mgrilla_item_seleccion_fondocolor(){
	$("#grdconsulta_vista_data tbody").on( "click", "tr", function () {

		if ( $(this).hasClass("selected") )
		{
			$(this).removeClass("selected");
		}
		else
		{
			tblconsulta_vista_data.$("tr.selected").removeClass("selected");
			$(this).addClass("selected");
		}
	} );
}
/*  FIN: */

/* OBJETO: Formulario ------------ METODO: INIT */
function mobjetos__inicializar(){
    
    pgvar_cmbstipo_servicio_codigo__inicializar();
    pgvar_cmbsruta_servicio_destino_codigo__inicializar();
    pgvar_cmbsgrupo_cliente_codigo__inicializar();
    pgvar_dtpdfecha_inicial__inicializar();
    pgvar_dtpdfecha_final__inicializar();
    pgvar_cmbsguia_estado__inicializar();

    pgrep_txtsguia_numero_reporte__inicializar();
    pgped_txtsguia_numero_pedido__inicializar();


}
/*  FIN: */

/*  INICIO: FUNCION PARA OCULTAR LOS PANELES */
function mpaneles__ocultar(){
    $('#paneldatos').hide();
    $('#panelretorno').hide();
    $('#panelconfirmacion').hide();
    $('#paneldetalle').hide();
    $('#paneldocumento').hide();
    $('#panelincidencia').hide();
}

/*  INICIO: FUNCION PARA MOSTRAR LOS PANELES */
function mpaneles__mostrar(){
    $('#paneldatos').show();
    $('#panelretorno').show();
    $('#panelconfirmacion').show();
    $('#paneldetalle').show();
    $('#paneldocumento').show();
    $('#panelincidencia').show();
}

/*  INICIO: FUNCION PARA VISUALIZAR LOS PANELES */
function mgrilla_item_visualizar(stipo_documento_codigo,sguia_serie,sguia_correlativo){

    var pstipo_documento_codigo = stipo_documento_codigo.toString().replace('/','').slice(0, -1);
    var psguia_serie = sguia_serie.toString().replace('/','').slice(0, -1);
    var psguia_correlativo = sguia_correlativo.toString().replace('/','').slice(0, -1);

    $('#pstipo_documento_codigo').val(pstipo_documento_codigo);
    $('#psguia_serie').val(psguia_serie);
    $('#psguia_correlativo').val(psguia_correlativo);

    llenarpaneles(pstipo_documento_codigo,psguia_serie,psguia_correlativo);
    
    mpaneles__mostrar();
}
/*  FIN: */

/*  INICIO: FUNCION PARA LLENAR LOS PANELES CON LOS DATOS */
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
/*  FIN: */



//********************************************************************************************************

/*  OBJETO: pgvar_cmbstipo_servicio_codigo ---------- METODO: INIT */
function pgvar_cmbstipo_servicio_codigo__inicializar(){
    $("#pgvar_cmbstipo_servicio_codigo").html('');
    
    $.post("../../controller/servicio.php?op=ctrl_apr_web_tipo_servicio_select", function(data, status){
        $("#pgvar_cmbstipo_servicio_codigo").html(data);
        $("#pgvar_cmbstipo_servicio_codigo").selectpicker('refresh');
    });
}

/*  OBJETO: pgvar_cmbsruta_servicio_destino_codigo --------- METODO: INIT */
function pgvar_cmbsruta_servicio_destino_codigo__inicializar(){
    $("#pgvar_cmbsruta_servicio_destino_codigo").html('');
    $("#pgvar_cmbsruta_servicio_destino_codigo").selectpicker('refresh');
}  

/*  OBJETO: pgvar_cmbsgrupo_cliente_codigo ----------  METODO: INIT */
function pgvar_cmbsgrupo_cliente_codigo__inicializar(){
    $("#pgvar_cmbsgrupo_cliente_codigo").html('');
    
    $.post("../../controller/servicio.php?op=ctrl_apr_web_grupo_cliente_select", function(data, status){
        $("#pgvar_cmbsgrupo_cliente_codigo").html(data);
        $("#pgvar_cmbsgrupo_cliente_codigo").selectpicker('refresh');
    });
}

/*  OBJETO: pgvar_dtpdfecha_inicial --------- METODO: INIT */
function pgvar_dtpdfecha_inicial__inicializar(){
    $('#pgvar_dtpdfecha_inicial').datepicker({
        language: "es",
        todayBtn: "linked",
        format: "dd/mm/yyyy",
        multidate: false,
        todayHighlight: true,
        autoclose: true,

    }).datepicker("setDate", new Date());
}

/*  OBJETO: pgvar_dtpdfecha_final --------- METODO: INIT */
function pgvar_dtpdfecha_final__inicializar(){
    $('#pgvar_dtpdfecha_final').datepicker({
        language: "es",
        todayBtn: "linked",
        format: "dd/mm/yyyy",
        multidate: false,
        todayHighlight: true,
        autoclose: true,

    }).datepicker("setDate", new Date()); 
}

/*  OBJETO: pgvar_cmbsguia_estado ----------- METODO: INIT */
function pgvar_cmbsguia_estado__inicializar(){
    $("#pgvar_cmbsguia_estado").html(''); 
    $("#pgvar_cmbsguia_estado").append('<option value="01">EN TRANSITO</option>');
    $("#pgvar_cmbsguia_estado").append('<option value="15">CONFIRMADOS</option>');
    $("#pgvar_cmbsguia_estado").append('<option value="99">AMBOS</option>');
    $("#pgvar_cmbsguia_estado").val('99');
    $("#pgvar_cmbsguia_estado").selectpicker('refresh');
}

/*  OBJETO: pgrep_txtsguia_numero_reporte ---------- METODO: INIT */
function pgrep_txtsguia_numero_reporte__inicializar(){
    $("#pgrep_txtsguia_numero_reporte").val("");
}

/*  OBJETO: pgped_txtsguia_numero_pedido  METODO: INIT */
function pgped_txtsguia_numero_pedido__inicializar(){
    $("#pgped_txtsguia_numero_pedido").val("");
    
}

init();