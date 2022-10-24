<?php
session_start();
if(!isset($_SESSION['usuario'])){
  header("Location: ../../web/php/ranking.php");
}

if (isset($_SESSION['nick_message'])) {
  ?>
  <span class="error"><?php echo $_SESSION['nick_message'];?></span>
  <?php
}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="El pasillo del saber"/>
    <meta name="author" content="Roldán Tomas - Juan Ignacio Bianchini">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <title>El pasillo del saber</title>
    <link rel="icon" href="img\school-icon.svg">
    <link rel="stylesheet" type="text/css" href="../../web/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../../web/css/nick.css">
    <link rel="stylesheet" type="text/css" href="../../web/css/messages.css">
    <link rel="stylesheet" type="text/css" href="../../web/css/fonts.css">
</head>
<body>
    <div class="transparent-background"></div>
    <div class="big-box">
        <form method="POST" class="contenedor">
            <img src="../../web/img/school-icon.svg">
            <h2>Ingresar nick</h2>
            <input class="input-100" type="text" placeholder="Ingresar nick" name="nick" maxlength="3" required>
            <div class="stats">
                <span class="puntos"><b>Puntos:</b> <?PHP echo $_SESSION['tabla']['puntaje'];?></span>
                <span class="puntos"><b>Tiempo:</b> <?PHP echo $_SESSION['tabla']['tiempo'];?></span>
            </div>
            <input class="input-100 btn-enviar" type="submit" value="INGRESAR" formaction="../../web/php/nick.php">
        </form>
    </div>
</body>
</html>