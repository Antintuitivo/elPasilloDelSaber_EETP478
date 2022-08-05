<?php 

include 'header/link.php';
connect();

$age = 0;//save the user's age to choose file
$pos = 0;//cantidad de preguntas respondidas
$stage = 3;//último sensor pisado por el usuario
$file = "file.csv";//dirección del archivo csv

$query = "SELECT * FROM 'users' WHERE '' ";//SELECT * FROM TableName WHERE id=(SELECT max(id) FROM TableName)
$q2 = "SELECT * FROM 'sensors' WHERE '' ";

if($age<15){
    $file = "menores.csv";
}elseif($age>=15){
    $file = "mayores.csv";
}

if($pos>=1&&$pos<=3){//Easy
$min = 0;//minimum number of the question index to select
$max = 29;//30//maximum number of the question index to select
}elseif($pos>=4&&$pos<=6){//Medium
$min = 30;//minimum number of the question index to select
$max = 59;//60//maximum number of the question index to select
}elseif($pos>=7&&$pos<=9){//Hard
$min = 60;//minimum number of the question index to select
$max = 89;//90//maximum number of the question index to select
}

$question_index = rand($min,$max);//randomize the number of the question to fetch
    
    $csv = array_map('str_getcsv', file($file,FILE_SKIP_EMPTY_LINES));//mapea el archivo
    $keys = array_shift($csv);
    foreach ($csv as $i=>$row) {//transforma el archivo a un array multidimensional
    $csv[$i] = array_combine($keys, $row);
   }

   $pregunta=$csv[$question_index]["pregunta"];//se almacena la pregunta
   $r1=$csv[$question_index]["respuesta1"];//se almacenan las respuestas
   $r2=$csv[$question_index]["respuesta2"];
   $r3=$csv[$question_index]["respuesta3"];
   $rc=$csv[$question_index]["respuesta_correcta"];//se almacena la respuesta correcta
   //imprime todo
    echo '<pre>';
    print_r($csv[$question_index]);
    print_r($csv);
    echo '</pre>';
    echo $question_index
?>