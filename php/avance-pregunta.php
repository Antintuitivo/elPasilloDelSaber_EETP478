<?php

session_start();

include 'header/session.php';

if(!isset($_SESSION['usuario']['id'])){                                                 //Recupera la info del usuario de la base de datos
    fetch_usersetup();
    fetch_stage();
}

if($_SESSION['juego']['paso'] == 4 || $_SESSION['juego']['paso'] == 7){                 //Recupera la etapa actual del usuario de la base de datos 
    fetch_stage();
}

if($_SESSION['juego']['paso']>9){                                                       //Salida del bucle una vez responda nueve preguntas
    header("Location: header/closer.php"); //cambiar por ranking en caso de hacer tal archivo
}

if(isset($_SESSION['juego']['paso']) && !empty($_POST['respuestas'])){                  //Aumenta la cantidad de preguntas respondidas
    $_SESSION['juego']['paso']++;
}

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

header("Location: Q&A.php");
?>