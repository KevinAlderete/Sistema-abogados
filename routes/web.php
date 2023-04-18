<?php

use App\Http\Controllers\ActividadCasoController;
use App\Http\Controllers\ActividadConciliacionController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\Admin\indexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\calendarController;
use App\Http\Controllers\CasoDocumentoController;
use App\Http\Controllers\CasosController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ConciliadorController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\ExpedienteDocumentosController;
use App\Http\Controllers\InvitadoConciliacionController;
use App\Http\Controllers\ParteContrariaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubmateriaController;
use App\Http\Controllers\TipoProcesoController;
use Illuminate\Support\Facades\Route;

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
    return view('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->name('dashboard')->prefix('dashboard')->group(function() {
    Route::get('/', [indexController::class, 'dashboard']);
    Route::get('/', [indexController::class, 'dashCalendar']);
    
});

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function() {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    Route::resource('/permissions', PermissionController::class);
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
    
    Route::resource('/users', UserController::class);
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');

});

Route::middleware(['auth', 'verified'])->name('agenda.')->prefix('agenda')->group(function() {
    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
});

Route::middleware(['auth', 'role:encargado|admin|asistente|abogado'])->name('clientes.')->prefix('clientes')->group(function() {
    Route::resource('/', ClienteController::class);
    Route::get('/', [ClienteController::class, 'index'])->name('index');
    Route::get('/{cliente}', [ClienteController::class, 'show'])->name('clientes.show');
    Route::get('/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
    Route::get('/search', [ClienteController::class, 'search'])->name('search');

});

Route::middleware(['auth', 'role:encargado|admin|asistente'])->name('conciliacion.')->prefix('conciliacion')->group(function() {
    Route::resource('/submaterias', SubmateriaController::class);
    Route::get('/submaterias', [SubmateriaController::class, 'index'])->name('submaterias.index');
    Route::delete('/submaterias/{submateria}', [SubmateriaController::class, 'destroy'])->name('submaterias.destroy');
    //Route::get('/sub-materias/{submateria}', [SubmateriaController::class, 'show'])->name('sub-materias.show');
    Route::get('/submaterias/{submateria}/edit', [SubmateriaController::class, 'edit'])->name('submaterias.edit');
    Route::put('/submaterias/{cliente}', [SubmateriaController::class, 'update'])->name('submaterias.update');
});

Route::middleware(['auth', 'role:encargado|admin|asistente'])->name('conciliacion.')->prefix('conciliacion')->group(function() {
    Route::resource('/invitado', InvitadoConciliacionController::class);
    Route::get('/invitado/{invitado}/edit', [InvitadoConciliacionController::class, 'edit'])->name('invitado.edit');
    Route::put('/invitado/{invitado}', [InvitadoConciliacionController::class, 'update'])->name('invitado.update');
    Route::delete('/invitado/{invitado}', [InvitadoConciliacionController::class, 'destroy'])->name('invitado.destroy');
});

Route::middleware(['auth', 'role:encargado|admin|asistente'])->name('conciliacion.')->prefix('conciliacion')->group(function() {
    Route::resource('/conciliador', ConciliadorController::class);
});

Route::middleware(['auth', 'role:encargado|admin|asistente'])->name('conciliacion.')->prefix('conciliacion')->group(function() {
    Route::resource('/expediente', ExpedienteController::class);
    //Route::get('/expediente', [ExpedienteController::class, 'index'])->name('expediente.index');
    Route::get('/expediente/{expediente}', [ExpedienteController::class, 'show'])->name('expediente.show');
    Route::delete('/expediente/{expediente}', [ExpedienteController::class, 'destroy'])->name('expediente.destroy');
    Route::get('/expediente/{expediente}/edit', [ExpedienteController::class, 'edit'])->name('expediente.edit');
    Route::put('/expediente/{expediente}', [ExpedienteController::class, 'update'])->name('expediente.update');

    //submateria
    Route::post('/expediente/{expediente}/submaterias', [ExpedienteController::class, 'assignSubmateria'])->name('expediente.submaterias');
    Route::delete('/expediente/submaterias/{ex_submateria}', [ExpedienteController::class, 'removeSubmateria'])->name('expediente.submaterias.remove');
    

    //documentos
    //Route::resource('/expediente/{expediente}/file', ExpedienteDocumentosController::class);
    Route::get('/expediente/{expediente}/file', [ExpedienteDocumentosController::class, 'create'])->name('expediente.file.create');
    //Route::get('/expediente/{expediente}/file', [ExpedienteDocumentosController::class, 'index'])->name('expediente.file.index');
    Route::post('/expediente/{expediente}', [ExpedienteDocumentosController::class, 'store'])->name('expediente.file.store');
    Route::delete('/expediente/{expediente}/file', [ExpedienteDocumentosController::class, 'destroy'])->name('expediente.file.destroy');
    Route::get('/expediente/file/{file}/edit', [ExpedienteDocumentosController::class, 'edit'])->name('expediente.file.edit');
    Route::put('/expediente/{file}/file', [ExpedienteDocumentosController::class, 'update'])->name('expediente.file.update');
    Route::get('/expediente/file/download/{file}', [ExpedienteDocumentosController::class, 'download'])->name('expediente.file.download');
    Route::get('/expediente/file/{file}', [ExpedienteDocumentosController::class, 'view'])->name('expediente.file.view');

    //invitado
    Route::post('/expediente/{expediente}/invitados', [ExpedienteController::class, 'assignInvitado'])->name('expediente.invitados');
    Route::delete('/expediente/invitados/{ex_invitado}', [ExpedienteController::class, 'removeInvitado'])->name('expediente.invitados.remove');
    
    //conciliador
    Route::post('/expediente/{expediente}/conciliadores', [ExpedienteController::class, 'assignConciliador'])->name('expediente.conciliadores');
    Route::delete('/expediente/conciliadores/{ex_conciliador}', [ExpedienteController::class, 'removeConciliador'])->name('expediente.conciliadores.remove');
    
});

Route::middleware(['auth', 'role:encargado|admin|abogado'])->name('caso.')->prefix('caso')->group(function() {
    Route::resource('/caso', CasosController::class);
    Route::get('/caso/{caso}/edit', [CasosController::class, 'edit'])->name('caso.edit');
    Route::put('/caso/{caso}', [CasosController::class, 'update'])->name('caso.update');
    Route::delete('/caso/{caso}', [CasosController::class, 'destroy'])->name('caso.destroy');

    //proceso
    Route::post('/caso/{caso}/procesos', [CasosController::class, 'assignProceso'])->name('caso.proceso');
    Route::delete('/caso/procesos/{cas_proceso}', [CasosController::class, 'removeProceso'])->name('caso.proceso.remove');
    
    //parte contraria
    Route::post('/caso/{caso}/p_contrarias', [CasosController::class, 'assignPContraria'])->name('caso.p_contrarias');
    Route::delete('/caso/p_contrarias/{cas_contraria}', [CasosController::class, 'removePContraria'])->name('caso.p_contrarias.remove');
    
    //documentos
    Route::get('/caso/{caso}/file', [CasoDocumentoController::class, 'create'])->name('caso.file.create');
    Route::post('/caso/{caso}', [CasoDocumentoController::class, 'store'])->name('caso.file.store');
    Route::get('/caso/file/{file}/edit', [CasoDocumentoController::class, 'edit'])->name('caso.file.edit');
    Route::put('/caso/{file}/file', [CasoDocumentoController::class, 'update'])->name('caso.file.update');
    Route::delete('/caso/{caso}/file', [CasoDocumentoController::class, 'destroy'])->name('caso.file.destroy');
    Route::get('/caso/file/download/{file}', [CasoDocumentoController::class, 'download'])->name('caso.file.download');
    Route::get('/caso/file/{file}', [CasoDocumentoController::class, 'view'])->name('caso.file.view');

});

Route::middleware(['auth', 'role:encargado|admin|abogado'])->name('caso.')->prefix('caso')->group(function() {
    Route::resource('/tipoProceso', TipoProcesoController::class);
});

Route::middleware(['auth', 'role:encargado|admin|abogado'])->name('caso.')->prefix('caso')->group(function() {
    Route::resource('/parteContraria', ParteContrariaController::class);
});

Route::middleware(['auth', 'verified'])->name('agenda.')->prefix('agenda')->group(function() {
    Route::resource('/actividad', ActividadController::class);
    Route::get('/actividad/{actividades}/edit', [ActividadController::class, 'edit'])->name('agenda.actividad.edit');
    Route::put('/actividad/{actividades}', [ActividadController::class, 'update'])->name('agenda.actividad.update');
    Route::delete('/actividad/{actividades}', [ActividadController::class, 'destroy'])->name('agenda.actividad.destroy');
    //conciliacion actividad

});

Route::middleware(['auth', 'role:encargado|admin|asistente'])->name('agenda.')->prefix('agenda')->group(function() {
    Route::resource('/actividadConciliacion', ActividadConciliacionController::class);  
    Route::get('/actividadConciliacion/{con_actividad}/edit', [ActividadConciliacionController::class, 'edit'])->name('agenda.actividadConciliacion.edit');

    Route::put('/actividadConciliacion/{con_actividad}', [ActividadConciliacionController::class, 'update'])->name('agenda.actividadConciliacion.update');
    Route::delete('/actividadConciliacion/{con_actividad}', [ActividadConciliacionController::class, 'destroy'])->name('agenda.actividadConciliacion.destroy');

});

Route::middleware(['auth', 'role:encargado|admin|abogado'])->name('agenda.')->prefix('agenda')->group(function() {
    Route::resource('/actividadCaso', ActividadCasoController::class);  
    Route::get('/actividadCaso/{cas_actividad}/edit', [ActividadCasoController::class, 'edit'])->name('agenda.actividadCaso.edit');

    Route::put('/actividadCaso/{cas_actividad}', [ActividadCasoController::class, 'update'])->name('agenda.actividadCaso.update');
    Route::delete('/actividadCaso/{cas_actividad}', [ActividadCasoController::class, 'destroy'])->name('agenda.actividadCaso.destroy');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
