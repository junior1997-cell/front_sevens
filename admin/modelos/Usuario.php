<?php
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion_admin.php";

class Usuario
{
  //Implementamos nuestro constructor
  public function __construct()
  {
  }
  //Implementar un método para listar los registros
  public function listar() {
    $sql = "SELECT u.idusuario, t.nombres, t.tipo_documento, t.numero_documento, t.telefono, t.email, u.cargo, u.login, t.imagen_perfil, t.tipo_documento, u.estado
		FROM usuario as u, trabajador as t, usuario_permiso as up
		WHERE  u.idtrabajador = t.idtrabajador  AND u.estado=1 AND u.estado_delete=1  and u.idusuario=up.idusuario and up.idpermiso='25' ORDER BY t.nombres ASC;";
    return ejecutarConsulta_admin($sql);
  }
  //Implementar un método para listar los permisos marcados
  public function listarmarcados($idusuario) {
    $sql = "SELECT * FROM usuario_permiso WHERE idusuario='$idusuario' ";
    return ejecutarConsultaArray_admin($sql);
  }

  //Función para verificar el acceso al sistema
  public function verificar($login, $clave) {
    $sql = "SELECT u.idusuario, t.nombres, t.tipo_documento, t.numero_documento, t.telefono, t.email, u.cargo, u.login, t.imagen_perfil, t.tipo_documento
		FROM usuario as u, trabajador as t, usuario_permiso as up
		WHERE u.login='$login' AND u.password='$clave' AND t.estado=1 and u.estado=1 and u.estado_delete=1 and u.idtrabajador = t.idtrabajador 
    and u.idusuario=up.idusuario and up.idpermiso='25';";
    return ejecutarConsultaSimpleFila_admin($sql);
  }

}

?>
