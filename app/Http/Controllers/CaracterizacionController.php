<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use File;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Carbon\Carbon;


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

        $pagina = $request->input('pagina');
        $limit = 3;

        if ($pagina == null || $pagina == "") {
            $pagina = 1;
        }

        if ($pagina == 1) {
            $offset = 0;
            $pagina--;
        } else {
            $pagina--;
            $offset = $pagina * $limit;
        }

        if($corregimiento == "todo"){
            $jefes = DB::connection('mysql')->table('informacion_personal')
            ->join("educacion", "informacion_personal.identificacion", "educacion.identificacion_individuo")
            ->join("situacion_laboral", "informacion_personal.identificacion", "situacion_laboral.identificacion_individuo")
            ->join("vivienda_hogar", "informacion_personal.identificacion", "vivienda_hogar.identificacion_jefe")
            ->where("rol", "Jefe de hogar")
            ->offset($offset)
            ->limit($limit) 
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
            ->offset($offset)
            ->limit($limit) 
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
            }

            $jefe->escolaridad = DB::connection('mysql')->table('escolaridad')
            ->where("id", $jefe->nivel_educativo)
            ->first()->descripcion;

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

    public function paginacionConsolidado(Request $request){
       
        $corregimiento = $request->input('corregimiento');
        $pagina = $request->input('pagina');

        if($corregimiento == "todo"){
            $jefes = DB::connection('mysql')->table('informacion_personal')
            ->join("educacion", "informacion_personal.identificacion", "educacion.identificacion_individuo")
            ->join("situacion_laboral", "informacion_personal.identificacion", "situacion_laboral.identificacion_individuo")
            ->join("vivienda_hogar", "informacion_personal.identificacion", "vivienda_hogar.identificacion_jefe")
            ->where("rol", "Jefe de hogar")
            ->count();
        }else{
            $jefes = DB::connection('mysql')->table('informacion_personal')
            ->join("educacion", "informacion_personal.identificacion", "educacion.identificacion_individuo")
            ->join("situacion_laboral", "informacion_personal.identificacion", "situacion_laboral.identificacion_individuo")
            ->join("vivienda_hogar", "informacion_personal.identificacion", "vivienda_hogar.identificacion_jefe")
            ->where("rol", "Jefe de hogar")
            ->where("informacion_personal.corregimiento", $corregimiento)
            ->count();
        }


        $paginas = ceil($jefes / 3);
        
        $respuesta = [
            'paginas_consulta' => $paginas,
            'pagina_actual' => (int)$pagina,
            'numero_registros' => $jefes,
        ];
        
        return response()->json($respuesta, 200);
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

    public function exportarConsolidadoExcel(Request $request) {
        $idCorregimiento = $request->input('corregimiento');
        $tipo_reporte = $request->input('tipo_reporte');

        $datos = self::consultarIntegrantesJefes($idCorregimiento);

        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 10
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'], // Black color
                ],
            ],
        ];

        $styleArray2 = [
            'font' => [
                'bold' => true,
                'size' => 10,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'indent' => 1,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'], // Black color
                ],
            ],
            'padding' => [
                'left' => 20, // Set your desired left padding value
            ],
        ];
    
    
        $titulo = "reporte_caracterizacion";

        $nombre = $titulo.".xlsx";

        if($idCorregimiento == "todo"){
            $corregimiento = "Consolidado General";   
        }else{
            $corregimiento = DB::connection('mysql')->table('corregimientos')
            ->where("id", $idCorregimiento)
            ->first()->nombre;
        }
       
        $spreadsheet = new Spreadsheet();
            
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Consolidado General');

        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('T')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('U')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('V')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('W')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('X')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('Y')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('Z')->setAutoSize(true);
       

        $sheet->mergeCells('A1:C2');
        $sheet->getRowDimension(1)->setRowHeight(60); 
        $sheet->getRowDimension(2)->setRowHeight(30);
        $sheet->getRowDimension(3)->setRowHeight(30);
        $sheet->getRowDimension(4)->setRowHeight(30);
        $sheet->getRowDimension(5)->setRowHeight(30);
        $sheet->getRowDimension(6)->setRowHeight(20);

        $spreadsheet->getActiveSheet()->getStyle('A1:C2')->applyFromArray($styleArray);

        $sheet->setCellValue('D1', 'MACROPROCESO: AGENCIA NACIONAL DE TIERRAS '. PHP_EOL . 'PROCESO: DIRECCIÓN DE ASUNTOS ÉTNICOS');
        $sheet->mergeCells('D1:O1');
        $spreadsheet->getActiveSheet()->getStyle('D1:O1')->applyFromArray($styleArray);
        $style = $sheet->getStyle('D1:O1');
        $alignment = $style->getAlignment();
        $alignment->setWrapText(true);

        $sheet->setCellValue('D2', 'FORMATO: CENSO POBLACIÓN COMUNIDADES NEGRAS');
        $sheet->mergeCells('D2:O2');
        $spreadsheet->getActiveSheet()->getStyle('D2:O2')->applyFromArray($styleArray);
       
        $sheet->setCellValue('P1', 'CÓDIGO: '. PHP_EOL . 'FECHA:');
        $sheet->mergeCells('P1:S1');
        $spreadsheet->getActiveSheet()->getStyle('P1:S1')->applyFromArray($styleArray);
        $style = $sheet->getStyle('P1:S1');
        $alignment = $style->getAlignment();
        $alignment->setWrapText(true);

        $sheet->setCellValue('P2', 'PAGINA: 1/1');
        $sheet->mergeCells('P2:S2');
        $spreadsheet->getActiveSheet()->getStyle('P2:S2')->applyFromArray($styleArray);

        $sheet->setCellValue('A3', 'DATOS DE IDENTIFICACIÓN');
        $sheet->mergeCells('A3:S3');
        $spreadsheet->getActiveSheet()->getStyle('A3:S3')->applyFromArray($styleArray);

        $sheet->setCellValue('A4', '1. Departamento: CESAR');
        $sheet->mergeCells('A4:C4');
        $spreadsheet->getActiveSheet()->getStyle('A4:C4')->applyFromArray($styleArray2);

        $sheet->setCellValue('D4', '2. Municipio: EL PASO');
        $sheet->mergeCells('D4:F4');
        $spreadsheet->getActiveSheet()->getStyle('D4:F4')->applyFromArray($styleArray2);

        $sheet->setCellValue('G4', '3. Corregimiento o vereda:   '.$corregimiento);
        $sheet->mergeCells('G4:O4');
        $spreadsheet->getActiveSheet()->getStyle('G4:O4')->applyFromArray($styleArray2);

        $sheet->setCellValue('P4', '4. Fecha: 14 de Noviembre del 2023');
        $sheet->mergeCells('P4:S4');
        $spreadsheet->getActiveSheet()->getStyle('P4:S4')->applyFromArray($styleArray2);

        $sheet->setCellValue('A5', '5. Representante Legal: EUFROSINA VEGA MIELES');
        $sheet->mergeCells('A5:F5');
        $spreadsheet->getActiveSheet()->getStyle('A5:F5')->applyFromArray($styleArray2);

        $sheet->setCellValue('G5', '6. Consejo Comunitario: Consejo Comunitario  Julio Cesar Altamar Muñoz');
        $sheet->mergeCells('G5:S5');
        $spreadsheet->getActiveSheet()->getStyle('G5:S5')->applyFromArray($styleArray2);
        

        $sheet->setCellValue('A6', 'Listado de Personas');
        $sheet->mergeCells('A6:B6');
        $spreadsheet->getActiveSheet()->getStyle('A6:B6')->applyFromArray($styleArray);
        $sheet->getStyle('A6:B6')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $sheet->getStyle('A6:B6')->getFill()->getStartColor()->setARGB('8cee8c'); 
        $sheet->getStyle('A6')->getAlignment()->setWrapText(true);

        $sheet->setCellValue('C6', 'Datos');
        $sheet->mergeCells('C6:F6');
        $spreadsheet->getActiveSheet()->getStyle('C6:F6')->applyFromArray($styleArray);
        $sheet->getStyle('C6:F6')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $sheet->getStyle('C6:F6')->getFill()->getStartColor()->setARGB('43d7f0'); 

        $sheet->setCellValue('G6', '');
        $sheet->mergeCells('G6:L6');
        $spreadsheet->getActiveSheet()->getStyle('G6:L6')->applyFromArray($styleArray);
        $sheet->getStyle('G6:L6')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $sheet->getStyle('G6:L6')->getFill()->getStartColor()->setARGB('cdf043'); 

        $sheet->setCellValue('M6', '');
        $sheet->mergeCells('M6:N6');
        $spreadsheet->getActiveSheet()->getStyle('M6:N6')->applyFromArray($styleArray);
        $sheet->getStyle('M6:N6')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $sheet->getStyle('M6:N6')->getFill()->getStartColor()->setARGB('43d7f0'); 

        $sheet->setCellValue('O6', 'Tenencia de Tierras');
        $sheet->mergeCells('O6:S6');
        $spreadsheet->getActiveSheet()->getStyle('O6:S6')->applyFromArray($styleArray);
        $sheet->getStyle('O6:S6')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $sheet->getStyle('O6:S6')->getFill()->getStartColor()->setARGB('8cee8c'); 

        $sheet->setCellValue('A7', 'Nº Familia');
        $sheet->setCellValue('B7', 'Nº Orden');
        $spreadsheet->getActiveSheet()->getStyle('A7:B7')->applyFromArray($styleArray);
        $sheet->getStyle('A7:B7')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $sheet->getStyle('A7:B7')->getFill()->getStartColor()->setARGB('8cee8c'); 


        $sheet->setCellValue('C7', 'Nombre Completo');
        $sheet->setCellValue('E7', 'Tipo');
        $sheet->setCellValue('F7', 'Nº Documento');
        $sheet->mergeCells('C7:D7');
        $spreadsheet->getActiveSheet()->getStyle('C7:F7')->applyFromArray($styleArray);
        $sheet->getStyle('C6:F7')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $sheet->getStyle('C6:F7')->getFill()->getStartColor()->setARGB('43d7f0');

        $sheet->setCellValue('G7', 'Sexo');
        $sheet->setCellValue('H7', 'Edad');
        $sheet->setCellValue('I7', 'Estado Civil');
        $sheet->setCellValue('J7', 'Parentesco');
        $sheet->setCellValue('K7', 'Ocupación');
        $sheet->setCellValue('L7', 'Escolaridad');
        $spreadsheet->getActiveSheet()->getStyle('G7:L7')->applyFromArray($styleArray);
        $sheet->getStyle('G7:L7')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $sheet->getStyle('G7:L7')->getFill()->getStartColor()->setARGB('cdf043'); 


        $sheet->setCellValue('M7', 'Tipo '. PHP_EOL . ' Vivienda');
        $sheet->setCellValue('N7', 'Tenencia '. PHP_EOL . ' Vivienda');
        $spreadsheet->getActiveSheet()->getStyle('M7:N7')->applyFromArray($styleArray);
        $sheet->getStyle('M6:N7')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $sheet->getStyle('M6:N7')->getFill()->getStartColor()->setARGB('43d7f0');

        $sheet->setCellValue('O7', 'Posesión '. PHP_EOL . ' Baldíos');
        $sheet->setCellValue('P7', 'Propiedad '. PHP_EOL . ' con Título');
        $sheet->setCellValue('Q7', 'Area M2');
        $sheet->setCellValue('R7', 'Area Ha');
        $sheet->setCellValue('S7', 'Area Utilizada');
        $spreadsheet->getActiveSheet()->getStyle('O7:S7')->applyFromArray($styleArray);
        $sheet->getStyle('O7:S7')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $sheet->getStyle('O7:S7')->getFill()->getStartColor()->setARGB('8cee8c'); 


        $sheet->getStyle('O7')->getAlignment()->setWrapText(true);
        $sheet->getStyle('O7')->getAlignment()->setTextRotation(90);
        $sheet->getStyle('M7')->getAlignment()->setWrapText(true);
        $sheet->getStyle('M7')->getAlignment()->setTextRotation(90);
        $sheet->getStyle('N7')->getAlignment()->setWrapText(true);
        $sheet->getStyle('N7')->getAlignment()->setTextRotation(90);
        $sheet->getStyle('P7')->getAlignment()->setWrapText(true);
        $sheet->getStyle('P7')->getAlignment()->setTextRotation(90);
        

        $sheet->getColumnDimension('A')->setWidth(200);
        $sheet->getColumnDimension('B')->setWidth(200);
        $sheet->getColumnDimension('K')->setWidth(20);
        $sheet->getColumnDimension('L')->setWidth(25);

        // Add an image to cell A1
        $imagePath = public_path('imagenes/censo.png'); // Use public_path to get the correct path
        $drawing = new Drawing();
        $drawing->setPath($imagePath);
        $drawing->setCoordinates('A1');
        $drawing->setOffsetX(10);
        $drawing->setOffsetY(33);
        $drawing->setWidth(100); 
        $drawing->setHeight(60);
        $drawing->setWorksheet($sheet);
        
        if($tipo_reporte == "general"){
            $row = 8;
            $index = 0;
            $orden = 1;

            foreach ($datos as $dato) {
                $sheet->getRowDimension($row)->setRowHeight(30);

                $sheet->setCellValue('A'.$row, $dato->numero_familia);
                $spreadsheet->getActiveSheet()->getStyle('A'.$row)->applyFromArray($styleArray);
            
                if($dato->rol == "Jefe de hogar"){
                    $orden = 1;
                }else{
                    $orden++;
                }

                $sheet->setCellValue('B'.$row, $orden);
                $spreadsheet->getActiveSheet()->getStyle('B'.$row)->applyFromArray($styleArray);

                $sheet->setCellValue('C'.$row, $dato->nombre_completo);
                $sheet->mergeCells('C'.$row.':D'.$row);
                $spreadsheet->getActiveSheet()->getStyle('C'.$row.':D'.$row)->applyFromArray($styleArray);
                $sheet->getStyle('C'.$row)->getAlignment()->setWrapText(true);

                $sheet->setCellValue('E'.$row, $dato->tipo_identificacion);
                $spreadsheet->getActiveSheet()->getStyle('E'.$row)->applyFromArray($styleArray);

                $sheet->setCellValue('F'.$row, $dato->identificacion);
                $spreadsheet->getActiveSheet()->getStyle('F'.$row)->applyFromArray($styleArray);

                $sheet->setCellValue('G'.$row, $dato->sexo);
                $spreadsheet->getActiveSheet()->getStyle('G'.$row)->applyFromArray($styleArray);

                $sheet->setCellValue('H'.$row, self::calcularEdad($dato->fecha_nacimiento)." Años");
                $spreadsheet->getActiveSheet()->getStyle('H'.$row)->applyFromArray($styleArray);

                $sheet->setCellValue('I'.$row, $dato->estado_civil);
                $spreadsheet->getActiveSheet()->getStyle('I'.$row)->applyFromArray($styleArray);

                $sheet->setCellValue('J'.$row, $dato->rol);
                $spreadsheet->getActiveSheet()->getStyle('J'.$row)->applyFromArray($styleArray);

                $sheet->setCellValue('K'.$row, $dato->ocupacion);
                $spreadsheet->getActiveSheet()->getStyle('K'.$row)->applyFromArray($styleArray);
                $sheet->getStyle('K'.$row)->getAlignment()->setWrapText(true);

                $sheet->setCellValue('L'.$row, $dato->escolaridad);
                $spreadsheet->getActiveSheet()->getStyle('L'.$row)->applyFromArray($styleArray);
                $sheet->getStyle('L'.$row)->getAlignment()->setWrapText(true);

                if($dato->rol == "Jefe de hogar"){
                    $sheet->setCellValue('M'.$row, $dato->tipo_vivienda);
                    $spreadsheet->getActiveSheet()->getStyle('M'.$row)->applyFromArray($styleArray);
            
                    $sheet->setCellValue('N'.$row, $dato->tenencia);
                    $spreadsheet->getActiveSheet()->getStyle('N'.$row)->applyFromArray($styleArray);

                    $sheet->setCellValue('O'.$row, $dato->posecion_baldia == "" ? "N.A" : $dato->posecion_baldia );
                    $spreadsheet->getActiveSheet()->getStyle('O'.$row)->applyFromArray($styleArray);
                    
                    $sheet->setCellValue('P'.$row, $dato->propiedad_titulo == "" ? "N.A" : $dato->propiedad_titulo );
                    $spreadsheet->getActiveSheet()->getStyle('P'.$row)->applyFromArray($styleArray);

                    $sheet->setCellValue('Q'.$row, $dato->area_total == "" ? "N.A" : $dato->area_total);
                    $spreadsheet->getActiveSheet()->getStyle('Q'.$row)->applyFromArray($styleArray);

                    $sheet->setCellValue('R'.$row, $dato->area_total == "" ? "N.A" : ((double)$dato->area_total / 10000));
                    $spreadsheet->getActiveSheet()->getStyle('R'.$row)->applyFromArray($styleArray);

                    if($dato->tipo_vivienda == "Finca" || $dato->tipo_vivienda == "Parcela"){
                        $sheet->setCellValue('S'.$row, $dato->area_destinada_ocupada);
                        $spreadsheet->getActiveSheet()->getStyle('S'.$row)->applyFromArray($styleArray);
                    }else{
                        $sheet->setCellValue('S'.$row, "N.A");
                        $spreadsheet->getActiveSheet()->getStyle('S'.$row)->applyFromArray($styleArray);
                    }
                    
                }

                $row++; 
            }

            $row = 8;
            foreach ($datos as $dato) {
                if($dato->rol == "Jefe de hogar"){
                    $sheet->mergeCells('A'.$row.':A'.($row + ($dato->rowspan - 1)));
                    $sheet->mergeCells('M'.$row.':M'.($row + ($dato->rowspan - 1)));
                    $spreadsheet->getActiveSheet()->getStyle('M'.$row.':M'.($row + ($dato->rowspan - 1)))->applyFromArray($styleArray);
                    $sheet->mergeCells('N'.$row.':N'.($row + ($dato->rowspan - 1)));
                    $spreadsheet->getActiveSheet()->getStyle('N'.$row.':N'.($row + ($dato->rowspan - 1)))->applyFromArray($styleArray);
                    $sheet->mergeCells('O'.$row.':O'.($row + ($dato->rowspan - 1)));
                    $spreadsheet->getActiveSheet()->getStyle('O'.$row.':O'.($row + ($dato->rowspan - 1)))->applyFromArray($styleArray);
                    $sheet->mergeCells('P'.$row.':P'.($row + ($dato->rowspan - 1)));
                    $spreadsheet->getActiveSheet()->getStyle('P'.$row.':P'.($row + ($dato->rowspan - 1)))->applyFromArray($styleArray);
                    $sheet->mergeCells('Q'.$row.':Q'.($row + ($dato->rowspan - 1)));
                    $spreadsheet->getActiveSheet()->getStyle('Q'.$row.':R'.($row + ($dato->rowspan - 1)))->applyFromArray($styleArray);
                    $sheet->mergeCells('R'.$row.':R'.($row + ($dato->rowspan - 1)));
                    $spreadsheet->getActiveSheet()->getStyle('R'.$row.':Q'.($row + ($dato->rowspan - 1)))->applyFromArray($styleArray);
                    $sheet->mergeCells('S'.$row.':S'.($row + ($dato->rowspan - 1)));
                    $spreadsheet->getActiveSheet()->getStyle('S'.$row.':S'.($row + ($dato->rowspan - 1)))->applyFromArray($styleArray);            
                }
                $row++;
            }
        }else{
            $row = 8;
            $index = 0;
            $orden = 1;

            foreach ($datos as $dato) {
                if($dato->rol == "Jefe de hogar"){
                    $sheet->getRowDimension($row)->setRowHeight(30);
                    $sheet->setCellValue('A'.$row, $dato->numero_familia);
                    $spreadsheet->getActiveSheet()->getStyle('A'.$row)->applyFromArray($styleArray);
                
                    if($dato->rol == "Jefe de hogar"){
                        $orden = 1;
                    }else{
                        $orden++;
                    }

                    $sheet->setCellValue('B'.$row, $orden);
                    $spreadsheet->getActiveSheet()->getStyle('B'.$row)->applyFromArray($styleArray);

                    $sheet->setCellValue('C'.$row, $dato->nombre_completo);
                    $sheet->mergeCells('C'.$row.':D'.$row);
                    $spreadsheet->getActiveSheet()->getStyle('C'.$row.':D'.$row)->applyFromArray($styleArray);
                    $sheet->getStyle('C'.$row)->getAlignment()->setWrapText(true);

                    $sheet->setCellValue('E'.$row, $dato->tipo_identificacion);
                    $spreadsheet->getActiveSheet()->getStyle('E'.$row)->applyFromArray($styleArray);

                    $sheet->setCellValue('F'.$row, $dato->identificacion);
                    $spreadsheet->getActiveSheet()->getStyle('F'.$row)->applyFromArray($styleArray);

                    $sheet->setCellValue('G'.$row, $dato->sexo);
                    $spreadsheet->getActiveSheet()->getStyle('G'.$row)->applyFromArray($styleArray);

                    $sheet->setCellValue('H'.$row, self::calcularEdad($dato->fecha_nacimiento)." Años");
                    $spreadsheet->getActiveSheet()->getStyle('H'.$row)->applyFromArray($styleArray);

                    $sheet->setCellValue('I'.$row, $dato->estado_civil);
                    $spreadsheet->getActiveSheet()->getStyle('I'.$row)->applyFromArray($styleArray);

                    $sheet->setCellValue('J'.$row, $dato->rol);
                    $spreadsheet->getActiveSheet()->getStyle('J'.$row)->applyFromArray($styleArray);

                    $sheet->setCellValue('K'.$row, $dato->ocupacion);
                    $spreadsheet->getActiveSheet()->getStyle('K'.$row)->applyFromArray($styleArray);
                    $sheet->getStyle('K'.$row)->getAlignment()->setWrapText(true);

                    $sheet->setCellValue('L'.$row, $dato->escolaridad);
                    $spreadsheet->getActiveSheet()->getStyle('L'.$row)->applyFromArray($styleArray);
                    $sheet->getStyle('L'.$row)->getAlignment()->setWrapText(true);

                    $sheet->setCellValue('M'.$row, $dato->tipo_vivienda);
                    $spreadsheet->getActiveSheet()->getStyle('M'.$row)->applyFromArray($styleArray);
            
                    $sheet->setCellValue('N'.$row, $dato->tenencia);
                    $spreadsheet->getActiveSheet()->getStyle('N'.$row)->applyFromArray($styleArray);

                    $sheet->setCellValue('O'.$row, $dato->posecion_baldia == "" ? "N.A" : $dato->posecion_baldia );
                    $spreadsheet->getActiveSheet()->getStyle('O'.$row)->applyFromArray($styleArray);
                    
                    $sheet->setCellValue('P'.$row, $dato->propiedad_titulo == "" ? "N.A" : $dato->propiedad_titulo );
                    $spreadsheet->getActiveSheet()->getStyle('P'.$row)->applyFromArray($styleArray);

                    $sheet->setCellValue('Q'.$row, $dato->area_total == "" ? "N.A" : $dato->area_total);
                    $spreadsheet->getActiveSheet()->getStyle('Q'.$row)->applyFromArray($styleArray);

                    $sheet->setCellValue('R'.$row, $dato->area_total == "" ? "N.A" : ((double)$dato->area_total / 10000));
                    $spreadsheet->getActiveSheet()->getStyle('R'.$row)->applyFromArray($styleArray);

                    if($dato->tipo_vivienda == "Finca" || $dato->tipo_vivienda == "Parcela"){
                        $sheet->setCellValue('S'.$row, $dato->area_destinada_ocupada);
                        $spreadsheet->getActiveSheet()->getStyle('S'.$row)->applyFromArray($styleArray);
                    }else{
                        $sheet->setCellValue('S'.$row, "N.A");
                        $spreadsheet->getActiveSheet()->getStyle('S'.$row)->applyFromArray($styleArray);
                    }
                    
                    $row++; 
                }
            }
        }
        
        $writer = new Xlsx($spreadsheet);
        $filePath = 'reportes/' . $nombre;
        $writer->save($filePath);

        $respuesta = [
            'nombre' => '/reportes/' . $nombre,
        ];

        return response()->json($respuesta, 200);
    }

    public function calcularEdad($fechaNacimiento){
        $fechaNacimiento = Carbon::parse($fechaNacimiento);
        $fechaActual = Carbon::now();
        $edad = $fechaNacimiento->diffInYears($fechaActual);
        return $edad;
    }

    public function consultarIntegrantesJefes($idCorregimiento){
        if($idCorregimiento == "todo"){
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
            ->where("informacion_personal.corregimiento", $idCorregimiento)
            ->get();
    
            $integrantes = DB::connection('mysql')->table('informacion_personal')
            ->join("educacion", "informacion_personal.identificacion", "educacion.identificacion_individuo")
            ->join("situacion_laboral", "informacion_personal.identificacion", "situacion_laboral.identificacion_individuo")
            ->where("rol", "<>", "Jefe de hogar")
            ->where("informacion_personal.corregimiento", $idCorregimiento)
            ->get();
        }

        $individuos = [];

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
            }

            $jefe->escolaridad = DB::connection('mysql')->table('escolaridad')
            ->where("id", $jefe->nivel_educativo)
            ->first()->descripcion;


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

        return $individuos;
    }
}