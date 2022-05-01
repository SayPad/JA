$(function() {
       $('#submit').on('click', function(e){
        e.preventDefault();
        if (validar()) {
        var trabajador = $('#trabajador').val();
        var descripcion_trabajo = $('#descripcion_trabajo').val();
        var fecha_trabajo = $('#fecha_trabajo').val();
        var tipo_pago = $('input:radio[name=tipo_pago]:checked').val();
        var fecha_pago = $('#fecha_pago').val();
        var descripcion = $('#descripcion').val();
        var cantidad = $('#cantidad').val();
        var pago = $('#pago').val();
        $.ajax({
          type: "POST",
          url: "localhost/trabajos_extras/registrar",
          data: ('trabajador=' + trabajador + '&descripcion_trabajo='+ descripcion_trabajo + 
            '&fecha_trabajo='+ fecha_trabajo+ '&tipo_pago='+ tipo_pago + '&fecha_pago='+ fecha_pago + 
            '&descripcion='+ descripcion + '&cantidad='+ cantidad + '&pago='+ pago),
          beforeSend: function(){
            $('#imagen').show();
            $('#mensajes').html('Procesando datos...');
          },
          success: function(respuesta){
            $('#imagen').hide();
            if (respuesta == 1) {
              $('#mensajes').html('Se ha registrado exitosamente.');
              $('#trabajador').val('');
              $('#descripcion_trabajo').val('');
              $('#fecha_trabajo').val('');
              $('#tipo_pago').val('');
              $('#fecha_pago').val('');
              $('#descripcion').val('');
              $('#cantidad').val('');
              $('#pago').val('');
            }else{
              $('#mensajes').html('¡Error! no se registró.');
            }
          }
        })
        }
        
      })
})
function validar(){

  var trabajador, descripcion_trabajo, fecha_trabajo, fecha_pago, descripcion, cantidad, pago;
  trabajador = document.getElementById("trabajador").value;
  descripcion_trabajo = document.getElementById("descripcion_trabajo").value;
  fecha_trabajo = document.getElementById("fecha_trabajo").value;
  fecha_pago = document.getElementById("fecha_pago").value;
  descripcion = document.getElementById("descripcion").value;
  cantidad = document.getElementById("cantidad").value;
  pago = document.getElementById("pago").value;
  var respeusta = 0;

  if (trabajador === "0") {
    alert("Debe seleccionar un trabajador.");
    respuesta = 1;
    return false;
  }else{
    if (descripcion_trabajo.length < 25) {
      alert("Ingrese una descripcion del trabajo a realizar en general un poco mas extensa, minimo 25 caracteres.");
      respuesta = 1;
      return false;
    }else{
      if (descripcion_trabajo.length > 210) {
        alert("Ingrese una descripcion general resumida, menos de 210 caracteres.");
        respuesta = 1;
        return false;
      }else{
        if (fecha_trabajo === "") {
          alert("Ingrese la fecha del trabajo");
          respuesta = 1;
          return false;
        }else{
          if(!document.querySelector('input[name="tipo_pago"]:checked')) {
            alert('Seleccione un tipo de pago');
            return false;
            }else{
              if (fecha_pago === ""){
                alert("Ingrese la fecha de pago");
                  respuesta = 1;
                  return false;
              }else{
                if (descripcion === "") {
            alert("Ingrese una descripcion.");
            respuesta = 1;
            return false;
          }else{
            if (descripcion.length > 50) {
              alert("Ingrese una descripcion resumida, menos de 50 caracteres.");
              respuesta = 1;
              return false;
              }else{
                if (cantidad === "") {
                  alert("Ingrese la cantidad");
                  respuesta = 1;
                  return false;
                }else{
                  if (pago === "") {
                    alert("Ingrese el pago por unidad");
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
        }
      }
    }
  }
}


              