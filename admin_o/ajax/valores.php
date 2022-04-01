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

    require_once "../modelos/Valores.php";

    $valores = new Valores();

    $idvalores = isset($_POST["idvalores"]) ? limpiarCadena($_POST["idvalores"]) : "";
    $nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
    $descripcion = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";
  
    $foto2 = isset($_POST["doc1"]) ? limpiarCadena($_POST["doc1"]) : "";

    switch ($_GET["op"]) {
      case 'guardaryeditar':

            if (!file_exists($_FILES['doc1']['tmp_name']) || !is_uploaded_file($_FILES['doc1']['tmp_name'])) {
              $imagen_perfil = $_POST["doc_old_1"];
              $flat_ficha1 = false;
            } else {
              $ext1 = explode(".", $_FILES["doc1"]["name"]);
              $flat_ficha1 = true;

              $imagen_perfil = rand(0, 20) . round(microtime(true)) . rand(21, 41) . '.' . end($ext1);

              move_uploaded_file($_FILES["doc1"]["tmp_name"], "../dist/img/valores/imagen_perfil/" . $imagen_perfil);
            }

            if (empty($idvalores)) {
              //var_dump($idproyecto,$idproveedor);
              $rspta = $valores->insertar($nombre,$descripcion,$imagen_perfil);
              echo $rspta ? "ok" : "No se pudieron registrar todos los datos";
            } else {
              //validamos si existe imagen_perfil para eliminarlo
              if ($flat_ficha1 == true) {
                $datos_ficha1 = $valores->ficha_tec($idvalores);

                $ficha1_ant = $datos_ficha1->fetch_object()->imagen_perfil;

                if ($ficha1_ant != "") {
                  unlink("../dist/img/valores/imagen_perfil/" . $ficha1_ant);
                }
              }

              $rspta = $valores->editar($idvalores,$nombre,$descripcion,$imagen_perfil);
              //var_dump($idvalores,$idproveedor);
              echo $rspta ? "ok" : "No se pudo actualizar";
            }
        break;

      case 'desactivar':
        if (!isset($_SESSION["nombre"])) {
          header("Location: ../vistas/login.html"); //Validamos el acceso solo a los materials logueados al sistema.
        } else {
          //Validamos el acceso solo al  logueado y autorizado.
          if ($_SESSION['viatico'] == 1) {
            $rspta = $valores->desactivar($idvalores);
            echo $rspta ? " Desactivado" : "No se puede desactivar";
            //Fin de las validaciones de acceso
          } else {
            require 'noacceso.php';
          }
        }
        break;

      case 'activar':
        if (!isset($_SESSION["nombre"])) {
          header("Location: ../vistas/login.html");
        } else {
          if ($_SESSION['viatico'] == 1) {
            $rspta = $valores->activar($idvalores);
            echo $rspta ? "Activado" : "No se puede activar";
            //Fin de las validaciones de acceso
          } else {
            require 'noacceso.php';
          }
        }
        break;

      case 'eliminar':
        if (!isset($_SESSION["nombre"])) {
          header("Location: ../vistas/login.html"); //Validamos el acceso solo a los materials logueados al sistema.
        } else {
          //Validamos el acceso solo al  logueado y autorizado.
          if ($_SESSION['viatico'] == 1) {
            $rspta = $valores->eliminar($idvalores);
            echo $rspta ? " Eliminado" : "No se puede Eliminar";
            //Fin de las validaciones de acceso
          } else {
            require 'noacceso.php';
          }
        }
        break;

      case 'mostrar':
        if (!isset($_SESSION["nombre"])) {
          header("Location: ../vistas/login.html"); //Validamos el acceso solo a logueados al sistema.
        } else {
          //Validamos el acceso solo al material logueado y autorizado.
          if ($_SESSION['viatico'] == 1) {
            //$idvalores='1';
            $rspta = $valores->mostrar($idvalores);
            //Codificar el resultado utilizando json
            echo json_encode($rspta);
            //Fin de las validaciones de acceso
          } else {
            require 'noacceso.php';
          }
        }
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
      case 'total':
        if (!isset($_SESSION["nombre"])) {
          header("Location: ../vistas/login.html"); //Validamos el acceso solo a los materials logueados al sistema.
        } else {
          //Validamos el acceso solo al material logueado y autorizado.
          if ($_SESSION['viatico'] == 1) {
            $rspta = $valores->total($idproyecto);
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
          while ($reg = $rspta->fetch_object()) {

            $data[] = [
              "0" => $cont++,
              "1" => '<button class="btn btn-warning btn-xs" onclick="mostrar(' .$reg->idvalores .')"><i class="fas fa-pencil-alt"></i></button>' .
                  ' <button class="btn btn-danger  btn-xs" onclick="eliminar(' .$reg->idvalores .')"><i class="fas fa-skull-crossbones"></i> </button>',
              "2" => $reg->nombre_valor,
              "3" => $reg->img_perfil,
              "4" => '<textarea cols="30" rows="1" class="textarea_datatable" readonly="">' . $reg->descripcion . '</textarea>'
            ];
          }
          $results = [
            "sEcho" => 1, //Información para el datatables
            "iTotalRecords" => count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords" => 1, //enviamos el total registros a visualizar
            "data" => $data,
          ];
          echo json_encode($results);

        break;

      case 'select2Proveedor':
        $rspta = $valores->select2_proveedor();

        while ($reg = $rspta->fetch_object()) {
          echo '<option value=' . $reg->idproveedor . '>' . $reg->razon_social . ' - ' . $reg->ruc . '</option>';
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
