<?php
    class svrsun_provincia extends Conectar{

        /** METODO: OBTENER VISTA DE REGISTROS PARA COMBO BOX ******************************/
        public function mdl_registro_obtener_datos_select(
            $psdepartamento_codigo
            ){
                $conectar_FCL=parent::conexion_FCL();
                parent::set_names();
    
                $sql="call apr_web_sun_provincia_registro_obtener_datos_select(?)";
                $stmt=$conectar_FCL->prepare($sql);
                $stmt->bindValue(1, $psdepartamento_codigo);
                $stmt->execute();
                return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }

        /** METODO: OBTENER VISTA DE REGISTROS PARA COMBO BOX ******************************/
        public function mdl_select(
            $psdepartamento_codigo
            ){
                $nhandle_conexion_bd = parent::_crear_conexion_bd();
                parent::set_names();
    
                $ssql_sentencia = "call apr_web_sun_provincia_select(?)";
                $ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
                $ssql_objeto->bindValue(1, $psdepartamento_codigo);
                $ssql_objeto->execute();
                return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
            }

    }
?>
