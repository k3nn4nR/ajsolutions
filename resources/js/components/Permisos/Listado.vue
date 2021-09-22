<template>
    <v-data-table :items="permisos" :headers="headers" dense :search="search">
        <template v-slot:top>
            <v-toolbar flat>
                <v-toolbar-title>Permisos</v-toolbar-title>
                <v-spacer></v-spacer>
                <permiso-create v-on:getData="getData()"/>
            </v-toolbar>
        </template>
        <template v-slot:item.acciones="{ item }">
            <role-asign :permiso="item.id" />
        </template>
    </v-data-table>
</template>
<script>
    export default {
        data(){
            return {
                search:'',
                permisos:[],
            };
        },
        computed:{
            headers(){
                return [
                    {text:'Nombre',value:'name'},
                    {text:'Guardia',value:'guard_name'},
                    {text:'Acciones',value:'acciones'},
                ];
            }
        },
        mounted(){
            this.getData()
        },
        methods:{
            getData(){
                axios.get('/permissions').then(response=>{this.permisos = response.data})
            },
        },
    }
</script>