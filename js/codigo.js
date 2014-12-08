window.addEventListener("load", function(){
    document.getElementById("limp").addEventListener("click", confirmaReset);
    var borradores = document.querySelectorAll(".eliminar");
    for(var i=0; i<borradores.length; i++){
        borradores[i].addEventListener("click", confirmaBorrado);
    }
    function confirmaReset(e){
        if(!confirm("Perderá los datos del formulario, ¿Está seguro?")){
            e.preventDefault();
        }
    }
    function confirmaBorrado(e){
        alert("dd");
        var direccion = this.getAttribute("data-nombre");
        if(!confirm("se borrará el inmueble "+direccion+" y sus fotos, ¿Está seguro?")){
            e.preventDefault();
        }
    }
});


