<?php
  session_start();

  #Obtener variables desde el formulario en HTML, con el método POST.
  $email = $_POST['email'];
  $edad = $_POST['edad'];
  $nick = $_POST['nick'];

  #Realizar, comprobar y almacenar credecenciales de la conexión a la DBMS.
  #-----------------------------------------------------------------------------
  include 'header\link.php';
  $link = connect();

  #Validación de cuenta.
  #-----------------------------------------------------------------------------
  $select = "SELECT*FROM users WHERE `user-email`='$email'";
  $result = mysqli_query($link, $select);
  $validation = mysqli_num_rows($result);

  if ($validation == 0) {
    #Insertar nuevo usuario.
    $insert = "INSERT INTO users (`user-age`, `user-email`) VALUES ('$edad', '$email')";
    mysqli_query($link, $insert);
    $result = mysqli_query($link, $select);
  }

  $user = mysqli_fetch_assoc($result);
  $id = $user['id-user'];

#---------------------------------------------------------------------------------------------

  #Comprobar si la persona ya ha participado. Si es así, redirigirlo al ranking.
  #-----------------------------------------------------------------------------
  $select = "SELECT*FROM journey WHERE `id-user`='$id'";
  $result = mysqli_query($link, $select);
  $validation = mysqli_num_rows($result);

  if($edad < 15){
    $edad = "rankingmenores";
  }elseif($edad >= 15){
    $edad = "rankingmayores";
  }

  if ($validation == 0) {

    #Comprobar si el nick está utilizado.
    #-----------------------------------------------------------------------------
    $select = "SELECT*FROM $edad WHERE `ranking-nick`='$nick'";
    $result = mysqli_query($link, $select);
    $validation = mysqli_num_rows($result);

    if ($validation == 0) {
      #Insertar nick y ID de usuario al ranking correspondiente.
      $select = "SELECT*FROM $edad WHERE `id-user`='$id'";
  
      $result = mysqli_query($link, $select);
      $validation = mysqli_num_rows($result);
  
      if ($validation == 0) {
        $insert = "INSERT INTO $edad (`id-user`, `ranking-nick`) VALUES ('$id', '$nick')";
        mysqli_query($link, $insert);
      }
    } else {
        $_SESSION['index_message'] = "Nick ya registrado.";
        header("Location: ../../web/php/nick-page.php");
        die();
    }

    #Insertar nuevo registro de progreso.
    $insert = "INSERT INTO journey (`id-user`) VALUES ('$id')";
    mysqli_query($link, $insert);
    $result = mysqli_query($link, $select);
  }

  $journey = mysqli_fetch_assoc($result);

  if ($journey['journey-step'] >= 9) {
    $_SESSION['index_message'] = "Disculpa, ya has participado.";
    header("Location: ../../web/php/ranking.php");
    die();
  }

  #Registro de variables del usuario.
  #-----------------------------------------------------------------------------
  $_SESSION['usuario']['id'] = $user['id-user'];
  $_SESSION['usuario']['edad'] = $edad;

  #Registro de variables de sesión del usuario.
  #-----------------------------------------------------------------------------
  $_SESSION['juego']['paso'] = $journey['journey-step'];
  $_SESSION['juego']['etapa'] = $journey['journey-stage'];
  $_SESSION['juego']['racha'] = 0;

  #Registro de variables de sesión del usuario.
  #-----------------------------------------------------------------------------  
  $_SESSION['tabla']['puntaje'] = 0;

  #Redirección para iniciar el desafío.
  #-----------------------------------------------------------------------------
  header("Location: ../../web/php/intermedio-page.php");
?>