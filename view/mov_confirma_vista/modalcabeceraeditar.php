<div class="modal fade" id="modalcabeceraeditar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">EDITAR DATOS BASICOS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                
<!--                 <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="txtstipo_documento_codigo_editar">TIPO DE DOCUMENTO</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" disabled type="text" id="txtstipo_documento_codigo_editar" name="txtstipo_documento_codigo_editar">
                    </div>
                </div>

                <div class="form-group row m-b-12 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label col-form-label-sm" >NRO. DE DOCUMENTO</label>
                    <div class="col-md-3 col-sm-3">
                        <input class="form-control" disabled type="text" maxlength="3" id="txtsguia_serie_editar" name="txtsguia_serie_editar" data-parsley-required="true" onblur="txtsguia_serie__onblur(this)">
                    </div>
                    <div class="col-md-5 col-sm-5 ">
                        <input class="form-control" disabled type="text" maxlength="6" id="txtsguia_correlativo_editar" name="txtsguia_correlativo_editar" data-parsley-required="true" onblur="txtsguia_correlativo__onblur(this)">
                    </div>                                    
                </div>
 -->
                <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label col-form-label-sm" for="txtsguia_hoja_ruta_editar">HOJA DE RUTA</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" maxlength="10" type="text" style="text-transform:uppercase;" id="txtsguia_hoja_ruta_editar" name="txtsguia_hoja_ruta_editar" placeholder="AAAAMMDD-99" data-parsley-required="false">
                    </div>
                </div>

                <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="dtpdguia_fecha_recepcion_editar">FECHA DE RECEPCIÓN</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="text" id="dtpdguia_fecha_recepcion_editar" name="dtpdguia_fecha_recepcion_editar" data-date-format="dd/mm/yyyy" data-parsley-required="true">
                        <small id="dtpdguia_fecha_recepcion_editar" class="form-text text-muted">Recepción del documento</small>
                    </div>
                </div>

                <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="dtpdguia_fecha_vencimiento_editar">FECHA LIMITE</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="text" id="dtpdguia_fecha_vencimiento_editar" name="dtpdguia_fecha_vencimiento_editar"  data-date-format="dd/mm/yyyy" data-parsley-required="true">
                        <small id="dtpdguia_fecha_recepcion_editar" class="form-text text-muted">Fecha limite para culminar atencion</small>
                    </div>
                </div>
                <div class="form-group row m-b-12 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="dtpdguia_fecha_retorno_editar">FECHA DE RETORNO</label>
                    <div class="col-md-8 col-sm-8">
                        <input class="form-control" type="text" id="dtpdguia_fecha_retorno_editar" name="dtpdguia_fecha_retorno_editar"  data-date-format="dd/mm/yyyy" data-parsley-required="true">
                        <small id="dtpdguia_fecha_retorno_editar" class="form-text text-muted">Retorno de documento a oficinas</small>
                    </div>
                </div>

                <div class="form-group row m-b-15 form-row align-items-center">
                    <label class="col-md-4 col-sm-4 col-form-label" for="cmbsprioridad_codigo_editar">PRIORIDAD DEL DOCUMENTO</label>
                    <div class="col-md-8 col-sm-8">
                        <select class="selectpicker" data-width="80%" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsprioridad_codigo_editar" name="cmbsprioridad_codigo_editar" placeholder="" data-parsley-required="true"></select> </td>
                        <button class="btn btn-outline-success btn-icon btn-circle" onClick="mdl_cmbsprioridad_codigo_editar__init()" data-toggle="tooltip" title="Actualizar"><i class="fas fa-spinner"></i></button>
                    </div>
                </div>

                <div class="form-group row m-b-15 align-items-center">
                    <div class="custom-control custom-switch">
                        <div class="col-sm-12">
                            <input type="checkbox" class="custom-control-input" id="chksguia_licitacion_editar" name="chksguia_licitacion_editar">
                            <label class="custom-control-label" for="chksguia_licitacion_editar">   EL DOCUMENTO PERTENECE A UNA LICITACION</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row m-b-15 align-items-center">
                    <div class="custom-control custom-switch">
                        <div class="col-sm-12">
                            <input type="checkbox" class="custom-control-input" id="chksguia_exclusivo_editar" name="chksguia_exclusivo_editar">
                            <label class="custom-control-label" for="chksguia_exclusivo_editar">   EL DOCUMENTO ES EXCLUSIVO</label>
                        </div>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-primary" id="btnguardarcabecera">GUARDAR</a>
                <a href="javascript:;" class="btn btn-white" data-dismiss="modal">CERRAR</a>
            </div>

        </div>
    </div>
</div>