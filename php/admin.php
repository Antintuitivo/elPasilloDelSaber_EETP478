<?php
    #Redirección en caso de no haber iniciado sesión, ni ser administrador.
    include 'header\session.php';
    check_session();
	checkadmin_session();
    
    #Actualiza el valor de la varialbe encargada de guardar la selección durante la sesión.
    if(isset($_POST['content'])){
        $_SESSION['state']['content'] = $_POST['content'];
    } else {$_SESSION['state']['content'] = "register.php";}
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
<form class="big-box" method="POST">
    <img src="../../web/img/school-icon.svg">
    <?php 
        include 'user-menu.php';
    ?>
    <select class="input-48" name="content">
        <option value="<?php if(isset($_SESSION['state']['content'])){echo $_SESSION['state']['content'];}?>">-</option>
        <option value="navegate.php">Navegación de registros</option>
        <option value="tool.php">Herramientas de usuarios</option>
        <option value="register.php">Registro de usuarios</option>
    </select>
    <input class="btn-enviar" formaction=" admin.php" type="submit" value="Seleccionar">
    <div class="embebed-page" id="content">
        <?php    
            #Insertar módulos: register.php, record.php y tool.php.
            if(isset($_SESSION['state']['content'])){
                include $_SESSION['state']['content'];
            }
        ?>
    </div>
</form>
</body>
</html>