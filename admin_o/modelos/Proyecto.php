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
	public function insertar($id_pryecto_adm,$descripcion,$imagen_perfil)
	{
    //var_dump($id_pryecto_adm,$descripcion,$imagen_perfil);die();
		//Realizamos la consulta a la bd admin sevens
		$sql_1="SELECT idproyecto,nombre_proyecto,nombre_codigo,fecha_inicio,fecha_fin,dias_habiles,plazo,actividad_trabajo,ubicacion,estado FROM proyecto WHERE idproyecto=$id_pryecto_adm;";
		$proyecto_admin= ejecutarConsultaSimpleFila_admin($sql_1);

    if ($proyecto_admin['status']) {

			if (!empty($proyecto_admin['data']['idproyecto'])) { 

				$sql_2="INSERT INTO proyecto_front(id_proyecto_admin, nombre_proyecto,codigo_proyecto, fecha_inicio, fecha_fin, 
				dias_habiles, dias_calendario, actividad_trabajo, ubicacion, descripcion, img_perfil, estado_proyecto) 
				VALUES ( '".$proyecto_admin['data']['idproyecto']."', '".$proyecto_admin['data']['nombre_proyecto']."', '".$proyecto_admin['data']['nombre_codigo']."', 
				        '".$proyecto_admin['data']['fecha_inicio']."', '".$proyecto_admin['data']['fecha_fin']."', 
				        '".$proyecto_admin['data']['dias_habiles']."', '".$proyecto_admin['data']['plazo']."',
				        '".$proyecto_admin['data']['actividad_trabajo']."', '".$proyecto_admin['data']['ubicacion']."', '$descripcion', '$imagen_perfil',
			            '".$proyecto_admin['data']['estado']."' ) ";

        return	ejecutarConsulta($sql_2);
			}
  
	  }else{

      return	$proyecto_admin;

    }
	//	return $sw;		
	}

	//Implementamos un método para editar registros
	public function editar($idproyecto,$id_pryecto_adm_edith,$descripcion,$imagen_perfil)
	{

        $sql_2="UPDATE proyecto_front SET id_proyecto_admin ='.$id_pryecto_adm_edith.', descripcion ='$descripcion', img_perfil ='$imagen_perfil'
              
              WHERE idproyecto='$idproyecto'";

        return	ejecutarConsulta($sql_2);


	}

    //Implementamos un método para desactivar categorías
	public function eliminar($idproyecto)
	{
		$sql="DELETE FROM proyecto_front WHERE idproyecto ='$idproyecto';";
		return ejecutarConsulta($sql);
	}
	

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idproyecto )
	{
		$sql="SELECT*FROM proyecto_front WHERE idproyecto ='$idproyecto'";

		return ejecutarConsultaSimpleFila($sql);
	}


	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT*FROM proyecto_front ORDER BY idproyecto DESC";
		return ejecutarConsulta($sql);		
	}

  //Seleccionar un comprobante
	public function reg_img($idproyecto)
	{
		$sql="SELECT img_perfil FROM proyecto_front WHERE idproyecto='$idproyecto'";
		return ejecutarConsultaSimpleFila($sql);		
	}

	//Select2 proyecto
	public function select2_proyecto()
	{
    $data_select = Array(); 
		//bd-admin
		$sql_1="SELECT idproyecto,nombre_codigo,nombre_proyecto FROM proyecto WHERE estado!=2 AND estado_delete=1;";
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
            "nombre_proyecto"           => $value['nombre_proyecto'],
            "codigo_proyecto"           => $value['nombre_codigo'],
            );

          }

		   	}

			}

		}
    return $data_select;
	}

	
	//Implementar un método para listar en la web
	public function listar_proyecto_web()
	{
		$sql="SELECT*FROM proyecto_front ORDER BY idproyecto DESC";
		return ejecutarConsultaArray($sql);		
	}
	
}

?>