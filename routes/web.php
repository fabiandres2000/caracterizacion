<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CaracterizacionController;

use Illuminate\Http\Request;


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

// routes/web.php
// Rutas de la API
Route::prefix('api')->group(function () {
    Route::get('/iniciar-sesion', [UsuarioController::class, 'loginUsuario'])->name('loginUsuario');
    Route::get('/mis-datos', [UsuarioController::class, 'misDatos'])->name('misDatos');
    Route::get('/verificarLogin', [UsuarioController::class, 'verificarLogin'])->name('verificarLogin');
    Route::post('/editar-usuario', [UsuarioController::class, 'editarUsuario'])->name('editarUsuario');
    Route::post('/cambiar-password', [UsuarioController::class, 'cambiarPassword'])->name('cambiarPassword');

    Route::get('/caracterizados', [CaracterizacionController::class, 'listarCaracterizados'])->name('listarCaracterizados');
    Route::get('/datos-individuo', [CaracterizacionController::class, 'consultarDatosIndividuo'])->name('consultarDatosIndividuo');

    Route::post('/guardar-informacion-personal', [CaracterizacionController::class, 'guardarInformacionPersonal'])->name('guardarInformacionPersonal');
    Route::post('/guardar-origen-entidad', [CaracterizacionController::class, 'guardarOrigenEntidad'])->name('guardarOrigenEntidad');
    Route::post('/guardar-educacion', [CaracterizacionController::class, 'guardarEducacion'])->name('guardarEducacion');
    Route::post('/guardar-situacion-laboral', [CaracterizacionController::class, 'guardarSituacionLaboral'])->name('guardarSituacionLaboral');
    Route::post('/guardar-salud', [CaracterizacionController::class, 'guardarSalud'])->name('guardarSalud');
    Route::post('/guardar-cultura-tradiciones', [CaracterizacionController::class, 'guardarCulturaTradiciones'])->name('guardarCulturaTradiciones');
    Route::post('/guardar-vivienda-hogar', [CaracterizacionController::class, 'guardarViviendaHogar'])->name('guardarViviendaHogar');

    Route::get('/jefes-hogar', [CaracterizacionController::class, 'consultarJefesHogar'])->name('consultarJefesHogar');
    Route::get('/departamentos', [CaracterizacionController::class, 'consultarDepartamentos'])->name('consultarDepartamentos');
    Route::get('/municipios', [CaracterizacionController::class, 'consultarMunicipios'])->name('consultarMunicipios');
    Route::get('/escolaridad', [CaracterizacionController::class, 'consultarEscolaridad'])->name('consultarEscolaridad');
    Route::get('/ocupaciones', [CaracterizacionController::class, 'consultarOcupaciones'])->name('consultarOcupaciones');

});

Route::get('/', function () {
    return view('vue');
});

Route::get('/{any}', function () {
    return view('principal');
})->where('any', '.*');