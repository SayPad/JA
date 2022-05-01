/* 
##### ACTUALIZACIÓN AJAX ########
*/


$(document).ready(function () {
  $('body').on('click', '.editar', function (e) {
    e.preventDefault();
    postData($(this).attr('href')).then((data)=> {

      $("#IvssModificar").val(data.ivss)
      $("#RpeModificar").val(data.rpe)
      $("#FaovModificar").val(data.faov)
      $("#IncesModificar").val(data.inces)

      $('#modalActualizar').modal('show')
    })
  });


  $("#submitModificar").on('click', function (e) {
    e.preventDefault();
   
      if (validar()) {
        let form = $("#formularioModificar")[0];

    console.log(form)

    var data = new FormData(form);

    data.append('ajax',true)


    $("#submitModificar").prop("disabled", true);

    $.ajax({
      type: "POST",
      enctype: 'multipart/form-data',
      url: "localhost/nominas/modificar",
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
function validar(){
  var ivss, rpe, prima, faov, inces;
  ivss = document.getElementById("IvssModificar").value;
  rpe = document.getElementById("RpeModificar").value;
  faov = document.getElementById("FaovModificar").value;
  inces = document.getElementById("IncesModificar").value;
  expresionValor = /^([1-9][0-9]{,2}(,[0-9]{3})*|[0-9]+)(\.[0-9]{1,9})?$/; 

  if (ivss === "") {
    alert("El campo ivss está vacío.");
    return false;
  }else{
    if (!expresionValor.test(ivss)) {
      alert("Formato del ivss no es valido.");
      return false;
    }else{
      if (rpe === "") {
        alert("El campo rpe está vacío.");
        return false;
      }else{
          if (!expresionValor.test(rpe)) {
        alert("Formato del rpe no es valido.");
        return false;
       }else{
        if (faov === "") {
          alert("El campo faov está vacío.");
          return false;
        }else{
          if (!expresionValor.test(faov)) {
            alert("Formato del faov no es valido.");
            return false;
          }else{
            if (inces === "") {
              alert("El campo inces está vacío.");
              return false;
            }else{
              if (!expresionValor.test(inces)) {
                alert("Formato del inces no es valido.");
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