function validar(){
	var nombre, apellido, cedula;
	nombre = document.getElementById("nombre").value;
	apellido = document.getElementById("apellido").value;
	cedula = document.getElementById("cedula").value;

	if (nombre === "" || apellido === "" || cedula === "") {
		alert("Todos los campos son obligatorios");
		return false;
	}
	

}