<?php
    require_once("../config/conexion.php");
    require_once("../models/rpt_retorno.php");
    $objservicio = new svrrpt_retorno();

    switch($_GET["caso"]){

        case 'rpt_retorno_01':
            $obj_datos = $objservicio->mdl_rpt_retorno_01(
                $_POST["pstipo_servicio_codigo"],
                $_POST["psruta_servicio_destino_codigo"],
                $_POST["psgrupo_cliente_codigo"],
                $_POST["psfecha_recepcion_inicial"],
                $_POST["psfecha_recepcion_final"],
                $_POST["psguia_estado"]
            );

            if(is_array($obj_datos)==true and count($obj_datos)>0) {
                foreach($obj_datos as $row) {
                    $sub_array = array();
                    $sub_array[] = $row["stipo_documento_codigo"];
                    $sub_array[] = $row["sguia_numero_completo"];
                    $sub_array[] = $row["sruta_origen_descripcion"];
                    $sub_array[] = $row["sruta_destino_descripcion"];
                    $sub_array[] = $row["sguia_estado_descripcion"];
                    $sub_array[] = $row["sguia_fecha_recepcion_texto"];
                    $sub_array[] = $row["sprioridad_abreviatura"];
                    $sub_array[] = $row["sremite_cliente_razon_social"];
                    $sub_array[] = $row["sremite_area_descripcion"];
                    $sub_array[] = $row["sdestino_empresa_razon_social"];
                    $sub_array[] = $row["stipo_transporte_abreviatura"];
                    $sub_array[] = $row["sguia_confirma_fecha_texto"];
                    $sub_array[] = $row["sguia_confirma_persona"];
                    $sub_array[] = $row["sproducto_descripcion"];
                    $sub_array[] = $row["nproducto_cantidad"];
                    $sub_array[] = $row["nproducto_peso"];
                    $sub_array[] = $row["scliente_tipo_documento_codigo"];
                    $sub_array[] = $row["scliente_documento_numero"];
                    
                    $data[] = $sub_array;
                }
        
                $results = array(
                    "sEcho" => 1,
                    "iTotalRecords" => count($data),
                    "iTotalDisplayRecords" => count($data),
                    "aaData" => $data
                );
                echo json_encode($results);
            }                  
        break;
        /**  */
        case 'rpt_retorno_02':
            $obj_datos = $objservicio->mdl_rpt_retorno_02(
                $_POST["psguia_numero_reporte"]
            );

            if(is_array($obj_datos)==true and count($obj_datos)>0) {
                foreach($obj_datos as $row) {
                    $sub_array = array();
                    $sub_array[] = $row["stipo_documento_codigo"];
                    $sub_array[] = $row["sguia_numero_completo"];
                    $sub_array[] = $row["sruta_origen_descripcion"];
                    $sub_array[] = $row["sruta_destino_descripcion"];
                    $sub_array[] = $row["sguia_estado_descripcion"];
                    $sub_array[] = $row["sguia_fecha_recepcion_texto"];
                    $sub_array[] = $row["sprioridad_abreviatura"];
                    $sub_array[] = $row["sremite_cliente_razon_social"];
                    $sub_array[] = $row["sremite_area_descripcion"];
                    $sub_array[] = $row["sdestino_empresa_razon_social"];
                    $sub_array[] = $row["stipo_transporte_abreviatura"];
                    $sub_array[] = $row["sguia_confirma_fecha_texto"];
                    $sub_array[] = $row["sguia_confirma_persona"];
                    $sub_array[] = $row["sproducto_descripcion"];
                    $sub_array[] = $row["nproducto_cantidad"];
                    $sub_array[] = $row["nproducto_peso"];
                    $sub_array[] = $row["scliente_tipo_documento_codigo"];
                    $sub_array[] = $row["scliente_documento_numero"];
                    
                    $data[] = $sub_array;
                }
        
                $results = array(
                    "sEcho" => 1,
                    "iTotalRecords" => count($data),
                    "iTotalDisplayRecords" => count($data),
                    "aaData" => $data
                );
                echo json_encode($results);
            }                  
        break;

        /**  */
        case 'rpt_retorno_03':
            $obj_datos = $objservicio->mdl_rpt_retorno_03(
                $_POST["psguia_numero_pedido"]
            );

            if(is_array($obj_datos)==true and count($obj_datos)>0) {
                foreach($obj_datos as $row) {
                    $sub_array = array();
                    $sub_array[] = $row["stipo_documento_codigo"];
                    $sub_array[] = $row["sguia_numero_completo"];
                    $sub_array[] = $row["sruta_origen_descripcion"];
                    $sub_array[] = $row["sruta_destino_descripcion"];
                    $sub_array[] = $row["sguia_estado_descripcion"];
                    $sub_array[] = $row["sguia_fecha_recepcion_texto"];
                    $sub_array[] = $row["sprioridad_abreviatura"];
                    $sub_array[] = $row["sremite_cliente_razon_social"];
                    $sub_array[] = $row["sremite_area_descripcion"];
                    $sub_array[] = $row["sdestino_empresa_razon_social"];
                    $sub_array[] = $row["stipo_transporte_abreviatura"];
                    $sub_array[] = $row["sguia_confirma_fecha_texto"];
                    $sub_array[] = $row["sguia_confirma_persona"];
                    $sub_array[] = $row["sproducto_descripcion"];
                    $sub_array[] = $row["nproducto_cantidad"];
                    $sub_array[] = $row["nproducto_peso"];
                    $sub_array[] = $row["scliente_tipo_documento_codigo"];
                    $sub_array[] = $row["scliente_documento_numero"];
                    
                    $data[] = $sub_array;
                }
        
                $results = array(
                    "sEcho" => 1,
                    "iTotalRecords" => count($data),
                    "iTotalDisplayRecords" => count($data),
                    "aaData" => $data
                );
                echo json_encode($results);
            }
        break;        


    }

?>