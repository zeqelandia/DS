function quitarTarea(btn){
    const tarea = btn.parentElement.parentElement.parentElement.parentElement;
    swal({
        title: "Desea remover la tarea?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        buttons: {
          cancel: {
            text: "No",
            visible: true,
            className: "redBg",
            closeModal: true,
          },
          confirm: {
            text: "Sí",
            visible: true,
            className: "greenBg",
            closeModal: true,
          }
        }
      })
      .then((willDelete) => {
        if (willDelete) {
            loadingScreen(true);
            $.ajax({
              url: "/eliminarTarea",
              method: 'post',
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              data: {
                 idtarea : $("#quitarTarea").attr("value"),
                 
              },
              success: function(result){
                loadingScreen(false);
                  swal("Tarea eliminada exitosamente", {
                      icon: "success",
                    })
                    .then((value) => {
                      loadingScreen(true);
                      tarea.remove();
                      location.reload();
                    });
                  
              }
            });
        }
      });
}

function generarOrden(btn) {
  
  if ($("#Tarea").length) {

    swal({
      title: "Desea agregar la Orden de Trabajo?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      buttons: {
        cancel: {
          text: "No",
          visible: true,
          className: "redBg",
          closeModal: true,
        },
        confirm: {
          text: "Sí",
          visible: true,
          className: "greenBg",
          closeModal: true,
        }
      }
    })
    .then((willDelete) => {
      if (willDelete) {
          swal("La orden de trabajo fue agregada", {
              icon: "success",
          });
          setTimeout(() => {
            window.location = "/reparaciones";
          }, 1000);
       
      }
    });
    
  }
  else{
    $("#errorFaltaTarea").attr("hidden",false);
    console.log('gola');
  }

}

function agregarTarea(btn) {
  idOrden= $("#OrdenTrabajo").attr("value");
  window.location = "/agregarTarea/"+idOrden;

}