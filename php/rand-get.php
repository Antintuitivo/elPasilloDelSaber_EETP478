<?php 
$age = $_POST['edad'];
$min = 1;
$max = 90;
$question_index = rand($min,$max);
$file = "file.csv";
$length = 1000;
$separator = ";";

$resource= fopen($file,"r");
$preguntas[] = fgetcsv($resource, $length, $separator);

?>