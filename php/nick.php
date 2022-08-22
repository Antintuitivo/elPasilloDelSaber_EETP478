<?php
  session_start();

  #Inicializar variables a utilizar.
  $id = $_SESSION['usuario']['id'];
  $score = $_SESSION['tabla']['puntaje'];

  #Obtener variables desde el formulario en HTML, con el método POST.
  $nick = $_POST['nick'];
  
  #Realizar, comprobar y almacenar credecenciales de la conexión a la DBMS.
  #-----------------------------------------------------------------------------
  include 'header\link.php';
  $link = connect();

  #Recuperación y comparación del tiempo transcurrido en el juego.
  #-----------------------------------------------------------------------------
  $select = "SELECT*FROM journey WHERE `id-user`='$id'";
  $result = mysqli_query($link, $select);
  $validation = mysqli_num_rows($result);

  $journey = mysqli_fetch_assoc($result);

  $first  = date_create($journey['journey-started']);
  $second = date_create($journey['journey-ended']);

  //echo date_format($first, 'H:i:s') . "<br>";
  //echo date_format($second, 'H:i:s') . "<br>";

  $diff = $first->diff($second);
  $et = $diff->format( '%H:%I:%S' );
#---------------------------------------------------------------------------------------------
  #Comprobar si el nick está utilizado.
  #-----------------------------------------------------------------------------
  $select = "SELECT*FROM ranking WHERE `ranking-nick`='$nick'";
  $result = mysqli_query($link, $select);
  $validation = mysqli_num_rows($result);

  echo "<h1>" . $validation . "<h1>";
  if ($validation == 0) {
    #Insertar entrada a la tabla.
    $insert = "INSERT INTO ranking (`id-user`, `ranking-nick`, `ranking-score`, `ranking-et`) VALUES ('$id', '$nick', '$score', '$et')";
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