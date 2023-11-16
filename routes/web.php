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

    Route::post('/guardar-informacion-personal', [CaracterizacionController::class, 'guardarInformacionPersonal'])->name('guardarInformacionPersonal');
    Route::post('/guardar-origen-entidad', [CaracterizacionController::class, 'guardarOrigenEntidad'])->name('guardarOrigenEntidad');
    Route::post('/guardar-educacion', [CaracterizacionController::class, 'guardarEducacion'])->name('guardarEducacion');
    Route::post('/guardar-situacion-laboral', [CaracterizacionController::class, 'guardarSituacionLaboral'])->name('guardarSituacionLaboral');
    Route::post('/guardar-salud', [CaracterizacionController::class, 'guardarSalud'])->name('guardarSalud');
    Route::post('/guardar-cultura-tradiciones', [CaracterizacionController::class, 'guardarCulturaTradiciones'])->name('guardarCulturaTradiciones');

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