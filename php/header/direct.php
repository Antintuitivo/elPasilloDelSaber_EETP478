<?php
session_start();

function loop_questions(){
    if($_SESSION['juego']['pos']<=9){
        header("Location: /../web/php/Q&A.php");

    }else{
        header("Location: /../web/php/--escribirRanking--");
    }
}

?>