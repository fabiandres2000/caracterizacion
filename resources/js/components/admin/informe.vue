<template lang="">
    <div style="background-color: white">

        <loading :active="loading" 
            :can-cancel="true"
            loader="bars" 
            color="#38b4c5"
            :height=100
            :width=200
            :on-cancel="onCancel"
            :is-full-page="true">
        </loading>

        <div class="card">
                <div class="card-header">
                    <h4 class="card-title" style="font-weight: bold">INFORME SOCIODEMOGRAFICO - POBLACIÓN AFRO</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-underline" role="tablist">
                            <li style ="font-size: 14px" class="nav-item">
                                <a class="nav-link active" id="baseIcon-tab21" data-toggle="tab" aria-controls="tabIcon21" href="#tabIcon21" role="tab" aria-selected="false">
                                    <i style ="font-size: 18px" class="fas fa-user"></i>
                                    <p style ="font-size: 18px">Sociodemografico</p>
                                </a>
                            </li>
                            <li style ="font-size: 14px" class="nav-item">
                                <a class="nav-link" id="baseIcon-tab22" data-toggle="tab" aria-controls="tabIcon22" href="#tabIcon22" role="tab" aria-selected="false">
                                    <i style ="font-size: 18px" class="fas fa-suitcase"></i>
                                    <p style ="font-size: 18px">Empleo y Educación</p>
                                </a>
                            </li>
                            <li style ="font-size: 14px" class="nav-item">
                                <a class="nav-link" id="baseIcon-tab23" data-toggle="tab" aria-controls="tabIcon23" href="#tabIcon23" role="tab" aria-selected="false">
                                    <i style ="font-size: 18px" class="fas fa-school"></i>
                                    <p style ="font-size: 18px">Vivienda y Hogar</p>
                                </a>
                            </li>
                        </ul>
                        <div style="position: relative" class="tab-content px-1 pt-1">
                            <div class="tab-pane active" id="tabIcon21" role="tabpanel" aria-labelledby="baseIcon-tab21">
                                <button style="border-radius: 50%; width: 60px; height: 60px; position: absolute; right: 100px; top: 20px" class="btn btn-danger" @click="generateReport">
                                    <i class="fas fa-2x fa-file-pdf"></i>
                                </button>
                                <button style="border-radius: 50%; width: 60px; height: 60px; position: absolute; right: 20px; top: 20px" class="btn btn-success" @click="generateReport">
                                    <i class="fas fa-2x fa-file-excel"></i>
                                </button>
                                <br>
                                <br>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <div>
                                            <vue3-html2pdf
                                                :show-layout="true"
                                                :float-layout="false"
                                                :enable-download="true"
                                                :preview-modal="true"
                                                :paginate-elements-by-height="1200"
                                                :pdf-quality="2"
                                                :manual-pagination="false"
                                                pdf-content-width="100%"
                                                ref="html2Pdf"
                                                :html-to-pdf-options=htmlToPdfOptions
                                                @hasDownloaded = "loading = false"
                                            >
                                                <template v-slot:pdf-content>
                                                    <h3 style="width: 100%; color: #ff425c; text-align: center; font-weight: bold;">DISTRIBUCIÓN POR GRUPO DE EDAD</h3>
                                                    <br>
                                                    <table class="tabla_informe" style="width: 100%" v-if="datos_edad.length > 0">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="7">
                                                                    Distribución por Grupos de Edad
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr style="background-color: #5df3c5">
                                                                <th>EDAD</th>
                                                                <th>Hombres</th>
                                                                <th>%</th>
                                                                <th>Mujeres</th>
                                                                <th>%</th>
                                                                <th>Total</th>
                                                                <th>%Total</th>
                                                            </tr>
                                                            <tr>
                                                                <th>De 0 A 4</th>
                                                                <th>{{datos_edad[0][0]}}</th>
                                                                <th>{{(datos_edad[0][0] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th>{{datos_edad[0][1]}}</th>
                                                                <th>{{(datos_edad[0][1] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th style="background-color: #5df3c5">{{datos_edad[0][0]+datos_edad[0][1]}}</th>
                                                                <th>{{((datos_edad[0][0]+datos_edad[0][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                                            </tr>
                                                            <tr>
                                                                <th>De 5 A 9</th>
                                                                <th>{{datos_edad[1][0]}}</th>
                                                                <th>{{(datos_edad[1][0] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th>{{datos_edad[1][1]}}</th>
                                                                <th>{{(datos_edad[1][1] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th style="background-color: #5df3c5">{{datos_edad[1][0]+datos_edad[1][1]}}</th>
                                                                <th>{{((datos_edad[1][0]+datos_edad[1][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                                            </tr>
                                                            <tr>
                                                                <th>De 10 A 14</th>
                                                                <th>{{datos_edad[2][0]}}</th>
                                                                <th>{{(datos_edad[2][0] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th>{{datos_edad[2][1]}}</th>
                                                                <th>{{(datos_edad[2][1] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th style="background-color: #5df3c5">{{datos_edad[2][0]+datos_edad[2][1]}}</th>
                                                                <th>{{((datos_edad[2][0]+datos_edad[2][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                                            </tr>
                                                            <tr>
                                                                <th>De 15 A 19</th>
                                                                <th>{{datos_edad[3][0]}}</th>
                                                                <th>{{(datos_edad[3][0] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th>{{datos_edad[3][1]}}</th>
                                                                <th>{{(datos_edad[3][1] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th style="background-color: #5df3c5">{{datos_edad[3][0]+datos_edad[3][1]}}</th>
                                                                <th>{{((datos_edad[3][0]+datos_edad[3][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                                            </tr>
                                                            <tr>
                                                                <th>De 20 A 24</th>
                                                                <th>{{datos_edad[4][0]}}</th>
                                                                <th>{{(datos_edad[4][0] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th>{{datos_edad[4][1]}}</th>
                                                                <th>{{(datos_edad[4][1] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th style="background-color: #5df3c5">{{datos_edad[4][0]+datos_edad[4][1]}}</th>
                                                                <th>{{((datos_edad[4][0]+datos_edad[4][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                                            </tr>
                                                            <tr>
                                                                <th>De 25 A 29</th>
                                                                <th>{{datos_edad[5][0]}}</th>
                                                                <th>{{(datos_edad[5][0] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th>{{datos_edad[5][1]}}</th>
                                                                <th>{{(datos_edad[5][1] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th style="background-color: #5df3c5">{{datos_edad[5][0]+datos_edad[5][1]}}</th>
                                                                <th>{{((datos_edad[5][0]+datos_edad[5][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                                            </tr>
                                                            <tr>
                                                                <th>De 30 A 34</th>
                                                                <th>{{datos_edad[6][0]}}</th>
                                                                <th>{{(datos_edad[6][0] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th>{{datos_edad[6][1]}}</th>
                                                                <th>{{(datos_edad[6][1] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th style="background-color: #5df3c5">{{datos_edad[6][0]+datos_edad[1][1]}}</th>
                                                                <th>{{((datos_edad[6][0]+datos_edad[6][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                                            </tr>
                                                            <tr>
                                                                <th>De 35 A 39</th>
                                                                <th>{{datos_edad[7][0]}}</th>
                                                                <th>{{(datos_edad[7][0] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th>{{datos_edad[7][1]}}</th>
                                                                <th>{{(datos_edad[7][1] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th style="background-color: #5df3c5">{{datos_edad[7][0]+datos_edad[7][1]}}</th>
                                                                <th>{{((datos_edad[7][0]+datos_edad[7][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                                            </tr>
                                                            <tr>
                                                                <th>De 40 A 44</th>
                                                                <th>{{datos_edad[8][0]}}</th>
                                                                <th>{{(datos_edad[8][0] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th>{{datos_edad[8][1]}}</th>
                                                                <th>{{(datos_edad[8][1] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th style="background-color: #5df3c5">{{datos_edad[8][0]+datos_edad[8][1]}}</th>
                                                                <th>{{((datos_edad[8][0]+datos_edad[8][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                                            </tr>
                                                            <tr>
                                                                <th>De 45 A 49</th>
                                                                <th>{{datos_edad[9][0]}}</th>
                                                                <th>{{(datos_edad[9][0] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th>{{datos_edad[9][1]}}</th>
                                                                <th>{{(datos_edad[9][1] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th style="background-color: #5df3c5">{{datos_edad[9][0]+datos_edad[9][1]}}</th>
                                                                <th>{{((datos_edad[9][0]+datos_edad[9][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                                            </tr>
                                                            <tr>
                                                                <th>De 50 A 54</th>
                                                                <th>{{datos_edad[10][0]}}</th>
                                                                <th>{{(datos_edad[10][0] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th>{{datos_edad[10][1]}}</th>
                                                                <th>{{(datos_edad[10][1] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th style="background-color: #5df3c5">{{datos_edad[10][0]+datos_edad[10][1]}}</th>
                                                                <th>{{((datos_edad[10][0]+datos_edad[10][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                                            </tr>
                                                            <tr>
                                                                <th>De 55 A 59</th>
                                                                <th>{{datos_edad[11][0]}}</th>
                                                                <th>{{(datos_edad[11][0] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th>{{datos_edad[11][1]}}</th>
                                                                <th>{{(datos_edad[11][1] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th style="background-color: #5df3c5">{{datos_edad[11][0]+datos_edad[11][1]}}</th>
                                                                <th>{{((datos_edad[11][0]+datos_edad[11][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                                            </tr>
                                                            <tr>
                                                                <th>De 60 A 64</th>
                                                                <th>{{datos_edad[12][0]}}</th>
                                                                <th>{{(datos_edad[12][0] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th>{{datos_edad[12][1]}}</th>
                                                                <th>{{(datos_edad[12][1] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th style="background-color: #5df3c5">{{datos_edad[12][0]+datos_edad[12][1]}}</th>
                                                                <th>{{((datos_edad[12][0]+datos_edad[12][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                                            </tr>
                                                            <tr>
                                                                <th>De 65 A 69</th>
                                                                <th>{{datos_edad[13][0]}}</th>
                                                                <th>{{(datos_edad[13][0] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th>{{datos_edad[13][1]}}</th>
                                                                <th>{{(datos_edad[13][1] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th style="background-color: #5df3c5">{{datos_edad[13][0]+datos_edad[13][1]}}</th>
                                                                <th>{{((datos_edad[13][0]+datos_edad[13][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                                            </tr>
                                                            <tr>
                                                                <th>De 70 A 74</th>
                                                                <th>{{datos_edad[14][0]}}</th>
                                                                <th>{{(datos_edad[14][0] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th>{{datos_edad[14][1]}}</th>
                                                                <th>{{(datos_edad[14][1] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th style="background-color: #5df3c5">{{datos_edad[14][0]+datos_edad[14][1]}}</th>
                                                                <th>{{((datos_edad[14][0]+datos_edad[14][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                                            </tr>
                                                            <tr>
                                                                <th>De 75 Y MAS</th>
                                                                <th>{{datos_edad[15][0]}}</th>
                                                                <th>{{(datos_edad[15][0] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th>{{datos_edad[15][1]}}</th>
                                                                <th>{{(datos_edad[15][1] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th style="background-color: #5df3c5">{{datos_edad[15][0]+datos_edad[15][1]}}</th>
                                                                <th>{{((datos_edad[15][0]+datos_edad[15][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                                            </tr>
                                                            <tr>
                                                                <th style="background-color: #5df3c5">TOTAL</th>
                                                                <th style="background-color: #5df3c5">{{datos_edad_general.numero_masculino}}</th>
                                                                <th style="background-color: #5df3c5">{{(datos_edad_general.numero_masculino / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th style="background-color: #5df3c5">{{datos_edad_general.numero_femenino}}</th>
                                                                <th style="background-color: #5df3c5">{{(datos_edad_general.numero_femenino / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th style="background-color: #5df3c5">{{ numero_personas }}</th>
                                                                <th>100 %</th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                   
                                                    <table style="width: 100%" class="tabla_informe" v-if="datos_edad.length > 0">
                                                        <thead>
                                                            <tr>
                                                                <th style="background-color: #5df3c5;" colspan="3">Menores de 15 años</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th style="background-color: #5df3c5;">H</th>
                                                                <th style="background-color: #5df3c5;">M</th>
                                                                <th style="background-color: #5df3c5; font-size: 20px" rowspan="5"> &lt; 15 </th>
                                                            </tr>
                                                            <tr>
                                                                <th>{{(datos_edad[16][0] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th>{{(datos_edad[16][1] / numero_personas * 100).toFixed(2)}} %</th>
                                                            </tr>
                                                            <tr>
                                                                <th>{{datos_edad[16][0]}}</th>
                                                                <th>{{datos_edad[16][1]}}</th>
                                                            </tr>
                                                            <tr>
                                                                <th style="background-color: #5df3c5;">Total</th>
                                                                <th style="background-color: #5df3c5;">Total %</th>
                                                            </tr>
                                                            <tr>
                                                                <th>{{datos_edad[16][0] + datos_edad[16][1]}}</th>
                                                                <th>{{((datos_edad[16][0] + datos_edad[16][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="html2pdf__page-break"></div>
                                                    <br>
                                                    <table style="width: 100%" class="tabla_informe" v-if="datos_edad.length > 0">
                                                        <thead>
                                                            <tr>
                                                                <th style="background-color: #5df3c5;" colspan="3">De 15 a 64 años</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th style="background-color: #5df3c5;">H</th>
                                                                <th style="background-color: #5df3c5;">M</th>
                                                                <th style="background-color: #5df3c5; font-size: 20px" rowspan="5"> &gt;= 15 &lt;= 64 </th>
                                                            </tr>
                                                            <tr>
                                                                <th>{{(datos_edad[17][0] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th>{{(datos_edad[17][1] / numero_personas * 100).toFixed(2)}} %</th>
                                                            </tr>
                                                            <tr>
                                                                <th>{{datos_edad[17][0]}}</th>
                                                                <th>{{datos_edad[17][1]}}</th>
                                                            </tr>
                                                            <tr>
                                                                <th style="background-color: #5df3c5;">Total</th>
                                                                <th style="background-color: #5df3c5;">Total %</th>
                                                            </tr>
                                                            <tr>
                                                                <th>{{datos_edad[17][0] + datos_edad[17][1]}}</th>
                                                                <th>{{((datos_edad[17][0] + datos_edad[17][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <table style="width: 100%" class="tabla_informe" v-if="datos_edad.length > 0">
                                                        <thead>
                                                            <tr>
                                                                <th style="background-color: #5df3c5;" colspan="3">De 65 años en adelante</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th style="background-color: #5df3c5;">H</th>
                                                                <th style="background-color: #5df3c5;">M</th>
                                                                <th style="background-color: #5df3c5; font-size: 20px" rowspan="5"> &gt;= 65  </th>
                                                            </tr>
                                                            <tr>
                                                                <th>{{(datos_edad[18][0] / numero_personas * 100).toFixed(2)}} %</th>
                                                                <th>{{(datos_edad[18][1] / numero_personas * 100).toFixed(2)}} %</th>
                                                            </tr>
                                                            <tr>
                                                                <th>{{datos_edad[18][0]}}</th>
                                                                <th>{{datos_edad[18][1]}}</th>
                                                            </tr>
                                                            <tr>
                                                                <th style="background-color: #5df3c5;">Total</th>
                                                                <th style="background-color: #5df3c5;">Total %</th>
                                                            </tr>
                                                            <tr>
                                                                <th>{{datos_edad[18][0] + datos_edad[18][1]}}</th>
                                                                <th>{{((datos_edad[18][0] + datos_edad[18][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <br><br>
                                                    <h3 style="width: 100%; text-align: center; font-weight: bold;">PORCENTAJE DE LA POBLACIÓN POR GENERO</h3>
                                                    <div id="grafica_sexo_informe" style="height: 300px"></div>
                                                    <div class="html2pdf__page-break"></div>
                                                    <br>
                                                    <h3 style="width: 100%; text-align: center; font-weight: bold;">PIRÁMIDE POBLACIONAL</h3>
                                                    <br>
                                                    <div id="grafico_edad_informe" style="height: 465px; width: 104%"></div>
                                                    <br>
                                                    <br>
                                                    <h3 style="width: 100%; color: #ff425c; text-align: center; font-weight: bold;">POBLACIÓN DESPLAZADA</h3>
                                                    <br>
                                                    <table style="width: 100%" class="tabla_informe" v-if="datos_edad.length > 0">
                                                        <thead>
                                                            <tr>
                                                                <th style="background-color: #5df3c5;">Grupo Edad</th>
                                                                <th style="background-color: #5df3c5;">Masculinos</th>
                                                                <th style="background-color: #5df3c5;">Femeninos</th>
                                                                <th style="background-color: #5df3c5;">Total</th>
                                                                <th style="background-color: #5df3c5;">% Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                               <td><strong>{{ datos_desplazados.desplazados_m15[2] }}</strong></td>
                                                               <td>{{ datos_desplazados.desplazados_m15[0] }}</td>
                                                               <td>{{ datos_desplazados.desplazados_m15[1] }}</td>
                                                               <td>{{ datos_desplazados.desplazados_m15[0] + datos_desplazados.desplazados_m15[1]}}</td>
                                                               <td>{{ (((datos_desplazados.desplazados_m15[0] + datos_desplazados.desplazados_m15[1]) / datos_desplazados.cantidad_poblacion_desplazada) * 100).toFixed(2) }} %</td>
                                                            </tr>
                                                            <tr>
                                                               <td><strong>{{ datos_desplazados.desplazados_15a64[2] }}</strong></td>
                                                               <td>{{ datos_desplazados.desplazados_15a64[0] }}</td>
                                                               <td>{{ datos_desplazados.desplazados_15a64[1] }}</td>
                                                               <td>{{ datos_desplazados.desplazados_15a64[0] + datos_desplazados.desplazados_15a64[1]}}</td>
                                                               <td>{{ (((datos_desplazados.desplazados_15a64[0] + datos_desplazados.desplazados_15a64[1]) / datos_desplazados.cantidad_poblacion_desplazada) * 100).toFixed(2) }} %</td>
                                                            </tr>
                                                            <tr>
                                                               <td><strong>{{ datos_desplazados.desplazados_mas65[2] }}</strong></td>
                                                               <td>{{ datos_desplazados.desplazados_mas65[0] }}</td>
                                                               <td>{{ datos_desplazados.desplazados_mas65[1] }}</td>
                                                               <td>{{ datos_desplazados.desplazados_mas65[0] + datos_desplazados.desplazados_mas65[1]}}</td>
                                                               <td>{{ (((datos_desplazados.desplazados_mas65[0] + datos_desplazados.desplazados_mas65[1]) / datos_desplazados.cantidad_poblacion_desplazada) * 100).toFixed(2) }} %</td>
                                                            </tr>
                                                            <tr>
                                                                <th style="background-color: #5df3c5;">Total</th>
                                                                <th style="background-color: #5df3c5;">{{ datos_desplazados.masculinos_desplazados }}</th>
                                                                <th style="background-color: #5df3c5;">{{ datos_desplazados.femeninos_desplazados }}</th>
                                                                <th style="background-color: #5df3c5;">{{ datos_desplazados.cantidad_poblacion_desplazada }}</th>
                                                                <th style="background-color: #5df3c5;">100%</th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <h3 style="width: 100%; text-align: center; font-weight: bold;">DISTRIBUCIÓN POBLACIÓN DESPLAZADAS</h3>
                                                    <h5 style="width: 100%; text-align: center; font-weight: bold;">(por grupo de edad)</h5>
                                                    <br>
                                                    <div id="grafico_desplazados" style="margin-top: 10px; height: 350px; width: 104%"></div>
                                                    <div style="margin-top: 15px">
                                                        <h3 style="width: 100%; color: #ff425c; text-align: center; font-weight: bold;">DISTRIBUCIÓN POR ESTADO CIVIL</h3>
                                                        <br>
                                                        <table class="tabla_informe" style="width: 100%" v-if="datos_edad.length > 0">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="3">
                                                                        ESTADO CIVIL
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>ESTADO CIVIL</th>
                                                                    <th>PERSONAS</th>
                                                                    <th>%</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr v-for="(item, index) in datos_edad_general.estado_civil" :key="index">
                                                                    <th style="text-transform: uppercase">{{item[0]}}</th>
                                                                    <td>{{item[1]}}</td>
                                                                    <td>{{item[2]}} %</td>
                                                                </tr>
                                                            </tbody>
                                                            <thead>
                                                                <tr>
                                                                    <th>TOTAL</th>
                                                                    <th>{{numero_personas}}</th>
                                                                    <th>100%</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <h3 style="width: 100%; text-align: center; font-weight: bold;">DISTRIBUCIÓN DE PERSONAS POR ESTADO CIVIL</h3>
                                                    <div id="grafico_estado_civil_por" style="margin-top: 30px; height: 390px; width: 104%"></div>
                                                </template>
                                            </vue3-html2pdf> 
                                        </div>
                                    </div> 
                                    <div class="col-lg-2"></div>     
                                </div>
                            </div>
                            <div class="tab-pane" id="tabIcon22" role="tabpanel" aria-labelledby="baseIcon-tab22">
                                <button style="border-radius: 50%; width: 60px; height: 60px; position: absolute; right: 100px; top: 20px" class="btn btn-danger" @click="generateReport2">
                                    <i class="fas fa-2x fa-file-pdf"></i>
                                </button>
                                <button style="border-radius: 50%; width: 60px; height: 60px; position: absolute; right: 20px; top: 20px" class="btn btn-success" @click="generateReport">
                                    <i class="fas fa-2x fa-file-excel"></i>
                                </button>
                                <br>
                                <br>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-lg-2"></div>  
                                    <div class="col-lg-8">
                                        <div>
                                            <vue3-html2pdf
                                                :show-layout="true"
                                                :float-layout="false"
                                                :enable-download="true"
                                                :preview-modal="true"
                                                :paginate-elements-by-height="1200"
                                                :pdf-quality="2"
                                                :manual-pagination="false"
                                                @beforeDownload = "loading = false"
                                                pdf-content-width="100%"
                                                ref="html2Pdf2"
                                                :html-to-pdf-options=htmlToPdfOptions
                                            >
                                                <template v-slot:pdf-content>
                                                    <h3 style="width: 100%; color: #ff425c; text-align: center; font-weight: bold;">POBLACION ECONOMICAMENTE ACTIVA</h3>
                                                    <br>
                                                    <table style="width: 100%" class="situacion_laboral" v-if="poblacion_e_activa != null">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="6">POBLACION ECONOMICAMENTE ACTIVA</th>
                                                            </tr>
                                                            <tr>
                                                                <th>HOMBRES</th>
                                                                <th>%</th>
                                                                <th>MUJERES</th>
                                                                <th>%</th>
                                                                <th>TOTAL</th>
                                                                <th>%</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr style="border-left: 1px solid grey; border-right: 1px solid grey">
                                                                <td>{{poblacion_e_activa[0]}}</td>
                                                                <td>{{(poblacion_e_activa[0]/poblacion_e_activa[2] * 100).toFixed(2)}}%</td>
                                                                <td>{{poblacion_e_activa[1]}}</td>
                                                                <td>{{(poblacion_e_activa[1]/poblacion_e_activa[2] * 100).toFixed(2)}}%</td>
                                                                <td>{{poblacion_e_activa[0] + poblacion_e_activa[1]}}</td>
                                                                <td>100%</td>
                                                            </tr>
                                                            <tr style="border-left: 1px solid grey; border-right: 1px solid grey">
                                                                <td colspan="6" style="text-align: center; padding: 10px">
                                                                    También se le llama fuerza laboral y está conformada por las personas en edad de trabajar que trabajan o están buscando empleo. 
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <thead>
                                                            <tr>
                                                                <th colspan="6">POBLACION ECONOMICAMENTE INACTIVA</th>
                                                            </tr>
                                                            <tr>
                                                                <th>HOMBRES</th>
                                                                <th>%</th>
                                                                <th>MUJERES</th>
                                                                <th>%</th>
                                                                <th>TOTAL</th>
                                                                <th>%</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr style="border-left: 1px solid grey; border-right: 1px solid grey">
                                                                <td>{{poblacion_e_inactiva[0]}}</td>
                                                                <td>{{(poblacion_e_inactiva[0]/poblacion_e_inactiva[2] * 100).toFixed(2)}}%</td>
                                                                <td>{{poblacion_e_inactiva[1]}}</td>
                                                                <td>{{(poblacion_e_inactiva[1]/poblacion_e_inactiva[2] * 100).toFixed(2)}}%</td>
                                                                <td>{{poblacion_e_inactiva[0] + poblacion_e_inactiva[1]}}</td>
                                                                <td>100%</td>
                                                            </tr>
                                                            <tr style="border-left: 1px solid grey; border-right: 1px solid grey; border-bottom: 1px solid grey">
                                                                <td colspan="6" style="text-align: center; padding: 10px">
                                                                    Comprende a todas las personas en edad de trabajar que en la semana de referencia no participan en la producción de bienes y servicios porque no necesitan, no pueden o no están interesadas en tener actividad remunerada. A este grupo pertenecen estudiantes, amas de casa, pensionados, jubilados, rent istas, inválidos (incapacitados Permanentemente para trabajar), personas que no les llama la atención o creen que no vale la pena trabajar.
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <br><br>
                                                    <h3 style="width: 100%; text-align: center; font-weight: bold;">(P.E.A) PORCENTAJE POR GENERO</h3>
                                                    <div id="grafica_pae" style="height: 300px"></div>
                                                    <br><br>
                                                    <h3 style="width: 100%; text-align: center; font-weight: bold;">(P.E.I) PORCENTAJE POR GENERO</h3>
                                                    <div id="grafica_pei" style="height: 300px"></div>
                                                    <div class="html2pdf__page-break"></div>
                                                    <br><br>
                                                    <h3 style="width: 100%; text-align: center; font-weight: bold;">DISTRIBUCIÓN DE PERSONAS POR OCUPACIÓN</h3>
                                                    <br>
                                                    <table style="width: 100%" class="situacion_laboral" v-if="datos_edad.length > 0">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="3">OCUPACIÓN PRINCIPAL</th>
                                                            </tr>
                                                            <tr>
                                                                <th>OCUPACIÓN PRINCIPAL</th>
                                                                <th># PERSONAS</th>
                                                                <th>%</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr v-for="(item, index) in datos_por_ocupacion" :key="index">
                                                                <td>{{item.ocupacion}}</td>
                                                                <td>{{item.cantidad}}</td>
                                                                <td>{{(item.cantidad / numero_personas * 100).toFixed(2)}} %</td>                                    
                                                            </tr>
                                                        </tbody>
                                                        <thead>
                                                            <tr>
                                                                <th>Total</th>
                                                                <th>{{numero_personas}}</th>
                                                                <th>100 %</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                    <br>
                                                    <br>
                                                    <h3 style="width: 100%; text-align: center; font-weight: bold;">5 PRINCIPALES OCUPACIONES</h3>
                                                    <div id="grafica_principales_ocupaciones" style="height: 350px"></div>
                                                    <br><br>
                                                    <div class="html2pdf__page-break"></div>
                                                    <h3 style="width: 100%; text-align: center; font-weight: bold;">SITUACIÓN LABORAL</h3>
                                                    <br>
                                                    <table style="width: 100%" class="situacion_laboral" v-if="datos_edad.length > 0">
                                                        <thead>
                                                            <tr>
                                                                <th>SITUACIÓN LABORAL</th>
                                                                <th>HOMBRES</th>
                                                                <th>MUJERES</th>
                                                                <th># PERSONAS</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th>Trabajo Formal</th>
                                                                <td>{{situacion_laboral.trabajo_formal_m}}</td>
                                                                <td>{{situacion_laboral.trabajo_formal_f}}</td>
                                                                <td>{{situacion_laboral.trabajo_formal}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Trabajo Informal</th>
                                                                <td>{{situacion_laboral.trabajo_informal_m}}</td>
                                                                <td>{{situacion_laboral.trabajo_informal_f}}</td>
                                                                <td>{{situacion_laboral.trabajo_informal}}</td>
                                                            </tr>
                                                        </tbody>
                                                        <thead>
                                                            <tr>
                                                                <th>TOTAL</th>
                                                                <th>{{situacion_laboral.trabajo_formal_m + situacion_laboral.trabajo_informal_m}}</th>
                                                                <th>{{situacion_laboral.trabajo_formal_f + situacion_laboral.trabajo_informal_f}}</th>
                                                                <th>{{situacion_laboral.trabajo_formal + situacion_laboral.trabajo_informal}}</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <h3 style="width: 100%; text-align: center; font-weight: bold;">TRABAJO INFORMAL vs TRABAJO FORMAL</h3>
                                                    <div id="grafica_situacion_laboral" style="height: 350px"></div>
                                                    <br><br>
                                                    <div class="html2pdf__page-break"></div>
                                                    <br>
                                                    <h3 style="width: 100%; color: #ff425c; text-align: center; font-weight: bold;">DISTRIBUCIÓN DE PERSONAS POR NIVEL ACADÉMICO</h3>
                                                    <br>
                                                    <table style="width: 100%" class="situacion_laboral" v-if="datos_edad.length > 0">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="3">NIVEL ACADÉMICO</th>
                                                            </tr>
                                                            <tr>
                                                                <th>ESCOLARIDAD</th>
                                                                <th>PERSONAS</th>
                                                                <th>%</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr v-for="(item, index) in datos_nivel_academico" :key="index">
                                                                <td>{{item.descripcion}}</td>
                                                                <td>{{item.cantidad}}</td>
                                                                <td>{{(item.cantidad / numero_personas * 100).toFixed(2)}} %</td>
                                                            </tr>
                                                        </tbody>
                                                        <thead>
                                                            <tr>
                                                                <th>TOTAL</th>
                                                                <th>{{numero_personas}}</th>
                                                                <th>100%</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                    <br><br>
                                                    <h3 style="width: 100%; text-align: center; font-weight: bold;">PORCENTAJE DE PERSONAS POR NIVEL ACADÉMICO</h3>
                                                    <div id="grafica_nivel_academico" style="height: 300px"></div>
                                                    <br><br>
                                                    <h3 style="width: 100%; text-align: center; font-weight: bold;">DISTRIBUCIÓN DEL NIVEL ACADÉMICO DE LA POBLACIÓN POR SEXO</h3>
                                                    <br>
                                                    <table style="width: 100%" class="situacion_laboral" v-if="datos_edad.length > 0">
                                                        <thead>
                                                            <tr>
                                                                <th>ESCOLARIDAD</th>
                                                                <th>HOMBRES</th>
                                                                <th>%</th>
                                                                <th>MUJERES</th>
                                                                <th>%</th>
                                                                <th>TOTAL</th>
                                                                <th>% TOTAL</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr v-for="(item, index) in datos_nivel_academico_sexo" :key="index">
                                                                <td>{{item.nivel_educativo}}</td>
                                                                <td>{{item.hombres}}</td>
                                                                <td>{{(item.hombres / personas_nivel_educativo.total * 100).toFixed(2)}} %</td>
                                                                <td>{{item.mujeres}}</td>
                                                                <td>{{(item.mujeres / personas_nivel_educativo.total * 100).toFixed(2)}} %</td>
                                                                <td>{{item.hombres + item.mujeres}}</td>
                                                                <td>{{((item.mujeres +item.hombres)/ personas_nivel_educativo.total * 100).toFixed(2)}} %</td>
                                                            </tr>
                                                        </tbody>
                                                        <thead>
                                                            <tr>
                                                                <th>TOTAL</th>
                                                                <th>{{personas_nivel_educativo.total_hombres}}</th>
                                                                <th>{{(personas_nivel_educativo.total_hombres / personas_nivel_educativo.total * 100).toFixed(2)}} %</th>
                                                                <th>{{personas_nivel_educativo.total_mujeres}}</th>
                                                                <th>{{(personas_nivel_educativo.total_mujeres / personas_nivel_educativo.total * 100).toFixed(2)}} %</th>
                                                                <th>{{personas_nivel_educativo.total_hombres + personas_nivel_educativo.total_mujeres}}</th>
                                                                <th>100 %</th>
                                                            </tr>
                                                        </thead>
                                                        <thead>
                                                            <tr>
                                                                <th colspan="2">Frente al total de la población</th>
                                                                <th>{{(personas_nivel_educativo.total_hombres / numero_personas * 100).toFixed(2)}} %</th>
                                                                <td></td>
                                                                <th>{{(personas_nivel_educativo.total_mujeres / numero_personas * 100).toFixed(2)}} %</th>
                                                                <td></td>
                                                                <th>{{((personas_nivel_educativo.total_mujeres + personas_nivel_educativo.total_hombres) / numero_personas * 100).toFixed(2)}} %</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <div class="html2pdf__page-break"></div>
                                                    <h3 style="width: 100%; text-align: center; font-weight: bold;">DISTRIBUCIÓN DE LA POBLACIÓN POR NIVEL ACADÉMICO Y SEXO</h3>
                                                    <div id="grafica_nivel_academico_sexo" style="height: 500px"></div>
                                                </template>
                                            </vue3-html2pdf>
                                        </div>
                                    </div>
                                    <div class="col-lg-2"></div>  
                                </div>
                            </div>
                            <div class="tab-pane" id="tabIcon23" role="tabpanel" aria-labelledby="baseIcon-tab23">
                                <button style="border-radius: 50%; width: 60px; height: 60px; position: absolute; right: 100px; top: 20px" class="btn btn-danger" @click="generateReport3">
                                    <i class="fas fa-2x fa-file-pdf"></i>
                                </button>
                                <button style="border-radius: 50%; width: 60px; height: 60px; position: absolute; right: 20px; top: 20px" class="btn btn-success" @click="generateReport">
                                    <i class="fas fa-2x fa-file-excel"></i>
                                </button>
                                <br>
                                <br>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-lg-2"></div>  
                                    <div class="col-lg-8">
                                        <div>
                                            <vue3-html2pdf
                                                :show-layout="true"
                                                :float-layout="false"
                                                :enable-download="true"
                                                :preview-modal="true"
                                                :paginate-elements-by-height="1200"
                                                :pdf-quality="2"
                                                :manual-pagination="false"
                                                @beforeDownload = "loading = false"
                                                pdf-content-width="100%"
                                                ref="html2Pdf3"
                                                :html-to-pdf-options=htmlToPdfOptions
                                            >
                                                <template v-slot:pdf-content>
                                                    <h3 style="width: 100%; color: #ff425c; text-align: center; font-weight: bold;">DISTRIBUCIÓN DE FAMILIAS POR POSESIÓN DE VIVIENDA</h3>
                                                    <br>
                                                    <table style="width: 100%" class="situacion_laboral" v-if="posesion_vivienda != null">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="3">POSESIÓN DE VIVIENDA</th>
                                                            </tr>
                                                            <tr>
                                                                <th>VIVIENDA</th>
                                                                <th>FAMILIAS</th>
                                                                <th>%</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>POSEEN</td>
                                                                <td>{{posesion_vivienda.poseen}}</td>
                                                                <td>{{(posesion_vivienda.poseen / (posesion_vivienda.no_poseen + posesion_vivienda.poseen) * 100).toFixed(2)}} %</td>                                    
                                                            </tr>
                                                            <tr>
                                                                <td>NO POSEEN</td>
                                                                <td>{{posesion_vivienda.no_poseen}}</td>
                                                                <td>{{(posesion_vivienda.no_poseen / (posesion_vivienda.no_poseen + posesion_vivienda.poseen) * 100).toFixed(2)}} %</td>                                    
                                                            </tr>
                                                        </tbody>
                                                        <thead>
                                                            <tr>
                                                                <th>Total</th>
                                                                <th>{{posesion_vivienda.no_poseen + posesion_vivienda.poseen}}</th>
                                                                <th>100 %</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                    <br><br>
                                                    <h3 style="width: 100%; text-align: center">PORCENTAJE DE FAMILIA POR TIPO DE POSESIÓN</h3>
                                                    <div id="grafica_posesion" style="height: 350px"></div>
                                                    <br><br>
                                                    <hr>
                                                    <h3 style="width: 100%; color: #ff425c; text-align: center; font-weight: bold;">TENENCIA DE TIERRAS</h3>
                                                    <br>
                                                    <table style="width: 100%" class="situacion_laboral" v-if="posesion_vivienda != null">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="5">TENENCIA DE TIERRAS</th>
                                                            </tr>
                                                            <tr>
                                                                <th>RESPUESTA</th>
                                                                <th>POSESIÓN BALDÍOS</th>
                                                                <th>PROPIEDAD CON TITULO</th>
                                                                <th>AREA TOTAL (m<sup>2</sup>)</th>
                                                                <th>AREA TOTAL (Ha)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Si</td>
                                                                <td>{{posesion_baldios.baldios_si}}</td>
                                                                <td>{{posesion_baldios.titulo_si}}</td> 
                                                                <td rowspan="2">{{posesion_baldios.total_area}} <strong>m <sup>2</sup></strong>  </td>
                                                                <td rowspan="2">{{posesion_baldios.total_area / 10000}} <strong>Hta</strong></td>                                   
                                                            </tr>
                                                            <tr>
                                                                <td>No</td>
                                                                <td>{{posesion_baldios.baldios_no}}</td>
                                                                <td>{{posesion_baldios.titulo_no}}</td> 
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <br><br>
                                                    <h3 style="width: 100%; text-align: center">PRINCIPALES CULTIVOS</h3>
                                                    <br>
                                                    <table style="width: 100%" class="situacion_laboral" v-if="posesion_vivienda != null">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="4">CULTIVOS</th>
                                                            </tr>
                                                            <tr>
                                                                <th>LINEA</th>
                                                                <th>ACTIVIDAD</th>
                                                                <th>AREA TOTAL (m<sup>2</sup>)</th>
                                                                <th>AREA TOTAL (Ha)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr v-for="(item, index) in cultivos" :key="index">
                                                                <td>{{item.linea}}</td>
                                                                <td>{{item.actividad}}</td>
                                                                <td>{{item.area_destinada}}</td> 
                                                                <td>{{item.area_destinada / 10000}}</td> 
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <div class="html2pdf__page-break"></div>
                                                    <h3 style="width: 100%; text-align: center">PORCENTAJE DE HECTÁREAS OCUPADAS</h3>
                                                    <h5 style="width: 100%; text-align: center; font-weight: bold;">por linea economica</h5>
                                                    <div id="grafica_linea_economica" style="height: 300px"></div>
                                                    <br><br>
                                                    <h3 style="width: 100%; color: #ff425c; text-align: center; font-weight: bold;">PORCENTAJE DE HECTÁREAS OCUPADAS</h3>
                                                    <h5 style="width: 100%; text-align: center; font-weight: bold;">por linea economica y actividad</h5>
                                                    <br>
                                                    <div v-for="(item, index) in cultivosPorLinea" :key="index">
                                                        <br><br>
                                                        <h3 style="height: 45px; width: 100%; text-align: center">{{ item[0].linea }}</h3>
                                                        <br>
                                                        <div :id="'grafica_linea_'+index" style="height: 200px"></div>
                                                        <br><br>
                                                    </div>
                                                </template>
                                            </vue3-html2pdf>
                                        </div>
                                    </div>
                                    <div class="col-lg-2"></div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</template>
<script>
import Vue3Html2pdf from 'vue3-html2pdf'
import * as dashboardService from "../../services/dashboard_service";
import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";
import Loading from 'vue3-loading-overlay';
import 'vue3-loading-overlay/dist/vue3-loading-overlay.css';

am4core.useTheme(am4themes_animated);
export default {
    components: {
        Vue3Html2pdf,
        Loading
    },
    data() {
        return {
            htmlToPdfOptions: {
                margin: 0.3,

                filename: `informe_general.pdf`,

                image: {
                    type: 'jpeg', 
                    quality: 0.98
                },

                enableLinks: false,

                html2canvas: {
                    scale: 1,
                    useCORS: true
                },

                jsPDF: {
                    unit: 'in',
                    format: 'B4',
                    orientation: 'portrait'
                }
            },
            datos_edad: [],
            numero_personas: 0,
            datos_edad_general: null,
            chart_edad: null,
            chart_sexo: null,
            datos_desplazados: null,
            chart_desplazados: null,
            char_estado_civil: null,
            char_estado_civil_por: null,
            poblacion_e_activa: null,
            poblacion_e_inactiva: null,
            char_poblacion_activa: null,
            char_poblacion_inactiva: null,
            chart_ocupaciones: null,
            situacion_laboral: null,
            loading: false,
            datos_nivel_academico: [],
            personas_nivel_educativo: 0,
            chart_nivel_academico: null,
            chart_nivel_academico_sexo: null,
            datos_por_ocupacion: null,
            posesion_vivienda: null,
            chart_posesion: null,
            posesion_baldios: null,
            cultivos: null,
            cultivosPorLinea : [],
        }
    },
    mounted() {
        this.consultarDatos();
    },
    methods: {
        generateReport () {
            this.loading = true;
            setTimeout(()=>{
                this.$refs.html2Pdf.generatePdf()
            }, 1000)
        },
        generateReport2 () {
            this.loading = true;
            setTimeout(()=>{
                this.$refs.html2Pdf2.generatePdf()
            }, 1000)
        },
        generateReport3 () {
            this.loading = true;
            setTimeout(()=>{
                this.$refs.html2Pdf3.generatePdf()
            }, 1000)
        },
        async consultarDatos(){
            this.loading = true;
            await dashboardService.datosInforme().then(respuesta => {
                this.datos_edad_general = respuesta.data;
                this.datos_edad = respuesta.data.piramide_edad;
                this.numero_personas = respuesta.data.numero_personas;
                this.datos_desplazados = respuesta.data.datos_desplazados;
                this.generarGraficoEdad();
                this.generarGraficoSexo();
                this.generarGraficoDesplazados();
                this.generarGraficoEstadiCivilPie();
                this.poblacion_e_activa = respuesta.data.poblacion_e_activa;
                this.poblacion_e_inactiva = respuesta.data.poblacion_e_inactiva;
                this.generarGraficoPAE();
                this.generarGraficoPEI();
                this.datos_nivel_academico = respuesta.data.nivel_educativo;
                this.datos_nivel_academico_sexo = respuesta.data.nivel_educativo_sexo;
                this.personas_nivel_educativo = respuesta.data.personas_nivel_educativo;
                this.generarGraficoNivelAcademico();
                this.generarGraficoNivelAcademicoSexo();
                this.datos_por_ocupacion = respuesta.data.por_ocupacion;
                this.situacion_laboral = respuesta.data.situacion_laboral;
                this.generarGraficoPrincipalesOcupaciones();
                this.generarGraficoSituacionLaboral();
                this.posesion_vivienda = respuesta.data.posesion_vivienda;
                this.generarGraficoPosesion();
                this.posesion_baldios = respuesta.data.posesion_baldios[0];
                this.cultivos = respuesta.data.cultivos;
                this.cultivosPorLinea = this.agruparPorLinea(this.cultivos);
                this.generarGraficaLinea();
                setTimeout(()=>{
                    this.generarGraficasLinea();
                }, 1000)
                this.loading = false;
            });
        },
        agruparPorLinea(data) {
            const groupedByLinea = data.reduce((result, currentItem) => {
            const key = currentItem.linea;

            const groupIndex = result.findIndex(group => group[0].linea === key);

            if (groupIndex === -1) {
                result.push([currentItem]);
            } else {
                result[groupIndex].push(currentItem);
            }

            return result;
            }, []);

            return groupedByLinea;
        },
        generarGraficoEdad() {
            var chart = am4core.create("grafico_edad_informe", am4charts.XYChart);
            chart.data = [];
        
            var maximo = 0;

            for (let index = 0; index <= 15; index++) {
                const element = this.datos_edad[index];
                chart.data.push({
                    "age": element[2],
                    "male": (-1) * element[0],
                    "female": element[1]
                });

                if(element[0] >= maximo){
                    maximo = element[0];
                }

                if(element[1] >= maximo){
                    maximo = element[1];
                }
            }

            // Use only absolute numbers
            chart.numberFormatter.numberFormat = "#.#s";

            // Create axes
            var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "age";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.inversed = true;
            categoryAxis.renderer.minGridDistance = 10;
            

            var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
            valueAxis.extraMin = 0.1;
            valueAxis.extraMax = 0.1;
            valueAxis.min = -1 * (maximo);
            valueAxis.max = maximo;
            valueAxis.renderer.minGridDistance = 40;
            valueAxis.renderer.ticks.template.length = 5;
            valueAxis.renderer.ticks.template.disabled = false;
            valueAxis.renderer.ticks.template.strokeOpacity = 0.4;
            valueAxis.renderer.labels.template.adapter.add("text", function(text) {
            return text == "Male" || text == "Female" ? text : text;
            })

            // Create series
            var male = chart.series.push(new am4charts.ColumnSeries());
            male.dataFields.valueX = "male";
            male.dataFields.categoryY = "age";
            male.clustered = false;

            var maleLabel = male.bullets.push(new am4charts.LabelBullet());
            maleLabel.label.text = "{valueX}";
            maleLabel.label.hideOversized = false;
            maleLabel.label.truncate = false;
            maleLabel.label.horizontalCenter = "right";
            maleLabel.label.dx = -10;

            var female = chart.series.push(new am4charts.ColumnSeries());
            female.dataFields.valueX = "female";
            female.dataFields.categoryY = "age";
            female.clustered = false;

            var femaleLabel = female.bullets.push(new am4charts.LabelBullet());
            femaleLabel.label.text = "{valueX}";
            femaleLabel.label.hideOversized = false;
            femaleLabel.label.truncate = false;
            femaleLabel.label.horizontalCenter = "left";
            femaleLabel.label.dx = 10;
           
            var maleRange = valueAxis.axisRanges.create();
            maleRange.value = -1 * (maximo);
            maleRange.endValue = 0;
            maleRange.label.text = "Masculino";
            maleRange.label.fill = chart.colors.list[0];
            maleRange.label.dy = 20;
            maleRange.label.fontWeight = '600';
            maleRange.grid.strokeOpacity = 0;
            maleRange.grid.stroke = male.stroke;

            var femaleRange = valueAxis.axisRanges.create();
            femaleRange.value = 0;
            femaleRange.endValue = maximo;
            femaleRange.label.text = "Femenino";
            femaleRange.label.fill = chart.colors.list[1];
            femaleRange.label.dy = 20;
            femaleRange.label.fontWeight = '600';
            femaleRange.grid.strokeOpacity = 0;
            femaleRange.grid.stroke = female.stroke;

            this.chart_edad = chart;
        },
        generarGraficoSexo() {
            var chart = am4core.create("grafica_sexo_informe", am4charts.PieChart);

            // Add data
            chart.data = [
                {
                    "country": "Masculino",
                    "litres": this.datos_edad_general.numero_masculino,
                    "color": am4core.color("#ff7588") // Specify the color for Masculino
                },
                {
                    "country": "Femenino",
                    "litres": this.datos_edad_general.numero_femenino,
                    "color": am4core.color("#ffa87d") // Specify the color for Femenino
                }
            ];

            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "litres";
            pieSeries.dataFields.category = "country";
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeOpacity = 1;


            // Set the slice colors based on the "color" field in the data
            pieSeries.slices.template.propertyFields.fill = "color";

            pieSeries.hiddenState.properties.opacity = 1;
            pieSeries.hiddenState.properties.endAngle = -90;
            pieSeries.hiddenState.properties.startAngle = -90;

            chart.hiddenState.properties.radius = am4core.percent(0);

            this.chart_sexo = chart;
        },
        generarGraficoDesplazados(){
            var chart = am4core.create('grafico_desplazados', am4charts.XYChart)
            chart.colors.step = 2;

            chart.legend = new am4charts.Legend()
            chart.legend.position = 'top'
            chart.legend.paddingBottom = 20
            chart.legend.labels.template.maxWidth = 95

            var xAxis = chart.xAxes.push(new am4charts.CategoryAxis())
            xAxis.dataFields.category = 'category'
            xAxis.renderer.cellStartLocation = 0.1
            xAxis.renderer.cellEndLocation = 0.9
            xAxis.renderer.grid.template.location = 0;

            var yAxis = chart.yAxes.push(new am4charts.ValueAxis());
            yAxis.min = 0;

            function createSeries(value, name) {
                var series = chart.series.push(new am4charts.ColumnSeries())
                series.dataFields.valueY = value
                series.dataFields.categoryX = 'category'
                series.name = name

                series.events.on("hidden", arrangeColumns);
                series.events.on("shown", arrangeColumns);

                var bullet = series.bullets.push(new am4charts.LabelBullet())
                bullet.interactionsEnabled = false
                bullet.dy = 30;
                bullet.label.text = '{valueY}'
                bullet.label.fill = am4core.color('#ffffff')

                return series;
            }

            chart.data = [
                {
                    category: this.datos_desplazados.desplazados_m15[2],
                    first: this.datos_desplazados.desplazados_m15[0],
                    second: this.datos_desplazados.desplazados_m15[1],
                },
                {
                    category: this.datos_desplazados.desplazados_15a64[2],
                    first: this.datos_desplazados.desplazados_15a64[0],
                    second: this.datos_desplazados.desplazados_15a64[1],
                },
                {
                    category: this.datos_desplazados.desplazados_mas65[2],
                    first: this.datos_desplazados.desplazados_mas65[0],
                    second: this.datos_desplazados.desplazados_mas65[1],
                },
            ]


            createSeries('first', 'Masculino');
            createSeries('second', 'Femenino');

            function arrangeColumns() {
                var series = chart.series.getIndex(0);
                var w = 1 - xAxis.renderer.cellStartLocation - (1 - xAxis.renderer.cellEndLocation);
                if (series.dataItems.length > 1) {
                    var x0 = xAxis.getX(series.dataItems.getIndex(0), "categoryX");
                    var x1 = xAxis.getX(series.dataItems.getIndex(1), "categoryX");
                    var delta = ((x1 - x0) / chart.series.length) * w;
                    if (am4core.isNumber(delta)) {
                        var middle = chart.series.length / 2;

                        var newIndex = 0;
                        chart.series.each(function(series) {
                            if (!series.isHidden && !series.isHiding) {
                                series.dummyData = newIndex;
                                newIndex++;
                            }
                            else {
                                series.dummyData = chart.series.indexOf(series);
                            }
                        })
                        var visibleCount = newIndex;
                        var newMiddle = visibleCount / 2;

                        chart.series.each(function(series) {
                            var trueIndex = chart.series.indexOf(series);
                            var newIndex = series.dummyData;

                            var dx = (newIndex - trueIndex + middle - newMiddle) * delta

                            series.animate({ property: "dx", to: dx }, series.interpolationDuration, series.interpolationEasing);
                            series.bulletsContainer.animate({ property: "dx", to: dx }, series.interpolationDuration, series.interpolationEasing);
                        })
                    }
                }
            }

            this.chart_desplazados = chart;

        },
        generarGraficoEstadiCivilPie() {
            var chart = am4core.create("grafico_estado_civil_por", am4charts.PieChart);

            // Add data
            chart.data = [];

            for (let index = 0; index <= 5; index++) {
                const element = this.datos_edad_general.estado_civil[index];
                chart.data.push({
                    "country": element[0],
                    "litres": element[1]
                });
            }


            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "litres";
            pieSeries.dataFields.category = "country";
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeOpacity = 1;

            pieSeries.hiddenState.properties.opacity = 1;
            pieSeries.hiddenState.properties.endAngle = -90;
            pieSeries.hiddenState.properties.startAngle = -90;

            chart.hiddenState.properties.radius = am4core.percent(0);

            this.char_estado_civil_por = chart;
        },
        generarGraficoPAE() {
            var chart = am4core.create("grafica_pae", am4charts.PieChart);

            // Add data
            chart.data = [
                {
                    "country": "Masculino",
                    "litres": this.poblacion_e_activa[0],
                },
                {
                    "country": "Femenino",
                    "litres": this.poblacion_e_activa[1],
                }
            ];

            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "litres";
            pieSeries.dataFields.category = "country";
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeOpacity = 1;

            pieSeries.hiddenState.properties.opacity = 1;
            pieSeries.hiddenState.properties.endAngle = -90;
            pieSeries.hiddenState.properties.startAngle = -90;

            chart.hiddenState.properties.radius = am4core.percent(0);

            this.char_poblacion_activa = chart;
        },
        generarGraficoPEI() {
            var chart = am4core.create("grafica_pei", am4charts.PieChart);

            // Add data
            chart.data = [
                {
                    "country": "Masculino",
                    "litres": this.poblacion_e_inactiva[0],
                },
                {
                    "country": "Femenino",
                    "litres": this.poblacion_e_inactiva[1],
                }
            ];

            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "litres";
            pieSeries.dataFields.category = "country";
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeOpacity = 1;

            pieSeries.hiddenState.properties.opacity = 1;
            pieSeries.hiddenState.properties.endAngle = -90;
            pieSeries.hiddenState.properties.startAngle = -90;

            chart.hiddenState.properties.radius = am4core.percent(0);

            this.char_poblacion_inactiva = chart;
        },
        generarGraficoPrincipalesOcupaciones() {
            var chart = am4core.create("grafica_principales_ocupaciones", am4charts.PieChart);

            // Add data
            chart.data = [];

            if(this.datos_por_ocupacion.length < 5){
                this.datos_por_ocupacion.forEach(element => {
                    chart.data.push({
                        "country": element.ocupacion,
                        "litres": element.cantidad,
                    });
                });
            }else{
                for (let index = 0; index < this.datos_por_ocupacion.length; index++) {
                    var element = this.datos_por_ocupacion[index];
                    if(element.ocupacion != "NO APLICA"){
                        chart.data.push({
                            "country": element.ocupacion,
                            "litres": element.cantidad,
                        });
                    }

                    if(chart.data.length == 5){
                        break;
                    }   
                }
            }


            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "litres";
            pieSeries.dataFields.category = "country";
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeOpacity = 1;

            pieSeries.labels.template.maxWidth = 110;
            pieSeries.labels.template.wrap = true;

            pieSeries.hiddenState.properties.opacity = 1;
            pieSeries.hiddenState.properties.endAngle = -90;
            pieSeries.hiddenState.properties.startAngle = -90;

            chart.hiddenState.properties.radius = am4core.percent(0);

            this.chart_ocupaciones = chart;
        },
        generarGraficoSituacionLaboral() {
            var chart = am4core.create("grafica_situacion_laboral", am4charts.PieChart);

            // Add data
            chart.data = [
                {
                    "country": "Trabajo Formal",
                    "litres": this.situacion_laboral.trabajo_formal,
                },
                {
                    "country": "Trabajo Inormal",
                    "litres": this.situacion_laboral.trabajo_informal,
                }
            ];


            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "litres";
            pieSeries.dataFields.category = "country";
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeOpacity = 1;

            pieSeries.labels.template.maxWidth = 110;
            pieSeries.labels.template.wrap = true;

            pieSeries.hiddenState.properties.opacity = 1;
            pieSeries.hiddenState.properties.endAngle = -90;
            pieSeries.hiddenState.properties.startAngle = -90;

            chart.hiddenState.properties.radius = am4core.percent(0);

        },
        generarGraficoNivelAcademico() {
            var chart = am4core.create("grafica_nivel_academico", am4charts.PieChart);

            // Add data
            chart.data = [];

            this.datos_nivel_academico.forEach(element => {
                chart.data.push({
                    "country": element.descripcion,
                    "litres": element.cantidad,
                });
            });

            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "litres";
            pieSeries.dataFields.category = "country";
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeOpacity = 1;

            pieSeries.hiddenState.properties.opacity = 1;
            pieSeries.hiddenState.properties.endAngle = -90;
            pieSeries.hiddenState.properties.startAngle = -90;

            chart.hiddenState.properties.radius = am4core.percent(0);

            this.char_poblacion_inactiva = chart;
        },
        generarGraficoNivelAcademicoSexo() {
            var chart = am4core.create('grafica_nivel_academico_sexo', am4charts.XYChart);
            chart.colors.step = 2;

            chart.legend = new am4charts.Legend();
            chart.legend.position = 'top';
            chart.legend.paddingBottom = 20;
            chart.legend.labels.template.maxWidth = 95;

            // Interchange x-axis and y-axis
            var yAxis = chart.xAxes.push(new am4charts.ValueAxis());
            yAxis.min = 0;

            var xAxis = chart.yAxes.push(new am4charts.CategoryAxis());
            xAxis.dataFields.category = 'category';
            xAxis.renderer.cellStartLocation = 0.1;
            xAxis.renderer.cellEndLocation = 0.9;
            xAxis.renderer.grid.template.location = 0;
            xAxis.renderer.minGridDistance = 25;

            function createSeries(value, name) {
                var series = chart.series.push(new am4charts.ColumnSeries());
                series.dataFields.valueX = value; 
                series.dataFields.categoryY = 'category';
                series.name = name;

                var bullet = series.bullets.push(new am4charts.LabelBullet());
                bullet.interactionsEnabled = false;
                bullet.dx = 20;
                bullet.label.text = '{valueX}';
                bullet.label.fill = am4core.color('#000000');

                return series;
            }

            chart.data = [];

            this.datos_nivel_academico_sexo.forEach(element => {
                chart.data.push({
                    category: element.nivel_educativo,
                    first: element.hombres,
                    second: element.mujeres,
                });
            });

            createSeries('first', 'Hombres');
            createSeries('second', 'Mujeres');

        },
        generarGraficoPosesion() {
            var chart = am4core.create("grafica_posesion", am4charts.PieChart);

            // Add data
            chart.data = [
                {
                    "country": "POSEEN",
                    "litres": this.posesion_vivienda.poseen,
                },
                {
                    "country": "NO POSEEN",
                    "litres": this.posesion_vivienda.no_poseen,
                }
            ];

            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "litres";
            pieSeries.dataFields.category = "country";
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeOpacity = 1;

            pieSeries.hiddenState.properties.opacity = 1;
            pieSeries.hiddenState.properties.endAngle = -90;
            pieSeries.hiddenState.properties.startAngle = -90;

            chart.hiddenState.properties.radius = am4core.percent(0);

            this.char_poblacion_inactiva = chart;
        },
        generarGraficaLinea(){
            var chart = am4core.create("grafica_linea_economica", am4charts.PieChart);
            chart.data = [];
            var nombre_linea = "";
            var cantidad_por_linea = 0;

            this.cultivosPorLinea.forEach(element => { 
                cantidad_por_linea = 0;

                nombre_linea = element[0].linea;  
                element.forEach(element2 => {
                    cantidad_por_linea += element2.area_destinada
                });

                chart.data.push({
                    "country": nombre_linea,
                    "litres": cantidad_por_linea
                });
            });

            chart.innerRadius = am4core.percent(50);

            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "litres";
            pieSeries.dataFields.category = "country";
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeWidth = 2;
            pieSeries.slices.template.strokeOpacity = 1;

            pieSeries.labels.template.maxWidth = 130;
            pieSeries.labels.template.wrap = true;

            pieSeries.hiddenState.properties.opacity = 1;
            pieSeries.hiddenState.properties.endAngle = -90;
            pieSeries.hiddenState.properties.startAngle = -90;
        },
        generarGraficasLinea() {
            var index = 0;
            this.cultivosPorLinea.forEach(element => {
                var chart = am4core.create("grafica_linea_"+index, am4charts.PieChart);
                chart.data = [];

                element.forEach(element2 => {
                    chart.data.push({
                        "country": element2.actividad,
                        "litres": element2.area_destinada
                    });
                });

                // Set inner radius
                chart.innerRadius = am4core.percent(50);

                // Add and configure Series
                var pieSeries = chart.series.push(new am4charts.PieSeries());
                pieSeries.dataFields.value = "litres";
                pieSeries.dataFields.category = "country";
                pieSeries.slices.template.stroke = am4core.color("#fff");
                pieSeries.slices.template.strokeWidth = 2;
                pieSeries.slices.template.strokeOpacity = 1;

                pieSeries.labels.template.maxWidth = 110;
                pieSeries.labels.template.wrap = true;

                // This creates initial animation
                pieSeries.hiddenState.properties.opacity = 1;
                pieSeries.hiddenState.properties.endAngle = -90;
                pieSeries.hiddenState.properties.startAngle = -90;

                index++;
            });
        }
    }
}
</script>
<style>
    .pdf-preview {
        position: fixed !important;
        width: 100% !important;
        min-width: 600px !important;
        height: 100% !important;
        top: 0px !important;
        z-index: 9999999 !important;
        left: 50% !important;
        transform: translateX(-50%) !important;
        border-radius: 5px !important;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2823529412) !important;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(61, 61, 61, 0.514);
    }

    .pdf-preview iframe {
        width: 60% !important;
        height: 80% !important;
    }

    .vue-html2pdf .pdf-preview button {
        position: absolute !important;
        top: 16px !important;
        left: 94% !important;
        width: 58px !important;
        height: 55px !important;
        background: #ff0023 !important;
        border: 0 !important;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2823529412) !important;
        border-radius: 50% !important;
        color: #fff !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 30px !important;
        cursor: pointer !important;
        font-weight: bold !important;
        border: 4px solid #ffff !important;
    }

    .tabla_informe {
        border-collapse: collapse;
    }

    .tabla_informe thead {
        font-weight: bold;
    }

    .tabla_informe td, .tabla_informe th {
        border: 1px solid grey;
        padding: 5px !important;
        text-align: center;
        font-size: 14px;
    }

    .tabla_informe td, .tabla_informe th {
        border: 1px solid rgb(173, 173, 173) !important;
        padding: 10px;
    }

    thead th {
       background-color: #5df3c5 !important;
    }

    .situacion_laboral th, .situacion_laboral td{
        border-right: 1px solid grey;
        border-left: 1px solid grey;
        border-bottom: 1px solid grey;
        border-top: 1px solid grey;
        text-align: center;
    }
</style>