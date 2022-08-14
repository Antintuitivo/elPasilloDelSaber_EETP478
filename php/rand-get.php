<?php 

//include 'header/session.php';
//include 'header/link.php';               

/*  
$file = "file.csv";//dirección del archivo csv  */

$age = $_SESSION['usuario']['edad'];
$stage = $_SESSION['juego']['etapa'];//último sensor pisado por el usuario
$pos = $_SESSION['juego']['paso'];//cantidad de preguntas respondidas


if($age<15){                //se selecciona el archivo csv a utilizar según la edad del usuario
    $file = "menores.csv";
}elseif($age>=15){
    $file = "mayores.csv";
}


if($pos>=1&&$pos<=3&&$stage==1){//Easy
$min = 0;//minimum number of the question index to select
$max = 29;//30//maximum number of the question index to select
}elseif($pos>=4&&$pos<=6&&$stage==2){//Medium
$min = 30;//minimum number of the question index to select
$max = 59;//60//maximum number of the question index to select
}elseif($pos>=7&&$pos<=9&&$stage==3){//Hard
$min = 60;//minimum number of the question index to select
$max = 89;//90//maximum number of the question index to select
}

$question_index = rand($min,$max);      //randomize the number of the question to fetch
    
    $csv = array_map('str_getcsv', file($file,FILE_SKIP_EMPTY_LINES));//mapea el archivo
    $keys = array_shift($csv);
    foreach ($csv as $i=>$row) {        //transforma el archivo a un array multidimensional
    $csv[$i] = array_combine($keys, $row);
   }

   $pregunta=$csv[$question_index]["pregunta"];//se almacena la pregunta
   $r1=$csv[$question_index]["respuesta1"];//se almacenan las respuestas
   $r2=$csv[$question_index]["respuesta2"];
   $r3=$csv[$question_index]["respuesta3"];
   $rc=$csv[$question_index]["respuesta_correcta"];//se almacena la respuesta correcta

   $_SESSION['juego']['ans1'] = $r1;
   $_SESSION['juego']['ans2'] = $r2;
   $_SESSION['juego']['ans3'] = $r3;
   $_SESSION['juego']['ans_c'] = $rc;
   $_SESSION['juego']['question'] = $pregunta;

?>