function validar(){
	var nombre, sueldo, prima, bono, cestaticket;
	nombre = document.getElementById("nombre_cargo").value;
	sueldo = document.getElementById("sueldo").value;
	prima = document.getElementById("prima").value;
	bono = document.getElementById("bono").value;
	cestaticket = document.getElementById("cestaticket").value;

	expresionValor = /^([1-9][0-9]{,2}(,[0-9]{3})*|[0-9]+)(\.[0-9]{1,9})?$/; 
	expresionNombre = /^[a-z ,.'-]+$/i;
	if (nombre === "") {
		alert("El campo nombre está vacío.")
		return false;
	}else{
		if (!expresionNombre.test(nombre)) {
		alert("El nombre no es valido")
		return false;
		}
	}
	if (sueldo === "") {
		alert("El campo sueldo está vacío.")
		return false;
	}else{
		if (!expresionValor.test(sueldo)) {
		alert("Formato del sueldo no es valido.")
		return false;
		}
	}

	if (prima === "") {
		alert("El campo de prima por hogar está vacío.")
		return false;
	}else{
		if (!expresionValor.test(prima)) {
		alert("Formato de la prima por hogar no es valido.")
		return false;
		}
	}
	if (bono === "") {
		alert("El campo bono está vacío.")
		return false;
	}else{
		if (!expresionValor.test(bono)) {
		alert("Formato del bono de compensacion alimentaria no es valido.")
		return false;
		}
	}
	if (cestaticket === "") {
		alert("El campo de CestaTicket está vacío.")
		return false;
	}else{
		if (!expresionValor.test(cestaticket)) {
		alert("Formato de CestaTicket no es valido.")
		return false;
		}
	}


}