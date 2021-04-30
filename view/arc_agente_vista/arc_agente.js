//********************************************************************************************************
// TABLA: arc_agente
//********************************************************************************************************

function init(){
}

$(document).ready(function(){

	mobjetos__inicializar();

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


/*  OBJETO: btnregistro_nuevo ----------- METODO: CLICK */
$(document).on("click","#btnregistro_nuevo", function(){

	mobjetos__inicializar();
	$("#modal_registro").modal("show");
});

/*  OBJETO: btnregistro_guardar ----------- METODO: CLICK */
$(document).on("click","#btnregistro_guardar", function(){

	var lsagente_codigo = "";
	var lsagente_nombre = $("#txtsagente_nombre").val();
	var lsdocumento_numero = $("#txtsdocumento_numero").val();
	var lsagente_telefono_numero = $("#txtsagente_telefono_numero").val();
	var lsagente_celular_numero = $("#txtsagente_celular_numero").val();
	var lstipo_servicio_codigo = "NAC";
	var lsruta_servicio_codigo = $("#cmbsdepartamento_codigo").val();
	var lsagente_direccion = $("#txtsagente_direccion").val();
	var lsagente_correo_electronico = "";
	var lsagente_estado = ($("#chksagente_estado").is( ":checked" ) ? "1": "0");

	var lsauditoria_usuario = $("#VGL_susuario_codigo").val();

	/*  INICIO: TRANSFORMACION DE VARIABLES */
	lsagente_codigo = lsagente_codigo.toUpperCase();
	lsagente_nombre = lsagente_nombre.toUpperCase();
	lsagente_direccion = lsagente_direccion.toUpperCase();

	/*  FIN: TRANSFORMACION DE VARIABLES */

	/*  INICIO: VISUALIZAR CONTENIDO DE VARIABLES ----- CONSOLE */
	console.log("lsagente_codigo: " + lsagente_codigo);
	console.log("lsagente_nombre: " + lsagente_nombre);
	console.log("lsdocumento_numero: " + lsdocumento_numero);
	console.log("lsagente_telefono_numero: " + lsagente_telefono_numero);
	console.log("lsagente_celular_numero: " + lsagente_celular_numero);
	console.log("lstipo_servicio_codigo: " + lstipo_servicio_codigo);
	console.log("lsruta_servicio_codigo: " + lsruta_servicio_codigo);
	console.log("lsagente_direccion: " + lsagente_direccion);
	console.log("lsagente_correo_electronico: " + lsagente_correo_electronico);
	console.log("lsagente_estado: " + lsagente_estado);
	console.log("lsauditoria_usuario: " + lsauditoria_usuario);
	/*  FIN: VISUALIZAR CONTENIDO DE VARIABLES ----- CONSOLE */


	/*  INICIO: FUNCION PARA GRABAR ----- CONTROLADOR */
	$.post("../../controller/arc_agente.php?caso=ctrl_agregar",{
		psagente_codigo : lsagente_codigo,
		psagente_nombre : lsagente_nombre,
		psdocumento_numero : lsdocumento_numero,
		psagente_telefono_numero : lsagente_telefono_numero,
		psagente_celular_numero : lsagente_celular_numero,
		pstipo_servicio_codigo : lstipo_servicio_codigo,
		psruta_servicio_codigo : lsruta_servicio_codigo,
		psagente_direccion : lsagente_direccion,
		psagente_correo_electronico : lsagente_correo_electronico,
		psagente_estado : lsagente_estado,
		psauditoria_usuario : lsauditoria_usuario
	},function(data, status)
	{
		$("#grdregistro_vista_data").DataTable().ajax.reload();
		$("#modal_registro").modal("hide");

		swal(
			"Confirmación!",
			"El registro se grabó correctamente.",
			"success"
	);
	});
	/*  FIN: FUNCION PARA GRABAR ----- CONTROLADOR */
});
/*  INICIO: FUNCION PARA OBTENER DATOS DE LA TABLA */
function mgrilla_item_obtener_datos_01(){
	tblregistro_vista_data = $("#grdregistro_vista_data").dataTable({
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
			{
				extend: "pdfHtml5",
				orientation: "landscape",
				download: "open",
				pageSize: "A4",
				text: "PDF"
			},
			"colvis"
		],
		"ajax":{
			url: "../../controller/arc_agente.php?caso=ctrl_obtener_vista_00",
			type : "post",
			dataType : "json",
			error: function(e){
				console.log(e.responseText);
			}
		},
        fixedColumns:   {
            leftColumns: 1,
            rightColumns: 1
		},
        "sScrollX": '100%',
        "sScrollXInner": "120%",
		"bDestroy": true,
		"responsive": false,
		"bInfo":true,
		"iDisplayLength": 10,
		"language": { "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json" }
	}).DataTable();
}
/*  FIN: FUNCION PARA OBTENER DATOS DE LA TABLA */

/*  INICIO: FUNCION PARA ELIMINAR UN REGISTRO */
function mgrilla_item_eliminar(scodigo_aleatorio){
	var lscodigo_aleatorio = scodigo_aleatorio.toString().replace("/","").slice(0, -1);

	var lsauditoria_usuario =  $("#VGL_susuario_codigo").val();

	console.log("lscodigo_aleatorio : " + lscodigo_aleatorio);
	console.log("lsauditoria_usuario : " + lsauditoria_usuario);

	swal({
		title: "Eliminar",
		text: "¿Está seguro de eliminar el registro seleccionado?",
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

			/** BUSCAR SI OTRAS TABLAS DEPENDEN DE ESTE REGISTRO */
			$.post("../../controller/arc_agente.php?caso=ctrl_buscar_dependencia",{
					pscodigo_aleatorio:lscodigo_aleatorio}, 
			function(data, status){
				data = JSON.parse(data);
				/** console.log(data); */
				var lnnumero_registros = data.nnumero_registros;
				/** console.log("lnnumero_registros: " + lnnumero_registros); */
				if (lnnumero_registros == "0")
				{

					$.post("../../controller/arc_agente.php?caso=ctrl_eliminar",{
							pscodigo_aleatorio:lscodigo_aleatorio,
							psauditoria_usuario:lsauditoria_usuario,
					},function(data, status){

						$("#grdregistro_vista_data").DataTable().ajax.reload();

						swal(
							"Eliminar!",
							"El registro se elimin� correctamente.",
							"success"
						);
					});

				}
				else
				{
					swal(
						"Aviso!",
						"No puede eliminar este registro porque est� asociado con otra informaci�n.",
						"success"
					);
				};
			});
		}
	});
}
/*  FIN: FUNCION PARA ELIMINAR UN REGISTRO */

/* OBJETO: grilla ------------ METODO: - */
function mgrilla_item_seleccion_fondocolor(){
	$("#grdregistro_vista_data tbody").on( "click", "tr", function () {

		if ( $(this).hasClass("selected") )
		{
			$(this).removeClass("selected");
		}
		else
		{
			tblregistro_vista_data.$("tr.selected").removeClass("selected");
			$(this).addClass("selected");
		}
	} );
}

/* OBJETO: Formulario ------------ METODO: INIT */
function mobjetos__inicializar(){
	
	$("#txtsagente_nombre").val("");
	$("#txtsdocumento_numero").val("");
	$("#txtsagente_telefono_numero").val("");
	$("#txtsagente_celular_numero").val("");
	cmbsdepartamento_codigo__inicializar();
	$("#txtsagente_direccion").val("");
	$("#chksagente_estado").prop('checked', true);

	$("#txtsagente_nombre").focus();

}

/*  OBJETO: cmbNombreDelCampo ------------ METODO: INIT */
function cmbNombreDelCampo__inicializar(){
	/* $("#cmbNombreDelCampo").html(""); */
	/* $("#cmbNombreDelCampo").selectpicker("refresh"); */
}
/*  OBJETO: cmbNombreDelCampo ------------ METODO: CHANGE */
/*$("#cmbNombreDelCampo").change(function(){ */
/*}); */


/*  OBJETO: cmbsdepartamento_codigo ------------ METODO: INIT */
function cmbsdepartamento_codigo__inicializar(){
    $("#cmbsdepartamento_codigo").html("");
    
    $.post("../../controller/sun_departamento.php?caso=ctrl_select", {}, 
        function(data, status){
            console.log(data);
            $("#cmbsdepartamento_codigo").html(data);
            $("#cmbsdepartamento_codigo").selectpicker("refresh");
    });
}


init();
