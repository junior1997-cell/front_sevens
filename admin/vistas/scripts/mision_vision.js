
//Función que se ejecuta al inicio
function init() {

  $(".mvision_vision").addClass("active");

  $("#actualizar_registro").on("click", function (e) { $("#submit-form-actualizar-registro").submit(); });
  $("#form-mision-vision").on("submit", function (e) { actualizar_m_v(e); });

  
}
function mostrar_m_v() {

  $("#cargando-1-fomulario").hide();
  $("#cargando-2-fomulario").show();

  $.post("../ajax/contacto.php?op=mostrar", {}, function (data, status) {

    data = JSON.parse(data);  console.log(data);  
    if (data.status){
      $("#cargando-1-fomulario").show();
      $("#cargando-2-fomulario").hide();

      $("#id").val(data.data.idcontacto);
      $("#mision").val(data.data.mision);
      $("#vision").val(data.data.vision);
      $(".clss_mision").html(data.data.mision);
      $(".clss_vision").html(data.data.vision);
    }else{
      ver_errores(e);
    }

  }).fail( function(e) { console.log(e); ver_errores(e); } );
}

function actualizar_m_v(e) {
  
  e.preventDefault(); //No se activará la acción predeterminada del evento
  $("#mision").val($(".clss_mision").html());
  $("#vision").val($(".clss_vision").html());

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

        mostrar_m_v(); 


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
