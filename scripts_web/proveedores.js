var tabla;

//Función que se ejecuta al inicio
function init() {
  mostrar_proveedores();

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

init();

function extrae_extencion(filename) {
  return filename.split('.').pop();
}
