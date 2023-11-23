<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function datosDashboard(){
        $numero_personas = DB::connection('mysql')->table('informacion_personal')
        ->where("informacion_personal.estado", 1)
        ->count();

        $numero_hogares = DB::connection('mysql')->table('informacion_personal')
        ->where("informacion_personal.estado", 1)
        ->where("rol", "Jefe de hogar")
        ->count();

        $tenencia_tierras = DB::connection('mysql')->table('informacion_personal')
        ->join("vivienda_hogar", "vivienda_hogar.identificacion_jefe", "informacion_personal.identificacion")
        ->where("informacion_personal.estado", 1)
        ->where("rol", "Jefe de hogar")
        ->count();

        
    }
}
