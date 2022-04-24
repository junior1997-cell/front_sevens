<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Valores
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}
	//Implementamos un método para insertar registros
	public function insertar($nombre,$descripcion,$imagen_perfil)
	{
		$sql="INSERT INTO valores(nombre_valor, descripcion, img_perfil) VALUES ('$nombre','$descripcion','$imagen_perfil')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idvalores,$nombre,$descripcion,$imagen_perfil)
	{
		$sql="UPDATE valores SET nombre_valor='$nombre', descripcion='$descripcion', img_perfil='$imagen_perfil' WHERE idvalores='$idvalores'";	
		return ejecutarConsulta($sql);	
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idvalores )
	{
		$sql="UPDATE valores SET estado='0' WHERE idvalores ='$idvalores'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function eliminar($idvalores)
	{
		$sql="DELETE FROM valores WHERE idvalores ='$idvalores';";
		return ejecutarConsulta($sql);
	}
	
	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idvalores )
	{
		$sql="SELECT*FROM valores WHERE idvalores ='$idvalores'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT*FROM valores ORDER BY idvalores DESC";
		return ejecutarConsulta($sql);		
	}

	//Seleccionar un comprobante
	public function reg_img($idvalores)
	{
		$sql="SELECT img_perfil FROM valores WHERE idvalores='$idvalores'";
		return ejecutarConsultaSimpleFila($sql);		
	}

	//funciones vista web
	
	//Implementar un método para listar los registros
	public function listar_v_web()
	{
		$sql="SELECT*FROM valores ORDER BY idvalores DESC";
		return ejecutarConsultaArray($sql);		
	}
	
	//Implementar un método para listar los registros
	public function listar_v_foot_web()
	{
		$sql="SELECT*FROM valores ORDER BY idvalores DESC LIMIT 4";
		return ejecutarConsultaArray($sql);		
	}
}

?>