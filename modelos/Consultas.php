<?php 

  //Incluímos inicialmente la conexión a la base de datos
  require "../config/Conexion.php";

  Class Consultas
  {
    //Implementamos nuestro constructor
    public function __construct() {	}

    //listar los proyectos para el carousel del index
    public function l_proyectos_carousel()
    {
        $sql="SELECT idproyecto,nombre_proyecto,ubicacion,actividad_trabajo, fecha_inicio,fecha_fin,plazo,dias_habiles,estado
        FROM proyecto WHERE estado!='2' AND estado_delete='1' ORDER BY idproyecto DESC LIMIT 5;";
        return ejecutarConsultaArray($sql);
    }

      
  }

?>