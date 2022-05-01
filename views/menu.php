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