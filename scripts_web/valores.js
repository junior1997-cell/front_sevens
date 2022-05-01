var tabla;

//Función que se ejecuta al inicio
function init() {

  mostrar_valores();  
  mostrar_valores_footer();

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


init();


