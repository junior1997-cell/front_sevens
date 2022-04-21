$("#frmAcceso").on('submit',function(e) {

  e.preventDefault();
     logina=$("#logina").val();
     clavea=$("#clavea").val();
 
     $.post("../ajax/usuario.php?op=verificar",{"logina":logina,"clavea":clavea}, function(e){
          
         e = JSON.parse(e); console.log(e);
 
         if (e.status){
            if (e.data == null ) {
                toastr.error('Ingrese sus credenciales correctamente, o pida al administrador de sistema restablecer sus credenciales!');
            } else {
                toastr.success('Se inicio sesion correctamente. Te hemos extrañado, estamos muy contentos de tenerte de vuelta!');
              $(location).attr("href","escritorio.php");
            }
               
        } else {
            ver_errores(e); 
        }
     }).fail( function(e) { console.log(e); ver_errores(e); } );
 })