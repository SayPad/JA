function validar(){ 
	var trabajador, periodo_desde, periodo_hasta, horas_extras, pago1, pago2, fecha_pago;
	trabajador = document.getElementById("trabajador").value;
	periodo_desde = document.getElementById("periodo_desde").value;
	periodo_hasta = document.getElementById("periodo_hasta").value;
	horas_extras = document.getElementById("horas_extras").value;
	pago1 = document.getElementById('pago1').checked;
	pago2 = document.getElementById('pago2').checked;
	fecha_pago = document.getElementById("fecha_pago").value;

	if (trabajador === "0") {
		alert("Debe seleccionar un trabajador.")
		return false;
	}
	
	if (periodo_desde === "") {
		alert("Ingreses el Periodo (desde).")
		return false;
	}
	if (periodo_hasta === "") {
		alert("Ingrese el Periodo (hasta).")
		return false;
	}
	if (horas_extras === "") {
		alert("Coloque '0' si no hubo horas extras.")
		return false;
	}
	if (pago1 || pago2) {
	}else{
		alert("Debe seleccionar el tipo de pago");
		return false;
	}

	if (fecha_pago === "") {
		alert("Ingrese la fecha de pago")
		return false;
	}
	if (periodo_desde > periodo_hasta) {
		alert("La fecha de cominezo no puede ser mayor a la que termina.")
		return false;

	}
	
}