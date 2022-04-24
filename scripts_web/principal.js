var tabla;

//Función que se ejecuta al inicio
function init() {

  mostrar_valores();  mostrar_valores_footer();
  mostrar_servicios(); mostrar_servicios_footer();
  mostrar_datos_g(); 
  slide_obras(); mostrar_proyectos();
 // contactos();
  mostrar_proveedores();

}
//:::::::: V A L O R E S :::::::::
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
//:::::::: V A L O R E S   F O O T E R :::::::::
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

//:::::::: D A T O S  G E N E R A L E S :::::::::
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
      var t=data.data.celular; var d=data.data.direccion; var c=data.data.correo;
      var lati=data.data.latitud; var long=data.data.longitud; 
      contactos(t,d,c,lati,long);
    } 

  }).fail( function(e) { console.log(e); ver_errores(e); } );
}

//:::::::: P R O Y E C T O S :::::::::
function slide_obras() {
  
  $.post("admin/ajax/web.php?op=listar_proyecto_web", { }, function (data, status) {

    data = JSON.parse(data); console.log(data); 

    if (data.data) {

      $.each(data.data, function (index, value) {

          var descripcion=value.descripcion;
          var nomb_proyect=value.nombre_proyecto;
         
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
                                      <div style="text-align: center;">
                                          <a class="btn btn-warning btn-wide btn-pill transition-3d-hover mb-2 mb-sm-0" style="cursor: pointer; font-size: 13px;"
                                          onclick="ver_modal_slide('${value.actividad_trabajo}','${value.descripcion}','${value.dias_calendario}','${value.dias_habiles}','${value.fecha_fin}','${value.fecha_inicio}', '${value.img_perfil}','${value.nombre_proyecto}','${value.ubicacion}','1')" >
                                            Ver más
                                          </a>
                                        </div>
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

//funciones para mostrar modal detalles slide y obras
function ver_modal_slide(actividad_trabajo,descripcion,dias_calendario,dias_habiles,fecha_fin,fecha_inicio,img_perfil,nombre_proyecto,ubicacion,estado) {
  var imagen='';
      
  if (img_perfil != '' && img_perfil != null) {

    if ( extrae_extencion(img_perfil) == "pdf" ) {

      imagen= `<img src="admin/dist/svg/drag-n-drop.svg" alt="" width="50%" >`;

    }else{

      if (
        extrae_extencion(img_perfil) == "jpeg" || extrae_extencion(img_perfil) == "jpg" || extrae_extencion(img_perfil) == "jpe" ||
        extrae_extencion(img_perfil) == "jfif" || extrae_extencion(img_perfil) == "gif" || extrae_extencion(img_perfil) == "png" ||
        extrae_extencion(img_perfil) == "tiff" || extrae_extencion(img_perfil) == "tif" || extrae_extencion(img_perfil) == "webp" ||
        extrae_extencion(img_perfil) == "bmp" || extrae_extencion(img_perfil) == "svg" ) {

          imagen=`<img src="admin/dist/img/proyecto/imagen_perfil/${img_perfil}" alt="" width="100%" onerror="this.src='../dist/svg/error-404-x.svg';" >`; 
        
      } else {
        imagen=`<img src="admin/dist/svg/drag-n-drop.svg" alt="" width="50%" >`;
      }  

    }

  } else {

    imagen='<img src="admin/dist/svg/drag-n-drop.svg" alt="" width="50%" >';

  }

  if (estado==1) {
      //console.log('1');
    $('#ver_detalles').modal("show");

    $(".nombre_obra").html(nombre_proyecto);

    detalles_obra_slide=` <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <table class="table table-hover table-bordered">        
                        <tbody>
                          <tr data-widget="expandable-table" aria-expanded="false">
                            <th>Actividad trabajo</th>
                            <td>${actividad_trabajo}</td>                          
                          </tr>
                          <tr data-widget="expandable-table" aria-expanded="false">
                            <th>Descripción</th>
                            <td class="text-justify">${descripcion}</td>
                          </tr>
                          <tr data-widget="expandable-table" aria-expanded="false">
                            <th>Días habiles</th>
                            <td>${dias_calendario}</td>
                          </tr>
                          <tr data-widget="expandable-table" aria-expanded="false">
                            <th>Días calendario</th>
                            <td>${dias_habiles}</td>
                          </tr>
                          <tr data-widget="expandable-table" aria-expanded="false">
                            <th>Fecha inicio</th>
                            <td>${fecha_inicio}</td>
                          </tr>
                          <tr data-widget="expandable-table" aria-expanded="false">
                            <th>Fecha fin</th>
                            <td>${fecha_fin}</td>
                          </tr>
                          <tr data-widget="expandable-table" aria-expanded="false">
                            <th>Ubicación</th>
                              <td>${ubicacion}</td>
                          </tr>
                          <tr data-widget="expandable-table" aria-expanded="false">
                            <td colspan="2" >${imagen}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>`;

    $(".detalles_obra").html(detalles_obra_slide);

  } else {

    //console.log('2');

    $('#ver_detalles_secc_onbras').modal("show");

    $(".nombre_obras_secc_onbras").html(nombre_proyecto);

    detalles_obras=` <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <table class="table table-hover table-bordered">        
                        <tbody>
                          <tr data-widget="expandable-table" aria-expanded="false">
                            <th>Actividad trabajo</th>
                            <td>${actividad_trabajo}</td>                          
                          </tr>
                          <tr data-widget="expandable-table" aria-expanded="false">
                            <th>Descripción</th>
                            <td class="text-justify">${descripcion}</td>
                          </tr>
                          <tr data-widget="expandable-table" aria-expanded="false">
                            <th>Días habiles</th>
                            <td>${dias_calendario}</td>
                          </tr>
                          <tr data-widget="expandable-table" aria-expanded="false">
                            <th>Días calendario</th>
                            <td>${dias_habiles}</td>
                          </tr>
                          <tr data-widget="expandable-table" aria-expanded="false">
                            <th>Fecha inicio</th>
                            <td>${fecha_inicio}</td>
                          </tr>
                          <tr data-widget="expandable-table" aria-expanded="false">
                            <th>Fecha fin</th>
                            <td>${fecha_fin}</td>
                          </tr>
                          <tr data-widget="expandable-table" aria-expanded="false">
                            <th>Ubicación</th>
                              <td>${ubicacion}</td>
                          </tr>
                          <tr data-widget="expandable-table" aria-expanded="false">
                            <td colspan="2" >${imagen}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>`;

    $(".detalles_obras_secc_onbras").html(detalles_obras);

  }

}

//:::::::: S E C C C I O N   O B R A S :::::::::
function mostrar_proveedores() {
  
  $.post("admin/ajax/web.php?op=listar_proveedores_web", { }, function (data, status) {

    data = JSON.parse(data);  console.log(data); 

    if (data.data) {

      $.each(data.data, function (index, value) {


          var proveedores = `<div class="col-sm-6 col-md-4 mb-5">
                                <!-- Card Info -->
                                <div class="card h-100">
                                  <img class="card-img-top" src="assets/img/proveedores/acconcretos.jpg" alt="Image Description" style=" height: 250px; width: auto;">
                                  <div class="card-body">
                                    <a class="font-weight-bold text-warning">${value.razon_social}</a>
                                    <p class="mb-0 text-justify">${value.descripcion}</p>
                                  </div>
                                </div>
                                <!-- End Card Info -->
                              </div> `;

          $(".proveedores").append(proveedores);
          
      }); 
      
      $('.spiner_provee').css('display', 'none');   
    } else {

      $(".proveedores").html('<p><i class="fas fa-spinner fa-pulse fa-lg text-danger"></i> Cargando...</p>'); 

    } 


  }).fail( function(e) { console.log(e); ver_errores(e); } );
}

//:::::::: D A T O S  C O N T A C T O S :::::::::
function contactos(telefono,direccion,correo,latitud,longuitud) {

  console.log(telefono,direccion,correo,latitud,longuitud);
    if (telefono!=null || direccion!=null || correo!=null || latitud!=null || longuitud!=null
      ||telefono!="" || direccion!=""  || correo!=""  || latitud!="" || longuitud!="" ) {

        var mapa = ` <div class="container space-1 space-lg-3">
                        <div class="row justify-content-md-end">
                          <div class="col-md-6 col-lg-5">
                            <div class="card bg-white position-relative z-index-999 p-5 p-sm-7">
                              <div class="mb-5">
                                <span class="d-block font-size-2 text-dark text-lh-sm">3 medios para</span>
                                <span class="d-block font-size-4 text-dark font-weight-bold text-lh-sm">contactarse</span>
                              </div>
                              <!-- Contacts -->
                              <div id="contactanos_web">
                                <div class="media mb-5">
                                  <span class="icon icon-xs icon-soft-primary icon-circle mr-3">
                                    <i class="fas fa-phone"></i>
                                  </span>
                                  <div class="media-body">
                                    <h5 class=" mb-1">llámanos</h5>
                                    <span class="d-block text-body font-size-1">${telefono!=null || telefono!="" ?telefono:'<i class="fas fa-spinner fa-pulse fa-lg text-danger"></i>'}</span>
                                  </div>
                                </div>
                                <!-- End Contacts -->

                                <!-- Contacts -->
                                <div class="media mb-5">
                                  <span class="icon icon-xs icon-soft-primary icon-circle mr-3">
                                    <i class="fas fa-envelope"></i>
                                  </span>
                                  <div class="media-body text-truncate">
                                    <h5 class=" mb-1">Envíenos un correo</h5>
                                    <span class="d-block text-body font-size-1">${
                                      direccion!="" ?direccion:'<i class="fas fa-spinner fa-pulse fa-lg text-danger"></i>'
                                    }</span>
                                  </div>
                                </div>
                                <!-- End Contacts -->

                                <!-- Contacts -->
                                <div class="media">
                                  <span class="icon icon-xs icon-soft-primary icon-circle mr-3">
                                    <i class="fas fa-map-marker-alt"></i>
                                  </span>
                                  <div class="media-body">
                                    <h5 class=" mb-1">Visítanos</h5>
                                    <span class="d-block text-body font-size-1">${ correo!="" ?correo:'<i class="fas fa-spinner fa-pulse fa-lg text-danger"></i>' }</span>
                                  </div>
                              </div>
                              <!-- End Contacts -->
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Gmap -->
                      <div class="position-md-absolute top-0 right-0 bottom-0 left-0">
                        <div id="map" class="min-h-300rem h-100 rounded-lg"
                              data-hs-leaflet-options='{
                                "map": {
                                  "scrollWheelZoom": false,
                                  "coords": [-6.762046182671631, -79.85085256094776]
                                },
                                "marker": [
                                  {
                                    "coords": [ ${latitud},${longuitud}],
                                    "icon": {
                                      "iconUrl": "./assets/img/contacto/giphy.gif",
                                      "iconSize": [50, 45]
                                    },
                                    "popup": {
                                      "text": "${direccion}",
                                      "title": "SEVEN’S INGENIEROS S.A.C"
                                    }
                                  }
                                ]
                        }'></div>
                      </div>
                      <!-- End Gmap -->`

      $(".mapa").html(mapa);

    } else{
      $(".mapa").html(`<div class="text-center"> <p><i class="fas fa-spinner fa-pulse fa-lg text-danger"></i> Cargando...</p> </div>`);
    }
    // INITIALIZATION OF LEAFLET
    // =======================================================
    var leaflet = $.HSCore.components.HSLeaflet.init($('#map')[0]);

    leaflet.fire('movestart');
    leaflet._rawPanBy([leaflet.getCenter().lng + 250, leaflet.getCenter().lat]);
    leaflet.fire('move');
    leaflet.fire('moveend');

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
      id: 'mapbox/light-v9'
    }).addTo(leaflet);

}




init();

function extrae_extencion(filename) {
  return filename.split('.').pop();
}
