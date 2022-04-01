
//Función que se ejecuta al inicio
function init() {

  $(".mceo_resena").addClass("active");

  $("#actualizar_registro").on("click", function (e) { $("#submit-form-actualizar-registro").submit(); });

  mostrar();
  
}

function activar_editar(estado) {

  if (estado=="1") {

    $(".editar").hide();
    $(".actualizar").show();

    $(".palabras_ceo").removeAttr("readonly");
    $(".resenia_h").removeAttr("readonly");
    toastr.success('Campos habiliados para editar!!!')

  }
  if (estado=="2") {

    $(".editar").show();
    $(".actualizar").hide();
    $(".palabras_ceo").attr('readonly','true');
    $(".resenia_h").attr('readonly','true');

  }

}
function mostrar() {

  $("#cargando-1-fomulario").hide();
  $("#cargando-2-fomulario").show();

  $.post("../ajax/contacto.php?op=mostrar", {}, function (data, status) {

    data = JSON.parse(data);  console.log(data);  

    $("#cargando-1-fomulario").show();
    $("#cargando-2-fomulario").hide();

    $("#id").val(data.idcontacto);
    $("#palabras_ceo").val(data.palabras_ceo);
    $("#resenia_h").val(data.reseña_historica);
  });
}

function actualizar_ceo_resenia(e) {
  // e.preventDefault(); //No se activará la acción predeterminada del evento
  var formData = new FormData($("#form-palabrasceo-reseña")[0]);

  $.ajax({
    url: "../ajax/contacto.php?op=actualizar_ceo_resenia",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,

    success: function (datos) {
      if (datos == "ok") {
        Swal.fire("Correcto!", "Datos actualizados correctamente", "success");

        mostrar(); activar_editar(2);


      } else {
        Swal.fire("Error!", datos, "error");
      }
    },
    xhr: function () {
      var xhr = new window.XMLHttpRequest();

      xhr.upload.addEventListener(
        "progress",
        function (evt) {
          if (evt.lengthComputable) {
            var percentComplete = (evt.loaded / evt.total) * 100;
            /*console.log(percentComplete + '%');*/
            $("#barra_progress2").css({ width: percentComplete + "%" });

            $("#barra_progress2").text(percentComplete.toFixed(2) + " %");

            if (percentComplete === 100) {
              l_m();
            }
          }
        },
        false
      );
      return xhr;
    },
  });
}
function l_m() {
  // limpiar();
  $("#barra_progress").css({ width: "0%" });

  $("#barra_progress").text("0%");

  $("#barra_progress2").css({ width: "0%" });

  $("#barra_progress2").text("0%");
}
init();


$(function () {
  
  $.validator.setDefaults({ submitHandler: function (e) { actualizar_ceo_resenia(e) },  });

  $("#form-palabrasceo-reseña").validate({
    rules: {
      palabras_ceo: { required: true } ,  
      resenia_h: { required: true }  
    },
    messages: {
      palabras_ceo: { required: "Por favor rellenar el campo misióm", },
      resenia_h: { required: "Por favor rellenar el campo Visión", },

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
