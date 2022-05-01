var tabla;

//Función que se ejecuta al inicio
function init() {

  mostrar_proyectos();

}

//:::::::: S E C C C I O N   O B R A S :::::::::
function mostrar_proyectos() {
  
  $.post("admin/ajax/web.php?op=listar_proyecto_web", { }, function (data, status) {

    data = JSON.parse(data); // console.log(data); 

    if (data.data) {

      $.each(data.data, function (index, value) {

        var descripcion=value.descripcion;
        var nomb_proyect=value.nombre_proyecto;
        var indicador_o="";
        if (value.estado_proyecto==1) {
          indicador_o='<span class="badge badge-soft-info mr-2 "> <span class="legend-indicator bg-info"></span>En ejecución </span>';
        } else {
          indicador_o='<span class="badge badge-soft-danger mr-2 "> <span class="legend-indicator bg-success"></span>Culminada </span>';
        }

          var l_obras = ` <div class="col-sm-6 col-lg-4 mb-5" >
                            <div class="card card-bordered card-hover-shadow h-100">
                              <div class="card-body">
                                <img class="card-img-top" src="admin/dist/img/proyecto/imagen_perfil/${value.img_perfil}" alt="Image Description">
                                <h4 class="mb-0">${nomb_proyect.substr(0,60)+' ...'}</h4>
                                <p class="mb-0" style="text-align: justify;">${descripcion.substr(0,120)+' ...'}</p>
                                
                              </div>
                              <div class="card-footer">
                                <ul class="list-inline list-separator small text-body">
                                  <li class="list-inline-item"> 
                                    <a style="cursor: pointer; font-size: 13px;"
                                    onclick="ver_modal_slide('${value.actividad_trabajo}','${value.descripcion}','${value.dias_calendario}','${value.dias_habiles}','${value.fecha_fin}','${value.fecha_inicio}', '${value.img_perfil}','${value.nombre_proyecto}','${value.ubicacion}','2')"> 
                                      <span class="badge badge-soft-warning mr-2"  style="font-size: 13px;"> Ver detalles</span> 
                                    </a>
                                  </li>
                                  <li class="list-inline-item"> ${indicador_o}</li>
                                </ul>
                              </div>
                            </div> 
                          </div>`;

          $("#l_obras").append(l_obras);
          
      });
      $('.cargando_obras').css('display', 'none');     
    } else {

      $("#l_obras").html('<p><i class="fas fa-spinner fa-pulse fa-lg text-danger"></i> Cargando...</p>'); 

    } 


  }).fail( function(e) { console.log(e); ver_errores(e); } );
}



init();


