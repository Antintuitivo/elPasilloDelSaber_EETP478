<?php
    session_start();
    
    #Realizar, comprobar y almacenar credecenciales de la conexión a la DBMS.
    #-----------------------------------------------------------------------------
    include 'header\link.php';
    $link = connect();
    
    #Validación de requisitos para el pasaje de etapa.
    #-----------------------------------------------------------------------------
    $juego = $_SESSION['juego'];
    $signal = mysqli_query($link, "SELECT * FROM signals ORDER BY `id-record` DESC LIMIT 1");

    if($journey != false) {
        $signal = mysqli_fetch_array($sensorsignal);
        
        if(isset($n)){
            $iduser = $_SESSION['usuario']['id'];
            if ($juego['paso'] == 0 && $signal['signal-stage'] == 1){
                mysqli_query($link, "UPDATE journey SET `journey-stage` = '1' WHERE `id-user` = '$iduser'");
            }
            if ($juego['paso'] == 3 && $signal['signal-stage'] == 2){
                mysqli_query($link, "UPDATE journey SET `journey-stage` = '2' WHERE `id-user` = '$iduser'");
            }
            if ($juego['paso'] == 6 && $signal['signal-stage'] == 3){
                mysqli_query($link, "UPDATE journey SET `journey-stage` = '3' WHERE `id-user` = '$iduser'");
            }
            if ($juego['paso'] == 9 && $signal['signal-stage'] == 3){
                $message = "Ya ha finalizado el cuestionario.";
                ?>
                <span class="error"><?php echo $message;?></span>
                <?php
                header("Location: ../../web/php/ranking.php");
            }
        }
    }
?>
</body>