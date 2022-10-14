var lastStep;
var countStandby;
videoStandby = document.getElementById('video');
elementCover = document.getElementById('cover');
score = document.getElementById('score');
id = document.getElementById('id');

function update(data) {

    var data = JSON.parse(data);
    score.innerHTML = data['ranking']['ranking-score'];
    id.innerHTML = data['journey']['id-user'];
    console.log(data);

    countStandby = countStandby + 1;
    idStep = "step-" + data['journey']['journey-step'];

    var elementStep = document.getElementById(idStep);
    if(data['journey']['journey-step'] == 0 && data['journey']['journey-step'] != lastStep){
        lastStep = data['journey']['journey-step'];
        countStandby = 0;
        for (let i = 1; i <= 9; i++) {
            idStep = "step-" + i;
            elementStep = document.getElementById(idStep);
            if(elementStep.classList.contains("active")){
                elementStep.classList.toggle("active");
                elementStep.classList.toggle("nonctive");
            }
        }
    }
    if(data['journey']['journey-step'] >= 1 && data['journey']['journey-step'] != lastStep) {
        console.log(data['journey']['journey-step']);
        lastStep = data['journey']['journey-step'];
        countStandby = 0;
        elementStep.classList.toggle("nonctive");
        elementStep.classList.toggle("active");
        for (let i = 1; i < data['journey']['journey-step']; i++) {
            idStep = "step-" + i;
            elementStep = document.getElementById(idStep);
            if(!elementStep.classList.contains("active")){
                elementStep.classList.toggle("nonctive");
                elementStep.classList.toggle("active");
            }
        }
    }

    if(countStandby >= 10 && !elementCover.classList.contains("active")) {
        elementCover.classList.toggle("nonctive");
        elementCover.classList.toggle("active");
        videoStandby.play();
    }
    if(countStandby == 0 && elementCover.classList.contains("active")){
        elementCover.classList.toggle("active");
        elementCover.classList.toggle("nonctive");
        videoStandby.pause();
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
httpRequest.open('GET', "../php/get-dashboard.php",true);
httpRequest.send();
}, 3000);