<template>
    <div>
        <div id="chart"/>
        <v-text-field  v-model="message" label="Message" dense/>
        <v-btn @click="generate">Generate</v-btn>
        <v-btn :disabled="chart==''" @click="download">Download</v-btn>
    </div>
</template>
<script>
    import { jsPDF } from "jspdf";
    export default {
        data(){
            return {
                chart:'',
                message:'',
            }
        },
        mounted(){
            
        },
        methods:{
            generate(){
                var options = {
                    chart: {
                        type: 'line',
                        animations: {
                            enabled: false,
                        }
                    },
                    series: [{
                        name: 'sales',
                        data: [30,40,35,50,49,60,70,91,125]
                    }],
                    xaxis: {
                        categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
                    }
                }
                this.chart = new ApexCharts(document.querySelector("#chart"), options)
                this.chart.render()
            },
            download(){
                const pdf = new jsPDF
                pdf.text(35, 25, 'A J Solutions')
                pdf.text(40, 30, 'Grafico de ventas')
                pdf.text(40, 40, this.message)
                let imgs = []
                var dataURL = this.chart.dataURI().then(({ imgURI, blob }) => {
                    pdf.addImage(imgURI, 'PNG', 45, 70);
                    pdf.save("pdf-chart.pdf");
                })
            },
        }
    }
</script>