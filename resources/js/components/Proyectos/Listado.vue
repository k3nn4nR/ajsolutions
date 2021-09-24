<template>
    <v-data-table :items="proyectos" :headers="headers" dense :search="search">
        <template v-slot:top>
            <v-toolbar flat>
                <v-toolbar-title>Proyectos</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-field-text model="search" label="busqueda" dense /> 
                <proyectos-create v-on:getData="getData()"/>
            </v-toolbar>
        </template>
        <template v-slot:item.acciones="{ item }">
        </template>
    </v-data-table>
</template>
<script>
    export default {
        data(){
            return {
                search:'',
                proyectos:[],
            };
        },
        computed:{
            headers(){
                return [
                    {text:'Nombre',value:'descripcion'},
                    {text:'Empresa',value:'estado'},
                    {text:'Fecha de inicio',value:'started_at'},
                    {text:'Fecha de entrega',value:'ended_at'},
                ];
            }
        },
        mounted(){
            this.getData()
        },
        methods:{
            getData(){
                axios.get('/proyectos').then(response=>{this.proyectos = response.data})
            },
        },
    }
</script>