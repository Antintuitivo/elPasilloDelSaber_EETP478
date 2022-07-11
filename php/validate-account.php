<?php
    #Obtener variables desde el formulario en HTML, con el método POST.
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];

    #Realizar, comprobar y almacenar credecenciales de la conexión a la DBMS.
    #-----------------------------------------------------------------------------
    include 'header\link.php';
    $link = connect();

    #Validación de cuenta
    #-----------------------------------------------------------------------------
    $query = "SELECT*FROM login WHERE `user-email`='$email' and `user-password`='$password'";
    $result = mysqli_query($link, $query);
    $validation = mysqli_num_rows($result);

    if ($validation){
        $user = mysqli_fetch_assoc($result);
        $id = $user["id-user"];
        #Comprobración de sesión ya existente.
        if ($id != $_SESSION['login']['id-user']){
            #Cierre y registro de sesión en caso de estár iniciada.
            if (($_SESSION['login']['id-user'] != null) || ($_SESSION['login']['id-user'] != '')){
                $id_record = $_SESSION['register']['id-record'];
                $sql = "UPDATE `user-record` SET `record-logout` = CURRENT_TIME() WHERE `user-record`.`id-record` = '$id_record'";
                mysqli_query($link,$sql);
                session_destroy();
                session_start();
            }
        
            #Registro de acceso de usuario.
            $query_record = "INSERT INTO `user-record` (`id-user`) VALUES ('$id')";
            mysqli_query($link, $query_record);
        
            #Registro de sesión.
            $access_result = mysqli_query($link,"SELECT * FROM `user-record` WHERE `id-user`='$id' ORDER BY `id-record` DESC LIMIT 1"); #Solución temporal.
            $access = mysqli_fetch_assoc($access_result);
            $_SESSION['register'] = $access;
            $_SESSION['login'] = $user;

            if ($user["user-admin"]==1){
                header("Location: ../../web/php/admin.php");
            } else {header("Location: ../../web/php/user.php");}
        } else {
            if ($user["user-admin"]==1){
                header("Location: ../../web/php/admin.php");
            } else {header("Location: ../../web/php/user.php");}
        }
    } else {
        if (isset($email) && isset($password)) {
                $message = "Usuario no registrado.";
                ?>
                <span class="error"><?php echo $message;?></span>
                <?php
                include("../../web/index.php");
            }
        }
?>