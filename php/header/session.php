<?php
    session_start();
    #Realizar, comprobar y almacenar credecenciales de la conexión a la DBMS.
    #-----------------------------------------------------------------------------
    include 'link.php';
    $link = connect();
    
    function check_session(){
        if (($_SESSION['usuario']['id'] == null) || ($_SESSION['usuario']['id'] == '')){
            header("Location: /../web/");
        }
    }

    function fetch_stage(){ 

        $q2 = "SELECT * FROM signals ORDER BY `id-record` DESC LIMIT 1";//lee el último registro de la tabla de señales para saber la etapa actual
        
        $resulta2 = mysqli_query(connect(),$q2);
        if($resulta2){
            $filas = mysqli_fetch_array($resulta2);
            $_SESSION['juego']['etapa'] = $filas['signal-stage'];
        }
    }
    
    /*function close_session(){
        $id_record = $_SESSION['register']['id-record'];
        $sql = "UPDATE `user-record` SET `record-logout` = CURRENT_TIME() WHERE `user-record`.`id-record` = '$id_record'";
        mysqli_query($link,$sql);
        session_destroy();
        setcookie("PHPSESSID", "", time()-1000,"/", "127.0.0.1",false,false);
        header("Location: /../login/");
    }*/
?>