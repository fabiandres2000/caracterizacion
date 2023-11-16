<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

use Illuminate\Support\Facades\Session;

class CaracterizacionController extends Controller
{

    public function consultarDepartamentos()
    {
        $departamentos = DB::connection('mysql')->table('dptos')->get();
        return response()->json($departamentos);
    }

    public function consultarMunicipios(Request $request)
    {
        $codigo = $request->input('codigo');

        $municipios = DB::connection('mysql')->table('muni')
        ->where("coddep", $codigo)
        ->get();

        return response()->json($municipios);
    }

    public function consultarEscolaridad()
    {
        $escolaridades = DB::connection('mysql')->table('escolaridad')->get();
        return response()->json($escolaridades);
    }

    public function consultarOcupaciones()
    {
        $ocupaciones = DB::connection('mysql')->table('ocupaciones')->get();
        return response()->json($ocupaciones);
    }

    public function guardarInformacionPersonal(Request $request){
        $timezone = new \DateTimeZone('America/Bogota');
        $fechaActual = new \DateTime('now', $timezone);

        $numero_caracterizacion = self::generarNumeroCaracterizacion();
        $dia_caracterizacion = $fechaActual->format('d');
        $mes_caracterizacion = $fechaActual->format('m');
        $anio_caracterizacion = $fechaActual->format('Y');
        $fecha_caracterizacion = $fechaActual->format('d-m-Y');
        $hora_caracterizacion = $fechaActual->format('H:i:s');

        $datos = [
            'rol' => $request->input('rol'),
            'id_jefe' => $request->input('id_jefe') != "" ?  $request->input('id_jefe') : null,
            'direccion' => $request->input('direccion'),
            'nombre_completo' => $request->input('nombre_completo'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'tipo_identificacion' => $request->input('tipo_identificacion'),
            'identificacion' => $request->input('numero_identificacion'),
            'direccion_residencia' => $request->input('direccion_residencia'),
            'sexo' => $request->input('sexo'),
            'cual_sexo' => $request->input('cual_sexo'),
            'identidad_genero' => $request->input('identidad_genero'),
            'orientacion_sexual' => $request->input('orientacion_sexual'),
            'estado_civil' => $request->input('estado_civil'),
            'cual_estado_civil' => $request->input('cual_estado_civil'),
            'creencia_religiosa' => $request->input('creencia_religiosa'),
            'cual_creencia_religiosa' => $request->input('cual_creencia_religiosa'),
            'adicciones' => $request->input('adicciones'),
            'cual_adicciones' => $request->input('cual_adicciones'),
            'tiempo_municipio' => $request->input('tiempo_municipo'),
            'desplazado' => $request->input('desplazado'),
            'numero_caracterizacion' => $numero_caracterizacion,
            'dia_caracterizacion' => $dia_caracterizacion,
            'mes_caracterizacion' => $mes_caracterizacion,
            'anio_caracterizacion' => $anio_caracterizacion,
            'fecha_caracterizacion' => $fecha_caracterizacion,
            'hora_caracterizacion' => $hora_caracterizacion,
        ];

        $insertado = DB::connection('mysql')->table('informacion_personal')->updateOrInsert(
            ['identificacion' => $datos['identificacion']],
            $datos 
        );

        if($insertado){
            return response()->json(['mensaje' => 'Datos guardados correctamente', 'code' => 1]);
        }else{
            return response()->json(['mensaje' => 'Ocurrió un error, intente nuevamente', 'code' => 0]);
        }
       
    }


    public function generarNumeroCaracterizacion()
    {
        $ultimoNumero = DB::connection('mysql')->table('informacion_personal')->max('numero_caracterizacion');

        if ($ultimoNumero) {
            // Extraer el número y aumentarlo en 1
            $numero = (int)substr($ultimoNumero, 2) + 1;
        } else {
            // Si no hay registros, empezar desde 1
            $numero = 1;
        }

        // Formatear el nuevo número con ceros a la izquierda
        $nuevoNumero = 'CA' . str_pad($numero, 4, '0', STR_PAD_LEFT);
        return $nuevoNumero;
    }

    public function guardarOrigenEntidad(Request $request){
      
        $datos = [
            'identificacion_individuo' => $request->input('identificacion_individuo'),
            'pais_nacimiento' => $request->input('pais'),
            'departamento_nacimiento' => $request->input('departamento'),
            'municipio_nacimiento' => $request->input('municipio'),
            'etnia' => $request->input('etnia')
        ];

        $insertado = DB::connection('mysql')->table('origen_etnia')->updateOrInsert(
            ['identificacion_individuo' => $datos['identificacion_individuo']],
            $datos 
        );

        if($insertado){
            return response()->json(['mensaje' => 'Datos guardados correctamente', 'code' => 1]);
        }else{
            return response()->json(['mensaje' => 'Ocurrió un error, intente nuevamente', 'code' => 0]);
        }
    }

    public function guardarEducacion(Request $request){
      
        $datos = [
            'identificacion_individuo' => $request->input('identificacion_individuo'),
            'nivel_educativo' => $request->input('nivel_educativo'),
            'cual_nivel_educativo' => $request->input('cual_nivel_educativo'),
            'educacion_especifica' => $request->input('educacion_especifica'),
            'barreras_educacion' => $request->input('barreras_educacion'),
            'descriminacion_racial' => $request->input('descriminacion_racial'),
            'apoyo_educativo' => $request->input('apoyo_educativo')
        ];

        $insertado = DB::connection('mysql')->table('educacion')->updateOrInsert(
            ['identificacion_individuo' => $datos['identificacion_individuo']],
            $datos 
        );

        if($insertado){
            return response()->json(['mensaje' => 'Datos guardados correctamente', 'code' => 1]);
        }else{
            return response()->json(['mensaje' => 'Ocurrió un error, intente nuevamente', 'code' => 0]);
        }
    }

    public function guardarSituacionLaboral(Request $request){
        $datos = [
            'identificacion_individuo' => $request->input('identificacion_individuo'),
            'ocupacion' => $request->input('ocupacion'),
            'situacion_laboral' => $request->input('situacion_laboral'),
            'discriminacion_laboral' => $request->input('discriminacion_laboral'),
            'ingreso_mensual' => $request->input('ingreso_mensual')
        ];

        $insertado = DB::connection('mysql')->table('situacion_laboral')->updateOrInsert(
            ['identificacion_individuo' => $datos['identificacion_individuo']],
            $datos 
        );

        if($insertado){
            return response()->json(['mensaje' => 'Datos guardados correctamente', 'code' => 1]);
        }else{
            return response()->json(['mensaje' => 'Ocurrió un error, intente nuevamente', 'code' => 0]);
        }
    }

    public function guardarSalud(Request $request){
      
        $datos = [
            'identificacion_individuo' => $request->input('identificacion_individuo'),
            'estado_salud' => $request->input('estado_salud'),
            'condicion_discapacidad' => $request->input('condicion_discapacidad'),
            'acceso_salud' => $request->input('acceso_salud'),
            'regimen' => $request->input('regimen'),
            'discriminacion_salud' => $request->input('discriminacion_salud')
        ];

        $insertado = DB::connection('mysql')->table('salud')->updateOrInsert(
            ['identificacion_individuo' => $datos['identificacion_individuo']],
            $datos 
        );

        if($insertado){
            return response()->json(['mensaje' => 'Datos guardados correctamente', 'code' => 1]);
        }else{
            return response()->json(['mensaje' => 'Ocurrió un error, intente nuevamente', 'code' => 0]);
        }
    }

    public function guardarCulturaTradiciones(Request $request){
      
        $datos = [
            'identificacion_individuo' => $request->input('identificacion_individuo'),
            'practica_actividades' => $request->input('practica_actividades'),
            'habla_lengua' => $request->input('habla_lengua'),
            'cual_lengua' => $request->input('cual_lengua'),
            'practicas_religiosas' => $request->input('practicas_religiosas'),
        ];

        $insertado = DB::connection('mysql')->table('cultura_tradiciones')->updateOrInsert(
            ['identificacion_individuo' => $datos['identificacion_individuo']],
            $datos 
        );

        if($insertado){
            return response()->json(['mensaje' => 'Datos guardados correctamente', 'code' => 1]);
        }else{
            return response()->json(['mensaje' => 'Ocurrió un error, intente nuevamente', 'code' => 0]);
        }
    }
}
