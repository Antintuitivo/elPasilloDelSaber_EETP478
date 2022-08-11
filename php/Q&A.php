<?php
session_start();
include 'header/session.php';

if(!isset($_SESSION['juego']['usuario'])){
    fetch_usersetup();
    fetch_stage();
}

if($_SESSION['juego']['pos']==3||$_SESSION['juego']['pos']==6){
    fetch_stage();
}

if(isset($_SESSION['juego']['pos'])){
    $_SESSION['juego']['pos']++;
}

include 'rand-get.php';

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
<?php 
    if(){

    }
?>
</html>