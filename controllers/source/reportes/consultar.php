<!DOCTYPE HTML>
<html> 
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo constant('URL')?>public/img/icono.png" rel="shortcut icon" type="image/x-icon" />

        <title>J&A | Reportes de Inasisteacias</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/main.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <style type="text/css">
#container {
  height: 400px; 
}

.highcharts-figure, .highcharts-data-table table {
  min-width: 310px; 
  max-width: 800px;
  margin: 1em auto;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #EBEBEB;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}
.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}
.highcharts-data-table th {
  font-weight: 600;
  padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
  padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}
.highcharts-data-table tr:hover {
  background: #f1f7ff;
}

        </style>
    </head>
    <body>
 <header>
    <div class="wrapper">
      <div><img class="img-logo" src="<?php echo constant('URL')?>public/img/logo.png"></div>
      <div class="logo" id="fuente">Chirinos Instalaciones C.A</div>
      <hr class="linea-logo">
      <div class="detalles" id="fuente">Montajes electricos, mecanicos y civiles</div>
      <div class="rif" id="fuente">Rif J-407400282</div>
      
      <nav>
        <a href="Manual.pdf" target="blank" title="Manual del sistema">Manual</span></a>
        <a href="<?php echo constant('URL')?>main/cerrarSession">Cerrar Sesion</a>
      </nav>
    </div>
</header>
<section>
  
    <span id="button-menu" class="fa fa-bars"></span>

    <nav class="navegacion">
      <ul class="menu">
        <!-- TITULAR -->
        <li class="title-menu">Menu</li>
        <!-- TITULAR -->
        <li><a href="<?php echo constant('URL')?>main"><span class="fa fa-home icon-menu"></span>Inicio</a></li>
        <li><a href="<?php echo constant('URL')?>usuarios"><span class="fa fa-users icon-menu"></span>Gestionar Usuarios</a></li>
        
        <li class="item-submenu" menu="1">
        <a href="#"><span class="fa fa-address-card icon-menu"></span>Gestionar Trabajadores</a>
          <ul class="submenu">
            <li class="title-menu"><span class="fa fa-address-card icon-menu"></span>Gestionar Trabajadores</li>
            <li class="go-back">Atras</li>

            <li><a href="<?php echo constant('URL')?>trabajadores">Gestionar Trabajador</a></li>
            <li><a href="<?php echo constant('URL')?>cargo">Gestionar Cargos</a></li>
            <li><a href="<?php echo constant('URL')?>permiso">Inasistencias</a></li>
          </ul>
        </li>

        <li class="item-submenu" menu="2">
        <a href="#"><span class="fa fa-sticky-note icon-menu"></span>Gestionar Recibos</a>
          <ul class="submenu">
            <li class="title-menu"><span class="fa fa-sticky-note icon-menu"></span>Tipos de Recibos</li>
            <li class="go-back">Atras</li>

            <li><a href="<?php echo constant('URL')?>nominas">Nominas</a></li>
            <li><a href="<?php echo constant('URL')?>bonos">Bonos</a></li>
            <li><a href="<?php echo constant('URL')?>trabajos_extras">Trabajos Extras</a></li>
          </ul>
        </li>
        <!-- <li><a href="#"><span class="fa fa-clone icon-menu"></span>Gestionar Egresos</a></li>
        --> 
        <li class="item-submenu" menu="3">
          <a href="#"><span class="fa fa-database icon-menu"></span>Seguridad</a>
          <ul class="submenu">
            <li class="title-menu"><span class="fa fa-database icon-menu"></span>Seguridad</li>
            <li class="go-back">Atras</li>

            <li><a href="<?php echo constant('URL')?>bitacora">Bitacora</a></li>
            <li><a href="<?php echo constant('URL')?>roles">Roles y permisos</a></li>
            <li><a href="<?php echo constant('URL')?>backup">Respaldar Base de Datos</a></li>
          </ul>
        </li>

        <li><a href="<?php echo constant('URL')?>reportes"><span class="fa fa-file-pdf-o icon-menu"></span>Reportes</a></li>
      </ul>
    </nav>
  </section>
<script src="<?= constant('URL')?>controllers/source/reportes/graficos/code/highcharts.js"></script>
<script src="<?= constant('URL')?>controllers/source/reportes/graficos/code/highcharts-3d.js"></script>
<script src="<?= constant('URL')?>controllers/source/reportes/graficos/code/modules/exporting.js"></script>
<script src="<?= constant('URL')?>controllers/source/reportes/graficos/code/modules/export-data.js"></script>
<script src="<?= constant('URL')?>controllers/source/reportes/graficos/code/modules/accessibility.js"></script>

<div class="container">
<div class="text-header">
            <h2>Reportes estadisticos</h2> 
        </div>
    <main> 
        <div class="tabla">
            <div>
                <table>
                    <div class="bottom">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ayuda">Ayuda</button>
                        <a href="<?php echo constant('URL')?>reportes/consulta_inasistencia">Volver</a>
                    </div> 
                </table>
            </div>
        <?php 
            $desde    = ($_POST['desde'] !== "") ? $_POST['desde'] : NULL;
            $hasta    = ($_POST['hasta'] !== "") ? $_POST['hasta'] : NULL;
            $descripcion    = ($_POST['descripcion'] !== "") ? $_POST['descripcion'] : NULL;
        ?>  
            
<figure class="highcharts-figure">
    <div id="container"></div>
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
        text: '<?php echo $descripcion?> de los trabajadores <br> <?php echo "Desde: ". $desde?> <br> <?php echo "Hasta: ". $hasta?>'
    },

    xAxis: {
        categories: [<?php
                        $trabajadores = $this->model->trabajadores->get();
                        foreach ($trabajadores as $row){
                            ?>
                      ['Inasistecias'], 

                      <?php } ?>]
        ,
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
            text: 'Cantidad',
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

    series: [
    <?php 
        $trabajadores = $this->model->trabajadores->get();
        $i = 0;
        foreach ($trabajadores as $row) {
        $i = $i + 1;
        $id = $row->getCedula();
        $cantidad = $this->model->permiso->getCantidad($id, $descripcion, $desde, $hasta);
    ?>
    {
        name: '<?php echo $row->getNombre() .' '. $row->getApellido()?>',
        data: [<?php echo $cantidad?>],
        stack: '<?php echo $i?>'
    },
    
    <?php }?>
    ]
});

        </script>
        </div> 

<div class="modal fade" id="ayuda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      </div>
      <div class="modal-body">
        <h4 class="modal-title" id="myModalLabel">Ayuda de usuario</h4>
        Reporte estadistico de las inasistencia de todos los trabajadores activos en el sistema.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div> 

    </main>
</div>
 <script src="<?php echo constant('URL')?>public/js/jquery-3.2.1.js"></script>
  <script src="<?php echo constant('URL')?>public/js/main.js"></script>
   <script src="<?php echo constant('URL')?>public/js/AJAX/eliminar.js"></script>
   <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
