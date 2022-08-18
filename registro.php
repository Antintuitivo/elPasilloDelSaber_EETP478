<?php
  session_start();

  #Obtener variables desde el formulario en HTML, con el método POST.
  $email = $_POST['email'];
  $edad = $_POST['edad'];

  #Realizar, comprobar y almacenar credecenciales de la conexión a la DBMS.
  #-----------------------------------------------------------------------------
  include 'php\header\link.php';
  $link = connect();

  #Validación de cuenta.
  #-----------------------------------------------------------------------------
  $select = "SELECT*FROM users WHERE `user-email`='$email'";
  $result = mysqli_query($link, $select);
  $validation = mysqli_num_rows($result);

  if ($validation == null) {
    $insert = "INSERT INTO users (`user-age`, `user-email`) VALUES ('$edad', '$email')";
    mysqli_query($link, $insert);
    $result = mysqli_query($link, $select);
  }

  $user = mysqli_fetch_assoc($result);
  $id = $user['id-user'];

  #Comprobar si la persona ya ha participado. Si es así, redirigirlo al ranking.
  #-----------------------------------------------------------------------------
  $select = "SELECT*FROM journey WHERE `id-user`='$id'";
  $result = mysqli_query($link, $query);
  $journey = mysqli_fetch_assoc($result);

  if (isset($journey)) {
    if ($journey['journey-step'] == 9) {
      $message = "Disculpa, ya has participado.";
      ?>
      <span class="message"><?php echo $message;?></span>
      <?php
      #header("Location: ../../web/php/ranking.php");
      include("../../web/php/ranking.php");
    }
  }

  #Registro de variables de sesión del usuario.
  #-----------------------------------------------------------------------------
  $_SESSION['usuario']['id'] = $user['id-user'];
  $_SESSION['usuario']['edad'] = $user['user-age'];

  #Redirección para iniciar el desafío.
  #-----------------------------------------------------------------------------
  header("Location: ../../web/php/intermedio.php");
?>