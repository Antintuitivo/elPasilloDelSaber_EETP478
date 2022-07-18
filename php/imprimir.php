<?php
$cuestion = "donde murio paco";
$answer = "en el patio";
$answer1 = "en la vereda";
$answer2 = "en la cocina";


$lol1 = $_POST ["lol1"];
$lol2 = $_POST ["lol2"];
$lol3 = $_POST ["lol3"];

echo $lol1. "<br>". $lol2. "<br>". $lol3. "<br>";

if ($lol1 xor $lol2 xor $lol3 ) {
    ?>
<script>alert("respuesta enviada");</script>
  <?php
  
} else {
    ?>
<script>alert("solo puede haber una respuestas");</script>
    <?php
}

?>