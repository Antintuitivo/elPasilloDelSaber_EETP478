    function func() {
        if (xmlhttp.readyState == 4) {
            if (xmlhttp.status == 200) {
                document.location.href = '../php/Q&A.php';
                // todo va bien, respuesta recibida
            } else {
                alert('Hubo problemas con la petición.');
                // aun no esta listo
            }
        }

    }
    if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
    xmlhttp.onreadystatechange = func;
    xmlhttp.open("GET","../php/intermedio.php",true);
    xmlhttp.send();