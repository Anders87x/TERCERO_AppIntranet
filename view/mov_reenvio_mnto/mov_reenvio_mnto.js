var detalles = [];
var documentos = [];

function init() {
   
}

$(document).ready(function(){

    $('#frmmov_reenvio_mnto').parsley();

    console.log("1");
    cmbstipo_documento_codigo__init();
    dtpdguia_fecha_reenvio__init();
    pgmanifiesto_cmbsagente_codigo__init();
    pgmanifiesto_cmbstipo_servicio_codigo__init();
    pgmanifiesto_cmbsruta_servicio_codigo__init();
    pgmanifiesto_cmbsproveedor_codigo__init();
    pgmanifiesto_cmbstipo_transporte_codigo__init();
    dtpdmanifiesto_fecha_salida__init();
    pgmanifiesto_txtsmanifiesto_hora_salida__init();
    cmbsdestino_empresa_razon_social__init();
    cmbsdestino_departamento_codigo__init();
    cmbsdestino_provincia_codigo__init();
    cmbsdestino_distrito_codigo__init();


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
                console.log(data);

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
    function cmbsremite_departamento_codigo__init(){
        $("#cmbsremite_departamento_codigo").html("");
        $("#cmbsremite_departamento_codigo").selectpicker("refresh");
        $.post("../../controller/servicio.php?op=ctrl_apr_web_ubigeo_dpto_select", function(data, status){
            $("#cmbsremite_departamento_codigo").html(data);
            $("#cmbsremite_departamento_codigo").selectpicker("refresh");
        });
    }

    /*  OBJETO: cmbsremite_provincia_codigo METODO: INIT */
    function cmbsremite_provincia_codigo__init(psdepartamento_codigo){
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
    function cmbsremite_distrito_codigo__init(psprovincia_codigo){
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

    /*  OBJETO: cmbsdestino_empresa_razon_social ----------- METODO: INIT */
    function cmbsdestino_empresa_razon_social__init(){
        $("#cmbsdestino_empresa_razon_social").html("");
        $.post("../../controller/servicio.php?op=ctrl_apr_web_destinatario_select", function(data, status){
            $("#cmbsdestino_empresa_razon_social").html(data);
            $("#cmbsdestino_empresa_razon_social").selectpicker("refresh");
        });
    }

    /*  OBJETO: pgmanifiesto_txtsmanifiesto_hora_salida ----------- METODO: INIT */
    function pgmanifiesto_txtsmanifiesto_hora_salida__init(){
        var dfecha = new Date();
        var lshora = dfecha.getHours();
        var lsminutos = dfecha.getMinutes();
    
        lshora = lshora = (lshora < 10 ? '0' : '') + lshora;
        lsminutos = lsminutos = (lsminutos < 10 ? '0' : '') + lsminutos;
    
        $("#pgmanifiesto_txtsmanifiesto_hora_salida").val(lshora + ":" + lsminutos);
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

                $.post("../../controller/sun_departamento.php?caso=ctrl_select", function(data, status){
                    $("#cmbsdestino_departamento_codigo").html(data);
                    $("#cmbsdestino_departamento_codigo").val(lsdepartamento_codigo);
                    $("#cmbsdestino_departamento_codigo").selectpicker("refresh");
                });
        
                $("#cmbsdestino_provincia_codigo").html("");
                $("#cmbsdestino_provincia_codigo").selectpicker("refresh");
                $.post("../../controller/sun_provincia.php?caso=ctrl_select",{psdepartamento_codigo : lsdepartamento_codigo}, function(data, status){
                    $("#cmbsdestino_provincia_codigo").html(data);
                    $("#cmbsdestino_provincia_codigo").val(lsprovincia_codigo);
                    $("#cmbsdestino_provincia_codigo").selectpicker("refresh");
                });
                        
                $("#cmbsdestino_distrito_codigo").html("");
                $("#cmbsdestino_distrito_codigo").selectpicker("refresh");
                $.post("../../controller/sun_distrito.php?caso=ctrl_select",
                    {psprovincia_codigo : lsprovincia_codigo}, 
                    function(data, status){
                        $("#cmbsdestino_distrito_codigo").html(data);
                        $("#cmbsdestino_distrito_codigo").val(lsdistrito_codigo);
                        $("#cmbsdestino_distrito_codigo").selectpicker("refresh");
                    }
                );

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

        cmbsdestino_provincia_codigo__init();
        cmbsdestino_distrito_codigo__init();
        $("#cmbsdestino_departamento_codigo option:selected").each(function () {
            lsdepartamento_codigo = $(this).val();
            $.post("../../controller/sun_provincia.php?op=ctrl_select", {
                psdepartamento_codigo:lsdepartamento_codigo}, 
                function(data, status){
                    $("#cmbsdestino_provincia_codigo").html(data);
                    $("#cmbsdestino_provincia_codigo").selectpicker("refresh");
             });
        });
    });

    /*  OBJETO: cmbsdestino_provincia_codigo METODO: CHANGE */
    $("#cmbsdestino_provincia_codigo").change(function(){
        cmbsdestino_distrito_codigo__init();
        $("#cmbsdestino_provincia_codigo option:selected").each(function () {
            lsprovincia_codigo = $(this).val();
            $.post("../../controller/servicio.php?op=ctrl_apr_web_ubigeo_select", 
                {psprovincia_codigo : lsprovincia_codigo}, 
                function(data, status){
                    $("#cmbsdestino_distrito_codigo").html(data);
                    $("#cmbsdestino_distrito_codigo").selectpicker("refresh");
                }
            );
        });
    });

    /*  OBJETO: pgmanifiesto_cmbsagente_codigo ---------- METODO: CHANGE */
    $("#pgmanifiesto_cmbsagente_codigo").change(function(){
        $("#pgmanifiesto_cmbsagente_codigo option:selected").each(function () {
            
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
        
                $.post("../../controller/sun_departamento.php?caso=ctrl_select", 
                    {pstipo_servicio_codigo : lstipo_servicio_codigo}, 
                    function(data, status){
                        $("#pgmanifiesto_cmbsruta_servicio_codigo").html(data);
                        $("#pgmanifiesto_cmbsruta_servicio_codigo").val(lsruta_servicio_codigo);
                        $("#pgmanifiesto_cmbsruta_servicio_codigo").selectpicker("refresh");
                    }
                );
            });
        });  

        $("#pgmanifiesto_txtsmanifiesto_observacion").val("");
        $("#pgmanifiesto_txtsmanifiesto_observacion").focus();
    });

    /*  OBJETO: pgmanifiesto_cmbstipo_servicio_codigo ------------ METODO: CHANGE */
    $("#pgmanifiesto_cmbstipo_servicio_codigo").change(function(){
        $("#pgmanifiesto_cmbsruta_servicio_codigo").html("");
        $("#pgmanifiesto_cmbsruta_servicio_codigo").selectpicker("refresh");
        $("#pgmanifiesto_cmbstipo_servicio_codigo option:selected").each(function () {
            lstipo_servicio_codigo = $(this).val();
            $.post("../../controller/servicio.php?op=ctrl_apr_web_ruta_servicio_select", {pstipo_servicio_codigo : lstipo_servicio_codigo}, function(data, status){
                $("#pgmanifiesto_cmbsruta_servicio_codigo").html(data);
                $("#pgmanifiesto_cmbsruta_servicio_codigo").selectpicker("refresh");
             });
        });
    });


});

/*  OBJETO: cmbsdestino_departamento_codigo
        METODO: INIT
*/
function cmbsdestino_departamento_codigo__init(){

    $("#cmbsdestino_departamento_codigo").html("");
    $.post("../../controller/sun_departamento.php?caso=ctrl_select", 
        {}, 
        function(data, status){
            $("#cmbsdestino_departamento_codigo").html(data);
            $("#cmbsdestino_departamento_codigo").selectpicker("refresh");
        }
    );
}

/*  OBJETO: cmbsdestino_provincia_codigo ---------- METODO: INIT */
function cmbsdestino_provincia_codigo__init(){
    $("#cmbsdestino_provincia_codigo").html("");
    $("#cmbsdestino_provincia_codigo").selectpicker("refresh");
}

/*  OBJETO: cmbsdestino_distrito_codigo
    METODO: INIT
*/
function cmbsdestino_distrito_codigo__init(){
    $("#cmbsdestino_distrito_codigo").html("");
    $("#cmbsdestino_distrito_codigo").selectpicker("refresh");
}

/*  OBJETO: cmbstipo_documento_codigo --------- METODO: INIT */
function cmbstipo_documento_codigo__init(){
    
    $("#cmbstipo_documento_codigo").html("");
    lstipo_documento_sunat = "";
    $.post("../../controller/servicio.php?op=ctrl_apr_web_tipo_documento_select", function(data, status){
        $("#cmbstipo_documento_codigo").html(data);
        $("#cmbstipo_documento_codigo").selectpicker("refresh");

    });
}

/*  OBJETO: pgdocumento_cmbstipo_documento_codigo ---------- METODO: INIT */
function fxpgdocumento_cmbstipo_documento_codigo__init(){
    $("#pgdocumento_cmbstipo_documento_codigo").html("");
    lstipo_documento_sunat = "";
    $.post("../../controller/servicio.php?op=ctrl_apr_web_tipo_documento_select", function(data, status){
        $("#pgdocumento_cmbstipo_documento_codigo").html(data);
        $("#pgdocumento_cmbstipo_documento_codigo").selectpicker("refresh");

    });
}

/*  OBJETO: dtpdguia_fecha_reenvio ---------- METODO: INIT */    
function dtpdguia_fecha_reenvio__init(){
    $("#dtpdguia_fecha_reenvio").datepicker({
        language: "es",
        todayBtn: "linked",
        format: "dd/mm/yyyy",
        multidate: false,
        todayHighlight: true,
        autoclose: true,

    }).datepicker("setDate", new Date());
}

/*  OBJETO: dmanifiesto_fecha_salida --------- METODO: INIT */    
function dtpdmanifiesto_fecha_salida__init(){
    $("#pgmanifiesto_dtpdmanifiesto_fecha_salida").datepicker({
        language: "es",
        todayBtn: "linked",
        format: "dd/mm/yyyy",
        multidate: false,
        todayHighlight: true,
        autoclose: true

    }).datepicker("setDate", new Date());
}    

/*  OBJETO: txtsguia_serie ----------- METODO: ONBLUR */
function txtsguia_serie__onblur(pobjeto){
    while (pobjeto.value.length<3) 
        pobjeto.value = "0"+pobjeto.value;
}  
/* OBJETO: txtscorrelativo_serie ---------- METODO: ONBLUR */
function txtsguia_correlativo__onblur(pobjeto){
    while (pobjeto.value.length<6) 
        pobjeto.value = "0"+pobjeto.value;
}


/*  OBJETO: pgdocumento_txtstipo_documento_codigo  ---------- METODO: INIT */
function fxpgdocumento_txtstipo_documento_codigo__init(){
    $("#pgdocumento_txtstipo_documento_codigo").html("");
    $.post("../../controller/servicio.php?op=ctrl_apr_web_tipo_documento_select", function(data, status){
        $("#pgdocumento_txtstipo_documento_codigo").html(data);
        $("#pgdocumento_txtstipo_documento_codigo").selectpicker("refresh");
    });
}    

/*  OBJETO: pgmanifiesto_cmbsagente_codigo ----------- METODO: INIT */
function pgmanifiesto_cmbsagente_codigo__init(){
    $("#pgmanifiesto_cmbsagente_codigo").html("");
    $.post("../../controller/servicio.php?op=ctrl_apr_web_agente_select", function(data, status){
        $("#pgmanifiesto_cmbsagente_codigo").html(data);
        $("#pgmanifiesto_cmbsagente_codigo").selectpicker("refresh");
    });
}

/*  OBJETO: pgmanifiesto_cmbsagente_codigo ----------- METODO: INIT */
function pgmanifiesto_cmbstipo_servicio_codigo__init(){
    $("#pgmanifiesto_cmbstipo_servicio_codigo").html("");
    $.post("../../controller/servicio.php?op=ctrl_apr_web_tipo_servicio_select", function(data, status){
        $("#pgmanifiesto_cmbstipo_servicio_codigo").html(data);
        $("#pgmanifiesto_cmbstipo_servicio_codigo").selectpicker("refresh");
    });
}

/*  OBJETO: pgmanifiesto_cmbsruta_servicio_codigo ------------ METODO: INIT */
function pgmanifiesto_cmbsruta_servicio_codigo__init(){
    $("#pgmanifiesto_cmbsruta_servicio_codigo").html("");
    $("#pgmanifiesto_cmbsruta_servicio_codigo").selectpicker("refresh");
}

/*  OBJETO: pgmanifiesto_cmbsproveedor_codigo ------------ METODO: INIT */
function pgmanifiesto_cmbsproveedor_codigo__init(){
    $("#pgmanifiesto_cmbsproveedor_codigo").html("");
    $.post("../../controller/servicio.php?op=ctrl_apr_web_proveedor_select", function(data, status){
        $("#pgmanifiesto_cmbsproveedor_codigo").html(data);
        $("#pgmanifiesto_cmbsproveedor_codigo").selectpicker("refresh");
    });
}

/*  OBJETO: pgmanifiesto_cmbstipo_transporte_codigo ----------- METODO: INIT */
function pgmanifiesto_cmbstipo_transporte_codigo__init(){
    $("#pgmanifiesto_cmbstipo_transporte_codigo").html("");
    $.post("../../controller/servicio.php?op=ctrl_apr_web_tipo_transporte_select", function(data, status){
        $("#pgmanifiesto_cmbstipo_transporte_codigo").html(data);
        $("#pgmanifiesto_cmbstipo_transporte_codigo").selectpicker("refresh");
    });
}

/*  OBJETO: bntcancelar_todo ----------- METODO: CLICK */
$(document).on("click","#bntcancelar_todo", function(){
    location.href = "../../view/mov_reenvio_vista/";
});

/*  OBJETO: btnguardar_todo ----------- METODO: CLICK */
$(document).on("click","#btnguardar_todo", function(){
    console.log("0");

    /* if ($("#frmmov_reenvio_mnto").parsley().isValid()){ */
        console.log("PASO: 1 ");
        swal({
            title: "Guardar?",
            text: "Está seguro de guardar el reenvío del documento",
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
                if (result==true) {
                    console.log("PASO: 3 ");
                    /* Inicio Guardar Guia ALDO */
                    var pstipo_documento_codigo = $("#cmbstipo_documento_codigo").val();
                    var psguia_serie = $("#txtsguia_serie").val();
                    var psguia_correlativo = $("#txtsguia_correlativo").val();
                    var psguia_item = "";
                    var pdguia_fecha_reenvio = $("#dtpdguia_fecha_reenvio").val();
    
                    var psdestino_empresa_razon_social = $("#cmbsdestino_empresa_razon_social option:selected").text();
                    var psdestino_empresa_direccion = $("#txtsdestino_empresa_direccion").val();
                    var psdestino_distrito_codigo = $("#cmbsdestino_distrito_codigo").val();
                    var psdestino_provincia_codigo = $("#cmbsdestino_provincia_codigo").val();
                    var psdestino_departamento_codigo = $("#cmbsdestino_departamento_codigo").val();
                    var psdestino_atencion = $("#txtsdestino_atencion").val();
    
                    var psagente_codigo = $("#pgmanifiesto_cmbsagente_codigo").val();
                    var pstipo_servicio_codigo = $("#pgmanifiesto_cmbstipo_servicio_codigo").val();
                    var psruta_servicio_codigo = $("#pgmanifiesto_cmbsruta_servicio_codigo").val();
                    var psproveedor_codigo = $("#pgmanifiesto_cmbsproveedor_codigo").val();
                    var pstipo_transporte_codigo = $("#pgmanifiesto_cmbstipo_transporte_codigo").val();
                    var pdmanifiesto_fecha_salida = $("#pgmanifiesto_dtpdmanifiesto_fecha_salida").val();
                    var psmanifiesto_hora_salida = $("#pgmanifiesto_txtsmanifiesto_hora_salida").val() + ":00";
                    var psmanifiesto_despachador = $("#pgmanifiesto_txtsmanifiesto_despachador").val();
                    var psmanifiesto_proveedor_documento = $("#pgmanifiesto_txtsmanifiesto_proveedor_documento").val();
    
                    var pscodigo_aleatorio = "";
                    var psauditoria_usuario = $("#usercontactocodigox").val();
    
                    psdestino_empresa_razon_social = psdestino_empresa_razon_social.toUpperCase();
                    psdestino_empresa_direccion = psdestino_empresa_direccion.toUpperCase();
                    psdestino_atencion = psdestino_atencion.toUpperCase();
                    
                    psruta_servicio_codigo = null ? '' : psruta_servicio_codigo;
    
                    psmanifiesto_despachador = psmanifiesto_despachador.toUpperCase();
                    psmanifiesto_proveedor_documento = psmanifiesto_proveedor_documento.toUpperCase();
    
                    var psmanifiesto_fecha_salida = "";
                    psmanifiesto_fecha_salida = psmanifiesto_fecha_salida.concat(pdmanifiesto_fecha_salida.substr(6,4), pdmanifiesto_fecha_salida.substr(3,2), pdmanifiesto_fecha_salida.substr(0,2));
                    
                    var psguia_fecha_reenvio = "";
                    psguia_fecha_reenvio      = psguia_fecha_reenvio.concat(pdguia_fecha_reenvio.substr(6,4), pdguia_fecha_reenvio.substr(3,2), pdguia_fecha_reenvio.substr(0,2));
                
    /*                 console.log("pstipo_documento_codigo: " + pstipo_documento_codigo);
                    console.log("psguia_serie: " + psguia_serie);
                    console.log("psguia_correlativo: " + psguia_correlativo);
                    console.log("psguia_fecha_reenvio: " + psguia_fecha_reenvio);
                    console.log(" ");
                    console.log("psdestino_empresa_razon_social: " + psdestino_empresa_razon_social);
                    console.log("psdestino_empresa_direccion: " + psdestino_empresa_direccion);
                    console.log("psdestino_distrito_codigo: " + psdestino_distrito_codigo);
                    console.log("psdestino_provincia_codigo: " + psdestino_provincia_codigo);
                    console.log("psdestino_departamento_codigo: " + psdestino_departamento_codigo);
                    console.log("psdestino_atencion: " + psdestino_atencion);
    
                    console.log("psagente_codigo: " + psagente_codigo);
                    console.log("pstipo_servicio_codigo: " + pstipo_servicio_codigo);
                    console.log("psruta_servicio_codigo: " + psruta_servicio_codigo);
                    console.log("psproveedor_codigo: " + psproveedor_codigo);
                    console.log("pstipo_transporte_codigo: " + pstipo_transporte_codigo);
                    console.log("pdmanifiesto_fecha_salida: " + psmanifiesto_fecha_salida);
                    console.log("pdmanifiesto_hora_salida: " + psmanifiesto_hora_salida);
                    console.log("psmanifiesto_despachador: " + psmanifiesto_despachador);
                    console.log("psmanifiesto_proveedor_documento: " + psmanifiesto_proveedor_documento);
    
                    console.log("psauditoria_usuario: " + psauditoria_usuario); */
    
                    $.post("../../controller/log_guia_reenvio.php?op=ctrl_registro_insert",{
                        pstipo_documento_codigo:pstipo_documento_codigo,
                        psguia_serie:psguia_serie,
                        psguia_correlativo:psguia_correlativo,
                        psguia_item:psguia_item,
                        pdguia_fecha_reenvio:psguia_fecha_reenvio,
    
                        psdestino_empresa_razon_social:psdestino_empresa_razon_social,
                        psdestino_empresa_direccion:psdestino_empresa_direccion,
                        psdestino_distrito_codigo:psdestino_distrito_codigo,
                        psdestino_provincia_codigo:psdestino_provincia_codigo,
                        psdestino_departamento_codigo:psdestino_departamento_codigo,
                        psdestino_atencion:psdestino_atencion,
    
                        psagente_codigo:psagente_codigo,
                        pstipo_servicio_codigo: pstipo_servicio_codigo,
                        psruta_servicio_codigo: psruta_servicio_codigo,
                        psproveedor_codigo: psproveedor_codigo,
                        pstipo_transporte_codigo: pstipo_transporte_codigo,
                        pdmanifiesto_fecha_salida: psmanifiesto_fecha_salida,
                        psmanifiesto_hora_salida:psmanifiesto_hora_salida,
                        psmanifiesto_despachador:psmanifiesto_despachador,
                        psmanifiesto_proveedor_documento: psmanifiesto_proveedor_documento,
    
                        psauditoria_usuario:psauditoria_usuario
                    },function(data, status){
                        console.log(data);
                        swal(
                            "Guardar!",
                            "La información se registró correctamente.",
                            "success"
                        );
                        /* location.href = "../../view/mov_registro/"; */
        
                    });
    
                    console.log("PASO: 5 ");
    
                }
        });
    
    /* } */
    

});

init();