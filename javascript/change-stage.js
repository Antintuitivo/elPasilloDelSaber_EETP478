function change(data) {
    if(data == "Q&A"){
        console.log(data);
        document.location.href = '../php/Q&A.php';
    }
    if(data == 1){
        document.location.href = '../php/avance-pregunta.php';
    }
    if(data == 2){
        document.location.href = '../php/avance-pregunta.php';
    }
    if(data == 3){
        console.log(data);
        document.location.href = '../php/avance-pregunta.php';
    }
    if(data == "No"){
        console.log(data);
        document.location.href = '../php/ranking.php';
    }
    // What do I do with the response?
    
}

if (window.XMLHttpRequest){
    // code for IE7+, Firefox, Chrome, Opera, Safari
    var httpRequest = new XMLHttpRequest;
} else{
    // code for IE6, IE5
    httpRequest=new ActiveXObject("Microsoft.XMLHTTP");
}

// Petición constante de datos a la DB por medio de AJAX, cada 10s (10000).
setInterval(function() {
httpRequest.onreadystatechange = function(){
    if (httpRequest.readyState === 4) { // Request is done
        if (httpRequest.status === 200) { // successfully
            change(httpRequest.responseText);
        }
    }
};
httpRequest.open('GET', "../php/intermedio.php",true);
httpRequest.send();
}, 6000);