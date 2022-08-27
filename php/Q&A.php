<?php
session_start();
$p=$_SESSION['juego']['paso'];
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
    <link rel="icon" href="../../web/img/school-icon.svg">
    <link rel="stylesheet" type="text/css" href="../../web/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../../web/css/messages.css">
    <link rel="stylesheet" type="text/css" href="../../web/css/Q&A.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aboreto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>
    <div class="transparent-background"></div>
    <h1><?php echo $_SESSION['juego']['question'];?></h1>
    <form method="POST" action="avance-pregunta.php">
        <div class="respuestas">
            <label class="respuesta"><input name="respuestas" id="R1" type="radio" value=1><?php echo $_SESSION['juego']['ans1'];?></label>
            <label class="respuesta"><input name="respuestas" id="R2" type="radio" value=2><?php echo $_SESSION['juego']['ans2'];?></label>
            <label class="respuesta"><input name="respuestas" id="R3" type="radio" value=3><?php echo $_SESSION['juego']['ans3'];?></label>
        </div>
        <input class="btn-submit" type="submit">
    </form>
    <label for="q">Sigue avanzando!</label><!-- podemos cambiar la etiqueta por otras según etapa -->
    <progress id="q" max="9" value="<?php echo $p?>"> <?php echo $p?>0% </progress>
</body>
</html>