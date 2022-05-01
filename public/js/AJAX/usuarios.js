$(function () {
  $("#usuario").blur(function () {

    var usuario = $('#usuario').val();
    var verificar = true;
    $.ajax({
      type: "POST",
      url: "https://proyectoja2021.000webhostapp.com/usuarios/validar",
      data: ('usuario=' + usuario + '&verificar=' + verificar),
      beforeSend: function () {
        $('#imagen').show();
        $('#mensajes').html('Verificando...');
      },
      success: function (respuesta) {
        $('#imagen').hide();
        if (respuesta == 1) {
          $('#mensajes').html('Verificado correctamente');
        } else {
          $('#mensajes').html('¡Error! El usuario ya existe.');
        }
      }
    })
  });
  $('#submit').on('click', function (e) {
    e.preventDefault();

    if (validar()) {


      var usuario = $('#usuario').val();
      var rol = $('#rol').val();
      var trabajador = $('#trabajador').val();
      var contrasena = $('#contrasena').val();
      var contrasena2 = $('#contrasena2').val();
      $.ajax({
        type: "POST",
        url: "https://proyectoja2021.000webhostapp.com/usuarios/registrar",
        data: ('usuario=' + usuario + '&rol=' + rol + '&trabajador=' + trabajador + '&contrasena=' + contrasena),
        beforeSend: function () {
          $('#imagen').show();
          $('#mensajes').html('Procesando datos...');
        },
        success: function (respuesta) {
          $('#imagen').hide();
          if (respuesta == 1) {
            $('#mensajes').html('Se ha registrado exitosamente.');
            $('#usuario').val('');
            $('#contrasena').val('');
            $('#contrasena2').val('');
          } else {
            $('#mensajes').html('¡Error! no se registró.');
          }
        }
      })
    }
  })
})

function validar() {
  var usuario, trabajador, rol, contrasena, contrasena2;
  usuario = document.getElementById("usuario").value;
  trabajador = document.getElementById("trabajador").value;
  rol = document.getElementById("rol").value;
  contrasena = document.getElementById("contrasena").value;
  contrasena2 = document.getElementById("contrasena2").value;

  //expresionCorreo = /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/;
  expresionNombre = /^[a-z ,.'-]+$/i;
  expresionPass = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;

  console.log(usuario)
  if (usuario === "") {
    alert("El campo usuario está vacío.");
    respuesta = 1;
    return false;
  } else {
    if (!expresionNombre.test(usuario)) {
      alert("El usuario no es valido");

      return false;
    } else {
      if (trabajador === "0") {
        alert("Debe seleccionar un trabajador.");

        return false;
      } else {
        if (rol === "0") {
          alert("Debe seleccionar un rol.");
          return false;
        } else {
          if (contrasena === "") {
            alert("Debe ingresar una contraseña.");

            return false;
          } else {
            if (contrasena === "") {
              alert("Debe ingresar una contraseña.");

              return false;
            } else {
              if (contrasena2 === "") {
                alert("Debe confirmar la contraseña.");

                return false;
              } else {
                if (contrasena != contrasena2) {
                  alert("La contraseña no coinciden.");

                  return false;
                } else {
                  if (!expresionPass.test(contrasena)) {
                    alert("La contraseña debe contener un minimo de ocho caracteres, incluyendo una letra mayúscula, una letra minúscula y un número o carácter especial");

                    return false;
                  } else {
                    return true;
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}
/* 
##### ACTUALIZACIÓN AJAX ########
*/


$(document).ready(function () {
  $('body').on('click', '.editar', function (e) {
    e.preventDefault();
    postData($(this).attr('href')).then((data)=> {

      $("#usuarioModificar").val(data.usuario)
      $('#rolModificar option:contains("'+data.rol +'")').prop('selected',true)
      $('#trabajadorModificar option:contains("'+data.nombre + ' ' + data.apellido + '")').prop('selected',true)
      $('#modalActualizarUsuario').modal('show')
    })
  });


  $("#submitModificar").on('click', function (e) {
    e.preventDefault();
   
      if (validarModificacion()) {
        let form = $("#formularioModificarUsuario")[0];

    console.log(form)

    var data = new FormData(form);

    data.append('ajax',true)


    $("#submitModificar").prop("disabled", true);

    $.ajax({
      type: "POST",
      enctype: 'multipart/form-data',
      url: "https://proyectoja2021.000webhostapp.com/usuarios/modificarUsuario",
      processData: false,
      contentType: false,
      data: data,
      beforeSend: function () {
        $('#imagenModificar').show();
        $('#mensajesModificar').html('Procesando datos...');
      },
      success: function (data) {
        $('#imagenModificar').hide();
        $('#mensajesModificar').html('Se ha modificado exitosamente.');
        console.log("SUCCESS : ", data);
        $("#submitModificar").prop("disabled", false);

      },
      error: function (e) {
        $('#imagenModificar').hide();
        $('#mensajesModificar').html(e);
        $("#submitModificar").prop("disabled", false);

      }
    });
      }
    
    
    
  })
})


async function postData(url = '', data=[]) {
            
  const response = await fetch(url, {
    method: 'POST', 
    mode: 'cors', 
    cache: 'no-cache', 
    credentials: 'same-origin', 
    redirect: 'follow', 
    referrerPolicy: 'no-referrer', 
    body: data
  });
  return response.json(); 
}
function validarModificacion() {
  var usuario, trabajador, rol, contrasena, contrasena2;
  usuario = document.getElementById("usuarioModificar").value;
  trabajador = document.getElementById("trabajadorModificar").value;
  rol = document.getElementById("rolModificar").value;
  contrasena = document.getElementById("contrasenaModificar").value;
  contrasena2 = document.getElementById("contrasena2Modificar").value;

  //expresionCorreo = /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/;
  expresionNombre = /^[a-z ,.'-]+$/i;
  expresionPass = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;

  console.log(usuario)
  if (usuario === "") {
    alert("El campo usuario está vacío.");
    respuesta = 1;
    return false;
  } else {
    if (!expresionNombre.test(usuario)) {
      alert("El usuario no es valido");

      return false;
    } else {
      if (trabajador === "0") {
        alert("Debe seleccionar un trabajador.");

        return false;
      } else {
        if (rol === "0") {
          alert("Debe seleccionar un rol.");
          return false;
        } else {
          if (contrasena === "") {
            alert("Debe ingresar una contraseña.");

            return false;
          } else {
            if (contrasena === "") {
              alert("Debe ingresar una contraseña.");

              return false;
            } else {
              if (contrasena2 === "") {
                alert("Debe confirmar la contraseña.");

                return false;
              } else {
                if (contrasena != contrasena2) {
                  alert("La contraseña no coinciden.");

                  return false;
                } else {
                  if (!expresionPass.test(contrasena)) {
                    alert("La contraseña debe contener un minimo de ocho caracteres, incluyendo una letra mayúscula, una letra minúscula y un número o carácter especial");

                    return false;
                  } else {
                    return true;
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}