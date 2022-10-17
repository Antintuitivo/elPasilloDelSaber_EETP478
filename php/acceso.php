<?php
  session_start();

  #Obtener variables desde el formulario en HTML, con el método POST.
  $usuario = $_POST['Usuario'];//$email = $_POST['email'];

  #Realizar, comprobar y almacenar credecenciales de la conexión a la DBMS.
  #-----------------------------------------------------------------------------
  include 'header\link.php';
  $link = connect();

  #Validación de cuenta.
  #-----------------------------------------------------------------------------
  $select = "SELECT*FROM users WHERE `nick` = '$usuario'";//$select = "SELECT*FROM users WHERE `user-email`='$email'";
  $result = mysqli_query($link, $select);
  $validation = mysqli_num_rows($result);


  if ($validation == 0) {
    #Notificar que primero se debe crear un usuario en el registro.
    $_SESSION['index_message'] = "Cuenta no registrada. Por favor, primero dirígete a la terminal de registro.";
    //header("Location: ../../web/");
    echo $usuario;
    echo $validation;
    die();
  }

  $user = mysqli_fetch_assoc($result);
  $id = $user['id-user'];
  $edad = $user['user-age'];

#---------------------------------------------------------------------------------------------

  #Comprobar si la persona ya ha participado. Si es así, redirigirlo al ranking.
  #-----------------------------------------------------------------------------
  $select = "SELECT*FROM journey WHERE `id-user`='$id'";
  $result = mysqli_query($link, $select);
  $validation = mysqli_num_rows($result);

  if ($validation == 0) {
    #Insertar nuevo registro de progreso.
    $insert = "INSERT INTO journey (`id-user`) VALUES ('$id')";
    mysqli_query($link, $insert);
    $result = mysqli_query($link, $select);
  }

  $journey = mysqli_fetch_assoc($result);

  if ($journey['journey-step'] >= 9) {
    header("Location: ../../web/php/ranking.php");
    die();
  }

#---------------------------------------------------------------------------------------------

  if($edad < 15){
    $edad = "rankingmenores";
  }elseif($edad >= 15){
    $edad = "rankingmayores";
  }

  #Validación del nick.
  $select = "SELECT*FROM $edad WHERE `id-user`='$id'";  
  $result = mysqli_query($link, $select);
  $validation = mysqli_num_rows($result);
  
  if ($validation == 0) {
    #Notificar que hubo un error en el registro del nick.
    $_SESSION['index_message'] = "Nick de cuenta no creado. Por favor, contactarse con un administrador.";
    header("Location: ../../web/");
    die();
  }

  // $ranking = mysqli_fetch_assoc($result);
  // $nick = $ranking['ranking-nick'];

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