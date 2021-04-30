<?php
	class svrlog_guia_detalle extends Conectar{

		/** METODO: OBTENER VISTA DE REGISTROS ******************************************/
		public function mdl_obtener_vista_00(
		){
			$nhandle_conexion_bd = parent::_crear_conexion_bd();
			parent::set_names();

			$ssql_sentencia = "call apr_web_log_guia_detalle_obtener_vista_00 ()";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->execute();
			return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
		}

		/** METODO: NUEVO REGISTRO ****************************************************/
		public function mdl_agregar(
			$pstipo_documento_codigo,
			$psguia_serie,
			$psguia_correlativo,
			$psguia_detalle_numero_item,
			$psproducto_codigo,
			$psproducto_descripcion,
			$pnproducto_cantidad,
			$pnproducto_peso,
			$pnproducto_costo,
			$psauditoria_usuario
		){
			$nhandle_conexion_bd = parent::_crear_conexion_bd();
			parent::set_names();

			$ssql_sentencia = "call apr_web_log_guia_detalle_agregar (?,?,?,?,?,?,?,?,?,?)";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->bindValue(1, $pstipo_documento_codigo);
			$ssql_objeto->bindValue(2, $psguia_serie);
			$ssql_objeto->bindValue(3, $psguia_correlativo);
			$ssql_objeto->bindValue(4, $psguia_detalle_numero_item);
			$ssql_objeto->bindValue(5, $psproducto_codigo);
			$ssql_objeto->bindValue(6, $psproducto_descripcion);
			$ssql_objeto->bindValue(7, $pnproducto_cantidad);
			$ssql_objeto->bindValue(8, $pnproducto_peso);
			$ssql_objeto->bindValue(9, $pnproducto_costo);
			$ssql_objeto->bindValue(10, $psauditoria_usuario);

			$ssql_objeto->execute();
			return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
		}

		/** METODO: EDITAR REGISTRO ****************************************************/
		public function mdl_editar(
			$psproducto_codigo,
			$psproducto_descripcion,
			$pnproducto_cantidad,
			$pnproducto_peso,
			$pnproducto_costo,
			$pscodigo_aleatorio,
			$psauditoria_usuario
		){
			$nhandle_conexion_bd = parent::_crear_conexion_bd();
			parent::set_names();

			$ssql_sentencia = "call apr_web_log_guia_detalle_editar (?,?,?,?,?,?,?)";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->bindValue(1, $psproducto_codigo);
			$ssql_objeto->bindValue(2, $psproducto_descripcion);
			$ssql_objeto->bindValue(3, $pnproducto_cantidad);
			$ssql_objeto->bindValue(4, $pnproducto_peso);
			$ssql_objeto->bindValue(5, $pnproducto_costo);
			$ssql_objeto->bindValue(6, $pscodigo_aleatorio);
			$ssql_objeto->bindValue(7, $psauditoria_usuario);

			$ssql_objeto->execute();
			return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
		}

		/** METODO: ELIMINAR REGISTRO ****************************************************/
		public function mdl_eliminar(
			$pscodigo_aleatorio,
			$psauditoria_usuario
		){
			$nhandle_conexion_bd = parent::_crear_conexion_bd();
			parent::set_names();

			$ssql_sentencia ="call apr_web_log_guia_detalle_eliminar (?,?)";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->bindValue(1, $pscodigo_aleatorio);
			$ssql_objeto->bindValue(2, $psauditoria_usuario);
			$ssql_objeto->execute();
			return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
		}

		/** METODO: BUSCAR REGISTRO ****************************************************/
		public function mdl_buscar(
			$pscodigo_aleatorio
		){
			$nhandle_conexion_bd = parent::_crear_conexion_bd();
			parent::set_names();

			$ssql_sentencia = "call apr_web_log_guia_detalle_buscar (?)";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->bindValue(1, $pscodigo_aleatorio);
			$ssql_objeto->execute();
			return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
		}

		/** METODO: BUSCAR REGISTRO EN OTRAS TABLAS ****************************************************/
		public function mdl_buscar_dependencia(
			$pscodigo_aleatorio
		){
			$nhandle_conexion_bd = parent::_crear_conexion_bd();
			parent::set_names();
			$ssql_sentencia = "call apr_web_log_guia_detalle_buscar_dependencia (?)";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->bindValue(1, $pscodigo_aleatorio);
			$ssql_objeto->execute();
			return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
		}
	}
?>
