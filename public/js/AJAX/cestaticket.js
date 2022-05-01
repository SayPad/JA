$(function() {
       $('#submit').on('click', function(e){
        e.preventDefault();
        if (validar()) {
        var trabajador = $('#trabajador').val();
        var periodo_desde = $('#periodo_desde').val();
        var periodo_hasta = $('#periodo_hasta').val();
        var pago = $('input:radio[name=tipo_pago]:checked').val();
        var fecha_pago = $('#fecha_pago').val();
        $.ajax({
          type: "POST",
          url: "http://localhost/Proyecto/cestaticket/registrar",
          data: ('trabajador=' + trabajador + '&periodo_desde='+ periodo_desde + '&periodo_hasta='+ periodo_hasta+ 
          '&pago='+ pago + '&fecha_pago='+ fecha_pago),
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
              $('#pago').val('');
              $('#fecha_pago').val('');
            }else{
              $('#mensajes').html('¡Error! no se registró.');
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
  pago1 = document.getElementById('pago1').checked;
  pago2 = document.getElementById('pago2').checked;
  fecha_pago = document.getElementById("fecha_pago").value;
  var respeusta = 0;
  if (trabajador === "0") {
    alert("Debe seleccionar un trabajador.");
    respuesta = 1;
    return false;
  }else{
    if (periodo_desde === "") {
    alert("Ingreses el Periodo (desde).");
    respuesta = 1;
    return false;
  }else{
    if (periodo_hasta === "") {
    alert("Ingrese el Periodo (hasta).");
    respuesta = 1;
    return false;
  }else{
    if (fecha_pago === "") {
    alert("Ingrese la fecha de pago");
    respuesta = 1;
    return false;
  }else{
     if (periodo_desde > periodo_hasta) {
    alert("La fecha de cominezo no puede ser mayor a la que termina.");
    respuesta = 1;
    return false;

  }else{
    return true;
  }
  }
  }
  }
  }
  


}