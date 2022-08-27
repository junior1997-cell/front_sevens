<?php
require_once "global_admin.php";
//require_once "global.php";
require "../config/funcion_general.php";

$conexion_adm = new mysqli(DB_HOST_A, DB_USERNAME_A, DB_PASSWORD_A, DB_NAME_A);

mysqli_query($conexion_adm, 'SET NAMES "' . DB_ENCODE_A . '"');

//Si tenemos un posible error en la conexión lo mostramos
if (mysqli_connect_errno()) {
  printf("Falló conexión a la base de datos: %s\n", mysqli_connect_error());
  exit();
}

if (!function_exists('ejecutarConsulta_admin')) {

  function ejecutarConsulta_admin($sql) {
    global $conexion_adm;
    $query = $conexion_adm->query($sql);
    if ($conexion_adm->error) {
      try {
        throw new Exception("MySQL error <b> $conexion_adm->error </b> Query:<br> $query", $conexion_adm->errno);
      } catch (Exception $e) {
        //echo "Error No: " . $e->getCode() . " - " . $e->getMessage() . "<br >"; echo nl2br($e->getTraceAsString());
        return array( 
          'status' => false, 
          'code_error' => $e->getCode(), 
          'message' => $e->getMessage(), 
          'data' => '<br><b>Rutas de errores:</b> <br>'.nl2br($e->getTraceAsString()),
        );          
      }
    } else {
      return array( 
        'status' => true, 
        'code_error' => $conexion_adm->errno, 
        'message' => 'Salió todo ok, en ejecutarConsulta_admin()', 
        'data' => $query, 
        'id_tabla' => $conexion_adm->insert_id,
        'affected_rows' => $conexion_adm->affected_rows,
        'sqlstate' => $conexion_adm->sqlstate,
        'field_count' => $conexion_adm->field_count,
        'warning_count' => $conexion_adm->warning_count, 
      );
    }
  }

  function ejecutarConsultaSimpleFila_admin($sql) {
    global $conexion_adm;
    $query = $conexion_adm->query($sql);
    if ($conexion_adm->error) {
      try {
        throw new Exception("MySQL error <b> $conexion_adm->error </b> Query:<br> $query", $conexion_adm->errno);
      } catch (Exception $e) {
        //echo "Error No: " . $e->getCode() . " - " . $e->getMessage() . "<br >"; echo nl2br($e->getTraceAsString());
        $data_errores = array( 
          'status' => false, 
          'code_error' => $e->getCode(), 
          'message' => $e->getMessage(), 
          'data' => '<br><b>Rutas de errores:</b> <br>'.nl2br($e->getTraceAsString()),
        );
        return $data_errores;
      }

    } else {
      $row = $query->fetch_assoc();
      return array( 
        'status' => true, 
        'code_error' => $conexion_adm->errno, 
        'message' => 'Salió todo ok, en ejecutarConsultaSimpleFila_admin()', 
        'data' => $row, 
        'id_tabla' => '',
        'affected_rows' => $conexion_adm->affected_rows,
        'sqlstate' => $conexion_adm->sqlstate,
        'field_count' => $conexion_adm->field_count,
        'warning_count' => $conexion_adm->warning_count, 
      );
    }
  }

  function ejecutarConsultaArray_admin($sql) {
    global $conexion_adm;  //$data= Array();	$i = 0;

    $query = $conexion_adm->query($sql);

    if ($conexion_adm->error) {
      try {
        throw new Exception("MySQL error <b> $conexion_adm->error </b> Query:<br> $query", $conexion_adm->errno);
      } catch (Exception $e) {
        //echo "Error No: " . $e->getCode() . " - " . $e->getMessage() . "<br >"; echo nl2br($e->getTraceAsString());
        return array( 
          'status' => false, 
          'code_error' => $e->getCode(), 
          'message' => $e->getMessage(), 
          'data' => '<br><b>Rutas de errores:</b> <br>'.nl2br($e->getTraceAsString()),
        );          
      }
    } else {
      for ($data = []; ($row = $query->fetch_assoc()); $data[] = $row);
      $data=array( 
        'status' => true, 
        'code_error' => $conexion_adm->errno, 
        'message' => 'Salió todo ok, en ejecutarConsultaArray_admin()', 
        'data' => $data, 
        'id_tabla' => '',
        'affected_rows' => $conexion_adm->affected_rows,
        'sqlstate' => $conexion_adm->sqlstate,
        'field_count' => $conexion_adm->field_count,
        'warning_count' => $conexion_adm->warning_count, 
      );
     //mysqli_close($conexion_adm);
      return $data ;

    }
  }

  function ejecutarConsulta_retornarID_admin($sql) {
    global $conexion_adm;
    $query = $conexion_adm->query($sql);
    if ($conexion_adm->error) {
      try {
        throw new Exception("MySQL error <b> $conexion_adm->error </b> Query:<br> $query", $conexion_adm->errno);
      } catch (Exception $e) {
        //echo "Error No: " . $e->getCode() . " - " . $e->getMessage() . "<br >"; echo nl2br($e->getTraceAsString());
        return array( 
          'status' => false, 
          'code_error' => $e->getCode(), 
          'message' => $e->getMessage(), 
          'data' => '<br><b>Rutas de errores:</b> <br>'.nl2br($e->getTraceAsString()),
        );          
      }
    } else {
      return  array( 
        'status' => true, 
        'code_error' => $conexion_adm->errno, 
        'message' => 'Salió todo ok, en ejecutarConsulta_retornarID_admin()', 
        'data' => $conexion_adm->insert_id, 
        'id_tabla' => $conexion_adm->insert_id,
        'affected_rows' => $conexion_adm->affected_rows,
        'sqlstate' => $conexion_adm->sqlstate,
        'field_count' => $conexion_adm->field_count,
        'warning_count' => $conexion_adm->warning_count, 
      );
    }
  }

  function limpiarCadena_admin($str) {
    // htmlspecialchars($str);
    global $conexion_adm;
    $str = mysqli_real_escape_string($conexion_adm, trim($str));
    return $str;
  }

  function encodeCadenaHtml_admin($str) {
    // htmlspecialchars($str);
    global $conexion_adm;
    $encod = "UTF-8";
    $str = mysqli_real_escape_string($conexion_adm, trim($str));
    return htmlspecialchars($str, ENT_QUOTES);
  }

  function decodeCadenaHtml_admin($str) {
    $encod = "UTF-8";
    return htmlspecialchars_decode($str, ENT_QUOTES);
  }
}


?>
