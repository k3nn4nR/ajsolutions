<template>
    <v-card>
        
    </v-card>
</template>
<script>
    export default {
        props:['trabajador'],
        
        mounted(){
            this.getData()
        },
        methods:{
            getData(){
                axios.get('/trabajadores-evaluaciones/'+this.trabajador.dni).then(response=>{this.evaluaciones=response.data})
            }
        }
    }
</script>