<?php
    session_start();
    session_unset();
    session_destroy();
    setcookie("PHPSESSID", "", time()-1000,"/", "127.0.0.1",false,false);
    header("Location: /../web/php/ranking.php");
?>