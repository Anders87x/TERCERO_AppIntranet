var detalles = [];
var documentos = [];

function init() {
   
}

$(document).ready(function(){

    cmbstipo_documento_codigo__inicializar();
    cmbsgrupo_cliente_codigo__inicializar();

    pgdocumento_txtstipo_documento_codigo__inicializar();
    pgmanifiesto_cmbsagente_codigo__inicializar();
    pgmanifiesto_cmbsproveedor_codigo__inicializar();
    pgmanifiesto_cmbstipo_transporte_codigo__inicializar();
    
    dtpdguia_fecha_recepcion__inicializar();
    dtpdguia_fecha_vencimiento__inicializar();
    dtpdguia_fecha_retorno__inicializar();
    dtpdmanifiesto_fecha_salida__inicializar();

    cmbsdestino_departamento_codigo__inicializar();
    
    pgdetalle_cbosproducto_codigo__inicializar();
    cmbsdestino_empresa_razon_social__inicializar();

    pgmanifiesto_cmbstipo_transporte_codigo__inicializar();
    
    tabla_documento = $("#pgdocumento_grddata").dataTable();
    tabla_detalles = $("#detalle_data").dataTable();

    var lssuperior_aleatorio = Math.random().toString(36).substr(2, 10);
    lssuperior_aleatorio = lssuperior_aleatorio.toUpperCase();
    console.log(lssuperior_aleatorio);

    var lscodigo_aleatorio = Math.random().toString(36).substr(2, 10);
    lscodigo_aleatorio = lscodigo_aleatorio.toUpperCase();
    console.log(lscodigo_aleatorio);

    $.post("../../controller/servicio.php?op=guia_insert_buffer", function(data, status){
        data = JSON.parse(data);
        $("#ID_GUIA").val(data.scodigo_aleatorio);
        console.log(data.scodigo_aleatorio);

        $.post("../../controller/servicio.php?op=manifiesto_insert_buffer",{pssuperior_aleatorio : data.scodigo_aleatorio}, function(data, status){
            data = JSON.parse(data);
            $("#ID_MANIFIESTO").val(data.scodigo_aleatorio);
        });

    });

    cmbsprioridad_codigo__inicializar();
    
    /*  OBJETO: cmbsgrupo_cliente_codigo
        METODO: INIT
    */
    function cmbsgrupo_cliente_codigo__inicializar(){
        $("#cmbsgrupo_cliente_codigo").html("");
        $.post("../../controller/servicio.php?op=ctrl_apr_web_grupo_cliente_select", function(data, status){
            $("#cmbsgrupo_cliente_codigo").html(data);
            $("#cmbsgrupo_cliente_codigo").selectpicker("refresh");
        });
    }

    /*  OBJETO: pgdocumento_txtstipo_documento_codigo METODO: CHANGE */
    $("#pgdocumento_txtstipo_documento_codigo").change(function(){
        $("#pgdocumento_txtscliente_guia_numero").val("");
        $("#pgdocumento_txtscliente_guia_numero").focus();
    });

    /*  OBJETO: cmbsgrupo_cliente_codigo METODO: CHANGE  */
    $("#cmbsgrupo_cliente_codigo").change(function(){

        $("#cmbsremite_cliente_codigo").html("");
        $("#txtsremite_cliente_direccion").val("");
        $("#cmbsremite_departamento_codigo").html("");
        $("#cmbsremite_departamento_codigo").selectpicker("refresh");
        $("#cmbsremite_provincia_codigo").html("");
        $("#cmbsremite_provincia_codigo").selectpicker("refresh");
        $("#cmbsremite_distrito_codigo").html("");
        $("#cmbsremite_distrito_codigo").selectpicker("refresh");

        /* $("#cmbsremite_cliente_codigo").selectpicker("refresh"); */
        $("#cmbsgrupo_cliente_codigo option:selected").each(function () {
            lsgrupo_cliente_codigo = $("#cmbsgrupo_cliente_codigo").val();
            $.post("../../controller/servicio.php?op=ctrl_apr_web_remitente_select", {psgrupo_cliente_codigo : lsgrupo_cliente_codigo}, function(data, status){
                $("#cmbsremite_cliente_codigo").html(data);
                $("#cmbsremite_cliente_codigo").selectpicker("refresh");
             });
        });
    });

    /*  OBJETO: cmbsremite_cliente_codigo   METODO: CHANGE - ALDO   */
    $("#cmbsremite_cliente_codigo").change(function(){
        var lsgrupo_cliente_codigo = "";
        $("#cmbsgrupo_cliente_codigo option:selected").each(function () {
            lsgrupo_cliente_codigo = $("#cmbsgrupo_cliente_codigo").val();
        });
        
        $("#txtsremite_cliente_direccion").val("");
        $("#cmbsremite_departamento_codigo").html("");
        $("#cmbsremite_provincia_codigo").html("");
        $("#cmbsremite_distrito_codigo").html("");

        /* $("#cmbsremite_departamento_codigo").selectpicker("refresh"); */


        $("#cmbsremite_cliente_codigo option:selected").each(function () {
            lsremite_cliente_codigo = $("#cmbsremite_cliente_codigo").val();
            console.log("lsgrupo_cliente_codigo: " + lsgrupo_cliente_codigo);
            console.log("lsremite_cliente_codigo: " + lsremite_cliente_codigo);

            $.post("../../controller/servicio.php?op=ctrl_apr_web_remitente_obtener_registro", {psgrupo_cliente_codigo : lsgrupo_cliente_codigo, psremite_cliente_codigo : lsremite_cliente_codigo}, function(data, status){
                data = JSON.parse(data);

                lscliente_direccion = data.scliente_direccion;
                lsdepartamento_codigo = data.sdepartamento_codigo;
                lsprovincia_codigo = data.sprovincia_codigo;
                lsdistrito_codigo = data.sdistrito_codigo;
                
                $("#txtsremite_cliente_direccion").val(lscliente_direccion);

                $.post("../../controller/servicio.php?op=ctrl_apr_web_ubigeo_dpto_select", function(data, status){
                    $("#cmbsremite_departamento_codigo").html(data);
                    $("#cmbsremite_departamento_codigo").val(lsdepartamento_codigo);
                    $("#cmbsremite_departamento_codigo").selectpicker("refresh");
                });
        
                
                $("#cmbsremite_provincia_codigo").selectpicker("refresh");
                $.post("../../controller/servicio.php?op=ctrl_apr_web_ubigeo_prov_select",{psdepartamento_codigo : lsdepartamento_codigo}, function(data, status){
                    $("#cmbsremite_provincia_codigo").html(data);
                    $("#cmbsremite_provincia_codigo").val(lsprovincia_codigo);
                    $("#cmbsremite_provincia_codigo").selectpicker("refresh");
                });
                        
                
                $("#cmbsremite_distrito_codigo").selectpicker("refresh");
                $.post("../../controller/servicio.php?op=ctrl_apr_web_ubigeo_dist_select",{psprovincia_codigo : lsprovincia_codigo}, function(data, status){
                    $("#cmbsremite_distrito_codigo").html(data);
                    $("#cmbsremite_distrito_codigo").val(lsdistrito_codigo);
                    $("#cmbsremite_distrito_codigo").selectpicker("refresh");
                });

                $("#txtsremite_atencion").focus();
                   
            });
        });
    });

    /*  OBJETO: cmbsremite_departamento_codigo METODO: INIT */
    function cmbsremite_departamento_codigo__inicializar(){
        $("#cmbsremite_departamento_codigo").html("");
        $("#cmbsremite_departamento_codigo").selectpicker("refresh");
        $.post("../../controller/servicio.php?op=ctrl_apr_web_ubigeo_dpto_select", function(data, status){
            $("#cmbsremite_departamento_codigo").html(data);
            $("#cmbsremite_departamento_codigo").selectpicker("refresh");
        });
    }

    /*  OBJETO: cmbsremite_provincia_codigo METODO: INIT */
    function cmbsremite_provincia_codigo__inicializar(psdepartamento_codigo){
        $("#cmbsremite_provincia_codigo").html("");
        $("#cmbsremite_provincia_codigo").selectpicker("refresh");
        $.post("../../controller/servicio.php?op=ctrl_apr_web_ubigeo_prov_select",{psdepartamento_codigo : psdepartamento_codigo}, function(data, status){
            $("#cmbsremite_provincia_codigo").html(data);
            $("#cmbsremite_provincia_codigo").selectpicker("refresh");
        });
    }

    /*  OBJETO: cmbsremite_distrito_codigo
        METODO: INIT
    */
    function cmbsremite_distrito_codigo__inicializar(psprovincia_codigo){
        $("#cmbsremite_distrito_codigo").html("");
        $("#cmbsremite_distrito_codigo").selectpicker("refresh");
        $.post("../../controller/servicio.php?op=ctrl_apr_web_ubigeo_dist_select",{psprovincia_codigo : psprovincia_codigo}, function(data, status){
        $("#cmbsremite_distrito_codigo").html(data);
        $("#cmbsremite_distrito_codigo").selectpicker("refresh");
    });
    }    
    /*  OBJETO: cmbstipo_documento_codigo METODO: CHANGE */
    $("#cmbstipo_documento_codigo").change(function(){
        $("#txtsguia_serie").val("");
        $("#txtsguia_serie").focus();
    });

    /*  OBJETO: cmbsdestino_empresa_razon_social METODO: INIT */
    function cmbsdestino_empresa_razon_social__inicializar(){
        $("#cmbsdestino_empresa_razon_social").html("");
        $.post("../../controller/servicio.php?op=ctrl_apr_web_destinatario_select", function(data, status){
            $("#cmbsdestino_empresa_razon_social").html(data);
            $("#cmbsdestino_empresa_razon_social").selectpicker("refresh");
        });
    }

    /*  OBJETO: cmbsdestino_empresa_razon_social METODO: CHANGE */
    $("#cmbsdestino_empresa_razon_social").change(function(){
        
        $("#cmbsdestino_empresa_razon_social option:selected").each(function () {
            var lscodigo_aleatorio = $("#cmbsdestino_empresa_razon_social").val();
            console.log(lscodigo_aleatorio);
            
            $.post("../../controller/servicio.php?op=ctrl_apr_web_destinatario_obtener_registro", {pscodigo_aleatorio : lscodigo_aleatorio}, function(data, status){
                data = JSON.parse(data);
                console.log(data);
                lsdestinatario_direccion = data.sdestinatario_direccion;
                lsdepartamento_codigo = data.sdepartamento_codigo;
                lsprovincia_codigo = data.sprovincia_codigo;
                lsdistrito_codigo = data.sdistrito_codigo;
                
                $("#txtsdestino_empresa_direccion").val(lsdestinatario_direccion);

                $("#cmbsdestino_departamento_codigo").html("");
                $("#cmbsdestino_departamento_codigo").selectpicker("refresh");
                $.post("../../controller/servicio.php?op=ctrl_apr_web_ubigeo_dpto_select", function(data, status){
                    $("#cmbsdestino_departamento_codigo").html(data);
                    $("#cmbsdestino_departamento_codigo").val(lsdepartamento_codigo);
                    $("#cmbsdestino_departamento_codigo").selectpicker("refresh");
                });
        
                $("#cmbsdestino_provincia_codigo").html("");
                $("#cmbsdestino_provincia_codigo").selectpicker("refresh");
                $.post("../../controller/servicio.php?op=ctrl_apr_web_ubigeo_prov_select",{psdepartamento_codigo : lsdepartamento_codigo}, function(data, status){
                    $("#cmbsdestino_provincia_codigo").html(data);
                    $("#cmbsdestino_provincia_codigo").val(lsprovincia_codigo);
                    $("#cmbsdestino_provincia_codigo").selectpicker("refresh");
                });
                        
                $("#cmbsdestino_distrito_codigo").html("");
                $("#cmbsdestino_distrito_codigo").selectpicker("refresh");
                $.post("../../controller/servicio.php?op=ctrl_apr_web_ubigeo_dist_select",{psprovincia_codigo : lsprovincia_codigo}, function(data, status){
                    $("#cmbsdestino_distrito_codigo").html(data);
                    $("#cmbsdestino_distrito_codigo").val(lsdistrito_codigo);
                    $("#cmbsdestino_distrito_codigo").selectpicker("refresh");
                });

                $("#txtsdestino_atencion").focus();
                   
            });
        });
    });


    /*  OBJETO: pgmanifiesto_cmbstipo_transporte_codigo METODO: CHANGE */
    $("#pgmanifiesto_cmbstipo_transporte_codigo").change(function(){
        $("#pgmanifiesto_dtpdmanifiesto_fecha_salida").focus();
    });
    
    /*  OBJETO: pgmanifiesto_dtpdmanifiesto_fecha_salida METODO: CHANGE -ALDO */
    $("#pgmanifiesto_dtpdmanifiesto_fecha_salida").change(function(){
        $("#pgmanifiesto_spnnmanifiesto_dias_transito").focus();
    });
    
    /*  OBJETO: cmbsdestino_departamento_codigo METODO: CHANGE */
    $("#cmbsdestino_departamento_codigo").change(function(){
        cmbsdestino_provincia_codigo__inicializar();
        cmbsdestino_distrito_codigo__inicializar();
        $("#cmbsdestino_departamento_codigo option:selected").each(function () {
            lstipo_ubigeo_codigo = "PRO";
            lsubigeo_codigo = $(this).val();
            $.post("../../controller/servicio.php?op=ctrl_apr_web_ubigeo_select", {pstipo_ubigeo_codigo : lstipo_ubigeo_codigo, psubigeo_codigo : lsubigeo_codigo}, function(data, status){
                $("#cmbsdestino_provincia_codigo").html(data);
                $("#cmbsdestino_provincia_codigo").selectpicker("refresh");
             });
        });
    });

    /*  OBJETO: pgdetalle_cbosproducto_codigo METODO: CHANGE */
    $("#pgdetalle_cbosproducto_codigo").change(function(){
        $("#pgdetalle_cbosproducto_codigo option:selected").each(function () {
            lsproducto_codigo = $(this).val();
            $.post("../../controller/servicio.php?op=ctrl_apr_web_producto_obtener_registro", {psproducto_codigo : lsproducto_codigo}, function(data, status){
                data = JSON.parse(data);
                $("#pgdetalle_txtsproducto_unidad").val(data.sproducto_unidad);
            });
        });  

        $("#pgdetalle_txtsproducto_descripcion").val("");
        $("#pgdetalle_txtsproducto_descripcion").focus();
    });

    /*  OBJETO: pgmanifiesto_cmbsagente_codigo METODO: CHANGE */
    $("#pgmanifiesto_cmbsagente_codigo").change(function(){
/*         $("#pgmanifiesto_cmbsagente_codigo option:selected").each(function () {
            
            var lsagente_codigo = $("#pgmanifiesto_cmbsagente_codigo").val();
            var lstipo_servicio_codigo = "";
            var lsruta_servicio_codigo = "";

            $.post("../../controller/servicio.php?op=ctrl_apr_web_agente_obtener_registro", {psagente_codigo:lsagente_codigo}, function(data, status){
                data = JSON.parse(data);
                lstipo_servicio_codigo = data.stipo_servicio_codigo;
                lsruta_servicio_codigo = data.sruta_servicio_codigo;
                
                console.log("TIPO SERVICIO: "+ lstipo_servicio_codigo);
                console.log("RUTA DE SERVICIO: " + lsruta_servicio_codigo);

                $("#pgmanifiesto_cmbstipo_servicio_codigo").val(lstipo_servicio_codigo);
                $("#pgmanifiesto_cmbstipo_servicio_codigo").selectpicker("refresh");

                $("#pgmanifiesto_cmbsruta_servicio_codigo").html("");
                $("#pgmanifiesto_cmbsruta_servicio_codigo").selectpicker("refresh");

                $.post("../../controller/sun_departamento.php?caso=ctrl_select", {}, 
                function(data, status){
                    console.log(data);
                    $("#pgmanifiesto_cmbsruta_servicio_codigo").html(data);
                    $("#pgmanifiesto_cmbsruta_servicio_codigo").val(lsruta_servicio_codigo);
                    $("#pgmanifiesto_cmbsruta_servicio_codigo").selectpicker("refresh");
                });
                        
            });
            console.log("3");
        });  

        $("#pgmanifiesto_txtsmanifiesto_observacion").val(""); */
        $("#pgmanifiesto_txtsmanifiesto_observacion").focus();
    });


    /*  OBJETO: pgdocumento_btngrabar METODO: CLICK  */
    $(document).on("click","#pgdocumento_btngrabar", function(){
        /* VALIDAR QUE NUMERO DE DOCUMENTO NO ESTE EN BLANCO */
        /* VALIDAR QUE NO SE ENCUENTRE EN LA GRILLA QUE VA REGISTRANDO LOS DOCUMENTOS */
        /* VALIDAR QUE NO SE ENCUENTRE EN LA BASE DE DATOS*/

        pgdocumento_txtstipo_documento_codigo__inicializar();
        $("#pgdocumento_txtscliente_guia_numero").val("");

        $("#pgdocumento_txtstipo_documento_codigo").focus();
    });

    $("#pgdetalle_spnnproducto_cantidad").change(function() {
        $(this).val(parseFloat($(this).val()).toFixed(2));
    });

    $("#pgdetalle_spnnproducto_peso").change(function() {
        $(this).val(parseFloat($(this).val()).toFixed(2));
    });

    $("#pgdetalle_spnnproducto_costo").change(function() {
        $(this).val(parseFloat($(this).val()).toFixed(2));
    });

});

/*  OBJETO: cmbsdestino_departamento_codigo
        METODO: INIT
*/
function cmbsdestino_departamento_codigo__inicializar(){
    $("#cmbsdestino_departamento_codigo").html("");
    $.post("../../controller/sun_departamento.php?caso=ctrl_select", {}, 
        function(data, status){
            console.log(data);
            $("#cmbsdestino_departamento_codigo").html(data);
            $("#cmbsdestino_departamento_codigo").selectpicker("refresh");
    });
}

/*  OBJETO: cmbsdestino_provincia_codigo
    METODO: INIT
*/
function cmbsdestino_provincia_codigo__inicializar(){
    $("#cmbsdestino_provincia_codigo").html("");
    $("#cmbsdestino_provincia_codigo").selectpicker("refresh");
}

/*  OBJETO: cmbsdestino_provincia_codigo METODO: CHANGE */
$("#cmbsdestino_provincia_codigo").change(function(){
    cmbsdestino_distrito_codigo__inicializar();
    $("#cmbsdestino_provincia_codigo option:selected").each(function () {
        lstipo_ubigeo_codigo = "DIS";
        lsubigeo_codigo = $(this).val();
        $.post("../../controller/servicio.php?op=ctrl_apr_web_ubigeo_select", {pstipo_ubigeo_codigo : lstipo_ubigeo_codigo, psubigeo_codigo : lsubigeo_codigo}, function(data, status){
            $("#cmbsdestino_distrito_codigo").html(data);
            $("#cmbsdestino_distrito_codigo").selectpicker("refresh");
         });
    });
});

/*  OBJETO: cmbsdestino_distrito_codigo
    METODO: INIT
*/
function cmbsdestino_distrito_codigo__inicializar(){
    $("#cmbsdestino_distrito_codigo").html("");
    $("#cmbsdestino_distrito_codigo").selectpicker("refresh");
}

/*  OBJETO: cmbstipo_documento_codigo
    METODO: INIT
*/
function cmbstipo_documento_codigo__inicializar(){
    $("#cmbstipo_documento_codigo").html("");
    lstipo_documento_sunat = "";
    $.post("../../controller/servicio.php?op=ctrl_apr_web_tipo_documento_select", function(data, status){
        $("#cmbstipo_documento_codigo").html(data);
        $("#cmbstipo_documento_codigo").selectpicker("refresh");

    });
}

/*  OBJETO: pgdocumento_cmbstipo_documento_codigo
    METODO: INIT
*/
function pgdocumento_cmbstipo_documento_codigo__inicializar(){
    $("#pgdocumento_cmbstipo_documento_codigo").html("");
    lstipo_documento_sunat = "";
    $.post("../../controller/servicio.php?op=ctrl_apr_web_tipo_documento_select", function(data, status){
        $("#pgdocumento_cmbstipo_documento_codigo").html(data);
        $("#pgdocumento_cmbstipo_documento_codigo").selectpicker("refresh");

    });
}

/*  OBJETO: dtpdguia_fecha_recepcion 
    METODO: INIT
*/    
function dtpdguia_fecha_recepcion__inicializar(){
    $("#dtpdguia_fecha_recepcion").datepicker({
        language: "es",
        todayBtn: "linked",
        format: "dd/mm/yyyy",
        multidate: false,
        todayHighlight: true,
        autoclose: true,

    }).datepicker("setDate", new Date());

}

/*  OBJETO: dtpdguia_fecha_vencimiento
    METODO: INIT
*/    
function dtpdguia_fecha_vencimiento__inicializar(){
    $("#dtpdguia_fecha_vencimiento").datepicker({
        language: "es",
        todayBtn: "linked",
        format: "dd/mm/yyyy",
        multidate: false,
        todayHighlight: true,
        autoclose: true,

    }).datepicker("setDate", new Date());
}    

/*  OBJETO: dtpdguia_fecha_retorno
    METODO: INIT
*/    
function dtpdguia_fecha_retorno__inicializar(){
    $("#dtpdguia_fecha_retorno").datepicker({
        language: "es",
        todayBtn: "linked",
        format: "dd/mm/yyyy",
        multidate: false,
        todayHighlight: true,
        autoclose: true,

    }).datepicker("setDate", new Date());
}    

/*  OBJETO: dmanifiesto_fecha_salida
    METODO: INIT
*/    
function dtpdmanifiesto_fecha_salida__inicializar(){
    $("#pgmanifiesto_dtpdmanifiesto_fecha_salida").datepicker({
        language: "es",
        todayBtn: "linked",
        format: "dd/mm/yyyy",
        multidate: false,
        todayHighlight: true,
        autoclose: true

    }).datepicker("setDate", new Date());
}    


/*  OBJETO: txtsguia_serie METODO: onblur */
function txtsguia_serie__onblur(pobjeto){
    while (pobjeto.value.length<3) 
        pobjeto.value = "0"+pobjeto.value;

    var lstipo_documento_codigo = $("#cmbstipo_documento_codigo").val();
    console.log("lstipo_documento_codigo: " + lstipo_documento_codigo)

    if (lstipo_documento_codigo == ''){
        swal({
            title: "Observacion!",
            text: "Debe seleccionar un tipo de documento",
            icon: "error"
        })
    }

}  

/* OBJETO: txtscorrelativo_serie METODO: onblur */
function txtsguia_correlativo__onblur(pobjeto){
    while (pobjeto.value.length<6) 
        pobjeto.value = "0"+pobjeto.value;

    var lstipo_documento_codigo = $("#cmbstipo_documento_codigo").val();
    var lsguia_serie = $("#txtsguia_serie").val();
    var lsguia_correlativo = $("#txtsguia_correlativo").val();

    $.post("../../controller/log_guia.php?op=buscar_duplicado",{
        pstipo_documento_codigo:lstipo_documento_codigo,
        psguia_serie:lsguia_serie,
        psguia_correlativo:lsguia_correlativo
    },function(data, status){
        
        objservidor = JSON.parse(data);
        console.log(objservidor);
        
        if (objservidor.ssql_mensaje == "ERROR_DUPLICADO"){
            swal({
                title: "Error!",
                text: objservidor.ssql_mensaje_usuario,
                icon: "error"
            }).then(function() {
                $("#txtsguia_correlativo").focus();
            });
        }

    });
    
}

/*  OBJETO: pgdetalle_cbosproducto_codigo  METODO: INIT */
function pgdetalle_cbosproducto_codigo__inicializar(){
    $("#pgdetalle_cbosproducto_codigo").html("");
    $.post("../../controller/servicio.php?op=ctrl_apr_web_producto_select", function(data, status){
        $("#pgdetalle_cbosproducto_codigo").html(data);
        $("#pgdetalle_cbosproducto_codigo").selectpicker("refresh");
    });
}

/*  OBJETO: pgdocumento_txtstipo_documento_codigo  METODO: INIT */
function pgdocumento_txtstipo_documento_codigo__inicializar(){
    $("#pgdocumento_txtstipo_documento_codigo").html("");
    $.post("../../controller/servicio.php?op=ctrl_apr_web_tipo_documento_select", function(data, status){
        $("#pgdocumento_txtstipo_documento_codigo").html(data);
        $("#pgdocumento_txtstipo_documento_codigo").selectpicker("refresh");
    });
}    

/*  OBJETO: pgmanifiesto_cmbsagente_codigo METODO: INIT */
function pgmanifiesto_cmbsagente_codigo__inicializar(){
    $("#pgmanifiesto_cmbsagente_codigo").html("");
    $.post("../../controller/servicio.php?op=ctrl_apr_web_agente_select", function(data, status){
        $("#pgmanifiesto_cmbsagente_codigo").html(data);
        $("#pgmanifiesto_cmbsagente_codigo").selectpicker("refresh");
    });
}

/*  OBJETO: pgmanifiesto_cmbsagente_codigo  METODO: INIT */
function pgmanifiesto_cmbstipo_servicio_codigo__inicializar(){
    $("#pgmanifiesto_cmbstipo_servicio_codigo").html("");
    $.post("../../controller/servicio.php?op=ctrl_apr_web_tipo_servicio_select", function(data, status){
        $("#pgmanifiesto_cmbstipo_servicio_codigo").html(data);
        $("#pgmanifiesto_cmbstipo_servicio_codigo").selectpicker("refresh");
    });
}

/*  OBJETO: pgmanifiesto_cmbsruta_servicio_codigo METODO: INIT */
function pgmanifiesto_cmbsruta_servicio_codigo__inicializar(){
    $("#pgmanifiesto_cmbsruta_servicio_codigo").html("");
    $("#pgmanifiesto_cmbsruta_servicio_codigo").selectpicker("refresh");
}

/*  OBJETO: pgmanifiesto_cmbsproveedor_codigo METODO: INIT */
function pgmanifiesto_cmbsproveedor_codigo__inicializar(){
    $("#pgmanifiesto_cmbsproveedor_codigo").html("");
    $.post("../../controller/servicio.php?op=ctrl_apr_web_proveedor_select", function(data, status){
        $("#pgmanifiesto_cmbsproveedor_codigo").html(data);
        $("#pgmanifiesto_cmbsproveedor_codigo").selectpicker("refresh");
    });
}

/*  OBJETO: pgmanifiesto_cmbstipo_transporte_codigo ---------- METODO: INIT */
function pgmanifiesto_cmbstipo_transporte_codigo__inicializar(){
    $("#pgmanifiesto_cmbstipo_transporte_codigo").html("");
    $.post("../../controller/servicio.php?op=ctrl_apr_web_tipo_transporte_select", function(data, status){
        $("#pgmanifiesto_cmbstipo_transporte_codigo").html(data);
        $("#pgmanifiesto_cmbstipo_transporte_codigo").selectpicker("refresh");
    });
}

/*  OBJETO: cmbsprioridad_codigo ---------- METODO: INIT */
function cmbsprioridad_codigo__inicializar(){
    
    $("#cmbsprioridad_codigo").html("");
    $.post("../../controller/arc_prioridad.php?caso=ctrl_select", 
        {},
        function(data, status){
            $("#cmbsprioridad_codigo").html(data);
            $("#cmbsprioridad_codigo").selectpicker("refresh");
    });

}


/*  OBJETO: pgdetalle_btngrabar| METODO: CLICK */
$(document).on("click","#pgdetalle_btngrabar", function(){
    var lstipo_documento_codigo = $("#cmbstipo_documento_codigo").val();
    var lsguia_serie = $("#txtsguia_serie").val();
    var lsguia_correlativo = $("#txtsguia_correlativo").val();
    var lsguia_detalle_numero_item = "";
    var lsproducto_codigo = $("#pgdetalle_cbosproducto_codigo").val();
    var lsproducto_descripcion =  $("#pgdetalle_txtsproducto_descripcion").val();
    var lnproducto_cantidad = $("#pgdetalle_spnnproducto_cantidad").val();
    var lnproducto_peso = $("#pgdetalle_spnnproducto_peso").val();
    var lnproducto_costo = $("#pgdetalle_spnnproducto_costo").val();
    var lscodigo_aleatorio = "";
    var lssuperior_aleatorio = $("#ID_GUIA").val();
    var lsauditoria_usuario =  $("#usercontactocodigox").val();

    lsproducto_descripcion = lsproducto_descripcion.toUpperCase();

    $.post("../../controller/servicio.php?op=guia_detalle_insert_buffer",{
        pstipo_documento_codigo:lstipo_documento_codigo,
        psguia_serie:lsguia_serie,
        psguia_correlativo:lsguia_correlativo,
        psguia_detalle_numero_item:lsguia_detalle_numero_item,
        psproducto_codigo:lsproducto_codigo,
        psproducto_descripcion:lsproducto_descripcion,
        pnproducto_cantidad:lnproducto_cantidad,
        pnproducto_peso:lnproducto_peso,
        pnproducto_costo:lnproducto_costo,
        pscodigo_aleatorio:lscodigo_aleatorio,
        pssuperior_aleatorio:lssuperior_aleatorio,
        psauditoria_usuario:lsauditoria_usuario
    },function(data, status){
        $("#cmbstipo_documento_codigo").attr("disabled", true);
        $("#txtsguia_serie").attr("readonly", true);
        $("#txtsguia_correlativo").attr("readonly", true); 

        limpiardetalle();

        var pscodigo_aleatorio = $("#ID_GUIA").val();
        listarDetalles(pscodigo_aleatorio);
    });
  
}); 

function limpiardetalle(){
    //$("#pgdetalle_cbosproducto_codigo").val("");
    pgdetalle_cbosproducto_codigo__inicializar();
    //$("#pgdetalle_cbosproducto_codigo").selectpicker("refresh");

    $("#pgdetalle_txtsproducto_descripcion").val("");
    $("#pgdetalle_spnnproducto_cantidad").val("");
    $("#pgdetalle_spnnproducto_peso").val("");
    $("#pgdetalle_spnnproducto_costo").val("");
}

function listarDetalles(pscodigo_aleatorio){
    tabla_detalles=$("#detalle_data").dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: "Bfrtip",
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [		          
                "copyHtml5",
                "excelHtml5",
                "csvHtml5",
                "pdfHtml5"
                ],
        "ajax":{
            url: "../../controller/servicio.php?op=guia_detalle_select_buffer",
            type : "post",
            dataType : "json",
            data : {pscodigo_aleatorio : pscodigo_aleatorio},					
            error: function(e){
                console.log(e.responseText);	
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10,
        "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
    }).DataTable(); 
}

function eliminardetalle(scodigo_aleatorio){
    var pscodigo_aleatorio = scodigo_aleatorio.toString().replace("/","").slice(0, -1);
    var psauditoria_usuario =  $("#usercontactocodigox").val();
    swal({
        title: "Eliminar?",
        text: "Esta Seguro de eliminar el Registro",
        icon: "warning",
        buttons: {
            cancel: {
                text: "Cancelar",
                value: null,
                visible: true,
                className: "btn btn-default",
                closeModal: true,
            },
            confirm: {
                text: "Eliminar",
                value: true,
                visible: true,
                className: "btn btn-warning",
                closeModal: true
            }
        }
    }).then((result) => {
            if (result==true) {
                $.post("../../controller/servicio.php?op=guia_detalle_delete_buffer",{pscodigo_aleatorio:pscodigo_aleatorio,psauditoria_usuario:psauditoria_usuario},function(data, status){
     
                });

                var x = $("#ID_GUIA").val();
                listarDetalles(x);

                swal(
                    "Eliminar!",
                    "El registro se elimino correctamente.",
                    "success"
                );
            }
    });
}

/*  OBJETO: pgdocumento_btngrabar| METODO: CLICK */
$(document).on("click","#pgdocumento_btngrabar", function(){
    var lsremite_cliente_codigo = $("#cmbsremite_cliente_codigo").val();
    var lsguia_tipo_documento_codigo = $("#cmbstipo_documento_codigo").val();
    var lsguia_serie = $("#txtsguia_serie").val();
    var lsguia_correlativo = $("#txtsguia_correlativo").val();
    var lscliente_tipo_documento_codigo = $("#pgdocumento_txtstipo_documento_codigo").val();
    var lscliente_guia_numero = $("#pgdocumento_txtscliente_guia_numero").val();
    var lsguia_documento_ruta_local = "";
    var lsguia_documento_ruta_web ="";
    var lscodigo_aleatorio = "";
    var lssuperior_aleatorio = $("#ID_GUIA").val();
    var lsauditoria_usuario =  $("#usercontactocodigox").val();

    lscliente_guia_numero = lscliente_guia_numero.toUpperCase();

    $.post("../../controller/servicio.php?op=guia_documentos_cliente_insert_buffer",{
        psremite_cliente_codigo:lsremite_cliente_codigo,
        psguia_tipo_documento_codigo:lsguia_tipo_documento_codigo,
        psguia_serie:lsguia_serie,
        psguia_correlativo:lsguia_correlativo,
        pscliente_tipo_documento_codigo:lscliente_tipo_documento_codigo,
        pscliente_guia_numero:lscliente_guia_numero,
        psguia_documento_ruta_local:lsguia_documento_ruta_local,
        psguia_documento_ruta_web:lsguia_documento_ruta_web,
        pscodigo_aleatorio:lscodigo_aleatorio,
        pssuperior_aleatorio:lssuperior_aleatorio,
        psauditoria_usuario:lsauditoria_usuario
    },function(data, status){
        var pscodigo_aleatorio = $("#ID_GUIA").val();

        $("#cmbstipo_documento_codigo").attr("disabled", true);
        $("#txtsguia_serie").attr("readonly", true);
        $("#txtsguia_correlativo").attr("readonly", true); 

        listardocumentos(pscodigo_aleatorio);
    });

});

function listardocumentos(pscodigo_aleatorio){
    tabla_documento=$("#pgdocumento_grddata").dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: "Bfrtip",
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [		          
                "copyHtml5",
                "excelHtml5",
                "csvHtml5",
                "pdfHtml5"
                ],
        "ajax":{
            url: "../../controller/servicio.php?op=guia_documentos_cliente_select_buffer",
            type : "post",
            dataType : "json",
            data : {pscodigo_aleatorio : pscodigo_aleatorio},					
            error: function(e){
                console.log(e.responseText);	
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10,
        "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
    }).DataTable(); 
}

function eliminardocumento(scodigo_aleatorio){
    var pscodigo_aleatorio = scodigo_aleatorio.toString().replace("/","").slice(0, -1);
    var psauditoria_usuario =  $("#usercontactocodigox").val();
    swal({
        title: "Eliminar?",
        text: "Esta Seguro de eliminar el Registro",
        icon: "warning",
        buttons: {
            cancel: {
                text: "Cancelar",
                value: null,
                visible: true,
                className: "btn btn-default",
                closeModal: true,
            },
            confirm: {
                text: "Eliminar",
                value: true,
                visible: true,
                className: "btn btn-warning",
                closeModal: true
            }
        }
    }).then((result) => {
            if (result==true) {
                $.post("../../controller/servicio.php?op=guia_documentos_cliente_delete_buffer",{pscodigo_aleatorio:pscodigo_aleatorio,psauditoria_usuario:psauditoria_usuario},function(data, status){
     
                });

                var x = $("#ID_GUIA").val();
                listardocumentos(x);

                swal(
                    "Eliminar!",
                    "El registro se elimino correctamente.",
                    "success"
                );
            }
    });
}


$(document).on("click","#bntcancelar_todo", function(){
    location.href = "../../view/mov_registro_vista/";
});

$(document).on("click","#btnguardar_todo", function(){

    console.log("PASO: 1 ");
    swal({
        title: "Guardar?",
        text: "Esta seguro de guardar el Registro",
        icon: "info",
        buttons: {
            cancel: {
                text: "Cancelar",
                value: null,
                visible: true,
                className: "btn btn-default",
                closeModal: true,
            },
            confirm: {
                text: "Guardar",
                value: true,
                visible: true,
                className: "btn btn-primary",
                closeModal: true
            }
        }
    }).then((result) => {
        console.log("PASO: 2 ");
        if (result == true) {
            console.log("PASO: 3 ");
            
            var pstipo_documento_codigo = $("#cmbstipo_documento_codigo").val();
            var psguia_serie = $("#txtsguia_serie").val();
            var psguia_correlativo = $("#txtsguia_correlativo").val();
            var psguia_hoja_ruta = $("#txtsguia_hoja_ruta").val();
            var pdguia_fecha_recepcion = $("#dtpdguia_fecha_recepcion").val();
            var pdguia_fecha_vencimiento = $("#dtpdguia_fecha_vencimiento").val();
            var pdguia_fecha_retorno_limite = $("#dtpdguia_fecha_retorno").val();
            var psgrupo_cliente_codigo = $("#cmbsgrupo_cliente_codigo").val();
            var psremite_cliente_codigo = $("#cmbsremite_cliente_codigo").val();
            var psremite_cliente_direccion = $("#txtsremite_cliente_direccion").val();
            var psremite_distrito_codigo = $("#cmbsremite_distrito_codigo").val();
            var psremite_provincia_codigo = $("#cmbsremite_provincia_codigo").val();
            var psremite_departamento_codigo = $("#cmbsremite_departamento_codigo").val();
            var psremite_atencion = $("#txtsremite_atencion").val();
            var psdestino_empresa_razon_social = $("#cmbsdestino_empresa_razon_social option:selected").text();
            var psdestino_empresa_direccion = $("#txtsdestino_empresa_direccion").val();
            var psdestino_distrito_codigo = $("#cmbsdestino_distrito_codigo").val();
            var psdestino_provincia_codigo = $("#cmbsdestino_provincia_codigo").val();
            var psdestino_departamento_codigo = $("#cmbsdestino_departamento_codigo").val();
            var psdestino_atencion = $("#txtsdestino_atencion").val();
            var psdestino_almacen_descripcion = "";
            var psprioridad_codigo = $("#cmbsprioridad_codigo").val();
            var psguia_licitacion = ($("#chksguia_licitacion").is( ":checked" ) ? "1": "0");
            var psguia_exclusivo = ($("#chksguia_exclusivo").is( ":checked" ) ? "1": "0") ;
            var psguia_observacion = $("#pgmanifiesto_txtsmanifiesto_observacion").val();
            var pscodigo_aleatorio = $("#ID_GUIA").val();
            var pssession_id = "";
            var psauditoria_usuario = $("#usercontactocodigox").val();
                
            psremite_atencion = psremite_atencion.toUpperCase();
            psdestino_empresa_razon_social = psdestino_empresa_razon_social.toUpperCase();
            psdestino_empresa_direccion = psdestino_empresa_direccion.toUpperCase();
            psdestino_atencion = psdestino_atencion.toUpperCase();
            psguia_observacion = psguia_observacion.toUpperCase();

            var psguia_fecha_recepcion = "";
            var psguia_fecha_vencimiento = "";
            var psguia_fecha_retorno_limite = "";

            psguia_fecha_recepcion      = psguia_fecha_recepcion.concat(pdguia_fecha_recepcion.substr(6,4), pdguia_fecha_recepcion.substr(3,2), pdguia_fecha_recepcion.substr(0,2));
            psguia_fecha_vencimiento    = psguia_fecha_vencimiento.concat(pdguia_fecha_vencimiento.substr(6,4), pdguia_fecha_vencimiento.substr(3,2), pdguia_fecha_vencimiento.substr(0,2));
            psguia_fecha_retorno_limite    = psguia_fecha_retorno_limite.concat(pdguia_fecha_retorno_limite.substr(6,4), pdguia_fecha_retorno_limite.substr(3,2), pdguia_fecha_retorno_limite.substr(0,2));
            
            console.log("pstipo_documento_codigo: " + pstipo_documento_codigo);
            console.log("psguia_serie: " + psguia_serie);
            console.log("psguia_correlativo: " + psguia_correlativo);
            console.log("psguia_hoja_ruta: " + psguia_hoja_ruta);
            console.log("psguia_fecha_recepcion: " + psguia_fecha_recepcion);
            console.log("psguia_fecha_vencimiento: " + psguia_fecha_vencimiento);
            console.log("psguia_fecha_retorno_limite: " + psguia_fecha_retorno_limite);
            console.log(" ");
            console.log("psgrupo_cliente_codigo: " + psgrupo_cliente_codigo);
            console.log("psremite_cliente_codigo: " + psremite_cliente_codigo);
            console.log("psremite_distrito_codigo: " + psremite_distrito_codigo);
            console.log("psremite_provincia_codigo: " + psremite_provincia_codigo);
            console.log("psremite_departamento_codigo: " + psremite_departamento_codigo);
            console.log("psremite_atencion: " + psremite_atencion);
            console.log(" ");
            console.log("psdestino_empresa_razon_social: " + psdestino_empresa_razon_social);
            console.log("psdestino_empresa_direccion: " + psdestino_empresa_direccion);
            console.log("psdestino_distrito_codigo: " + psdestino_distrito_codigo);
            console.log("psdestino_provincia_codigo: " + psdestino_provincia_codigo);
            console.log("psdestino_departamento_codigo: " + psdestino_departamento_codigo);
            console.log("psdestino_atencion: " + psdestino_atencion);
            console.log("psdestino_almacen_descripcion: " + psdestino_almacen_descripcion);
            console.log("psprioridad_codigo: " + psprioridad_codigo);
            console.log("psguia_licitacion: " + psguia_licitacion);
            console.log("psguia_exclusivo: " + psguia_exclusivo);
            console.log("psguia_exclusivo: " + psguia_observacion);
            console.log("psauditoria_usuario: " + psauditoria_usuario);
            console.log(" ");
            console.log("pscodigo_aleatorio: " + pscodigo_aleatorio);

            $.post("../../controller/servicio.php?op=guia_update_buffer",{
                pstipo_documento_codigo:pstipo_documento_codigo,
                psguia_serie:psguia_serie,
                psguia_correlativo:psguia_correlativo,
                psguia_hoja_ruta:psguia_hoja_ruta,
                pdguia_fecha_recepcion:psguia_fecha_recepcion,
                pdguia_fecha_vencimiento:psguia_fecha_vencimiento,
                pdguia_fecha_retorno_limite:psguia_fecha_retorno_limite,
                psgrupo_cliente_codigo:psgrupo_cliente_codigo,
                psremite_cliente_codigo:psremite_cliente_codigo,
                psremite_cliente_direccion:psremite_cliente_direccion,
                psremite_distrito_codigo:psremite_distrito_codigo,
                psremite_provincia_codigo:psremite_provincia_codigo,
                psremite_departamento_codigo:psremite_departamento_codigo,
                psremite_atencion:psremite_atencion,
                psdestino_empresa_razon_social:psdestino_empresa_razon_social,
                psdestino_empresa_direccion:psdestino_empresa_direccion,
                psdestino_distrito_codigo:psdestino_distrito_codigo,
                psdestino_provincia_codigo:psdestino_provincia_codigo,
                psdestino_departamento_codigo:psdestino_departamento_codigo,
                psdestino_atencion:psdestino_atencion,
                psdestino_almacen_descripcion:psdestino_almacen_descripcion,
                psprioridad_codigo:psprioridad_codigo,
                psguia_licitacion:psguia_licitacion,
                psguia_exclusivo:psguia_exclusivo,
                psguia_observacion:psguia_observacion,
                pscodigo_aleatorio:pscodigo_aleatorio,
                pssession_id:pssession_id,
                psauditoria_usuario:psauditoria_usuario
            },function(data, status)
            {
                objservidor = JSON.parse(data);

                if (objservidor.ssql_mensaje == "SUCCESS"){

                    console.log("PASO: 4 ");
                    /* Inicio Guardar Manifiesto */
                    var pstipo_documento_codigo = $("#cmbstipo_documento_codigo").val();
                    var psguia_serie  = $("#txtsguia_serie").val();
                    var psguia_correlativo = $("#txtsguia_correlativo").val();
    
                    var psagente_codigo = $("#pgmanifiesto_cmbsagente_codigo").val();
                    var pstipo_servicio_codigo = "NAC";
                    var psruta_servicio_codigo = psdestino_departamento_codigo;
                    var psproveedor_codigo = $("#pgmanifiesto_cmbsproveedor_codigo").val();
                    var pstipo_transporte_codigo = $("#pgmanifiesto_cmbstipo_transporte_codigo").val();
                    var pdmanifiesto_fecha_salida = $("#pgmanifiesto_dtpdmanifiesto_fecha_salida").val();
                    var pnmanifiesto_dias_transito = $("#pgmanifiesto_spnnmanifiesto_dias_transito").val();
                    var psmanifiesto_despachador = $("#pgmanifiesto_txtsmanifiesto_despachador").val();
                    var psmanifiesto_proveedor_documento = $("#pgmanifiesto_txtsmanifiesto_proveedor_documento").val();
                    var pscodigo_aleatorio = $("#ID_MANIFIESTO").val();
                    var pssuperior_aleatorio = $("#ID_GUIA").val();
                    var psauditoria_usuario = $("#usercontactocodigox").val();
                        
                    psmanifiesto_despachador = psmanifiesto_despachador.toUpperCase();
                    psmanifiesto_proveedor_documento = psmanifiesto_proveedor_documento.toUpperCase();
    
                    var psmanifiesto_fecha_salida = "";
    
                    psmanifiesto_fecha_salida = psmanifiesto_fecha_salida.concat(pdmanifiesto_fecha_salida.substr(6,4), pdmanifiesto_fecha_salida.substr(3,2), pdmanifiesto_fecha_salida.substr(0,2));
                        
                    console.log("pstipo_documento_codigo: " + pstipo_documento_codigo);
                    console.log("psguia_serie: " + psguia_serie);
                    console.log("psguia_correlativo: " + psguia_correlativo);
    
                    console.log("psagente_codigo: " + psagente_codigo);
                    console.log("pstipo_servicio_codigo: " + pstipo_servicio_codigo);
                    console.log("psruta_servicio_codigo: " + psruta_servicio_codigo);
                    console.log("psproveedor_codigo: " + psproveedor_codigo);
                    console.log("pstipo_transporte_codigo: " + pstipo_transporte_codigo);
                    console.log("pdmanifiesto_fecha_salida: " + psmanifiesto_fecha_salida);
                    console.log("pnmanifiesto_dias_transito: " + pnmanifiesto_dias_transito);
                    console.log("psmanifiesto_despachador: " + psmanifiesto_despachador);
                    console.log("psmanifiesto_proveedor_documento: " + psmanifiesto_proveedor_documento);
                    console.log("pscodigo_aleatorio: " + pscodigo_aleatorio );
                    console.log("pssuperior_aleatorio: " + pssuperior_aleatorio );
    
                    $.post("../../controller/servicio.php?op=guia_manifiesto_update_buffer",
                    {
                        pstipo_documento_codigo:pstipo_documento_codigo,
                        psguia_serie:psguia_serie,
                        psguia_correlativo:psguia_correlativo,
                        psagente_codigo:psagente_codigo,
                        pstipo_servicio_codigo:pstipo_servicio_codigo,
                        psruta_servicio_codigo:psruta_servicio_codigo,
                        psproveedor_codigo:psproveedor_codigo,
                        pstipo_transporte_codigo:pstipo_transporte_codigo,
                        pdmanifiesto_fecha_salida:psmanifiesto_fecha_salida,
                        pnmanifiesto_dias_transito:pnmanifiesto_dias_transito,
                        psmanifiesto_despachador:psmanifiesto_despachador,
                        psmanifiesto_proveedor_documento:psmanifiesto_proveedor_documento,
                        pscodigo_aleatorio:pscodigo_aleatorio,
                        pssuperior_aleatorio:pssuperior_aleatorio,
                        psauditoria_usuario:psauditoria_usuario
                    },
                        function(data, status){
                        console.log(data);
                    });
                    console.log("PASO: 5 ");
                    /* Fin Guardar Manifiesto */
                    
                    swal({
                        title: "Guardar!",
                        text: objservidor.ssql_mensaje_usuario,
                        icon: "success"
                    }).then(function() {
                        location.href = "../../view/mov_registro_vista/";
                    });

                }else{
                    
                    $("#cmbstipo_documento_codigo").attr("disabled", false);
                    $("#txtsguia_serie").attr("readonly", false);
                    $("#txtsguia_correlativo").attr("readonly", false); 
                    $("#txtsguia_correlativo").focus();

                    swal({
                        title: "Error!",
                        text: objservidor.ssql_mensaje_usuario,
                        icon: "error"
                    }).then(function() {
                        $("#txtsguia_correlativo").focus();
                    });

                }
        
                
            });
            /* Fin Guardar Guia */

        }
    });
});

init();