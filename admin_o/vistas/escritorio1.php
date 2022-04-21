<?php
  //Activamos el almacenamiento en el buffer
  ob_start();
  session_start();

  if (!isset($_SESSION["nombre"])){
    header("Location: index.php");
  }else{ ?>

    <!DOCTYPE html>
    <html lang="es">
      <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Admin Sevens | Escritorio</title>

        <?php $title = "Escritorio"; require 'head.php'; ?>
      </head>
      <body class="hold-transition sidebar-mini sidebar-collapse layout-fixed layout-navbar-fixed ">
        
        <div class="wrapper">
          <!-- Preloader -->
          <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../dist/svg/logo-principal.svg" alt="AdminLTELogo" width="360" />
          </div>
        
          <?php
            require 'nav.php';
            require 'aside.php';
            if ($_SESSION['sistema_informativo']==1){
              //require 'enmantenimiento.php';
              ?>           
              <!--Contenido-->
                <!--CONTENIDOOOOOOOOOOOOOOOOOOOOOOOOOOOO-->
              <!--Fin-Contenido-->
              <?php
            }else{
              require 'noacceso.php';
            }
            require 'footer.php';
          ?>

        </div>

        <?php require 'script.php'; ?>

        <script type="text/javascript" src="scripts/proyecto.js"></script>

        <script>
          $(function () { $('[data-toggle="tooltip"]').tooltip(); });
        </script>

        <?php require 'extra_script.php'; ?>
        
      </body>
    </html>
    
    <?php    
  }
  ob_end_flush();
?>
