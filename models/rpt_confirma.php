<?php
    class svrrpt_confirma extends Conectar{

        /** METODO: OBTENER VISTA ******************************************/
        public function mdl_rpt_confirma_01(
            $pstipo_servicio_codigo,
            $psruta_servicio_destino_codigo,
            $psgrupo_cliente_codigo,
            $psfecha_recepcion_inicial,
            $psfecha_recepcion_final,
            $psguia_estado
        ){
            $nhandle_conexion_bd = parent::_crear_conexion_bd();
            parent::set_names();

            $ssql_sentencia = "call apr_web_rpt_confirma_01a (?,?,?,?,?,?)";
            $ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
            $ssql_objeto->bindValue(1, $pstipo_servicio_codigo);
            $ssql_objeto->bindValue(2, $psruta_servicio_destino_codigo);
            $ssql_objeto->bindValue(3, $psgrupo_cliente_codigo);
            $ssql_objeto->bindValue(4, $psfecha_recepcion_inicial);
            $ssql_objeto->bindValue(5, $psfecha_recepcion_final);
            $ssql_objeto->bindValue(6, $psguia_estado);
            $ssql_objeto->execute();

            return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
        }

        /** METODO: OBTENER VISTA ******************************************/
        public function mdl_rpt_confirma_02(
            $psguia_numero_reporte
        ){
            $nhandle_conexion_bd = parent::_crear_conexion_bd();
            parent::set_names();

            $ssql_sentencia = "call apr_web_rpt_confirma_02a (?)";
            $ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
            $ssql_objeto->bindValue(1, $psguia_numero_reporte);
            $ssql_objeto->execute();

            return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
        }

        /** METODO: OBTENER VISTA ******************************************/
        public function mdl_rpt_confirma_03(
            $psguia_numero_pedido
        ){
            $nhandle_conexion_bd = parent::_crear_conexion_bd();
            parent::set_names();

            $ssql_sentencia = "call apr_web_rpt_confirma_03a (?)";
            $ssql_objeto = $nhandle_conexion_bd->prepare($ssql_sentencia);
            $ssql_objeto->bindValue(1, $psguia_numero_pedido);
            $ssql_objeto->execute();

            return $ssql_resultado = $ssql_objeto->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>
