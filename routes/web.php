<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\TpagoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PagoController;
use App\Models\Empleado;
use App\Models\Cliente;
use App\Models\Pais;
use App\Models\Estado;
use App\Models\Ciudad;
use App\Models\Parroquia;
use App\Models\Cargo;
use App\Models\Tpago;
use App\Models\Role;
use App\Models\Pago;

//Route::resource('empleados','EmpleadoController')->names('empleados');

##########################
/// Seccion de empleados ///

Route::get('empleados', [EmpleadoController::class, 'index'])->name('empleados_index');

Route::post(uri: 'empleados', action: [App\Http\Controllers\EmpleadoController::class, 'store' ])->name( name: 'empleados.store');//Fn crear

Route::get(uri: 'empleados/view/{empleado_id}', action: [App\Http\Controllers\EmpleadoController::class, 'show' ])->name( name: 'empleado.show'); //Fn ver

Route::get(uri: 'empleados/{id}/edit', action: [App\Http\Controllers\EmpleadoController::class, 'edit' ])->name( name: 'empleados.edit');//Fn show para editar

Route::put(uri: 'empleados/edit/{empleado_id}', action: [App\Http\Controllers\EmpleadoController::class, 'update' ])->name( name: 'empleados.update');//Fn editar

Route::delete(uri: 'empleados/{empleado}', action: [App\Http\Controllers\EmpleadoController::class, 'destroy' ])->name( name: 'empleados.delete'); //Fn borrar


##########################
/// Seccion de clientes ///

//Route::resource('clientes','ClienteController')->names('clientes');

Route::get('clientes', [ClienteController::class, 'index'])->name('clientes_index');

Route::post(uri: 'clientes', action: [App\Http\Controllers\ClienteController::class, 'store' ])->name( name: 'clientes.store');//Fn crear

Route::get(uri: 'clientes/view/{cliente_id}', action: [App\Http\Controllers\ClienteController::class, 'show' ])->name( name: 'clientes.show'); //Fn ver

Route::get(uri: 'clientes/{id}/edit', action: [App\Http\Controllers\ClienteController::class, 'edit' ])->name( name: 'clientes.edit');//Fn show para editar

Route::put(uri: 'clientes/edit/{cliente_id}', action: [App\Http\Controllers\ClienteController::class, 'update' ])->name( name: 'clientes.update');//Fn editar

Route::delete(uri: 'clientes/{cliente}', action: [App\Http\Controllers\ClienteController::class, 'destroy' ])->name( name: 'clientes.delete');


//  Route::group(['middleware' => 'auth'], function () {
// 	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
// 	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
// 	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
// 	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
// });

// Route::group(['middleware' => 'auth'], function () {
// 	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
// });

Auth::routes();

##########################
/// Seccion de Home ///

//Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

##########################
/// Seccion de cargos ///

//Route::resource('cargos','CargoController')->names('cargos');

Route::get('cargos', [CargoController::class, 'index'])->name('cargos_index');

Route::post(uri: 'cargos', action: [App\Http\Controllers\CargoController::class, 'store' ])->name( name: 'cargos.store');//Fn crear

Route::delete(uri: 'cargos/{cargo}', action: [App\Http\Controllers\CargoController::class, 'destroy' ])->name( name: 'cargos.delete');//Fn borrar

Route::get(uri: 'cargos/view/{id}', action: [App\Http\Controllers\CargoController::class, 'ver' ])->name( name: 'cargos.ver');//Fn ver

Route::get(uri: 'cargos/{cargo_id}/edit', action: [App\Http\Controllers\CargoController::class, 'edit' ])->name( name: 'cargos.edit');//Fn show para editar

Route::put(uri: 'cargos/edit/{cargo_id}', action: [App\Http\Controllers\CargoController::class, 'update' ])->name( name: 'cargos.update');// Fn actualizar


##########################
/// Seccion de tpagos ///

//Route::resource('tpagos','TpagoController')->names('tpagos');

Route::get('tpagos', [TpagoController::class, 'index'])->name('tpagos');

Route::post(uri: 'tpagos', action: [App\Http\Controllers\TpagoController::class, 'store' ])->name( name: 'tpagos.store');//Fn crear

Route::delete(uri: 'tpagos/{tpago}', action: [App\Http\Controllers\TpagoController::class, 'destroy' ])->name( name: 'tpagos.delete');//Fn borrar

Route::get(uri: 'tpagos/view/{id}', action: [App\Http\Controllers\TpagoController::class, 'ver' ])->name( name: 'tpagos.ver');//Fn ver

Route::get(uri: 'tpagos/{tpago_id}/edit', action: [App\Http\Controllers\TpagoController::class, 'edit' ])->name( name: 'tpagos.edit');//Fn show para editar

Route::put(uri: 'tpagos/edit/{tpago_id}', action: [App\Http\Controllers\TpagoController::class, 'update' ])->name( name: 'tpagos.update');// Fn actualizar


##########################
/// Seccion de roles ///

//Route::resource('roles','RoleController')->names('roles');

Route::get('roles', [RoleController::class, 'index'])->name('roles');

Route::post(uri: 'roles', action: [App\Http\Controllers\RoleController::class, 'store' ])->name( name: 'roles.store');//Fn crear

Route::delete(uri: 'roles/{role}', action: [App\Http\Controllers\RoleController::class, 'destroy' ])->name( name: 'roles.delete');//Fn borrar

Route::get(uri: 'roles/view/{id}', action: [App\Http\Controllers\RoleController::class, 'ver' ])->name( name: 'roles.ver');//Fn ver

Route::get(uri: 'roles/{role_id}/edit', action: [App\Http\Controllers\RoleController::class, 'edit' ])->name( name: 'roles.edit');//Fn show para editar

Route::put(uri: 'roles/edit/{role_id}', action: [App\Http\Controllers\RoleController::class, 'update' ])->name( name: 'roles.update');// Fn actualizar


##########################
/// Seccion de pagos ///

//Route::resource('pagos','PagoController')->names('pagos');

Route::get('pagos', [PagoController::class, 'index'])->name('pagos');

Route::post(uri: 'pagos', action: [App\Http\Controllers\PagoController::class, 'store' ])->name( name: 'pagos.store');//Fn crear

Route::delete(uri: 'pagos/{pago}', action: [App\Http\Controllers\PagoController::class, 'destroy' ])->name( name: 'pagos.delete');//Fn borrar

Route::get(uri: 'pagos/view/{id}', action: [App\Http\Controllers\PagoController::class, 'show' ])->name( name: 'pagos.show');//Fn ver

Route::get(uri: 'pagos/{pago_id}/edit', action: [App\Http\Controllers\PagoController::class, 'edit' ])->name( name: 'pagos.edit');//Fn show para editar

Route::put(uri: 'pagos/edit/{pago_id}', action: [App\Http\Controllers\PagoController::class, 'update' ])->name( name: 'pagos.update');// Fn actualizar
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
