<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";
require "../config/Conexion_admin.php";

Class Proyecto
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

  //Seleccionar un comprobante
	public function reg_img($idvalores)
	{
		$sql="SELECT img_perfil FROM valores WHERE idvalores='$idvalores'";
		return ejecutarConsultaSimpleFila($sql);		
	}

	//Select2 proyecto
	public function select2_proyecto()
	{
    $data_select = Array(); 
		//bd-admin
		$sql_1="SELECT idproyecto,nombre_codigo FROM proyecto WHERE estado!=2 AND estado_delete=1;";
		$proyecto_admin= ejecutarConsultaArray_admin($sql_1);
		if ($proyecto_admin['status']) {

			foreach ($proyecto_admin['data'] as $key => $value) {

				$id=$value['idproyecto'];

        //bd-front
        $sql_2 = "SELECT*FROM proyecto_front WHERE id_proyecto_admin='$id'";
        $proyecto_front= ejecutarConsultaSimpleFila($sql_2);
        //$conexion->close();
        if ($proyecto_front['status']) {

          if (empty($proyecto_front['data']['id_proyecto_admin'])) {

            $data_select[] = array(
              "idproyecto"                => $value['idproyecto'],
              "codigo_proyecto"           => $value['nombre_codigo'],
            );

          }

        }

			}

		}
    return $data_select;
	}
	
}

?>