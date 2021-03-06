var tabla;
var tabla_fases;
//Función que se ejecuta al inicio
function init() {

  $(".mproyectos").addClass("active");
  listar();  
  //Mostramos los proveedores
  $.post("../ajax/proyecto.php?op=select2_proyecto", function (r) { 
    $("#id_pryecto_adm").html(r); 
    $(".cargando_").html('Proyecto <sup class="text-danger">*</sup>');
    $("#id_pryecto_adm").val('null').trigger("change");
  });

  $("#guardar_registro").on("click", function (e) {$("#submit-form-proyecto").submit();});

  $("#form-imagen-proyect").on("submit", function (e) { guardaryeditar_imagen(e) });

  $("#guardar_registro_fase").on("click", function (e) {$("#submit-form-proyecto-fase").submit();});

  mostrar_section(1);
}
// abrimos el navegador de archivos
$("#doc1_i").click(function() {  $('#doc1').trigger('click'); });
$("#doc1").change(function(e) {  addDocs(e,$("#doc1").attr("id")) });

// Eliminamos el doc 1
function doc1_eliminar() {

	$("#doc1").val("");

	$("#doc1_ver").html('<img src="../dist/svg/drag-n-drop.svg" alt="" width="50%" >');

	$("#doc1_nombre").html("");
}

//Función limpiar
function limpiar() {

  $("#idproyecto").val("");
  $("#id_pryecto_adm").val('null').trigger("change");
  $("#nombre").val("");
  $("#descripcion").val(""); 

  $.post("../ajax/proyecto.php?op=select2_proyecto", function (r) { 
    $("#id_pryecto_adm").html(r); 
    $(".cargando_").html('Proyecto <sup class="text-danger">*</sup>');
    $("#id_pryecto_adm").val('null').trigger("change");
  });

  $("#doc_old_1").val("");
  $("#doc1").val("");  
  $('#doc1_ver').html(`<img src="../dist/svg/drag-n-drop.svg" alt="" width="50%" >`);
  $('#doc1_nombre').html("");

  // Limpiamos las validaciones
  $(".form-control").removeClass('is-valid');
  $(".form-control").removeClass('is-invalid');
  $(".error.invalid-feedback").remove();

}

function mostrar_select(estado) {

  if (estado==1) {
    $(".selectt").show();
    $(".edith").hide();
    $(".selec_proyecto_adm").hide();
    $(".selec_proyecto_adm").hide();
  }

  if (estado==2) {
    $(".selectt").hide();    
    $(".edith").show();
    $(".selec_proyecto_adm").show();
    $(".id_pryecto_adm_edith").show();
  }
  
}

function mostrar_section(estado) {

  if (estado==1) {

    $(".tabla").show();
    $(".botones_galeria").hide();
    $(".btn_add_proyect").show();
    $(".botones_fases").hide();
    
    $(".galeria").hide();
    $("#l_galeria").html("");
    $(".fases_proyecto").hide();
  }

  if (estado==2) {

    $(".tabla").hide();
    $(".botones_galeria").show();
    $(".btn_add_proyect").hide();
    $(".botones_fases").hide();
    
    $(".galeria").show();
    $(".fases_proyecto").hide();
  }

  if (estado==3) {

    $(".tabla").hide();
    $(".botones_galeria").hide();
    $(".btn_add_proyect").hide();
    $(".galeria").hide();

    $(".botones_fases").show();
    $(".fases_proyecto").show();
    
  }

}

//Función Listar
function listar() {

  $(".tabla").hide(); $(".cargando").show();

  tabla=$('#tabla-proyecto').dataTable({
    "responsive": true,
    lengthMenu: [[ -1, 5, 10, 25, 75, 100, 200,], ["Todos", 5, 10, 25, 75, 100, 200, ]],//mostramos el menú de registros a revisar
    "aProcessing": true,//Activamos el procesamiento del datatables
    "aServerSide": true,//Paginación y filtrado realizados por el servidor
    dom: '<Bl<f>rtip>',//Definimos los elementos del control de tabla
    buttons: ['excelHtml5','pdf'],
    "ajax":{
        url: '../ajax/proyecto.php?op=listar',
        type : "get",
        dataType : "json",						
        error: function(e){
          console.log(e.responseText);	
        }
      },
    "language": {
      "lengthMenu": "Mostrar: _MENU_ registros",
      "buttons": {
        "copyTitle": "Tabla Copiada",
        "copySuccess": {
          _: '%d líneas copiadas',
          1: '1 línea copiada'
        }
      }
    },
    "bDestroy": true,
    "iDisplayLength": 5,//Paginación
    "order": [[ 0, "asc" ]]//Ordenar (columna,orden)
  }).DataTable();
    
  $(".tabla").show(); $(".cargando").hide();

}

//ver ficha imagen
function ver_img_perfil(img_perfil,nombre_proyecto){

  $('#modal-ver-imagen').modal("show");
  $('#nombre_proyecto').html(nombre_proyecto);

  if (img_perfil == "" || img_perfil == null  ) {

    $("#ver_imagen").html('<img src="../dist/svg/drag-n-drop.svg" alt="" width="50%" >');

  } else {

    $("#doc1_nombre").html(`<div class="row"> <div class="col-md-12"><i>Baucher.${extrae_extencion(img_perfil)}</i></div></div>`);
    
    // cargamos la imagen adecuada par el archivo
    if ( extrae_extencion(img_perfil) == "pdf" ) {

      $("#ver_imagen").html('<iframe src="../dist/img/proyecto/imagen_perfil/'+img_perfil+'" frameborder="0" scrolling="no" width="100%" height="210"> </iframe>');

    }else{
      if (
        extrae_extencion(img_perfil) == "jpeg" || extrae_extencion(img_perfil) == "jpg" || extrae_extencion(img_perfil) == "jpe" ||
        extrae_extencion(img_perfil) == "jfif" || extrae_extencion(img_perfil) == "gif" || extrae_extencion(img_perfil) == "png" ||
        extrae_extencion(img_perfil) == "tiff" || extrae_extencion(img_perfil) == "tif" || extrae_extencion(img_perfil) == "webp" ||
        extrae_extencion(img_perfil) == "bmp" || extrae_extencion(img_perfil) == "svg" ) {

        $("#ver_imagen").html(`<img src="../dist/img/proyecto/imagen_perfil/${img_perfil}" alt="" width="80%" onerror="this.src='../dist/svg/error-404-x.svg';" >`); 
        
      } else {
        $("#ver_imagen").html('<img src="../dist/svg/doc_si_extencion.svg" alt="" width="50%" >');
      }        
    }      
  }

}

//Función para guardar o editar

function guardaryeditar(e) {
  // e.preventDefault(); //No se activará la acción predeterminada del evento
  var formData = new FormData($("#form-proyecto")[0]);
 
  $.ajax({
    url: "../ajax/proyecto.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,

    success: function (datos) {
             
      if (datos == 'ok') {

				toastr.success('Registrado correctamente')				 

	      tabla.ajax.reload();
         
				limpiar();

        $("#modal-agregar-proyecto").modal("hide");
        

			}else{

				toastr.error(datos)
			}
    },
  });
}

function mostrar(idproyecto) {

  limpiar();
  mostrar_select(2);
  $("#modal-agregar-proyecto").modal("show");
  //$("#proveedor").val("").trigger("change"); 
  $("#cargando-1-fomulario").hide();
  $("#cargando-2-fomulario").show();

  $.post("../ajax/proyecto.php?op=mostrar_valor", { idproyecto: idproyecto }, function (data, status) {

    data = JSON.parse(data);  console.log(data);  

    $("#idproyecto").val(data.data.idproyecto);
    $("#nombre").val(data.data.nombre_valor);
    $("#descripcion").val(data.data.descripcion);
    $(".selec_proyecto_adm").val(data.data.codigo_proyecto);
    $("#id_pryecto_adm_edith").val(data.data.id_proyecto_admin);

    if (data.data.img_perfil == "" || data.data.img_perfil == null  ) {

      $("#doc1_ver").html('<img src="../dist/svg/drag-n-drop.svg" alt="" width="50%" >');

      $("#doc1_nombre").html('');

      $("#doc_old_1").val(""); $("#doc1").val("");

    } else {

      $("#doc_old_1").val(data.data.img_perfil); 

      $("#doc1_nombre").html(`<div class="row"> <div class="col-md-12"><i>Baucher.${extrae_extencion(data.data.img_perfil)}</i></div></div>`);
      
      // cargamos la imagen adecuada par el archivo
      if ( extrae_extencion(data.data.img_perfil) == "pdf" ) {

        $("#doc1_ver").html('<iframe src="../dist/img/proyecto/imagen_perfil/'+data.data.img_perfil+'" frameborder="0" scrolling="no" width="100%" height="210"> </iframe>');

      }else{
        if (
          extrae_extencion(data.data.img_perfil) == "jpeg" || extrae_extencion(data.data.img_perfil) == "jpg" || extrae_extencion(data.data.img_perfil) == "jpe" ||
          extrae_extencion(data.data.img_perfil) == "jfif" || extrae_extencion(data.data.img_perfil) == "gif" || extrae_extencion(data.data.img_perfil) == "png" ||
          extrae_extencion(data.data.img_perfil) == "tiff" || extrae_extencion(data.data.img_perfil) == "tif" || extrae_extencion(data.data.img_perfil) == "webp" ||
          extrae_extencion(data.data.img_perfil) == "bmp" || extrae_extencion(data.data.img_perfil) == "svg" ) {

          $("#doc1_ver").html(`<img src="../dist/img/proyecto/imagen_perfil/${data.data.img_perfil}" alt="" width="100%" onerror="this.src='../dist/svg/error-404-x.svg';" >`); 
          
        } else {
          $("#doc1_ver").html('<img src="../dist/svg/doc_si_extencion.svg" alt="" width="50%" >');
        }        
      }      
    }

    $("#cargando-1-fomulario").show();
    $("#cargando-2-fomulario").hide();

  }).fail( function(e) { console.log(e); ver_errores(e); } );
}

//Función para eliminar registros
function eliminar(idproyecto) {
  Swal.fire({
    title: "¿Está Seguro de  Eliminar el registro?",
    text: "",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#28a745",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Eliminar!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post("../ajax/proyecto.php?op=eliminar", { idproyecto: idproyecto }, function (e) {

        Swal.fire("Eliminado!", "Tu registro ha sido Eliminado.", "success");
    
        tabla.ajax.reload();
        total();
      });      
    }
  });   
}
//::::::::::::::: G A L E R Í A :::::::::.

// abrimos el navegador de archivos
$("#doc2_i").click(function() {  $('#doc2').trigger('click'); });
$("#doc2").change(function(e) {  addDocs(e,$("#doc2").attr("id")) });

// Eliminamos el doc 1
function doc2_eliminar() {

	$("#doc2").val("");

	$("#doc2_ver").html('<img src="../dist/svg/drag-n-drop.svg" alt="" width="50%" >');

	$("#doc2_nombre").html("");
}

function limpiar_galeria() {

  $("#idgaleria_proyecto").val("");

  $("#doc_old_2").val("");
  $("#doc2").val("");  
  $('#doc2_ver').html(`<img src="../dist/svg/drag-n-drop.svg" alt="" width="50%" >`);
  $('#doc2_nombre').html("");

}

function galeria(idproyecto) { 
  console.log('idproyecto_gale ---------- '+idproyecto);

  $("#idproyecto_img").val(idproyecto); 

  localStorage.setItem('idproyecto_img',idproyecto);

  mostrar_section(2);

  //Mostramos los proveedores
  $.post('../ajax/proyecto.php?op=select2_fases&idproyecto='+idproyecto, function (r) { 
    $("#id_fase_select").html(r); 
    $(".cargando_select").html('Fase <sup class="text-danger">*</sup>');
    $("#id_fase_select").val('null').trigger("change");
  });

  $("#g_cargando").html(' <p><i class="fas fa-spinner fa-pulse fa-1x"></i> <h4>Cargando...</h4></p>');

  $.post("../ajax/proyecto.php?op=listar_galeria", {idproyecto:idproyecto }, function (e, status) {

    $("#l_galeria").html("");

    e = JSON.parse(e); console.log(e); 
    imagen="";
    if (e.status == true) {
      if (e.data.length == 0) {
        $("#g_cargando").html(`<div class="col-lg-12">
        <div class="cbp-item product">
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Ninguna imagen por mostrar!</strong> puede registar una en el boton   <strong> 
            <button type="button" class="btn btn-primary btn-xs" style="cursor: no-drop;"><i class="fas fa-plus-circle"></i> Agregar</button></strong> en la parte superior.
          </div>
        </div>
      </div>`);

      } else {

        $.each(e.data, function (index, value) {

          if (value.imagen!=null || value.imagen!="") { imagen='../dist/img/proyecto/img_galeria/'+value.imagen; } else { imagen='../dist/svg/drag-n-drop.svg'; }

            var l_galeria = ` <div class="col-lg-4">
                                <div class="cbp-item product">
                                    <div class="overflow-hidden rounded-lg">
                                      <div class="cbp-caption-defaultWrap geeks">
                                        <img class="rounded-lg" src="${imagen}" style="width: 90%;" onerror="this.src='../dist/svg/drag-n-drop.svg';" alt="Image Description">
                                      </div>
                                      <div class="text-center font-size-11px">
                                      <i>${value.nombre_imagen}</i>
                                      </div>
                                    </div>
                                    <div class="card-footer">
                                      <ul class="list-inline list-separator small text-body">
                                        <li class="list-inline-item" > 
                                          <a style="cursor: pointer; font-size: 13px;" onclick="editar_imagen(${value.idgaleria_proyecto},${value.idfase_proyecto},'${value.imagen}','${value.nombre_imagen}')"> 
                                            <span class="badge badge-soft-warning mr-2"  style="font-size: 13px;"> Editar</span> 
                                          </a>
                                        </li>
                                        <li class="list-inline-item">
                                          <a style="cursor: pointer; font-size: 13px;" onclick="eliminar_imagen(${value.idgaleria_proyecto})"> 
                                              <span class="badge badge-soft-danger mr-2"  style="font-size: 13px;"> Eliminar</span> 
                                          </a>
                                        </li>
                                      </ul>
                                    </div>
                                </div>
                              </div>`;

            $("#l_galeria").append(l_galeria);
            
        });

        $("#g_cargando").html("");

      }
    } else {
      ver_errores(e);
    }   

  }).fail( function(e) { console.log(e); ver_errores(e); } );

}

function guardaryeditar_imagen(e) {
  e.preventDefault(); //No se activará la acción predeterminada del evento
  var formData = new FormData($("#form-imagen-proyect")[0]);

  $.ajax({
    url: "../ajax/proyecto.php?op=guardaryeditar_imagen",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,

    success: function (datos) {
      if (datos == "ok") {
        Swal.fire("Correcto!", "Datos actualizados correctamente", "success");
        galeria(localStorage.getItem('idproyecto_img'));
        $("#modal-agregar-imagen").modal("hide");

      } else {
        Swal.fire("Error!", datos, "error");
      }
    }

  });
}

function editar_imagen(idgaleria_proyecto,idfase_proyecto,imagen,nombre_imagen) {

    limpiar_galeria();
    
    $("#modal-agregar-imagen").modal("show");
    $("#id_fase_select").val("").trigger("change"); 
    
    $("#cargando-3-fomulario").hide();
    $("#cargando-4-fomulario").show();

    $("#id_fase_select").val(idfase_proyecto).trigger("change"); 

    $("#idgaleria_proyecto").val(idgaleria_proyecto);
    $("#nombre_img").val(nombre_imagen);

    if (imagen == "" || imagen == null  ) {

      $("#doc2_ver").html('<img src="../dist/svg/drag-n-drop.svg" alt="" width="50%" >');

      $("#doc2_nombre").html('');

      $("#doc_old_2").val(""); $("#doc2").val("");

    } else {

      $("#doc_old_2").val(imagen); 

      $("#doc2_nombre").html(`<div class="row"> <div class="col-md-12"><i>Baucher.${extrae_extencion(imagen)}</i></div></div>`);
      
      // cargamos la imagen adecuada par el archivo
      if ( extrae_extencion(imagen) == "pdf" ) {

        $("#doc2_ver").html('<iframe src="../dist/img/proyecto/img_galeria/'+imagen+'" frameborder="0" scrolling="no" width="100%" height="210"> </iframe>');

      }else{
        if (
          extrae_extencion(imagen) == "jpeg" || extrae_extencion(imagen) == "jpg" || extrae_extencion(imagen) == "jpe" ||
          extrae_extencion(imagen) == "jfif" || extrae_extencion(imagen) == "gif" || extrae_extencion(imagen) == "png" ||
          extrae_extencion(imagen) == "tiff" || extrae_extencion(imagen) == "tif" || extrae_extencion(imagen) == "webp" ||
          extrae_extencion(imagen) == "bmp" || extrae_extencion(imagen) == "svg" ) {

          $("#doc2_ver").html(`<img src="../dist/img/proyecto/img_galeria/${imagen}" alt="" width="100%" onerror="this.src='../dist/svg/error-404-x.svg';" >`); 
          
        } else {
          $("#doc2_ver").html('<img src="../dist/svg/doc_si_extencion.svg" alt="" width="50%" >');
        }        
      }      
    }

    $("#cargando-3-fomulario").show();
    $("#cargando-4-fomulario").hide();
}

function eliminar_imagen(idgaleria_proyecto) {
  Swal.fire({
    title: "¿Está Seguro de  Eliminar el registro?",
    text: "",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#28a745",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Eliminar!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post("../ajax/proyecto.php?op=eliminar_galeria", { idgaleria_proyecto: idgaleria_proyecto }, function (e) {

        Swal.fire("Eliminado!", "Tu registro ha sido Eliminado.", "success");
        galeria(localStorage.getItem('idproyecto_img'));
      });      
    }
  });   
}
//:::::::::::::::F A C E S  P R O Y E C T O :::::::::.
function limpiar_fase(){

  $("idfase").val("");
  $("n_fase").val("");
  $("nombre_fase").val("");

}

function fases_proyecto(idproyecto) {
  mostrar_section(3);
  $("#idproyecto_fase").val(idproyecto)
  
  //$("#f_cargando").html(' <p><i class="fas fa-spinner fa-pulse fa-1x"></i> <h4>Cargando...</h4></p>');

  tabla_fases=$('#tabla-fases').dataTable({
    "responsive": true,
    lengthMenu: [[ -1, 5, 10, 25, 75, 100, 200,], ["Todos", 5, 10, 25, 75, 100, 200, ]],//mostramos el menú de registros a revisar
    "aProcessing": true,//Activamos el procesamiento del datatables
    "aServerSide": true,//Paginación y filtrado realizados por el servidor
    dom: '<Bl<f>rtip>',//Definimos los elementos del control de tabla
    buttons: ['excelHtml5','pdf'],
    "ajax":{
        url: '../ajax/proyecto.php?op=listar_fase&idproyecto='+idproyecto,
        type : "get",
        dataType : "json",						
        error: function(e){
          console.log(e.responseText);	
        }
      },
    "language": {
      "lengthMenu": "Mostrar: _MENU_ registros",
      "buttons": {
        "copyTitle": "Tabla Copiada",
        "copySuccess": {
          _: '%d líneas copiadas',
          1: '1 línea copiada'
        }
      }
    },
    "bDestroy": true,
    "iDisplayLength": 5,//Paginación
    "order": [[ 0, "asc" ]]//Ordenar (columna,orden)
  }).DataTable();
}

function guardaryeditar_fase(e) {
  //e.preventDefault(); //No se activará la acción predeterminada del evento
  var formData = new FormData($("#form-fase")[0]);

  $.ajax({
    url: "../ajax/proyecto.php?op=guardaryeditar_fase",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,

    success: function (datos) {
      if (datos == "ok") {
        Swal.fire("Correcto!", "Datos actualizados correctamente", "success");
        $("#modal-agregar-fase").modal("hide");
        tabla_fases.ajax.reload();
      } else {
        Swal.fire("Error!", datos, "error");
      }
    }

  });
}

function mostrar_fase(idfase_proyecto) {

  limpiar_fase();
  mostrar_select(3);

  $("#modal-agregar-fase").modal("show");

  $("#cargando-5-fomulario").hide();
  $("#cargando-6-fomulario").show();

  $.post("../ajax/proyecto.php?op=mostrar_fase", { idfase: idfase_proyecto }, function (e, status) {

    e = JSON.parse(e);  console.log(e);  

    $("#idfase").val(e.data.idfase_proyecto);
    $("#idproyecto_fase").val(e.data.idproyecto);
    $("#n_fase").val(e.data.numero_fase);
    $("#nombre_f").val(e.data.nombre);

    $("#cargando-5-fomulario").show();
    $("#cargando-6-fomulario").hide();

  }).fail( function(e) { console.log(e); ver_errores(e); } );
  
}

//Función para eliminar registros
function eliminar_fase(idfase_proyecto) {
  Swal.fire({
    title: "¿Está Seguro de  Eliminar el registro?",
    text: "",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#28a745",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Eliminar!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post("../ajax/proyecto.php?op=eliminar_fase", { idfase: idfase_proyecto }, function (e) {

        Swal.fire("Eliminado!", "Tu registro ha sido Eliminado.", "success");
    
        tabla_fases.ajax.reload();
      });      
    }
  });   
}


init();

$(function () {

  
  $.validator.setDefaults({

    submitHandler: function (e) {
        guardaryeditar(e);
      
    },
  });
  

  $("#form-proyecto").validate({
    ignore: '.select2-input, .select2-focusser',
    rules: {

      nombre:{required: true},
      descripcion:{required: true}, 
      // terms: { required: true },
    },
    messages: {

        nombre: { required: "Campo requerido", },
        descripcion: { required: "Campo requerido", }, 

    },
        
    errorElement: "span",

    errorPlacement: function (error, element) {

      error.addClass("invalid-feedback");

      element.closest(".form-group").append(error);
    },

    highlight: function (element, errorClass, validClass) {

      $(element).addClass("is-invalid").removeClass("is-valid");
    },

    unhighlight: function (element, errorClass, validClass) {

      $(element).removeClass("is-invalid").addClass("is-valid");
   
    },


  });

});

$(function () {
  
  $.validator.setDefaults({ submitHandler: function (e) { guardaryeditar_fase(e); }, });
  
  $("#form-fase").validate({
    rules: {
      n_fase:{required: true},
      nombre_f:{required: true},
      // terms: { required: true },
    },
    messages: {

        n_fase: { required: "Campo requerido", },
        nombre_f: { required: "Campo requerido", },

    },
        
    errorElement: "span",

    errorPlacement: function (error, element) {

      error.addClass("invalid-feedback");

      element.closest(".form-group").append(error);
    },

    highlight: function (element, errorClass, validClass) {

      $(element).addClass("is-invalid").removeClass("is-valid");
    },

    unhighlight: function (element, errorClass, validClass) {

      $(element).removeClass("is-invalid").addClass("is-valid");
   
    },


  });

});

function extrae_extencion(filename) {
    return filename.split('.').pop();
  }

/* PREVISUALIZAR LOS DOCUMENTOS */
function addDocs(e,id) {

  $("#"+id+"_ver").html('<i class="fas fa-spinner fa-pulse fa-6x"></i><br><br>');	console.log(id);

	var file = e.target.files[0], archivoType = /image.*|application.*/;
	
	if (e.target.files[0]) {
    
		var sizeByte = file.size; console.log(file.type);

		var sizekiloBytes = parseInt(sizeByte / 1024);

		var sizemegaBytes = (sizeByte / 1000000);
		// alert("KILO: "+sizekiloBytes+" MEGA: "+sizemegaBytes)

		if (!file.type.match(archivoType) ){
			// return;
      Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Este tipo de ARCHIVO no esta permitido elija formato: .pdf, .png. .jpeg, .jpg, .jpe, .webp, .svg',
        showConfirmButton: false,
        timer: 1500
      });

      $("#"+id+"_ver").html('<img src="../dist/svg/drag-n-drop.svg" alt="" width="50%" >'); 

		}else{

			if (sizekiloBytes <= 40960) {

				var reader = new FileReader();

				reader.onload = fileOnload;

				function fileOnload(e) {

					var result = e.target.result;

          // cargamos la imagen adecuada par el archivo
				  if ( extrae_extencion(file.name) == "doc") {
            $("#"+id+"_ver").html('<img src="../dist/svg/doc.svg" alt="" width="50%" >');
          } else {
            if ( extrae_extencion(file.name) == "docx" ) {
              $("#"+id+"_ver").html('<img src="../dist/svg/docx.svg" alt="" width="50%" >');
            }else{
              if ( extrae_extencion(file.name) == "pdf" ) {
                $("#"+id+"_ver").html(`<iframe src="${result}" frameborder="0" scrolling="no" width="100%" height="310"></iframe>`);
              }else{
                if ( extrae_extencion(file.name) == "csv" ) {
                  $("#"+id+"_ver").html('<img src="../dist/svg/csv.svg" alt="" width="50%" >');
                } else {
                  if ( extrae_extencion(file.name) == "xls" ) {
                    $("#"+id+"_ver").html('<img src="../dist/svg/xls.svg" alt="" width="50%" >');
                  } else {
                    if ( extrae_extencion(file.name) == "xlsx" ) {
                      $("#"+id+"_ver").html('<img src="../dist/svg/xlsx.svg" alt="" width="50%" >');
                    } else {
                      if ( extrae_extencion(file.name) == "xlsm" ) {
                        $("#"+id+"_ver").html('<img src="../dist/svg/xlsm.svg" alt="" width="50%" >');
                      } else {
                        if (
                          extrae_extencion(file.name) == "jpeg" || extrae_extencion(file.name) == "jpg" || extrae_extencion(file.name) == "jpe" ||
                          extrae_extencion(file.name) == "jfif" || extrae_extencion(file.name) == "gif" || extrae_extencion(file.name) == "png" ||
                          extrae_extencion(file.name) == "tiff" || extrae_extencion(file.name) == "tif" || extrae_extencion(file.name) == "webp" ||
                          extrae_extencion(file.name) == "bmp" || extrae_extencion(file.name) == "svg" ) {

                          $("#"+id+"_ver").html(`<img src="${result}" alt="" width="100%" onerror="this.src='../dist/svg/error-404-x.svg';" >`); 
                          
                        } else {
                          $("#"+id+"_ver").html('<img src="../dist/svg/doc_si_extencion.svg" alt="" width="50%" >');
                        }
                        
                      }
                    }
                  }
                }
              }
            }
          } 
					$("#"+id+"_nombre").html(`<div class="row">
            <div class="col-md-12">
              <i> ${file.name} </i>
            </div>
            <div class="col-md-12">
              <button class="btn btn-danger btn-block btn-xs" onclick="${id}_eliminar();" type="button" ><i class="far fa-trash-alt"></i></button>
            </div>
          </div>`);

          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: `La imagen: ${file.name.toUpperCase()} es aceptado.`,
            showConfirmButton: false,
            timer: 1500
          });
				}

				reader.readAsDataURL(file);

			} else {
        Swal.fire({
          position: 'top-end',
          icon: 'warning',
          title: `La imagen: ${file.name.toUpperCase()} es muy pesado.`,
          showConfirmButton: false,
          timer: 1500
        })

        $("#"+id+"_ver").html('<img src="../dist/svg/drag-n-drop.svg" alt="" width="50%" >');
        $("#"+id+"_nombre").html("");
				$("#"+id).val("");
			}
		}
	}else{
    Swal.fire({
      position: 'top-end',
      icon: 'error',
      title: 'Seleccione un documento',
      showConfirmButton: false,
      timer: 1500
    })
		 
    $("#"+id+"_ver").html('<img src="../dist/svg/drag-n-drop.svg" alt="" width="50%" >');
		$("#"+id+"_nombre").html("");
    $("#"+id).val("");
	}	
}

// recargar un doc para ver
function re_visualizacion(id, carpeta) {

  $("#doc"+id+"_ver").html('<i class="fas fa-spinner fa-pulse fa-6x"></i><br><br>'); console.log(id);

  pdffile     = document.getElementById("doc"+id+"").files[0];

  var antiguopdf  = $("#doc_old_"+id+"").val();

  if(pdffile === undefined){

    if (antiguopdf == "") {

      Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: 'Seleccione un documento',
        showConfirmButton: false,
        timer: 1500
      })

      $("#doc"+id+"_ver").html('<img src="./dist/svg/drag-n-drop.svg" alt="" width="50%" >');

		  $("#doc"+id+"_nombre").html("");

    } else {
      if ( extrae_extencion(antiguopdf) == "doc") {
        $("#doc"+id+"_ver").html('<img src="../dist/svg/doc.svg" alt="" width="50%" >');
        toastr.error('Documento NO TIENE PREVIZUALIZACION!!!')
      } else {
        if ( extrae_extencion(antiguopdf) == "docx" ) {
          $("#doc"+id+"_ver").html('<img src="../dist/svg/docx.svg" alt="" width="50%" >');
          toastr.error('Documento NO TIENE PREVIZUALIZACION!!!')
        } else {
          if ( extrae_extencion(antiguopdf) == "pdf" ) { 
            $("#doc"+id+"_ver").html(`<iframe src="../dist/dist/img/proyecto/${carpeta}/${antiguopdf}" frameborder="0" scrolling="no" width="100%" height="310"></iframe>`);
            toastr.success('Documento vizualizado correctamente!!!')
          } else {
            if ( extrae_extencion(antiguopdf) == "csv" ) {
              $("#doc"+id+"_ver").html('<img src="../dist/svg/csv.svg" alt="" width="50%" >');
              toastr.error('Documento NO TIENE PREVIZUALIZACION!!!')
            } else {
              if ( extrae_extencion(antiguopdf) == "xls" ) {
                $("#doc"+id+"_ver").html('<img src="../dist/svg/xls.svg" alt="" width="50%" >');
                toastr.error('Documento NO TIENE PREVIZUALIZACION!!!')
              } else {
                if ( extrae_extencion(antiguopdf) == "xlsx" ) {
                  $("#doc"+id+"_ver").html('<img src="../dist/svg/xlsx.svg" alt="" width="50%" >');
                  toastr.error('Documento NO TIENE PREVIZUALIZACION!!!')
                } else {
                  if ( extrae_extencion(antiguopdf) == "xlsm" ) {
                    $("#doc"+id+"_ver").html('<img src="../dist/svg/xlsm.svg" alt="" width="50%" >');
                    toastr.error('Documento NO TIENE PREVIZUALIZACION!!!')
                  } else {
                    if (
                      extrae_extencion(antiguopdf) == "jpeg" || extrae_extencion(antiguopdf) == "jpg" || extrae_extencion(antiguopdf) == "jpe" ||
                      extrae_extencion(antiguopdf) == "jfif" || extrae_extencion(antiguopdf) == "gif" || extrae_extencion(antiguopdf) == "png" ||
                      extrae_extencion(antiguopdf) == "tiff" || extrae_extencion(antiguopdf) == "tif" || extrae_extencion(antiguopdf) == "webp" ||
                      extrae_extencion(antiguopdf) == "bmp" || extrae_extencion(antiguopdf) == "svg" ) {
  
                      $("#doc"+id+"_ver").html(`<img src="../dist/img/proyecto/${carpeta}/${antiguopdf}" alt="" onerror="this.src='../dist/svg/error-404-x.svg';" width="100%" >`);
                      toastr.success('Documento vizualizado correctamente!!!');
                    } else {
                      $("#doc"+id+"_ver").html('<img src="../dist/svg/doc_si_extencion.svg" alt="" width="50%" >');
                      toastr.error('Documento NO TIENE PREVIZUALIZACION!!!')
                    }                    
                  }
                }
              }
            }
          }
        }
      }      
    }
    // console.log('hola'+dr);
  }else{

    pdffile_url=URL.createObjectURL(pdffile);

    // cargamos la imagen adecuada par el archivo
    if ( extrae_extencion(pdffile.name) == "doc") {
      $("#doc"+id+"_ver").html('<img src="../dist/svg/doc.svg" alt="" width="50%" >');
      toastr.error('Documento NO TIENE PREVIZUALIZACION!!!')
    } else {
      if ( extrae_extencion(pdffile.name) == "docx" ) {
        $("#doc"+id+"_ver").html('<img src="../dist/svg/docx.svg" alt="" width="50%" >');
        toastr.error('Documento NO TIENE PREVIZUALIZACION!!!')
      }else{
        if ( extrae_extencion(pdffile.name) == "pdf" ) {
          $("#doc"+id+"_ver").html('<iframe src="'+pdffile_url+'" frameborder="0" scrolling="no" width="100%" height="310"> </iframe>');
          toastr.success('Documento vizualizado correctamente!!!');
        }else{
          if ( extrae_extencion(pdffile.name) == "csv" ) {
            $("#doc"+id+"_ver").html('<img src="../dist/svg/csv.svg" alt="" width="50%" >');
            toastr.error('Documento NO TIENE PREVIZUALIZACION!!!');
          } else {
            if ( extrae_extencion(pdffile.name) == "xls" ) {
              $("#doc"+id+"_ver").html('<img src="../dist/svg/xls.svg" alt="" width="50%" >');
              toastr.error('Documento NO TIENE PREVIZUALIZACION!!!');
            } else {
              if ( extrae_extencion(pdffile.name) == "xlsx" ) {
                $("#doc"+id+"_ver").html('<img src="../dist/svg/xlsx.svg" alt="" width="50%" >');
                toastr.error('Documento NO TIENE PREVIZUALIZACION!!!');
              } else {
                if ( extrae_extencion(pdffile.name) == "xlsm" ) {
                  $("#doc"+id+"_ver").html('<img src="../dist/svg/xlsm.svg" alt="" width="50%" >');
                  toastr.error('Documento NO TIENE PREVIZUALIZACION!!!');
                } else {
                  if (
                    extrae_extencion(pdffile.name) == "jpeg" || extrae_extencion(pdffile.name) == "jpg" || extrae_extencion(pdffile.name) == "jpe" ||
                    extrae_extencion(pdffile.name) == "jfif" || extrae_extencion(pdffile.name) == "gif" || extrae_extencion(pdffile.name) == "png" ||
                    extrae_extencion(pdffile.name) == "tiff" || extrae_extencion(pdffile.name) == "tif" || extrae_extencion(pdffile.name) == "webp" ||
                    extrae_extencion(pdffile.name) == "bmp" || extrae_extencion(pdffile.name) == "svg" ) {

                    $("#doc"+id+"_ver").html(`<img src="${pdffile_url}" alt="" width="100%" >`);
                    toastr.success('Documento vizualizado correctamente!!!');
                  } else {
                    $("#doc"+id+"_ver").html('<img src="../dist/svg/doc_si_extencion.svg" alt="" width="50%" >');
                    toastr.error('Documento NO TIENE PREVIZUALIZACION!!!');
                  }                  
                }
              }
            }
          }
        }
      }
    }     	
    console.log(pdffile);
  }
}



