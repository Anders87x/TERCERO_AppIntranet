<?php
    require_once("../config/conexion.php");
    require_once("../models/log_guia_documentos_cliente.php");
    $servicio = new svrlog_guia_documentos_cliente();

    switch($_GET["caso"]){

        case "ctrl_documento_subir":
            $hoy = date("Ymd");
            $imagen = $_FILES["imagen"]['tmp_name'];

            if (isset($imagen)) {
                $lsarchivo_extension = explode('.', $_FILES['imagen']['name']);
                $lsarchivo_nombre   = $hoy.rand() . '.' . $lsarchivo_extension[1];
                $lscliente_codigo   = $_POST["pscliente_codigo"];
                $lscarpeta_destino  = "../upload/" . $lscliente_codigo . "/";

                if (!file_exists($lscarpeta_destino)) {
                    mkdir($lscarpeta_destino, 0777, true);
                }

                $lsarchivo_destino = $lscarpeta_destino . $lsarchivo_nombre;
                $lsguia_documento_ruta_web = $lsarchivo_destino;
                $lscodigo_aleatorio = $_POST["pscodigo_aleatorio"];
                move_uploaded_file($_FILES['imagen']['tmp_name'], $lsarchivo_destino);

                $servicio->mdl_log_guia_documentos_cliente_update_file(
                    $lsguia_documento_ruta_web,
                    $lscodigo_aleatorio
                );

            }
            break;
    }

?>