<?php
    function connect(){
        $iprasp = null; 
        $ipdb = 'localhost';
        $database = "feria-db";
        $pasDB = "tester1"; 
        $userDB = "tester1";

        $link = mysqli_connect( $ipdb , $userDB, $pasDB, $database);
        if (!$link) {
            $message = "Error: ".mysqli_connect_error();
            ?>
            <span class="error"><?php echo $message;?></span>
            <?php
            include("../../web/index.php");
        }
        return $link;
    }
?>