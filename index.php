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
            <div class="borde">
                <h3>Ingrese su usuario</h3>
                <div class="nickname-creation">
                    <input class="input-48 noLeftMargin" type="text" placeholder="Ingrese 3 letras" name="nick" maxlength="3" autocomplete="off" required>
                    <input class="input-48 noRightMargin" type="number" placeholder="Agregue 3 números" name="nums" maxlength="3" autocomplete="off" required>
                </div>
            </div>
            <input class="input-100" type="email" placeholder="Dirección de correo electrónico" name="email" maxlength="30" autocomplete="off" required>
            <input class="input-100" type="number" placeholder="Edad" name="edad" min="0" max="99" required>
            <input class="input-100 btn-enviar" type="submit" value="INICIAR" formaction="../../web/php/registro.php">
        </article>
    </form>
    <?php 
        #Cierre de sesión para vaciar variables.
        #-----------------------------------------------------------------------------
        session_unset();
        session_destroy();
        setcookie("PHPSESSID", "", time()-1000,"/", "127.0.0.1",false,false);
    ?>
</body>
</html>