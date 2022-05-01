var tabla;

//Función que se ejecuta al inicio
function init() {
//http://localhost/front/landing-classic-studio.html
  $(".mproveedores").addClass("active");
  listar();  
  //Mostramos los proveedores
  $.post("../ajax/proveedores.php?op=select2_proveedor", function (r) { 
    $("#id_proveedor_adm").html(r); 
    $(".cargando__").html('Proveedor <sup class="text-danger">*</sup>');
    $("#id_proveedor_adm").val('null').trigger("change");
  });

  $("#guardar_registro").on("click", function (e) { $("#submit-form-proveedores").submit();});
  
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

  $("#idproveedor").val("");
  $("#id_proveedor_adm").val('null').trigger("change");
  $("#nombre").val("");
  $("#descripcion").val(""); 

  $.post("../ajax/proveedores.php?op=select2_proveedor", function (r) { 
    $("#id_proveedor_adm").html(r); 
    $(".cargando__").html('Proveedor <sup class="text-danger">*</sup>');
    $("#id_proveedor_adm").val('null').trigger("change");
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
    $(".selec_proveedor_adm").hide();
    $(".selec_proveedor_adm").hide();
  }

  if (estado==2) {
    $(".selectt").hide();    
    $(".edith").show();
    $(".selec_proveedor_adm").show();
    $(".id_proveedor_adm_edith").show();
  }
  
}

//Función Listar
function listar() {

  $(".tabla").hide();
  $(".cargando").show();

  tabla=$('#tabla-proveedor').dataTable({
    "responsive": true,
    lengthMenu: [[ -1, 5, 10, 25, 75, 100, 200,], ["Todos", 5, 10, 25, 75, 100, 200, ]],//mostramos el menú de registros a revisar
    "aProcessing": true,//Activamos el procesamiento del datatables
    "aServerSide": true,//Paginación y filtrado realizados por el servidor
    dom: '<Bl<f>rtip>',//Definimos los elementos del control de tabla
    buttons: ['excelHtml5','pdf'],
    "ajax":{
        url: '../ajax/proveedores.php?op=listar',
        type : "get",
        dataType : "json",						
        error: function(e){
          console.log(e.responseText);	
        }
      },
      createdRow: function (row, data, ixdex) {
        // columna: #
        if (data[1] != '') {
          $("td", row).eq(1).addClass('text-center');
        }
        // columna: #
        if (data[2] != '') {
          $("td", row).eq(2).addClass('text-nowrap');
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
      },
      sLoadingRecords: '<i class="fas fa-spinner fa-pulse fa-lg"></i> Cargando datos...'
    },
    "bDestroy": true,
    "iDisplayLength": 5,//Paginación
    "order": [[ 0, "asc" ]]//Ordenar (columna,orden)
  }).DataTable();
  
  $(".tabla").show();
  $(".cargando").hide();
}

//ver ficha tecnica
function modal_comprobante(comprobante){

  var extencion = comprobante.substr(comprobante.length - 3); // => "1"
  //console.log(extencion);
  $('#ver_fact_pdf').html('');
  $('#img-factura').attr("src", "");
  $('#modal-ver-comprobante').modal("show");

  if (extencion=='jpeg' || extencion=='jpg' || extencion=='png' || extencion=='webp') {
    $('#ver_fact_pdf').hide();
    $('#img-factura').show();
    $('#img-factura').attr("src", "../dist/img/proveedores/imagen_perfil/"+comprobante);

    $("#iddescargar").attr("href","../dist/img/proveedores/imagen_perfil/"+comprobante);

  }else{
    $('#img-factura').hide();
    
    $('#ver_fact_pdf').show();

    $('#ver_fact_pdf').html('<iframe src="../dist/img/proveedores/imagen_perfil/'+comprobante+'" frameborder="0" scrolling="no" width="100%" height="350"></iframe>');

    $("#iddescargar").attr("href","../dist/img/proveedores/imagen_perfil/"+comprobante);
  }
}

//Función para guardar o editar
function guardaryeditar(e) {
  // e.preventDefault(); //No se activará la acción predeterminada del evento
  var formData = new FormData($("#form-proveedores")[0]);
 
  $.ajax({
    url: "../ajax/proveedores.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (datos) {
             
      if (datos == 'ok') {

				toastr.success('Registrado correctamente')				 

	      tabla.ajax.reload();
         
				limpiar();

        $("#modal-agregar-proveedores").modal("hide");
        

			}else{

				toastr.error(datos)
			}
    },
  });
}

function mostrar(idproveedor) {

  limpiar();
  mostrar_select(2);
  $("#modal-agregar-proveedores").modal("show");
  //$("#proveedor").val("").trigger("change"); 
  $("#cargando-1-fomulario").hide();
  $("#cargando-2-fomulario").show();

  $.post("../ajax/proveedores.php?op=mostrar", { idproveedor: idproveedor }, function (data, status) {

    data = JSON.parse(data);  console.log(data);  

    $("#idproveedor").val(data.data.idproveedor);
    $("#nombre").val(data.data.nombre_valor);
    $("#descripcion").val(data.data.descripcion);
    $(".selec_proveedor_adm").val(data.data.razon_social+' - '+data.data.num_documento);
    $("#id_proveedor_adm_edith").val(data.data.id_proveedor_admin);

    if (data.data.img_perfil == "" || data.data.img_perfil == null  ) {

      $("#doc1_ver").html('<img src="../dist/svg/drag-n-drop.svg" alt="" width="50%" >');

      $("#doc1_nombre").html('');

      $("#doc_old_1").val(""); $("#doc1").val("");

    } else {

      $("#doc_old_1").val(data.data.img_perfil); 

      $("#doc1_nombre").html(`<div class="row"> <div class="col-md-12"><i>Imagen.${extrae_extencion(data.data.img_perfil)}</i></div></div>`);
      
      // cargamos la imagen adecuada par el archivo
      if ( extrae_extencion(data.data.img_perfil) == "pdf" ) {

        $("#doc1_ver").html('<iframe src="../dist/img/proveedores/imagen_perfil/'+data.data.img_perfil+'" frameborder="0" scrolling="no" width="100%" height="210"> </iframe>');

      }else{
        if (
          extrae_extencion(data.data.img_perfil) == "jpeg" || extrae_extencion(data.data.img_perfil) == "jpg" || extrae_extencion(data.data.img_perfil) == "jpe" ||
          extrae_extencion(data.data.img_perfil) == "jfif" || extrae_extencion(data.data.img_perfil) == "gif" || extrae_extencion(data.data.img_perfil) == "png" ||
          extrae_extencion(data.data.img_perfil) == "tiff" || extrae_extencion(data.data.img_perfil) == "tif" || extrae_extencion(data.data.img_perfil) == "webp" ||
          extrae_extencion(data.data.img_perfil) == "bmp" || extrae_extencion(data.data.img_perfil) == "svg" ) {

          $("#doc1_ver").html(`<img src="../dist/img/proveedores/imagen_perfil/${data.data.img_perfil}" alt="" width="100%" onerror="this.src='../dist/svg/error-404-x.svg';" >`); 
          
        } else {
          $("#doc1_ver").html('<img src="../dist/svg/doc_si_extencion.svg" alt="" width="50%" >');
        }        
      }      
    }

    $("#cargando-1-fomulario").show();
    $("#cargando-2-fomulario").hide();

  }).fail( function(e) { console.log(e); ver_errores(e); } );
}

//ver img proveedores
function ver_img_perfil(img_perfil,razon_social){

  $('#modal-ver-imagen').modal("show");
  $('#razon_social').html(razon_social);

  if (img_perfil == "" || img_perfil == null  ) {

    $("#ver_imagen").html('<img src="../dist/svg/drag-n-drop.svg" alt="" width="50%" >');

  } else {

    $("#doc1_nombre").html(`<div class="row"> <div class="col-md-12"><i>Imagen.${extrae_extencion(img_perfil)}</i></div></div>`);
    
    // cargamos la imagen adecuada par el archivo
    if ( extrae_extencion(img_perfil) == "pdf" ) {

      $("#ver_imagen").html('<iframe src="../dist/img/proveedores/imagen_perfil/'+img_perfil+'" frameborder="0" scrolling="no" width="100%" height="210"> </iframe>');

    }else{
      if (
        extrae_extencion(img_perfil) == "jpeg" || extrae_extencion(img_perfil) == "jpg" || extrae_extencion(img_perfil) == "jpe" ||
        extrae_extencion(img_perfil) == "jfif" || extrae_extencion(img_perfil) == "gif" || extrae_extencion(img_perfil) == "png" ||
        extrae_extencion(img_perfil) == "tiff" || extrae_extencion(img_perfil) == "tif" || extrae_extencion(img_perfil) == "webp" ||
        extrae_extencion(img_perfil) == "bmp" || extrae_extencion(img_perfil) == "svg" ) {

        $("#ver_imagen").html(`<img src="../dist/img/proveedores/imagen_perfil/${img_perfil}" alt="" width="80%" onerror="this.src='../dist/svg/error-404-x.svg';" >`); 
        
      } else {
        $("#ver_imagen").html('<img src="../dist/svg/doc_si_extencion.svg" alt="" width="50%" >');
      }        
    }      
  }

}

//Función para eliminar registros
function eliminar(idproveedor) {
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
      $.post("../ajax/proveedores.php?op=eliminar", { idproveedor: idproveedor }, function (e) {

        Swal.fire("Eliminado!", "Tu registro ha sido Eliminado.", "success");
    
        tabla.ajax.reload();
        total();
      });      
    }
  });   
}

init();

var idproveedor=0;

$(function () {

  // Aplicando la validacion del select cada vez que cambie
  // $("#id_proveedor_adm").on("change", function () { $(this).trigger("blur"); });
  
  $("#form-proveedores").validate({
    ignore: '.select2-input, .select2-focusser',
    rules: { 
      descripcion: {required: true}, 
    },
    messages: { 
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

    submitHandler: function (e) {
      guardaryeditar(e);      
    },

  });

  //agregando la validacion del select  ya que no tiene un atributo name el plugin
  // $("#id_proveedor_adm").rules("add", { required: true, messages: { required: "Campo requerido" } });

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
            $("#doc"+id+"_ver").html(`<iframe src="../dist/dist/img/proveedores/${carpeta}/${antiguopdf}" frameborder="0" scrolling="no" width="100%" height="310"></iframe>`);
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
  
                      $("#doc"+id+"_ver").html(`<img src="../dist/img/proveedores/${carpeta}/${antiguopdf}" alt="" onerror="this.src='../dist/svg/error-404-x.svg';" width="100%" >`);
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



