<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="El Camino del Saber"/>
    <meta name="author" content="Roldán Tomas - Juan Ignacio Bianchini">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <title>Ingresar</title>
    <link rel="icon" href="img\school-icon.svg">
    <link rel="stylesheet" type="text/css" href="../../web/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../../web/css/messages.css">
    <link rel="stylesheet" type="text/css" href="../../web/css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="transparent-background"></div>
    <form class="big-box" method="POST">
        <img src="../../web/img/school-icon.svg">
        <h2> Iniciar sesión </h2>
        <article class="contenedor-inputs">
            <input class="input-100" type="email" placeholder="Dirección de correo electrónico" name="email" required>
            <input class="input-100" type="number" placeholder="Edad" name="edad" min="0" required>
            <input class="input-48 btn-enviar" type="submit" value="INICIAR" formaction="../../web/php/registro.php">
        </article>
    </form>
</body>
</html>