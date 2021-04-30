<?php
    require_once("../config/conexion.php");
    require_once("../models/log_guia_reenvio.php");
    $servicio = new svrlog_guia_reenvio();

    switch($_GET["op"]){

        case "ctrl_registro_insert":
            $servicio->mdl_registro_insert(
                $_POST["pstipo_documento_codigo"],
                $_POST["psguia_serie"],
                $_POST["psguia_correlativo"],
                $_POST["psguia_item"],
                $_POST["pdguia_fecha_reenvio"],
                $_POST["psdestino_empresa_razon_social"],
                $_POST["psdestino_empresa_direccion"],
                $_POST["psdestino_distrito_codigo"],
                $_POST["psdestino_provincia_codigo"],
                $_POST["psdestino_departamento_codigo"],
                $_POST["psdestino_atencion"],
                $_POST["psagente_codigo"],
                $_POST["pstipo_servicio_codigo"],
                $_POST["psruta_servicio_codigo"],
                $_POST["psproveedor_codigo"],
                $_POST["pstipo_transporte_codigo"],
                $_POST["pdmanifiesto_fecha_salida"],
                $_POST["psmanifiesto_hora_salida"],
                $_POST["psmanifiesto_despachador"],
                $_POST["psmanifiesto_proveedor_documento"],
                $_POST["psauditoria_usuario"]
            ); 
            break;

        case "ctrl_registro_delete":
            $servicio->mdl_registro_delete(
                $_POST["pscodigo_aleatorio"],
                $_POST["psauditoria_usuario"]
            ); 
            break;
        
        case "ctrl_reenvio_vista_01":
            $datos = $servicio->mdl_vista_01(
                $_POST["pstipo_documento_codigo"],
                $_POST["psguia_serie"],
                $_POST["psguia_correlativo"]);
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["sguia_estado_descripcion"];
                $sub_array[] = $row["stipo_servicio_codigo"];
                $sub_array[] = $row["sruta_origen_descripcion"];
                $sub_array[] = $row["sruta_destino_descripcion"];
                $sub_array[] = $row["stipo_documento_codigo"];
                $sub_array[] = $row["sguia_numero_completo"];
                $sub_array[] = $row["sremite_cliente_razon_social"];
                $sub_array[] = $row["sconsigna_empresa_descripcion"];
                $sub_array[] = $row["stipo_servicio_codigo_nuevo"];
                $sub_array[] = $row["sruta_origen_descripcion_nuevo"];
                $sub_array[] = $row["sruta_destino_descripcion_nuevo"];
                $sub_array[] = '<button class="btn btn-outline-success btn-icon btn-circle" onClick="ver(/' .$row["scodigo_aleatorio"]. '/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Ver"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-outline-danger btn-icon btn-circle" onClick="eliminar(/' .$row["scodigo_aleatorio"]. '/,/' .$row["ssuperior_aleatorio"]. '/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Eliminar"><i class="fa fa-trash"></i></button>';

                $data[] = $sub_array;
            }
    
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            echo json_encode($results);


        break;

        /**
        
        
        */
        case "ctrl_obtener_datos_xml":
            $datos=$servicio->mdl_obtener_datos_xml($_POST["pscodigo_aleatorio"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["sremite_cliente_razon_social"]  = $row['sremite_cliente_razon_social'];
                    $output["sremite_cliente_direccion"]  = $row['sremite_cliente_direccion'];
                    $output["sremite_departamento_descripcion"]  = $row['sremite_departamento_descripcion'];
                    $output["sremite_cliente_codigo"]  = $row['sremite_cliente_codigo'];

                    $output["sconsigna_empresa_descripcion"]  = $row['sconsigna_empresa_descripcion'];
                    $output["sdestino_empresa_direccion"]  = $row['sdestino_empresa_direccion'];
                    $output["sdestino_departamento_descripcion"]  = $row['sdestino_departamento_descripcion'];

                    $output["sdestino_empresa_razon_social_nuevo"]  = $row['sdestino_empresa_razon_social_nuevo'];
                    $output["sdestino_empresa_direccion_nuevo"]  = $row['sdestino_empresa_direccion'];
                    $output["sdestino_departamento_descripcion_nuevo"]  = $row['sdestino_departamento_descripcion_nuevo'];

                    $output["sruta_servicio_descripcion"]  = $row['sruta_servicio_descripcion'];
                    $output["sguia_fecha_emision_texto"]  = $row['sguia_fecha_emision_texto'];
                    
                    $output["sruta_servicio_descripcion_nuevo"]  = $row['sruta_servicio_descripcion_nuevo'];
                    $output["sguia_fecha_reenvio_texto_nuevo"]  = $row['sguia_fecha_reenvio_texto_nuevo'];
                    
                    $output["sagente_nombre"]  = $row['sagente_nombre'];
                    $output["sproveedor_razon_social"]  = $row['sproveedor_razon_social'];
                    $output["stipo_transporte_descripcion"]  = $row['stipo_transporte_descripcion'];
                    $output["smanifiesto_fecha_salida_texto"]  = $row['smanifiesto_fecha_salida_texto'];
                    
                    $output["sagente_nombre_nuevo"]  = $row['sagente_nombre_nuevo'];
                    $output["sproveedor_razon_social_nuevo"]  = $row['sproveedor_razon_social_nuevo'];
                    $output["stipo_transporte_descripcion_nuevo"]  = $row['stipo_transporte_descripcion_nuevo'];
                    $output["smanifiesto_fecha_salida_texto_nuevo"]  = $row['smanifiesto_fecha_salida_texto_nuevo'];

                }
                echo json_encode($output);
            }  
        break;

    }

?>