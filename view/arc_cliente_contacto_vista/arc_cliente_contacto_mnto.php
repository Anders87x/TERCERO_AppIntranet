<div class="modal fade" id="modal_registro" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="lbltitle">NUEVO </h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
			</div>

			<div class="modal-body">
				<div>

                    <div class="form-group row m-b-15 form-row align-items-center">
                        <label class="col-md-4 col-sm-4 col-form-label" for="cmbscliente_codigo">CLIENTE</label>
                        <div class="col-md-8 col-sm-8">
                            <select class="selectpicker" data-width="100%" data-size="10" data-live-search="true" data-style="btn-white" id="cmbscliente_codigo" name="cmbscliente_codigo" placeholder="" data-parsley-required="true"></select>
                        </div>
                    </div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">NOMBRE COMPLETO</label>
                        <div class="col-sm-8">
                            <input class="form-control" maxlength="150" id="txtscliente_contacto_nombre" name="txtscliente_contacto_nombre" type="text" style="text-transform:uppercase;" placeholder="" data-parsley-required="true">
                        </div>
                    </div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">AREA DE TRABAJO</label>
                        <div class="col-sm-8">
                            <input class="form-control" maxlength="50" id="txtsarea_descripcion" name="txtsarea_descripcion" type="text" style="text-transform:uppercase;" placeholder="" data-parsley-required="true">
                        </div>
                    </div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">CARGO</label>
                        <div class="col-sm-8">
                            <input class="form-control" maxlength="50" id="txtscargo_descripcion" name="txtscargo_descripcion" type="text" style="text-transform:uppercase;" placeholder="" data-parsley-required="true">
                        </div>
                    </div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">CENTRAL TELEFONICA</label>
                        <div class="col-sm-8">
                            <input class="form-control" maxlength="50" id="txtscontacto_central" name="txtscontacto_central" type="text" style="text-transform:uppercase;" placeholder="" data-parsley-required="true">
                        </div>
                    </div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">CELULAR 01</label>
                        <div class="col-sm-8">
                            <input class="form-control" maxlength="50" id="txtscliente_contacto_celular_01" name="txtscliente_contacto_celular_01" type="text" style="text-transform:uppercase;" placeholder="" data-parsley-required="true">
                        </div>
                    </div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">CELULAR 02</label>
                        <div class="col-sm-8">
                            <input class="form-control" maxlength="50" id="txtscliente_contacto_celular_02" name="txtscliente_contacto_celular_02" type="text" style="text-transform:uppercase;" placeholder="" data-parsley-required="true">
                        </div>
                    </div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">CORREO ELECTRONICO</label>
                        <div class="col-sm-8">
                            <input class="form-control" maxlength="150" id="txtscliente_contacto_correo_electronico" name="txtscliente_contacto_correo_electronico" type="text" placeholder="" data-parsley-required="true">
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
