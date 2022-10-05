<?php
$file = "file.csv";//dirección del archivo csv 

$age = $_SESSION['usuario']['edad'];
$stage = $_SESSION['juego']['etapa'];//último sensor pisado por el usuario
$pos = $_SESSION['juego']['paso'];//cantidad de preguntas respondidas
if(!isset($_SESSION['juego']['banlist'])){
    $_SESSION['juego']['banlist'] = array();
}
$banlist = $_SESSION['juego']['banlist'];

if($age == "rankingmenores"){                //Se selecciona el archivo csv a utilizar según la edad del usuario
    $file = "menores.csv";
}elseif($age == "rankingmayores"){
    $file = "mayores.csv";
}

//Easy
if($stage==1){
    $min = 0;
    $max = 29;

}//Medium
elseif($stage==2){
    $min = 30;          
    $max = 59;          

}//Hard
elseif($stage==3){
    $min = 60;          
    $max = 89;
}

//busca la pregunta de un tópico que no haya sido respondido aún en la etapa
do{
    $question_index = rand($min,$max);
    //mapea el archivo
    $csv = array_map('str_getcsv', file($file,FILE_SKIP_EMPTY_LINES));
    $keys = array_shift($csv);
    //transforma el archivo a un array multidimensional
    foreach ($csv as $i=>$row) {
        $csv[$i] = array_combine($keys, $row);
    }
    $tema = $csv[$question_index]["tópico"];
}while(in_array($tema,$banlist) == True);

//se almacena el índice de la pregunta
$_SESSION['juego']['i'] = $question_index;
//se almacena la pregunta
$_SESSION['juego']['question'] = $csv[$question_index]["pregunta"];
//se almacenan las respuestas
$_SESSION['juego']['ans1'] = $csv[$question_index]["respuesta1"];
$_SESSION['juego']['ans2'] = $csv[$question_index]["respuesta2"];
$_SESSION['juego']['ans3'] = $csv[$question_index]["respuesta3"];
//se almacena la respuesta correcta
$_SESSION['juego']['ans_c'] = $csv[$question_index]["respuesta_correcta"];
$_SESSION['juego']['sub'] = $csv[$question_index]["subtópico"];
$_SESSION['juego']['banlist'][] =$tema;
?>