<div class="sidebar">
    <div class="logo_details">
      <div class="logo_name"><?php echo $_SESSION['usuario']['nombre'];?></div>
      <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="dashboard.php">
          <i class="bx bx-grid-alt"></i>
            <span class="link_name">Menu</span>
        </a>
        <span class="tooltip">Menu</span>
      </li>
      <?php if($_SESSION['usuario']['rol'] == 1) {?>
      
      <?php } else if($_SESSION['usuario']['rol'] == 3){?>
      <li>
        <a href="alumnos.php">
          <i class="bx bx-user"></i>
          <span class="link_name">Alumnos</span>
        </a>
        <span class="tooltip">Alumnos</span>
      </li>
      <li>
        <a href="acudientes.php">
          <i class='bx bxs-user-rectangle'></i>
          <span class="link_name">Acudientes</span>
        </a>
        <span class="tooltip">Acudientes</span>
      </li>
      <li>
        <a href="empleados.php">
          <i class='bx bxs-user-account'></i>
          <span class="link_name">Empleados</span>
        </a>
        <span class="tooltip">Empleados</span>
      </li>
      <li>
        <a href="solicitudes.php">
          <i class='bx bxs-copy-alt'></i>
          <span class="link_name">Solicitudes</span>
        </a>
        <span class="tooltip">Solicitudes</span>
      </li>
      <li>
        <a href="grados.php">
          <i class='bx bx-chalkboard'></i>
          <span class="link_name">Grados</span>
        </a>
        <span class="tooltip">Grados</span>
      </li>
      <li>
        <a href="productos.php">
          <i class="bx bx-pie-chart-alt-2"></i>
          <span class="link_name">Productos</span>
        </a>
        <span class="tooltip">Productos</span>
      </li>
      <li>
        <a href="reportes.php">
          <i class="bx bx-folder"></i>
          <span class="link_name">Reportes</span>
        </a>
        <span class="tooltip">Reportes</span>
      </li>
      <?php } else if($_SESSION['usuario']['rol'] == 4){?>
      <li>
        <a href="inicio.php">
          <i class='bx bx-home-alt-2'></i>
          <span class="link_name">Inicio</span>
        </a>
        <span class="tooltip">Inicio</span>
      </li>
        <li>
        <a href="alumnos.php">
          <i class="bx bx-user"></i>
          <span class="link_name">Alumnos</span>
        </a>
        <span class="tooltip">Alumnos</span>
      </li>
      <li>
        <a href="acudientes.php">
          <i class='bx bxs-user-rectangle'></i>
          <span class="link_name">Acudientes</span>
        </a>
        <span class="tooltip">Acudientes</span>
      </li>
      <li>
        <a href="empleados.php">
          <i class='bx bxs-user-account'></i>
          <span class="link_name">Empleados</span>
        </a>
        <span class="tooltip">Empleados</span>
      </li>
      <li>
        <a href="solicitudes.php">
          <i class='bx bxs-copy-alt'></i>
          <span class="link_name">Solicitudes</span>
        </a>
        <span class="tooltip">Solicitudes</span>
      </li>
      <li>
        <a href="grados.php">
          <i class='bx bx-chalkboard'></i>
          <span class="link_name">Grados</span>
        </a>
        <span class="tooltip">Grados</span>
      </li>
      <li>
        <a href="productos.php">
        <i class='bx bxl-product-hunt' ></i>
          <span class="link_name">Productos</span>
        </a>
        <span class="tooltip">Productos</span>
      </li>
      <li>
        <a href="usuarios.php">
          <i class='bx bx-user-circle'></i>
          <span class="link_name">Usuarios</span>
        </a>
        <span class="tooltip">Usuarios</span>
      </li>
      <li>
        <a href="informes.php">
        <i class='bx bxs-file-doc'></i>
          <span class="link_name">Informes</span>
        </a>
        <span class="tooltip">Informes</span>
      </li>
      <li>
        <a href="estadisticas.php">
          <i class="bx bx-pie-chart-alt-2"></i>
          <span class="link_name">Estadisticas</span>
        </a>
        <span class="tooltip">Estadisticas</span>
      </li>
      <li>
        <a href="config.php">
        <i class='bx bx-cog' ></i>
          <span class="link_name">Configuracion</span>
        </a>
        <span class="tooltip">Configuracion</span>
      </li>
      <?php } ?>
      <li class="profile">
        <a href="../controlador/usuarios/salir.php">
          <i class="bx bx-log-out" id="log_out"></i>
        </a>
      </li>
    </ul>
</div>
