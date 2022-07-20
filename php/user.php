<?php
    #Redirección en caso de no haber iniciado sesión, ni ser administrador.
    include 'header\session.php';
    include '..\javascript\timed-logout.js'
    check_session();
    StartTimers();
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Página web de control"/>
    <meta name="author" content="Roldán Tomas - Juan Ignacio Bianchini">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <title>Sistema</title>
    <link rel="icon" href="../img/school-icon.svg">
    <link rel="stylesheet" type="text/css" href="../../web/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../../web/css/admin.css">
    <link rel="stylesheet" type="text/css" href="../../web/css/messages.css">
    <link rel="stylesheet" type="text/css" href="../../web/css/user-menu.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
        include 'user-menu.php';
    ?>
    <form class="big-box" method="POST">
        <img src="../../web/img/school-icon.svg">
        <div class="embebed-page" id="content">
        <div class="smol-box">  
            <h2>Comandar Raspberry</h2>
            <select class="input-100" name="codes">
                <option>Seleccionar</option>
                <option value="\test-a.sh">Prueba A</option>
                <option value="\test-b.sh">Prueba B</option>
                <option value="\test-c.sh">Prueba C</option>
                <option value="\script-off.sh">Desactivar</option>
                <option value="\script-on.sh">Activar</option>
                <option value="\script-timer.sh">Timer</option>
            </select>
            <input class="btn-enviar" type="submit" formaction="user.php" value="Activar">
        </div>
        <?php
            include 'header/shell_exec.php';
        ?>
    </div>
</form>
</body>
</html>