<?php

    require_once '/lib/cross';

    $usuario = $_POST['Data'];

    if ( empty ($usuario) ) {
        $parametros['res'] = false ;
        $parametros['men'] = 'Por favor ingrese la información';
        echo json_encode( $parametros );
    }else {
        $query_iu = "INSERT INTO `USUARIOS` VALUES ('".$usuario['correo']."', '".$usuario['nombres']."', '".$usuario['apellidop']."', '".$usuario['apellidom']."', '".$usuario['fechan']."', '".$usuario['celular']."', '".$usuario['pass']."');";

        if ( $resultado = mysqli_query( $conn , $query_iu) ) {
            $rinsert = mysqli_fetch_row($resultado);
            if ( $rinsert == 1 ) {
                $parametros['res'] = true ;
                $parametros['men'] = 'Usuario registrado';
                echo json_encode( $parametros );
            }
        }
    }


?>