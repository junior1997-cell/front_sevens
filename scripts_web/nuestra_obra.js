//Función que se ejecuta al inicio
function init() {

  mostrar_proyectos();

}

//:::::::: S E C C C I O N   O B R A S :::::::::
function mostrar_proyectos() {
  
  $.post("../admin/ajax/web.php?op=listar_proyecto_web", { }, function (e, status) {

    e = JSON.parse(e); console.log(e); 

    if (e.status == true) {
      var data_html = '';
      $.each(e.data, function (index, value) {
       
        if (value.estado_proyecto==1) {
          indicador_o='<span class="badge badge-soft-info mr-2 "> <span class="legend-indicator bg-info"></span>En ejecución </span>';
        } else {
          indicador_o='<span class="badge badge-soft-danger mr-2 "> <span class="legend-indicator bg-success"></span>Culminada </span>';
        }
        data_html = data_html.concat(``);          
      });

      $("#l_obras").html(data_html); 
    } else {
      $("#l_obras").html('<p><i class="fas fa-spinner fa-pulse fa-lg text-danger"></i> Cargando...</p>'); 
    } 
  }).fail( function(e) { console.log(e); ver_errores(e); } );
}


function detalle_obras(idproyecto){ localStorage.setItem("idproyecto_detalle", idproyecto); }

init();