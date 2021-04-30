<div class="modal fade" id="modal_registro" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="lbltitle">NUEVO </h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
			</div>

			<div class="modal-body">
				<div>

                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">NOMBRE</label>
                        <div class="col-sm-8">
                            <input class="form-control" maxlength="150" id="txtsagente_nombre" name="txtsagente_nombre" type="text" style="text-transform:uppercase;" placeholder="" data-parsley-required="true">
                        </div>
                    </div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">DNI</label>
                        <div class="col-sm-8">
                            <input class="form-control" maxlength="11" id="txtsdocumento_numero" name="txtsdocumento_numero" type="textscliente_razon_social" style="text-transform:uppercase;" placeholder="" data-parsley-required="true">
                        </div>
                    </div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">CELULAR 01</label>
                        <div class="col-sm-8">
                            <input class="form-control" maxlength="15" id="txtsagente_telefono_numero" name="txtsagente_telefono_numero" type="text" style="text-transform:uppercase;" placeholder="" data-parsley-required="false">
                        </div>
                    </div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">CELULAR 02</label>
                        <div class="col-sm-8">
                            <input class="form-control" maxlength="15" id="txtsagente_celular_numero" name="txtsagente_celular_numero" type="text" style="text-transform:uppercase;" placeholder="" data-parsley-required="false">
                        </div>
                    </div>
                    <div class="form-group row m-b-15 form-row align-items-center">
                        <label class="col-md-4 col-sm-4 col-form-label" for="cmbsdepartamento_codigo">DEPARTAMENTO</label>
                        <div class="col-md-8 col-sm-8">
                            <select class="selectpicker" data-width="100%" data-size="10" data-live-search="true" data-style="btn-white" id="cmbsdepartamento_codigo" name="cmbsdepartamento_codigo" placeholder="" data-parsley-required="true"></select>
                        </div>
                    </div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">DIRECCION</label>
                        <div class="col-sm-8">
                            <input class="form-control" maxlength="250" id="txtsagente_direccion" name="txtsagente_direccion" type="text" style="text-transform:uppercase;" placeholder="" data-parsley-required="true">
                        </div>
                    </div>

					<div class="form-group row m-b-15 align-items-center">
						<div class="custom-control custom-switch">
							<div class="col-sm-12">
								<input type="checkbox" class="custom-control-input" id="chksagente_estado" name="chksagente_estado">
								<label class="custom-control-label" for="chksagente_estado">    INDICAR SI EL AGENTE SIGUE ACTIVO</label>
							</div>
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
