
//Función que se ejecuta al inicio
function init() {

  $(".mvision_vision").addClass("active");

  $("#actualizar_registro").on("click", function (e) { $("#submit-form-actualizar-registro").submit(); });

  mostrar_m_v();
  
}

function activar_editar(estado) {
  if (estado=="1") {

    $(".editar").hide();
    $(".actualizar").show();

    $(".mision").removeAttr("readonly");
    $(".vision").removeAttr("readonly");
    toastr.success('Campos habiliados para editar!!!')

  }
  if (estado=="2") {

    $(".editar").show();
    $(".actualizar").hide();
    $(".mision").attr('readonly','true');
    $(".vision").attr('readonly','true');

  }

}
function mostrar_m_v() {

  $("#cargando-1-fomulario").hide();
  $("#cargando-2-fomulario").show();

  $.post("../ajax/contacto.php?op=mostrar", {}, function (data, status) {

    data = JSON.parse(data);  console.log(data);  

    $("#cargando-1-fomulario").show();
    $("#cargando-2-fomulario").hide();

    $("#id").val(data.idcontacto);
    $("#mision").val(data.mision);
    $("#vision").val(data.vision);
  });
}

function actualizar_m_v(e) {
  // e.preventDefault(); //No se activará la acción predeterminada del evento
  var formData = new FormData($("#form-mision-vision")[0]);

  $.ajax({
    url: "../ajax/contacto.php?op=actualizar_mision_vision",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,

    success: function (datos) {
      if (datos == "ok") {
        Swal.fire("Correcto!", "Misión y visión actualizado correctamente", "success");

        mostrar_m_v(); activar_editar(2);


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
  
  $.validator.setDefaults({ submitHandler: function (e) { actualizar_m_v(e) },  });

  $("#form-mision-vision").validate({
    rules: {
      mision: { required: true } ,  
      vision: { required: true }  
    },
    messages: {
      mision: {
        required: "Por favor rellenar el campo misióm", 
      },
      vision: {
        required: "Por favor rellenar el campo Visión", 
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
