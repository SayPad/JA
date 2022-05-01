(function(){
  var formulario = document.getElementsByName('formulario')[0],
    elementos = formulario.elements,
    usuario = document.getElementById('usuario'),
    contrasena = document.getElementById('contrasena');
    
    var campos = function(e){
      if (formulario.usuario.value == 0 || formulario.contrasena.value == 0 ) {
        alert("Todos los campos son obligatorios");
        e.preventDefault()
      }
    }
    
    formulario.addEventListener("submit", campos);
}())
