<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="<?php echo constant('URL')?>public/img/icono.png" rel="shortcut icon" type="image/x-icon" />
  <title>J&A | Trabajadores</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/main.css">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/estadisticotorta.css">

</head>
<body>
  <!-- Uso esta clase por el fondo rojo -->
  <?php require 'views/header.php'; ?> 
  <?php require 'views/menu.php'; ?>
  <div class="container">

    <main>
        <div class="margen-top"> </div>
        <div class="text-header">
            <h2>Gestion de nominas</h2> 
        </div>

    <div class="tabla" id="form" data-eliminar="eliminarTrabajador">
      <div>
          



      <script src="<?= constant('URL')?>controllers/source/reportes/graficos/code/highcharts.js"></script>
        <script src="<?= constant('URL')?>controllers/source/reportes/graficos/code/highcharts-3d.js"></script>
        <script src="<?= constant('URL')?>controllers/source/reportes/graficos/code/exporting.js"></script>
        <script src="<?= constant('URL')?>controllers/source/reportes/graficos/code/export-data.js"></script>
        <script src="<?= constant('URL')?>controllers/source/reportes/graficos/code/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        Chart showing grouped and stacked 3D columns. These features are
        available both for 2D and 3D column charts.
    </p>
</figure>


		<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'column',
        options3d: {
            enabled: true,
            alpha: 15,
            beta: 15,
            viewDistance: 25,
            depth: 40
        }
    },

    title: {
        text: 'Estadisticas de los empleados que han tenido inasistencias'
    },

    xAxis: {
        categories: ['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas'],
        labels: {
            skew3d: true,
            style: {
                fontSize: '16px'
            }
        }
    },

    yAxis: {
        allowDecimals: false,
        min: 0,
        title: {
            text: 'Number of fruits',
            skew3d: true
        }
    },

    tooltip: {
        headerFormat: '<b>{point.key}</b><br>',
        pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: {point.y} / {point.stackTotal}'
    },

    plotOptions: {
        column: {
            stacking: 'normal',
            depth: 40
        }
    },

    series: [{
        name: 'mostrar',
        data: [<?php
		$inasistencias = $this->model->inasistencias->get();
	foreach($inasistencias as $row){
		?>
		[<?php echo $row->getId()?>],
		<?php} ?>],
        stack: 'male'
    }, {
        name: 'Joe',
        data: [<?php
		$inasistencias = $this->model->inasistencias->get();
	foreach($inasistencias as $row){
		?>
		[<?php echo $row->getNombre()?>],
		<?php} ?>],
        stack: 'male'
    }, {
        name: 'Jane',
        data: [2, 5, 6, 2, 1],
        stack: 'female'
    }, {
        name: 'Janet',
        data: [3, 0, 4, 4, 3],
        stack: 'female'
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
