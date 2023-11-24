import {http} from "./http_services";

export function datosDashboard() {
    return http().get('/api/datos-dashboard');
}