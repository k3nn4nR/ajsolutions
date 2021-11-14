<template>
    <v-card>
        <v-card-text>
            <v-row>
                <v-col>
                    <apexchart type="bar" :options="options" :series="series"/>
                </v-col>
            </v-row>
        </v-card-text>
    </v-card>
</template>
<script>
    export default {
        data(){
            return {
                options:{},
                series: [{
                    name: '',
                    data: []
                }],
            }
        },
        mounted(){
            this.getData()
        },
        methods:{
            getData(){
                axios.get('/getNCE').then(response=>{
                    this.options = {
                        title: {
                            text: "NCE",
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
                            id: 'NCE'
                        },
                        xaxis: {
                            categories:response.data.meses,
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke:{
                            curve: "smooth",
                        },
                    },
                    this.series = [{
                        data:response.data.datos
                    }]
                })
            },
        }
    }
</script>