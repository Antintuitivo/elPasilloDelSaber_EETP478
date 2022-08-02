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
    
    
    $datauser = mysqli_query($link,"SELECT * FROM users WHERE `user-email` = 'f@gmail.com'");

    if($datauser != false) {
        $rows = mysqli_fetch_array($user);
        /*
        if(isset($rows)){
            if ($n && $rows['user-journey']){
                
            }
        }*/
    }
        echo $rows['user-email'];
?>