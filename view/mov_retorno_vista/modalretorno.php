<div class="modal fade" id="modalretorno" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="lbltitle">RETORNO DE DOCUMENTO: </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">FECHA</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="dtpdguia_retorno_fecha" name="dtpdguia_retorno_fecha" data-parsley-required="true">
                        </div>
                    </div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">HORA</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="time" id="txtsguia_retorno_hora" name="txtsguia_retorno_hora">
                        </div>
                    </div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">NRO DE REPORTE</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" style="text-transform:uppercase;" id="txtsguia_numero_reporte" name="txtsguia_numero_reporte">
                        </div>
                    </div>

                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">OBSERVACION</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="txtsguia_retorno_observacion" name="txtsguia_retorno_observacion" type="text" style="text-transform:uppercase;" placeholder="Anotaciones adicionales">
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Cerrar</a>
                <a href="javascript:;" class="btn btn-primary" id="btnguardarretorno">Guardar</a>
            </div>
        </div>
    </div>
</div>