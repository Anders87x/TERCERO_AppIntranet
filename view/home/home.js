function init(){

}

$(document).ready(function(){

    $('#cmbsguia_fecha_recepcion_mes').select2();
    $('#cmbsguia_fecha_recepcion_annio').select2();

    var dfecha_servidor = new Date();
    var lsguia_fecha_recepcion_mes = dfecha_servidor.getMonth()+1;
    var lsguia_fecha_recepcion_annio = dfecha_servidor.getUTCFullYear();

    lsguia_fecha_recepcion_mes = lsguia_fecha_recepcion_mes = (lsguia_fecha_recepcion_mes < 10 ? '0' : '') + lsguia_fecha_recepcion_mes;

    $('#cmbsguia_fecha_recepcion_mes').val(lsguia_fecha_recepcion_mes).trigger('change');
    $('#cmbsguia_fecha_recepcion_annio').val(lsguia_fecha_recepcion_annio).trigger('change');

    inicio_vista(lsguia_fecha_recepcion_mes, lsguia_fecha_recepcion_annio);

});

function inicio_vista(psguia_fecha_recepcion_mes, psguia_fecha_recepcion_annio){

    var lsguia_fecha_recepcion_mes = psguia_fecha_recepcion_mes;
    var lsguia_fecha_recepcion_annio = psguia_fecha_recepcion_annio;

    paneles__init();
    
    llenarpaneles(lsguia_fecha_recepcion_mes, lsguia_fecha_recepcion_annio);
    
     $('#grd_distribucion').DataTable();

    tabla_registro_vista=$('#grd_distribucion').dataTable({
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
            url: '../../controller/servicio.php?op=ctrl_dashboard_distribucion_documentos',
            type : "post",
            dataType : "json",		
            data:{
                psguia_fecha_recepcion_mes:lsguia_fecha_recepcion_mes,
                psguia_fecha_recepcion_annio:lsguia_fecha_recepcion_annio
            },            				
            error: function(e){
                console.log(e.responseText);	
            }
        },
        "bDestroy": true,
        "responsive": false,
        "bInfo":true,
        "iDisplayLength": 10,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
            }

    }).DataTable();

}


function llenarpaneles(psguia_fecha_recepcion_mes, psguia_fecha_recepcion_annio){

    var lsguia_fecha_recepcion_mes = psguia_fecha_recepcion_mes;
    var lsguia_fecha_recepcion_annio = psguia_fecha_recepcion_annio;
    
    $.post("../../controller/servicio.php?op=ctrl_dashboard_resumen_01",{psguia_fecha_recepcion_mes:lsguia_fecha_recepcion_mes,psguia_fecha_recepcion_annio:lsguia_fecha_recepcion_annio},function(data, status){

        data = JSON.parse(data);
        $('#nnumero_documentos').html(data.nnumero_documentos);
        $('#nnumero_transito').html(data.nnumero_transito);
        $('#nporcentaje_transito').css("width :" + data.nporcentaje_transito);
        $('#nnumero_confirmados').html(data.nnumero_confirmados);
        $('#nporcentaje_confirmados').css("width :" + data.nporcentaje_confirmados);
        $('#nnumero_retornados').html(data.nnumero_retornados);
        $('#nporcentaje_retornados').css("width :" + data.nporcentaje_retornados);

    });
}

function paneles__init(){
    $('#nnumero_documentos').html(0);
    $('#nnumero_transito').html(0);
    $('#nnumero_confirmados').html(0);
    $('#nnumero_retornados').html(0);
}


$(document).on("click","#btn_buscar", function(){
    
    var lsguia_fecha_recepcion_mes = $('#cmbsguia_fecha_recepcion_mes').val();
    var lsguia_fecha_recepcion_annio = $('#cmbsguia_fecha_recepcion_annio').val();

    if (lsguia_fecha_recepcion_mes.length == 0 || lsguia_fecha_recepcion_annio.length == 0){
        Swal.fire('Datos vacios!','Por favor verificar','error');
    }else{
        inicio_vista(lsguia_fecha_recepcion_mes, lsguia_fecha_recepcion_annio);
    } 
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




init();