<?php
    session_start();
    #Realizar, comprobar y almacenar credecenciales de la conexión a la DBMS.
    #-----------------------------------------------------------------------------
    include 'link.php';
    $link = connect();
    
    function check_session(){
        if (($_SESSION['login']['id-user'] == null) || ($_SESSION['login']['id-user'] == '')){
            header("Location: /../web/");
        }
    }
    #Redirección en caso de no ser administrador.
    function checkadmin_session(){
        if ($_SESSION['login']['user-admin'] == 0 ){
            header("Location: /../web/");
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