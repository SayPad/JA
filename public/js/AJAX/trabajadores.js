$(function() {
  $( "#cedula" ).blur(function() {

        var cedula = $('#cedula').val();
        $.ajax({
          type: "POST",
          url: "https://proyectoja2021.000webhostapp.com/trabajadores/validar",
          data: ('cedula=' + cedula),
          beforeSend: function(){
            $('#imagen').show();
            $('#mensajes').html('Verificando...');
          },
          success: function(respuesta){
            $('#imagen').hide();
            if (respuesta == 1) {
              $('#mensajes').html('Verificado correctamente');
            }else{
              $('#mensajes').html('¡Error! la cedula ya existe.');
            }
          }
        })
    });
       $('#submit').on('click', function(e){
        e.preventDefault();

        if (validar()) {
        var cargo = $('#cargo').val();
        var nombre = $('#nombre').val();
        var apellido = $('#apellido').val();
        var cedula = $('#cedula').val();
        var correo = $('#correo').val();
        var fecha = $('#fecha').val();
        $.ajax({
          type: "POST",
          url: "https://proyectoja2021.000webhostapp.com/trabajadores/registrar",
          data: ('cargo=' + cargo + '&nombre='+ nombre + '&apellido='+ apellido+ '&cedula='+ cedula + '&correo='+ correo + '&fecha='+ fecha),
          beforeSend: function(){
            $('#imagen').show();
            $('#mensajes').html('Procesando datos...');
          },
          success: function(respuesta){
            $('#imagen').hide();
            if (respuesta == 1) {
              $('#mensajes').html('Se ha registrado exitosamente.');
              $('#cargo').val('');
              $('#nombre').val('');
              $('#apellido').val('');
              $('#cedula').val('');
              $('#correo').val('');
              $('#fecha').val('');
            }else{
              $('#mensajes').html('¡Error! no se registró.');
            }
          }
        })
        }
      })
})
function validar(){
  var cargo, nombre, apellido, cedula, correo, fecha;
  cargo = document.getElementById("cargo").value;
  nombre = document.getElementById("nombre").value;
  apellido = document.getElementById("apellido").value;
  cedula = document.getElementById("cedula").value;
  correo = document.getElementById("correo").value;
  fecha = document.getElementById("fecha").value;
  expresionCorreo = /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/;
  expresionNombre = /^[a-z ,.'-]+$/i;
  expresionPass = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
  if (cedula === "") {
    alert("Debe ingresar la cedula de indentidad.")

    return false;
  }else{
      if (cedula.length > 8) {
         alert("La cedula debe ser menor de 8 digitos")
      return false;
      }else{
        if (cargo === "") {
      alert("Seleccione un cargo.")
     
      return false;
    }else{
      if (nombre === "") {
        alert("El campo nombre está vacío.")
        
        return false;
      }else{
        if (!expresionNombre.test(nombre)) {
        alert("El nombre no es valido")
       
        return false;
        }else{
          if (apellido === "") {
            alert("El campo apellido está vacío.")
           
            return false;
          }else{
            if (!expresionNombre.test(apellido)) {
            alert("El apellido no es valido")
            
            return false;
            }else{
              if (correo === "") {
                alert("Debe ingresar un correo.")
               
                return false;
              }else{
                if (!expresionCorreo.test(correo)) {
                alert("El correo no es valido")
               
                return false;
                }else{
                   if (fecha === "") {
                    alert("Debe ingresar una fecha")
                  
                    return false;
                  }else{
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
}
/* 
##### ACTUALIZACIÓN AJAX ########
*/


$(document).ready(function () {
  $('body').on('click', '.editar', function (e) {
    e.preventDefault();
    postData($(this).attr('href')).then((data)=> {

      $("#modificar_nombre").val(data.nombre)
      $("#modificar_apellido").val(data.apellido)
      $("#cargo_modificar").val(data.cargo)
      $("#modificar_cedula").val(data.cedula)
      $("#modificar_correo").val(data.correo)
      $("#modficiar_fecha_ingreso").val(data.fecha_ingreso)
      $('#modal_actualizar').modal('show')
    })
  });


  $("#submitModificar").on('click', function (e) {
    e.preventDefault();
   
      if (validarModificacion()) {
        let form = $("#formularioModificarTrabajadores")[0];

    console.log(form)

    var data = new FormData(form);

    data.append('ajax',true)


    $("#submitModificar").prop("disabled", true);

    $.ajax({
      type: "POST",
      enctype: 'multipart/form-data',
      url: "https://proyectoja2021.000webhostapp.com/trabajadores/modificarTrabajador",
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
function validarModificacion(){
  var cargo, nombre, apellido, cedula, correo, fecha;
  cargo = document.getElementById("cargo_modificar").value;
  nombre = document.getElementById("modificar_nombre").value;
  apellido = document.getElementById("modificar_apellido").value;
  cedula = document.getElementById("modificar_cedula").value;
  correo = document.getElementById("modificar_correo").value;
  fecha = document.getElementById("modficiar_fecha_ingreso").value;
  expresionCorreo = /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/;
  expresionNombre = /^[a-z ,.'-]+$/i;
  expresionPass = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
  if (cedula === "") {
    alert("Debe ingresar la cedula de indentidad.")

    return false;
  }else{
      if (cedula.length > 8) {
         alert("La cedula debe ser menor de 8 digitos")
      return false;
      }else{
        if (cargo === "") {
      alert("Seleccione un cargo.")
     
      return false;
    }else{
      if (nombre === "") {
        alert("El campo nombre está vacío.")
        
        return false;
      }else{
        if (!expresionNombre.test(nombre)) {
        alert("El nombre no es valido")
       
        return false;
        }else{
          if (apellido === "") {
            alert("El campo apellido está vacío.")
           
            return false;
          }else{
            if (!expresionNombre.test(apellido)) {
            alert("El apellido no es valido")
            
            return false;
            }else{
              if (correo === "") {
                alert("Debe ingresar un correo.")
               
                return false;
              }else{
                if (!expresionCorreo.test(correo)) {
                alert("El correo no es valido")
               
                return false;
                }else{
                   if (fecha === "") {
                    alert("Debe ingresar una fecha")
                  
                    return false;
                  }else{
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
}