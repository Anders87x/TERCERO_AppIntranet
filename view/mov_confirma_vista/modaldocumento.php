<div class="modal fade" id="modaldocumento" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">NUEVO DOCUMENTO DEL CLIENTE</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="form-group row m-b-15">
                    <label class="col-md-4 col-sm-4 col-form-label" for="pgdocumento_txtstipo_documento_codigo">TIPO DOCUMENTO</label>
                    <div class="col-md-8 col-sm-8">
                        <select class="selectpicker form-control" data-size="10" data-live-search="true" data-style="btn-white" id="pgdocumento_txtstipo_documento_codigo" name="pgdocumento_txtstipo_documento_codigo" placeholder="" data-parsley-required="true"></select>
                    </div>
                </div>
                <div class="form-group row m-b-15">
                    <label class="col-md-4 col-sm-4 col-form-label" for="pgdocumento_txtscliente_guia_numero">NUMERO DOCUMENTO</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="text" style="text-transform:uppercase;" id="pgdocumento_txtscliente_guia_numero" name="pgdocumento_txtscliente_guia_numero" placeholder="" data-parsley-required="true">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-primary" id="btnguardardocumento">GUARDAR</a>
                <a href="javascript:;" class="btn btn-white" data-dismiss="modal">CERRAR</a>
            </div>
        </div>
    </div>
</div>