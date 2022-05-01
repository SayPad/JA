$(function() {
  $( "#nombre" ).blur(function() {

        var nombre = $('#nombre').val();
        $.ajax({
          type: "POST",
          url: "localhost/cargo/validar",
          data: ('nombre=' + nombre),
          beforeSend: function(){
            $('#imagen').show();
            $('#mensajes').html('Verificando...');
          },
          success: function(respuesta){
            $('#imagen').hide();
            if (respuesta == 1) {
              $('#mensajes').html('Verificado correctamente');
            }else{
              $('#mensajes').html('¡Error! El Cargo ya existe.');
            }
          }
        })
    });
       $('#submit').on('click', function(e){
        e.preventDefault();

        if (validar()) {
        var nombre = $('#nombre').val();
        var sueldo = $('#sueldo').val();
        var prima = $('#prima').val();
        
        $.ajax({
          type: "POST",
          url: "localhost/cargo/registrar",
          data: ('nombre=' + nombre + '&sueldo='+ sueldo + '&prima='+ prima),
          beforeSend: function(){
            $('#imagen').show();
            $('#mensajes').html('Procesando datos...');
          },
          success: function(respuesta){
            $('#imagen').hide();
            if (respuesta == 1) {
              $('#mensajes').html('Se ha registrado exitosamente.');
              $('#nombre').val('');
              $('#sueldo').val('');
              $('#prima').val('');
            }else{
              $('#mensajes').html('¡Error! no se registró.');
            }
          }
        })
        }
      })
})
function validar(){
  var nombre, sueldo, prima, bono, cestaticket;
  nombre = document.getElementById("nombre").value;
  sueldo = document.getElementById("sueldo").value;
  prima = document.getElementById("prima").value;
  bono = 20;
  cestaticket = 20;

  expresionValor = /^([1-9][0-9]{,2}(,[0-9]{3})*|[0-9]+)(\.[0-9]{1,9})?$/; 
  expresionNombre = /^[a-z ,.'-]+$/i;
  expresionPass = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
  if (nombre === "") {
    alert("El campo nombre está vacío.");
    
    return false;
  }else{
    if (!expresionNombre.test(nombre)) {
    alert("El nombre no es valido");
    return false;
    }else{
    if (sueldo === "") {
      alert("El campo sueldo está vacío.");
     
      return false;
    }else{
      if (!expresionValor.test(sueldo)) {
      alert("Formato del sueldo no es valido.");
      
      return false;
      }else{
        if (prima === "") {
          alert("El campo de prima por hogar está vacío.");
        
          return false;
        }else{
          if (!expresionValor.test(prima)) {
          alert("Formato de la prima por hogar no es valido.");
          
          return false;
          }else{
            if (bono === "") {
              alert("El campo bono está vacío.");
             
              return false;
            }else{
              if (!expresionValor.test(bono)) {
              alert("Formato del bono de compensacion alimentaria no es valido.");
        
              return false;
              }else{
                if (cestaticket === "") {
                  alert("El campo de CestaTicket está vacío.");
                  
                  return false;
                }else{
                  if (!expresionValor.test(cestaticket)) {
                  alert("Formato de CestaTicket no es valido.");
                 
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

      $("#cargo").val(data.cargo)
      $("#sueldo_semanal").val(data.sueldo)
      $("#prima_hogar").val(data.prima_hogar)
      $('#modal_actualizar').modal('show')
    })
  });


  $("#submitModificar").on('click', function (e) {
    e.preventDefault();
    if (validarModificacion()) {

      let form = $("#formularioActualizarCargo")[0];

    console.log(form)

    var data = new FormData(form);

    data.append('ajax',true)


    $("#submitModificar").prop("disabled", true);

    $.ajax({
      type: "POST",
      enctype: 'multipart/form-data',
      url: "localhost/cargo/modificarCargo",
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
  var nombre, sueldo, prima, bono, cestaticket;
  nombre = document.getElementById("cargo").value;
  sueldo = document.getElementById("sueldo_semanal").value;
  prima = document.getElementById("prima_hogar").value;
  bono = 20;
  cestaticket = 20;

  expresionValor = /^([1-9][0-9]{,2}(,[0-9]{3})*|[0-9]+)(\.[0-9]{1,9})?$/; 
  expresionNombre = /^[a-z ,.'-]+$/i;
  expresionPass = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
  if (nombre === "") {
    alert("El campo nombre está vacío.");
    
    return false;
  }else{
    if (!expresionNombre.test(nombre)) {
    alert("El nombre no es valido");
    return false;
    }else{
    if (sueldo === "") {
      alert("El campo sueldo está vacío.");
     
      return false;
    }else{
      if (!expresionValor.test(sueldo)) {
      alert("Formato del sueldo no es valido.");
      
      return false;
      }else{
        if (prima === "") {
          alert("El campo de prima por hogar está vacío.");
        
          return false;
        }else{
          if (!expresionValor.test(prima)) {
          alert("Formato de la prima por hogar no es valido.");
          
          return false;
          }else{
            if (bono === "") {
              alert("El campo bono está vacío.");
             
              return false;
            }else{
              if (!expresionValor.test(bono)) {
              alert("Formato del bono de compensacion alimentaria no es valido.");
        
              return false;
              }else{
                if (cestaticket === "") {
                  alert("El campo de CestaTicket está vacío.");
                  
                  return false;
                }else{
                  if (!expresionValor.test(cestaticket)) {
                  alert("Formato de CestaTicket no es valido.");
                 
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