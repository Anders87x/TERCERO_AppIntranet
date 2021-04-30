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
                        <label class="col-sm-4 col-form-label">RUC</label>
                        <div class="col-sm-8">
                            <input class="form-control" maxlength="11" id="txtsproveedor_ruc" name="txtsproveedor_ruc" type="text" style="text-transform:uppercase;" placeholder="" data-parsley-required="false">
                        </div>
                    </div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">RAZON SOCIAL</label>
                        <div class="col-sm-8">
                            <input class="form-control" maxlength="250" id="txtsproveedor_razon_social" name="txtsproveedor_razon_social" type="textscliente_razon_social" style="text-transform:uppercase;" placeholder="" data-parsley-required="true">
                        </div>
                    </div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">ABREVIATURA</label>
                        <div class="col-sm-8">
                            <input class="form-control" maxlength="50" id="txtsproveedor_abreviatura" name="txtsproveedor_abreviatura" type="text" style="text-transform:uppercase;" placeholder="" data-parsley-required="false">
                        </div>
                    </div>
                    <div class="form-group row m-b-15 align-items-center">
                        <label class="col-sm-4 col-form-label">DIRECCION</label>
                        <div class="col-sm-8">
                            <input class="form-control" maxlength="250" id="txtsproveedor_direccion" name="txtsproveedor_direccion" type="text" style="text-transform:uppercase;" placeholder="" data-parsley-required="false">
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
