<?php
session_start();

if (isset($_SESSION['index_message'])) {
  ?>
  <span class="error"><?php echo $_SESSION['index_message'];?></span>
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
    <link rel="stylesheet" type="text/css" href="../../web/css/messages.css">
    <link rel="stylesheet" type="text/css" href="../../web/css/index.css">
    <link rel="stylesheet" type="text/css" href="../../web/css/fonts.css">
</head>
<body>
    <div class="transparent-background"></div>
    <form class="big-box" method="POST">
        <img src="../../web/img/school-icon.svg">
        <h2>El pasillo del saber</h2>
        <article class="contenedor-inputs">
            <input class="input-100" type="email" placeholder="Dirección de correo electrónico" name="email" maxlength="30" autocomplete="off" required>
            <input class="input-100 btn-enviar" type="submit" value="INICIAR" formaction="../../web/php/acceso.php">
        </article>
    </form>
</body>
</html>