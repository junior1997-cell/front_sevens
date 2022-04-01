var tabla_ocupacion;

//Función que se ejecuta al inicio
function init() {
  listar_ocupacion();
  $("#bloc_Recurso").addClass("menu-open");

  $("#mRecurso").addClass("active");

  //$("#lAllMateriales").addClass("active");

  $("#guardar_registro_ocupacion").on("click", function (e) {
    
    $("#submit-form-ocupacion").submit();
  });

  // Formato para telefono
  $("[data-mask]").inputmask();

}
//Función limpiar
function limpiar_ocupacion() {
  //Mostramos los Materiales
  $("#idocupacion").val("");
  $("#nombre_ocupacion").val(""); 

  // Limpiamos las validaciones
  $(".form-control").removeClass('is-valid');
  $(".form-control").removeClass('is-invalid');
  $(".error.invalid-feedback").remove();
}

//Función Listar
function listar_ocupacion() {

  tabla_ocupacion=$('#tabla-ocupacion').dataTable({
    "responsive": true,
    lengthMenu: [[ -1, 5, 10, 25, 75, 100, 200,], ["Todos", 5, 10, 25, 75, 100, 200, ]],//mostramos el menú de registros a revisar
    "aProcessing": true,//Activamos el procesamiento del datatables
    "aServerSide": true,//Paginación y filtrado realizados por el servidor
    dom: '<Bl<f>rtip>',//Definimos los elementos del control de tabla
    buttons: ['copyHtml5', 'excelHtml5', 'pdf'],
    "ajax":{
        url: '../ajax/ocupacion.php?op=listar_ocupacion',
        type : "get",
        dataType : "json",						
        error: function(e){
          console.log(e.responseText);	
        }
      },
      createdRow: function (row, data, ixdex) {    
  
        // columna: #
        if (data[0] != '') {
          $("td", row).eq(0).addClass("text-center");   
           
        }
        // columna: #
        if (data[1] != '') {
          $("td", row).eq(1).addClass("text-nowrap");   
            
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

//Función para guardar o editar

function guardaryeditar_ocupacion(e) {
  // e.preventDefault(); //No se activará la acción predeterminada del evento
  var formData = new FormData($("#form-ocupacion")[0]);
 
  $.ajax({
    url: "../ajax/ocupacion.php?op=guardaryeditar_ocupacion",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,

    success: function (datos) {
             
      if (datos == 'ok') {

				toastr.success('Registrado correctamente')				 

	      tabla_ocupacion.ajax.reload();
         
				limpiar_ocupacion();

        $("#modal-agregar-ocupacion").modal("hide");

			}else{

				toastr.error(datos)
			}
    },
  });
}

function mostrar_ocupacion(idocupacion) {
  limpiar_ocupacion(); //console.log(idocupacion);

  $("#modal-agregar-ocupacion").modal("show")

  $.post("../ajax/ocupacion.php?op=mostrar_ocupacion", { idocupacion: idocupacion }, function (data, status) {

    data = JSON.parse(data);  console.log(data);  

    $("#cargando-1-fomulario").show();
    $("#cargando-2-fomulario").hide();

    $("#idocupacion").val(data.idocupacion);
    $("#nombre_ocupacion").val(data.nombre_ocupacion);
  });
}

//Función para desactivar registros
function desactivar_ocupacion(idocupacion) {
  Swal.fire({
    title: "¿Está Seguro de  Desactivar el registro?",
    text: "Ocupación",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#28a745",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, desactivar!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post("../ajax/ocupacion.php?op=desactivar_ocupacion", { idocupacion: idocupacion }, function (e) {

        Swal.fire("Desactivado!", "Tu registro ha sido desactivado.", "success");
    
        tabla_ocupacion.ajax.reload();
      });      
    }
  });   
}

//Función para activar registros
function activar_ocupacion(idocupacion) {
  Swal.fire({
    title: "¿Está Seguro de  Activar el registro?",
    text: "Ocupación",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#28a745",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, activar!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post("../ajax/ocupacion.php?op=activar_ocupacion", { idocupacion: idocupacion }, function (e) {

        Swal.fire("Activado!", "Tu registro ha sido activado.", "success");

        tabla_ocupacion.ajax.reload();
      });
      
    }
  });      
}

//Función para desactivar registros
function eliminar_ocupacion(idocupacion) {
  //----------------------------
 Swal.fire({

  title: "!Elija una opción¡",
  html: "En <b>papelera</b> encontrará este registro! <br> Al <b>eliminar</b> no tendrá acceso a recuperar este registro!",
  icon: "warning",
  showCancelButton: true,
  showDenyButton: true,
  confirmButtonColor: "#17a2b8",
  denyButtonColor: "#d33",
  cancelButtonColor: "#6c757d",    
  confirmButtonText: `<i class="fas fa-times"></i> Papelera`,
  denyButtonText: `<i class="fas fa-skull-crossbones"></i> Eliminar`,

}).then((result) => {

  if (result.isConfirmed) {
   //op=desactivar
    $.post("../ajax/ocupacion.php?op=desactivar_ocupacion", { idocupacion: idocupacion }, function (e) {

      Swal.fire("Desactivado!", "Tu registro ha sido desactivado.", "success");

      tabla_ocupacion.ajax.reload();
    });  

  }else if (result.isDenied) {
   //op=eliminar
    $.post("../ajax/ocupacion.php?op=eliminar_ocupacion", { idocupacion: idocupacion }, function (e) {

      Swal.fire("Eliminado!", "Tu registro ha sido Eliminado.", "success");

      tabla_ocupacion.ajax.reload();
    }); 

  }

});   
}

init();

$(function () {

  
  $.validator.setDefaults({

    submitHandler: function (e) {
        guardaryeditar_ocupacion(e);
      
    },
  });

  $("#form-ocupacion").validate({
    rules: {
      nombre_ocupacion: { required: true }      // terms: { required: true },
    },
    messages: {
      nombre_ocupacion: {
        required: "Por favor ingrese nombre.", 
      },

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

