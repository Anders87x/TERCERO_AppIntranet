<?php
	class svrarc_cliente_contacto extends Conectar{

		/** METODO: OBTENER VISTA DE REGISTROS ******************************************/
		public function mdl_obtener_vista_00(
		){
			$nhandle_conexion_bd = parent::_crear_conexion_bd();
			parent::set_names();

			$ssql_sentencia = "call apr_web_arc_cliente_contacto_vista_00 ()";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->execute();
			return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
		}

		/** METODO: NUEVO REGISTRO ****************************************************/
		public function mdl_agregar(
			$pscliente_codigo,
			$pscliente_contacto_codigo,
			$pscliente_contacto_nombre,
			$psarea_descripcion,
			$pscargo_descripcion,
			$pscontacto_central,
			$pscliente_contacto_anexo,
			$pscliente_contacto_celular_01,
			$pscliente_contacto_celular_02,
			$pscliente_contacto_correo_electronico,
			$pscliente_contacto_usuario,
			$pscliente_contacto_clave,
			$psauditoria_usuario
		){
			$nhandle_conexion_bd = parent::_crear_conexion_bd();
			parent::set_names();

			$ssql_sentencia = "call apr_web_arc_cliente_contacto_agregar (?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->bindValue(1, $pscliente_codigo);
			$ssql_objeto->bindValue(2, $pscliente_contacto_codigo);
			$ssql_objeto->bindValue(3, $pscliente_contacto_nombre);
			$ssql_objeto->bindValue(4, $psarea_descripcion);
			$ssql_objeto->bindValue(5, $pscargo_descripcion);
			$ssql_objeto->bindValue(6, $pscontacto_central);
			$ssql_objeto->bindValue(7, $pscliente_contacto_anexo);
			$ssql_objeto->bindValue(8, $pscliente_contacto_celular_01);
			$ssql_objeto->bindValue(9, $pscliente_contacto_celular_02);
			$ssql_objeto->bindValue(10, $pscliente_contacto_correo_electronico);
			$ssql_objeto->bindValue(11, $pscliente_contacto_usuario);
			$ssql_objeto->bindValue(12, $pscliente_contacto_clave);
			$ssql_objeto->bindValue(13, $psauditoria_usuario);

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

			$ssql_sentencia ="call apr_web_arc_cliente_contacto_eliminar (?,?)";
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

			$ssql_sentencia = "call apr_web_arc_cliente_contacto_buscar (?)";
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
			$ssql_sentencia = "call apr_web_arc_cliente_contacto_buscar_dependencia (?)";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->bindValue(1, $pscodigo_aleatorio);
			$ssql_objeto->execute();
			return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
		}
	}
?>
