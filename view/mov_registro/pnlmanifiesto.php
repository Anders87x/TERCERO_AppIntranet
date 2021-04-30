<div class="tab-pane fade" id="nav-pills-tab-3">
    <div class="panel-body">
        <div class="row row-space-30">
            <div class="col-xl-6">
                <h4>DATOS DEL REPRESENTANTE</h4>
                <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="pgmanifiesto_cmbsagente_codigo">AGENTE</label>
                    <div class="col-md-8 col-sm-8">
                        <select class="selectpicker" data-width="90%" data-size="10" data-live-search="true" data-style="btn-white" id="pgmanifiesto_cmbsagente_codigo" name="pgmanifiesto_cmbsagente_codigo" placeholder="" data-parsley-required="true"></select>
                        <button class="btn btn-outline-success btn-icon btn-circle" onClick="pgmanifiesto_cmbsagente_codigo__inicializar()" data-toggle="tooltip" title="Actualizar"><i class="fas fa-spinner"></i></button>
                    </div>
                </div>

<!--                 <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="pgmanifiesto_cmbstipo_servicio_codigo">TIPO DE SERVICIO</label>
                    <div class="col-md-8 col-sm-8">
                        <select class="selectpicker" data-size="10" data-live-search="true" data-style="btn-white" id="pgmanifiesto_cmbstipo_servicio_codigo" name="pgmanifiesto_cmbstipo_servicio_codigo" placeholder="" data-parsley-required="true"></select>
                    </div>
                </div> -->

<!--                 <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="pgmanifiesto_cmbsruta_servicio_codigo">RUTA DEL DESTINO</label>
                    <div class="col-md-8 col-sm-8">
                        <select class="selectpicker" data-size="10" data-live-search="true" data-style="btn-white" id="pgmanifiesto_cmbsruta_servicio_codigo" name="pgmanifiesto_cmbsruta_servicio_codigo" placeholder="" data-parsley-required="true"></select>
                    </div>
                </div>
 -->
                <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="pgmanifiesto_txtsmanifiesto_observacion">OBSERVACIONES</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="text" style="text-transform:uppercase" id="pgmanifiesto_txtsmanifiesto_observacion" name="pgmanifiesto_txtsmanifiesto_observacion" placeholder="" data-parsley-required="false">
                        <small id="pgmanifiesto_txtsmanifiesto_observacion" class="form-text text-muted">MOSTRAR AL REPRESENTANTE</small>
                    </div>
                </div>
                
            </div>

            <div class="col-xl-6">
                <h4>DATOS DEL PROVEEDOR</h4>
                <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="pgmanifiesto_cmbsproveedor_codigo">PROVEEDOR DE SERVICIO</label>
                    <div class="col-md-8 col-sm-8">
                        <select class="selectpicker"data-width="90%" data-size="10" data-live-search="true" data-style="btn-white" id="pgmanifiesto_cmbsproveedor_codigo" name="pgmanifiesto_cmbsproveedor_codigo" placeholder="" data-parsley-required="true"></select>
                        <button class="btn btn-outline-success btn-icon btn-circle" onClick="pgmanifiesto_cmbsproveedor_codigo__inicializar()" data-toggle="tooltip" title="Actualizar"><i class="fas fa-spinner"></i></button>
                    </div>
                </div>

                <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="pgmanifiesto_cmbstipo_transporte_codigo">TIPO DE TRANSPORTE</label>
                    <div class="col-md-8 col-sm-8">
                        <select class="selectpicker" data-width="90%" data-size="10" data-live-search="true" data-style="btn-white" id="pgmanifiesto_cmbstipo_transporte_codigo" name="pgmanifiesto_cmbstipo_transporte_codigo" placeholder="" data-parsley-required="true"></select>
                        <button class="btn btn-outline-success btn-icon btn-circle" onClick="pgmanifiesto_cmbstipo_transporte_codigo__inicializar()" data-toggle="tooltip" title="Actualizar"><i class="fas fa-spinner"></i></button>
                    </div>
                </div>

                <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="pgmanifiesto_dtpdmanifiesto_fecha_salida">FECHA DE SALIDA</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="text" id="pgmanifiesto_dtpdmanifiesto_fecha_salida" name="pgmanifiesto_dtpdmanifiesto_fecha_salida" data-parsley-required="true">
                    </div>
                </div>

                <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="pgmanifiesto_spnnmanifiesto_dias_transito">DIAS DE TRANSITO</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="number" data-decimals="0" min="0" step="1" value = "0" id="pgmanifiesto_spnnmanifiesto_dias_transito" name="pgmanifiesto_spnnmanifiesto_dias_transito" placeholder="" data-parsley-required="false">
                        <small id="pgmanifiesto_spnnmanifiesto_dias_transito" class="form-text text-muted">PARA LLEGAR AL DESTINO</small>
                    </div>
                </div>

                <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="pgmanifiesto_txtsmanifiesto_despachador">DESPACHADOR</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="text" style="text-transform:uppercase" id="pgmanifiesto_txtsmanifiesto_despachador" name="pgmanifiesto_txtsmanifiesto_despachador" placeholder="" data-parsley-required="false">
                    </div>
                </div>

                <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="pgmanifiesto_txtsmanifiesto_proveedor_documento">FAC/BOL/PROVEEDOR</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="text" style="text-transform:uppercase" id="pgmanifiesto_txtsmanifiesto_proveedor_documento" name="pgmanifiesto_txtsmanifiesto_proveedor_documento" placeholder="" data-parsley-required="false">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>