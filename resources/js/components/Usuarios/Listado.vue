<template>
    <v-data-table :items="usuarios" :headers="headers" dense :search="search">
        <template v-slot:top>
            <v-toolbar flat>
                <v-toolbar-title>Usuarios</v-toolbar-title>
                <v-divider class="mx-4" inset vertical ></v-divider>
                <v-text-field v-model="search" dense label="Buscar"/>
                <v-divider class="mx-4" inset vertical ></v-divider>
                <usuario-create v-on:getData="getData()"/>
                <v-divider class="mx-4" inset vertical ></v-divider>
                <roles-sync :users="usuarios"/>
            </v-toolbar>
        </template>
    </v-data-table>
</template>
<script>
    import RolesSync from '../Usuarios/Roles/Asignar.vue'
    export default {
        components:{
            RolesSync,
        },
        data(){
            return {
                search:'',
                usuarios:[],
            }
        },
        computed:{
            headers(){
                return [
                    {text:'Nombre',value:'name'},
                    {text:'Correo',value:'email'},
                    {text:'',value:'acciones'},
                ];
            }
        },
        mounted(){
            this.getData()
        },
        methods:{
            getData(){
                axios.get('/usuario').then(response=>{this.usuarios=response.data})
            }
        }
        
    }
</script>