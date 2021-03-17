<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Neo</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
</head>

<?php
  //Para iniciar sesion con el usuario logueado
  session_start();
  if(!isset($_SESSION["usuario"])){
      header("Location:../neo/app/vistas/Login/login.php");
  }
  else{
      $srv_archivo_actual = basename($_SERVER["REQUEST_URI"]);
  
      if(strtolower($srv_archivo_actual)=='neo'){
          header("Location:../neo/public");
      }
  }
?>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-slide="true" href="../app/vistas/Login/logout.php" role="button">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/Unheval.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">UNHEVAL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!--<div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>-->
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION["nombre"] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="../app/vistas/cursos/index.php" class="nav-link" target="base">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Cursos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../app/vistas/LabDocente/index.php" class="nav-link" target="base">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                MenuDocente
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../app/vistas/Docentes/index.php" class="nav-link" target="base">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                DocentesCrud
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../app/vistas/Tecnicos/index.php" class="nav-link" target="base">
              <i class="nav-icon fas fa-user-shield"></i>
              <p>
                TecnicosCrud
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../app/vistas/Estudiantes/index.php" class="nav-link" target="base">
              <i class="nav-icon fas fa-id-card"></i>
              <p>
                EstudiantesCrud
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../app/vistas/LabTecnico/ver_mantenimiento.php" class="nav-link" target="base">
              <i class="nav-icon fas fa-ambulance"></i>
              <p>
                Mantenimiento<span class="badge badge-danger right"><?php echo $_SESSION["mant_pendientes"] ?></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../app/vistas/LabTecnico/ver_equipo_index.php" class="nav-link" target="base">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Inventario
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../app/vistas/LabTecnico/ver_software_index.php" class="nav-link" target="base">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Software
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../app/vistas/LabTecnico/ver_horario_index.php" class="nav-link" target="base">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Horario
              </p>
            </a>
          </li>
          <!--<li class="nav-item">
            <a href="public/pages/calendar2.html" class="nav-link" target="base">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="app/vistas/cursos/jsgrid.html" class="nav-link" target="base">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="public/pages/mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="public/pages/mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="public/pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>-->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">
    <br>
    <section>
      <div class="container-fluid">
        <iframe src="" name="base" width="100%" height="90%" style="border-width: 0px; height: 780px;" scrolling="auto"></iframe>
      </div>
    </section>
  </div>
</div>

      <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
</body>
</html>