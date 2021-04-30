<?php
	require_once("../config/conexion.php");
	require_once("../models/arc_tipo_documento.php");
	$objservicio = new svrarc_tipo_documento();

	switch($_GET["caso"]){

		case "ctrl_obtener_vista_00":
			$obj_datos = $objservicio->mdl_obtener_vista_00();
			$crs_data = array();

			foreach ($obj_datos as $row) {
				$sub_array = array();
				$sub_array[] = $row["stipo_documento_codigo"];
				$sub_array[] = $row["stipo_documento_descripcion"];
				$sub_array[] = $row["stipo_documento_breve"];
				$sub_array[] = $row["stipo_documento_sunat"];
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
				$_POST["pstipo_documento_codigo"],
				$_POST["pstipo_documento_descripcion"],
				$_POST["pstipo_documento_breve"],
				$_POST["pstipo_documento_sunat"],
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
					$output["scodigo_aleatorio"] = $row["scodigo_aleatorio"];
					$output["stipo_documento_codigo"] = $row["stipo_documento_codigo"];
					$output["stipo_documento_descripcion"] = $row["stipo_documento_descripcion"];
					$output["stipo_documento_breve"] = $row["stipo_documento_breve"];
					$output["stipo_documento_sunat"] = $row["stipo_documento_sunat"];
					$output["sregistro_estado"] = $row["sregistro_estado"];
					$output["dregistro_fecha"] = $row["dregistro_fecha"];

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
					$html.= "<option value='".$row['stipo_documento_codigo']."'>".ucwords($row['stipo_documento_descripcion'])."</option>";
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
