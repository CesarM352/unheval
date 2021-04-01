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
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Neo</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
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
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button" data-toggle='tooltip' data-placement='top' title='Maximizar'>
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-slide="true" href="../app/vistas/Login/logout.php" role="button" data-toggle='tooltip' data-placement='top' title='Salir'>
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index.php" class="brand-link">
      <img src="dist/img/Unheval.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">UNHEVAL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
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
          
          <?php
            //Presentación de los menus según el perfil del usuario
            if($_SESSION["perfil_id"]=='1'){ //Administrador
          ?>
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
                  Docentes
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../app/vistas/Tecnicos/index.php" class="nav-link" target="base">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>
                  Tecnicos
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../app/vistas/Estudiantes/index.php" class="nav-link" target="base">
                <i class="nav-icon fas fa-id-card"></i>
                <p>
                  Estudiantes
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../app/vistas/LabTecnico/ver_mantenimiento.php" class="nav-link" target="base">
                <i class="nav-icon fas fa-ambulance"></i>
                <p>
                  Mantenimiento<span class="badge badge-danger right" data-toggle='tooltip' data-placement='top' title='Pendientes'><?php echo $_SESSION["mant_pendientes"] ?></span>
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

          <?php }
            if($_SESSION["perfil_id"]=='2'){ // Docente
          ?>

            <li class="nav-item">
              <a href="../app/vistas/LabDocente/index.php" class="nav-link" target="base">
                <i class="nav-icon fas fa-ellipsis-v"></i>
                <p>
                  Menu
                </p>
              </a>
            </li>

          <?php } 
            if($_SESSION["perfil_id"]=='3'){ //Técnico
          ?>
              <li class="nav-item">
              <a href="../app/vistas/LabTecnico/ver_mantenimiento.php" class="nav-link" target="base">
                <i class="nav-icon fas fa-ambulance"></i>
                <p>
                  Mantenimiento<span class="badge badge-danger right" data-toggle='tooltip' data-placement='rigth' title='Pendientes'><?php echo $_SESSION["mant_pendientes"] ?></span>
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

          <?php } 
            if($_SESSION["perfil_id"]=='4'){ //Estudiante
          ?>
              <li class="nav-item">
                <a href="../app/vistas/LabEstudiante/registrar_asistencia.php" class="nav-link" target="base">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>
                    Registrar asistencia
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../app/vistas/LabEstudiante/registrar_problema.php" class="nav-link" target="base">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>
                    Registrar Problemas
                  </p>
                </a>
              </li>
          <?php } 
            if($_SESSION["perfil_id"]=='5'){ //Secretaria
          ?>
              <li class="nav-item">
                <a href="../app/vistas/LabSecretaria/ver_horario_index.php" class="nav-link" target="base">
                  <i class="nav-icon fas fa-calendar-alt"></i>
                  <p>
                    Ver horarios
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../app/vistas/LabSecretaria/ver_software_index.php" class="nav-link" target="base">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Ver software
                  </p>
                </a>
              </li>
          <?php } ?>
        </ul>
      </nav>
    </div>
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
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <script>$.widget.bridge('uibutton', $.ui.button)</script>
  <script src="plugins/bootstrap/js/bootstrap.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="dist/js/adminlte.js"></script>
  <script src="dist/js/demo.js"></script>
  <script>
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})
	</script>
</body>
</html>