<?php
    require_once("../config/conexion.php");
    require_once("../models/arc_destinatario.php");
    $objservicio = new svrarc_destinatario();

    switch($_GET["op"]){

        case "ctrl_registro_obtener_datos_01":
            $datos = $objservicio->mdl_registro_obtener_datos_01();
            $data = array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["sdestinatario_razon_social"];
                $sub_array[] = $row["sdestinatario_direccion"];
                $sub_array[] = $row["sdepartamento_descripcion"];
                $sub_array[] = $row["sprovincia_descripcion"];
                $sub_array[] = $row["sdistrito_descripcion"];
                $sub_array[] = '<button class="btn btn-outline-danger btn-icon btn-circle" onClick="registro_eliminar(/' .$row["scodigo_aleatorio"]. '/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Eliminar"><i class="fa fa-trash"></i></button>';

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

        case "ctrl_registro_nuevo":
            $objservicio->mdl_registro_nuevo(
                $_POST["psdestinatario_razon_social"],
                $_POST["psdestinatario_direccion"],
                $_POST["psdepartamento_codigo"],
                $_POST["psprovincia_codigo"],
                $_POST["psdistrito_codigo"],
                $_POST["psauditoria_usuario"]
            ); 
            break;

        case "ctrl_registro_eliminar":
            $objservicio->mdl_registro_eliminar(
                $_POST["pscodigo_aleatorio"],
                $_POST["psauditoria_usuario"]
            ); 
            break;
        
        case 'ctrl_registro_buscar':
            $datos = $objservicio->mdl_registro_buscar($_POST["pscodigo_aleatorio"]);

            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["sdestinatario_razon_social"]  = $row['sdestinatario_razon_social'];
                    $output["sdestinatario_direccion"]  = $row['sdestinatario_direccion'];
                    $output["sdepartamento_codigo"]  = $row['sdepartamento_codigo'];
                    $output["sprovincia_codigo"]  = $row['sprovincia_codigo'];
                    $output["sdistrito_codigo"]  = $row['sdistrito_codigo'];

                    $output["sauditoria_usuario"]  = $row['sauditoria_usuario'];
                    $output["sauditoria_fecha_hora_texto"]  = $row['sauditoria_fecha_hora_texto'];
                    $output["sauditoria_operacion"]  = $row['sauditoria_operacion'];
                }
                echo json_encode($output);
            }      
            break;

		case 'ctrl_select':
				$obj_datos = $objservicio->mdl_select();
				if(is_array($obj_datos)==true and count($obj_datos)>0){
					$html= "<option value=''>SELECCIONE</option>";
					foreach($obj_datos as $row)
					{
						$html.= "<option value='".$row['sdestinatario_razon_social']."'>".ucwords($row['sdestinatario_razon_social'])."</option>";
					}
					echo $html;      
				}
			break;   
                    
        case "ctrl_registro_buscar_dependencia":
            $datos = $objservicio->mdl_registro_buscar_dependencia($_POST["pscodigo_aleatorio"]);

            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["nnumero_registros"]  = $row['nnumero_registros'];
                }
                echo json_encode($output);
            }      
            break;
    }

?>