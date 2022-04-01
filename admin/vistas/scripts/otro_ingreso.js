var tabla;

//Función que se ejecuta al inicio
function init() {
  //Activamos el "aside"
  $("#bloc_ContableFinanciero").addClass("menu-open");

  $("#mContableFinanciero").addClass("active");

  $("#lOtroIngreso").addClass("active bg-primary");

  $("#idproyecto").val(localStorage.getItem("nube_idproyecto"));

  tbla_principal();

  // ══════════════════════════════════════ S E L E C T 2 ══════════════════════════════════════

  $.post("../ajax/ajax_general.php?op=select2Proveedor", function (r) { $("#idproveedor").html(r); });

  $.post("../ajax/ajax_general.php?op=select2Banco", function (r) { $("#banco_prov").html(r); });

  // ══════════════════════════════════════ G U A R D A R   F O R M ══════════════════════════════════════ 

  //$("#guardar_registro").on("click", function (e) { $("#submit-form-otro_ingreso").submit(); });

  $("#guardar_registro_proveedor").on("click", function (e) { $("#submit-form-proveedor").submit(); });

  // ══════════════════════════════════════ INITIALIZE SELECT2 - PROVERDOR  ══════════════════════════════════════

  $("#banco_prov").select2({ theme: "bootstrap4", placeholder: "Selecione un banco", allowClear: true, });

  // ══════════════════════════════════════ INITIALIZE SELECT2 - OTRO INGRESO  ══════════════════════════════════════
  $("#idproveedor").select2({ theme: "bootstrap4", placeholder: "Selecione proveedor", allowClear: true,   });

  $("#tipo_comprobante").select2({ theme: "bootstrap4", placeholder: "Seleccinar tipo comprobante", allowClear: true, });

  $("#forma_pago").select2({ theme: "bootstrap4", placeholder: "Seleccinar forma de pago", allowClear: true, });

  $("#glosa").select2({ theme: "bootstrap4", placeholder: "Seleccinar glosa",  allowClear: true, });

  // Formato para telefono
  $("[data-mask]").inputmask();
}

// abrimos el navegador de archivos
$("#doc1_i").click(function() {  $('#doc1').trigger('click'); });
$("#doc1").change(function(e) {  addDocsImgApplication(e,$("#doc1").attr("id")) });

// Eliminamos el doc 1
function doc1_eliminar() {

	$("#doc1").val("");

	$("#doc1_ver").html('<img src="../dist/svg/pdf_trasnparent.svg" alt="" width="50%" >');

	$("#doc1_nombre").html("");
}

//Función limpiar
function limpiar_form() {
  $("#idotro_ingreso").val("");
  $("#fecha_i").val("");  
  $("#nro_comprobante").val("");
  $("#ruc").val("");
  $("#razon_social").val("");
  $("#direccion").val("");
  $("#subtotal").val("");
  $("#igv").val("");
  $("#precio_parcial").val("");
  $("#descripcion").val("");

  $("#doc_old_1").val("");
  $("#doc1").val("");  
  $('#doc1_ver').html(`<img src="../dist/svg/pdf_trasnparent.svg" alt="" width="50%" >`);
  $('#doc1_nombre').html("");

  $("#idproveedor").val("null").trigger("change");
  $("#tipo_comprobante").val("null").trigger("change");
  $("#forma_pago").val("null").trigger("change");
  $("#glosa").val("null").trigger("change");

  $("#val_igv").val(""); 
  $("#tipo_gravada").val(""); 

  // Limpiamos las validaciones
  $(".form-control").removeClass('is-valid');
  $(".form-control").removeClass('is-invalid');
  $(".error.invalid-feedback").remove();
}

function show_hide_form(flag) {
	if (flag == 1)	{		
		$("#mostrar-tabla").show();
    $("#mostrar-form").hide();
    $(".btn-regresar").hide();
    $(".btn-agregar").show();
	}	else	{
		$("#mostrar-tabla").hide();
    $("#mostrar-form").show();
    $(".btn-regresar").show();
    $(".btn-agregar").hide();
	}
}

//Función Listar
function tbla_principal() {
  var idproyecto = localStorage.getItem("nube_idproyecto");
  tabla = $("#tabla-otro-ingreso").dataTable({
    responsive: true,
    lengthMenu: [[ -1, 5, 10, 25, 75, 100, 200,], ["Todos", 5, 10, 25, 75, 100, 200, ]], //mostramos el menú de registros a revisar
    aProcessing: true, //Activamos el procesamiento del datatables
    aServerSide: true, //Paginación y filtrado realizados por el servidor
    dom: "<Bl<f>rtip>", //Definimos los elementos del control de tabla
    buttons: ["copyHtml5", "excelHtml5", "pdf", "colvis"],
    ajax: {
      url: "../ajax/otro_ingreso.php?op=tbla_principal&idproyecto=" + idproyecto,
      type: "get",
      dataType: "json",
      error: function (e) {
        console.log(e.responseText);
      },
    },
    createdRow: function (row, data, ixdex) {
      // columna: #
      if (data[0] != "") {
        $("td", row).eq(0).addClass("text-center");
      }
      // columna: sub total
      if (data[1] != "") {
        $("td", row).eq(1).addClass("text-nowrap");
      }
      // columna: sub total
      if (data[5] != "") {
        $("td", row).eq(5).addClass("text-nowrap text-right");
      }
      // columna: igv
      if (data[6] != "") {
        $("td", row).eq(6).addClass("text-nowrap text-right");
      }
      // columna: total
      if (data[7] != "") {
        $("td", row).eq(7).addClass("text-nowrap text-right");
      }
    },
    language: {
      lengthMenu: "Mostrar: _MENU_ registros",
      buttons: {
        copyTitle: "Tabla Copiada",
        copySuccess: {
          _: "%d líneas copiadas",
          1: "1 línea copiada",
        },
      },
    },
    bDestroy: true,
    iDisplayLength: 10, //Paginación
    order: [[0, "asc"]], //Ordenar (columna,orden)
  }).DataTable();

  total(idproyecto);
}

function total(idproyecto) {
   
  $("#total_monto").html(`<i class="fas fa-spinner fa-pulse"></i>`);

  $.post("../ajax/otro_ingreso.php?op=total", { idproyecto: idproyecto }, function (data, status) {

    data = JSON.parse(data);  console.log(data);

    $("#total_monto").html("S/ " + formato_miles(data.precio_parcial));
  });
}

//segun tipo de comprobante
function comprob_factura() {

  var precio_parcial = $("#precio_parcial").val(); 

  
  if ($("#tipo_comprobante").select2("val") == "" || $("#tipo_comprobante").select2("val") == null) {

    $(".nro_comprobante").html("Núm. Comprobante");

    //$(".div_ruc").hide(); $(".div_razon_social").hide();

    //$("#ruc").val(""); $("#razon_social").val("");

    $("#val_igv").val(""); $("#tipo_gravada").val(""); 

    if (precio_parcial == null || precio_parcial == "") {
      $("#subtotal").val(0);
      $("#igv").val(0);    
    } else {
      $("#subtotal").val(parseFloat(precio_parcial).toFixed(2));
      $("#igv").val(0);    
    }   

  } else {

    if ($("#tipo_comprobante").select2("val") == "Ninguno") { 

      $(".nro_comprobante").html("Núm. de Operación");

      //$(".div_ruc").hide(); $(".div_razon_social").hide();

      //$("#ruc").val(""); $("#razon_social").val("");

      $("#val_igv").prop("readonly",true);

      if (precio_parcial == null || precio_parcial == "") {
        $("#subtotal").val(0);
        $("#igv").val(0);
        
        $("#val_igv").val("0"); 
        $("#tipo_gravada").val("NO GRAVADA");  

      } else {
        $("#subtotal").val(parseFloat(precio_parcial).toFixed(2));
        $("#igv").val(0); 

        $("#val_igv").val("0"); 
        $("#tipo_gravada").val("NO GRAVADA"); 

      }   

    } else {
      
      if ($("#tipo_comprobante").select2("val") == "Factura") {

        $(".nro_comprobante").html("Núm. Comprobante");

        $(".div_ruc").show(); $(".div_razon_social").show();
      
          calculandototales_fact();     
    
      } else { 

        $("#val_igv").prop("readonly",true);

        if ($("#tipo_comprobante").select2("val") == "Boleta") {

          $(".nro_comprobante").html("Núm. Comprobante");
  
          $(".div_ruc").show(); $(".div_razon_social").show();
          
          if (precio_parcial == null || precio_parcial == "") {
            $("#subtotal").val(0);
            $("#igv").val(0); 
            $("#val_igv").val("0");   
          } else {
                    
            $("#subtotal").val("");
            $("#igv").val("");

            $("#subtotal").val(parseFloat(precio_parcial).toFixed(2));
            $("#igv").val(0); 
            
            $("#val_igv").val("0"); 
            $("#tipo_gravada").val("NO GRAVADA"); 
          } 
            
        } else {
                 
          $(".nro_comprobante").html("Núm. Comprobante");

          $(".div_ruc").hide(); $(".div_razon_social").hide();

          $("#ruc").val(""); $("#razon_social").val("");

          if (precio_parcial == null || precio_parcial == "") {
            
            $("#subtotal").val(0);
            $("#igv").val(0);

            $("#val_igv").val("0"); 
            $("#tipo_gravada").val("NO GRAVADA");  

          } else {

            $("#subtotal").val(parseFloat(precio_parcial).toFixed(2));
            $("#igv").val(0); 

            $("#val_igv").val("0"); 
            $("#tipo_gravada").val("NO GRAVADA");  

          } 
          
        }

      }
    }
  } 
}

function validando_igv() {

  if ($("#tipo_comprobante").select2("val") == "Factura") {

    $("#val_igv").prop("readonly",false);
    $("#val_igv").val(0.18); 

  }else {

    $("#val_igv").val(0); 

  }
  
}

function calculandototales_fact() {
  //----------------
  $("#tipo_gravada").val("GRAVADA"); 
         
  $(".nro_comprobante").html("Núm. Comprobante");

  var precio_parcial = $("#precio_parcial").val();

  var val_igv = $('#val_igv').val();

  if (precio_parcial == null || precio_parcial == "") {

    $("#subtotal").val(0);
    $("#igv").val(0); 

  } else {
 
    var subtotal = 0;
    var igv = 0;

    if (val_igv == null || val_igv == "") {

      $("#subtotal").val(parseFloat(precio_parcial));
      $("#igv").val(0);

    }else{

      $("subtotal").val("");
      $("#igv").val("");

      subtotal = quitar_igv_del_precio(precio_parcial, val_igv, 'decimal');
      igv = precio_parcial - subtotal;

      $("#subtotal").val(parseFloat(subtotal).toFixed(2));
      $("#igv").val(parseFloat(igv).toFixed(2));

    }

  }  

}

function quitar_igv_del_precio(precio , igv, tipo ) {
  console.log(precio , igv, tipo);
  var precio_sin_igv = 0;

  switch (tipo) {
    case 'decimal':

      if (parseFloat(precio) != NaN && igv > 0 && igv <= 1 ) {
        precio_sin_igv = ( parseFloat(precio) * 100 ) / ( ( parseFloat(igv) * 100 ) + 100 )
      }else{
        precio_sin_igv = precio;
      }
    break;

    case 'entero':

      if (parseFloat(precio) != NaN && igv > 0 && igv <= 100 ) {
        precio_sin_igv = ( parseFloat(precio) * 100 ) / ( parseFloat(igv)  + 100 )
      }else{
        precio_sin_igv = precio;
      }
    break;
  
    default:
      $(".val_igv").html('IGV (0%)');
      toastr.success('No has difinido un tipo de calculo de IGV.')
    break;
  } 
  
  return precio_sin_igv; 
}

//ver ficha tecnica
function modal_comprobante(comprobante, fecha, tipo_comprobante, serie_comprobante, ruta) {

  var data_comprobante = ""; var url = ""; var nombre_download = "Comprobante"; 
  
  $("#modal-ver-comprobante").modal("show");

  if (comprobante == '' || comprobante == null) {

    data_comprobante = `<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="Alerta" aria-hidden="true">&times;</button><h5><i class="icon fas fa-exclamation-triangle"></i> Alerta!</h5>No hay un documento para ver. Edite este registro en su modulo correspondiente.</div>`;

  }else{

    if ( extrae_extencion(comprobante) == "jpeg" || extrae_extencion(comprobante) == "jpg" || extrae_extencion(comprobante) == "jpe" ||
      extrae_extencion(comprobante) == "jfif" || extrae_extencion(comprobante) == "gif" || extrae_extencion(comprobante) == "png" ||
      extrae_extencion(comprobante) == "tiff" || extrae_extencion(comprobante) == "tif" || extrae_extencion(comprobante) == "webp" ||
      extrae_extencion(comprobante) == "bmp" || extrae_extencion(comprobante) == "svg" ) {
      
      url = `../${ruta}${comprobante}`;

      nombre_download = `${extraer_dia_semana_completo(fecha)}, ${format_d_m_a(fecha)} ─ ${tipo_comprobante} - ${serie_comprobante}`;

      data_comprobante = `<div class="col-md-12 mt-2 text-center"><i>${nombre_download}.${extrae_extencion(comprobante)}</i></div> <div class="col-md-12 mt-2"><img src="${url}" alt="img" class="img-thumbnail" width="100%" onerror="this.src='../dist/svg/error-404-x.svg';" ></div>`;         
      
    } else { 

      if (extrae_extencion(comprobante) == "pdf") {

        url = `../${ruta}${comprobante}`;

        nombre_download = `${extraer_dia_semana_completo(fecha)}, ${format_d_m_a(fecha)} ─ ${tipo_comprobante} - ${serie_comprobante}`;

        data_comprobante = `<div class="col-md-12 mt-2 text-center"><i>${nombre_download}.${extrae_extencion(comprobante)}</i></div> <div class="col-md-12 mt-2"><iframe src="${url}" frameborder="0" scrolling="no" width="100%" height="410"> </iframe></div>`;      

      } else {
        
        url = `${ruta}${comprobante}`;

        nombre_download = `${extraer_dia_semana_completo(fecha)}, ${format_d_m_a(fecha)} ─ ${tipo_comprobante} - ${serie_comprobante}`;

        data_comprobante = `<div class="col-md-12 mt-2 text-center"><i>${nombre_download}.${extrae_extencion(comprobante)}</i></div> <div class="col-md-12 mt-2"><img src="../dist/svg/doc_si_extencion.svg" alt="" width="50%" ></div>`;
        
      }      
    }
  } 
  
  $(".ver-comprobante").html(`<div class="row" >
    <div class="col-md-6 text-center">
      <a type="button" class="btn btn-warning btn-block btn-xs" href="${url}" download="${nombre_download}"> <i class="fas fa-download"></i> Descargar. </a>
    </div>
    <div class="col-md-6 text-center">
      <a type="button" class="btn btn-info btn-block btn-xs" href="${url}" target="_blank" <i class="fas fa-expand"></i> Ver completo. </a>
    </div>
    <div class="col-md-12 mt-3">     
      ${data_comprobante}
    </div>
  </div>`);

  // $(".tooltip").removeClass('show');
}

//Función para guardar o editar
function guardar_y_editar_otros_ingresos(e) {
  // e.preventDefault(); //No se activará la acción predeterminada del evento
  var formData = new FormData($("#form-otro-ingreso")[0]);

  $.ajax({
    url: "../ajax/otro_ingreso.php?op=guardar_y_editar_otros_ingresos",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (datos) {
      if (datos == "ok") {

        Swal.fire("Correcto!", "El registro se guardo correctamente.", "success");

        tabla.ajax.reload(); total();

        limpiar_form();    
        show_hide_form(1);

      } else {
        toastr.error(datos);
      }
    },
  });
}

function mostrar(idotro_ingreso) {

  limpiar_form(); show_hide_form(2);
  
  $("#cargando-1-fomulario").hide();
  $("#cargando-2-fomulario").show();

  $("#modal-agregar-otro_ingreso").modal("show");

  $.post("../ajax/otro_ingreso.php?op=mostrar", { idotro_ingreso: idotro_ingreso }, function (data, status) {
    
    data = JSON.parse(data); console.log(data);    

    $("#idproveedor").val(data.idproveedor).trigger("change");
    $("#tipo_comprobante").val(data.tipo_comprobante).trigger("change");
    $("#forma_pago").val(data.forma_de_pago).trigger("change");
    $("#glosa").val(data.glosa).trigger("change");
    $("#idotro_ingreso").val(data.idotro_ingreso);
    $("#fecha_i").val(data.fecha_i);
    $("#nro_comprobante").val(data.numero_comprobante);  
    $("#ruc").val(data.ruc);
    $("#razon_social").val(data.razon_social);
    $("#direccion").val(data.direccion);

    $("#subtotal").val(data.subtotal);
    $("#igv").val(data.igv);
    $("#val_igv").val(data.val_igv);
    $("#tipo_gravada").val(data.tipo_gravada);
    $("#precio_parcial").val(data.costo_parcial);
    $("#descripcion").val(data.descripcion);    

    if (data.comprobante == "" || data.comprobante == null  ) {

      $("#doc1_ver").html('<img src="../dist/svg/doc_uploads.svg" alt="" width="50%" >');

      $("#doc1_nombre").html('');

      $("#doc_old_1").val(""); $("#doc1").val("");

    } else {

      $("#doc_old_1").val(data.comprobante); 

      $("#doc1_nombre").html(`<div class="row"> <div class="col-md-12"><i>Baucher.${extrae_extencion(data.comprobante)}</i></div></div>`);
      
      // cargamos la imagen adecuada par el archivo
      if ( extrae_extencion(data.comprobante) == "pdf" ) {

        $("#doc1_ver").html('<iframe src="../dist/docs/otro_ingreso/comprobante/'+data.comprobante+'" frameborder="0" scrolling="no" width="100%" height="210"> </iframe>');

      }else{
        if (
          extrae_extencion(data.comprobante) == "jpeg" || extrae_extencion(data.comprobante) == "jpg" || extrae_extencion(data.comprobante) == "jpe" ||
          extrae_extencion(data.comprobante) == "jfif" || extrae_extencion(data.comprobante) == "gif" || extrae_extencion(data.comprobante) == "png" ||
          extrae_extencion(data.comprobante) == "tiff" || extrae_extencion(data.comprobante) == "tif" || extrae_extencion(data.comprobante) == "webp" ||
          extrae_extencion(data.comprobante) == "bmp" || extrae_extencion(data.comprobante) == "svg" ) {

          $("#doc1_ver").html(`<img src="../dist/docs/otro_ingreso/comprobante/${data.comprobante}" alt="" width="100%" onerror="this.src='../dist/svg/error-404-x.svg';" >`); 
          
        } else {
          $("#doc1_ver").html('<img src="../dist/svg/doc_si_extencion.svg" alt="" width="50%" >');
        }        
      }      
    }

    $("#cargando-1-fomulario").show();
    $("#cargando-2-fomulario").hide();
  });
}

function ver_datos(idotro_ingreso) {
  $("#modal-ver-transporte").modal("show");

  $.post("../ajax/otro_ingreso.php?op=verdatos", { idotro_ingreso: idotro_ingreso }, function (data, status) {
    data = JSON.parse(data);
    console.log(data);

    verdatos = `                                                                            
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <table class="table table-hover table-bordered">        
            <tbody>
              <tr data-widget="expandable-table" aria-expanded="false">
                <th>Descripción</th>
                <td>${data.descripcion}</td>
              </tr>
              <tr data-widget="expandable-table" aria-expanded="false">
                <th>Tipo clasificación</th>
                <td>${data.tipo_viajero}</td>
              </tr>
              <tr data-widget="expandable-table" aria-expanded="false">
                <th>Ruta</th>
                <td>${data.ruta}</td>
              </tr>
              <tr data-widget="expandable-table" aria-expanded="false">
                <th>Tipo ruta</th>
                  <td>${data.tipo_ruta}</td>
              </tr>
              <tr data-widget="expandable-table" aria-expanded="false">
                <th>Fecha</th>
                <td>${data.fecha_i}</td>
              </tr>
              <tr data-widget="expandable-table" aria-expanded="false">
                <th>Tipo pago </th>
                <td>${data.forma_de_pago}</td>
              </tr>
              <tr data-widget="expandable-table" aria-expanded="false">
                <th>Tipo comprobante </th>
                <td>${data.tipo_comprobante}</td>
              </tr>
              <tr data-widget="expandable-table" aria-expanded="false">
                <th>Cantidad</th>
                <td>${data.cantidad}</td>
              </tr>
              <tr data-widget="expandable-table" aria-expanded="false">
                <th>Precio unitario</th>
                <td>${parseFloat(data.precio_unitario).toFixed(2)}</td>
              </tr>
                <tr data-widget="expandable-table" aria-expanded="false">
                <th>Subtotal</th>
                <td>${parseFloat(data.subtotal).toFixed(2)}</td>
              </tr>
              </tr>
              <tr data-widget="expandable-table" aria-expanded="false">
                <th>IGV</th>
                <td>${parseFloat(data.igv).toFixed(2)}</td>
              </tr>
              <tr data-widget="expandable-table" aria-expanded="false">
                <th>Total</th>
                <td>${parseFloat(data.precio_parcial).toFixed(2)}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>`;

    $("#datostransporte").html(verdatos);
  });
}

//Función para desactivar registros
function desactivar(idotro_ingreso) {
  Swal.fire({
    title: "¿Está Seguro de  Desactivar el registro?",
    text: "",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#28a745",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, desactivar!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post("../ajax/otro_ingreso.php?op=desactivar", { idotro_ingreso: idotro_ingreso }, function (e) {
        Swal.fire("Desactivado!", "Tu registro ha sido desactivado.", "success");

        tabla.ajax.reload();
        total();
      });
    }
  });
}

//Función para activar registros
function activar(idotro_ingreso) {
  Swal.fire({
    title: "¿Está Seguro de  Activar el registro?",
    text: "Este proveedor tendra acceso al sistema",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#28a745",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, activar!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post("../ajax/otro_ingreso.php?op=activar", { idotro_ingreso: idotro_ingreso }, function (e) {
        Swal.fire("Activado!", "Tu registro ha sido activado.", "success");

        tabla.ajax.reload();
        total();
      });
    }
  });
}

//Función para desactivar registros
function eliminar(idotro_ingreso) {
  
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

      //Desactivar
      $.post("../ajax/otro_ingreso.php?op=desactivar", { idotro_ingreso: idotro_ingreso }, function (e) {
        Swal.fire("♻️ Papelera! ♻️", "Tu registro ha sido reciclado.", "success");

        tabla.ajax.reload();
        total();
      });

    }else if (result.isDenied) {

      // Eliminar
      $.post("../ajax/otro_ingreso.php?op=eliminar", { idotro_ingreso: idotro_ingreso }, function (e) {
        Swal.fire("Eliminado!", "Tu registro ha sido Eliminado.", "success");

        tabla.ajax.reload();
        total();
      });

    }

  });
}

// :::::::::::::::::::::::::::::::::::::::::::::::::::: S E C C I O N   P R O V E E D O R  ::::::::::::::::::::::::::::::::::::::::::::::::::::
//Función limpiar
function limpiar_form_proveedor() {
  $("#idproveedor_prov").val("");
  $("#tipo_documento_prov option[value='RUC']").attr("selected", true);
  $("#nombre_prov").val("");
  $("#num_documento_prov").val("");
  $("#direccion_prov").val("");
  $("#telefono_prov").val("");
  $("#c_bancaria_prov").val("");
  $("#cci_prov").val("");
  $("#c_detracciones_prov").val("");
  $("#banco_prov").val("").trigger("change");
  $("#titular_cuenta_prov").val("");

  // Limpiamos las validaciones
  $(".form-control").removeClass('is-valid');
  $(".form-control").removeClass('is-invalid');
  $(".error.invalid-feedback").remove();

  $(".tooltip").removeClass('show');
}

// damos formato a: Cta, CCI
function formato_banco() {

  if ($("#banco_prov").select2("val") == null || $("#banco_prov").select2("val") == "" || $("#banco_prov").select2("val") == "1" ) {

    $("#c_bancaria_prov").prop("readonly", true);
    $("#cci_prov").prop("readonly", true);
    $("#c_detracciones_prov").prop("readonly", true);

  } else {
    
    $(".chargue-format-1").html('<i class="fas fa-spinner fa-pulse fa-lg text-danger"></i>');
    $(".chargue-format-2").html('<i class="fas fa-spinner fa-pulse fa-lg text-danger"></i>');
    $(".chargue-format-3").html('<i class="fas fa-spinner fa-pulse fa-lg text-danger"></i>');    

    $.post("../ajax/compra_activos_fijos.php?op=formato_banco", { 'idbanco': $("#banco_prov").select2("val") }, function (data, status) {
      
      data = JSON.parse(data);  // console.log(data);

      $(".chargue-format-1").html("Cuenta Bancaria");
      $(".chargue-format-2").html("CCI");
      $(".chargue-format-3").html("Cuenta Detracciones");

      $("#c_bancaria_prov").prop("readonly", false);
      $("#cci_prov").prop("readonly", false);
      $("#c_detracciones_prov").prop("readonly", false);

      var format_cta = decifrar_format_banco(data.formato_cta);
      var format_cci = decifrar_format_banco(data.formato_cci);
      var formato_detracciones = decifrar_format_banco(data.formato_detracciones);
      // console.log(format_cta, formato_detracciones);

      $("#c_bancaria_prov").inputmask(`${format_cta}`);
      $("#cci_prov").inputmask(`${format_cci}`);
      $("#c_detracciones_prov").inputmask(`${formato_detracciones}`);
    });
  }
}

function decifrar_format_banco(format) {

  var array_format =  format.split("-"); var format_final = "";

  array_format.forEach((item, index)=>{

    for (let index = 0; index < parseInt(item); index++) { format_final = format_final.concat("9"); }   

    if (parseInt(item) != 0) { format_final = format_final.concat("-"); }
  });

  var ultima_letra = format_final.slice(-1);
   
  if (ultima_letra == "-") { format_final = format_final.slice(0, (format_final.length-1)); }

  return format_final;
}

//guardar proveedor
function guardar_proveedor(e) {
  // e.preventDefault(); //No se activará la acción predeterminada del evento
  var formData = new FormData($("#form-proveedor")[0]);

  $.ajax({
    url: "../ajax/otro_ingreso.php?op=guardar_proveedor",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (e) {
      console.log(e);
      // if(typeof e === 'object'){

        var d = JSON.parse(e); console.log(d);

        if ( d.message == 'noexiste' ) {

          //Cargamos los items al select cliente
          $.post("../ajax/ajax_general.php?op=select2Proveedor", function (r) {  $("#idproveedor").html(r); $("#idproveedor").val(d.id_tabla).trigger("change");});
  
          // toastr.success("proveedor registrado correctamente");
          Swal.fire("Correcto!", "Proveedor guardado correctamente.", "success");        
  
          limpiar_form_proveedor();
  
          $("#modal-agregar-proveedor").modal("hide");
  
        } else if (d.message == 'existe') {   
          var trabajdor = "";
  
          d.data.forEach(key => {
            trabajdor = trabajdor.concat(`<li class="text-left font-size-13px">
              <b>Razón Social: </b>${key.razon_social} <br>
              <b>${key.tipo_documento}: </b>${key.ruc} <br>
              <b>Papelera: </b>${( key.estado==0 ? '<i class="fas fa-check text-success"></i> SI':'<i class="fas fa-times text-danger"></i> NO')} <br>
              <b>Eliminado: </b>${( key.estado_delete==0 ? '<i class="fas fa-check text-success"></i> SI':'<i class="fas fa-times text-danger"></i> NO')} <br>
              <hr class="m-t-2px m-b-2px">
            </li>`);
          });
  
          trabajdor = `<ul>${trabajdor}</ul>`;     
          Swal.fire("El Proveedor Existe!", trabajdor, "info");
        }
      // } else {
      //   Swal.fire("Error!", `<div class="text-left">${e}</div>`, "error");
      // }
    },
  });
}

// .....::::::::::::::::::::::::::::::::::::: V A L I D A T E   F O R M  :::::::::::::::::::::::::::::::::::::::..
$(function () {   

  // Aplicando la validacion del select cada vez que cambie
  $("#forma_pago").on("change", function () { $(this).trigger("blur"); });
  $("#tipo_comprobante").on("change", function () { $(this).trigger("blur"); });
  $("#glosa").on("change", function () { $(this).trigger("blur"); });
  $("#banco_prov").on('change', function() { $(this).trigger('blur'); });
  $("#idproveedor").on('change', function() { $(this).trigger('blur'); });

  $("#form-otro-ingreso").validate({
    ignore: '.select2-input, .select2-focusser',
    rules: {
      idproveedor:{ required: true },
      forma_pago: { required: true },
      tipo_comprobante: { required: true },
      fecha_i: { required: true },
      precio_parcial: { required: true },
      descripcion: { required: true },
      val_igv: { required: true, number: true, min:0, max:1 },
      // terms: { required: true },
    },
    messages: {
      idproveedor:{ required: "Campo requerido", },
      forma_pago: { required: "Campo requerido", },
      tipo_comprobante: { required: "Campo requerido", },
      fecha_i: { required: "Campo requerido", },
      precio_parcial: { required: "Campo requerido",},
      descripcion: { required: "Es necesario rellenar el campo descripción", },
      val_igv: { required: "Campo requerido", number: 'Ingrese un número', min:'Mínimo 0', max:'Maximo 1' },
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
      guardar_y_editar_otros_ingresos(e);
    },

  });

  $("#form-proveedor").validate({
    ignore: '.select2-input, .select2-focusser',
    rules: {
      tipo_documento_prov: { required: true },
      num_documento_prov: { required: true, minlength: 6, maxlength: 20 },
      nombre_prov: { required: true, minlength: 6, maxlength: 100 },
      direccion_prov: { minlength: 5, maxlength: 150 },
      telefono_prov: { minlength: 8 },
      c_bancaria_prov: { minlength: 6,  },
      cci_prov: { minlength: 6,  },
      c_detracciones_prov: { minlength: 6,  },      
      banco_prov: { required: true },
      titular_cuenta_prov: { minlength: 4 },
    },
    messages: {
      tipo_documento_prov: { required: "Por favor selecione un tipo de documento", },
      num_documento_prov: { required: "Campo requerido", minlength: "MÍNIMO 6 caracteres.", maxlength: "MÁXIMO 20 caracteres.", },
      nombre_prov: { required: "Campo requerido", minlength: "MÍNIMO 6 caracteres.", maxlength: "MÁXIMO 100 caracteres.", },
      direccion_prov: { minlength: "MÍNIMO 5 caracteres.", maxlength: "MÁXIMO 150 caracteres.", },
      telefono_prov: { minlength: "MÍNIMO 9 caracteres.", },
      c_bancaria_prov: { minlength: "MÍNIMO 6 caracteres.", },
      cci_prov: { minlength: "MÍNIMO 6 caracteres.",  },
      c_detracciones_prov: { minlength: "MÍNIMO 6 caracteres.", },      
      banco_prov: { required: "Campo requerido",  },
      titular_cuenta_prov: { minlength: 'MÍNIMO 4 caracteres.' },
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
      guardar_proveedor(e);
    },
  });

  //agregando la validacion del select  ya que no tiene un atributo name el plugin 
  $("#forma_pago").rules("add", { required: true, messages: { required: "Campo requerido" } });
  $("#tipo_comprobante").rules("add", { required: true, messages: { required: "Campo requerido" } });
  $("#glosa").rules("add", { required: true, messages: { required: "Campo requerido" } });
  $("#banco_prov").rules('add', { required: true, messages: {  required: "Campo requerido" } });
  $("#idproveedor").rules('add', { required: true, messages: {  required: "Campo requerido" } });

});

// .....::::::::::::::::::::::::::::::::::::: F U N C I O N E S    A L T E R N A S  :::::::::::::::::::::::::::::::::::::::..

// restringimos la fecha para no elegir mañana
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();
if (dd < 10) { dd = "0" + dd; }
if (mm < 10) { mm = "0" + mm; }
today = yyyy + "-" + mm + "-" + dd;
document.getElementById("fecha_i").setAttribute("max", today);

init();