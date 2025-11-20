    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= media(); ?>/images/avatar.png" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">John Doe</p>
          <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="<?= base_url(); ?>/dashboard"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Configuración</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= base_url(); ?>parametros"><i class="icon fa fa-circle-o"></i> Parámetros</a></li>
            <li><a class="treeview-item" href="<?= base_url(); ?>roles"><i class="icon fa fa-circle-o"></i> Roles</a></li>
            <li><a class="treeview-item" href="<?= base_url(); ?>usuarios"><i class="app-menu__icon fa fa-users aria-hiden='true'"></i> Usuarios</a></li>
            <li><a class="treeview-item" href="<?= base_url(); ?>permisos"><i class="icon fa fa-circle-o"></i> Permisos</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Contratación</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= base_url(); ?>centros"><i class="icon fa fa-circle-o"></i> Centros Bienestar</a></li>
            <li><a class="treeview-item" href="<?= base_url(); ?>cargos"><i class="icon fa fa-circle-o"></i> Cargos</a></li>
            <li><a class="treeview-item" href="<?= base_url(); ?>postulados"><i class="icon fa fa-circle-o"></i> Postulaciones</a></li>
          </ul>
        </li>

        <li><a class="app-menu__item" href="<?= base_url(); ?>logout"><i class="app-menu__icon fa fa-sign-out"></i><span class="app-menu__label">Salir</span></a></li>
      </ul>
    </aside>