<?php
	class svrarc_producto extends Conectar{

		/** METODO: OBTENER VISTA DE REGISTROS ******************************************/
		public function mdl_obtener_vista_00(
		){
			$nhandle_conexion_bd = parent::_crear_conexion_bd();
			parent::set_names();

			$ssql_sentencia = "call apr_web_arc_producto_obtener_vista_00 ()";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->execute();
			return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
		}

		/** METODO: NUEVO REGISTRO ****************************************************/
		public function mdl_agregar(
			$psproducto_codigo,
			$psproducto_descripcion,
			$psproducto_abreviatura,
			$psproducto_unidad,
			$psauditoria_usuario
		){
			$nhandle_conexion_bd = parent::_crear_conexion_bd();
			parent::set_names();

			$ssql_sentencia = "call apr_web_arc_producto_agregar (?,?,?,?,?)";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->bindValue(1, $psproducto_codigo);
			$ssql_objeto->bindValue(2, $psproducto_descripcion);
			$ssql_objeto->bindValue(3, $psproducto_abreviatura);
			$ssql_objeto->bindValue(4, $psproducto_unidad);
			$ssql_objeto->bindValue(5, $psauditoria_usuario);

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

			$ssql_sentencia ="call apr_web_arc_producto_eliminar (?,?)";
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

			$ssql_sentencia = "call apr_web_arc_producto_buscar (?)";
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
			$ssql_sentencia = "call apr_web_arc_producto_buscar_dependencia (?)";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->bindValue(1, $pscodigo_aleatorio);
			$ssql_objeto->execute();
			return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
		}
	}
?>
