<?php
$puntos = $_SESSION['tabla']['puntaje'];
if($puntos<=460){
    echo "💩";
}elseif($puntos>460&&$puntos<800){
    echo "😰";
}elseif($puntos>=800){
    echo "🥳";
}
?>
