<?php
require_once "../modelos/Consultas.php";

$consultas=new Consultas();


switch ($_GET["op"]){

	case 'l_proyectos_carousel':

        $rspta=$consultas->l_proyectos_carousel();
        
 		echo json_encode($rspta);
	break;

}

?>