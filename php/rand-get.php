<?php  
$file = "file.csv";//dirección del archivo csv 

$age = $_SESSION['usuario']['edad'];
$stage = $_SESSION['juego']['etapa'];//último sensor pisado por el usuario
$pos = $_SESSION['juego']['paso'];//cantidad de preguntas respondidas
$banlist[] = $_SESSION['juego']['banlist'];

if($age<15){                //Se selecciona el archivo csv a utilizar según la edad del usuario
    $file = "menores.csv";
}elseif($age>=15){
    $file = "mayores.csv";
}

if($stage==1){          //Easy
    $min = 0;           //minimum number of the question index to select
    $max = 29;          //maximum number of the question index to select

}elseif($stage==2){     //Medium
    $min = 30;          
    $max = 59;          

}elseif($stage==3){     //Hard
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
    
 $tema =$csv[$question_index]["tema"];
}while(in_array($tema,$banlist));

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
$banlist[] = $tema;
$_SESSION['juego']['banlist']=$banlist;
?>