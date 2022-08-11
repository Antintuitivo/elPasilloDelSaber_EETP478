<head>
    <link rel="stylesheet" type="text/css" href="../../web/css/messages.css">
</head>
<body>
<form method="POST">
    <input type="number" name="num">
    <input type="submit" formaction="cross-gate.php" value="Enviar">
</form>

<?php
    #Realizar, comprobar y almacenar credecenciales de la conexión a la DBMS.
    #-----------------------------------------------------------------------------
    include 'header\link.php';
    $link = connect();
    
    #Validación de requisitos para el pasaje de etapa.
    if(isset($_POST['num'])){
        $n = $_POST['num'];
    }  
    
    $datauser = mysqli_query($link,"SELECT * FROM journey WHERE `id-user` = '$n'");
    $sensorsignal = mysqli_query($link, "SELECT * FROM signals ORDER BY `id-record` DESC LIMIT 1");
    
    if($datauser != false) {
        $user = mysqli_fetch_array($datauser);
        $signal = mysqli_fetch_array($sensorsignal);
        
        if(isset($n)){
            $iduser = $user['id-user'];
            if ($user['journey-step'] == 0 && $signal['signal-stage'] == 1){
                mysqli_query($link, "UPDATE journey SET `journey-stage` = '1' WHERE `id-user` = '$iduser'");

                $message = "Working.";
                ?>
                <span class="message"><?php echo $message;?></span>
                <?php
            }
            if ($user['journey-step'] == 3 && $signal['signal-stage'] == 2){
                mysqli_query($link, "UPDATE journey SET `journey-stage` = '2' WHERE `id-user` = '$iduser'");
                
                $message = "Working.";
                ?>
                <span class="message"><?php echo $message;?></span>
                <?php
            }
            if ($user['journey-step'] == 6 && $signal['signal-stage'] == 3){
                mysqli_query($link, "UPDATE journey SET `journey-stage` = '3' WHERE `id-user` = '$iduser'");
                
                $message = "Working.";
                ?>
                <span class="message"><?php echo $message;?></span>
                <?php
            }
            if ($user['journey-step'] == 9 && $signal['signal-stage'] == 3){
                $message = "Ya ha finalizado el cuestionario.";
                ?>
                <span class="error"><?php echo $message;?></span>
                <?php
            }
        }
        print_r($user);
        echo "<br>";
        print_r($signal);
    }
?>
</body>