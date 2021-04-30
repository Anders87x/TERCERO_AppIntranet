<?php
    class svrarc_destinatario extends Conectar{

        /** METODO: OBTENER VISTA DE REGISTROS ******************************************/
        public function mdl_registro_obtener_datos_01(
        ){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();

            $sql="call apr_web_arc_destinatario_registro_obtener_datos_01()";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        /** METODO: NUEVO REGISTRO ****************************************************/
        public function mdl_registro_nuevo(
            $psdestinatario_razon_social,
            $psdestinatario_direccion,
            $psdepartamento_codigo,
            $psprovincia_codigo,
            $psdistrito_codigo,
            $psauditoria_usuario
        ){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();

            $sql="call apr_web_arc_destinatario_registro_nuevo (?,?,?,?,?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $psdestinatario_razon_social);
            $stmt->bindValue(2, $psdestinatario_direccion);
            $stmt->bindValue(3, $psdepartamento_codigo);
            $stmt->bindValue(4, $psprovincia_codigo);   
            $stmt->bindValue(5, $psdistrito_codigo);
            $stmt->bindValue(6, $psauditoria_usuario);

            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        /** METODO: ELIMINAR REGISTRO ****************************************************/
        public function mdl_registro_eliminar(
            $pscodigo_aleatorio,
            $psauditoria_usuario
        ){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();

            $sql="call apr_web_arc_destinatario_registro_eliminar (?,?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pscodigo_aleatorio);
            $stmt->bindValue(2, $psauditoria_usuario);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        /** METODO: BUSCAR REGISTRO ****************************************************/
        public function mdl_registro_buscar(
            $pscodigo_aleatorio
        ){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();

            $sql="call apr_web_arc_destinatario_registro_buscar(?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pscodigo_aleatorio);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        /** METODO: OBTENER VISTA DE REGISTROS PARA COMBOBOX ******************************************/
        public function mdl_select(
		){
			$nhandle_conexion_bd = parent::_crear_conexion_bd();
			parent::set_names();

			$ssql_sentencia = "call apr_web_arc_destinatario_select()";
			$ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
			$ssql_objeto->execute();
			return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
		}

        /** METODO: BUSCAR REGISTRO EN OTRAS TABLAS *************************************/
        public function mdl_registro_buscar_dependencia(
            $pscodigo_aleatorio
        ){
            $conectar_FCL=parent::conexion_FCL();
            parent::set_names();

            $sql="call apr_web_arc_destinatario_registro_buscar_dependencia(?)";
            $stmt=$conectar_FCL->prepare($sql);
            $stmt->bindValue(1, $pscodigo_aleatorio);
            $stmt->execute();
            return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        

    }
?>
