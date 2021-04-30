<div class="modal fade" id="modalincidencia" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="lbltitle">REGISTRO DE INCIDENCIA</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div>
                <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">TIPO DE INCIDENCIA</label>
                        <div class="col-sm-8">
                            <select class="selectpicker" data-live-search="true" data-style="btn-white" id="cmbsguia_incidencia_tipo" name="cmbsguia_incidencia_tipo" placeholder="" data-parsley-required="true"></select> </td>
                        </div>
                    </div>
                     <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">FECHA</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="dtpdguia_incidencia_fecha" name="dtpdguia_incidencia_fecha">
                        </div>
                    </div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">HORA</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="time" id="txtsguia_incidencia_hora" name="txtsguia_incidencia_hora">
                        </div>
                    </div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">OBSERVACION</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="txtsguia_incidencia_observacion" name="txtsguia_incidencia_observacion" type="text" style="text-transform:uppercase;" placeholder="Anotaciones adicionales">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Cerrar</a>
                <a href="javascript:;" class="btn btn-primary" id="btnguardarincidencia">Guardar</a>
            </div>
        </div>
    </div>
</div>