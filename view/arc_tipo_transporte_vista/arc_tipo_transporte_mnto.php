<div class="modal fade" id="modal_registro" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="lbltitle">NUEVO </h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>

			<div class="modal-body">
				<div>

                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">CODIGO</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="txtstipo_transporte_codigo" name="txtstipo_transporte_codigo" type="text" style="text-transform:uppercase;" placeholder="" data-parsley-required="true" autofocus>
                        </div>
                    </div>

                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">DESCRIPCION</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="txtstipo_transporte_descripcion" name="txtstipo_transporte_descripcion" type="text" style="text-transform:uppercase;" placeholder="" data-parsley-required="true">
                        </div>
                    </div>

                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">ABREVIATURA</label>
                        <div class="col-sm-8">
                            <input class="form-control" id="txtstipo_transporte_abreviatura" name="txtstipo_transporte_abreviatura" type="text" style="text-transform:uppercase;" placeholder="" data-parsley-required="false">
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
