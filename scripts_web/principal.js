var tabla;
//sscrip      datos generales, servicios y valores.
//principal   reseñia_ceo, valores, mision y vision obras

//Función que se ejecuta al inicio
function init() {

  mostrar_valores();  mostrar_valores_footer();
 mostrar_servicios_footer();
  mostrar_datos_g(); 
  slide_obras(); 

}

//:::::::: V A L O R E S :::::::::si
function mostrar_valores() {
  $.post("admin/ajax/web.php?op=listar_valores_web", { }, function (data, status) {

    data = JSON.parse(data);  console.log(data); 

    if (data.data) {

      $.each(data.data, function (index, value) {

          var l_valores = ` <div class="col-md-6 col-lg-5 mb-3 mb-md-7">
                            <!-- Icon Blocks -->
                            <div class="media pr-lg-5">
                              <figure class="w-100 max-w-8rem mr-4">
                                <img class="img-fluid" src="admin/dist/img/valores/imagen_perfil/${value.img_perfil}" alt="SVG">
                              </figure>
                              <div class="media-body">
                                <h4>${value.nombre_valor}</h4>
                                <p style="text-align: justify;">${value.descripcion}</p>
                              </div>
                            </div>
                            <!-- End Icon Blocks -->
                          </div> `;

          $("#l_valores").append(l_valores);
      });
      
    } else {

      $("#l_valores").html('<p><i class="fas fa-spinner fa-pulse fa-lg text-danger"></i> Cargando...</p>'); 

    } 

    $('.cargando_valores').css('display', 'none');
  }).fail( function(e) { console.log(e); ver_errores(e); } );
}

//:::::::: V A L O R E S   F O O T E R :::::::::si
function mostrar_valores_footer() {

  $.post("admin/ajax/web.php?op=listar_v_foot_web", { }, function (data, status) {

    data = JSON.parse(data);  console.log(data); 

    if (data.data) {

      $.each(data.data, function (index, value) {

          var l_valores_footer = `<li class="nav-item">
                            <a class="nav-link">
                              <img class="img_icons_footer" src="admin/dist/img/valores/imagen_perfil/${value.img_perfil}" alt="" style="color: white;background-color: white;border-radius: 4px;"> 
                              ${value.nombre_valor} 
                            </a> 
                          </li> `;

          $("#l_valores_footer").append(l_valores_footer);
      });

      $('.cargando_valores_footer').css('display', 'none');

      $('.view_valores').show();

    } else {

      $('.view_valores').hide();

    } 

  }).fail( function(e) { console.log(e); ver_errores(e); } );

}

//:::::::: D A T O S  G E N E R A L E S :::::::::si
function mostrar_datos_g() {
  $.post("admin/ajax/web.php?op=datos_generales", { }, function (data, status) {

    data = JSON.parse(data); // console.log(data); 

    if (data.data) {
      $("#mision").html(data.data.mision);
      $("#vision").html(data.data.vision);
      $("#resenia").html(data.data.reseña_historica);
      $("#palabras_ceo").html(data.data.palabras_ceo);
      $("#contactos_head").html('📞 '+data.data.horario);
      //footer
      $(".direccion_f").html(data.data.direccion);
      $(".correo_f").html(data.data.correo);
      $(".telefono_f").html(data.data.celular);

      if ($(".direccion_f")!=null || $(".correo_f")!=null || $(".telefono_f")!=null) {
        $('.carg_contactos_f').css('display', 'none');
        $('.view_contactos').show();
      } else {
        $('.view_contactos').hide();
      }
    } 

  }).fail( function(e) { console.log(e); ver_errores(e); } );
}

//:::::::: P R O Y E C T O S :::::::::si
function slide_obras() {
  
  $.post("admin/ajax/web.php?op=listar_proyecto_web", { }, function (data, status) {

    data = JSON.parse(data); //console.log(data); 

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
         
          var carousel_obras = ` <div class="js-slide mb-4">
                                  <!-- Card Info -->
                                  <div class="card h-100">
                                    <img class="card-img-top" src="admin/dist/img/proyecto/imagen_perfil/${value.img_perfil}" alt="Image Description">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                          <div class="min-w-8rem mr-2">
                                            <img class="img-fluid" src="assets/svg/logos/icon-02.png" alt="Logo">
                                          </div>
                                          <div class="media-body">
                                            <h4 class="mb-0">${nomb_proyect.substr(0,40)+' ...'}</h4>
                                            <small class="d-block"></small>
                                          </div>
                                        </div>
                                        <p class="mb-0" style="text-align: justify;">${descripcion.substr(0,120)+' ...'}</p>
                                    </div>
                                    <div class="card-footer">
                                      <ul class="list-inline list-separator small text-body">
                                        <li class="list-inline-item"> 
                                          <a style="cursor: pointer; font-size: 13px;" href="detalle_obra.php"
                                          onclick="detalle_obras(${value.idproyecto})"> 
                                            <span class="badge badge-soft-warning mr-2"  style="font-size: 13px;"> Ver detalles</span> 
                                          </a>
                                        </li>
                                        <li class="list-inline-item"> ${indicador_o}</li>
                                      </ul>
                                    </div>
                                  </div>
                                  <!-- End Card Info -->
                                </div>`;

          $("#carousel_obras").append(carousel_obras);
      });
      
      // INITIALIZATION OF SLICK CAROUSEL
      // =======================================================
      $('.js-slick-carousel').each(function() {
        var slickCarousel = $.HSCore.components.HSSlickCarousel.init($(this));
      });
      
    } else {

      $("#carousel_obras").html('<p><i class="fas fa-spinner fa-pulse fa-lg text-danger"></i> Cargando...</p>'); 

    } 


  }).fail( function(e) { console.log(e); ver_errores(e); } );
}

//:::::::: S E R V I C I O S  F O O T E R:::::::::
function mostrar_servicios_footer() {

  $.post("admin/ajax/web.php?op=listar_ser_web_f", { }, function (data, status) {

    data = JSON.parse(data);  console.log(data); 

    if (data.data) {

      $.each(data.data, function (index, value) {

          var servicios_f = `<li class="nav-item">
                            <a class="nav-link">
                              <img class="img_icons_footer" src="admin/dist/img/servicios/imagen_perfil/${value.img_perfil}" alt="" style="color: white;background-color: white;border-radius: 4px;"> 
                              ${value.nombre_servicio} 
                            </a> 
                          </li> `;

          $("#l_serv_footer").append(servicios_f);
      });

      $('.cargando_serv_footer').css('display', 'none');

      $('.view_servicios').show();
      
    } else {

      $('.view_servicios').hide();
      
    } 

  }).fail( function(e) { console.log(e); ver_errores(e); } );
}

function detalle_obras(idproyecto){ localStorage.setItem("idproyecto_detalle", idproyecto); }


init();

function extrae_extencion(filename) {
  return filename.split('.').pop();
}
