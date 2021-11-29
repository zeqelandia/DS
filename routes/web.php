<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PiezaController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ReparacionController;
use App\Http\Controllers\OrdenTrabajoController;
use App\Http\Controllers\TareaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
     return redirect('/reparaciones');
});

// Autenticacion de usuario
Route::get('/login', function () {return view('login');
})->name('login');
Route::post('/login',[SessionController::class,'login'])->middleware('guest');
Route::get('/cerrarSesion',[SessionController::class,'cerrar'])->middleware('auth');
Route::get('/register', [RegisterController::class,'create'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store'])->middleware('guest');
// Route::get('/usuario');
Route::get('/usuario', function () {
    return view('usuario');
})->middleware('auth');
Route::post('/modificarUsuario',[SessionController::class,'modificar'])->middleware('auth');


//Reparaciones

Route::get('/reparaciones', [ReparacionController::class,'obtenerReparaciones'])->middleware('auth');

Route::get('/generarReparacion', [ReparacionController::class,'formGenerarReparacion'])->middleware('auth');
Route::POST('/generarReparacion/crear', [ReparacionController::class,'crearReparacion'])->middleware('auth');
Route::get('/obtenerVehiculoCliente', [VehiculoController::class,'obtenerVehiculoCliente'])->middleware('auth');
Route::POST('/reparaciones/cancelar', [ReparacionController::class,'cancelar'])->middleware('auth');

Route::get('/reparaciones/comprobante/{id}', [ReparacionController::class,'comprobante'])->middleware('auth');

Route::get('/reporteDeReparaciones', function () {
    return view('reporteDeReparaciones');
});
//Ordenes de Trabajo

Route::get('/reparaciones/ordenesDeTrabajo/{id}', [OrdenTrabajoController::class,'obtenerOrdenTrabajos'])->middleware('auth');

Route::get('/reparaciones/agregarOrdenTrabajo/{id}', [OrdenTrabajoController::class,'formAgregar'])->middleware('auth');

Route::get('/reparaciones/agregarOrdenTrabajo/Orden/{id}', [OrdenTrabajoController::class,'volverAgregar'])->middleware('auth');

Route::post('/reparaciones/cancelarOrdenTrabajo/vista', [OrdenTrabajoController::class,'cancelaVista'])->middleware('auth');
Route::get('/reparaciones/cancelarOrdenTrabajo', [OrdenTrabajoController::class,'cancelar'])->middleware('auth');

Route::post('/reparaciones/ordenesDeTrabajo/aceptarOrdenTrabajo', [OrdenTrabajoController::class,'aceptar'])->middleware('auth');




//Tareas
Route::get('/agregarTarea/{id}', [TareaController::class,'mostrarForm'])->middleware('auth');
Route::post('/agregarTarea/form', [TareaController::class,'agregarTarea'])->middleware('auth');
Route::post('/eliminarTarea', [TareaController::class,'eliminarTarea'])->middleware('auth');
Route::post('/reparaciones/ordenesDeTrabajo/completarTarea', [OrdenTrabajoController::class,'completarTarea'])->middleware('auth');

//Pieza

Route::get('/stock', [PiezaController::class,'obtenerPiezas'])->middleware('auth');
Route::get('/obtenerPrecioPieza', [PiezaController::class,'precioPieza'])->middleware('auth');
Route::get('/realizarPedido/{id}', [PiezaController::class,'realizarpedidoForm'])->middleware('auth');
Route::post('/realizarPedido/enviar', [PiezaController::class,'enviarPedido'])->middleware('auth');
Route::get('/cargarStock/{id}', [PiezaController::class,'cargarStockForm'])->middleware('auth');
Route::post('/cargarStock/guardar', [PiezaController::class,'guardarStock'])->middleware('auth');

//Vehiculi
Route::get('/vehiculos', [VehiculoController::class,'obtenerVehiculo'])->middleware('auth');
Route::get('/vehiculo/modificar/{id}', [VehiculoController::class,'cambiarTitularidadForm'])->middleware('auth');
Route::post('/vehiculo/modificar/guardar', [VehiculoController::class,'cambiarTitularidad'])->middleware('auth');
Route::get('/vehiculos/agregar', [VehiculoController::class,'datosAgregarVehiculo'])->middleware('auth');
Route::post('/vehiculos/agregarVehiculo', [VehiculoController::class,'agregarVehiculo'])->middleware('auth');




//Clientes
Route::get('/agregarCliente', function () {
    return view('agregarCliente');
})->middleware('auth');
Route::post('/agregarCiente/agregar', [ClienteController::class,'agregarCliente'])->middleware('auth');
Route::post('/cliente/cancelar', [ClienteController::class,'eliminarCliente'])->middleware('auth');
Route::get('/cliente/modificar/{id}', [ClienteController::class,'datosClienteElegido'])->middleware('auth');
Route::post('/cliente/modificar/guardar', [ClienteController::class,'modificarCliente'])->middleware('auth');



Route::get('/clientes', [ClienteController::class,'obtenerClientes'])->middleware('auth');
Route::get('/clientesAjax', [ClienteController::class,'getClientes']);

Route::get('/cambiarTitularidad', function () {
    return view('cambiarTitularidad');
});

Route::get('/cargarStock', function () {
    return view('cargarStock');
});

Route::get('/realizarPedido', function () {
    return view('realizarPedido');
});