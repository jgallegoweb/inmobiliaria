window.addEventListener("load", function(){
        /*var ajax = new Ajax();
        ajax.setUrl("../usuarios/ajaxUsuarios.php");
        ajax.setRespuesta(verrespuesta);
        ajax.doPeticion();*/
});


var verrespuesta = function (textojson){
    var json = JSON.parse(textojson);
    var tabla = document.getElementById("listausuarios");
    for (var x = 0; x < json.length; x++) {
        var tr = document.createElement("tr");
        var login = "";
        for (var y = 0 in json[x]) {
            var td = document.createElement("td");
            
            if (y != "clave") {
                td.textContent = json[x][y];
                tr.appendChild(td);
            }
        }
            
        var td = document.createElement("td");
        td.innerHTML = "<a href='backEditarUsuarios.php?login="+json[x]['login']+"'>Editar</a>";
        tr.appendChild(td);
        var td = document.createElement("td");
        td.innerHTML = "<a href='backBorrarUsuarios.php?login="+json[x]['login']+"'>Borrar</a>";
        tr.appendChild(td);
        tabla.appendChild(tr);
    }
}