<?php
    #Realizar, comprobar y almacenar credecenciales de la conexión a la DBMS.
    #-----------------------------------------------------------------------------
    include 'header\link.php';
    $link = connect();

    #Recolección y clasificación de las entradas del ranking.
    #-----------------------------------------------------------------------------
    $select = "SELECT `ranking-nick`, `ranking-score`, `ranking-et` FROM ranking ORDER BY `ranking-score` DESC, `ranking-et` ASC";
    $result = mysqli_query($link, $select);
    $val = mysqli_fetch_all($result, MYSQLI_BOTH);
    header("Content-Type: application/json"); // Advise client of response type
    echo json_encode($val); // Escribir contenido de la tabla en formato JSON, que será enviado a la página de ranking.
?>