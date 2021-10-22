<template>
    <apexchart type="radar" :options="options" :series="series"/>
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
                    })
                }else{
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