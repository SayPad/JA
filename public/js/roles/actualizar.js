function validar(){
	var nombre_rol;
	nombre_rol = document.getElementById("nombre_rol").value;
	expresionNombre = /^[a-z ,.'-]+$/i;
	
	if (nombre_rol === "") {
		alert("Debe ingresar un nombre para el rol.")
		return false;
	}else{
		if (!expresionNombre.test(nombre_rol)) {
		alert("El nombre del rol no es valido")
		return false;
		}
	}
	

}