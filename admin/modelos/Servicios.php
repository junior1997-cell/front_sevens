<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Servicios
{
	//Implementamos nuestro constructor
	public function __construct() { }

	public function insertar($nombre,$precio,$descripcion,$caracteristicas,$imagen_perfil)
	{
	
		$sql="INSERT INTO servicio(nombre_servicio, precio, descripcion, caracteristicas, img_perfil) 
		VALUES ('$nombre','$precio','$descripcion','$caracteristicas','$imagen_perfil')";
		return ejecutarConsulta($sql);
			
	}

	public function editar($idservicio,$nombre,$precio,$descripcion,$caracteristicas,$imagen_perfil)
	{
		$sql="UPDATE servicio SET nombre_servicio='$nombre',caracteristicas='$caracteristicas',descripcion='$descripcion',img_perfil='$imagen_perfil',precio='$precio'
		 WHERE idservicio='$idservicio'";	
		return ejecutarConsulta($sql);	
	}

	public function eliminar($idservicio)
	{
		$sql="DELETE FROM servicio WHERE idservicio ='$idservicio';";
		return ejecutarConsulta($sql);
	}

	public function mostrar($idservicio )
	{
		$sql="SELECT*FROM servicio WHERE idservicio ='$idservicio'";

		return ejecutarConsultaSimpleFila($sql);
	}

	public function listar()
	{
		$sql="SELECT*FROM servicio ORDER BY idservicio DESC";
		return ejecutarConsulta($sql);		
	}

	public function reg_img($idservicio)
	{
		$sql="SELECT img_perfil FROM servicio WHERE idservicio='$idservicio'";
		return ejecutarConsultaSimpleFila($sql);		
	}
		
	//-------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------

	//Implementar un método para listar los registros
	public function listar_serv_web()
	{
		$sql="SELECT*FROM servicio ORDER BY idservicio DESC";
		return ejecutarConsultaArray($sql);		
	}

	//Implementar un método para listar los registros
	public function listar_serv_web_f()
	{
		$sql="SELECT*FROM servicio ORDER BY idservicio DESC LIMIT 3";
		return ejecutarConsultaArray($sql);		
	}

}

?>