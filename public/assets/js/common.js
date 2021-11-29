// ---- Event handlers ----

// -- General --
var esperaCorta = 2500;
var esperaLarga = 5000;

//When mouse hovers over a list item, turn it's background to a different color
function turnListHover() {
  $(".t-row").mouseenter(function() {
      $(this).addClass( "t-row-hover" );
  });
  
  $(".t-row").mouseout(function() {
      $(this).toggleClass("t-row-hover");
  });
}

turnListHover();

function loadingScreen(loading){
  if(loading){
    $(".loading").css("display", "block");
  }else{
    $(".loading").css("display", "none");
  }
}

// -- Vehículos --
$("#btnAgregarVehiculo").click(function(){

    loadingScreen(true);
    $.ajax({
        url: "/vehiculos/agregar",
        method: 'GET',
        data: {
           _token: '{!! csrf_token() !!}',
        },
        success: function(result){
    
      
           result['marcas'].forEach(i => {
              var txt1 = "<option value="+i.id+">"+ i.nombre +"</option>";    
              $('#marcas').append(txt1);
           });
           result['modelos'].forEach(i => {
            var txt1 = "<option value="+i.id+">"+ i.nombre +"</option>";    
            $('#modelos').append(txt1);
         });
         result['clientes'].forEach(i => {
            var txt1 = "<option value="+i.dni+">"+ i.apellido+  ' '+i.nombre + ' DNI: '+i.dni+"</option>";    
            $('#clientes').append(txt1);
         });
           $('#clientes').attr("disabled",false);
           $('#modelos').attr("disabled",false);
           $('#marcas').attr("disabled",false);
           loadingScreen(false);
        }
      });
    showElement($("#vehiculos-main"), $("#vehiculos-agregar"));

});

function volverAgregarVehiculo() {
  loadingScreen(true);
  setTimeout(() => {
    window.location = "/vehiculos";
  }, 1); 
}

$("#btnGuardarVehiculo").click(function(){
  loadingScreen(true);
  submit();
  setTimeout(() => {
    loadingScreen(false);
  }, esperaCorta);
});

$("#btnCambiarTitularidadVehiculo").click(function(){
  loadingScreen(true);  
  setTimeout(() => {
      window.location = "/vehiculo/modificar/"+ $("#btnCambiarTitularidadVehiculo").attr("value");
      loadingScreen(false); 
    }, 1);
});

// -- Clientes --
$("#btnGuardarCliente").click(function(){
  loadingScreen(true);
  setTimeout(() => {
    loadingScreen(false);
  }, esperaCorta);
});

$("#btnAgregarCliente").click(function(){
  loadingScreen(true);  
  setTimeout(() => {
    window.location = "/agregarCliente";
      loadingScreen(false); 
    }, 1);
 
});

$("#btnModificarCliente").click(function(){ 
  loadingScreen(true);  
  setTimeout(() => {
      window.location = "/cliente/modificar/"+ $("#btnModificarCliente").attr("value");
      loadingScreen(false); 
    }, 1);
});

$("#btnBorrarCliente").click(function(){
  swal({
    title: "Desea borrar al cliente? ",
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
        url: "/cliente/cancelar",
        method: 'post',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
           idCliente : $("#btnBorrarCliente").attr("value"),
           
        },
        success: function(result){
            // loadingScreen(false);
            swal("El cliente se elimino exitosamente", {
                icon: "success",
              })
              .then((value) => {
                loadingScreen(true);
                location.reload();
              });
            
        }
       
      });
    } else {
      loadingScreen(false);
      swal("La cliente no se ha eliminado");
    }
  });
});

// -- Reparaciones --
$("#generarReparacion").click(function(){
  loadingScreen(true);
  setTimeout(() => {
    loadingScreen(false);
  }, esperaLarga);
});

$("#btnCancelarGenerarReparacion").click(function(){
  loadingScreen(true);
  setTimeout(() => {
    loadingScreen(false);
  }, esperaCorta);
});

function obtenerVehiculos() {
  console.log("cambio");
  $('#generarReparacion').attr("disabled",true);
  $('#vehiculosListado').attr("disabled",true);
  let id=clientesListado.value;
  loadingScreen(true);
  $.ajax({
      url: "/obtenerVehiculoCliente",
      method: 'GET',
      data: {
         _token: '{!! csrf_token() !!}',
         id: id,
      },
      success: function(result){
        loadingScreen(false);
        $('#vehiculosListado').empty();
        result['vehiculos'].forEach(i => {
          var txt1 = "<option name='"+i.patente+"'value'"+i.patente+"'>"+ i.patente+"</option>";    
          $('#vehiculosListado').append(txt1);
       });
       $('#vehiculosListado').attr("disabled",false);
       $('#generarReparacion').attr("disabled",false);
       loadingScreen(false);
      }
    });
}

$("#btnCancelarReparacion").click(function(){
    swal({
        title: "Desea cancelar la reparación?",
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
            url: "/reparaciones/cancelar",
            method: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
               idReparacion : $("#btnCancelarReparacion").attr("value"),
               
            },
            success: function(result){
                //loadingScreen(false);
                swal("Reparación cancelada exitosamente", {
                    icon: "success",
                  })
                  .then((value) => {
                    loadingScreen(true);
                    location.reload();
                  });
                
            }
           
          });
        } else {
          loadingScreen(false);
          swal("La reparación no se ha cancelado");
        }
      });
});

$("#btnGenerarComprobante").click(function(){
  // revisar... esto esta para que corra primero la funcion de contextemenu y le ponga en el value el id de la reparacion.. habria que hacerlo antes
  loadingScreen(true);  
  setTimeout(() => {
      window.location = "/reparaciones/comprobante/"+ $("#btnGenerarComprobante").attr("value");
      loadingScreen(false); 
    }, 1);
});

$("#btnVerOrdenesTrabajo").click(function(){
  loadingScreen(true);  
  // revisar... esto esta para que corra primero la funcion de contextemenu y le ponga en el value el id de la reparacion.. habria que hacerlo antes
    setTimeout(() => {
        window.location = "/reparaciones/ordenesDeTrabajo/"+ $("#btnVerOrdenesTrabajo").attr("value");
      }, 1);
});

$("#btnAgregarOrdenTrabajo").click(function(){
  // revisar... esto esta para que corra primero la funcion de contextemenu y le ponga en el value el id de la reparacion.. habria que hacerlo antes
  loadingScreen(true);  
  setTimeout(() => {
      window.location = "/reparaciones/agregarOrdenTrabajo/"+ $("#btnAgregarOrdenTrabajo").attr("value");
    }, 1);
});



// -- Ordenes de trabajo --

function aceptarOrdenTrabajo(btn) {
//Para que no hagan cagadas descativo todos los botones

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

swal({
    title: "¿Esta seguro que desea aceptar la orden de trabajo?",
    icon: "info",
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
            url: "/reparaciones/ordenesDeTrabajo/aceptarOrdenTrabajo",
            method: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
               idOrdenTrabajo :btn.value,
               
            },
            success: function(result){
              loadingScreen(false);
                swal("La orden de trabajo fue aceptada correcamente", {
                    icon: "success",
                  })
                  .then((value) => {
                    loadingScreen(true);
                    location.reload();
                  });
                
            }
           
          });
    } else {
      loadingScreen(false);
      swal("La orden de trabajo no se acepto");
    }
  });
}

function rechazarOrdenTrabajo(btn) {
  //Para que no hagan cagadas descativo todos los botones

  console.log(btn);
  console.log(btn.value);
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

swal({
    title: "¿Esta seguro que desea eliminar la orden de trabajo?",
    icon: "info",
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
            url: "/reparaciones/cancelarOrdenTrabajo/vista",
            method: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
               idOrdenTrabajo :btn.value,
               
            },
            success: function(result){
              loadingScreen(false);
                swal("La orden de trabajo fue eliminada correcamente", {
                    icon: "success",
                  })
                  .then((value) => {
                    loadingScreen(true);
                    location.reload();
                  });
                
            }
           
          });
    } else {
      loadingScreen(false);
      swal("La orden de trabajo no fue cancelada");

    }
  });
}
// $("#btnAceptarOrdendeTrabajo").click(function(){
     
// });
$("#btnGenerarOrden").click(function(){
  loadingScreen(true);
  setTimeout(() => {
    loadingScreen(false);
  }, esperaLarga);
});

$("#btnCancelarGenerarOrden").click(function(){
  loadingScreen(true);
  setTimeout(() => {
    loadingScreen(false);
  }, esperaCorta);
});

$("#btnAgregarTarea").click(function(){
  loadingScreen(true);
  setTimeout(() => {
    loadingScreen(false);
  }, esperaCorta);
});

// --Tareas --
function completarTarea(btn) {
console.log(btn.value);
//Para que no hagan cagadas descativo todos los botones

swal({
    title: "¿Esta seguro que desea completar la Tarea?",
    icon: "info",
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
            url: "/reparaciones/ordenesDeTrabajo/completarTarea",
            method: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
               idTarea : btn.value,
               
            },
            success: function(result){
                loadingScreen(false);
                swal("La tarea fue completada correcamente", {
                    icon: "success",
                  })
                  .then((value) => {
                    loadingScreen(true);
                    location.reload();
                  });
                
            }
           
          });
    } else {
      loadingScreen(false);
      swal("La tarea no fue completada");
    }
  });
}

function cancelarTarea(btn) {
  //Para que no hagan cagadas descativo todos los botones

  console.log(btn);
  console.log(btn.value);
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

swal({
    title: "¿Esta seguro que desea cancelar la tarea?",
    icon: "info",
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
    loadingScreen(true);
    if (willDelete) {
        $.ajax({
            url: "/eliminarTarea",
            method: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
               idtarea :btn.value,
               
            },
            success: function(result){
              loadingScreen(false);
                swal("La tarea fue cancelada correcamente", {
                    icon: "success",
                  })
                  .then((value) => {
                    loadingScreen(true);
                    location.reload();
                  });
                
            }
           
          });
    } else {
      loadingScreen(false);
      swal("La tarea no fue cancelada");

    }
  });
}

$("#AgregarTarea").click(function(){
  loadingScreen(true);
  setTimeout(() => {
    loadingScreen(false);
  }, esperaCorta);
});

$("#btnCancelarAgregarTarea").click(function(){
  loadingScreen(true);
  idOrden= $("#OrdenTrabajo").attr("value");
  console.log("/reparaciones/agregarOrdenTrabajo/Orden/"+idOrden);
  window.location = "/reparaciones/agregarOrdenTrabajo/Orden/"+idOrden;
  setTimeout(() => {
    loadingScreen(false);
  }, esperaCorta);
});

// Clientes

function cancelarAgregarCliente() {
  swal({
      title: "Desea cancelar?",
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
          window.location = "/clientes";
      }
    });
}

$("#btnModificarCliente").click(function(){
  loadingScreen(true);
  setTimeout(() => {
    loadingScreen(false);
  }, esperaCorta);
  //submit();
});

$("#btnCancelarModificarCliente").click(function(){
  loadingScreen(true);
  setTimeout(() => {
    loadingScreen(false);
  }, esperaCorta);
});

//Stock piezas
$("#btnCargarStock").click(function(){
  loadingScreen(true);  
  // revisar... esto esta para que corra primero la funcion de contextemenu y le ponga en el value el id de la reparacion.. habria que hacerlo antes
    setTimeout(() => {
        window.location = "/cargarStock/"+ $("#btnCargarStock").attr("value");
      }, 1);
      loadingScreen(false);  
});

$("#btnRealizarPedido").click(function(){
  loadingScreen(true);  
  // revisar... esto esta para que corra primero la funcion de contextemenu y le ponga en el value el id de la reparacion.. habria que hacerlo antes
    setTimeout(() => {
        window.location = "/realizarPedido/"+ $("#btnRealizarPedido").attr("value");
      }, 1);
      loadingScreen(false);  
});

$("#btnGuardarStock").click(function(){
  loadingScreen(true);
  setTimeout(() => {
    loadingScreen(false);
  }, esperaCorta);
});

$("#btnCancelarGuardarStock").click(function(){
  loadingScreen(true);
  setTimeout(() => {
    loadingScreen(false);
  }, esperaCorta);
});

// ---- Functions ----

//When switching from one page to another in the same view, hide the last one and show the current one
function showElement(pageFrom, pageTo) {
    pageFrom.css("display", "none");
    pageTo.css("display", "block");
}