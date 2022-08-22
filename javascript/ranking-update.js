function addrows(tableID, data) {
    
    // What do I do with the response?
    var rows = JSON.parse(data);
    console.log(rows);

    // Obtiene una referencia a la tabla
    var tableRef = document.getElementById(tableID);
    
    //Eliminar filas insertadas anteriormente.
    if (tableRef.rows.length > 1) {
        for (let i = tableRef.rows.length - 1; i > 0; i--) {
            tableRef.deleteRow(i);
        }
    }

    //Insertar filas con los valores obtenido por AJAX.
    for (let i = 0; i < rows.length; i++) {
        //Inserta una fila en la tabla.
        var newRow = tableRef.insertRow(-1);
        newRow.setAttribute('class', 'table-rows');
        
        //Inserta el contenido en las celdas
        var newCell = newRow.insertCell(0);
        newCell.setAttribute('class', 'position');
        newCell.innerHTML = i + 1;

        var newCell = newRow.insertCell(1);
        newCell.setAttribute('class', 'table-row');
        newCell.innerHTML = rows[i]['ranking-nick'];
        
        var newCell = newRow.insertCell(2);
        newCell.setAttribute('class', 'table-row');
        newCell.innerHTML = rows[i]['ranking-score'];
        
        var newCell = newRow.insertCell(3);
        newCell.setAttribute('class', 'table-row');
        newCell.innerHTML = rows[i]['ranking-et'];
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
            addrows('ranking', httpRequest.responseText);
        }
    }
};
httpRequest.open('GET', "../php/get-ranking.php",true);
httpRequest.send();
}, 10000);