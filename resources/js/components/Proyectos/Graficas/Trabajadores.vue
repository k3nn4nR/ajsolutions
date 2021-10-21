<template>
    <div>
        <apexchart type="bar" :options="options" :series="series"/>
    </div>
</template>
<script>
    export default {
        props:['proyecto'],
        data(){
            return {
                options: {
                    title: {
                        text: "Estados",
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
                       id: 'Estados'
                    },
                    xaxis: {
                        categories: []
                    },
                    stroke:{
                        curve: "smooth",
                    }
                },
                series: [{
                    name: '',
                    data: []
                }],
            }
        },
        mounted(){
            this.updateData()
        },
        methods:{
            updateData(){
                axios.get('/proyecto/'+this.proyecto.id+'/trabajadores').then(response=>{
                    if(response.data.length != 0)
                    {
                        let estados = []
                        let estados_contador = []
                        let posicion = 0
                        response.data.forEach(trabajador => {
                            if(!estados.includes(trabajador.pivot.estado))
                            {
                                estados.push(trabajador.pivot.estado)
                                estados_contador.push(1)
                            }else{
                                posicion = estados.indexOf(trabajador.pivot.estado)
                                estados_contador[posicion]++
                            }
                        });
                        this.options = {
                            title: {
                                text: "Estados "+response.data.length,
                            },
                            xaxis: {
                                categories: estados
                            }
                        },
                        this.series = [{
                            name: 'Cotizaciones',
                            data: estados_contador
                        }]
                    }
                })
            }
        }
    }
</script>