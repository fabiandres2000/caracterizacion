import {http} from "./http_services";

export function listarCorregimientos() {
    return http().get('/api/lista-corregimientos');
}

export function guardarCorregimiento($data) {
    return http().post(
        '/api/guardar-corregimiento', 
        $data, 
        {
            headers: {
                'Content-Type': 'application/json'
            }
        }
    );
}

export function listarCorregimientosPorMuni(id) {
    return http().get('/api/lista-corregimientos-id?municipio='+id);
}