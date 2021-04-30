<div class="modal fade" id="modalremitenteeditar" tabindex="-1" role="dialog"  aria-hidden="true" data-target="#myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">EDITAR DATOS DEL REMITENTE</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                
                <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="cmbsgrupo_cliente_codigo_editar">GRUPO DE CLIENTE</label>
                    <div class="col-md-8 col-sm-8">
                        <select  class="selectpicker" data-width="80%" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsgrupo_cliente_codigo_editar" name="cmbsgrupo_cliente_codigo_editar" placeholder="" data-parsley-required="true"></select>
                        <button class="btn btn-outline-success btn-icon btn-circle" onClick="mdl_cmbsgrupo_cliente_codigo_editar__init()" data-toggle="tooltip" title="Actualizar"><i class="fas fa-spinner"></i></button>
                    </div>
                </div>
                <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="cmbsremite_cliente_codigo_editar">REMITENTE</label>
                    <div class="col-md-8 col-sm-8">
                        <select class="selectpicker" data-width="100%" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsremite_cliente_codigo_editar" name="cmbsremite_cliente_codigo_editar" placeholder="" data-parsley-required="true"></select>
                    </div>
                </div>
                <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="txtsremite_cliente_direccion_editar">DIRECCIÓN</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="text" style="text-transform:uppercase;" id="txtsremite_cliente_direccion_editar" name="txtsremite_cliente_direccion_editar" placeholder="" data-parsley-required="true">
                    </div>
                </div>
                <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="cmbsremite_departamento_codigo_editar">DEPARTAMENTO</label>
                    <div class="col-md-8 col-sm-8">
                        <select class="selectpicker" data-width="100%" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsremite_departamento_codigo_editar" name="cmbsremite_departamento_codigo_editar" data-parsley-required="true"></select>
                    </div>
                </div>
                <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="cmbsremite_provincia_codigo_editar">PROVINCIA</label>
                    <div class="col-md-8 col-sm-8">
                        <select class="selectpicker" data-width="100%" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsremite_provincia_codigo_editar" name="cmbsremite_provincia_codigo_editar" data-parsley-required="true"></select>
                    </div>
                </div>
                <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="cmbsremite_distrito_codigo_editar">DISTRITO</label>
                    <div class="col-md-8 col-sm-8">
                    <select class="selectpicker" data-width="100%" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsremite_distrito_codigo_editar" name="cmbsremite_distrito_codigo_editar" data-parsley-required="true"></select>
                    </div>
                </div>
                <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="txtsremite_atencion_editar">ATENCIÓN</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="text" style="text-transform:uppercase;" id="txtsremite_atencion_editar" name="txtsremite_atencion_editar" placeholder="">
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-primary" id="btnguardarremitente">GUARDAR</a>
                <a href="javascript:;" class="btn btn-white" data-dismiss="modal">CERRAR</a>
            </div>

        </div>
    </div>
</div>