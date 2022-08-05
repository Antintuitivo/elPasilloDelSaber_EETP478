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
    
    /*$datauser = mysqli_query($link,"SELECT * FROM users WHERE `user-email` = 'f@gmail.com'");*/
    $sensorsignal = mysqli_query($link, "SELECT TOP 1 * FROM signals ORDER BY `id-record` DESC");
    
    #if($datauser != false) {
        #$user = mysqli_fetch_array($datauser);
        $signal = mysqli_fetch_array($sensorsignal);
        
        if(isset($num)){
            if ($n == && $signal['signal-stage']==){
                ;
            }
            if ($n == && $signal['signal-stage']){
                ;
            }
            if ($n && $signal['signal-stage']){
                ;
            }
        }
        print_r($signal);
    #}

    if($datauser != false) {
        #$user = mysqli_fetch_array($datauser);
        $signal = mysqli_fetch_array($sensorsignal);
        
        /*
        if(isset($rows)){
            if ($n && $rows['signal-stage']){
                
            }
        }*/
        print_r($signal);
    }
?>