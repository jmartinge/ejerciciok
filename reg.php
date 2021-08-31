<?php

    require_once 'lib/cross.php';

    ini_set('display_errors', 'On');
    $json = file_get_contents ( 'php://input' );

    //echo json_encode ( $json );
    //echo json_encode ( 'Usuario Registrado' );

    $json = json_decode($json);

    //$usuario = json_decode ( $json );

    if ( empty ($json) ) {
        $parametros['res'] = false ;
        $parametros['men'] = 'Por favor ingrese la información';
        header("HTTP/1.1 200 OK");
        echo json_encode( $parametros );
    }else {
        $parametros['res'] = false ;
        $parametros['men'] = 'Pasa porque tiene datos pero no guarda';
        $parametros['datos'] = $json ;
        header("HTTP/1.1 200 OK");
        echo json_encode( $parametros );
        $query_iu = "INSERT INTO `USUARIOS` VALUES ('".$json['correo']."', '".$json['nombres']."', '".$json['apellidop']."', '".$json['apellidom']."', '".$json['fechan']."', '".$json['celular']."', MD5('".$json['pass']."'));";

        if ( $resultado = mysqli_query( $conn , $query_iu) ) {
            $rinsert = mysqli_fetch_row($resultado);
            if ( $rinsert == 1 ) {
                $parametros['res'] = true ;
                $parametros['men'] = 'Usuario registrado';
                header("HTTP/1.1 200 OK");
                echo json_encode( $parametros );
            }
        }
    }
?>