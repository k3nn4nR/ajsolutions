<template>
    <v-data-table :items="roles" :headers="headers" dense :search="search">
        <template v-slot:top>
            <v-toolbar flat>
                <v-toolbar-title>Roles</v-toolbar-title>
                <v-spacer></v-spacer>
                <role-create v-on:getData="getData()"/>
            </v-toolbar>
        </template>
        <template v-slot:item.acciones="{ item }">
            <permiso-asign :rol="item.id" />
        </template>
    </v-data-table>
</template>
<script>
    export default {
        data(){
            return {
                search:'',
                roles:[],
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
                axios.get('/roles').then(response=>{this.roles = response.data})
            },
        },
    }
</script>