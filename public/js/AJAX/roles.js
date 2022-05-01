$(function() {
  $( "#nombre_rol" ).blur(function() {

        var nombre_rol = $('#nombre_rol').val();
        $.ajax({
          type: "POST",
          url: "https://proyectoja2021.000webhostapp.com/roles/validar",
          data: ('nombre_rol=' + nombre_rol),
          beforeSend: function(){
            $('#imagen').show();
            $('#mensajes').html('Verificando...');
          },
          success: function(respuesta){
            $('#imagen').hide();
            if (respuesta == 1) {
              $('#mensajes').html('Verificado correctamente');
            }else{
              $('#mensajes').html('¡Error! El Rol ya existe.');
            }
          }
        })
    });
       $('#submit').on('click', function(e){
        e.preventDefault();
        if (validar()) {

        var nombre_rol = $('#nombre_rol').val();
        var selected = [];
        $("input:checkbox:checked").each(function() {
          if (this.checked) {
            // agregas cada elemento.
            selected.push($(this).val());
          }
        });
        
        $.ajax({
          type: "POST",
          url: "https://proyectoja2021.000webhostapp.com/roles/registrar",
          data: {selected: selected , 'nombre_rol' : nombre_rol},
          beforeSend: function(){
            $('#imagen').show();
            $('#mensajes').html('Procesando datos...');
          },
          success: function(respuesta){
           $('#imagen').hide();
            if (respuesta == 1) {
              $('#mensajes').html('Se ha registrado exitosamente.');
              $('#trabajador').val('');
              $('#desde').val('');
              $('#hasta').val('');
              $('#descripcion').val('');
            }else{
              $('#mensajes').html('¡Error! no se registró.');
            }
          }
        })
        }
      })
})
function validar(){
  var nombre_rol;
  nombre_rol = document.getElementById("nombre_rol").value;
  expresionNombre = /^[a-z ,.'-]+$/i;
  
  if (nombre_rol === "") {
    alert("Debe ingresar un nombre para el rol.")
    return false;
  }else{
    if (!expresionNombre.test(nombre_rol)) {
    alert("El nombre del rol no es valido")
    return false;
    }else{
      return true;
    }
  }
}

