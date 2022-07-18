<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lol</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>
<?php
 include 'imprimir.php';
?>

    <h1> <?php echo $cuestion;?></h1>
<form method="POST" target="imprimir.php">



   <label > <input name="lol1" type="checkbox"> <?php echo $answer ;?></label>
    <label > <input name="lol2" type="checkbox"> <?php echo $answer1 ;?> </label> 
    <label > <input name="lol3" type="checkbox"> <?php echo $answer2 ;?></label>
    <input type="submit">
</form>

</body>
</html>