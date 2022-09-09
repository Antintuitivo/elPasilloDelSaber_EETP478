<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="El Camino del Saber"/>
    <meta name="author" content="Roldán Tomas - Juan Ignacio Bianchini">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <title>Ranking</title>
    <link rel="icon" href="../../web/img/school-icon.svg">
    <link rel="stylesheet" type="text/css" href="../../web/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../../web/css/messages.css">
    <link rel="stylesheet" type="text/css" href="../../web/css/index.css">
    <link rel="stylesheet" type="text/css" href="../../web/css/ranking.css">
</head>
<body>
    <div class="transparent-background"></div>
        <div class="big-box">
        <img src="../../web/img/school-icon.svg">
        <div class="contenedor">
            <input type="text" placeholder="Buscar por nick.." id="search-input" onkeyup="myFunction(this.value, 'ranking')">
            <div style="overflow: auto; max-height: 400px;">
                <table id="ranking">
                    <tr>
                        <th class="table-header">Posición</th>
                        <th class="table-header">Nick</th>
                        <th class="table-header">Puntaje</th>
                        <th class="table-header">Tiempo</th>
                    </tr>
                </table>
                <!--<tr><td>Sin registros.</td></tr>-->
            </div>
        </div>
    </div>
    <script src="../../web/javascript/ranking-update.js"></script>
    <!--<h1>You are the number one Shōnen!</h1>
    <img src="//c.tenor.com/TIABFPqpNzIAAAAd/all-might-anime.gif">-->
</body>