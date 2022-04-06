<?php
  ob_start();
  if (strlen(session_id()) < 1) {
    session_start(); //Validamos si existe o no la sesión
  }

  switch ($_GET["op"]) {

    case 'verificar':

      require_once "../modelos/Usuario.php";
      $usuario = new Usuario(); 

      $logina = $_POST['logina'];
      $clavea = $_POST['clavea'];

      //Hash SHA256 en la contraseña
      $clavehash = hash("SHA256", $clavea);

      $rspta = $usuario->verificar($logina, $clavehash);   //$fetch = $rspta->fetch_object();

      if ( $rspta['status'] ) {
        if ( !empty($rspta['data']) ) {
          //Declaramos las variables de sesión
          $_SESSION['idusuario'] = $rspta['data']['idusuario'];
          $_SESSION['nombre'] = $rspta['data']['nombres'];
          $_SESSION['imagen'] = $rspta['data']['imagen_perfil'];
          $_SESSION['login'] = $rspta['data']['login'];
          $_SESSION['cargo'] = $rspta['data']['cargo'];
          $_SESSION['tipo_documento'] = $rspta['data']['tipo_documento'];
          $_SESSION['num_documento'] = $rspta['data']['numero_documento'];
          $_SESSION['telefono'] = $rspta['data']['telefono'];
          $_SESSION['email'] = $rspta['data']['email'];

          //Obtenemos los permisos del usuario
          $marcados = $usuario->listarmarcados($rspta['data']['idusuario']);
          
          //Declaramos el array para almacenar todos los permisos marcados
          $valores = [];

          if ($rspta['status']) {
            //Almacenamos los permisos marcados en el array
            foreach ($marcados['data'] as $key => $value) {
              array_push($valores, $value['idpermiso']);
            }
            echo json_encode($rspta);
          }else{
            echo json_encode($marcados);
          }       

          //Determinamos los accesos del usuario
          in_array(1, $valores) ? ($_SESSION['escritorio'] = 1)       : ($_SESSION['escritorio'] = 0);
          in_array(2, $valores) ? ($_SESSION['acceso'] = 1)           : ($_SESSION['acceso'] = 0);
          in_array(3, $valores) ? ($_SESSION['recurso'] = 1)          : ($_SESSION['recurso'] = 0);
          in_array(4, $valores) ? ($_SESSION['valorizacion'] = 1)     : ($_SESSION['valorizacion'] = 0);
          in_array(5, $valores) ? ($_SESSION['trabajador'] = 1)       : ($_SESSION['trabajador'] = 0);
          in_array(6, $valores) ? ($_SESSION['asistencia_obrero'] = 1): ($_SESSION['asistencia_obrero'] = 0);
          in_array(7, $valores) ? ($_SESSION['pago_trabajador'] = 1)  : ($_SESSION['pago_trabajador'] = 0);
          in_array(8, $valores) ? ($_SESSION['compra_insumos'] = 1)   : ($_SESSION['compra_insumos'] = 0);
          in_array(9, $valores) ? ($_SESSION['servicio_maquina'] = 1) : ($_SESSION['servicio_maquina'] = 0);
          in_array(10, $valores) ? ($_SESSION['servicio_equipo'] = 1) : ($_SESSION['servicio_equipo'] = 0);
          in_array(11, $valores) ? ($_SESSION['calendario'] = 1)      : ($_SESSION['calendario'] = 0);
          in_array(12, $valores) ? ($_SESSION['plano_otro'] = 1)      : ($_SESSION['plano_otro'] = 0);
          in_array(13, $valores) ? ($_SESSION['viatico'] = 1)         : ($_SESSION['viatico'] = 0);
          in_array(14, $valores) ? ($_SESSION['planilla_seguro'] = 1) : ($_SESSION['planilla_seguro'] = 0);
          in_array(15, $valores) ? ($_SESSION['otro_gasto'] = 1)      : ($_SESSION['otro_gasto'] = 0);
          in_array(16, $valores) ? ($_SESSION['resumen_general'] = 1) : ($_SESSION['resumen_general'] = 0);
          in_array(17, $valores) ? ($_SESSION['compra_activo_fijo'] = 1) : ($_SESSION['compra_activo_fijo'] = 0);
          in_array(18, $valores) ? ($_SESSION['resumen_activo_fijo_general'] = 1) : ($_SESSION['resumen_activo_fijo_general'] = 0);
          in_array(19, $valores) ? ($_SESSION['otra_factura'] = 1)    : ($_SESSION['otra_factura'] = 0);
          in_array(20, $valores) ? ($_SESSION['resumen_factura'] = 1) : ($_SESSION['resumen_factura'] = 0);
          in_array(21, $valores) ? ($_SESSION['papelera'] = 1)        : ($_SESSION['papelera'] = 0);
          in_array(22, $valores) ? ($_SESSION['subcontrato'] = 1)     : ($_SESSION['subcontrato'] = 0);
          in_array(23, $valores) ? ($_SESSION['resumen_recibo_por_honorario'] = 1) : ($_SESSION['resumen_recibo_por_honorario'] = 0);
          in_array(24, $valores) ? ($_SESSION['otro_ingreso'] = 1)    : ($_SESSION['otro_ingreso'] = 0);

        } else {
          echo json_encode($rspta, true);
        }
      }else{
        echo json_encode($rspta, true);
      }
      
    break;
    
    case 'salir':
      //Limpiamos las variables de sesión
      session_unset();
      //Destruìmos la sesión
      session_destroy();
      //Redireccionamos al login
      header("Location: ../index.php");

    break;
    
  }
    
  function multiplo_number($numero, $multiplo) {  
    
    if($numero%$multiplo == 0){
      return true;
    }else{
      return false;
    }
    
  }

  function quitar_guion($numero){ return str_replace("-", "", $numero); } 

  ob_end_flush();
?>
