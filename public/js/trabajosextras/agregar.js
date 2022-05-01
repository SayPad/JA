function validar(){
	var trabajador, descripcion_trabajo, fecha_trabajo, fecha_pago, descripcion, cantidad, pago;
	trabajador = document.getElementById("trabajador").value;
	descripcion_trabajo = document.getElementById("descripcion_trabajo").value;
	fecha_trabajo = document.getElementById("fecha_trabajo").value;
	fecha_pago = document.getElementById("fecha_pago").value;
	descripcion = document.getElementById("descripcion").value;
	cantidad = document.getElementById("cantidad").value;
	pago = document.getElementById("pago").value;

	if (trabajador === "0") {
		alert("Debe seleccionar un trabajador.")
		return false;
	}
	if (descripcion_trabajo === "") {
		alert("Ingrese una descripcion del trabajo a realizar en general.")
		return false;
	}
	if (descripcion_trabajo.length > 210) {
		alert("Ingrese una descripcion general resumida, menos de 210 caracteres.")
		return false;
	}
	if (fecha_trabajo === "") {
		alert("Ingrese la fecha del trabajo")
		return false;
	}
	if (fecha_pago === "") {
		alert("Ingrese la fecha de pago")
		return false;
	}
	if (descripcion === "") {
		alert("Ingrese una descripcion.")
		return false;
	}
	if (descripcion.length > 50) {
		alert("Ingrese una descripcion resumida, menos de 50 caracteres.")
		return false;
	}

	if (cantidad === "") {
		alert("Ingrese la cantidad")
		return false;
	}
	if (pago === "") {
		alert("Ingrese el pago por unidad")
		return false;
	}

}