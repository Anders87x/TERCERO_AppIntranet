<div class="modal fade" id="modalproveedor" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">EDITAR PROVEEDOR</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="form-group row m-b-15">
                    <label class="col-md-4 col-sm-4 col-form-label" for="pgmanifiesto_cmbsproveedor_codigo2">PROVEEDOR DEL SERVICIO</label>
                    <div class="col-md-8 col-sm-8">
                        <select class="selectpicker form-control" data-size="10" data-live-search="true" data-style="btn-white" id="pgmanifiesto_cmbsproveedor_codigo2" name="pgmanifiesto_cmbsproveedor_codigo2" placeholder="" data-parsley-required="true"></select>
                    </div>
                </div>

                <div class="form-group row m-b-15">
                    <label class="col-md-4 col-sm-4 col-form-label" for="pgmanifiesto_cmbstipo_transporte_codigo2">TIPO DE TRANSPORTE</label>
                    <div class="col-md-8 col-sm-8">
                        <select class="selectpicker form-control" data-size="10" data-live-search="true" data-style="btn-white" id="pgmanifiesto_cmbstipo_transporte_codigo2" name="pgmanifiesto_cmbstipo_transporte_codigo2" placeholder="" data-parsley-required="true"></select>
                    </div>
                </div>

                <div class="form-group row m-b-15">
                    <label class="col-md-4 col-sm-4 col-form-label" for="pgmanifiesto_dtpdmanifiesto_fecha_salida2">FECHA DE SALIDA</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="text" id="pgmanifiesto_dtpdmanifiesto_fecha_salida2" name="pgmanifiesto_dtpdmanifiesto_fecha_salida2" data-parsley-required="true">
                    </div>
                </div>

                <div class="form-group row m-b-15">
                    <label class="col-md-4 col-sm-4 col-form-label" for="pgmanifiesto_spnnmanifiesto_dias_transito2">DIAS DE TRANSITO</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="number" data-decimals="0" min="0" step="1" value = "0" id="pgmanifiesto_spnnmanifiesto_dias_transito2" name="pgmanifiesto_spnnmanifiesto_dias_transito2" placeholder="" data-parsley-required="false">
                    </div>
                </div>

                <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="pgmanifiesto_txtsmanifiesto_despachador2">DESPACHADOR</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="text" style="text-transform:uppercase" id="pgmanifiesto_txtsmanifiesto_despachador2" name="pgmanifiesto_txtsmanifiesto_despachador2" placeholder="" data-parsley-required="true">
                    </div>
                </div>

                <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="pgmanifiesto_txtsmanifiesto_proveedor_documento2">FAC/BOL/PROVEEDOR</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="text" style="text-transform:uppercase" id="pgmanifiesto_txtsmanifiesto_proveedor_documento2" name="pgmanifiesto_txtsmanifiesto_proveedor_documento2" placeholder="" data-parsley-required="false">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-primary" id="btnguardarproveedor">GUARDAR</a>
                <a href="javascript:;" class="btn btn-white" data-dismiss="modal">CERRAR</a>
            </div>
        </div>
    </div>
</div>