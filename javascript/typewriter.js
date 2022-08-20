var i = 0;
var txt = 'Continúa tu camino!'; // The text
var speed = 60; // The speed/duration of the effect in milliseconds

function typeWriter() {
    if (i < txt.length) {
        document.getElementById("title").innerHTML += txt.charAt(i);
        i++;
        setTimeout(typeWriter, speed);
    }
}
window.onload = typeWriter;