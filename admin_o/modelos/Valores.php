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

	//Implementamos un método para activar categorías
	public function activar($idvalores )
	{
		$sql="UPDATE valores SET estado='1' WHERE idvalores ='$idvalores'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function eliminar($idvalores )
	{
		$sql="UPDATE valores SET estado_delete='0' WHERE idvalores ='$idvalores'";
		return ejecutarConsulta($sql);
	}
	

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idvalores )
	{
		$sql="SELECT*FROM valores WHERE idvalores ='$idvalores'";

		return ejecutarConsultaSimpleFila($sql);
	}

	public function verdatos($idvalores)
	{
		$sql="SELECT t.idvalores,t.idproyecto,t.idproveedor,t.tipo_comprobante,t.numero_comprobante,t.forma_de_pago,t.fecha_viaje,t.tipo_viajero,t.glosa,t.tipo_ruta,t.ruta,t.cantidad,t.precio_unitario,t.subtotal,t.igv,t.precio_parcial,t.descripcion,t.comprobante, p.razon_social, p.ruc
		FROM valores as t, proveedor as p WHERE t.idvalores='$idvalores' AND t.idproveedor=p.idproveedor;";

		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT*FROM valores ORDER BY idvalores DESC";
		return ejecutarConsulta($sql);		
	}

	//Select2 Proveedor
	public function select2_proveedor()
	{
	$sql = "SELECT idproveedor, razon_social, ruc FROM proveedor WHERE  estado=1 AND estado_delete=1";
	return ejecutarConsulta($sql);
	}
	

	//Seleccionar un comprobante
	public function ficha_tec($idvalores)
	{
		$sql="SELECT comprobante FROM valores WHERE idvalores='$idvalores'";
		return ejecutarConsulta($sql);		
	}
	//total
	public function total($idproyecto){
		$sql="SELECT SUM(precio_parcial) as precio_parcial FROM valores WHERE idproyecto='$idproyecto' AND estado=1 AND estado_delete=1";
		return ejecutarConsultaSimpleFila($sql);
	}

}

?>