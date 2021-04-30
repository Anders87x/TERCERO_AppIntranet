<?php
    class svrsun_distrito extends Conectar{

        /** METODO: OBTENER VISTA DE REGISTROS PARA COMBO BOX ******************************/
        public function mdl_registro_obtener_datos_select(
                $psprovincia_codigo
            ){
                $conectar_FCL=parent::conexion_FCL();
                parent::set_names();
    
                $sql="call apr_web_sun_distrito_registro_obtener_datos_select(?)";
                $stmt=$conectar_FCL->prepare($sql);
                $stmt->bindValue(1, $psprovincia_codigo);
                $stmt->execute();
                return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }

        /** METODO: OBTENER VISTA DE REGISTROS PARA COMBO BOX ******************************/
        public function mdl_select(
            $psprovincia_codigo
            ){
                $nhandle_conexion_bd = parent::_crear_conexion_bd();
                parent::set_names();
    
                $ssql_sentencia = "call apr_web_sun_distrito_select(?)";
                $ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
                $ssql_objeto->bindValue(1, $psprovincia_codigo);
                $ssql_objeto->execute();
                return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
            }


    }
?>
