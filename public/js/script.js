//https://s3.amazonaws.com/dolartoday/data.json
$.getJSON("https://s3.amazonaws.com/dolartoday/data.json",function(data){
  $('#texto').html('Banco central de Venezuela: '+data.USD.promedio_real+ '<br> dolartoday: ' + data.USD.transferencia + '<br> Promedio: ' + data.USD.promedio);
  $('#al').html('Valor del dolar | Fecha: '+data._timestamp.fecha);
    });