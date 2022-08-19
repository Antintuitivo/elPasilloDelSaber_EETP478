<h1>Ve a la siguiente etapa</h1>
<?php
    session_start();
    
    #Realizar, comprobar y almacenar credecenciales de la conexión a la DBMS.
    #-----------------------------------------------------------------------------
    include 'header\link.php';
    $link = connect();
    
    #Validación de requisitos para el pasaje de etapa.
    #-----------------------------------------------------------------------------
    $juego = $_SESSION['juego'];
    while (1 == 1) {
    $signal = mysqli_query($link, "SELECT * FROM signals ORDER BY `id-record` DESC LIMIT 1");
    $signal = mysqli_fetch_array($signal);
    
    $iduser = $_SESSION['usuario']['id'];
    if ($juego['paso'] == 0 && $signal['signal-stage'] == 1){
        mysqli_query($link, "UPDATE journey SET `journey-stage` = '1' WHERE `id-user` = '$iduser'");
        $_SESSION['juego']['etapa'] = 1;
        header("Location: ../../web/php/Q&A.php");
    }
    if ($juego['paso'] == 3 && $signal['signal-stage'] == 2){
        mysqli_query($link, "UPDATE journey SET `journey-stage` = '2' WHERE `id-user` = '$iduser'");
        $_SESSION['juego']['etapa'] = 2;
        header("Location: ../../web/php/Q&A.php");
    }
    if ($juego['paso'] == 6 && $signal['signal-stage'] == 3){
        mysqli_query($link, "UPDATE journey SET `journey-stage` = '3' WHERE `id-user` = '$iduser'");
        $_SESSION['juego']['etapa'] = 3;
        header("Location: ../../web/php/Q&A.php");
    }
    if ($juego['paso'] == 9 && $signal['signal-stage'] == 3){
        $message = "Ya ha finalizado el cuestionario.";
        ?>
        <span class="error"><?php echo $message;?></span>
        <?php
        header("Location: ../../web/php/ranking.php");
    }
    sleep(1);
}
?>
<!--<script>
    while(1){
        if (window.XMLHttpRequest)
            {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
            {// code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
        xmlhttp.open("GET","../php/inter.php",false);
        xmlhttp.send();
        sleep(4);
        }
</script>