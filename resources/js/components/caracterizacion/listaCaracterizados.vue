<template lang="">
    <div>
        <div class="col-lg-12">
            <div class="card" style="min-height: 400pt">
                <div class="card-header">
                    <h4 class="card-title" style="font-weight: bold">Lista de personas caracterizadas</h4>
                    <hr>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <router-link to="/caracterizacion"><button class="btn btn-info"><i class="fas fa-user-check"></i> Nueva Caracterización </button></router-link>
                        <div style="margin-top: 40px">
                            <table id="tablaCaracterizados" style="width: 100%" v-if="loading == false">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Identificación</th>
                                        <th>Nombre</th>
                                        <th>Rol</th>
                                        <th>Dirección</th>
                                        <th>F. Caracterización</th>
                                        <th style="text-align: center">opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in lista_caracterizados" :key="index">
                                        <td>{{ item.numero_caracterizacion }}</td>
                                        <td>{{ item.tipo_identificacion+" : "+item.identificacion }}</td>
                                        <td>{{ item.nombre_completo }}</td>
                                        <td>{{ item.rol }}</td>
                                        <td>{{ item.direccion }}</td>
                                        <td>{{ item.fecha_caracterizacion }}</td>
                                        <td style="display: flex; justify-content: space-around;">
                                            <router-link :to="{ name: 'editarCaracterizacion', params: { identificacion_editar: item.identificacion } }"><button class="btn btn-success btn_opciones"><i class="fas fa-user-edit"></i></button></router-link>
                                            <button class="btn btn-danger btn_opciones"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

import * as caracterizacionService from "../../services/caracterizacion_service";

export default {
    mounted() {
        this.consultarCaracterizados();
    },
    data() {
        return {
            lista_caracterizados: [],
            loading: true           
        }
    },
    methods: {
        async consultarCaracterizados(){
            this.loading = true;
            try {
                await caracterizacionService.consultarCaracterizados().then(respuesta => {
                    this.lista_caracterizados = respuesta.data;
                    setTimeout(()=>{
                        this.dataTables();
                    }, 10);
                });
            } catch (error) {
                console.log(error);
            }
        },
        dataTables() {
            this.loading = false;
            setTimeout(() => {
                $("#tablaCaracterizados").DataTable({
                    ordering: true,
                    "columnDefs": [
                        { "orderable": false, "targets": 1 },
                        { "orderable": false, "targets": 2 },
                        { "orderable": false, "targets": 3 },
                        { "orderable": false, "targets": 4 },
                        { "orderable": false, "targets": 5 },
                        { "orderable": false, "targets": 6 }
                    ],
                    language: {
                        "decimal": "",
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
                        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                        "infoFiltered": "(Filtrado de _MAX_ total Registros)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Registros",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                    },
                });
            }, 10);
        },
    },
}
</script>
<style scoped>
    table {
        border-collapse: collapse;
    }
    th, td {
        font-size: 16px !important;
        padding: 10px 10px !important;
    }

    .btn_opciones {
        display: inline-block !important;
        text-align: center !important;
        vertical-align: middle !important;
        cursor: pointer !important;
        -webkit-user-select: none !important;
        -moz-user-select: none !important;
        user-select: none !important;
        border: 1px solid transparent !important;
        padding: 9px !important;
        font-size: 11px !important;
        line-height: 1.25 !important;
        border-radius: 0.25rem !important;
        transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    tr {
        border-bottom: 1px solid lightgrey !important;
    }
</style>