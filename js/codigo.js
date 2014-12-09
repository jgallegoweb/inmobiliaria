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
        var direccion = this.getAttribute("data-nombre");
        var mensaje = "";
        if(direccion == null){
            mensaje = "Se va a borrar la foto seleccionada, ¿Está seguro?";
        }else{
            mensaje = "se borrará el inmueble "+direccion+" y sus fotos, ¿Está seguro?";
        }
        if(!confirm(mensaje)){
            e.preventDefault();
        }
    }
});


