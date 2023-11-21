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

    public function consultarJefesHogar()
    {
        $departamentos = DB::connection('mysql')->table('informacion_personal')
        ->select("tipo_identificacion", "identificacion", "nombre_completo")
        ->where("rol", "Jefe de hogar")
        ->get();

        return response()->json($departamentos);
    }

    public function guardarInformacionPersonal(Request $request){
        $timezone = new \DateTimeZone('America/Bogota');
        $fechaActual = new \DateTime('now', $timezone);

        $hayUsuario =  DB::connection('mysql')->table('informacion_personal')
        ->where('identificacion', $request->input('numero_identificacion'))
        ->first();

        if($hayUsuario){
            $numero_caracterizacion = $hayUsuario->numero_caracterizacion;
        }else{
           $numero_caracterizacion = self::generarNumeroCaracterizacion(); 
        }
        
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
            'departamento' => $request->input('departamento'),
            'municipio' => $request->input('municipio'),
            'corregimiento' => $request->input('corregimiento'),
        ];

        $insertado = DB::connection('mysql')->table('informacion_personal')->updateOrInsert(
            ['identificacion' => $datos['identificacion']],
            $datos 
        );

        if($insertado){
            if($hayUsuario == null){
                self::guardarUsuarioEncuesta($numero_caracterizacion);
            }
            return response()->json(['mensaje' => 'Datos guardados correctamente', 'code' => 1]);
        }else{
            return response()->json(['mensaje' => 'Ocurrió un error, intente nuevamente', 'code' => 0]);
        }
       
    }

    public function guardarUsuarioEncuesta($numero_caracterizacion){
        $idUsuario = Session::get('id');

        $datos = [
            'usuario_encuesta' => $idUsuario,
            'numero_caracterizacion' => $numero_caracterizacion,
        ];

        DB::connection('mysql')->table('user_encuesta')->Insert(
            $datos 
        );
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

    public function guardarViviendaHogar(Request $request){
      
        $datos = [
            'identificacion_jefe' => $request->input('identificacion_jefe'),
            'tipo_vivienda' => $request->input('tipo_vivienda'),
            'cual_tipo_vivienda' => $request->input('cual_tipo_vivienda'),
            'tenencia' => $request->input('tenencia'),
            'numero_personas_hogar' => $request->input('numero_personas_hogar'),
            'electricidad' => $request->input('electricidad'),
            'agua_potable' => $request->input('agua_potable'),
            'alcantarillado' => $request->input('alcantarillado'),
            'gas_natural' => $request->input('gas_natural'),
            'aseo' => $request->input('aseo'),
            'otro' => $request->input('otro'),
            'numero_personas_trabajan' => $request->input('numero_personas_trabajan'),
            'ingresos_mensuales_hogar' => $request->input('ingresos_mensuales_hogar'),
            'posecion_baldia' => $request->input('posecion_baldia'),
            'propiedad_titulo' => $request->input('propiedad_titulo'),
            'area_total' => $request->input('area_total'),
        ];

        $insertado = DB::connection('mysql')->table('vivienda_hogar')->updateOrInsert(
            ['identificacion_jefe' => $datos['identificacion_jefe']],
            $datos 
        );

        self::guardarActividadesViviendaHogar($request->input('actividades_economicas'), $request->input('identificacion_jefe'));

        if($insertado){
            return response()->json(['mensaje' => 'Datos guardados correctamente', 'code' => 1]);
        }else{
            return response()->json(['mensaje' => 'Ocurrió un error, intente nuevamente', 'code' => 0]);
        }
    }

    public function guardarActividadesViviendaHogar($listaActividades, $id_jefe){

        DB::connection('mysql')->table('actividades_vivienda_hogar')
        ->where("identificacion_jefe", $id_jefe)
        ->delete();

        foreach ($listaActividades as $key) {
            DB::connection('mysql')->table('actividades_vivienda_hogar')->Insert(
               [
                'identificacion_jefe' => $id_jefe,
                'linea' => $key["linea"],
                'actividad' => $key["actividad"],
                'area_destinada' => $key["area_destinada"],
               ]
            );
        }
    }


    public function listarCaracterizados(){
        $idUsuario = Session::get('id');
        $rolUsuario = Session::get('rol');

        if($rolUsuario == "administrador"){
            $caracterizados = DB::connection('mysql')->table('informacion_personal')
            ->where("estado", 1)
            ->get();
        }else{
            $caracterizados = DB::connection('mysql')->table('informacion_personal')
            ->leftJoin("user_encuesta", "user_encuesta.numero_caracterizacion", "informacion_personal.numero_caracterizacion")
            ->where("user_encuesta.usuario_encuesta", $idUsuario)
            ->where("informacion_personal.estado", 1)
            ->get();
        }
       
        return response()->json($caracterizados);
    }

    public function consultarDatosIndividuo(Request $request)
    {
        $identificacion = $request->input('identificacion');

        $datos = [];

        $informacion_personal = DB::connection('mysql')->table('informacion_personal')
        ->where("identificacion", $identificacion)
        ->first();

        $origen_etnia = DB::connection('mysql')->table('origen_etnia')
        ->where("identificacion_individuo", $identificacion)
        ->first();

        $educacion = DB::connection('mysql')->table('educacion')
        ->where("identificacion_individuo", $identificacion)
        ->first();

        $situacion_laboral = DB::connection('mysql')->table('situacion_laboral')
        ->where("identificacion_individuo", $identificacion)
        ->first();

        $salud = DB::connection('mysql')->table('salud')
        ->where("identificacion_individuo", $identificacion)
        ->first();

        $cultura_tradiciones = DB::connection('mysql')->table('cultura_tradiciones')
        ->where("identificacion_individuo", $identificacion)
        ->first();

        $vivienda_hogar = DB::connection('mysql')->table('vivienda_hogar')
        ->where("identificacion_jefe", $identificacion)
        ->first();

        if($vivienda_hogar != null){
            $vivienda_hogar->actividades_economicas = DB::connection('mysql')->table('actividades_vivienda_hogar')
            ->where("identificacion_jefe", $identificacion)
            ->get();
        }else{
            $vivienda_hogar = [];
            $vivienda_hogar['actividades_economicas'] = [];
        }
       

        $datos['informacion_personal'] = $informacion_personal;
        $datos['origen_identidad'] = $origen_etnia;
        $datos['educacion'] = $educacion;
        $datos['situacion_laboral'] = $situacion_laboral;
        $datos['salud'] = $salud;
        $datos['cultura_tradiciones'] = $cultura_tradiciones;
        $datos['vivienda_hogar'] = $vivienda_hogar;
        $datos['vivienda_hogar'] = $vivienda_hogar;

        return response()->json($datos);
    }


    public function consolidadoCensados(Request $request){

        $individuos = [];
        $corregimiento = $request->input('corregimiento');
        if($corregimiento == "todo"){
            $jefes = DB::connection('mysql')->table('informacion_personal')
            ->join("educacion", "informacion_personal.identificacion", "educacion.identificacion_individuo")
            ->join("situacion_laboral", "informacion_personal.identificacion", "situacion_laboral.identificacion_individuo")
            ->join("vivienda_hogar", "informacion_personal.identificacion", "vivienda_hogar.identificacion_jefe")
            ->where("rol", "Jefe de hogar")
            ->get();
    
            $integrantes = DB::connection('mysql')->table('informacion_personal')
            ->join("educacion", "informacion_personal.identificacion", "educacion.identificacion_individuo")
            ->join("situacion_laboral", "informacion_personal.identificacion", "situacion_laboral.identificacion_individuo")
            ->where("rol", "<>", "Jefe de hogar")
            ->get();
        }else{
            $jefes = DB::connection('mysql')->table('informacion_personal')
            ->join("educacion", "informacion_personal.identificacion", "educacion.identificacion_individuo")
            ->join("situacion_laboral", "informacion_personal.identificacion", "situacion_laboral.identificacion_individuo")
            ->join("vivienda_hogar", "informacion_personal.identificacion", "vivienda_hogar.identificacion_jefe")
            ->where("rol", "Jefe de hogar")
            ->where("informacion_personal.corregimiento", $corregimiento)
            ->get();
    
            $integrantes = DB::connection('mysql')->table('informacion_personal')
            ->join("educacion", "informacion_personal.identificacion", "educacion.identificacion_individuo")
            ->join("situacion_laboral", "informacion_personal.identificacion", "situacion_laboral.identificacion_individuo")
            ->where("rol", "<>", "Jefe de hogar")
            ->where("informacion_personal.corregimiento", $corregimiento)
            ->get();
        }

        

        $numero_familia = 1;
        foreach ($jefes as $jefe) {
            
            $rowspan = 1;
            $numero_orden = 1;

            foreach ($integrantes as $key => $integrante) {
                if ($integrante->id_jefe == $jefe->identificacion) {
                    $rowspan++;
                }
            }

            $jefe->numero_familia = $numero_familia;
            $jefe->rowspan = $rowspan;
            $jefe->numero_orden = $numero_orden;
            $individuos[] = $jefe;

            $numero_orden++;

            if($jefe->tipo_vivienda == "Finca" || $jefe->tipo_vivienda == "Parcela"){
                $jefe->area_destinada_ocupada =  DB::connection('mysql')->table('actividades_vivienda_hogar')
                ->where("identificacion_jefe", $jefe->identificacion)
                ->sum("area_destinada");

                $jefe->escolaridad = DB::connection('mysql')->table('escolaridad')
                ->where("id", $jefe->nivel_educativo)
                ->first()->descripcion;
            }


            foreach ($integrantes as $key => $integrante) {
                if ($integrante->id_jefe == $jefe->identificacion) {
                    $integrante->escolaridad = DB::connection('mysql')->table('escolaridad')
                    ->where("id", $integrante->nivel_educativo)
                    ->first()->descripcion;
                    $integrante->numero_familia = $numero_familia;
                    $integrante->numero_orden = $numero_orden;
                    $numero_orden++;
                    $individuos[] = $integrante;
                    unset($integrantes[$key]);
                    $rowspan++;
                }
            }

            $numero_familia += 1;
        }

        return response()->json($individuos);
    }


    public function municipiosConsolidado(){
        $municipios = [];

        $municipios = DB::connection('mysql')->table('informacion_personal')
        ->join("dptos", "informacion_personal.departamento", "dptos.codigo")
        ->join("muni", "informacion_personal.municipio", "muni.id")
        ->join("corregimientos", "informacion_personal.corregimiento", "corregimientos.id")
        ->select(DB::raw("count(*) as cantidad"), "corregimientos.nombre", "dptos.descripcion as departamento", "muni.descripcion as municipio", "corregimientos.id as id_corregimiento")
        ->groupBy("corregimientos.nombre", "departamento", "municipio", "id_corregimiento")
        ->get();

        return response()->json($municipios);
    }
}