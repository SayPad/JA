function validar(){
	var fecha;
	fecha = document.getElementById("fecha").value;
	
	if (fecha === "") {
		alert("Debe ingresar una fecha")
		return false;
	}else{
		return true;
	}


}