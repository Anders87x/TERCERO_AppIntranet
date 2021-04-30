<?php
	require_once("../config/conexion.php");
	require_once("../models/arc_agente.php");
	$objservicio = new svrarc_agente();

	switch($_GET["caso"]){

		case "ctrl_obtener_vista_00":
			$obj_datos = $objservicio->mdl_obtener_vista_00();
			$crs_data = array();

			foreach ($obj_datos as $row) {
				$sub_array = array();
				$sub_array[] = $row["sagente_codigo"];
				$sub_array[] = $row["sagente_nombre"];
				$sub_array[] = $row["sdocumento_numero"];
				$sub_array[] = $row["sagente_telefono_numero"];
				$sub_array[] = $row["sagente_celular_numero"];
				$sub_array[] = $row["sdepartamento_descripcion"];
				$sub_array[] = $row["sagente_direccion"];
				$sub_array[] = $row["sagente_estado_descripcion"];
				$sub_array[] = '<button class="btn btn-outline-danger btn-icon btn-circle" onClick="mgrilla_item_eliminar(/' .$row["scodigo_aleatorio"]. '/);"  id="' . $row["scodigo_aleatorio"] . '" data-toggle="tooltip" title="Eliminar"><i class="fa fa-trash"></i></button>';

				$crs_data[] = $sub_array;
			}

			$results = array(
				"sEcho" => 1,
				"iTotalRecords" => count($crs_data),
				"iTotalDisplayRecords" => count($crs_data),
				"aaData" => $crs_data
			);
			echo json_encode($results);
			break;

		case "ctrl_agregar":
			$objservicio->mdl_agregar(
				$_POST["psagente_codigo"],
				$_POST["psagente_nombre"],
				$_POST["psdocumento_numero"],
				$_POST["psagente_telefono_numero"],
				$_POST["psagente_celular_numero"],
				$_POST["pstipo_servicio_codigo"],
				$_POST["psruta_servicio_codigo"],
				$_POST["psagente_direccion"],
				$_POST["psagente_correo_electronico"],
				$_POST["psagente_estado"],
				$_POST["psauditoria_usuario"]
			);
			break;

		case "ctrl_eliminar":
			$objservicio->mdl_eliminar(
				$_POST["pscodigo_aleatorio"],
				$_POST["psauditoria_usuario"]
			);
			break;

		case "ctrl_buscar":
			$obj_datos = $objservicio->mdl_buscar($_POST["pscodigo_aleatorio"]);

			if(is_array($obj_datos)==true and count($obj_datos)>0){
				foreach($obj_datos as $row)
				{
					$output["sagente_codigo"] = $row["sagente_codigo"];
					$output["sagente_nombre"] = $row["sagente_nombre"];
					$output["sdocumento_numero"] = $row["sdocumento_numero"];
					$output["sagente_telefono_numero"] = $row["sagente_telefono_numero"];
					$output["sagente_celular_numero"] = $row["sagente_celular_numero"];
					$output["stipo_servicio_codigo"] = $row["stipo_servicio_codigo"];
					$output["sruta_servicio_codigo"] = $row["sruta_servicio_codigo"];
					$output["sagente_direccion"] = $row["sagente_direccion"];
					$output["sagente_correo_electronico"] = $row["sagente_correo_electronico"];
					$output["sagente_estado"] = $row["sagente_estado"];
					$output["sregistro_estado"] = $row["sregistro_estado"];
					$output["scodigo_aleatorio"] = $row["scodigo_aleatorio"];

					$output["sauditoria_usuario"] = $row["sauditoria_usuario"];
					$output["dauditoria_fecha"] = $row["dauditoria_fecha"];
					$output["sauditoria_operacion"] = $row["sauditoria_operacion"];
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
					$html.= "<option value='".$row['sagente_codigo']."'>".ucwords($row['sagente_nombre'])."</option>";
				}
				echo $html;      
			}
			break;   

		case "ctrl_buscar_dependencia":
			$obj_datos = $objservicio->mdl_buscar_dependencia($_POST["pscodigo_aleatorio"]);

			if(is_array($obj_datos)==true and count($obj_datos)>0){	
				foreach($obj_datos as $row)
				{
					$output["nnumero_registros"] = $row["nnumero_registros"];
				}
				echo json_encode($output);
			}
			break;
	}

?>
