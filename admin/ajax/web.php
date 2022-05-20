<?php
    require_once "../modelos/Servicios.php";
    require_once "../modelos/Valores.php";
    require_once "../modelos/Contacto.php";
    require_once "../modelos/Proyecto.php";
    require_once "../modelos/Proveedores.php";



    $servicios = new Servicios();
    $valores = new Valores();
    $contacto=new Contacto();
    $proyecto = new Proyecto();
    $proveedores = new Proveedores();

    switch ($_GET["op"]) {

      //Vistas servicios web
      case 'listar_servicios_web':
        $rspta = $servicios->listar_serv_web();
        echo json_encode($rspta, true);
      break;

      //listar servicios web footer
      case 'listar_ser_web_f':
        $rspta = $servicios->listar_serv_web_f();
        echo json_encode($rspta, true);
      break;

      //Listar valores
      case 'listar_valores_web':
        $rspta = $valores->listar_v_web();
        echo json_encode($rspta, true);
      break;
      
      //Listar los 4 ultimos valores
      case 'listar_v_foot_web':
        $rspta = $valores->listar_v_foot_web();
        echo json_encode($rspta, true);
      break;
      
      // datos generales
      case 'datos_generales':
        $rspta=$contacto->mostrar();
        echo json_encode($rspta);		
      break;

      //Listar proyectos
      case 'listar_proyecto_web':
        $rspta = $proyecto->listar_proyecto_web();
        echo json_encode($rspta, true);
      break;

      //detalle_proyecto_web
      case 'detalle_proyecto_web':
        $rspta = $proyecto->detalle_proyecto_web($_POST['idproyecto'], $_POST['opcion']);
        echo json_encode($rspta, true);
      break;

      //Listar proveedores
      case 'listar_proveedores_web':
        $rspta = $proveedores->listar_proveedores_web();
        echo json_encode($rspta, true);
      break;
     

    }


?>
