<template lang="">
    <div>
        <div class="col-lg-12">
            <div class="card" style="min-height: 400pt">
                <div class="card-header">
                    <h4 class="card-title" style="font-weight: bold">Consolidado personas censadas</h4>
                    <hr>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row" v-if="corregimiento == ''">
                            <div class="col-lg-12"><h3>SELECCIONA UNA OPCIÓN PARA GENERAR EL CONSOLIDADO</h3><br></div>
                            <div  v-if="loading == true" class="col-lg-12">
                                <Skeleton></Skeleton>
                            </div>
                            <div v-if="loading == false" style="text-transform: uppercase;" v-for="(item, index) in municipios_consolidados" :key="index" class="col-lg-4">
                                <div @click="verConsolidado(item.id_corregimiento, item.nombre)" class="card card_hover">
                                    <div class="card-content">
                                        <div class="media align-items-stretch">
                                            <div class="p-2 text-center bg-primary bg-darken-2">
                                                <i class="icon-user font-large-2 white"></i>
                                                <hr>
                                                <h5 style="font-weight: bold !important" class="white mb-0">{{item.cantidad}}</h5>
                                            </div>
                                            <div style="display: flex; flex-direction: column; justify-content: center;" class="p-1 bg-primary white media-body">
                                                <h5><strong>DEP:</strong> {{item.departamento}}</h5>
                                                <h5><strong>MUN:</strong> {{item.municipio}}</h5>
                                                <h5 class="text-bold-400 mb-0"><strong>CORR:</strong> {{item.nombre}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>                               
                            </div>

                            <div v-if="loading == false" style="text-transform: uppercase;" class="col-lg-4">
                                <div @click="verConsolidado('todo', 'General')" class="card card_hover">
                                    <div class="card-content">
                                        <div class="media align-items-stretch" style="height: 134px">
                                            <div style="display: flex; align-items: center;" class="p-2 text-center bg-primary bg-darken-2">
                                                <i class="icon-users font-large-2 white"></i>
                                            </div>
                                            <div style="display: flex; flex-direction: column; justify-content: center;" class="p-1 bg-primary white media-body">
                                                <h5>Consolidado <br> General</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                        <div v-if="corregimiento != ''">
                            <Skeleton v-if="loading == true"></Skeleton>
                            <div v-if="loading == false">
                                <table style=" width: 100% !important;">
                                    <thead>
                                        <tr>
                                            <td rowspan="2" style="width: 220px; text-align: center; padding: 20px">
                                                <img style="width: 150px" src="/imagenes/censo.png" alt="">
                                            </td>
                                            <td colspan="2" style="text-align: center">MACROPROCESO: AGENCIA NACIONAL DE TIERRAS <br> PROCESO: DIRECCIÓN DE ASUNTOS ÉTNICOS</td>
                                            <td style="padding-left: 20px">
                                                CODIGO:
                                                <br> 
                                                FECHA: 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="text-align: center">
                                                FORMATO: CENSO POBLACIÓN COMUNIDADES NEGRAS
                                            </td>
                                            <td style="padding-left: 20px">
                                                PAGINA: 1/1
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center" colspan="4">
                                                DATOS DE IDENTIFICACION
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Departamento: CESAR</td>
                                            <td>Municipio: EL PASO</td>
                                            <td>Corregimiento: {{ corregimiento }}</td>
                                            <td>Fecha: {{currentDate()}}</td>
                                        </tr>
                                    </thead>
                                </table>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center" colspan="2">Listado de personas</td>
                                            <td style="text-align: center" colspan="3">Datos</td>
                                            <td style="text-align: center" colspan="6"></td>
                                            <td style="text-align: center" colspan="3"></td>
                                            <td style="text-align: center" colspan="3">Tenencia de Tierras</td>
                                        </tr>
                                        <tr>
                                            <td class="vertical-text" style="text-align: center">Nº Familia</td>
                                            <td class="vertical-text" style="text-align: center">Nº Orden</td>
                                            <td style="text-align: center">Nombre</td>
                                            <td class="vertical-text" style="text-align: center">Tipo</td>
                                            <td class="vertical-text" style="text-align: center"># Identificación</td>
                                            <td class="vertical-text" style="text-align: center">Sexo</td>
                                            <td class="vertical-text" style="text-align: center">Edad</td>
                                            <td class="vertical-text" style="text-align: center">Estado Civil</td>
                                            <td class="vertical-text" style="text-align: center">Parentesco</td>
                                            <td class="vertical-text" style="text-align: center">Ocupación</td>
                                            <td class="vertical-text" style="text-align: center">Escolaridad</td>
                                            <td class="vertical-text" style="text-align: center">Tipo Vivienda</td>
                                            <td class="vertical-text" style="text-align: center">Tenencia Vivienda</td>
                                            <td class="vertical-text" style="text-align: center">Posesión <br> Baldíos</td>
                                            <td class="vertical-text" style="text-align: center">Área Total (ha)</td>
                                            <td class="vertical-text" style="text-align: center">Área Total (m2)</td>
                                            <td class="vertical-text" style="text-align: center">Área Utilizada (m2)</td>
                                        </tr>
                                        <tr v-for="(item, index) in consolidado" :key="index">
                                            <td style="text-align: center" v-if="index == 0 || consolidado[index].numero_familia != consolidado[index-1].numero_familia" :rowspan="item.rowspan">{{ item.numero_familia }}</td>
                                            <td style="text-align: center" >{{ item.numero_orden }}</td>
                                            <td>{{ item.nombre_completo }}</td>
                                            <td>{{ item.tipo_identificacion }}</td>
                                            <td>{{ item.identificacion }}</td>
                                            <td>{{ item.sexo == "Masculino" ? "M" : "F" }}</td>
                                            <td></td>
                                            <td>{{ item.estado_civil }}</td>
                                            <td>{{ item.rol }}</td>
                                            <td>{{ item.ocupacion }}</td>
                                            <td  style="text-align: center">{{ item.escolaridad }}</td>
                                            <td class="vertical-text" v-if="index == 0 || consolidado[index].numero_familia != consolidado[index-1].numero_familia" :rowspan="item.rowspan" style="text-align: center">{{ item.rol == "Jefe de hogar" ? item.tipo_vivienda : "" }}</td>
                                            <td class="vertical-text" v-if="index == 0 || consolidado[index].numero_familia != consolidado[index-1].numero_familia" :rowspan="item.rowspan" style="text-align: center">{{ item.rol == "Jefe de hogar" ? item.tenencia : "" }}</td>
                                            <td v-if="index == 0 || consolidado[index].numero_familia != consolidado[index-1].numero_familia" :rowspan="item.rowspan" style="text-align: center">{{ item.rol == "Jefe de hogar" && (item.tipo_vivienda == 'Finca' || item.tipo_vivienda == 'Parcela') ? item.posecion_baldia : "N.A" }}</td>
                                            <td v-if="index == 0 || consolidado[index].numero_familia != consolidado[index-1].numero_familia" :rowspan="item.rowspan" style="text-align: center">{{ item.rol == "Jefe de hogar" && (item.tipo_vivienda == 'Finca' || item.tipo_vivienda == 'Parcela') ? (item.area_total / 10000) : "N.A" }}</td>
                                            <td v-if="index == 0 || consolidado[index].numero_familia != consolidado[index-1].numero_familia" :rowspan="item.rowspan" style="text-align: center">{{ item.rol == "Jefe de hogar" && (item.tipo_vivienda == 'Finca' || item.tipo_vivienda == 'Parcela') ? item.area_total : "N.A" }}</td>
                                            <td v-if="index == 0 || consolidado[index].numero_familia != consolidado[index-1].numero_familia" :rowspan="item.rowspan" style="text-align: center">{{ item.rol == "Jefe de hogar" && (item.tipo_vivienda == 'Finca' || item.tipo_vivienda == 'Parcela') ? item.area_destinada_ocupada : "N.A" }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import * as caracterizacionService from "../../services/caracterizacion_service";
import Skeleton from '../skeleton/skeletonSmall.vue';

export default {
    components: {
        Skeleton
    },
    data() {
        return {
            corregimiento: "",
            municipios_consolidados: [],
            consolidado: [],
            loading: false
        }
    },
    mounted() {
        this.municipiosConsolidado();
    },
    methods: {
        currentDate() {
            const current = new Date();
            const date = `${current.getDate()}/${current.getMonth()+1}/${current.getFullYear()}`;
            return date;
        },
        async municipiosConsolidado(){
            this.loading = true;
            await caracterizacionService.municipiosConsolidado().then(respuesta => {
                this.municipios_consolidados = respuesta.data;
                this.loading = false;
            });
        },
        async verConsolidado(id, nombre){
            this.loading = true;
            this.corregimiento = nombre;
            await caracterizacionService.consolidado(id).then(respuesta => {
                this.consolidado = respuesta.data;
                this.loading = false;
            });
        }
    }
}
</script>
<style scoped>
    table {
        border-collapse: collapse;
    }

    thead {
        background-color: transparent !important;
        font-weight: bold;
    }

    td, th {
        border: 1px solid grey;
        padding: 10px;
    }

    .item_consolidado {
        background-color: #009199 ;
        border-radius: 15px;
        padding: 15px;
        color: #ffff;
        font-weight: bold;
        font-size: 18px;
        cursor: pointer;
    }

    .item_consolidado:hover {
        background-color: #027075 ;
    }

    .item_consolidado p {
        margin-bottom: 3px;
    }

    hr {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgb(69 65 65 / 59%);
    }

    .card_hover{
        transition: transform .3s linear;
    }

    .card_hover:hover {
        cursor: pointer;
        transform: scale(1.02);
    }

    .vertical-text {
      writing-mode: vertical-rl; 
      text-orientation: sideways;
      white-space: nowrap; 
      transform: rotate(180deg);
    }
</style>