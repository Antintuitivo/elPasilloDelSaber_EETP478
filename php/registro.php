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
  } else {
    $_SESSION['index_message'] = "Cuenta ya registrada.";
  }

  $user = mysqli_fetch_assoc($result);
  $id = $user['id-user'];
  $edad = $user['user-age'];

#---------------------------------------------------------------------------------------------

  if($edad < 15){
    $edad = "rankingmenores";
  }elseif($edad >= 15){
    $edad = "rankingmayores";
  }

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
  }

  #Redirección para evitar caminos indeseados.
  #-----------------------------------------------------------------------------
  header("Location: ../../web/");
?>