<?php
    session_start();
    
    #Realizar, comprobar y almacenar credecenciales de la conexión a la DBMS.
    #-----------------------------------------------------------------------------
    include 'header\link.php';
    $link = connect();
    
    header("Content-Type: application/json"); // Advise client of response type

    #Validación de requisitos para el pasaje de etapa.
    #-----------------------------------------------------------------------------
    $etapa = $_SESSION['juego']['etapa'];
    $paso = $_SESSION['juego']['paso'];

    $signals = mysqli_query($link, "SELECT * FROM signals ORDER BY `id-record` DESC LIMIT 1");
    $signal = mysqli_fetch_array($signals);
    
    $id = $_SESSION['usuario']['id'];
    if (($paso == 0 && $_SESSION['juego']['etapa'] == 1) || ($paso == 3 && $_SESSION['juego']['etapa'] == 2) || ($paso == 6 && $_SESSION['juego']['etapa'] == 3)){
        echo "Q&A";
        die();
    }
    if ($paso == 0 && $signal['signal-stage'] == 1){
        mysqli_query($link, "UPDATE journey SET `journey-stage` = '1', `journey-step` = '$paso' WHERE `id-user` = '$id'");
        $_SESSION['juego']['etapa'] = 1;
        echo $_SESSION['juego']['etapa'];
        die();
    }
    if ($paso == 3 && $signal['signal-stage'] == 2){
        mysqli_query($link, "UPDATE journey SET `journey-stage` = '2', `journey-step` = '$paso'  WHERE `id-user` = '$id'");
        $_SESSION['juego']['etapa'] = 2;
        echo $_SESSION['juego']['etapa'];
        die();
    }
    if ($paso == 6 && $signal['signal-stage'] == 3){
        mysqli_query($link, "UPDATE journey SET `journey-stage` = '3', `journey-step` = '$paso' WHERE `id-user` = '$id'");
        $_SESSION['juego']['etapa'] = 3;
        echo $_SESSION['juego']['etapa'];
        die();
    }
    if ($paso == 9){
        echo 'No';
        die();
    }
?>