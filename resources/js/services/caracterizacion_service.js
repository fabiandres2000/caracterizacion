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