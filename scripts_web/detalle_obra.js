
//Función que se ejecuta al inicio
function init() {

 var idproyecto=localStorage.getItem("idproyecto_detalle");
 console.log(idproyecto);
  detalle_obras(idproyecto); 

}
//::::::::  D E T A L L E S  O B R A S :::::::::si
function detalle_obras(idproyecto) {
  
  $.post("admin/ajax/web.php?op=detalle_proyecto_web", { idproyecto:idproyecto}, function (e, status) {

    e = JSON.parse(e); console.log('KKKKKKKKKKKKKKKKKKK');  
    console.log(e); 

    if (e.status) {

      $.each(e.data.galeria, function (index, value) {

        console.log(value);

          var l_galeria = `<div class="cbp-item">
                                  <div class="cbp-caption">
                                    <img class="rounded-lg" src="admin/dist/img/proyecto/img_galeria/${value.imagen}" alt="Image Description">
                                  </div>
                                </div>`;

          $("#l_galeria").append(l_galeria);
      });

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

init();
function extrae_extencion(filename) {
  return filename.split('.').pop();
}
