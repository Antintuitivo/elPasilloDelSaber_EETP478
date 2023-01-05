function addrows(tableID, data) {
    
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
            //Comprobar si se está utilizando el campo de búsqueda.
            searching = document.getElementById('search-input');
            if (searching.value == ""){
               addrows('ranking', httpRequest.responseText);// Función utilizada al finalizar la ejecución del código PHP.
            }
        }
    }
};
httpRequest.open('GET', "../php/get-ranking.php",true);
httpRequest.send();
}, 10000);

//---------------------------------------------------------------------------------------------

function myFunction(searchValue, tableID) {
    var input, filter, table, tr, td, i;
    filter = searchValue.toUpperCase();
    table = document.getElementById(tableID);
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }