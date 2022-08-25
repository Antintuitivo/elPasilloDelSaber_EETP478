<?php
include 'header/session.php';

if(isset($_POST['respuestas']) && $_POST['respuestas'] == $_SESSION['juego']['ans_c']){ //Suma de puntos
    $_SESSION['juego']['racha']++;

    
    if($_SESSION['juego']['racha']>0){
        $_SESSION['tabla']['puntaje'] = $_SESSION['tabla']['puntaje'] + 10 * $_SESSION['juego']['etapa'] * $_SESSION['juego']['racha'];
        
    }else{
        $_SESSION['tabla']['puntaje'] += 10 * $_SESSION['juego']['etapa'];
    }
    
}else{
    $_SESSION['juego']['racha'] = 0;
}

if(isset($_POST['respuestas'])){                                                        //recupera las preguntas sólo si se respondió la anterior
    include 'rand-get.php';
}

if($_SESSION['juego']['paso']==0){                                                 //Recupera la info del usuario de la base de datos
    fetch_usersetup();
    fetch_stage();
    include 'rand-get.php';
}

if(isset($_SESSION['juego']['paso']) && isset($_POST['respuestas'])){                  //Aumenta la cantidad de preguntas respondidas
    $_SESSION['juego']['paso'] += 1;
}

if(($_SESSION['juego']['paso'] == 3 && $_SESSION['juego']['etapa'] == 1) || ($_SESSION['juego']['paso'] == 6 && $_SESSION['juego']['etapa'] == 2)){                 //Recupera la etapa actual del usuario de la base de datos 
    header( "Location: ../../web/php/intermedio-page.php");
    die();
}

if($_SESSION['juego']['paso'] == 9){                                                       //Salida del bucle una vez responda nueve preguntas
    $id = $_SESSION['usuario']['id'];
    $update = "UPDATE journey SET `journey-ended` = current_timestamp() WHERE `id-user` = '$id'";
    mysqli_query($link,$update);
    header("Location: ../../web/php/nick-page.php");
    die();
}



header("Location: Q&A.php");
?>