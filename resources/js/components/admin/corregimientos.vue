<template lang="">
    <div>
        <div class="col-lg-12">
            <div class="card" style="min-height: 400pt">
                <div class="card-header">
                    <h4 class="card-title" style="font-weight: bold">Gestión de corregimientos</h4>
                    <hr>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <button data-toggle="modal" data-target="#modalRegistroMunicipio" class="btn btn-warning"><i class="fas fa-plus"></i> Nuevo Corregimiento </button>
                        <br>
                        <br>
                        <table>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Departamento</th>
                                    <th>Municipio</th>
                                    <th>Nombre</th>
                                    <th>Estado</th>
                                    <th style="text-align: center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="corregimientos.length == 0">
                                    <td style="text-align: center" colspan="6">No hay datos</td>
                                </tr>
                                <tr v-for="(item, index) in corregimientos" :key="index" v-if="corregimientos.length > 0">
                                    <td>{{ item.id }}</td>
                                    <td>{{ item.departamento }}</td>
                                    <td>{{ item.municipio }}</td>
                                    <td>{{ item.nombre }}</td>
                                    <td>{{ item.estado }}</td>
                                    <td style="display: flex; justify-content: space-around;">
                                        <button class="btn btn-success btn_opciones"><i class="fas fa-pencil-alt"></i></button>
                                        <button class="btn btn-danger btn_opciones"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalRegistroMunicipio" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Gestión Municipio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for=""><strong>Departamento</strong></label>
                            <fieldset class="form-group position-relative has-icon-left">
                                <select @change="consultarMunicipios()" v-model="corregimiento.departamento" class="form-control form-control-lg mb-1" name="" id="">
                                    <option value="">Seleccione una opción</option>
                                    <option v-for="(item, index) in departamentos" :key="index" :value="item.codigo">{{ item.descripcion }}</option>
                                </select>                                            
                                <div class="form-control-position">
                                    <i style="font-size: 19px" class="fas fa-map-marked-alt"></i>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <label for=""><strong>Municipio</strong></label>
                            <fieldset class="form-group position-relative has-icon-left">
                                <select v-model="corregimiento.municipio" class="form-control form-control-lg mb-1" name="" id="">
                                    <option value="">Seleccione una opción</option>
                                    <option v-for="(item, index) in municipios" :key="index" :value="item.id">{{ item.descripcion }}</option>
                                </select>                                            
                                <div class="form-control-position">
                                    <i style="font-size: 19px" class="fas fa-city"></i>
                                </div>
                            </fieldset>
                        </div>   
                        <div class="col-lg-12">
                            <fieldset class="form-group position-relative has-icon-left">
                                <input v-model="corregimiento.nombre" style="text-transform: uppercase" type="text"  placeholder="Nombre del municipio" class="form-control form-control-lg mb-1">                                          
                                <div class="form-control-position">
                                    <i style="font-size: 19px" class="fas fa-city"></i>
                                </div>
                            </fieldset>
                        </div> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button @click="guardarCorregimiento()" type="button" class="btn btn-success">Guardar Datos</button>
                </div>
                </div>
            </div>
            </div>
    </div>
</template>
<script>
import * as corregimientosService from "../../services/corregimientos";
import * as caracterizacionService from "../../services/caracterizacion_service";

export default {
    data() {
        return {
            corregimientos: [],
            departamentos: [],
            municipios: [],
            loading: false,
            corregimiento: {
                id: "",
                departamento: "",
                municipio: "",
                nombre: ""
            }
        }
    },
    mounted() {
        this.listarCorregimientos();
        this.consultarDepartamentos();
    },
    methods: {
        async listarCorregimientos(){
            await corregimientosService.listarCorregimientos().then(respuesta => {
                this.corregimientos = respuesta.data;
            });
        },
        async consultarDepartamentos(){
            await caracterizacionService.departamentos().then(respuesta => {
                this.departamentos = respuesta.data;
            });
        },
        async consultarMunicipios(){
            this.municipio = "";
            await caracterizacionService.municipios(this.corregimiento.departamento).then(respuesta => {
                this.municipios = respuesta.data;
            });
        },
        async guardarCorregimiento(){
            if(this.corregimiento.departamento == "" || this.corregimiento.municipio == "" || this.corregimiento.nombre == "" ){
                toastr.error("Todos los campos son obligatorios");
            }else{
                this.loading = true;
                await corregimientosService.guardarCorregimiento(this.corregimiento).then(respuesta => {
                    var response = respuesta.data;
                    this.loading = false;
                    if(response.code == 1){
                        toastr.success(response.mensaje);
                        $('#modalRegistroMunicipio').modal('hide');
                        this.listarCorregimientos();
                    }else{
                        Swal.fire({
                            icon: "error",
                            title: "Información Importante",
                            text: response.mensaje,
                        });
                    }
                });
            }
        }
    },
}
</script>
<style scoped>
    table {
        border-collapse: collapse;
        width: 100% !important;
    }

    thead {
        font-weight: bold;
    }

    tr {
        border-bottom: 1px solid grey;
    }

    td, th {
        padding: 10px;
        font-size: 18px !important;
    }

    select, option {
        font-size: 14px !important;
    }
</style>