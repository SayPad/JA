$(function () {
  $('#submit').on('click', function (e) {
    e.preventDefault();

    if (validar()) {


      var nombre_bono = $('#nombre_bono').val();
      var cargo = $('#cargo').val();
      var moneda = $('#moneda').val();
      var valor = $('#valor').val();
      var dias = $('#dias').val();

      $.ajax({
        type: "POST",
        url: "https://proyectoja2021.000webhostapp.com/bonos/registrarBonos",
        data: ('nombre_bono=' + nombre_bono + '&cargo=' + cargo + '&moneda=' + moneda + '&valor=' + valor + '&dias=' + dias),
        beforeSend: function () {
          $('#imagen').show();
          $('#mensajes').html('Procesando datos...');
        },
        success: function (respuesta) {
          $('#imagen').hide();
          if (respuesta == 1) {
            $('#mensajes').html('Se ha registrado exitosamente.');
            $('#nombre_bono').val('');
            $('#valor').val('');
            $('#dias').val('');
          } else {
            $('#mensajes').html('¡Error! no se registró.');
          }
        }
      })
    }
  })
})

function validar() {
  var nombre_bono, cargo, moneda, valor, dias;
  nombre_bono = document.getElementById("nombre_bono").value;
  cargo = document.getElementById("cargo").value;
  moneda = document.getElementById("moneda").value;
  valor = document.getElementById("valor").value;
  dias = document.getElementById("dias").value;

  //expresionCorreo = /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/;
  expresionNombre = /^[a-z ,.'-]+$/i;

  if (nombre_bono === "") {
    alert("El campo nombre del bono está vacío.");
    respuesta = 1;
    return false;
  } else {
    if (!expresionNombre.test(nombre_bono)) {
      alert("El nombre no es valido");

      return false;
    } else {
      if (cargo === "0") {
        alert("Debe seleccionar un cargo.");

        return false;
      } else {
        if (moneda === "0") {
          alert("Debe seleccionar una moneda.");
          return false;
        } else {
          if (valor === "") {
            alert("Debe ingresar el valor.");

            return false;
          } else {
            if (dias === "") {
              alert("Debe ingresar la cantidad de dias en los que se genera este pago.");

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
/* 
##### ACTUALIZACIÓN AJAX ########
*/


$(document).ready(function () {
  $('body').on('click', '.editar', function (e) {
    e.preventDefault();
    postData($(this).attr('href')).then((data)=> {

      $("#nombre_bonoModificar").val(data.nombre_bono)
      $('#cargoModificar option:contains("'+data.nombre_cargo +'")').prop('selected',true)
      $('#monedaModificar option:contains("'+data.moneda +'")').prop('selected',true)
      $("#valorModificar").val(data.valor)
      $("#diasModificar").val(data.dias)
      $('#modalActualizarBonos').modal('show')
    })
  });


  $("#submitModificar").on('click', function (e) {
    e.preventDefault();
   
      if (validarModificacion()) {
        let form = $("#formularioModificarBonos")[0];

    console.log(form)

    var data = new FormData(form);

    data.append('ajax',true)


    $("#submitModificar").prop("disabled", true);

    $.ajax({
      type: "POST",
      enctype: 'multipart/form-data',
      url: "http://localhost/Proyecto/bonos/modificarBonos",
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
        $('#mensajesModificar').html('¡Error! complete todos los campos');
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
  var nombre_bono, cargo, moneda, valor, dias;
  nombre_bono = document.getElementById("nombre_bonoModificar").value;
  cargo = document.getElementById("cargoModificar").value;
  moneda = document.getElementById("monedaModificar").value;
  valor = document.getElementById("valorModificar").value;
  dias = document.getElementById("diasModificar").value;

  //expresionCorreo = /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/;
  expresionNombre = /^[a-z ,.'-]+$/i;

  if (nombre_bono === "") {
    alert("El campo nombre del bono está vacío.");
    respuesta = 1;
    return false;
  } else {
    if (!expresionNombre.test(nombre_bono)) {
      alert("El nombre no es valido");

      return false;
    } else {
      if (cargo === "0") {
        alert("Debe seleccionar un cargo.");

        return false;
      } else {
        if (moneda === "0") {
          alert("Debe seleccionar una moneda.");
          return false;
        } else {
          if (valor === "") {
            alert("Debe ingresar el valor.");

            return false;
          } else {
            if (dias === "") {
              alert("Debe ingresar la cantidad de dias en los que se genera este pago.");

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