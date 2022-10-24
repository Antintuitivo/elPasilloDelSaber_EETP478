<?php
    #Realizar, comprobar y almacenar credecenciales de la conexión a la DBMS.
    #-----------------------------------------------------------------------------
    include 'header\link.php';
    $link = connect();

    header("Content-Type: application/json"); // Advise client of response type

    #Recolección y clasificación de las entradas del ranking.
    #-----------------------------------------------------------------------------
    $select = "SELECT `journey-step`, `journey-stage` FROM journey ORDER BY `id-user` DESC LIMIT 1";
    $result = mysqli_query($link, $select);
    $val = mysqli_fetch_assoc($result);
    echo $val['journey-step'];
    die();
?>