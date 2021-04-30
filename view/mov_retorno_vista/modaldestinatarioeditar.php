<div class="modal fade" id="modaldestinatarioeditar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">EDITAR DATOS DEL DESTINATARIO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                
                <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="cmbsdestino_empresa_razon_social_editar_editar">DESTINATARIO</label>
                    <div class="col-md-8 col-sm-8">
                        <select class="selectpicker" data-width="80%" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsdestino_empresa_razon_social_editar" name="cmbsdestino_empresa_razon_social_editar" placeholder="" data-parsley-required="true"></select>
                        <button class="btn btn-outline-success btn-icon btn-circle" onClick="mdl_cmbsdestino_empresa_razon_social_editar__init()" data-toggle="tooltip" title="Actualizar"><i class="fas fa-spinner"></i></button>
                    </div>
                </div>
                <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="txtsdestino_empresa_direccion_editar">DIRECCIÓN</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="text" style="text-transform:uppercase;" id="txtsdestino_empresa_direccion_editar" name="txtsdestino_empresa_direccion_editar" placeholder="" data-parsley-required="true">
                    </div>
                </div>
                <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="cmbsdestino_departamento_codigo_editar">DEPARTAMENTO</label>
                    <div class="col-md-8 col-sm-8">
                        <select class="selectpicker" data-width="100%" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsdestino_departamento_codigo_editar" name="cmbsdestino_departamento_codigo_editar" placeholder="" data-parsley-required="true"></select>
                    </div>
                </div>
                <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="cmbsdestino_provincia_codigo_editar">PROVINCIA</label>
                    <div class="col-md-8 col-sm-8">
                        <select class="selectpicker" data-width="100%" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsdestino_provincia_codigo_editar" name="cmbsdestino_provincia_codigo_editar" placeholder="" data-parsley-required="true"></select>
                    </div>
                </div>
                <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="cmbsdestino_distrito_codigo_editar">DISTRITO</label>
                    <div class="col-md-8 col-sm-8">
                        <select class="selectpicker" data-width="100%" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsdestino_distrito_codigo_editar" name="cmbsdestino_distrito_codigo_editar" placeholder="" data-parsley-required="true"></select>
                    </div>
                </div>
                <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="txtsdestino_atencion_editar">ATENCIÓN</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="text" style="text-transform:uppercase;" id="txtsdestino_atencion_editar" name="txtsdestino_atencion_editar" placeholder="">
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-primary" id="btnguardardestinatario">GUARDAR</a>
                <a href="javascript:;" class="btn btn-white" data-dismiss="modal">CERRAR</a>
            </div>

        </div>
    </div>
</div>