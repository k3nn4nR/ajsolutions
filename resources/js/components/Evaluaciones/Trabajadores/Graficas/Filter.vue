<template>
    <div>
        <v-card>
            <v-card-text>
                <v-row>
                    <v-col>
                        <v-data-table :items="trabajadores" v-model="trabajadorSelected" dense show-select :headers="trabajadorHeaders" item-key="dni" :search="trabajador" :single-select="true">
                            <template v-slot:top>
                                <v-toolbar flat>
                                    <v-toolbar-title>Trabajadores</v-toolbar-title>
                                    <v-divider class="mx-4" inset vertical ></v-divider>
                                    <v-spacer/>
                                    <v-select :items="evaluaciones" v-model="evaluacion" item-value="id" item-text="evaluacion" label="Evaluacion" dense/>
                                    <v-divider class="mx-4" inset vertical ></v-divider>
                                    <v-spacer/>
                                    <v-text-field v-model="trabajador" dense label="Busqueda"/>
                                </v-toolbar>
                            </template>
                        </v-data-table>
                    </v-col>
                </v-row>
                <v-row v-if="series[0].data.length != 0">
                    <v-col>
                        <apexchart type="line" :options="options" :series="series"/>
                    </v-col>
                </v-row>
            </v-card-text>
        </v-card>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                trabajadores:[],
                trabajador:'',
                evaluaciones:[],
                evaluacion:'',
                trabajadorSelected:[],
                options: {},
                series: [{
                    name: '',
                    data: []
                }],
            }
        },
        watch:{
            trabajadorSelected(val){
                if(this.evaluacion != '' && val.length == 1)
                {
                    this.generateLineChart()
                }
            },
            evaluacion(val){
                if(this.trabajadorSelected.length == 1 && val)
                {
                    this.generateLineChart()
                }
            },
        },
        computed:{
            trabajadorHeaders(){
                return [
                    {text:'DNI',value:'dni'},
                    {text:'Apellido Paterno',value:'ape_paterno'},
                    {text:'Apellido Materno',value:'ape_materno'},
                    {text:'Nombres',value:'nombres'},
                ]
            },
        },
        mounted(){
            this.getData()
        },
        methods:{
            getData(){
                axios.get('/trabajadores').then(response=>{this.trabajadores=response.data})
                axios.get('/evaluaciones').then(response=>{this.evaluaciones=response.data})
            },
            generateLineChart(){
                axios.get('/trabajador/'+this.trabajadorSelected[0].dni+'/evaluacion/'+this.evaluacion).then(response=>{
                    let evaluacionText = ''
                    this.evaluaciones.forEach(evaluacion => {
                        if(evaluacion.id == this.evaluacion)
                        {
                            evaluacionText = evaluacion.evaluacion
                        }
                    });
                    this.options = {
                        title: {
                            text: "",
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
                            id: 'vuechart-example'
                        },
                        xaxis: {
                            type: "datetime"
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke:{
                            curve: "smooth",
                        },
                    },
                    this.series = [{
                        name: 'Resultado',
                        data: response.data.puntajes
                    }]
                })
            }
        }
    }
</script>