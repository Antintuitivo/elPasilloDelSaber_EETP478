<?php
$puntos = $_SESSION['tabla']['puntaje'];
if($puntos<=460){
    echo "<img src='../../web/img/1F62D.svg'>";
}elseif($puntos>460&&$puntos<800){
    echo "<img src='../../web/img/1F630.svg'>";
}elseif($puntos>=800){
    echo "<img src='../../web/img/1F973.svg'>";
}
?>
