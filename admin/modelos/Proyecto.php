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

	//:::::::::::::::::::: G A L E R I A ::::::::::::::::::::::
	public function insertar_galeria($idproyecto_ing,$img_galeria)
	{
		
		$sql="INSERT INTO galeria_proyecto( idproyecto_front, imagen) VALUES ('$idproyecto_ing','$img_galeria')";
		return ejecutarConsulta($sql);		
	}

	public function editar_galeria($idgaleria_proyecto,$idproyecto_img,$img_galeria)
	{
		$sql="UPDATE galeria_proyecto SET idproyecto_front='$idproyecto_img', imagen='$img_galeria' WHERE idgaleria_proyecto='$idgaleria_proyecto'";
		return ejecutarConsulta($sql);	
	}
	public function listar_galeria($idproyecto_front)
	{
		$sql="SELECT*FROM galeria_proyecto WHERE idproyecto_front='$idproyecto_front'  ORDER BY idgaleria_proyecto DESC";
		return ejecutarConsultaArray($sql);		
	}

	//Implementamos un método para desactivar categorías
	public function eliminar_galeria($idgaleria_proyecto)
	{
		$sql="DELETE FROM galeria_proyecto WHERE idgaleria_proyecto ='$idgaleria_proyecto';";
		return ejecutarConsulta($sql);
	}

	//Seleccionar la imagen
	public function reg_img_galeria($idgaleria_proyecto)
	{
		$sql="SELECT imagen FROM galeria_proyecto WHERE idgaleria_proyecto='$idgaleria_proyecto'";
		return ejecutarConsultaSimpleFila($sql);		
	}

	//:::::::::::::::::::: F A S E S  ::::::::::::::::::::::
	public function insertar_fase($idproyecto_fase,$n_fase,$nombre_f)
	{
		
		$sql="INSERT INTO fase_proyecto(idproyecto, nombre, numero_fase) VALUES ('$idproyecto_fase','$nombre_f','$n_fase')";
		return ejecutarConsulta($sql);		
	}

	public function editar_fase($idfase,$idproyecto_fase,$n_fase,$nombre_f)
	{
		$sql="UPDATE fase_proyecto SET idproyecto='$idproyecto_fase',nombre='$nombre_f',numero_fase='$n_fase'] 
		WHERE idfase_proyecto=$idfase";
		return ejecutarConsulta($sql);	
	}

	public function listar_fase($idproyecto_fase)
	{
		$sql="SELECT*FROM fase_proyecto WHERE idproyecto='$idproyecto_fase'  ORDER BY idfase_proyecto DESC";
		return ejecutarConsulta($sql);		
	}

	//Implementamos un método para desactivar categorías
	public function eliminar_fase($idfase)
	{
		$sql="DELETE FROM fase_proyecto WHERE idfase_proyecto ='$idfase';";
		return ejecutarConsulta($sql);
	}

	
	//:::::::::::::::::::: L I S T A R  W E B ::::::::::::::::::::::

	//Implementar un método para listar en la web
	public function listar_proyecto_web()
	{
		$sql="SELECT*FROM proyecto_front ORDER BY idproyecto DESC";
		return ejecutarConsultaArray($sql);		
	}
  
	//Implementar un método para listar 1 proyecto en la web
	public function detalle_proyecto_web($idproyecto,$opcion)
	{
		$data_proyecto = Array(); $rpta_galeria= Array();

		$sql_1="SELECT idproyecto,id_proyecto_admin,nombre_proyecto,codigo_proyecto,fecha_inicio,fecha_fin,
		dias_habiles,dias_calendario,actividad_trabajo,ubicacion,descripcion,estado_proyecto,img_perfil 
		FROM proyecto_front WHERE id_proyecto_admin='$idproyecto'";

		$datosproyecto =  ejecutarConsultaSimpleFila($sql_1);

		if ($datosproyecto['status']) {

			$id=$datosproyecto['data']['idproyecto'];

      if ($opcion=='resumido') {
          $sql_2="SELECT * FROM galeria_proyecto WHERE idproyecto_front='$id' ORDER BY idgaleria_proyecto DESC LIMIT 3";
          $galeria_proyecto= ejecutarConsultaArray($sql_2);
      }else{
          
        $sql_2="SELECT * FROM galeria_proyecto WHERE idproyecto_front='$id'";
        $galeria_proyecto= ejecutarConsultaArray($sql_2);

      }

			if ($galeria_proyecto['status']) {

				if (!empty($galeria_proyecto['data'])) {

					$rpta_galeria =$galeria_proyecto['data'];

				}
				
			}else{

        return 	$galeria_proyecto ;

			}

      $data_proyecto = array(

        "status"               => true,
        "data"                 => [
            "idproyecto"           => $datosproyecto['data']['idproyecto'],
            "nombre_proyecto"      => $datosproyecto['data']['nombre_proyecto'],
            "codigo_proyecto"      => $datosproyecto['data']['codigo_proyecto'],
            "fecha_inicio"         => $datosproyecto['data']['fecha_inicio'],
            "fecha_fin"            => $datosproyecto['data']['fecha_fin'],
            "dias_habiles"         => $datosproyecto['data']['dias_habiles'],
            "dias_calendario"      => $datosproyecto['data']['dias_calendario'],
            "actividad_trabajo"    => $datosproyecto['data']['actividad_trabajo'],
            "ubicacion"            => $datosproyecto['data']['ubicacion'],
            "descripcion"          => $datosproyecto['data']['descripcion'],
            "estado_proyecto"      => $datosproyecto['data']['estado_proyecto'],
            "img_perfil"           => $datosproyecto['data']['img_perfil'],
            "galeria"              => $rpta_galeria,],
        "message"              => 'Data sin errores',
      
      );

      return $data_proyecto; 
		
		}else{

      return $datosproyecto;
    }

	}
	
}

?>
