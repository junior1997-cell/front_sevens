var tabla;

//Función que se ejecuta al inicio
function init() {

  $(".mvalores").addClass("active");

  listar();  

  $("#guardar_registro").on("click", function (e) {$("#submit-form-valores").submit();});

}

$("#doc1_i").click(function() {  $('#doc1').trigger('click'); });
$("#doc1").change(function(e) {  addImageApplication(e,$("#doc1").attr("id")) });

// Eliminamos el doc 1
function doc1_eliminar() {

	$("#doc1").val("");

	$("#doc1_ver").html('<img src="../dist/svg/drag-n-drop.svg" alt="" width="50%" >');

	$("#doc1_nombre").html("");
}

//Función limpiar
function limpiar() {

  $("#idvalores").val("");
  $("#nombre").val("");
  $("#descripcion").val(""); 

  $("#doc_old_1").val("");
  $("#doc1").val("");  
  $('#doc1_ver').html(`<img src="../dist/svg/drag-n-drop.svg" alt="" width="50%" >`);
  $('#doc1_nombre').html("");

  // Limpiamos las validaciones
  $(".form-control").removeClass('is-valid');
  $(".form-control").removeClass('is-invalid');
  $(".error.invalid-feedback").remove();

}

//Función Listar
function listar() {

  $(".tabla").hide();
  $(".cargando").show();

  tabla=$('#tabla-valores').dataTable({
    "responsive": true,
    lengthMenu: [[ -1, 5, 10, 25, 75, 100, 200,], ["Todos", 5, 10, 25, 75, 100, 200, ]],//mostramos el menú de registros a revisar
    "aProcessing": true,//Activamos el procesamiento del datatables
    "aServerSide": true,//Paginación y filtrado realizados por el servidor
    dom: '<Bl<f>rtip>',//Definimos los elementos del control de tabla
    buttons: ['excelHtml5','pdf'],
    "ajax":{
        url: '../ajax/valores.php?op=listar',
        type : "get",
        dataType : "json",						
        error: function(e){
          console.log(e.responseText);	
        }
      },
      createdRow: function (row, data, ixdex) {
        if (data[0] != '') { $("td", row).eq(0).addClass('text-center'); }
        if (data[2] != '') { $("td", row).eq(2).addClass('text-nowrap'); }
        $("td", row).addClass('class_table');
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
  
  $(".tabla").show();
  $(".cargando").hide();
}

//ver imagen
function ver_img_perfil(img_perfil,nombre_valor){

  $('#modal-ver-imagen').modal("show");
  $('#nombre_valor').html(nombre_valor);

  if (img_perfil == "" || img_perfil == null  ) {

    $(".img_modal_xl_").html(`<img class="rounded-lg" src="../dist/svg/drag-n-drop.svg" style="width: 100%;"  alt="Image Description"></img>`)
  
   }else{
     
    $(".img_modal_xl_").html(`<img class="rounded-lg" src="../dist/img/valores/imagen_perfil/${img_perfil}" style="width: 100%;"  alt="Image Description"></img>`)
 
   }
}

//Función para guardar o editar

function guardaryeditar(e) {
  // e.preventDefault(); //No se activará la acción predeterminada del evento
  var formData = new FormData($("#form-valores")[0]);
 
  $.ajax({
    url: "../ajax/valores.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,

    success: function (e) {
             
      try {
        e = JSON.parse(e);  console.log(e); 
  
        if (e.status == true) {

          Swal.fire("Correcto!", "Registrado correctamente", "success");

          tabla.ajax.reload();
         
          limpiar();
  
          $("#modal-agregar-valores").modal("hide");
  
        }else{  

          ver_errores(e);
        } 
  
        //$("#guardar_registro_fase").html('Guardar Cambios').removeClass('disabled');
  
      } catch (err) {
        console.log('Error: ', err.message); toastr.error('<h5 class="font-size-16px">Error temporal!!</h5> puede intentalo mas tarde, o comuniquese con <i><a href="tel:+51921305769" >921-305-769</a></i> ─ <i><a href="tel:+51921487276" >921-487-276</a></i>');
      } 

    },
  });
}

function mostrar(idvalores) {
  limpiar();

  $("#modal-agregar-valores").modal("show");

  $("#cargando-1-fomulario").hide();
  $("#cargando-2-fomulario").show();

  $.post("../ajax/valores.php?op=mostrar_valor", { idvalores: idvalores }, function (e, status) {

    e = JSON.parse(data);  console.log(e);  

    if (e.status) {

      $("#cargando-1-fomulario").show();
      $("#cargando-2-fomulario").hide();

      $("#idvalores").val(e.data.idvalores);
      $("#nombre").val(e.data.nombre_valor);
      $("#descripcion").val(e.data.descripcion);
        
      if (e.data.img_perfil == "" || e.data.img_perfil == null  ) {

        $("#doc1_ver").html('<img src="../dist/svg/doc_uploads.svg" alt="" width="50%" >');
        $("#doc1_nombre").html('');
        $("#doc_old_1").val(""); $("#doc1").val("");

      } else {

        $("#doc_old_1").val(e.data.img_perfil); 
        $("#doc1_nombre").html(`<div class="row"> <div class="col-md-12"><i>Imagen.${extrae_extencion(e.data.img_perfil)}</i></div></div>`);
        $("#doc1_ver").html(doc_view_extencion(e.data.img_perfil, 'valores', 'imagen_perfil', '100%'));        
      } 
      
    } else {
      ver_errores(e);
    } 

  }).fail( function(e) { console.log(e); ver_errores(e); } );
}

//Función para eliminar registros
function eliminar(idvalores) {
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
      $.post("../ajax/valores.php?op=eliminar", { idvalores: idvalores }, function (e) {

        Swal.fire("Eliminado!", "Tu registro ha sido Eliminado.", "success");
    
        tabla.ajax.reload();
        total();
      });      
    }
  });   
}

init();

var idproyecto=0;
$(function () {

  
  $.validator.setDefaults({

    submitHandler: function (e) {
        guardaryeditar(e);
      
    },
  });
  

  $("#form-valores").validate({
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

function extrae_extencion(filename) {
    return filename.split('.').pop();
}




