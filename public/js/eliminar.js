document.getElementById("eliminar").addEventListener("click", function(e){ 
    respuesta = confirm("¿Estas seguro que quieres eliminar?"); 
    if (respuesta == false) {
    	e.preventDefault()
    }
});