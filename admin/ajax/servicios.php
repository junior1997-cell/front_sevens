<?php

ob_start();

if (strlen(session_id()) < 1) {
  session_start(); //Validamos si existe o no la sesión
}

if (!isset($_SESSION["nombre"])) {

  header("Location: ../vistas/login.html"); //Validamos el acceso solo a los usuarios logueados al sistema.

} else {
  
  if ($_SESSION['sistema_informativo'] == 1) {

    require_once "../modelos/Servicios.php";

    $servicios = new Servicios();
    
    date_default_timezone_set('America/Lima');
    $date_now = date("d-m-Y h.i.s A");

    $idservicio = isset($_POST["idservicio"]) ? limpiarCadena($_POST["idservicio"]) : "";
    $precio = isset($_POST["precio"]) ? limpiarCadena($_POST["precio"]) : "";
    $nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
    $descripcion = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";
    $caracteristicas = isset($_POST["caracteristicas"]) ? limpiarCadena($_POST["caracteristicas"]) : "";

    $foto2 = isset($_POST["doc1"]) ? limpiarCadena($_POST["doc1"]) : "";

    switch ($_GET["op"]) {

      case 'guardaryeditar':

        if (!file_exists($_FILES['doc1']['tmp_name']) || !is_uploaded_file($_FILES['doc1']['tmp_name'])) {

          $imagen_perfil = $_POST["doc_old_1"];

          $flat_img = false;

        } else {

          $ext1 = explode(".", $_FILES["doc1"]["name"]);

          $flat_img = true;

          $imagen_perfil = $date_now.' '.rand(0, 20) . round(microtime(true)) . rand(21, 41) . '.' . end($ext1);

          move_uploaded_file($_FILES["doc1"]["tmp_name"], "../dist/img/servicios/imagen_perfil/" . $imagen_perfil);

        }

        if (empty($idservicio)) {
          
          $rspta = $servicios->insertar($nombre, $precio, $descripcion, $caracteristicas, $imagen_perfil);
          echo json_encode($rspta, true);

        } else {
          
          if ($flat_img == true) {

            $datos_ficha1 = $servicios->reg_img($idservicio);

            if ($datos_ficha1['status']) {

              $ficha1_ant = $datos_ficha1['data']['img_perfil'];

              if ($ficha1_ant != "") {

                unlink("../dist/img/servicios/imagen_perfil/" . $ficha1_ant);
              }
            }
          }

          $rspta = $servicios->editar($idservicio, $nombre, $precio, $descripcion, $caracteristicas, $imagen_perfil);
          echo json_encode($rspta, true);

        }

      break;

      case 'eliminar':
        $rspta = $servicios->eliminar($idservicio);
        echo $rspta ? " Eliminado" : "No se puede Eliminar";
      break;

      case 'mostrar_servicio':
        $rspta = $servicios->mostrar($idservicio);
        echo json_encode($rspta, true);
      break;

      case 'listar':
        $rspta = $servicios->listar();

        $data = [];
        $comprobante = '';
        $cont = 1;
        $imagen_error = "this.src='../dist/svg/defaul_valor.png'";

        if ($rspta['status']) {

          while ($reg = $rspta['data']->fetch_object()) {
            $data[] = [
              "0" => '<button class="btn btn-warning btn-xs" onclick="mostrar(' . $reg->idservicio . ')"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-xs" onclick="eliminar(' . $reg->idservicio . ')"><i class="far fa-trash-alt"></i></button>',
              "1" =>  '<div class="d-flex align-items-center mx-auto">
                        <a onclick="ver_img_perfil(\'' . $reg->img_perfil . '\',\'' . $reg->nombre_servicio . '\')">
                          <div class="avatar avatar-circle">
                            <img class="avatar-img" src="../dist/img/servicios/imagen_perfil/'. $reg->img_perfil .'" alt="Image Description" onerror="'.$imagen_error.'">
                          </div>
                        </a>
                        <div class="ml-3">
                          <small style="font-size: 14px;font-weight: bold;">'. $reg->nombre_servicio .'</small>                          
                          <small class="text-muted">' . $reg->precio . '</small>
                        </div>
                      </div>',
              "2" => '<textarea cols="30" rows="3" class="textarea_datatable" readonly="" style="font-size: 12px;">' . $reg->descripcion . '</textarea>',
              "3" => '<button class="btn btn-info btn-xs" onclick="ver_caracteristicas(\'' . $reg->nombre_servicio . '\',\'' . $reg->caracteristicas . '\')"><i class="far fa-file-pdf fa-2x text-gray-50"></i></button>',
            ];
          }
          $results = [
            "sEcho" => 1, //Información para el datatables
            "iTotalRecords" => count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords" => 1, //enviamos el total registros a visualizar
            "data" => $data,
          ];
          echo json_encode($results, true);

        } else {
          echo $rspta['code_error'] . ' - ' . $rspta['message'] . ' ' . $rspta['data'];
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
  } else {
    require 'noacceso.php';
  }
}

ob_end_flush();

?>
