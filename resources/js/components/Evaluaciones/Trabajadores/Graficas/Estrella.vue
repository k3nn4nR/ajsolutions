<template>
    <v-card>
        <v-card-text>
            <v-row>
                <v-col>
                    <apexchart type="radar" :options="options" :series="series"/>
                </v-col>
                <v-col>
                    <apexchart :options="optionsRB" :series="seriesRB"/>
                </v-col>
            </v-row>
        </v-card-text>
    </v-card>
</template>
<script>
    export default {
        props:['historico'],
        data(){
            return {
                options: {
                    chart: {
                        id: 'vuechart-example'
                    },
                    xaxis: {
                        categories: []
                    },
                    plotOptions: {
                        radar: {
                            polygons: {
                                strokeColor: '#e8e8e8',
                                fill: {
                                    colors: ['#f8f8f8', '#fff']
                                }
                            }
                        }
                    },
                    markers: {
                        size: 5,
                        hover: {
                            size: 10
                        }
                    }
                },
                series: [{
                    name: 'puntos',
                    data: []
                }],
                optionsRB:{
                    chart: {
                        height: 280,
                        type: "radialBar",
                    },
                    colors: ['#F50002','#F5FF05'],
                    plotOptions: {
                        radialBar: {
                            startAngle: -135,
                            endAngle: 135,
                            track: {
                                background: '#333',
                                startAngle: -135,
                                endAngle: 135,
                            },
                            dataLabels: {
                                name: {
                                show: false,
                                },
                                value: {
                                fontSize: "30px",
                                show: true
                                }
                            }
                        }
                    },
                    fill: {
                        type: "gradient",
                        gradient: {
                            shade: "light",
                            type: "horizontal",
                            gradientToColors: ['#26FE01'],
                            stops: [0, 100]
                        }
                    },
                    stroke: {
                        lineCap: "butt"
                    },
                    labels: ["Progress"]
                },
                seriesRB: [],
            }
        },
        watch:{
            historico(val){
                if(val && val[0])
                {
                    axios.get('/evaluacion-trabajador/'+this.historico[0].id).then(response=>{
                        this.options = {
                            xaxis: {
                                categories: response.data.labels
                            }
                        }
                        this.series = [{
                            name: 'puntos',
                            data: response.data.puntajes
                        }]
                        let total = response.data.puntajes.reduce(function(valorAnterior, valorActual){
                            return valorAnterior + valorActual;
                        })
                        this.seriesRB = [(total*100/180).toFixed(2)]
                    })
                }else{
                    this.seriesRB = []
                    this.trabajadores = {
                        xaxis: {
                            categories: []
                        }
                    }
                    this.series = [{
                        name: 'puntos',
                        data: []
                    }]
                }
            }
        },
    }
</script>