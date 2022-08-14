<?php
session_start();
include 'header/session.php';

if(!isset($_SESSION['usuario']['id'])){      //recupera la info del usuario de la base de datos
    fetch_usersetup();
    fetch_stage();
}

if($_SESSION['juego']['paso']==4||$_SESSION['juego']['paso']==7){ //recupera la etapa actual del usuario de la base de datos 
    fetch_stage();
}

if(isset($_SESSION['juego']['paso']) && !empty($_POST['respuestas'])){  //aumenta la cantidad de preguntas respondidas
    $_SESSION['juego']['paso']++;
}

if($_SESSION['juego']['paso']>9){                 //salida del bucle una vez responda nueve preguntas
    header("Location: --escribirRanking--.php");
}

include 'rand-get.php';

/* if(){

}
*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas Avellaneda</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>

    <h1> <?php echo $_SESSION['juego']['question'];?></h1>

    <form method="POST">

    <label> <input name="respuestas"  id="R1" type="radio"> <?php echo $_SESSION['juego']['ans1'];?></label>
    <label> <input name="respuestas"  id="R2" type="radio"> <?php echo $_SESSION['juego']['ans2'] ;?> </label>
    <label> <input name="respuestas"  id="R3" type="radio"> <?php echo $_SESSION['juego']['ans3'] ;?></label>
    <input class="btn-enviar" type="submit">

</form>

</body>
</html>