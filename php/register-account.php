<?php
    $message = "";
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($_POST['admin'] != 'admin') {
        $admin = 0;
    } else {$admin = 1;}

    $link = mysqli_connect("localhost", "tester1", "tester1", "test-db");
    
    $query = "INSERT INTO `login` (`id-user`, `user-fname`, `user-lname`, `user-email`, `user-password`, `user-admin`) VALUES (NULL, '$fname', '$lname', '$email', '$password', '$admin')";
    $query_av = "SELECT*FROM login WHERE `user-email`='$email' and `user-password`='$password'"; /*Account validation*/
    $result = mysqli_query($link, $query_av);
    $validation = mysqli_num_rows($result);
    if ($validation){
        $message = "Usuario ya registrado.";
        ?>
        <span class="error"><?php echo $message;?></span>
        <?php
        include("../../web/php/admin.php");
    } else {
        if (isset($fname) && isset($lname) && isset($email) && isset($password)) {
            $result = mysqli_query($link, $query);
            if($result) {
                $message = "Usuario registrado con éxito.";
                ?>
                <span class="message"><?php echo $message;?></span>
                <?php
                include("../../web/php/admin.php");
            }
        }
    }
?>