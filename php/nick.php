<?php
  session_start();

  #Inicializar variables a utilizar.
  $paso = $_SESSION['juego']['paso'];
  $id = $_SESSION['usuario']['id'];
  $score = $_SESSION['tabla']['puntaje'];

  #Obtener variables desde el formulario en HTML, con el método POST.
  $nick = $_POST['nick'];
  
  #Realizar, comprobar y almacenar credecenciales de la conexión a la DBMS.
  #-----------------------------------------------------------------------------
  include 'header\link.php';
  $link = connect();

  #Recuperación y comparación del tiempo transcurrido en el juego.
  $et = $_SESSION['tabla']['tiempo'];

#---------------------------------------------------------------------------------------------
  #Comprobar si el nick está utilizado.
  #-----------------------------------------------------------------------------
  $select = "SELECT*FROM ranking WHERE `ranking-nick`='$nick'";
  $result = mysqli_query($link, $select);
  $validation = mysqli_num_rows($result);

  echo "<h1>" . $validation . "<h1>";
  if ($validation == 0) {
    #Insertar entrada a la tabla.
    mysqli_query($link, "UPDATE journey SET `journey-step` = '$paso' WHERE `id-user` = '$id'");
    
    $select = "SELECT*FROM ranking WHERE `id-user`='$id'";
    $result = mysqli_query($link, $select);
    $validation = mysqli_num_rows($result);

    if ($validation == 0) {
      $insert = "INSERT INTO ranking (`id-user`, `ranking-nick`, `ranking-score`, `ranking-et`) VALUES ('$id', '$nick', '$score', '$et')";
      mysqli_query($link, $insert);
    }
    #Cierre de sesión.
    #-----------------------------------------------------------------------------
    session_unset();
    session_destroy();
    setcookie("PHPSESSID", "", time()-1000,"/", "127.0.0.1",false,false);

    #Redirección al ranking.
    #-----------------------------------------------------------------------------
    header("Location: ../../web/php/ranking.php");
  } else {
      $message = "Nick ya registrado.";
      ?>
      <span class="error"><?php echo $message;?></span>
      <?php
      include("../../web/php/nick-page.php");
  }
?>