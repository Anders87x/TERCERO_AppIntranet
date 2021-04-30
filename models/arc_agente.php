<?php
	class svrarc_agente extends Conectar{

		/** METODO: OBTENER VISTA DE REGISTROS ******************************************/
		public function mdl_obtener_vista_00(
		){
			$nhandle_conexion_bd = parent::_crear_conexion_bd();
			parent::set_names();

			$ssql_sentencia = "call apr_web_arc_agente_obtener_vista_00 ()";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->execute();
			return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
		}

		/** METODO: NUEVO REGISTRO ****************************************************/
		public function mdl_agregar(
			$psagente_codigo,
			$psagente_nombre,
			$psdocumento_numero,
			$psagente_telefono_numero,
			$psagente_celular_numero,
			$pstipo_servicio_codigo,
			$psruta_servicio_codigo,
			$psagente_direccion,
			$psagente_correo_electronico,
			$psagente_estado,
			$psauditoria_usuario
		){
			$nhandle_conexion_bd = parent::_crear_conexion_bd();
			parent::set_names();

			$ssql_sentencia = "call apr_web_arc_agente_agregar (?,?,?,?,?,?,?,?,?,?,?)";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->bindValue(1, $psagente_codigo);
			$ssql_objeto->bindValue(2, $psagente_nombre);
			$ssql_objeto->bindValue(3, $psdocumento_numero);
			$ssql_objeto->bindValue(4, $psagente_telefono_numero);
			$ssql_objeto->bindValue(5, $psagente_celular_numero);
			$ssql_objeto->bindValue(6, $pstipo_servicio_codigo);
			$ssql_objeto->bindValue(7, $psruta_servicio_codigo);
			$ssql_objeto->bindValue(8, $psagente_direccion);
			$ssql_objeto->bindValue(9, $psagente_correo_electronico);
			$ssql_objeto->bindValue(10, $psagente_estado);
			$ssql_objeto->bindValue(11, $psauditoria_usuario);

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

			$ssql_sentencia ="call apr_web_arc_agente_eliminar (?,?)";
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

			$ssql_sentencia = "call apr_web_arc_agente_buscar (?)";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->bindValue(1, $pscodigo_aleatorio);
			$ssql_objeto->execute();
			return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
		}

        /** METODO: OBTENER VISTA DE REGISTROS PARA COMBOBOX ******************************************/
        public function mdl_select(
            ){
                $nhandle_conexion_bd = parent::_crear_conexion_bd();
                parent::set_names();
    
                $ssql_sentencia = "call apr_web_arc_agente_select()";
                $ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
                $ssql_objeto->execute();
                return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
            }

		/** METODO: BUSCAR REGISTRO EN OTRAS TABLAS ****************************************************/
		public function mdl_buscar_dependencia(
			$pscodigo_aleatorio
		){
			$nhandle_conexion_bd = parent::_crear_conexion_bd();
			parent::set_names();
			$ssql_sentencia = "call apr_web_arc_agente_buscar_dependencia (?)";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->bindValue(1, $pscodigo_aleatorio);
			$ssql_objeto->execute();
			return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
		}
	}
?>
