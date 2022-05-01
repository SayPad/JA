function validar(){
	var contrasena, contrasena2;

	contrasena = document.getElementById("contrasena1").value;
	contrasena2 = document.getElementById("contrasena2").value;
	expresionPass = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;

	if (contrasena === "") {
		alert("Debe ingresar una contraseña.")
		return false;
	}
	if (contrasena2 === "") {
		alert("Debe confirmar la contraseña.")
		return false;
	}
	if (contrasena != contrasena2) {
		alert("La contraseña no coinciden.")
		return false;
	}else{
		if (!expresionPass.test(contrasena)) {
		alert("La contraseña debe contener un minimo de ocho caracteres, incluyendo una letra mayúscula, una letra minúscula y un número o carácter especial")
		return false;
		}
	}

}