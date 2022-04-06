<?php

ob_start();

if (strlen(session_id()) < 1) {
  session_start(); //Validamos si existe o no la sesión
}

if (!isset($_SESSION["nombre"])) {
  header("Location: ../vistas/login.html"); //Validamos el acceso solo a los usuarios logueados al sistema.
} else {
  //Validamos el acceso solo al usuario logueado y autorizado.
  if ($_SESSION['escritorio'] == 1) {

    require_once "../modelos/Proyecto.php";

    $valores = new Proyecto();

    $idvalores = isset($_POST["idvalores"]) ? limpiarCadena($_POST["idvalores"]) : "";
    $nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
    $descripcion = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";
  
    $foto2 = isset($_POST["doc1"]) ? limpiarCadena($_POST["doc1"]) : "";

    switch ($_GET["op"]) {
      case 'guardaryeditar':

            if (!file_exists($_FILES['doc1']['tmp_name']) || !is_uploaded_file($_FILES['doc1']['tmp_name'])) {
              $imagen_perfil = $_POST["doc_old_1"];
              $flat_img = false;
            } else {
              $ext1 = explode(".", $_FILES["doc1"]["name"]);
              $flat_img = true;

              $imagen_perfil = rand(0, 20) . round(microtime(true)) . rand(21, 41) . '.' . end($ext1);

              move_uploaded_file($_FILES["doc1"]["tmp_name"], "../dist/img/valores/imagen_perfil/" . $imagen_perfil);
            }

            if (empty($idvalores)) {
              //var_dump($idproyecto,$idproveedor);
              $rspta = $valores->insertar($nombre,$descripcion,$imagen_perfil);
              echo $rspta ? "ok" : "No se pudieron registrar todos los datos";
            } else {
              //validamos si existe comprobante para eliminarlo
              if ($flat_img == true) {

                $datos_ficha1 = $valores->reg_img($idvalores);

                if ( $datos_ficha1['status'] ) {
          
                  $ficha1_ant = $datos_ficha1['data']['img_perfil'];
            
                  if ($ficha1_ant != "") {

                    unlink("../dist/img/valores/imagen_perfil/" . $ficha1_ant);
                  }

                }

              }

              $rspta = $valores->editar($idvalores,$nombre,$descripcion,$imagen_perfil);
              //var_dump($idvalores,$idproveedor);
              echo $rspta ? "ok" : "No se pudo actualizar";
            }
        break;

        case 'eliminar':
            $rspta = $valores->eliminar($idvalores);
            echo $rspta ? " Eliminado" : "No se puede Eliminar";
            //Fin de las validaciones de acceso
        break;

        case 'mostrar_valor':
            $rspta = $valores->mostrar($idvalores);
            //Codificar el resultado utilizando json
            echo json_encode($rspta, true);
            //Fin de las validaciones de acceso
        break;
      case 'verdatos':
        if (!isset($_SESSION["nombre"])) {
          header("Location: ../vistas/login.html"); //Validamos el acceso solo a los materials logueados al sistema.
        } else {
          //Validamos el acceso solo al material logueado y autorizado.
          if ($_SESSION['viatico'] == 1) {
            //$idvalores='1';
            $rspta = $valores->verdatos($idvalores);
            //Codificar el resultado utilizando json
            echo json_encode($rspta);
            //Fin de las validaciones de acceso
          } else {
            require 'noacceso.php';
          }
        }
      break;


      case 'listar':

          $rspta = $valores->listar();
          //Vamos a declarar un array
          $data = [];
          $comprobante = '';
          $cont = 1;
          $imagen_error = "this.src='../dist/svg/defaul_valor.png'";
          if ($rspta['status']) {

            while ($reg = $rspta['data']->fetch_object()) {

              $data[] = [
                "0" => '<button class="btn btn-warning btn-xs" onclick="mostrar(' .$reg->idvalores .')" style="margin-top: 25%;"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-xs" onclick="eliminar(' .$reg->idvalores .')" style="margin-top: 25%;"><i class="far fa-trash-alt"></i></button>',
                "1" =>  '<div class="row">
                          <div class="col-lg-5 p-0">
                            <div class="d-none d-lg-block text-center ">
                              <div class="avatar avatar-xl avatar-circle">
                                <img class="avatar-img" src="../dist/img/valores/imagen_perfil/'. $reg->img_perfil .'" alt="Image Description" onerror="'.$imagen_error.'">
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-7 p-0" style="margin-top: 15%;">
                            <h4 class="card-text">'. $reg->nombre_valor .'</h4>
                          </div>
                        </div>',
                "2" =>'<textarea cols="30" rows="3" class="textarea_datatable" readonly="">' . $reg->descripcion . '</textarea>'
              ];
            }
            $results = [
              "sEcho" => 1, //Información para el datatables
              "iTotalRecords" => count($data), //enviamos el total registros al datatable
              "iTotalDisplayRecords" => 1, //enviamos el total registros a visualizar
              "data" => $data,
            ];
            echo json_encode($results,true);

          } else {
            echo $rspta['code_error'] .' - '. $rspta['message'] .' '. $rspta['data'];
          }

      break;

      case 'select2_proyecto':

        $rspta =  $valores->select2_proyecto();

        foreach ($rspta as $key => $reg) {
          echo '<option value=' . $reg['idproyecto'] . '>' . $reg['codigo_proyecto']  . '</option>';
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
