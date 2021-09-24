<template>
    <v-data-table :items="trabajadores" :headers="headers" dense :search="search">
        <template v-slot:top>
            <v-toolbar flat>
                <v-toolbar-title>Trabajadores</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-text-field v-model="search" label="Busqueda" dense />
                <v-spacer></v-spacer>
                <trabajador-create v-on:getData="getData()"/>
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
                trabajadores:[],
            };
        },
        computed:{
            headers(){
                return [
                    {text:'DNI',value:'dni'},
                    {text:'Apellido Paterno',value:'ape_paterno'},
                    {text:'Apellido Materno',value:'ape_materno'},
                    {text:'Nombres',value:'name'},
                    {text:'Direccion',value:'direccion'},
                    {text:'Celular',value:'celular'},
                    {text:'Estado',value:'estado'},
                ];
            }
        },
        mounted(){
            this.getData()
        },
        methods:{
            getData(){
                axios.get('/trabajadores').then(response=>{this.trabajadores=response.data}).catch()
            }
        },
    }
</script>