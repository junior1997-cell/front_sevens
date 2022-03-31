
//Función que se ejecuta al inicio
function init() {
  l_proyectos_carousel();
}

function l_proyectos_carousel() {

  $.post("ajax/consultas.php?op=l_proyectos_carousel", {}, function (data, status) {
    console.log(data);  
    data = JSON.parse(data);  console.log(data);  
    if (data.status) {
      
    }else{
      //Swal.fire(`Error ${data.code_error}!`, `<div class="text-left">${data.message}  ${data.data} </div>`, "error");
      console.log('Error brutal: 👇');console.log(data);
      Swal.fire(`Error en la Base de Datos 😅!`, `Contacte al <b>Ing. de Sistemas</b> 📞 <br> <i>921-305-769</i> ─ <i>921-487-276</i>`, "error");
    }


  });

}

init();

