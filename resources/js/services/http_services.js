import axios from 'axios';

export function http() {
    return axios.create({
        baseURL: 'http://127.0.0.1:8000/'
        //baseURL: 'https://192.168.1.78/'
        //baseURL: 'https://axcvixof.lucusvirtual.es/'
    });
}