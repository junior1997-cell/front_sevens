$("#frmAcceso").on('submit',function(e) {

  e.preventDefault();
     logina=$("#logina").val();
     clavea=$("#clavea").val();
 
     $.post("../ajax/usuario.php?op=verificar",{"logina":logina,"clavea":clavea}, function(data){
          
         data = JSON.parse(data); console.log(data);
 
        if (data.status){

            /*$(document).Toasts('create', {
                class: 'bg-success',
                title: 'Bienvenido al sistema "Admin Sevens"',
                subtitle: 'cerrar',
                body: 'Se inicio sesion correctamente. Te hemos extrañado, estamos muy contentos de tenerte de vuelta.'
            });*/
            toastr.success('Se inicio sesion correctamente. Te hemos extrañado, estamos muy contentos de tenerte de vuelta.!!!')
            $(location).attr("href","escritorio.php");   

        } else {

            $(document).Toasts('create', {
                class: 'bg-danger',
                title: 'Usuario y/o Password incorrectos',
                subtitle: 'cerrar',
                body: 'Ingrese sus credenciales correctamente, o pida al administrador de sistema restablecer sus credenciales.'
            })
  
        }
     }).fail( function(e) { console.log(e); ver_errores(e); } );
 })