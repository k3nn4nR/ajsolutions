<template>
    <apexchart type="line" :options="trabajadores" :series="trabajadoresSeries"/>
</template>
<script>
    export default {
           data(){
               return {
                   trabajadores: {
                        title: {
                            text: "Ingresos Por Año",
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
                            categories: []
                        },
                        stroke:{
                            curve: "smooth",
                        },
                    },
                    trabajadoresSeries: [{
                        name: 'trabajadores',
                        data: []
                    }],
               };
           },
           mounted(){
               this.getData()
           },
           methods:{
               getData(){
                    axios.get('/trabajadores').then(response=>{
                        let index = 0
                        let cat = []
                        let data = []
                        response.data.forEach(trabajador => {
                            if(cat.some(category => category === trabajador.created_at.split("T")[0]) === false){
                                cat[index] = trabajador.created_at.split("T")[0]
                                index++
                            }
                        });
                        cat.sort()
                        index = 0
                        cat.forEach(category => {
                            let count = 0
                            response.data.forEach(trabajador => {
                                if(trabajador.created_at.split("T")[0] == category)
                                    count++
                            });
                            data[index] = count
                            index++;
                        });                  
                        this.updateChart(cat,data)
                    })
               },
               updateChart(cat,data){
                    this.trabajadores = {
                        xaxis: {
                            categories: cat
                        }
                    }
                    this.trabajadoresSeries = [{
                        name: 'trabajadores',
                        data: data
                    }]
               },
           }
    }
</script>