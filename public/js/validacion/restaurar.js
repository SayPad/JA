(function(){
  var formulario = document.getElementsByName('formulario')[0],
    elementos = formulario.elements,
    nombre = document.getElementById('nombre'),
    apellido = document.getElementById('apellido');
    cedula = document.getElementById('cedula');
    
    var campos = function(e){
      if (formulario.nombre.value == 0 || formulario.apellido.value == 0 || formulario.cedula.value == 0) {
        alert("Todos los campos son obligatorios");
        e.preventDefault()
      }
    }
    
    formulario.addEventListener("submit", campos);
}())
