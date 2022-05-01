
//Función que se ejecuta al inicio
function init() {

    mostrar_valores_footer();
    mostrar_datos_g();
    mostrar_servicios_footer();

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
  


init();


