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

    function fetch_usersetup(){
        
        $tabla1 = "users";
        $tabla2 = "jurney";
        $q = "SELECT TOP 1 * FROM '$tabla2' WHERE 'jurney-ended' = NULL";//selecciona el último registro que no haya terminado el juego//SELECT * FROM TableName WHERE id=(SELECT max(id) FROM TableName)
        
        $result = mysqli_query(connect(),$q);
        if($result){
            $rows = mysqli_fetch_array($result);
            $_SESSION['juego']['usuario'] = $rows['id-user'];
            $_SESSION['juego']['pos'] = $rows['jurney-step'];
        }

        $user = $_SESSION['juego']['usuario'];
        $q_userage = "SELECT TOP 1 * FROM '$tabla1' WHERE 'id-user' = $user";
        $result = mysqli_query(connect(),$q_userage);

        if($result){
            $rows = mysqli_fetch_array($result);
            $_SESSION['juego']['edad'] = $rows['user-age'];
        }
    }

    function fetch_stage(){ 

        $q2 = "SELECT TOP 1 * FROM 'signals' WHERE 'id-record'=(SELECT max('id-record') FROM 'signals')";//lee el último registro de la tabla de señales para saber la etapa actual
        
        $resulta2 = mysqli_query(connect(),$q2);
        if($resulta2){
            $filas = mysqli_fetch_array($resulta2);
            $_SESSION['juego']['stage'] = $filas['signal-stage'];
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