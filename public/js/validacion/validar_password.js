(function(){
	var formulario = document.getElementsByName('formulario')[0],
		elementos = formulario.elements,
		contrasena = document.getElementById('password1'),
		boton = document.getElementById('btn');
		
		var validarPass = function(e){
			if (formulario.password1.value == 0 || formulario.password2.value == 0 ) {
				alert("Todos los campos son obligatorios");
				e.preventDefault()
			}else{
				validarCambio(e);
			}
		}


		var validarCambio = function(e){
			if (formulario.password1.value != formulario.password2.value){
				alert("las contraseñas no coinciden");
				e.preventDefault()
			}else{
				expresion(e);
			}
		}
		var expresion = function(e){
			var er = /^[a-z0-9]{5,20}$/i;
			var respuesta = er.test(contrasena.value);
			if (respuesta == false) {
				alert("La contraseña solo pude estar formada por alfanumericos, es decir no acepta signos como '$!&%¨:;.><*¨@', ni espacios y debe estar formada por mas de 5 caracteres.");
		 		e.preventDefault()
			}else{
				confirmar(e);
			}
}

	function confirmar(e)
    {
    var opcion = confirm("¿Estas seguro que quieres cambiar la contraseña?");
    if (opcion == true) {
	} else {
		alert("se ha cancelado");
	    e.preventDefault()
	}
	document.getElementById("ejemplo").innerHTML = mensaje;
}

		formulario.addEventListener("submit", validarPass);
}())
