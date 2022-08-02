<?php 
$age = $_POST['edad'];//save the user's age to accurateley
$min = 0;//minimum number of the question index to select
$max = 3;//90//maximum number of the question index to select
$question_index = rand($min,$max);//randomize the number of the question to fetch
$file = "file.csv";//dirección del archivo csv
$length = 1000;//max length of characters to read in the csv file
$separator = ';';//separator used inside the csv file to separate values

$resource= fopen($file,"r");//return information needed by fgetcsv()

//$get_questions = fgetcsv($resource, $length, $separator))
    //$present = var_dump($get_questions);    //get array of questions from the file
    
    $csv = array_map('fgetcsv()', file('file.csv'));
    echo '<pre>';
    print_r($csv[$question_index]);
    print_r($csv);
    echo '</pre>';
    echo $question_index
?>