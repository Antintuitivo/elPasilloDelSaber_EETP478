var lastStep;
var countStandby;

elementCover = document.getElementById('cover');

function update(data) {
    countStandby = countStandby + 1;
    idStep = "step-" + data;

    var elementStep = document.getElementById(idStep);
    if(data == 0 && data != lastStep){
        lastStep = data;
        countStandby = 0;
        for (let i = 1; i <= 9; i++) {
            idStep = "step-" + i;
            elementStep = document.getElementById(idStep);
            elementStep.classList.toggle("active");
        }
    }
    if(data >= 1 && data != lastStep) {
        console.log(data);
        lastStep = data;
        countStandby = 0;
        elementStep.classList.toggle("active");
    }
    if(countStandby >= 10) {
        elementCover.style.visibility = "visible";
    } else {
        elementCover.style.visibility = "hidden";
    }
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
            update(httpRequest.responseText);
        }
    }
};
httpRequest.open('GET', "../php/dashboard-get.php",true);
httpRequest.send();
}, 3000);