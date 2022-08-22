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
    FROM usuario as u, trabajador as t, usuario_permiso as up, permiso as p
    WHERE  u.idtrabajador = t.idtrabajador AND u.idusuario=up.idusuario AND up.idpermiso = p.idpermiso AND p.nombre='Sistema informativo'  AND u.estado=1 AND u.estado_delete=1  ORDER BY t.nombres ASC;";
    return ejecutarConsulta_admin($sql);
  }
  //Implementar un método para listar los permisos marcados
  public function listarmarcados($idusuario) {
    $sql = "SELECT up.idusuario_permiso,up.idusuario,up.idpermiso,p.nombre FROM usuario_permiso as up, permiso as p WHERE up.idpermiso=p.idpermiso AND up.idusuario='$idusuario'; ";
    return ejecutarConsultaArray_admin($sql);
  }

  //Función para verificar el acceso al sistema
  public function verificar($login, $clave) {
    $sql = "SELECT u.idusuario, t.nombres, t.tipo_documento, t.numero_documento, t.telefono, t.email, u.cargo, u.login, t.imagen_perfil, t.tipo_documento
		FROM usuario as u, trabajador as t, usuario_permiso as up, permiso as p
		WHERE u.login='$login' AND u.password='$clave'  AND u.idtrabajador = t.idtrabajador AND u.idusuario=up.idusuario AND up.idpermiso = p.idpermiso 
    AND p.nombre='Sistema informativo' AND t.estado=1 AND u.estado=1 AND u.estado_delete=1";
    return ejecutarConsultaSimpleFila_admin($sql);
  }

}

?>
