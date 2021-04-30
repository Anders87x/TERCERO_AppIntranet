<?php
    require_once("../config/conexion.php");
    require_once("../models/sun_provincia.php");
    $objservicio = new svrsun_provincia();

    switch($_GET["caso"]){

        case 'ctrl_registro_obtener_datos_select':
            $obj_datos = $objservicio->mdl_registro_obtener_datos_select(
                $_POST["psdepartamento_codigo"]
            );
            if(is_array($obj_datos)==true and count($obj_datos)>0){
                $html= "<option value=''>SELECCIONE</option>";
                foreach($obj_datos as $row)
                {
                    $html.= "<option value='".$row['sprovincia_codigo']."'>".ucwords($row['sprovincia_descripcion'])."</option>";
                }
                echo $html;      
            }
        break;   

        case "ctrl_select":
            $obj_datos = $objservicio->mdl_select(
                $_POST["psdepartamento_codigo"]
            );
            if(is_array($obj_datos)==true and count($obj_datos)>0){
                $html= "<option value=''>SELECCIONE</option>";
                foreach($obj_datos as $row)
                {
                    $html.= "<option value='".$row['sprovincia_codigo']."'>".ucwords($row['sprovincia_descripcion'])."</option>";
                }
                echo $html;      
            }
        break;

    }
?>


