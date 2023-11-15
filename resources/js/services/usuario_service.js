import {http} from "./http_services";

export function misDatos() {
    return http().get('/api/mis-datos');
}

export function verificarLogin() {
    return http().get('/api/verificarLogin');
}

