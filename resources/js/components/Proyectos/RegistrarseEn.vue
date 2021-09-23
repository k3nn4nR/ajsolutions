<template>
    <v-dialog v-model="dialog" max-width="600px" persistent>
        <template v-slot:activator="{ on, attrs }">
            <v-btn small color="primary" dark class="mb-2" v-bind="attrs" v-on="on">
                Registrarse En Proyecto
            </v-btn>
        </template>
        <v-card>
            <v-card-text>
                Datos del proyecto
            </v-card-text>
        </v-card>
    </v-dialog>
</template>
<script>
    export default {
       data: () => ({
           
       }),
       mounted(){
           this.getData()
       },
       methods:{
           getData(){
               //axios.get('/proyectos').then(response=>{this.proyectos = response.data})
           },
           save(){

           },
       }
    }
</script>