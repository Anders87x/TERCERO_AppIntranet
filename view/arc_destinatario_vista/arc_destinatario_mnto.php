<div class="modal fade" id="modal_registro" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="lbltitle">DESTINATARIO: </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div>

                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">RAZON SOCIAL</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="txtsdestinatario_razon_social" name="txtsdestinatario_razon_social" type="text" style="text-transform:uppercase;" placeholder="Remitente" data-parsley-required="true">
                        </div>
                    </div>

                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">DIRECCION</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="txtsdestinatario_direccion" name="txtsdestinatario_direccion" type="text" style="text-transform:uppercase;" placeholder="" data-parsley-required="true">
                        </div>
                    </div>

                    <div class="form-group row m-b-15 form-row align-items-center">
                        <label class="col-md-4 col-sm-4 col-form-label" for="cmbsdepartamento_codigo">DEPARTAMENTO</label>
                        <div class="col-md-8 col-sm-8">
                            <select class="selectpicker" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsdepartamento_codigo" name="cmbsdepartamento_codigo" placeholder="" data-parsley-required="true"></select>
                        </div>
                    </div>
                    <div class="form-group row m-b-15 form-row align-items-center">
                        <label class="col-md-4 col-sm-4 col-form-label" for="cmbsprovincia_codigo">PROVINCIA</label>
                        <div class="col-md-8 col-sm-8">
                            <select class="selectpicker" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsprovincia_codigo" name="cmbsprovincia_codigo" placeholder="" data-parsley-required="true"></select>
                        </div>
                    </div>
                    <div class="form-group row m-b-15 form-row align-items-center">
                        <label class="col-md-4 col-sm-4 col-form-label" for="cmbsdistrito_codigo">DISTRITO</label>
                        <div class="col-md-8 col-sm-8">
                            <select class="selectpicker" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsdistrito_codigo" name="cmbsdistrito_codigo" placeholder="" data-parsley-required="true"></select>
                        </div>
                    </div>

                    
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-white" data-dismiss="modal">CERRAR</a>
                <a href="javascript:;" class="btn btn-primary" id="btnregistro_guardar">GUARDAR</a>
            </div>
        </div>
    </div>
</div>