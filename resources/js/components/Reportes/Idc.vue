<template>
    <v-card>
        <v-card-text>
            <v-row>
                <v-col>
                    <v-select :items="meses" v-model="mes" label="Mes"/>
                </v-col>
                <v-col>
                    <v-select :items="graphs" v-model="graph" label="Grafica" />
                </v-col>
                <v-col>
                    <v-btn class="success" @click="mes=''">Todos</v-btn>
                </v-col>
            </v-row>
            <v-row>
                <v-col>
                    <apexchart :options="options" :series="series"/>
                </v-col>
            </v-row>
        </v-card-text>
    </v-card>
</template>
<script>
    export default {
        data(){
            return {
                graph:'bar',
                options:{
                    title: {
                        text: "IDC :Indice de Desempeño por Competencias",
                        align: 'left',
                        margin: 10,
                        offsetX: 0,
                        offsetY: 0,
                        floating: false,
                        style: {
                            fontSize:  '14px',
                            fontWeight:  'bold',
                            fontFamily:  undefined,
                            color:  '#263238'
                        },
                    },
                    chart: {
                        id: 'IDC',
                    },
                    xaxis: {
                        categories: [],
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke:{
                        curve: "smooth",
                    },
                },
                series:[{
                    data: [],
                }],
                datos:[],
                meses:[],
                mes:'',
            }
        },
        mounted(){
            this.getData()
        },
        watch:{
            mes(val)
            {
                let datos_a = []
                let meses_a = []
                if(val != '')
                {
                    datos_a.push(this.datos[this.meses.indexOf(val)])
                    meses_a.push(moment(this.meses[this.meses.indexOf(val)]).locale('es').format("YYYY-MM"))
                }else{
                    datos_a = this.datos
                    meses_a = this.meses
                }
                this.options = {
                    xaxis: {
                        categories: meses_a,
                    },
                }
                this.series = [{
                    data: datos_a
                }]
            },
            graph(val){
                this.options = {
                    chart:{ 
                        type:val,
                    } 
                }
            },
        },
        computed:{
            graphs(){
                return [
                    {text:'area',value:'area'},
                    {text:'line',value:'line'},
                    {text:'bar',value:'bar'},
                ]
            }
        },
        methods:{
            getData(){
                axios.get('/getIDC').then(response=>{
                    this.datos = response.data.enviar
                    this.meses = response.data.meses
                    if(this.meses.length != 0)
                    {
                        this.mes = this.meses[0]
                    }
                })
            },
        }
    }
</script>