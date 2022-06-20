
//Función que se ejecuta al inicio
var idproyecto
function init() {

 idproyecto=localStorage.getItem("idproyecto_detalle");
 console.log(idproyecto);
  detalle_obras(idproyecto); 

  //Cargando select    
  $(".cargando_select").html('<i class="fas fa-spinner fa-pulse fa-lg text-danger"></i>');
  $.post('admin/ajax/web.php?op=select2_view_fase&idproyecto='+idproyecto, function (r) { 
    $("#selec_fase").html(r);
    $(".cargando_select").html('');

  });

}
//:::::::::::::ALL IMAGES :::::::::::::::::::::::::

function all_images() {
  $(".all_content_mages").show();

  $('.all_images').removeAttr("onclick");

  var  cap_selec =  $('#selec_fase').select2('val');

  $(".cargando_spinner").html('<p><i class="fas fa-spinner fa-pulse fa-lg text-danger"></i> Cargando...</p>');
  $("#all_mages").html("");
  $("#total_img").html('<i class="fas fa-spinner fa-pulse fa-lg text-danger"></i>');

  var cont = 0;
  
  $.post("admin/ajax/web.php?op=detalle_proyecto_web", { idproyecto:idproyecto,opcion:'completo',fase_selec:cap_selec}, function (e, status) {

    e = JSON.parse(e); //console.log(e);

    if (e.status=true) {

      $.each(e.data.galeria, function (index, value) {

        $.each(value.imagenes, function (i, key) {

          var all_galeria = ` <div class="col-sm-6 col-lg-4 px-2 px-sm-3 mb-3 mb-sm-5">
                                <!-- Product -->
                                <div class="card card-bordered shadow-none text-center h-100">
                                  <div class="position-relative">
                                    <img class="card-img-top" src="admin/dist/img/proyecto/img_galeria/${key.imagen}" alt="Image Description">

                                    <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                      <button type="button" class="btn btn-xs btn-icon btn-success rounded-circle"  onclick="modal_xl('${key.imagen}','all_image')">
                                        <i class="fas fa-eye"></i>
                                      </button>
                                    </div>
                                  </div>

                                  <div class="card-body pt-2 px-2 pb-0">
                                    <div class="mb-2">
                                      <a class="d-inline-block text-body small font-weight-bold mb-1">${value.numero_fase}. ${value.nombre_fase} - ${key.nombre_imagen}</a>
                                    </div>
                                  </div>
                                </div>
                                <!-- End Product -->
                              </div>`;
                              
                             
          $("#all_mages").append(all_galeria);
          cont+= 1;
        });

      });
      
    } else {

     // $("#all_mages").html('<p><i class="fas fa-spinner fa-pulse fa-lg text-danger"></i> Cargando...</p>'); 
      $(".cargando_spinner").html('<p><i class="fas fa-spinner fa-pulse fa-lg text-danger"></i> Cargando...</p>');

      ver_errores(e);

    } 
    
    $("#total_img").html(cont);
    $(".cargando_spinner").html('');

  }).fail( function(e) { console.log(e); ver_errores(e); } );

}

//::::::::  D E T A L L E S  O B R A S :::::::::si
function detalle_obras(idproyecto) {

  $.post("admin/ajax/web.php?op=detalle_proyecto_web", { idproyecto:idproyecto,opcion:'resumido',fase_selec:'0'}, function (e, status) {

    e = JSON.parse(e); console.log(e);

    if (e.status == true) {

      $.each(e.data.galeria, function (index, value) {

        $.each(value.imagenes, function (i, key) {

          var l_galeria = `<div class="cbp-item" style="width: 401px !important; left: 0px; top: 58px !important;">
                                  <div class="cbp-caption">
                                    <img class="rounded-lg" src="admin/dist/img/proyecto/img_galeria/${key.imagen}" alt="Image Description" onclick="modal_xl('${key.imagen}','_image')">
                                    <p>${value.numero_fase}. ${value.nombre_fase} - ${key.nombre_imagen}</p>
                                  </div>
                                </div>`;

          $("#l_galeria").append(l_galeria);
        });

      });

      var estado="";
      if (e.data.estado_proyecto==1) {
        estado='<span class="badge badge-soft-info mr-2 "> <span class="legend-indicator bg-info"></span>En ejecución </span>';
      } else {
        estado='<span class="badge badge-soft-danger mr-2 "> <span class="legend-indicator bg-danger"></span>Culminada </span>';
      }

      $(".detalles_x_obra").html(`<div
          class="js-sticky-block pl-lg-4"
          data-hs-sticky-block-options='{
              "parentSelector": "#stickyBlockStartPoint",
              "targetSelector": "#logoAndNav",
              "startPoint": "#stickyBlockStartPoint",
              "endPoint": "#stickyBlockEndPoint",
              "stickyOffsetTop": 24,
              "stickyOffsetBottom": 130
            }'>
          <div class="mb-6">
            <h1 class="h2 ">${e.data.nombre_proyecto}</h1>
            <p class="des">${e.data.actividad_trabajo}</p>
          </div>

          <hr class="my-5" />

          <!-- List -->
          <ul class="list-unstyled mb-0">
            <li class="media mb-1">
              <div class="d-flex w-40 w-sm-30">
                <h2 class="h5">Descripción</h5>
              </div>
              <div class="media-body">
                <small class="text-muted"> ${e.data.descripcion} </small>
              </div>
            </li>

            <li class="media mb-1">
              <div class="d-flex w-40 w-sm-30">
                <h3 class="h5">Ubicación</h5>
              </div>
              <div class="media-body">
                <small class="text-muted"> ${e.data.ubicacion} </small>
              </div>
            </li>

            <li class="media mb-1"> 
              <div class="d-flex w-40 w-sm-30"> <h5>Fecha inicio</h5> </div> 
              <div class="media-body"> <small class="text-muted"> ${format_d_m_a(e.data.fecha_inicio)} </small> </div>
            </li>

            <li class="media mb-1"> 
              <div class="d-flex w-40 w-sm-30"> <h5>Fecha fin</h5> </div> 
              <div class="media-body"> <small class="text-muted"> ${format_d_m_a(e.data.fecha_fin)} </small> </div>
            </li>

            <li class="media mb-1"> 
              <div class="d-flex w-40 w-sm-30"> <h5>Días hábiles</h5> </div> 
              <div class="media-body"> <small class="text-muted"> ${e.data.dias_habiles} </small> </div>
            </li>

            <li class="media mb-1"> 
              <div class="d-flex w-40 w-sm-30"> <h5>Dias calendario</h5> </div> 
              <div class="media-body"> <small class="text-muted"> ${e.data.dias_calendario} </small> </div>
            </li>
            <li class="media mb-1"> 
              <div class="d-flex w-40 w-sm-30"> <h5>Estado Actual</h5> </div> 
              <div class="media-body"> ${estado} </div>
            </li>


          </ul>
          <!-- End List -->

          <hr class="my-5" />

          <div class="media">
            <div class="d-flex w-40 w-sm-30">
              <h4>Compartir</h4>
            </div>

            <div class="media-body">
              <!-- Social Networks -->
              <ul class="list-inline mb-0">
                <li class="list-inline-item">
                  <a class="btn btn-xs btn-icon btn-soft-secondary" href="#">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn btn-xs btn-icon btn-soft-secondary" href="#">
                    <i class="fab fa-google"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn btn-xs btn-icon btn-soft-secondary" href="#">
                    <i class="fab fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn btn-xs btn-icon btn-soft-secondary" href="#">
                    <i class="fab fa-github"></i>
                  </a>
                </li>
              </ul>
              <!-- End Social Networks -->
            </div>
          </div>
      </div>`);

      // INITIALIZATION OF CUBEPORTFOLIO
      // =======================================================
      $('.cbp').each(function () {
        var cbp = $.HSCore.components.HSCubeportfolio.init($(this), {
          displayTypeSpeed: 0
        });
      });

      $('.cbp').on('initComplete.cbp', function() {
        // INITIALIZATION OF STICKY BLOCKS
        // =======================================================
        $('.js-sticky-block').each(function () {
          var stickyBlock = new HSStickyBlock($(this)).init();
        });
      });
      
    } else {

      $("#l_galeria").html('<p><i class="fas fa-spinner fa-pulse fa-lg text-danger"></i> Cargando...</p>'); 
      ver_errores(e);

    } 


  }).fail( function(e) { console.log(e); ver_errores(e); } );
}

function modal_xl(imagen,condicion) {

  $("#modal_xl").modal("show");
  $(".img_modal_xl").html(`<img class="rounded-lg" src="admin/dist/img/proyecto/img_galeria/${imagen}" style="width: 100%;"  alt="Image Description"></img>`)
}


init();
function extrae_extencion(filename) {
  return filename.split('.').pop();
}

// convierte de una fecha(aa-mm-dd): 2021-12-23 a una fecha(dd-mm-aa): 23-12-2021
function format_d_m_a(fecha) {

  let splits = fecha.split("-"); //console.log(splits);

  return splits[2]+'-'+splits[1]+'-'+splits[0];
}