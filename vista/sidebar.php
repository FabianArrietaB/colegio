<div class="sidebar">
    <div class="logo_details">
      <div class="logo_name"><?php echo $_SESSION['usuario']['nombre'];?></div>
      <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="inicio.php">
          <i class="bx bx-grid-alt"></i>
          <span class="link_name">Inicio</span>
        </a>
        <span class="tooltip">Inicio</span>
      </li>
      <?php if($_SESSION['usuario']['rol'] == 1) {?>
        <li>
        <a href="alumnos.php">
          <i class="bx bx-user"></i>
          <span class="link_name">Alumnos</span>
        </a>
        <span class="tooltip">Alumnos</span>
      </li>
      <?php } else if($_SESSION['usuario']['rol'] == 2){?>
        <li>
        <a href="alumnos.php">
          <i class="bx bx-user"></i>
          <span class="link_name">Alumnos</span>
        </a>
        <span class="tooltip">Alumnos</span>
      </li>
      <li>
        <a href="#">
          <i class="bx bx-chat"></i>
          <span class="link_name">Acudientes</span>
        </a>
        <span class="tooltip">Acudientes</span>
      </li>
      <li>
        <a href="#">
          <i class="bx bx-pie-chart-alt-2"></i>
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
        <a href="#">
          <i class="bx bx-folder"></i>
          <span class="link_name">Reportes</span>
        </a>
        <span class="tooltip">Reportes</span>
      </li>
      <?php } else if($_SESSION['usuario']['rol'] == 3){?>
      <li>
        <a href="alumnos.php">
          <i class="bx bx-user"></i>
          <span class="link_name">Alumnos</span>
        </a>
        <span class="tooltip">Alumnos</span>
      </li>
      <li>
        <a href="#">
          <i class="bx bx-chat"></i>
          <span class="link_name">Acudientes</span>
        </a>
        <span class="tooltip">Acudientes</span>
      </li>
      <li>
        <a href="#">
          <i class="bx bx-pie-chart-alt-2"></i>
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
        <a href="#">
          <i class="bx bx-folder"></i>
          <span class="link_name">Reportes</span>
        </a>
        <span class="tooltip">Reportes</span>
      </li>
      <li>
        <a href="#">
          <i class="bx bx-cart-alt"></i>
          <span class="link_name">Order</span>
        </a>
        <span class="tooltip">Order</span>
      </li>
      <li>
        <a href="usuarios.php">
          <i class="bx bx-cog"></i>
          <span class="link_name">Usuarios</span>
        </a>
        <span class="tooltip">Usuarios</span>
      </li>
      <?php } ?>
      <li class="profile">
        <a href="../controlador/usuarios/salir.php">
        <i class="bx bx-log-out" id="log_out"></i>
        </a>
      </li>
    </ul>
</div>
