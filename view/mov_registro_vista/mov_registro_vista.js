
function init(){

}

$(document).ready(function(){
    pgdoc_cmbstipo_documento_codigo__init();
    pgvar_cmbstipo_servicio_codigo__init();
    pgvar_cmbsruta_servicio_destino_codigo__init();
    pgvar_cmbsgrupo_cliente_codigo__init();
    pgvar_dtpdfecha_inicial__init();
    pgvar_dtpdfecha_final__init();
    //AnderCode 09/11/2020
    registro_vista();
    //AnderCode 15/11/2020
    $('#paneldatos').hide();
    $('#paneldetalle').hide();
    $('#paneldocumento').hide();
    $('#panelproveedor').hide();
    //AnderCode 19/11/2020
    pgdetalle_cbosproducto_codigo__init();
    pgdocumento_txtstipo_documento_codigo__init();
    fxpgmanifiesto_cmbsagente_codigo__init();
    fxpgmanifiesto_cmbstipo_servicio_codigo__init();
    fxpgmanifiesto_cmbsruta_servicio_codigo__init();
    fxpgmanifiesto_cmbsproveedor_codigo__init();
    fxpgmanifiesto_cmbstipo_transporte_codigo__init();
    dtpdmanifiesto_fecha_salida__init();

    mdl_cmbsgrupo_cliente_codigo_editar__init();
    mdl_cmbsdestino_empresa_razon_social_editar__init();
    mdl_cmbsprioridad_codigo_editar__init();
    mdl_dtpdguia_fecha_recepcion_editar__init();
    mdl_dtpdguia_fecha_vencimiento_editar__init();
    mdl_dtpdguia_fecha_retorno_editar__init();

    pgdetalle_cbosproducto_codigo_edit__init();

    $("#pgmanifiesto_cmbstipo_servicio_codigo2").change(function(){
        $("#pgmanifiesto_cmbsruta_servicio_codigo2").html('');
        $('#pgmanifiesto_cmbsruta_servicio_codigo2').selectpicker('refresh');
        $("#pgmanifiesto_cmbstipo_servicio_codigo2 option:selected").each(function () {
            lstipo_servicio_codigo = $(this).val();
            $.post("../../controller/servicio.php?op=ctrl_apr_web_ruta_servicio_select", {pstipo_servicio_codigo : lstipo_servicio_codigo}, function(data, status){
                $("#pgmanifiesto_cmbsruta_servicio_codigo2").html(data);
                $('#pgmanifiesto_cmbsruta_servicio_codigo2').selectpicker('refresh');
             });
        });
    });
    
    tblregistro_vista_data = $('#grdregistro_vista_data').dataTable();
    $('#grdregistro_vista_data tbody').on( 'click', 'tr', function () {

        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            tblregistro_vista_data.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );


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

/*  OBJETO: pgdoc_cmbstipo_documento_codigo METODO: CHANGE */
$("#pgdoc_cmbstipo_documento_codigo").change(function(){
    $("#pgdoc_txtsguia_serie").val("");
    $("#pgdoc_txtsguia_serie").focus();
});

 
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

/*OBJETO: pgvar_cmbsgrupo_cliente_codigo
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


/*  OBJETO: pgreg_btnnuevo ----------   METODO: CLICK */
$(document).on("click","#pgreg_btnnuevo", function(){
    location.href = "../../view/mov_registro/";
});

/*  OBJETO: pgdoc_btnlimpiar ---------- METODO: CLICK */
$(document).on("click","#pgdoc_btnlimpiar", function(){
    pgdoc_cmbstipo_documento_codigo__init();
    $('#pgdoc_txtsguia_serie').val("");
    $('#pgdoc_txtsguia_correlativo').val("");
    $('#pgdoc_cmbstipo_documento_codigo').focus();
});

/*  OBJETO: pgvar_btnlimpiar --------- METODO: CLICK */
$(document).on("click","#pgvar_btnlimpiar", function(){
    pgvar_cmbstipo_servicio_codigo__init();
    pgvar_cmbsruta_servicio_destino_codigo__init();
    pgvar_cmbsgrupo_cliente_codigo__init();
    pgvar_dtpdfecha_inicial__init();
    pgvar_dtpdfecha_final__init();
    $('#pgvar_txtsguia_hoja_ruta').val("");
    $('#pgvar_cmbstipo_servicio_codigo').focus();
});

/*  OBJETO: btneditarcabecera --------- METODO: CLICK */
$(document).on("click", "#btneditarcabecera", function (){
    $('#modalcabeceraeditar').modal('show');
});

/*  OBJETO: btneditarremitente --------- METODO: CLICK ASV*/
$(document).on("click", "#btneditarremitente", function (){
    
    var pscodigo_aleatorio = $("#hdd_scodigo_aleatorio").val();

    $.post("../../controller/log_guia.php?op=ctrl_obtener_registro",
        {pscodigo_aleatorio : pscodigo_aleatorio},
        function(data, status){
            data = JSON.parse(data);
            
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



/*  OBJETO: cmbsgrupo_cliente_codigo METODO: CHANGE  */
$("#cmbsgrupo_cliente_codigo_editar").change(function(){

    $("#cmbsremite_cliente_codigo_editar").html("");
    $("#txtsremite_cliente_direccion_editar").val("");
    $("#cmbsremite_departamento_codigo_editar").html("");
    $("#cmbsremite_departamento_codigo_editar").selectpicker("refresh");
    $("#cmbsremite_provincia_codigo_editar").html("");
    $("#cmbsremite_provincia_codigo_editar").selectpicker("refresh");
    $("#cmbsremite_distrito_codigo_editar").html("");
    $("#cmbsremite_distrito_codigo_editar").selectpicker("refresh");

    $("#cmbsgrupo_cliente_codigo_editar option:selected").each(function () {
        lsgrupo_cliente_codigo = $("#cmbsgrupo_cliente_codigo_editar").val();
        $.post("../../controller/servicio.php?op=ctrl_apr_web_remitente_select", 
            {psgrupo_cliente_codigo : lsgrupo_cliente_codigo}, 
            function(data, status){
                $("#cmbsremite_cliente_codigo_editar").html(data);
                $("#cmbsremite_cliente_codigo_editar").selectpicker("refresh");
            }
        );
    });

});

/*  OBJETO: cmbsremite_cliente_codigo_editar   METODO: CHANGE  */
$("#cmbsremite_cliente_codigo_editar").change(function(){
    
    lsgrupo_cliente_codigo = $("#cmbsgrupo_cliente_codigo_editar").val();
    
    $("#txtsremite_cliente_direccion_editar").val("");
    $("#cmbsremite_departamento_codigo_editar").html("");
    $("#cmbsremite_provincia_codigo_editar").html("");
    $("#cmbsremite_distrito_codigo_editar").html("");

    $("#cmbsremite_cliente_codigo_editar option:selected").each(function () {
        lsremite_cliente_codigo = $("#cmbsremite_cliente_codigo_editar").val();

        $.post("../../controller/servicio.php?op=ctrl_apr_web_remitente_obtener_registro", 
            {psgrupo_cliente_codigo : lsgrupo_cliente_codigo, 
            psremite_cliente_codigo : lsremite_cliente_codigo},
            function(data, status){
                data = JSON.parse(data);

                lscliente_direccion = data.scliente_direccion;
                lsremite_departamento_codigo = data.sdepartamento_codigo;
                lsremite_provincia_codigo = data.sprovincia_codigo;
                lsremite_distrito_codigo = data.sdistrito_codigo;
                
                $("#cmbsremite_departamento_codigo_editar").html("");
                $.post("../../controller/servicio.php?op=ctrl_apr_web_ubigeo_dpto_select", 
                    {}, 
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

                $("#txtsremite_cliente_direccion_editar").val(lscliente_direccion);
                $('#txtsremite_atencion_editar').focus();

            $("#txtsremite_atencion").focus();
                
        });
    });

});



/*  OBJETO: btneditardestinatario --------- METODO: CLICK */
$(document).on("click", "#btneditardestinatario", function (){
    $('#modaldestinatarioeditar').modal('show');
});





/*  OBJETO: pgdoc_txtsguia_serie -----------  METODO: ONBLUR */
function pgdoc_txtsguia_serie__onblur(pobjeto){
    while (pobjeto.value.length<3) 
        pobjeto.value = '0'+pobjeto.value;
}  
/* OBJETO: pgdoc_txtscorrelativo_serie ----------- METODO: ONBLUR */
function pgdoc_txtsguia_correlativo__onblur(pobjeto){
    while (pobjeto.value.length<6) 
        pobjeto.value = '0'+pobjeto.value;
}



/*  OBJETO: cmbstipo_servicio_codigo ----------- METODO: CHANGE */    
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

/*  OBJETO: pgvar_cmbsruta_servicio_destino_codigo ---------- METODO: INIT */
function pgvar_cmbsruta_servicio_destino_codigo__init(){
    $("#pgvar_cmbsruta_servicio_destino_codigo").html('');
    $("#pgvar_cmbsruta_servicio_destino_codigo").selectpicker('refresh');
}  

/*  OBJETO: pgvar_dtpdfecha_inicial ---------- METODO: INIT */
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

/*  OBJETO: pgvar_dtpdfecha_final ---------- METODO: INIT */
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

/*  OBJETO: dmanifiesto_fecha_salida ---------- METODO: INIT
*/    
function dtpdmanifiesto_fecha_salida__init(){
    $('#pgmanifiesto_dtpdmanifiesto_fecha_salida2').datepicker({
        language: "es",
        todayBtn: "linked",
        format: "dd/mm/yyyy",
        multidate: false,
        todayHighlight: true,
        autoclose: true

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

function registro_vista(){
    tabla_registro_vista=$('#grdregistro_vista_data').dataTable({
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
            url: '../../controller/servicio.php?op=registro_vista',
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
    
    tabla_registro_vista=$('#grdregistro_vista_data').dataTable({
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
            url: '../../controller/servicio.php?op=registro_vista_01',
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

$(document).on("click","#pgvar_btnbuscar", function(){

    var pstipo_servicio_codigo = $('#pgvar_cmbstipo_servicio_codigo').val();
    var psruta_servicio_destino_codigo = $('#pgvar_cmbsruta_servicio_destino_codigo').val();
    var psgrupo_cliente_codigo = $('#pgvar_cmbsgrupo_cliente_codigo').val();
    var pdfecha_recepcion_inicial = $('#pgvar_dtpdfecha_inicial').val();
    var pdfecha_recepcion_final = $('#pgvar_dtpdfecha_final').val();
    var psguia_hoja_ruta = $('#pgvar_txtsguia_hoja_ruta').val();
    
    var psfecha_recepcion_inicial = '';
    var psfecha_recepcion_final = '';

    psfecha_recepcion_inicial   = psfecha_recepcion_inicial.concat(pdfecha_recepcion_inicial.substr(6,4), pdfecha_recepcion_inicial.substr(3,2), pdfecha_recepcion_inicial.substr(0,2));
    psfecha_recepcion_final     = psfecha_recepcion_final.concat(pdfecha_recepcion_final.substr(6,4), pdfecha_recepcion_final.substr(3,2), pdfecha_recepcion_final.substr(0,2));

    //VALIDAR RANGO DE FECHAS
            
    tabla_registro_vista=$('#grdregistro_vista_data').dataTable({
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
            url: '../../controller/servicio.php?op=registro_vista_02',
            type : "post",
            dataType : "json",
            data:{
                    pstipo_servicio_codigo:pstipo_servicio_codigo,
                    psruta_servicio_destino_codigo:psruta_servicio_destino_codigo,
                    psgrupo_cliente_codigo:psgrupo_cliente_codigo,
                    psfecha_recepcion_inicial:psfecha_recepcion_inicial,
                    psfecha_recepcion_final:psfecha_recepcion_final,
                    psguia_hoja_ruta:psguia_hoja_ruta
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
});

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
    $('#paneldetalle').show();
    $('#paneldocumento').show();
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
        $('#hdd_pgdetalle_scodigo_aleatorio').val(data.scodigo_aleatorio);
        
        $('#hdd_scodigo_aleatorio').val(data.scodigo_aleatorio);
        $('#pssuperior_aleatorio').val(data.scodigo_aleatorio);

        $('#hdd_susuario_codigo').val($('#usercontactocodigox').val());

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
        $('#sguia_hoja_ruta').html(data.sguia_hoja_ruta);
        
    });

    $.post("../../controller/servicio.php?op=consulta_A01_guia_detalle",{pstipo_documento_codigo:pstipo_documento_codigo,psguia_serie:psguia_serie,psguia_correlativo:psguia_correlativo},function(data, status){
        $("#grdproducto_detalle_data").html(data);
    });

    $.post("../../controller/servicio.php?op=consulta_A01_guia_documento",{pstipo_documento_codigo:pstipo_documento_codigo,psguia_serie:psguia_serie,psguia_correlativo:psguia_correlativo},function(data, status){
        $("#grd_documentos_cliente_data").html(data);
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

function eliminar(stipo_documento_codigo,sguia_serie,sguia_correlativo, scodigo_aleatorio){
    var pstipo_documento_codigo = stipo_documento_codigo.toString().replace('/','').slice(0, -1);
    var psguia_serie = sguia_serie.toString().replace('/','').slice(0, -1);
    var psguia_correlativo = sguia_correlativo.toString().replace('/','').slice(0, -1);
    var pscodigo_aleatorio = scodigo_aleatorio.toString().replace('/','').slice(0, -1);

    var psauditoria_usuario =  $('#usercontactocodigox').val();

    swal({
        title: 'Eliminar?',
        text: "Esta seguro de eliminar el Registro",
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

            /** SI ES CONFIRMADO, RETORNADO, CON PRECIO O FINALIZADO ENTONCES NO DEBE ELIMINAR */
            $.post("../../controller/log_guia.php?op=ctrl_obtener_registro",{pscodigo_aleatorio:pscodigo_aleatorio},function(data, status){
                data = JSON.parse(data);
                var lsguia_estado = data.sguia_estado;
                if (lsguia_estado == '01') {

                    $.post("../../controller/servicio.php?op=log_guia_delete",{pstipo_documento_codigo:pstipo_documento_codigo,psguia_serie:psguia_serie,psguia_correlativo:psguia_correlativo, psauditoria_usuario:psauditoria_usuario},function(data, status){
                        $('#grdregistro_vista_data').DataTable().ajax.reload();

                        swal(
                            'Eliminar!',
                            'El registro se eliminó correctamente.',
                            'success'
                        );
            
                        $('#paneldatos').hide();
                        $('#paneldetalle').hide();
                        $('#paneldocumento').hide();
                        $('#panelproveedor').hide();
    
                    });
                }
                else
                {
                    swal(
                        'Aviso!',
                        'No puede eliminar el documento que encuentra confirmado.',
                        'success'
                    );
                };
            });
        }
    });
}

$(document).on("click","#nuevodetalle", function(){
    modal_detalle_objetos__init();
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


function modal_detalle_objetos__init(){
    pgdetalle_cbosproducto_codigo__init();

    $('#pgdetalle_txtsproducto_descripcion').val("");
    $('#pgdetalle_spnnproducto_cantidad').val(0);
    $('#pgdetalle_spnnproducto_peso').val(0);
    $('#pgdetalle_spnnproducto_costo').val(0);
    $('#pgdetalle_txtsproducto_unidad').val("");
    
}


$(document).on("click","#nuevodocumento", function(){
    modal_documento_cliente_objetos__init
    $('#modaldocumento').modal('show');
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
});

function modal_documento_cliente_objetos__init(){
    pgdocumento_txtstipo_documento_codigo__init();
    $('#pgdocumento_txtscliente_guia_numero').val("");
}


$(document).on("click","#editarrepresentante", function(){
    $('#modalrepresentante').modal('show');
});

$(document).on("click","#btnguardarrepresentante", function(){
    var pstipo_documento_codigo = $('#pstipo_documento_codigo').val();
    var psguia_serie = $('#psguia_serie').val();
    var psguia_correlativo = $('#psguia_correlativo').val();
    var psagente_codigo = $('#pgmanifiesto_cmbsagente_codigo2').val();

    console.log("psagente_codigo: " + psagente_codigo);

    $.post("../../controller/servicio.php?op=manifiesto_rpte_update",{
        pstipo_documento_codigo:pstipo_documento_codigo,
        psguia_serie:psguia_serie,
        psguia_correlativo:psguia_correlativo,
        psagente_codigo:psagente_codigo
    },function(data, status){
        swal(
            'Editar!',
            'El registro se edito correctamente.',
            'success'
        );
    });

    llenarpaneles(pstipo_documento_codigo,psguia_serie,psguia_correlativo);

    $('#modalrepresentante').modal('hide');
});

$(document).on("click","#editarproveedor", function(){
    $('#modalproveedor').modal('show');
});


$(document).on("click","#btnguardarproveedor", function(){
    var pstipo_documento_codigo = $('#pstipo_documento_codigo').val();
    var psguia_serie = $('#psguia_serie').val();
    var psguia_correlativo = $('#psguia_correlativo').val();
    var psproveedor_codigo = $('#pgmanifiesto_cmbsproveedor_codigo2').val();
    var pstipo_transporte_codigo = $('#pgmanifiesto_cmbstipo_transporte_codigo2').val();
    var pdmanifiesto_fecha_salida = $('#pgmanifiesto_dtpdmanifiesto_fecha_salida2').val();//2020-11-18 15:33:00'
    var pnmanifiesto_dias_transito = $('#pgmanifiesto_spnnmanifiesto_dias_transito2').val();
    var psmanifiesto_despachador = $('#pgmanifiesto_txtsmanifiesto_despachador2').val();
    var psmanifiesto_proveedor_documento = $('#pgmanifiesto_txtsmanifiesto_proveedor_documento2').val();
    
    var psauditoria_usuario = $('#usercontactocodigox').val();

    var psmanifiesto_fecha_salida = '';

    psmanifiesto_fecha_salida      = psmanifiesto_fecha_salida.concat(pdmanifiesto_fecha_salida.substr(6,4), pdmanifiesto_fecha_salida.substr(3,2), pdmanifiesto_fecha_salida.substr(0,2));

    console.log("pstipo_documento_codigo : " + pstipo_documento_codigo);
    console.log("psguia_serie : " + psguia_serie);
    console.log("psguia_correlativo : " + psguia_correlativo);
    console.log("psproveedor_codigo : " + psproveedor_codigo);
    console.log("pstipo_transporte_codigo : " + pstipo_transporte_codigo);
    console.log("psmanifiesto_fecha_salida : " + psmanifiesto_fecha_salida);
    console.log("pnmanifiesto_dias_transito : " + pnmanifiesto_dias_transito);
    console.log("psmanifiesto_despachador : " + psmanifiesto_despachador);
    console.log("psmanifiesto_proveedor_documento : " + psmanifiesto_proveedor_documento);
    console.log("psauditoria_usuario : " + psauditoria_usuario);


    $.post("../../controller/servicio.php?op=manifiesto_prov_update",{
        pstipo_documento_codigo : pstipo_documento_codigo, 
        psguia_serie : psguia_serie,
        psguia_correlativo : psguia_correlativo,
        psproveedor_codigo : psproveedor_codigo,
        pstipo_transporte_codigo : pstipo_transporte_codigo,
        psmanifiesto_fecha_salida : psmanifiesto_fecha_salida,
        pnmanifiesto_dias_transito : pnmanifiesto_dias_transito,
        psmanifiesto_despachador : psmanifiesto_despachador,
        psmanifiesto_proveedor_documento : psmanifiesto_proveedor_documento,
        psauditoria_usuario : psauditoria_usuario
    },function(data, status){
        swal(
            'Editar!',
            'El registro se editó correctamente.',
            'success'
        );
    });

    llenarpaneles(pstipo_documento_codigo,psguia_serie,psguia_correlativo);

    $('#modalproveedor').modal('hide');
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
                $.post("../../controller/servicio.php?op=guia_detalle_delete",
                    {pscodigo_aleatorio:pscodigo_aleatorio,
                    psauditoria_usuario:psauditoria_usuario},
                    function(data, status){
                    
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

init();