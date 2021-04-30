<?php
	require_once("../config/conexion.php");
	require_once("../models/arc_cliente.php");
	$objservicio = new svrarc_cliente();

	switch($_GET["caso"]){

		case "ctrl_obtener_vista_00":
			$obj_datos = $objservicio->mdl_obtener_vista_00();
			$crs_data = array();

			foreach ($obj_datos as $row) {
				$sub_array = array();
				$sub_array[] = $row["scliente_codigo"];
				$sub_array[] = $row["scliente_ruc"];
				$sub_array[] = $row["scliente_razon_social"];
				$sub_array[] = $row["scliente_direccion"];
				$sub_array[] = $row["sdepartamento_descripcion"];
				$sub_array[] = $row["sprovincia_descripcion"];
				$sub_array[] = $row["subigeo_descripcion"];
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
				$_POST["pscliente_codigo"],
				$_POST["pscliente_ruc"],
				$_POST["pscliente_razon_social"],
				$_POST["pscliente_abreviatura"],
				$_POST["pscliente_direccion"],
				$_POST["psdepartamento_codigo"],
				$_POST["psprovincia_codigo"],
				$_POST["psubigeo_codigo"],
				$_POST["pscliente_central_telefonica"],
				$_POST["psgrupo_cliente_codigo"],
				$_POST["pscliente_politica_precio"],
				$_POST["pscliente_facturacion"],
				$_POST["pscliente_estado"],
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
					$output["scliente_codigo"] = $row["scliente_codigo"];
					$output["scliente_ruc"] = $row["scliente_ruc"];
					$output["scliente_razon_social"] = $row["scliente_razon_social"];
					$output["scliente_abreviatura"] = $row["scliente_abreviatura"];
					$output["scliente_direccion"] = $row["scliente_direccion"];
					$output["sdepartamento_codigo"] = $row["sdepartamento_codigo"];
					$output["sprovincia_codigo"] = $row["sprovincia_codigo"];
					$output["subigeo_codigo"] = $row["subigeo_codigo"];
					$output["scliente_central_telefonica"] = $row["scliente_central_telefonica"];
					$output["sgrupo_cliente_codigo"] = $row["sgrupo_cliente_codigo"];
					$output["scliente_politica_precio"] = $row["scliente_politica_precio"];
					$output["scliente_facturacion"] = $row["scliente_facturacion"];
					$output["scliente_estado"] = $row["scliente_estado"];
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
						$html.= "<option value='".$row['scliente_codigo']."'>".ucwords($row['scliente_razon_social'])."</option>";
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
