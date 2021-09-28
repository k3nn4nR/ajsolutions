<template>
    <apexchart type="bar" :options="proyectos" :series="proyectosSeries"/>
</template>
<script>
    export default {
           data(){
               return {
                   proyectos: {
                        title: {
                            text: "Estado",
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
                        }
                    },
                    proyectosSeries: [{
                        name: 'proyectos',
                        data: []
                    }],
               };
           },
           mounted(){
               this.getData()
           },
           methods:{
               getData(){
                    axios.get('/proyectos-all').then(response=>{
                        let index = 0
                        let cat = []
                        let data = []
                        response.data.forEach(proyecto => {
                            if(cat.some(category => category === proyecto.Estado) === false){
                                cat[index] = proyecto.Estado
                                index++
                            }
                        });
                        cat.sort()
                        index = 0
                        cat.forEach(category => {
                            let count = 0
                            response.data.forEach(proyecto => {
                                if( proyecto.Estado == category)
                                    count++
                            });
                            data[index] = count
                            index++;
                        });                  
                        this.updateChart(cat,data)
                    })
               },
               updateChart(cat,data){
                    this.proyectos = {
                        xaxis: {
                            categories: cat
                        }
                    }
                    this.proyectosSeries = [{
                        name: 'proyectos',
                        data: data
                    }]
               },
           }
    }
</script>