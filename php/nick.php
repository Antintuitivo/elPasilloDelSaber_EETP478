<?php
  session_start();

  #Obtener variables desde el formulario en HTML, con el método POST.
  $nick = $_POST['nick'];
  $id = $_SESSION['usuario']['id'];
  $id = $_SESSION['usuario']['id'];

  #Realizar, comprobar y almacenar credecenciales de la conexión a la DBMS.
  #-----------------------------------------------------------------------------
  include 'header\link.php';
  $link = connect();

  #Comprobar si el nick está utilizado.
  #-----------------------------------------------------------------------------
  $select = "SELECT*FROM ranking WHERE `ranking-nick`='$nick'";
  $result = mysqli_query($link, $select);
  $validation = mysqli_num_rows($result);

  echo "<h1>" . $validation . "<h1>";
  if ($validation == 0) {
    #Insertar entrada a la tabla.
    $insert = "INSERT INTO ranking (`id-user`, `ranking-nick`, `ranking-score`, `ranking-et`) VALUES ('$id', '$nick')";
    mysqli_query($link, $insert);
    $result = mysqli_query($link, $select);
  } else{
        header("Location: ../../web/php/ranking.php");
  }

  #Cierre de sesión.
  #-----------------------------------------------------------------------------
  session_unset();
  session_destroy();
  setcookie("PHPSESSID", "", time()-1000,"/", "127.0.0.1",false,false);

  #Redirección al ranking.
  #-----------------------------------------------------------------------------
  header("Location: ../../web/php/ranking.php");
?>