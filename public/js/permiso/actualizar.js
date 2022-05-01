function validar(){
	var descripcion, desde, hasta;
	descripcion = document.getElementById("descripcion").value;
	desde = document.getElementById("desde").value;
	hasta = document.getElementById("hasta").value;


	if (descripcion === "0") {
		alert("Seleccione el tipo.")
		return false;
	}

	if (desde === "") {
		alert("Ingrese la fecha donde comineza el permiso")
		return false;
	}
	if (hasta === "") {
		alert("Ingrese la fecha donde termina el permiso.")
		return false;
	}
	if (desde > hasta) {
		alert("La fecha de cominezo no puede ser mayor a la que termina.")
		return false;

	}

}