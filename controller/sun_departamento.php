<?php
    require_once("../config/conexion.php");
    require_once("../models/sun_departamento.php");
    $objservicio = new svrsun_departamento();

    switch($_GET["caso"]){

        case 'ctrl_registro_obtener_datos_select':
            $obj_datos = $objservicio->mdl_registro_obtener_datos_select();
            if(is_array($obj_datos)==true and count($obj_datos)>0){
                $html= "<option value=''>SELECCIONE</option>";
                foreach($obj_datos as $row)
                {
                    $html.= "<option value='".$row['sdepartamento_codigo']."'>".ucwords($row['sdepartamento_descripcion'])."</option>";
                }
                echo $html;      
            }
        break;

        case 'ctrl_select':
            $obj_datos = $objservicio->mdl_registro_obtener_datos_select();
            if(is_array($obj_datos)==true and count($obj_datos)>0){
                $html= "<option value=''>SELECCIONE</option>";
                foreach($obj_datos as $row)
                {
                    $html.= "<option value='".$row['sdepartamento_codigo']."'>".ucwords($row['sdepartamento_descripcion'])."</option>";
                }
                echo $html;      
            }
        break;   

    }
?>


