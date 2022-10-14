<?php
    header("Content-Type: application/json"); // Advise client of response type
    #Realizar, comprobar y almacenar credecenciales de la conexión a la DBMS.
    #-----------------------------------------------------------------------------
    include 'header\link.php';
    $link = connect();

    #Comprobar último usuario.
    $select = "SELECT `id-user` FROM journey ORDER BY `id-user` DESC LIMIT 1";
    $result = mysqli_query($link, $select);
    $user = mysqli_fetch_assoc($result);
    $id = $user['id-user'];

    #Comprobar la edad del último usuario para eleguir ranking a mostrar.
    $select = "SELECT `user-age` FROM users WHERE `id-user` = '$id'";
    $result = mysqli_query($link, $select);
    $user = mysqli_fetch_assoc($result);

    #Recolección y clasificación de las entradas del ranking.
    #-----------------------------------------------------------------------------
    if ($user['user-age'] < 15) {
        $select = "SELECT `ranking-nick`, `ranking-score`, `ranking-et` FROM rankingmenores ORDER BY `ranking-score` DESC, `ranking-et` ASC";
    }elseif($user['user-age'] >= 15){
        $select = "SELECT `ranking-nick`, `ranking-score`, `ranking-et` FROM rankingmayores ORDER BY `ranking-score` DESC, `ranking-et` ASC";
    }
    $result = mysqli_query($link, $select);
    $val = mysqli_fetch_all($result, MYSQLI_BOTH);
    echo json_encode($val); // Escribir contenido de la tabla en formato JSON, que será enviado a la página de ranking.
?>