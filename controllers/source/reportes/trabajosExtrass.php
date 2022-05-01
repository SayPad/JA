<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="<?php echo constant('URL')?>public/img/icono.png" rel="shortcut icon" type="image/x-icon" />
  <title>J&A | Trabajadores</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/main.css">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/estadisticocolumna.css">

</head>
<body>
  <!-- Uso esta clase por el fondo rojo -->
  <?php require 'views/header.php'; ?> 
  <?php require 'views/menu.php'; ?>
  <div class="container">

    <main>
        <div class="margen-top"> </div>
        <div class="text-header">
            <h2>Gestion de trabajos extras</h2> 
        </div>

    <div class="tabla" id="form" data-eliminar="eliminarTrabajador">
      <div>
          


      <figure class="highcharts-figure">
        <div id="container"></div>

      </figure>
        <script src="<?php echo constant('URL')?>controllers/source/reportes/graficos/code/highcharts.js"></script>
        <script src="<?php echo constant('URL')?>controllers/source/reportes/graficos/code/modules/exporting.js"></script>
        <script src="<?php echo constant('URL')?>controllers/source/reportes/graficos/code/modules/export-data.js"></script>
        <script src="<?php echo constant('URL')?>controllers/source/reportes/graficos/code/modules/accessibility.js"></script>
        <script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Trabajos extras realizados por los empleados'
    },

    xAxis: {
        categories: [
            
            foreach ($trabajosextras as $row) {
                <?php echo $trabajos_extras->getNombre(). " " . $trabajador->getApellido(); ?>
               
                }
            
            
        ],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population (millions)',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' millions'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Year 1800',
        data: [107, 31, 635, 203, 2]
    }]
});
		</script>




      </div>
      </div>        
      </div>
    </main>
  </div>
  
  <script src="<?php echo constant('URL')?>public/js/jquery-3.2.1.js"></script>
  <script src="<?php echo constant('URL')?>public/js/main.js"></script>
   <script src="<?php echo constant('URL')?>public/js/AJAX/eliminar.js"></script>

   
</body>
</html>
