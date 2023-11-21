import {http} from "./http_services";

export function guardarInformacionTemporal($data) {
    return http().post(
        '/api/guardar-informacion-personal', 
        $data, 
        {
            headers: {
                'Content-Type': 'application/json'
            }
        }
    );
}

export function departamentos() {
    return http().get('/api/departamentos');
}

export function municipios(codigo) {
    return http().get('/api/municipios?codigo='+codigo);
}

export function guardarOrigenIdentidad($data) {
    return http().post(
        '/api/guardar-origen-entidad', 
        $data, 
        {
            headers: {
                'Content-Type': 'application/json'
            }
        }
    );
}

export function escolaridad() {
    return http().get('/api/escolaridad');
}

export function guardarEducacion($data) {
    return http().post(
        '/api/guardar-educacion', 
        $data, 
        {
            headers: {
                'Content-Type': 'application/json'
            }
        }
    );
}

export function ocupaciones() {
    return http().get('/api/ocupaciones');
}

export function guardarSituacionLaboral($data) {
    return http().post(
        '/api/guardar-situacion-laboral', 
        $data, 
        {
            headers: {
                'Content-Type': 'application/json'
            }
        }
    );
}

export function guardarSalud($data) {
    return http().post(
        '/api/guardar-salud', 
        $data, 
        {
            headers: {
                'Content-Type': 'application/json'
            }
        }
    );
}

export function guardarCulturaTradiciones($data) {
    return http().post(
        '/api/guardar-cultura-tradiciones', 
        $data, 
        {
            headers: {
                'Content-Type': 'application/json'
            }
        }
    );
}

export function guardarViviendaHogar($data) {
    return http().post(
        '/api/guardar-vivienda-hogar', 
        $data, 
        {
            headers: {
                'Content-Type': 'application/json'
            }
        }
    );
}

export function jefesHogar() {
    return http().get('/api/jefes-hogar');
}

export function consultarCaracterizados() {
    return http().get('/api/caracterizados');
}

export function consultarDatosIndividuo(id) {
    return http().get('/api/datos-individuo?identificacion='+id);
}


export function consolidado(id) {
    return http().get('/api/consolidado?corregimiento='+id);
}

export function municipiosConsolidado() {
    return http().get('/api/municipios-consolidado');
}