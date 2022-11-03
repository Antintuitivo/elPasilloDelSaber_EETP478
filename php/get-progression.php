<?php
    header("Content-Type: application/json"); // Advise client of response type
    #Realizar, comprobar y almacenar credecenciales de la conexión a la DBMS.
    #-----------------------------------------------------------------------------
    include 'header\link.php';
    $link = connect();

    #Recolección y clasificación de las entradas del ranking.
    #-----------------------------------------------------------------------------
    $select = "SELECT `id-user`, `journey-step` FROM journey ORDER BY `id-user` DESC LIMIT 1";
    $result = mysqli_query($link, $select);
    $data['journey'] = mysqli_fetch_assoc($result);
    // print_r($data);
    $id = $data['journey']['id-user'];

    #Comprobar la edad del último usuario para eleguir ranking a mostrar.
    $select = "SELECT `user-age` FROM users WHERE `id-user` = '$id'";
    $result = mysqli_query($link, $select);
    $user = mysqli_fetch_assoc($result);

    #Recolección y clasificación de las entradas del ranking.
    #-----------------------------------------------------------------------------
    if ($user['user-age'] < 15) {
        $select = "SELECT `ranking-score` FROM rankingmenores WHERE `id-user` = '$id'";
    }elseif($user['user-age'] >= 15){
        $select = "SELECT `ranking-score` FROM rankingmayores WHERE `id-user` = '$id'";
    }
    $result = mysqli_query($link, $select);
    $data['ranking'] = mysqli_fetch_assoc($result);

    echo json_encode($data); // Escribir contenido de la tabla en formato JSON, que será enviado a la página de ranking.
?>