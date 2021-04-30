
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

    pgdetalle_cbosproducto_codigo__init();
    pgdocumento_txtstipo_documento_codigo__init();
    fxpgmanifiesto_cmbsagente_codigo__init();
    fxpgmanifiesto_cmbstipo_servicio_codigo__init();
    fxpgmanifiesto_cmbsruta_servicio_codigo__init();
    fxpgmanifiesto_cmbsproveedor_codigo__init();
    fxpgmanifiesto_cmbstipo_transporte_codigo__init();

    mdl_cmbsgrupo_cliente_codigo_editar__init();
    mdl_cmbsdestino_empresa_razon_social_editar__init();
    mdl_cmbsprioridad_codigo_editar__init();
    mdl_dtpdguia_fecha_recepcion_editar__init();
    mdl_dtpdguia_fecha_vencimiento_editar__init();
    mdl_dtpdguia_fecha_retorno_editar__init();

    pgdetalle_cbosproducto_codigo_edit__init();
    cmbsguia_confirma_estado__init();
        
    //AnderCode 09/11/2020
    confirma_vista();
    //AnderCode 15/11/2020
    $('#paneldatos').hide();
    $('#panelconfirmacion').hide();
    $('#paneldetalle').hide();
    $('#paneldocumento').hide();
    $('#panelincidencia').hide();
    $('#panelproveedor').hide();
    //AnderCode 19/11/2020

    dashboard_resumen__init();
    grdconfirma_resumen_05__init();
    grdconfirma_resumen_06__init();

    tblconfirma_vista_data = $('#grdconfirma_vista_data').dataTable();
    $('#grdconfirma_vista_data tbody').on( 'click', 'tr', function () {

        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            tblconfirma_vista_data.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );



/*     $("#pgmanifiesto_cmbstipo_servicio_codigo2").change(function(){
        $("#pgmanifiesto_cmbsruta_servicio_codigo2").html('');
        $('#pgmanifiesto_cmbsruta_servicio_codigo2').selectpicker('refresh');
        $("#pgmanifiesto_cmbstipo_servicio_codigo2 option:selected").each(function () {
            lstipo_servicio_codigo = $(this).val();
            $.post("../../controller/servicio.php?op=ctrl_apr_web_ruta_servicio_select", {pstipo_servicio_codigo : lstipo_servicio_codigo}, function(data, status){
                $("#pgmanifiesto_cmbsruta_servicio_codigo2").html(data);
                $('#pgmanifiesto_cmbsruta_servicio_codigo2').selectpicker('refresh');
             });
        });
    }); */

});


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


$(document).on("click","#nuevodocumento", function(){
    $('#modaldocumento').modal('show');
});

function modal_documento_cliente_objetos__init(){
    pgdocumento_txtstipo_documento_codigo__init();
    $('#pgdocumento_txtscliente_guia_numero').val("");
}

function pgdoc_cmbstipo_documento_codigo__init(){
    $("#pgdoc_cmbstipo_documento_codigo").html('');
    
    $.post("../../controller/servicio.php?op=ctrl_apr_web_tipo_documento_select", function(data, status){
        $("#pgdoc_cmbstipo_documento_codigo").html(data);
        $("#pgdoc_cmbstipo_documento_codigo").selectpicker('refresh');
    });
}


function pgvar_cmbstipo_servicio_codigo__init(){
    $("#pgvar_cmbstipo_servicio_codigo").html('');

    $.post("../../controller/servicio.php?op=ctrl_apr_web_tipo_servicio_select", function(data, status){
        $("#pgvar_cmbstipo_servicio_codigo").html(data);
        $("#pgvar_cmbstipo_servicio_codigo").selectpicker('refresh');
    });
}

function pgvar_cmbsguia_estado__init(){
    $("#pgvar_cmbsguia_estado").html('');
    $("#pgvar_cmbsguia_estado").append('<option value="01">EN TRANSITO</option>');
    $("#pgvar_cmbsguia_estado").append('<option value="15">CONFIRMADOS</option>');
    $("#pgvar_cmbsguia_estado").append('<option value="99">TODOS</option>');
    $("#pgvar_cmbsguia_estado").val('99');
    $("#pgvar_cmbsguia_estado").selectpicker('refresh');
}


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

function pgcli_cmbstipo_documento_codigo__init(){
    $("#pgcli_cmbstipo_documento_codigo").html('');
    
    $.post("../../controller/servicio.php?op=ctrl_apr_web_tipo_documento_select", function(data, status){
        $("#pgcli_cmbstipo_documento_codigo").html(data);
        $("#pgcli_cmbstipo_documento_codigo").selectpicker('refresh');
    });
}

$("#pgcli_cmbstipo_documento_codigo").change(function(){
    $("#pgcli_txtsdocumento_numero").focus();
});

$(document).on("click","#pgreg_btnreporte_diario", function(){
    location.href = "../../view/reporte_diario/";
});

$(document).on("click","#pgreg_btnreporte_confirmacion", function(){
    location.href = "../../view/reporte_confirmacion/";
});

$(document).on("click","#pgdoc_btnlimpiar", function(){
    pgdoc_cmbstipo_documento_codigo__init();
    $('#pgdoc_txtsguia_serie').val("");
    $('#pgdoc_txtsguia_correlativo').val("");
    $('#pgdoc_cmbstipo_documento_codigo').focus();
});

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


/*  OBJETO: btneditarremitente --------- METODO: CLICK ASV*/
$(document).on("click", "#btneditarremitente", function (){

    var pscodigo_aleatorio = $("#hdd_scodigo_aleatorio").val();

    $.post("../../controller/log_guia.php?op=ctrl_obtener_registro",
        {pscodigo_aleatorio : pscodigo_aleatorio},
        function(data, status){
            data = JSON.parse(data);
            console.log(data);
            lsgrupo_cliente_codigo = data.sgrupo_cliente_codigo;
            lsremite_cliente_codigo = data.sremite_cliente_codigo;
            lsremite_cliente_direccion = data.sremite_cliente_direccion;
            lsremite_departamento_codigo = data.sremite_departamento_codigo;
            lsremite_provincia_codigo = data.sremite_provincia_codigo;
            lsremite_distrito_codigo = data.sremite_distrito_codigo;
            lsremite_atencion = data.sremite_atencion;

            $('#cmbsgrupo_cliente_codigo_editar').val(lsgrupo_cliente_codigo).change();
            $('#txtsremite_cliente_direccion_editar').val(lsremite_cliente_direccion);
            $('#txtsremite_atencion_editar').val(lsremite_atencion);

            $("#cmbsremite_cliente_codigo_editar").html("");
            $.post("../../controller/servicio.php?op=ctrl_apr_web_remitente_select", 
                {psgrupo_cliente_codigo : lsgrupo_cliente_codigo}, 
                function(data, status){
                    $("#cmbsremite_cliente_codigo_editar").html(data);
                    $("#cmbsremite_cliente_codigo_editar").val(lsremite_cliente_codigo);
                    $("#cmbsremite_cliente_codigo_editar").selectpicker("refresh");
                }
             );

            $("#cmbsremite_departamento_codigo_editar").html("");
            $.post("../../controller/servicio.php?op=ctrl_apr_web_ubigeo_dpto_select", {}, 
                function(data, status){
                    $("#cmbsremite_departamento_codigo_editar").html(data);
                    $("#cmbsremite_departamento_codigo_editar").val(lsremite_departamento_codigo);
                    $("#cmbsremite_departamento_codigo_editar").selectpicker("refresh");
                }
            );

            $("#cmbsremite_provincia_codigo_editar").html("");
            $.post("../../controller/servicio.php?op=ctrl_apr_web_ubigeo_prov_select",
                {psdepartamento_codigo : lsremite_departamento_codigo}, 
                function(data, status){
                    $("#cmbsremite_provincia_codigo_editar").html(data);
                    $("#cmbsremite_provincia_codigo_editar").val(lsremite_provincia_codigo);
                    $("#cmbsremite_provincia_codigo_editar").selectpicker("refresh");
                }
            );

            $("#cmbsremite_distrito_codigo_editar").html("");
            $.post("../../controller/servicio.php?op=ctrl_apr_web_ubigeo_dist_select",
                {psprovincia_codigo : lsremite_provincia_codigo}, 
                function(data, status){
                    $("#cmbsremite_distrito_codigo_editar").html(data);
                    $("#cmbsremite_distrito_codigo_editar").val(lsremite_distrito_codigo);
                    $("#cmbsremite_distrito_codigo_editar").selectpicker("refresh");
                }
            );

            $("#cmbsremite_departamento_codigo_editar").attr("disabled", true);
            $("#cmbsremite_provincia_codigo_editar").attr("disabled", true);
            $("#cmbsremite_distrito_codigo_editar").attr("disabled", true);

            $('#modalremitenteeditar').modal('show');

        }
    );
   
});

/*  OBJETO: btnguardarremitente --------- METODO: CLICK ASV*/
$(document).on("click","#btnguardarremitente", function(){
    
    var pstipo_documento_codigo = $('#hdd_stipo_documento_codigo').val();
    var psguia_serie = $('#hdd_sguia_serie').val();
    var psguia_correlativo = $('#hdd_sguia_correlativo').val();
    var pscodigo_aleatorio = $('#hdd_scodigo_aleatorio').val();

    var psgrupo_cliente_codigo_editar = $("#cmbsgrupo_cliente_codigo_editar").val();
    var psremite_cliente_codigo_editar = $("#cmbsremite_cliente_codigo_editar").val();
    var psremite_cliente_direccion_editar = $("#txtsremite_cliente_direccion_editar").val();
    var psremite_departamento_codigo_editar = $("#cmbsremite_departamento_codigo_editar").val();
    var psremite_provincia_codigo_editar = $("#cmbsremite_provincia_codigo_editar").val();
    var psremite_distrito_codigo_editar = $("#cmbsremite_distrito_codigo_editar").val();
    var psremite_atencion_editar = $("#txtsremite_atencion_editar").val();
    
    var psauditoria_usuario = $('#hdd_susuario_codigo').val();

    psremite_cliente_direccion_editar = psremite_cliente_direccion_editar.toUpperCase();
    psremite_atencion_editar = psremite_atencion_editar.toUpperCase();

    console.log("pstipo_documento_codigo : " + pstipo_documento_codigo);
    console.log("psguia_serie : " + psguia_serie);
    console.log("psguia_correlativo : " + psguia_correlativo);

    console.log("psgrupo_cliente_codigo_editar : " + psgrupo_cliente_codigo_editar);
    console.log("psremite_cliente_codigo_editar : " + psremite_cliente_codigo_editar);
    console.log("psremite_cliente_direccion_editar : " + psremite_cliente_direccion_editar);
    console.log("psremite_departamento_codigo_editar : " + psremite_departamento_codigo_editar);
    console.log("psremite_provincia_codigo_editar : " + psremite_provincia_codigo_editar);
    console.log("psremite_distrito_codigo_editar : " + psremite_distrito_codigo_editar);
    console.log("psremite_atencion_editar : " + psremite_atencion_editar);

    console.log("pscodigo_aleatorio : " + pscodigo_aleatorio);
    console.log("psauditoria_usuario : " + psauditoria_usuario);


    $.post("../../controller/log_guia.php?op=ctrl_editar_remitente",{
        psgrupo_cliente_codigo_editar : psgrupo_cliente_codigo_editar, 
        psremite_cliente_codigo_editar : psremite_cliente_codigo_editar,
        psremite_cliente_direccion_editar : psremite_cliente_direccion_editar,
        psremite_departamento_codigo_editar : psremite_departamento_codigo_editar,
        psremite_provincia_codigo_editar : psremite_provincia_codigo_editar,
        psremite_distrito_codigo_editar : psremite_distrito_codigo_editar,
        psremite_atencion_editar : psremite_atencion_editar,
        pscodigo_aleatorio : pscodigo_aleatorio,
        psauditoria_usuario : psauditoria_usuario
    },function(data, status){
        swal(
            'Editar!',
            'Los cambios se registraron correctamente.',
            'success'
        );
    });

    llenarpaneles(pstipo_documento_codigo, psguia_serie, psguia_correlativo);

    $('#modalremitenteeditar').modal('hide');
});

/*  OBJETO: btneditardestinatario --------- METODO: CLICK ASV*/
$(document).on("click", "#btneditardestinatario", function (){
    
    var pscodigo_aleatorio = $("#hdd_scodigo_aleatorio").val();

    $.post("../../controller/log_guia.php?op=ctrl_obtener_registro",
        {pscodigo_aleatorio : pscodigo_aleatorio},
        function(data, status){
            
            data = JSON.parse(data);

            lsdestino_empresa_razon_social = data.sdestino_empresa_razon_social;
            lsdestino_empresa_direccion = data.sdestino_empresa_direccion;
            lsdestino_departamento_codigo = data.sdestino_departamento_codigo;
            lsdestino_provincia_codigo = data.sdestino_provincia_codigo;
            lsdestino_distrito_codigo = data.sdestino_distrito_codigo;
            lsdestino_atencion = data.sdestino_atencion;

            $('#cmbsdestino_empresa_razon_social_editar').val(lsdestino_empresa_razon_social).change();
            $('#txtsdestino_empresa_direccion_editar').val(lsdestino_empresa_direccion);
            $('#txtsdestino_atencion_editar').val(lsdestino_atencion);

            $("#cmbsdestino_departamento_codigo_editar").html("");
            $.post("../../controller/servicio.php?op=ctrl_apr_web_ubigeo_dpto_select", {}, 
                function(data, status){
                    $("#cmbsdestino_departamento_codigo_editar").html(data);
                    $("#cmbsdestino_departamento_codigo_editar").val(lsdestino_departamento_codigo);
                    $("#cmbsdestino_departamento_codigo_editar").selectpicker("refresh");
                }
            );

            $("#cmbsdestino_provincia_codigo_editar").html("");
            $.post("../../controller/servicio.php?op=ctrl_apr_web_ubigeo_prov_select",
                {psdepartamento_codigo : lsdestino_departamento_codigo}, 
                function(data, status){
                    $("#cmbsdestino_provincia_codigo_editar").html(data);
                    $("#cmbsdestino_provincia_codigo_editar").val(lsdestino_provincia_codigo);
                    $("#cmbsdestino_provincia_codigo_editar").selectpicker("refresh");
                }
            );
            
            $("#cmbsdestino_distrito_codigo_editar").html("");
            $.post("../../controller/servicio.php?op=ctrl_apr_web_ubigeo_dist_select",
                {psprovincia_codigo : lsdestino_provincia_codigo}, 
                function(data, status){
                    $("#cmbsdestino_distrito_codigo_editar").html(data);
                    $("#cmbsdestino_distrito_codigo_editar").val(lsdestino_distrito_codigo);
                    $("#cmbsdestino_distrito_codigo_editar").selectpicker("refresh");
                }
            );
            
            $("#cmbsdestino_departamento_codigo_editar").attr("disabled", true);
            $("#cmbsdestino_provincia_codigo_editar").attr("disabled", true);
            $("#cmbsdestino_distrito_codigo_editar").attr("disabled", true);

            $('#modaldestinatarioeditar').modal('show');

        }
    );
   
});

/*  OBJETO: btnguardardestinatario --------- METODO: CLICK ASV*/
$(document).on("click","#btnguardardestinatario", function(){
    
    var pstipo_documento_codigo = $('#hdd_stipo_documento_codigo').val();
    var psguia_serie = $('#hdd_sguia_serie').val();
    var psguia_correlativo = $('#hdd_sguia_correlativo').val();
    var pscodigo_aleatorio = $('#hdd_scodigo_aleatorio').val();

    var psdestino_empresa_razon_social_editar = $("#cmbsdestino_empresa_razon_social_editar").val();
    var psdestino_empresa_direccion_editar = $("#txtsdestino_empresa_direccion_editar").val();
    var psdestino_departamento_codigo_editar = $("#cmbsdestino_departamento_codigo_editar").val();
    var psdestino_provincia_codigo_editar = $("#cmbsdestino_provincia_codigo_editar").val();
    var psdestino_distrito_codigo_editar = $("#cmbsdestino_distrito_codigo_editar").val();
    var psdestino_atencion_editar = $("#txtsdestino_atencion_editar").val();
    
    var psauditoria_usuario = $('#hdd_susuario_codigo').val();

    psdestino_empresa_direccion_editar = psdestino_empresa_direccion_editar.toUpperCase();
    psdestino_atencion_editar = psdestino_atencion_editar.toUpperCase();

    console.log("pstipo_documento_codigo : " + pstipo_documento_codigo);
    console.log("psguia_serie : " + psguia_serie);
    console.log("psguia_correlativo : " + psguia_correlativo);

    console.log("psdestino_empresa_razon_social_editar : " + psdestino_empresa_razon_social_editar);
    console.log("psdestino_empresa_direccion_editar : " + psdestino_empresa_direccion_editar);
    console.log("psdestino_departamento_codigo_editar : " + psdestino_departamento_codigo_editar);
    console.log("psdestino_provincia_codigo_editar : " + psdestino_provincia_codigo_editar);
    console.log("psdestino_distrito_codigo_editar : " + psdestino_distrito_codigo_editar);
    console.log("psdestino_atencion_editar : " + psdestino_atencion_editar);

    console.log("pscodigo_aleatorio : " + pscodigo_aleatorio);
    console.log("psauditoria_usuario : " + psauditoria_usuario);

    $.post("../../controller/log_guia.php?op=ctrl_editar_destinatario",{
        psdestino_empresa_razon_social_editar : psdestino_empresa_razon_social_editar, 
        psdestino_empresa_direccion_editar : psdestino_empresa_direccion_editar,
        psdestino_departamento_codigo_editar : psdestino_departamento_codigo_editar,
        psdestino_provincia_codigo_editar : psdestino_provincia_codigo_editar,
        psdestino_distrito_codigo_editar : psdestino_distrito_codigo_editar,
        psdestino_atencion_editar : psdestino_atencion_editar,
        pscodigo_aleatorio : pscodigo_aleatorio,
        psauditoria_usuario : psauditoria_usuario
    },function(data, status){
        console.log(status);
        swal(
            'Editar!',
            'Los cambios se registraron correctamente.',
            'success'
        );
    });

    llenarpaneles(pstipo_documento_codigo, psguia_serie, psguia_correlativo);

    $('#modaldestinatarioeditar').modal('hide');
});

/*  OBJETO: btneditarcabecera --------- METODO: CLICK ASV*/
$(document).on("click", "#btneditarcabecera", function (){
    
    var pscodigo_aleatorio = $("#hdd_scodigo_aleatorio").val();
    console.log("pscodigo_aleatorio: " + pscodigo_aleatorio);
    $.post("../../controller/log_guia.php?op=ctrl_obtener_registro",
        {pscodigo_aleatorio : pscodigo_aleatorio},
        function(data, status){
            data = JSON.parse(data);

            lsguia_hoja_ruta_editar = data.sguia_hoja_ruta;
            ldguia_fecha_recepcion_editar = data.dguia_fecha_recepcion_texto;
            ldguia_fecha_vencimiento_editar = data.dguia_fecha_vencimiento_texto;
            ldguia_fecha_retorno_editar = data.dguia_fecha_retorno_limite_texto;
            lsprioridad_codigo_editar = data.sprioridad_codigo;
            lsguia_licitacion_editar = data.sguia_licitacion;
            lsguia_exclusivo_editar = data.sguia_exclusivo;

            $("#txtsguia_hoja_ruta_editar").val(lsguia_hoja_ruta_editar);
            $("#dtpdguia_fecha_recepcion_editar").val(ldguia_fecha_recepcion_editar);
            $("#dtpdguia_fecha_vencimiento_editar").val(ldguia_fecha_vencimiento_editar);
            $("#dtpdguia_fecha_retorno_editar").val(ldguia_fecha_retorno_editar);
            $('#cmbsprioridad_codigo_editar').val(lsprioridad_codigo_editar).change();
            $('#chksguia_licitacion_editar').prop("checked", (lsguia_licitacion_editar == "1" ? true:false));
            $('#chksguia_exclusivo_editar').prop("checked", (lsguia_exclusivo_editar == "1" ? true:false));

            $('#modalcabeceraeditar').modal('show');

        }
    );
   
});

/*  OBJETO: btnguardarcabecera --------- METODO: CLICK ASV*/
$(document).on("click","#btnguardarcabecera", function(){
    
    var pstipo_documento_codigo = $('#hdd_stipo_documento_codigo').val();
    var psguia_serie = $('#hdd_sguia_serie').val();
    var psguia_correlativo = $('#hdd_sguia_correlativo').val();
    var pscodigo_aleatorio = $('#hdd_scodigo_aleatorio').val();

    var psguia_hoja_ruta_editar = $("#txtsguia_hoja_ruta_editar").val();
    var pdguia_fecha_recepcion_editar = $("#dtpdguia_fecha_recepcion_editar").val();
    var pdguia_fecha_vencimiento_editar = $("#dtpdguia_fecha_vencimiento_editar").val();
    var pdguia_fecha_retorno_limite_editar = $("#dtpdguia_fecha_retorno_editar").val();
    var psprioridad_codigo_editar = $("#cmbsprioridad_codigo_editar").val();
    var psguia_licitacion_editar = ($("#chksguia_licitacion_editar").is( ":checked" ) ? "1": "0");
    var psguia_exclusivo_editar = ($("#chksguia_exclusivo_editar").is( ":checked" ) ? "1": "0");
    
    var psauditoria_usuario = $('#hdd_susuario_codigo').val();
    var psguia_fecha_recepcion_editar      = "";
    var psguia_fecha_vencimiento_editar    = "";
    var psguia_fecha_retorno_limite_editar = "";

    psguia_hoja_ruta_editar = psguia_hoja_ruta_editar.toUpperCase();
    var psguia_fecha_recepcion_editar      = psguia_fecha_recepcion_editar.concat(pdguia_fecha_recepcion_editar.substr(6,4), pdguia_fecha_recepcion_editar.substr(3,2), pdguia_fecha_recepcion_editar.substr(0,2));
    var psguia_fecha_vencimiento_editar    = psguia_fecha_vencimiento_editar.concat(pdguia_fecha_vencimiento_editar.substr(6,4), pdguia_fecha_vencimiento_editar.substr(3,2), pdguia_fecha_vencimiento_editar.substr(0,2));
    var psguia_fecha_retorno_limite_editar = psguia_fecha_retorno_limite_editar.concat(pdguia_fecha_retorno_limite_editar.substr(6,4), pdguia_fecha_retorno_limite_editar.substr(3,2), pdguia_fecha_retorno_limite_editar.substr(0,2));

    console.log("pstipo_documento_codigo : " + pstipo_documento_codigo);
    console.log("psguia_serie : " + psguia_serie);
    console.log("psguia_correlativo : " + psguia_correlativo);

    console.log("psguia_hoja_ruta_editar : " + psguia_hoja_ruta_editar);
    console.log("psguia_fecha_recepcion_editar : " + psguia_fecha_recepcion_editar);
    console.log("psguia_fecha_vencimiento_editar : " + psguia_fecha_vencimiento_editar);
    console.log("psguia_fecha_retorno_limite_editar : " + psguia_fecha_retorno_limite_editar);
    console.log("psprioridad_codigo_editar : " + psprioridad_codigo_editar);
    console.log("psguia_licitacion_editar : " + psguia_licitacion_editar);
    console.log("psguia_exclusivo_editar : " + psguia_exclusivo_editar);

    console.log("pscodigo_aleatorio : " + pscodigo_aleatorio);
    console.log("psauditoria_usuario : " + psauditoria_usuario);

    $.post("../../controller/log_guia.php?op=ctrl_editar_datos_basicos",{
        psguia_hoja_ruta_editar : psguia_hoja_ruta_editar, 
        pdguia_fecha_recepcion_editar : psguia_fecha_recepcion_editar,
        pdguia_fecha_vencimiento_editar : psguia_fecha_vencimiento_editar,
        pdguia_fecha_retorno_limite_editar : psguia_fecha_retorno_limite_editar,
        psprioridad_codigo_editar : psprioridad_codigo_editar,
        psguia_licitacion_editar : psguia_licitacion_editar,
        psguia_exclusivo_editar : psguia_exclusivo_editar,
        pscodigo_aleatorio : pscodigo_aleatorio,
        psauditoria_usuario : psauditoria_usuario
    },function(data, status){
        swal(
            'Editar!',
            'Los cambios se registraron correctamente.',
            'success'
        );
    });

    llenarpaneles(pstipo_documento_codigo, psguia_serie, psguia_correlativo);

    $('#modalcabeceraeditar').modal('hide');
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

function pgvar_cmbsruta_servicio_destino_codigo__init(){
    $("#pgvar_cmbsruta_servicio_destino_codigo").html('');
    $("#pgvar_cmbsruta_servicio_destino_codigo").selectpicker('refresh');
} 

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
    $.post("../../controller/servicio.php?op=ctrl_apr_web_mov_confirma_resumen",function(data, status){
        
        data = JSON.parse(data);
        $('#ntotal_transito').html(data.ntotal_transito);
        $('#nurgente_transito').html(data.nurgente_transito);
        $('#nlicitacion_transito').html(data.nlicitacion_transito);
        $('#ntotal_vencidos').html(data.ntotal_vencidos);
    });
}

$(document).on("click","#btnntotal_transito", function(){
    tblconfirma_vista_data = $('#grdconfirma_vista_data').dataTable({
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
            url: '../../controller/servicio.php?op=ctrl_apr_web_mov_confirma_resumen_01',
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

    $('#paneldatos').hide();
    $('#panelconfirmacion').hide();
    $('#paneldetalle').hide();
    $('#paneldocumento').hide();
    $('#panelincidencia').hide();
    $('#panelproveedor').hide();

});

$(document).on("click","#btnnurgente_transito", function(){
    tblconfirma_vista_data = $('#grdconfirma_vista_data').dataTable({
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
            url: '../../controller/servicio.php?op=ctrl_apr_web_mov_confirma_resumen_02',
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

    $('#paneldatos').hide();
    $('#panelconfirmacion').hide();
    $('#paneldetalle').hide();
    $('#paneldocumento').hide();
    $('#panelincidencia').hide();
    $('#panelproveedor').hide();

});

$(document).on("click","#btnnlicitacion_transito", function(){
    tblconfirma_vista_data = $('#grdconfirma_vista_data').dataTable({
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
            url: '../../controller/servicio.php?op=ctrl_apr_web_mov_confirma_resumen_03',
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

    $('#paneldatos').hide();
    $('#panelconfirmacion').hide();
    $('#paneldetalle').hide();
    $('#paneldocumento').hide();
    $('#panelincidencia').hide();
    $('#panelproveedor').hide();

});

$(document).on("click","#btnntotal_vencidos", function(){
    tblconfirma_vista_data = $('#grdconfirma_vista_data').dataTable({
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
            url: '../../controller/servicio.php?op=ctrl_apr_web_mov_confirma_resumen_04',
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

    $('#paneldatos').hide();
    $('#panelconfirmacion').hide();
    $('#paneldetalle').hide();
    $('#paneldocumento').hide();
    $('#panelincidencia').hide();
    $('#panelproveedor').hide();

});

function grdconfirma_resumen_05__init(){
    tblconfirma_resumen_05 = $('#grdconfirma_resumen_05').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "paging": false,
        searching: false,
        lengthChange: false,
        colReorder: true,
        buttons: [],
        "ajax":{
            url: '../../controller/servicio.php?op=ctrl_apr_web_mov_confirma_resumen_05',
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

    $('#grdconfirma_resumen_05 tbody').on( 'click', 'tr', function () {

        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            tblconfirma_resumen_05.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
    
    $('#paneldatos').hide();
    $('#panelconfirmacion').hide();
    $('#paneldetalle').hide();
    $('#paneldocumento').hide();
    $('#panelincidencia').hide();
    $('#panelproveedor').hide();

}

function grdconfirma_resumen_06__init(){
    tblconfirma_resumen_06 = $('#grdconfirma_resumen_06').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "paging": false,
        searching: false,
        lengthChange: false,
        colReorder: true,
        select: true,
        buttons: [],
        "ajax":{
            url: '../../controller/servicio.php?op=ctrl_apr_web_mov_confirma_resumen_06',
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

    $('#grdconfirma_resumen_06 tbody').on( 'click', 'tr', function () {

        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            tblconfirma_resumen_06.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
 
    $('#paneldatos').hide();
    $('#panelconfirmacion').hide();
    $('#paneldetalle').hide();
    $('#paneldocumento').hide();
    $('#panelincidencia').hide();
    $('#panelproveedor').hide();

}

function confirma_vista(){
    tblconfirma_vista_data = $('#grdconfirma_vista_data').dataTable({
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
            url: '../../controller/servicio.php?op=confirma_vista',
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
    
    tblconfirma_vista_data = $('#grdconfirma_vista_data').dataTable({
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
            url: '../../controller/servicio.php?op=confirma_vista_01',
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

    $('#paneldatos').hide();
    $('#panelconfirmacion').hide();
    $('#paneldetalle').hide();
    $('#paneldocumento').hide();
    $('#panelincidencia').hide();
    $('#panelproveedor').hide();

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
            
    tblconfirma_vista_data = $('#grdconfirma_vista_data').dataTable({
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
            url: '../../controller/servicio.php?op=confirma_vista_02',
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

    $('#paneldatos').hide();
    $('#panelconfirmacion').hide();
    $('#paneldetalle').hide();
    $('#paneldocumento').hide();
    $('#panelincidencia').hide();
    $('#panelproveedor').hide();

});

$(document).on("click","#pgcli_btnbuscar", function(){
    var pstipo_documento_codigo = $('#pgcli_cmbstipo_documento_codigo').val();
    var psdocumento_numero = $('#pgcli_txtsdocumento_numero').val();
    
    tblconfirma_vista_data = $('#grdconfirma_vista_data').dataTable({
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
            url: '../../controller/servicio.php?op=confirma_vista_03',
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

    $('#paneldatos').hide();
    $('#panelconfirmacion').hide();
    $('#paneldetalle').hide();
    $('#paneldocumento').hide();
    $('#panelincidencia').hide();
    $('#panelproveedor').hide();

});

function lstconfirma_resumen_05_vista(pstipo_servicio_codigo, psruta_origen_codigo, psruta_destino_codigo){

    pstipo_servicio_codigo = pstipo_servicio_codigo.toString().replace('/','').slice(0, -1);
    psruta_origen_codigo = psruta_origen_codigo.toString().replace('/','').slice(0, -1);
    psruta_destino_codigo = psruta_destino_codigo.toString().replace('/','').slice(0, -1);

    tblconfirma_vista_data = $('#grdconfirma_vista_data').dataTable({
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
            url: '../../controller/servicio.php?op=ctrl_apr_web_mov_confirma_resumen_05_vista',
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

    $('#paneldatos').hide();
    $('#panelconfirmacion').hide();
    $('#paneldetalle').hide();
    $('#paneldocumento').hide();
    $('#panelincidencia').hide();
    $('#panelproveedor').hide();

};

function lstconfirma_resumen_06_vista(pstipo_servicio_codigo, psruta_origen_codigo, psruta_destino_codigo){

    pstipo_servicio_codigo = pstipo_servicio_codigo.toString().replace('/','').slice(0, -1);
    psruta_origen_codigo = psruta_origen_codigo.toString().replace('/','').slice(0, -1);
    psruta_destino_codigo = psruta_destino_codigo.toString().replace('/','').slice(0, -1);

    tblconfirma_vista_data = $('#grdconfirma_vista_data').dataTable({
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
            url: '../../controller/servicio.php?op=ctrl_apr_web_mov_confirma_resumen_06_vista',
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

    $('#paneldatos').hide();
    $('#panelconfirmacion').hide();
    $('#paneldetalle').hide();
    $('#paneldocumento').hide();
    $('#panelincidencia').hide();
    $('#panelproveedor').hide();

};

function ver(stipo_documento_codigo,sguia_serie,sguia_correlativo){

    var pstipo_documento_codigo = stipo_documento_codigo.toString().replace('/','').slice(0, -1);
    var psguia_serie = sguia_serie.toString().replace('/','').slice(0, -1);
    var psguia_correlativo = sguia_correlativo.toString().replace('/','').slice(0, -1);

    $('#pstipo_documento_codigo').val(pstipo_documento_codigo);
    $('#psguia_serie').val(psguia_serie);
    $('#psguia_correlativo').val(psguia_correlativo);

    $('#hdd_stipo_documento_codigo').val(pstipo_documento_codigo);
    $('#hdd_sguia_serie').val(psguia_serie);
    $('#hdd_sguia_correlativo').val(psguia_correlativo);

    llenarpaneles(pstipo_documento_codigo,psguia_serie,psguia_correlativo);

    $('#paneldatos').show();
    $('#panelconfirmacion').show();
    $('#paneldetalle').show();
    $('#paneldocumento').show();
    $('#panelincidencia').show();
    $('#panelproveedor').show();
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

        $('#hdd_scodigo_aleatorio').val(data.scodigo_aleatorio);
        $('#pssuperior_aleatorio').val(data.scodigo_aleatorio);
        $('#pscliente_codigo').val(data.sremite_cliente_codigo);

        $('#hdd_susuario_codigo').val($('#usercontactocodigox').val());

        $('#sruta_servicio_descripcion').html(data.sruta_servicio_descripcion);
        $('#sguia_fecha_emision_texto').html(data.sguia_fecha_emision_texto);
        $('#sguia_fecha_vencimiento_texto').html(data.sguia_fecha_vencimiento_texto);
        $('#sguia_fecha_retorno_texto').html(data.sguia_fecha_retorno_limite_texto);
        $('#sprioridad_descripcion').html(data.sprioridad_descripcion);

        $('#sguia_licitacion').html(data.sguia_licitacion);
        $('#sguia_exclusivo').html(data.sguia_exclusivo);
        $('#sguia_numero_reporte').html(data.sguia_numero_reporte);
        $('#sguia_estado_descripcion').html(data.sguia_estado_descripcion);
        $('#sguia_hoja_ruta').html(data.sguia_hoja_ruta);

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

    $.post("../../controller/servicio.php?op=consulta_A01_guia_manifiesto",
        {pstipo_documento_codigo:pstipo_documento_codigo,psguia_serie:psguia_serie,psguia_correlativo:psguia_correlativo},function(data, status){
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

function eliminar(stipo_documento_codigo,sguia_serie,sguia_correlativo){
    var pstipo_documento_codigo = stipo_documento_codigo.toString().replace('/','').slice(0, -1);
    var psguia_serie = sguia_serie.toString().replace('/','').slice(0, -1);
    var psguia_correlativo = sguia_correlativo.toString().replace('/','').slice(0, -1);

    swal({
        title: 'Eliminar?',
        text: "¿Esta seguro de eliminar la confirmación del documento?",
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

                // VALIDAR: NO PUEDE ELIMINARSE SI EL DOCUMENTO HA SIDO RETORNADO.
                $.post("../../controller/servicio.php?op=ctrl_apr_web_log_guia_confirma_delete",{pstipo_documento_codigo:pstipo_documento_codigo,psguia_serie:psguia_serie,psguia_correlativo:psguia_correlativo},function(data, status){
                    $('#grdconfirma_vista_data').DataTable().ajax.reload();	
                });

                swal(
                    'Eliminar!',
                    'La confirmación ha sido eliminada...',
                    'success'
                );
            }
    });
}

/*  OBJETO: pstipo_documento_codigo ------ METODO: CHANGE */
$("#pstipo_documento_codigo").change(function(){
    $("#pgdetalle_txtsproducto_descripcion").val("");
    $("#pgdetalle_txtsproducto_descripcion").focus();
});

$(document).on("click","#nuevodetalle", function(){
    $('#modaldetalle').modal('show');
});

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

    psproducto_descripcion = psproducto_descripcion.toUpperCase();

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
});


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


$(document).on("click","#btnguardardocumento", function(){
    var pscliente_codigo = $('#pscliente_codigo').val();
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

    pscliente_guia_numero = pscliente_guia_numero.toUpperCase();

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
        'Producto',
        'El producto se registró correctamente.',
        'success'
    );

});

$(document).on("click","#nuevaincidencia", function(){
    modal_incidencia_objetos__init();
    $('#modalincidencia').modal('show');
});

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
            'Incidencia!',
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
        title: 'Eliminar?',
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

    cmbsguia_incidencia_tipo__init();
    dtpdguia_incidencia_fecha__init();
    $("#txtsguia_incidencia_hora").val(lshora + ":" + lsminutos);
    $("#txtsguia_incidencia_observacion").val("");
    
    $("#cmbsguia_incidencia_tipo").focus();

}

function cmbsguia_incidencia_tipo__init(){
    $("#cmbsguia_incidencia_tipo").html("");
    $("#cmbsguia_incidencia_tipo").append('<option value="1">INTERNA</option>');
    $("#cmbsguia_incidencia_tipo").append('<option value="2">CLIENTE</option>');
    $("#cmbsguia_incidencia_tipo").append('<option value="3">LLAMADA</option>');
    $("#cmbsguia_incidencia_tipo").val('1');
    $("#cmbsguia_incidencia_tipo").selectpicker("refresh");
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

function documento_subir(scodigo_aleatorio){
    
    var lcodigo_aleatorio = scodigo_aleatorio.toString().replace('/','').slice(0, -1)
    $("#hdd_scodigo_aleatorio").val(lcodigo_aleatorio);
    $("#psguia_documento_ruta_web").val("");

    $("#modalsubir").modal("show");

}


$(document).on("click","#btndocumento_subir", function(){

    var lscodigo_aleatorio          = $('#hdd_scodigo_aleatorio').val();
    var lsguia_documento_ruta_web   = $('#psguia_documento_ruta_web').val();  /* OBTENER RUTA DEL MODAL */
    var lscliente_codigo            = $("#pscliente_codigo").val();
    var lsauditoria_usuario         =  $('#usercontactocodigox').val();

    var formData = new FormData();
    formData.append('pscodigo_aleatorio', lscodigo_aleatorio);
    formData.append('pscliente_codigo', lscliente_codigo);
    formData.append('imagen', $('#psguia_documento_ruta_web')[0].files[0]);

    $.ajax({
        url: "../../controller/log_guia_documentos_cliente.php?caso=ctrl_documento_subir",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {

            var pstipo_documento_codigo = $('#pstipo_documento_codigo').val();
            var psguia_serie = $('#psguia_serie').val();
            var psguia_correlativo = $('#psguia_correlativo').val();

            llenarpaneles(pstipo_documento_codigo,psguia_serie,psguia_correlativo);

            $('#modalsubir').modal('hide');

            swal(
                'Aviso!',
                'El documento se subió correctamente al servidor.',
                'success'
            );
        }
    });

});

function eliminarincidencia(scodigo_aleatorio){
    var pscodigo_aleatorio = scodigo_aleatorio.toString().replace('/','').slice(0, -1);
    var psauditoria_usuario =  $('#usercontactocodigox').val();

    swal({
        title: 'Eliminar?',
        text: "Esta seguro de eliminar el registro",
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

/*  OBJETO: cmbsguia_confirma_estado_codigo ------------ METODO: INIT */
function cmbsguia_confirma_estado__init(){
    $("#cmbsguia_confirma_estado").html('');
    $.post("../../controller/arc_tipo_estado.php?caso=ctrl_select", function(data, status){
        $("#cmbsguia_confirma_estado").html(data);
        $("#cmbsguia_confirma_estado").selectpicker('refresh');
    });
}
    
/*  OBJETO: pgdetalle_cbosproducto_codigo --------- METODO: CHANGE */    
$("#pgdetalle_cbosproducto_codigo").change(function(){
    $("#pgdetalle_txtsproducto_descripcion").val("");
    $("#pgdetalle_txtsproducto_descripcion").focus();
});

function pgdocumento_txtstipo_documento_codigo__init(){
    $("#pgdocumento_txtstipo_documento_codigo").html('');
    $.post("../../controller/servicio.php?op=ctrl_apr_web_tipo_documento_select", function(data, status){
        $("#pgdocumento_txtstipo_documento_codigo").html(data);
        $("#pgdocumento_txtstipo_documento_codigo").selectpicker('refresh');
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

/*  OBJETO: dmanifiesto_fecha_salida --------- METODO: INIT */    
function dtpdguia_confirma_fecha__init(){
    $('#dtpdguia_confirma_fecha').datepicker({
        language: "es",
        todayBtn: "linked",
        format: "dd/mm/yyyy",
        multidate: false,
        todayHighlight: true,
        autoclose: true

    }).datepicker("setDate", new Date());
}    

/*  OBJETO: dtpdguia_incidencia_fecha ----------- METODO: INIT */    
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

function mdl_cmbsgrupo_cliente_codigo_editar__init(){
    $("#cmbsgrupo_cliente_codigo_editar").html('');
    $.post("../../controller/arc_grupo_cliente.php?caso=ctrl_select", function(data, status){
        $("#cmbsgrupo_cliente_codigo_editar").html(data);
        $('#cmbsgrupo_cliente_codigo_editar').selectpicker('refresh');
    });
}

function mdl_cmbsdestino_empresa_razon_social_editar__init(){
    $("#cmbsdestino_empresa_razon_social_editar").html('');
    $.post("../../controller/arc_destinatario.php?op=ctrl_select", function(data, status){
        $("#cmbsdestino_empresa_razon_social_editar").html(data);
        $('#cmbsdestino_empresa_razon_social_editar').selectpicker('refresh');
    });
}

function mdl_cmbsprioridad_codigo_editar__init(){
    $("#cmbsprioridad_codigo_editar").html("");
    $.post("../../controller/arc_prioridad.php?caso=ctrl_select", function(data, status){
        $("#cmbsprioridad_codigo_editar").html(data);
        $("#cmbsprioridad_codigo_editar").selectpicker("refresh");
    });
}

/*  OBJETO: dtpdguia_fecha_recepcion_editar ---------- METODO: INIT */    
function mdl_dtpdguia_fecha_recepcion_editar__init(){
    $("#dtpdguia_fecha_recepcion_editar").datepicker({
        language: "es",
        todayBtn: "linked",
        format: "dd/mm/yyyy",
        multidate: false,
        todayHighlight: true,
        autoclose: true,

    }).datepicker("setDate", new Date());

}

/*  OBJETO: dtpdguia_fecha_vencimiento_editar ---------- METODO: INIT */    
function mdl_dtpdguia_fecha_vencimiento_editar__init(){
    $("#dtpdguia_fecha_vencimiento_editar").datepicker({
        language: "es",
        todayBtn: "linked",
        format: "dd/mm/yyyy",
        multidate: false,
        todayHighlight: true,
        autoclose: true,

    }).datepicker("setDate", new Date());
}    

/*  OBJETO: dtpdguia_fecha_retorno ---------- METODO: INIT */    
function mdl_dtpdguia_fecha_retorno_editar__init(){
    $("#dtpdguia_fecha_retorno_editar").datepicker({
        language: "es",
        todayBtn: "linked",
        format: "dd/mm/yyyy",
        multidate: false,
        todayHighlight: true,
        autoclose: true,

    }).datepicker("setDate", new Date());
}  

function modal_confirma_objetos__init(){

    var dfecha = new Date();
    var lshora = dfecha.getHours();
    var lsminutos = dfecha.getMinutes();

    lshora = lshora = (lshora < 10 ? '0' : '') + lshora;
    lsminutos = lsminutos = (lsminutos < 10 ? '0' : '') + lsminutos;


    $("#txtsguia_confirma_persona").val("");
    $("#txtsguia_confirma_persona_documento").val("");
    dtpdguia_confirma_fecha__init();
    $("#txtsguia_confirma_hora").val(lshora + ":" + lsminutos);
    $("#spnsguia_confirma_veces_visita").val(1);
    $("#cbosguia_confirma_estado").val("");
    $("#txtsguia_confirma_observacion").val("");
    
    $("#txtsguia_confirma_persona").focus();

}

function modal_confirma(stipo_documento_codigo,sguia_serie,sguia_correlativo,pssuperior_aleatorio){
    var pstipo_documento_codigo = stipo_documento_codigo.toString().replace('/','').slice(0, -1);
    var psguia_serie = sguia_serie.toString().replace('/','').slice(0, -1);
    var psguia_correlativo = sguia_correlativo.toString().replace('/','').slice(0, -1);
    var pssuperior_aleatorio = pssuperior_aleatorio.toString().replace('/','').slice(0, -1);

    $('#pstipo_documento_codigo').val(pstipo_documento_codigo);
    $('#psguia_serie').val(psguia_serie);
    $('#psguia_correlativo').val(psguia_correlativo);
    $('#pssuperior_aleatorio').val(pssuperior_aleatorio);

    $.post("../../controller/log_guia.php?op=ctrl_obtener_registro",{
        pscodigo_aleatorio:pssuperior_aleatorio},
        function(data, status){
        data = JSON.parse(data);
        var lsguia_estado = data.sguia_estado;
        if (lsguia_estado == '01') {
            modal_confirma_objetos__init();
            $("#modalconfirma").modal("show");
            $("#lbltitle").html("CONFIRMACION : " + psguia_serie +"-"+ psguia_correlativo);
        }
        else{
            swal(
                'Aviso!',
                'No puede confirmar nuevamente el documento.',
                'success'
            );
        };
    });
}

$(document).on("click","#btnguardarconfirmacion", function(){
    
    var pstipo_documento_codigo = $('#pstipo_documento_codigo').val();
    var psguia_serie = $('#psguia_serie').val();
    var psguia_correlativo = $('#psguia_correlativo').val();
    
    var psguia_confirma_persona = $('#txtsguia_confirma_persona').val();
    var psguia_confirma_persona_documento =  $('#txtsguia_confirma_persona_documento').val();
    var pdguia_confirma_fecha = $('#dtpdguia_confirma_fecha').val();
    var psguia_confirma_hora = $('#txtsguia_confirma_hora').val();
    var psguia_confirma_veces_visita = $('#spnsguia_confirma_veces_visita').val();
    var psguia_confirma_estado = $('#cmbsguia_confirma_estado').val();
    var psguia_confirma_observacion = $('#txtsguia_confirma_observacion').val();

    var pscodigo_aleatorio = "";
    var pssuperior_aleatorio = $('#pssuperior_aleatorio').val();
    var psauditoria_usuario =  $('#usercontactocodigox').val();

    psguia_confirma_persona = psguia_confirma_persona.toUpperCase();
    psguia_confirma_persona_documento = psguia_confirma_persona_documento.toUpperCase();
    pdguia_confirma_fecha = pdguia_confirma_fecha.split(" ")[0].split("/").reverse().join("-");
    psguia_confirma_hora = psguia_confirma_hora + ":00";
    var psguia_confirma_fecha = pdguia_confirma_fecha + " " + psguia_confirma_hora;
    psguia_confirma_observacion = psguia_confirma_observacion.toUpperCase();

    console.log("pstipo_documento_codigo: " + pstipo_documento_codigo);
    console.log("psguia_serie: " + psguia_serie);
    console.log("psguia_correlativo: " + psguia_correlativo);

    console.log("psguia_confirma_persona: " + psguia_confirma_persona);
    console.log("psguia_confirma_persona_documento: " + psguia_confirma_persona_documento);
    console.log("psguia_confirma_fecha: " + psguia_confirma_fecha);
    console.log("psguia_confirma_veces_visita: " + psguia_confirma_veces_visita);
    console.log("psguia_confirma_estado: " + psguia_confirma_estado);
    console.log("psguia_confirma_observacion: " + psguia_confirma_observacion);

    console.log("pssuperior_aleatorio: " + pssuperior_aleatorio);
    console.log("psauditoria_usuario: " + psauditoria_usuario);


    $.post("../../controller/servicio.php?op=ctrl_apr_web_log_guia_confirma_insert",{
        pstipo_documento_codigo:pstipo_documento_codigo,
        psguia_serie:psguia_serie,
        psguia_correlativo:psguia_correlativo,
        psguia_confirma_persona : psguia_confirma_persona,
        psguia_confirma_persona_documento : psguia_confirma_persona_documento,
        psguia_confirma_fecha : psguia_confirma_fecha,
        psguia_confirma_veces_visita : psguia_confirma_veces_visita,
        psguia_confirma_estado: psguia_confirma_estado,
        psguia_confirma_observacion : psguia_confirma_observacion,
        pscodigo_aleatorio : pscodigo_aleatorio,
        pssuperior_aleatorio : pssuperior_aleatorio,
        psauditoria_usuario : psauditoria_usuario
    },function(data, status)
    {
        $('#grdconfirma_vista_data').DataTable().ajax.reload();	

        llenarpaneles(pstipo_documento_codigo,psguia_serie,psguia_correlativo);

        $('#modalconfirma').modal('hide');
    
        swal(
            'Confirmación!',
            'El documento se confirmó correctamente.',
            'success'
        );
    
    });

    
});

init();