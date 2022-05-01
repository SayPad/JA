function validar(){
	var cargo, nombre, apellido, cedula, correo, fecha;
	cargo = document.getElementById("cargo").value;
	nombre = document.getElementById("nombre").value;
	apellido = document.getElementById("apellido").value;
	cedula = document.getElementById("cedula").value;
	correo = document.getElementById("correo").value;
	fecha = document.getElementById("fecha_ingreso").value;

	expresionCorreo = /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/;
	expresionNombre = /^[a-z ,.'-]+$/i;
	expresionPass = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
	if (cargo === "") {
		alert("Seleccione un cargo.")
		return false;
	}
	if (nombre === "") {
		alert("El campo nombre está vacío.")
		return false;
	}else{
		if (!expresionNombre.test(nombre)) {
		alert("El nombre no es valido")
		return false;
		}
	}
	if (apellido === "") {
		alert("El campo apellido está vacío.")
		return false;
	}else{
		if (!expresionNombre.test(apellido)) {
		alert("El apellido no es valido")
		return false;
		}
	}

	if (cedula === "") {
		alert("Debe ingresar la cedula de indentidad.")
		return false;
	}
	if (correo === "") {
		alert("Debe ingresar un correo.")
		return false;
	}else{
		if (!expresionCorreo.test(correo)) {
		alert("El correo no es valido")
		return false;
		}
	}
	if (fecha === "") {
		alert("Debe ingresar una fecha")
		return false;
	}

}