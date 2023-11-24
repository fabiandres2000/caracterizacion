<template lang="">
    <div>
        <br>
        <button @click="generateReport">
            reporte
        </button>
        <hr>
        <vue3-html2pdf
            :show-layout="true"
            :float-layout="false"
            :enable-download="true"
            :preview-modal="true"
            :paginate-elements-by-height="1400"
            :pdf-quality="2"
            :manual-pagination="false"
            pdf-format="a4"
            pdf-orientation="portrait"
            pdf-content-width="100%"
            ref="html2Pdf"
            :html-to-pdf-options=htmlToPdfOptions
        >
            <template v-slot:pdf-content>
                <h3>Distribución por Grupos de Edad</h3>
                <table class="tabla_informe" style="width: 100%">
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
                            <th style="background-color: #5df3c5; font-size: 24px" rowspan="4"> &lt; 15 </th>
                        </tr>
                        <tr>
                            <th>De 0 A 4</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="background-color: #5df3c5"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>De 5 A 9</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="background-color: #5df3c5"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>De 10 A 14</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="background-color: #5df3c5"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>De 15 A 19</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="background-color: #5df3c5"></th>
                            <th></th>
                            <th style="background-color: #5df3c5">H</th>
                            <th style="background-color: #5df3c5">M</th>
                            <th style="background-color: #5df3c5; font-size: 24px" rowspan="4">&gt;= 15 &lt;= 64 </th>
                        </tr>
                        <tr>
                            <th>De 20 A 24</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="background-color: #5df3c5"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>De 25 A 29</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="background-color: #5df3c5"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>De 30 A 34</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="background-color: #5df3c5"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>De 35 A 39</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="background-color: #5df3c5"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>De 40 A 44</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="background-color: #5df3c5"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>De 45 A 49</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="background-color: #5df3c5"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>De 50 A 54</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="background-color: #5df3c5"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>De 55 A 59</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="background-color: #5df3c5"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>De 60 A 64</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="background-color: #5df3c5"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>De 65 A 69</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="background-color: #5df3c5"></th>
                            <th></th>
                            <th style="background-color: #5df3c5">H</th>
                            <th style="background-color: #5df3c5">M</th>
                            <th style="background-color: #5df3c5; font-size: 24px" rowspan="4">&gt;= 65 </th>
                        </tr>
                        <tr>
                            <th>De 70 A 74</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="background-color: #5df3c5"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th>De 75 Y MAS</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="background-color: #5df3c5"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th style="background-color: #5df3c5">TOTAL</th>
                            <th style="background-color: #5df3c5"></th>
                            <th style="background-color: #5df3c5"></th>
                            <th style="background-color: #5df3c5"></th>
                            <th style="background-color: #5df3c5"></th>
                            <th style="background-color: #5df3c5"></th>
                            <th style="background-color: #5df3c5"></th>
                            <th style="background-color: #5df3c5"></th>
                            <th style="background-color: #5df3c5"></th>
                        </tr>
                    </tbody>
                </table>
            </template>
        </vue3-html2pdf>    
    </div>
</template>
<script>
import Vue3Html2pdf from 'vue3-html2pdf'

export default {
    components: {
        Vue3Html2pdf
    },
    data() {
        return {
            htmlToPdfOptions: {
                margin: 0.3,

                filename: `hehehe3423423.pdf`,

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
                    format: 'a4',
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
            }]
        }
    },
    methods: {
        generateReport () {
            this.$refs.html2Pdf.generatePdf()
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