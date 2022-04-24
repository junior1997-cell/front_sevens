  <?php 

    // $link_host = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].'/';
    $link_host="http://admin.sevensingenieros.com/dist/docs/all_trabajador/perfil/";

    // if ($_SERVER['HTTP_HOST']=="localhost") {
    //   $link_host="http://localhost/admin_sevens/dist/docs/all_trabajador/perfil/";
    // }else{
    //   $link_host="http://admin.sevensingenieros.com/dist/docs/all_trabajador/perfil/";
    // }
  
  ?> 
  <!-- Navbar -->
  <div class="navbar-expand-lg navbar-expand-lg-collapse-block navbar-light">
    <div id="sidebarNav" class="collapse navbar-collapse navbar-vertical">
      <!-- Card -->
      <div class="card mb-5">
        <div class="card-body">
          <!-- Avatar -->
          <div class="d-none d-lg-block text-center mb-5">
            <div class="avatar avatar-xxl avatar-circle mb-3">
              <img class="avatar-img" src=" <?php  echo $link_host.$_SESSION['imagen'];?>" onerror="this.src='../assets/svg/default/user_default.svg'" alt="Image Description" />
              <img class="avatar-status avatar-lg-status" src="../assets/svg/illustrations/top-vendor.svg" alt="Image Description" data-toggle="tooltip" data-placement="top" title="Verified user" />
            </div>

            <h4 class="card-title"><?php  echo $_SESSION['nombre'];?></h4>
            <p class="card-text font-size-1"><?php  echo $_SESSION['email'];?></p>
          </div>
          <!-- End Avatar -->

          <!-- Nav -->
          <h6 class="text-cap small">Empresa</h6>

          <?php if ($_SESSION['sistema_informativo']==1) {  ?>
            <!-- List -->
            <ul class="nav nav-sub nav-sm nav-tabs nav-list-y-2 mb-4">
              <li class="nav-item">
                <a class="nav-link mdatos_generales" href="datos_generales.php"> <i class="fas fa-id-card nav-icon"></i> Datos Generales </a>
              </li>
              <li class="nav-item">
                <a class="nav-link mvision_vision" href="mision_vision.php"> <i class="fa fa-bullseye nav-icon"></i> Misión y Visión </a>
              </li>
              <li class="nav-item">
                <a class="nav-link mceo_resena" href="ceo_resenia.php"> <i class="fas fa-shield-alt nav-icon"></i>CEO - Reseña </a>
              </li>
              <li class="nav-item">
                <a class="nav-link mvalores" href="valores.php"> <i class="fas fa-sliders-h nav-icon"></i> Valores </a>
              </li>
            </ul>
            <!-- End List -->
          <?php  }  ?>

          <h6 class="text-cap small">Servicios</h6>

          <?php if ($_SESSION['sistema_informativo']==1) {  ?>
            <!-- List -->
            <ul class="nav nav-sub nav-sm nav-tabs nav-list-y-2 mb-4">
              <li class="nav-item">
                <a class="nav-link mservicios" href="servicio.php"> <i class="fas fa-shopping-basket nav-icon"></i> Servicios </a>
              </li>
            </ul>
            <!-- End List -->
          <?php  }  ?>

          <h6 class="text-cap small">Proyectos y proveedores</h6>

          <?php if ($_SESSION['sistema_informativo']==1) {  ?>
            <!-- List -->
            <ul class="nav nav-sub nav-sm nav-tabs nav-list-y-2 mb-4">
              <li class="nav-item">
                <a class="nav-link mproyectos" href="proyecto.php"> <i class="fas fa-th nav-icon"></i> Proyectos </a>
              </li>
              <li class="nav-item">
                <a class="nav-link mproveedores" href="proveedores.php"> <i class="fas fa-truck nav-icon"></i> Proveedores </a>
              </li>
            </ul>
            <!-- End List -->
          <?php  }  ?>

          <h6 class="text-cap small">Usuarios</h6>
          <?php if ($_SESSION['sistema_informativo']==1) {  ?>
            <!-- List -->
            <ul class="nav nav-sub nav-sm nav-tabs nav-list-y-2 mb-4">
              <li class="nav-item">
                <a class="nav-link musuarios" href="usuario.php"> <i class="fas fa-users-cog nav-icon"></i> Usuarios </a>
              </li>
            </ul>
            <!-- End List -->
          <?php  }  ?>
          <!-- End Nav -->
        </div>
      </div>
      <!-- End Card -->
    </div>
  </div>
  <!-- End Navbar -->
