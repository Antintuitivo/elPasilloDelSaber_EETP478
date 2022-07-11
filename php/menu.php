<!--sideBar menu-->
<head>
<link rel="stylesheet" type="text/css" href="../../web/css/menu.css">
</head>
<body>
<div class="menu-position">
    <div class="icon-menu">
        <svg id="icon-menu" fill="white" height="30" viewBox="0 0 30 30" width="30" xmlns="http://www.w3.org/2000/svg"><path d="M.5 24.006h29c.277 0 .5.223.5.5s-.223.5-.5.5H.5c-.277 0-.5-.223-.5-.5s.223-.5.5-.5zm0-10.003h29c.277 0 .5.223.5.5s-.223.5-.5.5H.5c-.277 0-.5-.223-.5-.5s.223-.5.5-.5zM.5 4h29c.277 0 .5.223.5.5s-.223.5-.5.5H.5C.223 5 0 4.777 0 4.5S.223 4 .5 4z"/></svg>
    </div>
    <div class="cont-menu active" id="menu">
        <form method="POST">
            <input formaction="/web/php/header/closer.php" type="submit" value="Cerrar sesión">
        </form>
        <p><?php print_r("Bienvenido " . $_SESSION['login']['user-fname'] . " " . $_SESSION['login']['user-lname']);?></p>
        <ul>
            <li id="register" value="register.php"> Registro de usuarios </li>
            <li id="record" value="record.php"> Registro de accesos </li>
            <li id="tool" value="tool.php"> Herramienta usuarios </li>
        </ul>
    </div>
</div>
<script src="../../web/javascript/app.js"></script>
</body>
<!--End sideBar menu-->