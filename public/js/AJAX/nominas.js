$(function() {
       $('#submit').on('click', function(e){
        e.preventDefault();

        if (validar()) {
        var trabajador = $('#trabajador').val();
        var periodo_desde = $('#periodo_desde').val();
        var periodo_hasta = $('#periodo_hasta').val();
        var horas_extras = $('#horas_extras').val();
        var pago = $('input:radio[name=pago]:checked').val();
        var fecha_pago = $('#fecha_pago').val();
        $.ajax({
          type: "POST",
          url: "https://proyectoja2021.000webhostapp.com/nominas/registrar",
          data: ('trabajador=' + trabajador + '&periodo_desde='+ periodo_desde + '&periodo_hasta='+ periodo_hasta+ 
            '&horas_extras='+ horas_extras + '&pago='+ pago + '&fecha_pago='+ fecha_pago),
          beforeSend: function(){
            $('#imagen').show();
            $('#mensajes').html('Procesando datos...');
          },
          success: function(respuesta){
            $('#imagen').hide();
            if (respuesta == 1) {
              $('#mensajes').html('Se ha registrado exitosamente.');
              $('#trabajador').val('');
              $('#periodo_desde').val('');
              $('#periodo_hasta').val('');
              $('#horas_extras').val('');
              $('#pago').val('');
              $('#fecha_pago').val('');
            }else{
              $('#mensajes').html(respuesta);
            }
          }
        })
        }
      })
})
function validar(){ 
  var trabajador, periodo_desde, periodo_hasta, horas_extras, pago1, pago2, fecha_pago;
  trabajador = document.getElementById("trabajador").value;
  periodo_desde = document.getElementById("periodo_desde").value;
  periodo_hasta = document.getElementById("periodo_hasta").value;
  horas_extras = document.getElementById("horas_extras").value;
  fecha_pago = document.getElementById("fecha_pago").value;

  if (trabajador === "0") {
    alert("Debe seleccionar un trabajador.");
  
    return false;
  }else{
    if (periodo_desde === "") {
    alert("Ingreses el Periodo (desde).");
     
      return false;
    }else{
      if (periodo_hasta === "") {
          alert("Ingrese el Periodo (hasta).");
       
          return false;
        }else{
          if (horas_extras === "") {
            alert("Coloque '0' si no hubo horas extras.");
      
            return false;
          }else{
            if(!document.querySelector('input[name="pago"]:checked')) {
              alert('Seleccione un tipo de pago');
              return false;
            }else{
              if (fecha_pago === "") {
              alert("Ingrese la fecha de pago");
            
              return false;
            }else{
              if (periodo_desde > periodo_hasta) {
                alert("La fecha de cominezo no puede ser mayor a la que termina.")
       
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