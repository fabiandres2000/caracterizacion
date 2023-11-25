<template lang="">
    <div style="background-color: white">
        <br>
        <button @click="generateReport">
            reporte
        </button>
        <hr>
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
                    >
                        <template v-slot:pdf-content>
                            <h2 style="width: 100%; color: #ff425c; text-align: center; font-weight: bold;">DISTRIBUCIÓN POR GRUPO DE EDAD</h2>
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
                                        <th>H</th>
                                        <th>M</th>
                                        <th style="background-color: #5df3c5; font-size: 20px" rowspan="4"> &lt; 15 </th>
                                    </tr>
                                    <tr>
                                        <th>De 0 A 4</th>
                                        <th>{{datos_edad[0][0]}}</th>
                                        <th>{{(datos_edad[0][0] / numero_personas * 100).toFixed(2)}} %</th>
                                        <th>{{datos_edad[0][1]}}</th>
                                        <th>{{(datos_edad[0][1] / numero_personas * 100).toFixed(2)}} %</th>
                                        <th style="background-color: #5df3c5">{{datos_edad[0][0]+datos_edad[0][1]}}</th>
                                        <th>{{((datos_edad[0][0]+datos_edad[0][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                        <th>{{(datos_edad[16][0] / numero_personas * 100).toFixed(2)}} %</th>
                                        <th>{{(datos_edad[16][1] / numero_personas * 100).toFixed(2)}} %</th>
                                    </tr>
                                    <tr>
                                        <th>De 5 A 9</th>
                                        <th>{{datos_edad[1][0]}}</th>
                                        <th>{{(datos_edad[1][0] / numero_personas * 100).toFixed(2)}} %</th>
                                        <th>{{datos_edad[1][1]}}</th>
                                        <th>{{(datos_edad[1][1] / numero_personas * 100).toFixed(2)}} %</th>
                                        <th style="background-color: #5df3c5">{{datos_edad[1][0]+datos_edad[1][1]}}</th>
                                        <th>{{((datos_edad[1][0]+datos_edad[1][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                        <th>{{datos_edad[16][0]}}</th>
                                        <th>{{datos_edad[16][1]}}</th>
                                    </tr>
                                    <tr>
                                        <th>De 10 A 14</th>
                                        <th>{{datos_edad[2][0]}}</th>
                                        <th>{{(datos_edad[2][0] / numero_personas * 100).toFixed(2)}} %</th>
                                        <th>{{datos_edad[2][1]}}</th>
                                        <th>{{(datos_edad[2][1] / numero_personas * 100).toFixed(2)}} %</th>
                                        <th style="background-color: #5df3c5">{{datos_edad[2][0]+datos_edad[2][1]}}</th>
                                        <th>{{((datos_edad[2][0]+datos_edad[2][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                        <th>{{datos_edad[16][0] + datos_edad[16][1]}}</th>
                                        <th>{{((datos_edad[16][0] + datos_edad[16][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                    </tr>
                                    <tr>
                                        <th>De 15 A 19</th>
                                        <th>{{datos_edad[3][0]}}</th>
                                        <th>{{(datos_edad[3][0] / numero_personas * 100).toFixed(2)}} %</th>
                                        <th>{{datos_edad[3][1]}}</th>
                                        <th>{{(datos_edad[3][1] / numero_personas * 100).toFixed(2)}} %</th>
                                        <th style="background-color: #5df3c5">{{datos_edad[3][0]+datos_edad[3][1]}}</th>
                                        <th>{{((datos_edad[3][0]+datos_edad[3][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                        <th style="background-color: #5df3c5">H</th>
                                        <th style="background-color: #5df3c5">M</th>
                                        <th style="background-color: #5df3c5; font-size: 20px" rowspan="4">&gt;= 15 &lt;= 64 </th>
                                    </tr>
                                    <tr>
                                        <th>De 20 A 24</th>
                                        <th>{{datos_edad[4][0]}}</th>
                                        <th>{{(datos_edad[4][0] / numero_personas * 100).toFixed(2)}} %</th>
                                        <th>{{datos_edad[4][1]}}</th>
                                        <th>{{(datos_edad[4][1] / numero_personas * 100).toFixed(2)}} %</th>
                                        <th style="background-color: #5df3c5">{{datos_edad[4][0]+datos_edad[4][1]}}</th>
                                        <th>{{((datos_edad[4][0]+datos_edad[4][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                        <th>{{(datos_edad[17][0] / numero_personas * 100).toFixed(2)}} %</th>
                                        <th>{{(datos_edad[17][1] / numero_personas * 100).toFixed(2)}} %</th>
                                    </tr>
                                    <tr>
                                        <th>De 25 A 29</th>
                                        <th>{{datos_edad[5][0]}}</th>
                                        <th>{{(datos_edad[5][0] / numero_personas * 100).toFixed(2)}} %</th>
                                        <th>{{datos_edad[5][1]}}</th>
                                        <th>{{(datos_edad[5][1] / numero_personas * 100).toFixed(2)}} %</th>
                                        <th style="background-color: #5df3c5">{{datos_edad[5][0]+datos_edad[5][1]}}</th>
                                        <th>{{((datos_edad[5][0]+datos_edad[5][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                        <th>{{datos_edad[17][0]}}</th>
                                        <th>{{datos_edad[17][1]}}</th>
                                    </tr>
                                    <tr>
                                        <th>De 30 A 34</th>
                                        <th>{{datos_edad[6][0]}}</th>
                                        <th>{{(datos_edad[6][0] / numero_personas * 100).toFixed(2)}} %</th>
                                        <th>{{datos_edad[6][1]}}</th>
                                        <th>{{(datos_edad[6][1] / numero_personas * 100).toFixed(2)}} %</th>
                                        <th style="background-color: #5df3c5">{{datos_edad[6][0]+datos_edad[1][1]}}</th>
                                        <th>{{((datos_edad[6][0]+datos_edad[6][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                        <th>{{datos_edad[17][0] + datos_edad[17][1]}}</th>
                                        <th>{{((datos_edad[17][0] + datos_edad[17][1]) / numero_personas * 100).toFixed(2)}} %</th>
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
                                        <th style="background-color: #5df3c5">H</th>
                                        <th style="background-color: #5df3c5">M</th>
                                        <th style="background-color: #5df3c5; font-size: 20px" rowspan="4">&gt;= 65 </th>
                                    </tr>
                                    <tr>
                                        <th>De 70 A 74</th>
                                        <th>{{datos_edad[14][0]}}</th>
                                        <th>{{(datos_edad[14][0] / numero_personas * 100).toFixed(2)}} %</th>
                                        <th>{{datos_edad[14][1]}}</th>
                                        <th>{{(datos_edad[14][1] / numero_personas * 100).toFixed(2)}} %</th>
                                        <th style="background-color: #5df3c5">{{datos_edad[14][0]+datos_edad[14][1]}}</th>
                                        <th>{{((datos_edad[14][0]+datos_edad[14][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                        <th>{{(datos_edad[18][0] / numero_personas * 100).toFixed(2)}} %</th>
                                        <th>{{(datos_edad[18][1] / numero_personas * 100).toFixed(2)}} %</th>
                                    </tr>
                                    <tr>
                                        <th>De 75 Y MAS</th>
                                        <th>{{datos_edad[15][0]}}</th>
                                        <th>{{(datos_edad[15][0] / numero_personas * 100).toFixed(2)}} %</th>
                                        <th>{{datos_edad[15][1]}}</th>
                                        <th>{{(datos_edad[15][1] / numero_personas * 100).toFixed(2)}} %</th>
                                        <th style="background-color: #5df3c5">{{datos_edad[15][0]+datos_edad[15][1]}}</th>
                                        <th>{{((datos_edad[15][0]+datos_edad[15][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                        <th>{{datos_edad[18][0]}}</th>
                                        <th>{{datos_edad[18][1]}}</th>
                                    </tr>
                                    <tr>
                                        <th style="background-color: #5df3c5">TOTAL</th>
                                        <th style="background-color: #5df3c5">{{datos_edad_general.numero_masculino}}</th>
                                        <th style="background-color: #5df3c5">{{(datos_edad_general.numero_masculino / numero_personas * 100).toFixed(2)}} %</th>
                                        <th style="background-color: #5df3c5">{{datos_edad_general.numero_femenino}}</th>
                                        <th style="background-color: #5df3c5">{{(datos_edad_general.numero_femenino / numero_personas * 100).toFixed(2)}} %</th>
                                        <th style="background-color: #5df3c5">{{ numero_personas }}</th>
                                        <th>100 %</th>
                                        <th>{{datos_edad[18][0] + datos_edad[18][1]}}</th>
                                        <th>{{((datos_edad[18][0] + datos_edad[18][1]) / numero_personas * 100).toFixed(2)}} %</th>
                                    </tr>
                                </tbody>
                            </table>
                            <br><br>
                            <hr>
                            <h2 style="width: 100%; text-align: center">PORCENTAJE POR GENERO</h2>
                            <div id="grafica_sexo_informe" style="height: 300px"></div>
                            <h2 style="width: 100%; text-align: center">PIRÁMIDE POBLACIONAL</h2>
                            <br>
                            <div id="grafico_edad_informe" style="height: 465px; width: 104%"></div>
                            <br>
                            <br>
                            <br>
                            <hr>
                            <h2 style="width: 100%; color: #ff425c; text-align: center; font-weight: bold;">DISTRIBUCIÓN POR ESTADO CIVIL</h2>
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
                            <div class="html2pdf__page-break"></div>
                            <br><br>
                            <h2 style="width: 100%; text-align: center;">DISTRIBUCIÓN DE PERSONAS POR ESTADO CIVIL</h2>
                            <div id="grafico_estado_civil" style="height: 450px; width: 104%"></div>
                            <div id="grafico_estado_civil_por" style="margin-top: 130px; height: 390px; width: 104%"></div>
                        </template>
                    </vue3-html2pdf> 
                </div>
            </div>      
            <div class="col-lg-2"></div>    
        </div>
    </div>
</template>
<script>
import Vue3Html2pdf from 'vue3-html2pdf'
import * as dashboardService from "../../services/dashboard_service";
import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";
am4core.useTheme(am4themes_animated);
export default {
    components: {
        Vue3Html2pdf
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
            options: {
                chart: {
                id: 'vuechart-example'
                },
                xaxis: {
                categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998]
                }
            },
            series: [{
                name: 'series-1',
                data: [30, 40, 45, 50, 49, 60, 70, 91]
            }],
            datos_edad: [],
            numero_personas: 0,
            datos_edad_general: null,
            chart_edad: null,
            chart_sexo: null,
            char_estado_civil: null,
            char_estado_civil_por: null,
        }
    },
    mounted() {
        this.consultarDatos();
    },
    methods: {
        generateReport () {
            this.$refs.html2Pdf.generatePdf()
        },
        async consultarDatos(){
            this.loading = true;
            await dashboardService.datosInforme().then(respuesta => {
                this.datos_edad_general = respuesta.data;
                this.datos_edad = respuesta.data.piramide_edad;
                this.numero_personas = respuesta.data.numero_personas;
                this.generarGraficoEdad();
                this.generarGraficoSexo();
                this.generarGraficoEstadiCivilBarras();
                this.generarGraficoEstadiCivilPie();
            });
            this.loading = false;
        },
        generarGraficoEdad() {
            // Create chart instance
            var chart = am4core.create("grafico_edad_informe", am4charts.XYChart);

            // Add data
            chart.data = [];

            for (let index = 0; index <= 15; index++) {
                const element = this.datos_edad[index];
                chart.data.push({
                    "age": element[2],
                    "male": (-1) * element[0],
                    "female": element[1]
                })
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
            maleRange.value = -2;
            maleRange.endValue = 0;
            maleRange.label.text = "Masculino";
            maleRange.label.fill = chart.colors.list[0];
            maleRange.label.dy = 20;
            maleRange.label.fontWeight = '600';
            maleRange.grid.strokeOpacity = 0;
            maleRange.grid.stroke = male.stroke;

            var femaleRange = valueAxis.axisRanges.create();
            femaleRange.value = 0;
            femaleRange.endValue = 2;
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
        generarGraficoEstadiCivilBarras(){
            var chart = am4core.create("grafico_estado_civil", am4charts.XYChart);

            chart.data = [];

            for (let index = 0; index <= 5; index++) {
                const element = this.datos_edad_general.estado_civil[index];
                chart.data.push({
                    "country": element[0],
                    "visits": element[1]
                });
            }

            chart.padding(40, 40, 40, 40);

            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.minGridDistance = 60;
            categoryAxis.renderer.grid.template.disabled = true;

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.min = 0;
            valueAxis.extraMax = 0.1;
    
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.dataFields.categoryX = "country";
            series.dataFields.valueY = "visits";
            series.tooltipText = "{valueY.value}"
            series.columns.template.strokeOpacity = 0;
           
        
            var labelBullet = series.bullets.push(new am4charts.LabelBullet());
            labelBullet.label.verticalCenter = "bottom";
            labelBullet.label.dy = -10;
            labelBullet.label.text = "{values.valueY.workingValue.formatNumber('#.')}";

            chart.zoomOutButton.disabled = true;

            // as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
            series.columns.template.adapter.add("fill", function (fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            });

            this.char_estado_civil = chart;
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
    },
}
</script>
<style>
    .pdf-preview {
        position: fixed !important;
        width: 100% !important;
        min-width: 600px !important;
        height: 100vh !important;
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
        height: 80vh !important;
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

    .tabla_informe td, th {
        border: 1px solid grey;
        padding: 5px;
        text-align: center;
        font-size: 14px;
    }

    .tabla_informe td, .tabla_informe th {
        border: 1px solid rgb(173, 173, 173) !important;
        padding: 10px;
    }

    thead {
       background-color: #5df3c5 !important;
    }
</style>