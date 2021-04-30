<div class="modal fade" id="modal_registro" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="lbltitle">NUEVO </h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			</div>

			<div class="modal-body">
				<div>

                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">CODIGO</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="txtstipo_documento_codigo" name="txtstipo_documento_codigo" type="text" style="text-transform:uppercase;" placeholder="" data-parsley-required="true">
                        </div>
                    </div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">DESCRIPCION</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="txtstipo_documento_descripcion" name="txtstipo_documento_descripcion" type="text" style="text-transform:uppercase;" placeholder="" data-parsley-required="true">
                        </div>
                    </div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">ABREVIATURA</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="txtstipo_documento_breve" name="txtstipo_documento_breve" type="text" style="text-transform:uppercase;" placeholder="" data-parsley-required="false">
                        </div>
                    </div>

					<div class="form-group row m-b-15 align-items-center">
						<div class="custom-control custom-switch">
							<div class="col-sm-12">
								<input type="checkbox" class="custom-control-input" id="chkstipo_documento_sunat" name="chkstipo_documento_sunat">
								<label class="custom-control-label" for="chkstipo_documento_sunat">    EL DOCUMENTO REFIERE A SUNAT</label>
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
