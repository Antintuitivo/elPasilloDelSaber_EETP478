<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas Avellaneda</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>
<?php
 include 'imprimir.php';
?>

    <h1> <?php echo $question;?></h1>
<form method="POST" target="imprimir.php">

    <label> <input name="respuestas"  id="R1" type="radio"> <?php echo $answer ;?></label>
    <label> <input name="respuestas"  id="R2" type="radio"> <?php echo $answer1 ;?> </label>
    <label> <input name="respuestas"  id="R3" type="radio"> <?php echo $answer2 ;?></label>
    <input class="" type="submit">

</form>

</body>
</html>