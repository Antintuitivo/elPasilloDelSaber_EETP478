<?php
    session_start();
    include 'link.php';
    connect();
    $link = connect();

    $id_record = $_SESSION['register']['id-record'];
    $sql = "UPDATE `user-record` SET `record-logout` = CURRENT_TIME() WHERE `user-record`.`id-record` = '$id_record'";
    mysqli_query($link,$sql);
    session_unset();
    session_destroy();
    setcookie("PHPSESSID", "", time()-1000,"/", "127.0.0.1",false,false);
    header("Location: /../web/php/ranking.php");
?>