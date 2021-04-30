function init(){
   
}

$(document).ready(function(){
    $("#modalloading").modal('show');
    setTimeout(function() {$("#modalloading").modal('hide');}, 3000);
});

init();