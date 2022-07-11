<?php
    function connect(){
        $link = mysqli_connect("localhost", "tester1", "tester1", "test-db");
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