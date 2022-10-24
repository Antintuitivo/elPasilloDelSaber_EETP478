<?php
include 'header/session.php';

//Aumenta la cantidad de preguntas respondidas
if(isset($_POST['respuestas'])){
    $_SESSION['juego']['paso'] += 1;
    $id = $_SESSION['usuario']['id'];
    $paso = $_SESSION['juego']['paso'];
    $update = "UPDATE journey SET `journey-step` = '$paso' WHERE `id-user` = '$id'";
    mysqli_query($link,$update);
}

//Suma de puntos
if(isset($_POST['respuestas']) && ($_POST['respuestas'] == $_SESSION['juego']['ans_c'])){
    ++$_SESSION['juego']['racha'];
    $_SESSION['tabla']['puntaje'] += ((13 * $_SESSION['juego']['etapa']) * $_SESSION['juego']['racha']);
}else if(isset($_POST['respuestas']) && ($_POST['respuestas'] == $_SESSION['juego']['ans_c'])) {
    $_SESSION['juego']['racha'] = 0;
}

//Salida del bucle una vez responda nueve preguntas
if($_SESSION['juego']['paso'] >= 9){
    $id = $_SESSION['usuario']['id'];
    $update = "UPDATE journey SET `journey-ended` = current_timestamp() WHERE `id-user` = '$id'";
    mysqli_query($link,$update);
    
    #Recuperación y comparación del tiempo transcurrido en el juego.
    #-----------------------------------------------------------------------------
    $select = "SELECT*FROM journey WHERE `id-user`='$id'";
    $result = mysqli_query($link, $select);
    $validation = mysqli_num_rows($result);
    
    $journey = mysqli_fetch_assoc($result);
    
    $first  = date_create($journey['journey-started']);
    $second = date_create($journey['journey-ended']);
    
    //echo date_format($first, 'H:i:s') . "<br>";
    //echo date_format($second, 'H:i:s') . "<br>";
    
    $diff = $first->diff($second);
    $et = $diff->format( '%H:%I:%S' );
    
    $_SESSION['tabla']['tiempo'] = $et;
    
    header("Location: ../../web/php/nick-page.php");
    die();
}

//recupera las preguntas sólo si se respondió la anterior
if(isset($_POST['respuestas']) || $_SESSION['juego']['paso'] == 0 || $_SESSION['juego']['paso'] == 3 || $_SESSION['juego']['paso'] == 6){
    include 'rand-get.php';
}
echo "finished";
//Redirecciona al intermedio y borra la banlist
if(($_SESSION['juego']['paso'] == 3 && $_SESSION['juego']['etapa'] == 1) || ($_SESSION['juego']['paso'] == 6 && $_SESSION['juego']['etapa'] == 2)){
    unset($_SESSION['juego']['banlist']);
    header( "Location: ../../web/php/intermedio-page.php");
    die();
} else {
    header("Location: ../../web/php/Q&A.php");
}
?>