function validar(){
	var actualizar;
	actualizar = document.getElementById("actualizar").value;
	expresionDolar = /^([1-9][0-9]{,2}(,[0-9]{3})*|[0-9]+)(\.[0-9]{1,9})?$/; 
	if (actualizar === "") {
		alert("Debe ingresar un valor")
		return false;
	}else{
		if (!expresionDolar.test(actualizar)) {
		alert("Formato no valido.")
		return false;
		}
	}

}