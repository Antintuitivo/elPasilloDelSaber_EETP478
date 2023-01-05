function change(data) {
    if(data == "Q&A"){
        console.log(data);
        document.location.href = '../php/avance-pregunta.php';
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
}

if (window.XMLHttpRequest){
    // Código para IE7+, Firefox, Chrome, Opera, Safari.
    var httpRequest = new XMLHttpRequest;
} else{
    // Código para IE6, IE5.
    httpRequest=new ActiveXObject("Microsoft.XMLHTTP");
}

// Petición constante de datos a la DB por medio de AJAX, cada 10s (10000).
setInterval(function() {
httpRequest.onreadystatechange = function(){
    if (httpRequest.readyState === 4) { // Solicitud de ejecución enviada.
        if (httpRequest.status === 200) { // Ejecución de la solicitud correcta.
            change(httpRequest.responseText); // Función utilizada al finalizar la ejecución del código PHP.
        }
    }
};
httpRequest.open('GET', "../php/intermedio.php",true);
httpRequest.send();
}, 6000);