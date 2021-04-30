<div class="modal fade" id="modalconfirma" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="lbltitle">CONFIRMACION</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div>
                <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">PERSONA DE CONFIRMACION</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="txtsguia_confirma_persona" name="txtsguia_confirma_persona" type="text" style="text-transform:uppercase;" placeholder="Nombres y apellidos">
                        </div>
                    </div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">DOCUMENTO IDENTIDAD</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="txtsguia_confirma_persona_documento" name="txtsguia_confirma_persona_documento" type="text" style="text-transform:uppercase;" placeholder="Ingrese numero...">
                        </div>
                    </div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">FECHA</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="dtpdguia_confirma_fecha" name="dtpdguia_confirma_fecha" data-parsley-required="true">
                        </div>
                    </div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">HORA</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="time" id="txtsguia_confirma_hora" name="txtsguia_confirma_hora">
                        </div>
                    </div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">NRO DE VISITAS</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="number" min="1" step="1" value = "1.00" id="spnsguia_confirma_veces_visita" name="spnsguia_confirma_veces_visita" placeholder="" data-parsley-required="false">
                        </div>
                    </div>

                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="cmbsguia_confirma_estado">ESTADO DE CONFIRMACION</label>
                        <div class="col-md-8 col-sm-8">
                            <select class="selectpicker form-control" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsguia_confirma_estado" name="cmbsguia_confirma_estado" placeholder="" data-parsley-required="false"></select>
                        </div>
                    </div>

                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">OBSERVACION</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="txtsguia_confirma_observacion" name="txtsguia_confirma_observacion" type="text" style="text-transform:uppercase;" placeholder="Anotaciones adicionales">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Cerrar</a>
                <a href="javascript:;" class="btn btn-primary" id="btnguardarconfirmacion">Guardar</a>
            </div>
        </div>
    </div>
</div>