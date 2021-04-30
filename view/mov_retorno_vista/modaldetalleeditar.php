<div class="modal modal-fade" id="modaldetalleeditar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">EDITAR DETALLE PRODUCTO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="form-group row m-b-15">
                    <label class="col-md-4 col-sm-4 col-form-label" for="pgdetalle_cbosproducto_codigo_edit">PRODUCTO</label>
                    <div class="col-md-8 col-sm-8">
                        <select class="selectpicker form-control" data-size="10" data-live-search="true" data-style="btn-white" id="pgdetalle_cbosproducto_codigo_edit" name="pgdetalle_cbosproducto_codigo_edit" placeholder="" data-parsley-required="true"></select>
                    </div>
                </div>
                <div class="form-group row m-b-15">
                    <label class="col-md-4 col-sm-4 col-form-label" for="pgdetalle_txtsproducto_descripcion_edit">DESCRIPCION</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="text" id="pgdetalle_txtsproducto_descripcion_edit" name="pgdetalle_txtsproducto_descripcion_edit" style="text-transform:uppercase" placeholder="" data-parsley-required="true">
                    </div>
                </div>
                <div class="form-group row m-b-15">
                    <label class="col-md-4 col-sm-4 col-form-label" for="pgdetalle_spnnproducto_cantidad_edit">CANTIDAD</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="number" data-decimals="2" min="0" step="0.01" value = "0.00" id="pgdetalle_spnnproducto_cantidad_edit" name="pgdetalle_spnnproducto_cantidad_edit" placeholder="" data-parsley-required="false">

                    </div>
                </div>
                <div class="form-group row m-b-15">
                    <label class="col-md-4 col-sm-4 col-form-label" for="pgdetalle_spnnproducto_peso_edit">PESO</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="number" data-decimals="2" min="0" step="0.01" value = "0.00" id="pgdetalle_spnnproducto_peso_edit" name="pgdetalle_spnnproducto_peso_edit" placeholder="" data-parsley-required="false">
                    </div>
                </div>
                <div class="form-group row m-b-15">
                    <label class="col-md-4 col-sm-4 col-form-label" for="pgdetalle_spnnproducto_costo_edit">COSTO MINIMO</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="number" data-decimals="2" min="0" step="0.01" value = "0.00" id="pgdetalle_spnnproducto_costo_edit" name="pgdetalle_spnnproducto_costo_edit" placeholder="" data-parsley-required="false">
                    </div>
                </div>
                <div class="form-group row m-b-15">
                    <label class="col-md-4 col-sm-4 col-form-label" for="pgdetalle_txtsproducto_unidad_edit">UNIDAD</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="text" disabled id="pgdetalle_txtsproducto_unidad_edit" name="pgdetalle_txtsproducto_unidad_edit" placeholder="" data-parsley-required="false">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <a href="javascript:;" class="btn btn-primary" id="btnguardardetalleeditar">GUARDAR</a>
                <a href="javascript:;" class="btn btn-white" data-dismiss="modal">CERRAR</a>
            </div>
        </div>
    </div>
</div>