var tabla;

//Función que se ejecuta al inicio
function init() {

  mostrar_servicios();  

}
//:::::::: S E R V I C I O S :::::::::
function mostrar_servicios() {

  $.post("admin/ajax/web.php?op=listar_servicios_web", { }, function (data, status) {

    data = JSON.parse(data);  console.log(data); 

    if (data.data) {

      $.each(data.data, function (index, value) {

          var servicios = `<div class="col-md-4 mb-3 mb-md-0 mb-md-n11">
                              <!-- Card -->
                              <a class="card text-center h-100 transition-3d-hover">
                                <div class="card-body p-lg-5">
                                  <figure class="max-w-8rem_modif w-100 mx-auto mb-4">
                                    <img class="img-fluid" src="admin/dist/img/servicios/imagen_perfil/${value.img_perfil}" alt="SVG">
                                  </figure>
                                  <h3 class="h4">${value.nombre_servicio}</h3>
                                  <p class="text-body text-justify mb-0">${value.descripcion}</p>
                                </div>
                                <div class="card-footer font-weight-bold py-3 px-lg-5"> ${value.nombre_servicio} </div>
                              </a>
                              <!-- End Card -->
                            </div>`;

          $("#servicios").append(servicios);
      });
      
    } else {
      $("#servicios").html('<p><p><i class="fas fa-spinner fa-pulse fa-lg text-danger"></i> Cargando...</p></p>');  
    } 

    $('.cargando_serv').css('display', 'none');
  }).fail( function(e) { console.log(e); ver_errores(e); } );
}

init();


